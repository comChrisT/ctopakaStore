<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="Styling.css">
    <link rel="stylesheet" href="products.css">
    <script src="Script.js"></script>
</head>

<body onresize="mobMenuF()" onload="adjustFooter(3)">
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

<h1 id="productsTitle">Products</h1>

<form action="products.php" method="get">
<input placeholder="e.g. Purple Hoodie"type="text" name="product">
<input value="Search" type="submit">
</form>

<br>
<div id="NavProducts">
<a>Show: </a>
<button onclick="location.href='products.php';">All</button>
<button onclick="location.href='products.php?product=Tshirt';">T-shirts</button>
<button onclick="location.href='products.php?product=Hoodie';">Hoodies</button>
<button onclick="location.href='products.php?product=Jumper';">Jumpers</button>
</div>

<div id="forProduct"></div>
<?php
// Start the session
session_start();
$servername = "localhost";
$username = "ctopaka";
$password = "ChrisPH1217";
$dbname = "ctopaka";

if (isset($_SESSION['loginEmail']))
    {
        echo "<script>var signup = document.getElementById('signUpMenu');           //to change the signup button to log out
              signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
        echo "<script>var signup = document.getElementById('signUpMenuHam');        //to change the signup button to log out on hamburger menu
                                    signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
    }

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "ERROR: could not connect to database to retrieve offers" . mysqli_connect_error();
    echo "<br>";
 }



if (!$_GET) {           //case where user didnt search for anything

    $query = "SELECT *
              FROM tbl_products;";
    $result = $connection -> query($query);


    echo "<div class=\"grid\">";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fetches the array
        {
            echo "<div class=\"container\">";
            //puts the image on the page:
            echo "<img src='".$row["product_image"]."'style=\"border-radius: 70%; width:150px;\" alt='Product image'>";
            // echo "<img src='".$row["product_image"]."'style=\"max-width: 10%;\">";
            //puts the product title on the page:
            echo "<br>"."<p style=\"color: #F47721;font-weight: bolder;font-size: large;\">".$row["product_title"]."</p>";
            //puts description on the page:
            echo "<p style=\"font-size: small;\">".$row["product_desc"]."</p>";
            //link for more details (item.php):
            echo "<a href=\"item.php?id=" .$row["product_id"]."&title=".$row["product_title"]."&desc=".$row["product_desc"]."&img=".$row["product_image"]."&price=".$row["product_price"]."&type=".$row["product_type"]."\">More details</a>";
            echo "<br>";
            //puts price on the page:
            echo "£".$row["product_price"]."<br>";
            //button for add to cart. when clicked Adds the details of the item to the local storage and then using GET its being presented in the cart
            echo "<input type='button' style=\" display: inline-block;text-decoration: none; background-color: #006250; border: none; color: white;\" onclick='addToCart(".$row["product_id"].",\"".$row["product_title"]."\",\"".$row["product_desc"]."\",\"".$row["product_image"]."\",\"".$row["product_price"]."\",\"".$row["product_type"]."\")' value='Add to cart'/>";
            echo "<br>";
            echo "</div>";

        }
        echo "</div>";
}
else if (!(preg_match("/[a-z]/i", $_GET["product"]))) {     //case where user searched with anything else than letters
    $query = "SELECT *
              FROM tbl_products;";
    $result = $connection -> query($query);


    echo "<div class=\"grid\">";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fetches the array
        {
            echo "<div class=\"container\">";
            //puts the image on the page:
            echo "<img src='".$row["product_image"]."'style=\"border-radius: 70%; width:150px;\" alt='Product image'>";
            // echo "<img src='".$row["product_image"]."'style=\"max-width: 10%;\">";
            //puts the product title on the page:
            echo "<br>"."<p style=\"color: #F47721;font-weight: bolder;font-size: large;\">".$row["product_title"]."</p>";
            //puts description on the page:
            echo "<p style=\"font-size: small;\">".$row["product_desc"]."</p>";
            //link for more details (item.php):
            echo "<a href=\"item.php?id=" .$row["product_id"]."&title=".$row["product_title"]."&desc=".$row["product_desc"]."&img=".$row["product_image"]."&price=".$row["product_price"]."&type=".$row["product_type"]."\">More details</a>";
            echo "<br>";
            //puts price on the page:
            echo "£".$row["product_price"]."<br>";
            //button for add to cart. when clicked Adds the details of the item to the local storage and then using GET its being presented in the cart
            echo "<input type='button' style=\" display: inline-block;text-decoration: none; background-color: #006250; border: none; color: white;\" onclick='addToCart(".$row["product_id"].",\"".$row["product_title"]."\",\"".$row["product_desc"]."\",\"".$row["product_image"]."\",\"".$row["product_price"]."\",\"".$row["product_type"]."\")' value='Add to cart'/>";
            echo "<br>";
            echo "</div>";

        }
        echo "</div>";
}
else if ((preg_match("/[a-z]/i", $_GET["product"])))
{

$str = strtolower($_GET["product"]);
$space = ' ';
$allWords = explode($space, $str);

$counter = 0;
echo "<div class=\"grid\">";
foreach ($allWords as $word) {
    $testing=$_GET["product"];
     $query = "SELECT * FROM tbl_products
                WHERE lower(product_title) LIKE \"%".$word."%\"
                   OR lower(product_title) LIKE \"%".$word."%\";";

    $result = $connection -> query($query);



            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fetches the array
            {
                echo "<div class=\"container\">";
                //puts the image on the page:
                echo "<img src='".$row["product_image"]."'style=\"border-radius: 70%; width:150px;\" alt='Product image'>";
                // echo "<img src='".$row["product_image"]."'style=\"max-width: 10%;\">";
                //puts the product title on the page:
                echo "<br>"."<p style=\"color: #F47721;font-weight: bolder;font-size: large;\">".$row["product_title"]."</p>";
                //puts description on the page:
                echo "<p style=\"font-size: small;\">".$row["product_desc"]."</p>";
                //link for more details (item.php):
                echo "<a href=\"item.php?id=" .$row["product_id"]."&title=".$row["product_title"]."&desc=".$row["product_desc"]."&img=".$row["product_image"]."&price=".$row["product_price"]."&type=".$row["product_type"]."\">More details</a>";
                echo "<br>";
                //puts price on the page:
                echo "£".$row["product_price"]."<br>";
                //button for add to cart. when clicked Adds the details of the item to the local storage and then using GET its being presented in the cart
                echo "<input type='button' style=\" display: inline-block;text-decoration: none; background-color: #006250; border: none; color: white;\" onclick='addToCart(".$row["product_id"].",\"".$row["product_title"]."\",\"".$row["product_desc"]."\",\"".$row["product_image"]."\",\"".$row["product_price"]."\",\"".$row["product_type"]."\")' value='Add to cart'/>";
                echo "<br>";
                echo "</div>";
                $counter ++;
            }


}

echo "</div>";
            if($counter==0)
            echo "<p>".$counter." Results</p>";

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