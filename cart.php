<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="Styling.css">
</head>

<body onload="loadCartPage();adjustFooter(2)" onresize="mobMenuF()">

<header class="bar">

    <img id="uclanlogo" src="uclan logo.png"   alt="uclan logo"/>

   <ul id="topElements">
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="cart.php">Cart</a>
                <a href="signup.php">Sign Up</a>

            </ul>

            <p id="heaedertitle">Student Shop</p>

            <div id="hamMenu" onclick="mobMenuChoices()"></div>
            <div id="hamMenuChoices">
                <a href="index.php">Home</a>
                <a href="products.php">Products</a>
                <a href="cart.php">Cart</a>
                <a href="signup.php">Sign Up</a>
            </div>

</header>
<h1 id="cartTitle">Cart</h1>
<div id="CartDescr"></div>
<div id="cartItem"></div>

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