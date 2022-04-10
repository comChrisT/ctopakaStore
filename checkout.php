<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <meta charset="UTF-8">
        <title>Checking out...</title>
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



?>
<script>window.location.replace(document.referrer);</script>
        <p>If you are not redirected in five seconds, <a href="cart.php">click here</a>.</p>
    </body>
</html>



