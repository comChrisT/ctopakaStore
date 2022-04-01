<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styling.css">
    <link rel="stylesheet" href="signup.css">
    <script src="Script.js"></script>

</head>

<body onresize="mobMenuF()" onload="adjustFooter(1)">
    <header class="bar">

            <img id="uclanlogo" src="uclan logo.png"   alt="uclan logo"/>

            <ul id="topElements">
                <a href="index.php">Home</a>
                <a href="products.html">Products</a>
                <a href="cart.html">Cart</a>
                <a href="signup.php">Sign Up</a>

            </ul>

            <p id="heaedertitle">Student Shop</p>

            <div id="hamMenu" onclick="mobMenuChoices()"></div>
            <div id="hamMenuChoices">
                <a href="index.html">Home</a>
                <a href="products.html">Products</a>
                <a href="cart.html">Cart</a>
            </div>

    </header>

<button id="goTopButton" onclick="GoTop()">Go top</button>
<br>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="post" action="registerUser.php">
            <div class="form-item">
                <p>Full Name:</p>
                    <input type="text" name="fullName" id="fullName" placeholder="e.g. John Smith" required>
                </div>

                <div class="form-item">
                <p>Email:</p>
                    <input type="email" name="email" id="email" placeholder="e.g. example@gmail.com" required>
                </div>

                <div class="form-item">
                <p>Address:</p>
                    <input type="text" name="address" id="address" placeholder="e.g. Saint George Street, N2" required>
                </div>

                <div class="form-item">
                <p>Password:</p>
                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password1" id="password1" placeholder="Enter password" required>
                    <br>
                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="confirmPassword" id="confirmPassword" placeholder="Re-enter password" required>
                    <p id="notMatch" style="display:none; color:red;font-size:15px;">Passwords do not match!</p>
            </div>
      <div id="passwordMessage">
      <h3>Password must contain the following:</h3>
      <p id="letters" class="invalid"><b>Lowercase Letter</b></p>
      <p id="uppercase" class="invalid"><b>Capital Letter</b></p>
      <p id="number" class="invalid"><b>A Number</b></p>
      <p id="length" class="invalid"><b>At least 8 characters</b></p>
</div>
<br>
<div class="buttonsForm">
    <button class="signup" type="submit" name="register_User">Sign Up</button>
    <div class="options">
    </div>
</div>
<br>
    <a>Already have an account?</a> <a href="#"><br>Login here</a>
</form>


    </body>


    </html>

<script>
    var userInput = document.getElementById("password1");
    var letters = document.getElementById("letters");
    var uppercase = document.getElementById("uppercase");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

       var confirmPass = document.getElementById("confirmPassword");

       function passwordVal(){
         if(userInput.value != confirmPass.value)
         {
           confirmPass.setCustomValidity("Passwords Don't Match");
           document.getElementById("notMatch").style.display = "block";
         } else
         {
           confirmPass.setCustomValidity("");
           document.getElementById("notMatch").style.display = "none";
         }
       }


    // when the password box is clicked
    userInput.onfocus = function()
    {
        document.getElementById("passwordMessage").style.display = "block";
    }

    userInput.onblur = function() {
        document.getElementById("passwordMessage").style.display = "none";
    }

    // when password is being typed
    userInput.onkeyup = function() {

        //for caps:
        var upperCaseLetters = /[A-Z]/g;
        if(userInput.value.match(upperCaseLetters)) {
            uppercase.classList.remove("invalid");
            uppercase.classList.add("valid");
        } else {
            uppercase.classList.remove("valid");
            uppercase.classList.add("invalid");
        }


        //for length
        if(userInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }


        //for numbers
        var numbers = /[0-9]/g;
        if(userInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        //for low caps:
        var lowerCaseLetters = /[a-z]/g;
        if(userInput.value.match(lowerCaseLetters)) {
            letters.classList.remove("invalid");
            letters.classList.add("valid");
        } else {
            letters.classList.remove("valid");
            letters.classList.add("invalid");
        }


    }

    userInput.onchange = passwordVal;
    confirmPass.onkeyup = passwordVal;

</script>

