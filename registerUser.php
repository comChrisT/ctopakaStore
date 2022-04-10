<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Registering...</title>
    <script src="Script.js"></script>
    <meta http-equiv="refresh" content="6; url=index.php" />        <!--To redirect the user-->
</head>

<body>


    </header>
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

      $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);           //retrieving the full name from the form using post
      $email = mysqli_real_escape_string($connection, $_POST['email']);                 //retrieving the email from the form using post
      $passwordBefore = mysqli_real_escape_string($connection, $_POST['password1']);    //retrieving the password from the form using post
      $address = mysqli_real_escape_string($connection, $_POST['address']);                 //retrieving the email from the form using post

        if(($fullName!="")&&($email!="")&&($passwordBefore!="")&&($address!=""))        //if the user visits the registerUser.php randomly, they won't be registered in the database
        {
            $query = "SELECT * FROM tbl_users WHERE user_email='$email'";
            $result = $connection -> query($query);

            if ((mysqli_num_rows($result) == 0))    //checks if the the email already exists in the database
            {
            $passwordAfter = password_hash($passwordBefore, PASSWORD_DEFAULT);   //encrypting the password using bcrypt
        	$query = "INSERT INTO tbl_users (user_full_name, user_email, user_pass, user_address)
        			  VALUES('$fullName', '$email', '$passwordAfter', '$address')";
        	mysqli_query($connection, $query);  //sending the query to the database
        	echo "<h1>Signup Successful</h1>";
        	}
        	else{echo "User with this email already exists! <br>Try Logging in!";}
        }
        else {echo "<h1>Oops! You ended up in the wrong page. Let me redirect you!</h1>";}

?>
    <p>If you are not redirected in six seconds, <a href="index.php">click here</a>.</p>
</body>
    </html>



