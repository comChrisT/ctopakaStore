<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="Styling.css">
    <script src="Script.js"></script>
</head>

<body onresize="mobMenuF()" onload="LoadProducts(); adjustFooter(3)">
<header class="bar">

    <img id="uclanlogo" src="uclan logo.png"   alt="uclan logo"/>

    <ul id="topElements">
        <a href="index.php">Home</a>
        <a href="products.html">Products</a>
        <a href="cart.html">Cart</a>
    </ul>

    <p id="heaedertitle">Student Shop</p>

    <div id="hamMenu" onclick="mobMenuChoices()"></div>
    <div id="hamMenuChoices">
        <a href="index.php">Home</a>
        <a href="products.html">Products</a>
        <a href="cart.html">Cart</a>
    </div>

</header>

<h1 id="productsTitle">Products</h1>
<div id="NavProducts">
<a>Go to: <br></a>
<button onclick="goToTshirts()">t-shirts</button>
<button onclick="goToHoodies()">hoodies</button>
<button onclick="goToJumpers()">jumpers</button>
</div>

<div id="forProduct"></div>
<?php

$servername = "localhost";
$username = "ctopaka";
$password = "ChrisPH1217";
$dbname = "ctopaka";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "ERROR: could not connect to database to retrieve offers" . mysqli_connect_error();
    echo "<br>";
 }



$query = "SELECT *
          FROM tbl_products;";
$result = $connection -> query($query);




    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fethces the array
    {
     echo "<img src='".$row["product_image"]."'style=\"border-radius: 70%; width:150px;\">";
    // echo "<img src='".$row["product_image"]."'style=\"max-width: 10%;\">";

    }


?>

<script src="Script.js"></script>
<button id="goTopButton" onclick="GoTop()">Go top</button>
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