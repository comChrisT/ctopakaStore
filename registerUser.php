<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styling.css">
    <script src="Script.js"></script>
    <meta http-equiv="refresh" content="5; url=index.php" />        <!--To redirect the user-->
</head>

<body onresize="mobMenuF()" onload="adjustFooter(1)">
    <header class="bar">

            <img id="uclanlogo" src="uclan logo.png"   alt="uclan logo"/>

            <ul id="topElements">
                <a href="index.php">Home</a>
                <a href="products.html">Products</a>
                <a href="cart.html">Cart</a>
                <a href="signup.php">Sign Up</a>

            </ul>

            <p id="heaedertitle">Student Shop</p>

            <div id="hamMenu" onclick="mobMenuChoices()"></div>
            <div id="hamMenuChoices">
                <a href="index.html">Home</a>
                <a href="products.html">Products</a>
                <a href="cart.html">Cart</a>
            </div>

    </header>
<?php

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

      $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);           //retrieving the full name from the form using post
      $email = mysqli_real_escape_string($connection, $_POST['email']);                 //retrieving the email from the form using post
      $passwordBefore = mysqli_real_escape_string($connection, $_POST['password1']);    //retrieving the password from the form using post
      $address = mysqli_real_escape_string($connection, $_POST['address']);                 //retrieving the email from the form using post

        if(($fullName!="")&&($email!="")&&($passwordBefore!="")&&($address!=""))        //if the user visits the registerUser.php randomly, they won't be registered in the database
        {
            $passwordAfter = password_hash($passwordBefore, PASSWORD_DEFAULT);   //encrypting the password using bcrypt
        	$query = "INSERT INTO tbl_users (user_full_name, user_email, user_pass, user_address)
        			  VALUES('$fullName', '$email', '$passwordAfter', '$address')";
        	mysqli_query($connection, $query);  //sending the query to the database
        	echo "<h1>Signup Successful</h1>";
        }
        else {echo "<h1>Oops! You ended up in the wrong page. Let me redirect you!</h1>"}

?>
    <p>If you are not redirected in five seconds, <a href="index.php">click here</a>.</p>
</body>
    </html>



