<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <meta charset="UTF-8">
        <title>Submiting Review...</title>
        <script src="Script.js"></script>
    </head>

    <body >
<?php
// Start the session
  session_start();
  $servername = "localhost";
  $username = "ctopaka";
  $password = "ChrisPH1217";
  $dbname = "ctopaka";

  // Create connection
  $connection = new mysqli($servername, $username, $password, $dbname);
  if (mysqli_connect_errno())   //check for errors
  {
      echo "ERROR: could not connect to database to retrieve offers" . mysqli_connect_error();
      echo "<br>";
  }

      $title = mysqli_real_escape_string($connection, $_POST['title']);           //retrieving the title from the form using post
      $description = mysqli_real_escape_string($connection, $_POST['comment']);       //retrieving the comment from the form using post
      $rating = mysqli_real_escape_string($connection, $_POST['rating']);         //retrieving the rating from the form using post
      $userid=$_SESSION['loginId'];
      $productId=mysqli_real_escape_string($connection, $_POST['productId']);

        if(($title!="")&&($description!="")&&($rating!="")&&($userid!="")&&($productId!=""))        //if the user visits the registerUser.php randomly, they won't be registered in the database
        {
        	$query = "INSERT INTO tbl_reviews (user_id, product_id, review_title, review_desc, review_rating)
        			  VALUES('$userid', '$productId', '$title', '$description', '$rating')";
        	mysqli_query($connection, $query);  //sending the query to the database
        	echo "<h1>Review submission successful</h1>";
        	echo"<script>alert('Review submission successful');</script>";
        }
        else {echo "<h1>Oops! You ended up in the wrong page. Let me redirect you!</h1>";}

?>
<script>window.location.replace(document.referrer);</script>
        <p>If you are not redirected in five seconds, <a href="products.php">click here</a>.</p>
    </body>
</html>



