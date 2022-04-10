<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="Styling.css">
    <script src="Script.js"></script>
</head>

<body onresize="mobMenuF()" onload="adjustFooter(1)">
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


    <div id="mainBody">
        <div class="offers">
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



$query = "SELECT *
          FROM tbl_offers;";
$result = $connection -> query($query);
echo "<p
    style='text-align: center;
     font-size:2vw;
    font-weight: bold;
    color: #34516C;
    width: 100%;
    text-decoration: underline;
    '>"."Offers"."</p>";


    echo "<ol>";    //defines the ordered list

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))    //fethces the array
    {


        echo "<h1 style='margin-left: auto;
             margin-right: auto;
             margin-top: 10px;
             width: 30em;
             background-color: 	#808080;
             color: #F2BE1A;
             font-size:2vw;
             text-align: center;'>". $row["offer_title"]."</h1>";  //presents all the offer titles
              echo "<h1 style='margin-left: auto;
                          margin-right: auto;
                          margin-top: 10px;
                          width: 30em;
                          color: black;
                          font-size:1vw;
                          text-align: center;'>". $row["offer_dec"] ."</h1>";  //presents all the offer titles




    }
    echo "</ol>";


?>
<hr>
        </div>
        <p id="mainTitle">Where opportunity creates success</p>
        <p id="firstParagraph">Every UCLan Cyprus student becomes automatically a member of the Student Union. <br>UCLan Students’ Union exists improve the life of students.<br>Find more information about the university below.</p>
        <div id="firstVideoDiv">
            <h1>Our Open Day</h1>
            <video id="firstVideo" src="UCLan Together - Open Days.mp4" controls="controls"></video>
        </div>
        <div id="secVideoDiv">
            <h1 style="color: #F2BE1A; font-weight: bolder; font-size: xx-large">UCLan Cyprus</h1>
            <iframe id="secondVideo"  src="https://www.youtube.com/embed/xJA8fobI4_k"  title="Together" allowfullscreen></iframe>
        </div>
    </div>

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