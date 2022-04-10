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


<?php
    // Start the session
    session_start();
    $servername = "localhost";
    $username = "ctopaka";
    $password = "ChrisPH1217";
    $dbname = "ctopaka";
    $connection = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_errno())
    {
        echo "ERROR: could not connect to database to retrieve offers" . mysqli_connect_error();
        echo "<br>";
     }
    if (isset($_SESSION['loginEmail'])) //when user is logged in
    {
        echo "<script>var signup = document.getElementById('signUpMenu');           //to change the signup button to log out
              signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
        echo "<script>var signup = document.getElementById('signUpMenuHam');        //to change the signup button to log out on hamburger menu
                                    signup.href = 'logout.php';signup.innerHTML = 'Logout';</script>";
    }
    echo "<div class='grid'>";
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
    echo "</div>";
    $query = "SELECT * FROM tbl_reviews WHERE product_id='".$_GET["id"]."';";
    $result = $connection -> query($query);

    $totalRating=0;
    $counter=0;
    //FOR REVIEWS:
    if ((mysqli_num_rows($result) > 0))  //if reviews for this product exist
    {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fetches the array
        {
            $totalRating = $row["review_rating"] + $totalRating;
            $counter++;
        }
        $totalRating=$totalRating/$counter;
        echo "<p style=\"color: #a92a2a;font-weight: bolder;font-size: x-large; text-align: center;\">Average Rating: ".$totalRating."</p>";
        $query = "SELECT * FROM tbl_reviews
                        WHERE product_id='".$_GET["id"]."';";

        $result = $connection -> query($query);

         while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fetches the array
        {
            echo "<div class=\"containerRev\">";
            //puts the title of the review on the page:
            echo "<p style=\"color: #F47721;font-weight: bolder;font-size: large;\">".$row["review_title"]."</p>";
            //puts the description of the review on the page:
            echo "<p style=\"font-size: small;\">".$row["review_desc"]."</p>";
            //puts the rating of the review on the page:
            echo "<p style=\"font-size: small;\"><strong>Rating (0-5): </strong>".$row["review_rating"]."</p>";
            echo "</div>";
        }

    }


    if (isset($_SESSION['loginEmail'])) //when user is logged in
    {
        echo "<div class='container'>";
        echo "<form method=\"post\" action=\"submitReview.php\">
                          <div class=\"form-item\">
                              <p>Title:</p>
                                  <input type=\"text\" name=\"title\" id=\"title\" placeholder=\"e.g. Great Product\" required>
                              </div>

                              <div class=\"form-item\">
                              <p>Comment:</p>
                                  <input type=\"comment\" name=\"comment\" id=\"comment\" placeholder=\"e.g. Good quality\" required>
                              </div>

                              <div id='slider' class=\"form-item\">
                              <p>Rating (0-5):</p>
              					<input type=\"range\" id=\"rating\" name=\"rating\" min=\"0\" max=\"5\">
                              </div>
                              <input type='hidden' value='".$_GET["id"]."' id='productId' name='productId'>

                          <div class=\"buttonsForm\">
                              <button class=\"review\" type=\"submit\" name=\"User_review\">Submit</button>
                          </div>
                          <br>


                  </form>";
        echo "</div>";
    }
?>

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