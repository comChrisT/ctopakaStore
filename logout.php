<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Logging out</title>
    <meta http-equiv="refresh" content="3; url=index.php" />        <!--To redirect the user-->
</head>
    <p>You are logging out... <br>If you are not redirected, <a href="index.php">click here</a>.</p>
</body>
    </html>

<?php
session_start();
unset($_SESSION['loginEmail']);
unset($_SESSION['loginPassword']);
unset($_SESSION['loginName']);
?>