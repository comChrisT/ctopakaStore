<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
     <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="Styling.css">

</head>

<body onload="loadCartPage();adjustFooter(2)" onresize="mobMenuF()">

<header class="bar">

    <img id="uclanlogo" src="uclan logo.png"   alt="uclan logo"/>

   <ul id="topElements">
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="cart.php">Cart</a>
                <a id="signUpMenu" href="signup.php">Sign Up</a>

            </ul>

            <p id="heaedertitle">Student Shop</p>
            <div id="hamMenu" onclick="mobMenuChoices()"></div>
            <div id="hamMenuChoices">
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="cart.php">Cart</a>
                <a id="signUpMenuHam" class="signUpMenu" href="signup.php">Sign Up</a>
            </div>

</header>
<h1 id="cartTitle">Cart</h1>
<div class="container">
<p>Login to checkout:</p>
<form method="post" action="cart.php">
  	<div class="form-login">
  		<label>Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
  		<input type="email" name="email" >
  	</div>
  	<div class="form-login">
  		<label>Password:</label>
  		<input type="password" name="password">
  	</div>
  	<br>
  	<div class="button-login">
  		<button type="submit" name="login_user">Login</button>
  	</div>
  	<p>
  		Do you want to sign up? <a href="register.php">Sign up</a>
  	</p>
  </form>
</div>
<button id="checkout">Checkout</button>
 <?php
  // Start the session
  session_start();
    $servername = "localhost";
    $username = "ctopaka";
    $password = "ChrisPH1217";
    $dbname = "ctopaka";

    //to check if the user is already logged in:
    if (isset($_SESSION['loginEmail']))
    {
        echo "<p style=\"margin-top: 10px; text-align: center;\">Hello <strong>".$_SESSION["loginName"]."</strong></p>";
         echo "<script>document.querySelectorAll(\".container\").forEach(a=>a.style.display = \"none\");</script>";
         echo "<script>var signup = document.getElementById('signUpMenu');    //to change the signup button to log out
                       		signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
         echo "<script>var signup = document.getElementById('signUpMenuHam');    //to change the signup button to log out
                                		signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
         echo "<script>var checkout = document.getElementById('checkout');    //to display the checkout button
                                      checkout.style.display='block';</script>";

    }
    // Create connection
    $connection = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_errno())   //check for errors
    {
        echo "ERROR: could not connect to database to retrieve offers" . mysqli_connect_error();
        echo "<br>";
    }

      if (isset($_POST['login_user']))
      {
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);


        	$query = "SELECT * FROM tbl_users WHERE user_email='$email'";
        	$result = $connection -> query($query);

        	if ((mysqli_num_rows($result) == 1))
        	{
        	    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if(!password_verify($password, $row["user_pass"])) //FOR CHECKING THE ENCRYPTED PASSWORD WITH THE GIVEN ONE
                {
                    echo "<script>
                            alert('Wrong Password, try again');
                          </script>";
                }
                else
                {
                    echo "<script>
                            alert('Login Successful');
                          </script>";
                  //saving login details to session storage
                  $_SESSION["loginEmail"] = $email;
                  $_SESSION["loginPassword"] = $password;
                  $_SESSION["loginName"] = $row["user_full_name"];

                          echo "<p style=\"margin-top: 10px; text-align: center;\">Hello <strong>".$_SESSION["loginName"]."</strong></p>";
                          echo "<script>document.querySelectorAll(\".container\").forEach(a=>a.style.display = \"none\");</script>";
                          echo "<script>var signup = document.getElementById('signUpMenu');    //to change the signup button to log out
                                        		signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
                          echo "<script>var signup = document.getElementById('signUpMenuHam');    //to change the signup button to log out
                                                 		signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
                          echo "<script>var checkout = document.getElementById('checkout');    //to show the check out button
                                                       checkout.style.display='block';</script>";
                }

        	}
            else
            {
            echo "<script>
                    alert('Email not found, Try again');
                  </script>";
            }
      }
  ?>
<div id="CartDescr"></div>
<div id="cartItem" class="cartItem"></div>


<script src="Script.js"></script>

<button id="emptyCart" onclick="emptyCart()">Empty Cart</button>
<button id="goBackButton" onclick="history.back()">← <br>Back</button>

<footer id="footer">


    <div id="group1Footer">
        <h4 id="links">Links</h4>
        <ul>
            <li><a href="https://www.uclansu.co.uk/">Student's Union</a></li>
        </ul>
    </div>
    <div id="group2Footer">
        <h4 id="contact">Contact</h4>
        <ul>
            <li>Email: suinformation@uclan.ac.uk</li>
            <li>Phone: +44 01772 89 3000</li>
        </ul>
    </div>
    <div id="group3Footer">
        <h4 id="location">Location</h4>
        <ul>
            <li>University of Central Lancashire Students' Union,<br>
                Fylde Road, Preston. PR1 7BY<br>
                Registered in England<br>
                Company Number: 7623917<br>
                Registered Charity Number: 1142616</li>

        </ul>
    </div>



</footer>
</body>

</html>