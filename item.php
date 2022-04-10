<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <title>Item:</title>
    <link rel="stylesheet" href="Styling.css">
     <link rel="stylesheet" href="item.css">

</head>

<body onload="adjustFooter(4)" onresize="mobMenuF()" >
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

<div class="grid">
<?php
// Start the session
session_start();

if (isset($_SESSION['loginEmail']))
    {
        echo "<script>var signup = document.getElementById('signUpMenu');           //to change the signup button to log out
              signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
        echo "<script>var signup = document.getElementById('signUpMenuHam');        //to change the signup button to log out on hamburger menu
                                    signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
    }
if((isset($_GET['img']))&&(isset($_GET['title']))&&(isset($_GET['desc']))&&(isset($_GET['price']))) {
echo "<img src='".$_GET['img']."'alt='Product image'>";
//puts the product title on the page:
echo "<br>"."<p style=\"color: #F47721;font-weight: bolder;font-size: x-large;\">".$_GET["title"]."</p>";
//puts description on the page:
echo "<p>".$_GET["desc"]."</p>";
//puts price on the page:
echo "£".$_GET["price"]."<br>";
//button for add to cart. when clicked Adds the details of the item to the local storage and then using GET its being presented in the cart
echo "<input type='button' style=\" display: inline-block;text-decoration: none; background-color: #006250; border: none; color: white;\" onclick='addToCart(".$_GET["id"].",\"".$_GET["title"]."\",\"".$_GET["desc"]."\",\"".$_GET["img"]."\",\"".$_GET["price"]."\",\"".$_GET["type"]."\")' value='Add to cart'/>";
echo "<br>";
}
else
{
echo "<script>alert('Variables from page are missing... Redirecting to products page');window.location.href = 'products.php';</script>";
}

?>
</div>
<script src="Script.js"></script>
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