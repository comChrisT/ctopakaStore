//function to implement the hamburger menu when required and change the text accordingly to be responsive
function mobMenuF()
{
    /*for mobile menu*/
    if (screen.width<860)
    {
        document.getElementById('hamMenu').innerHTML = '<img src="Hamburger_icon.png"  height="40" width="40" alt="Mobile Menu"/>';
        //to remove the normal menu:
        document.getElementById('topElements').style.display="none";


        /*for changing the size of "Student Shop"*/
        document.getElementById("heaedertitle").style.fontSize = "16px";
        document.getElementById("heaedertitle").style.marginTop="30px";
        document.getElementById("heaedertitle").style.marginLeft="255px";


        /*for changing the size of the uclan logo*/
        document.getElementById("uclanlogo").style.width='220px';
        document.getElementById("uclanlogo").style.height='70px';

        //for changing the footer
        document.getElementById("group1Footer").style.marginLeft='60px';
        document.getElementById("footer").style.fontSize="10px";


    } else
    {
        //makes the hamburger menu disappear
        document.getElementById('hamMenu').innerHTML = '';
        document.getElementById('topElements').style.display="block";
        //makes the hamburger menu choices disappear
        let i = document.getElementById('hamMenuChoices');
        i.style.display="none";

        /*for changing the size of "Student Shop"*/
        document.getElementById("heaedertitle").style.fontSize = "32px";
        document.getElementById("heaedertitle").style.marginTop="20px";

        /*for changing the size of the uclan logo*/
        document.getElementById("uclanlogo").style.width='390px';
        document.getElementById("uclanlogo").style.height='120px';

    }

    if ((screen.width>860)&&(screen.width<1260))
    {
        /*for changing the size of "Student Shop"*/
        document.getElementById("heaedertitle").style.fontSize = "23px";
        document.getElementById("heaedertitle").style.marginTop="-20px";
        document.getElementById("heaedertitle").style.marginLeft="300px";



        /*for changing the size of the uclan logo*/
        document.getElementById("uclanlogo").style.width='260px';
        document.getElementById("uclanlogo").style.height='80px';


        //for footer
        document.getElementById("group1Footer").style.marginLeft='200px';
        document.getElementById("footer").style.fontSize="13px";
    }
    //for changing the footer/ responsive
    if((screen.width<=915)&&(screen.width>=860))
    {
        document.getElementById("group1Footer").style.marginLeft='100px';
    }
    if (screen.width<621)
    {
        document.getElementById("footer").style.fontSize="8px";
    }

    if (screen.width<530)
    {
        document.getElementById("group1Footer").style.marginLeft='0px';
        document.getElementById("footer").style.fontSize="8px";
    }
    if (screen.width<470)
    {
        document.getElementById("footer").style.fontSize="6px";
    }
    if ((screen.width<1500)&&(screen.width>1260))
    {
        document.getElementById("group1Footer").style.marginLeft='260px';
    }

    if (screen.width>1500)
    {
        document.getElementById("group1Footer").style.marginLeft='330px';
        document.getElementById("footer").style.fontSize="20px";
    }


}

//function responsible for showing the choices when the hamburger menu is clicked
function mobMenuChoices()
{
    let y;
    y = document.getElementById("hamMenuChoices");
    if (y.style.display === "none")
    {
        y.style.display = "block";

    }
    else
    {
        y.style.display = "none";
    }
}


//function to view details based on sessionStorage
function viewDetails(index){
    //JSON converts an object to string.
    sessionStorage.select=JSON.stringify(clothes[index]);
    sessionStorage.selectindex=JSON.stringify(index);

    window.location.href="item.php"; //takes him to the item page
}

//function to add item to cart using localstorage
function addToCart(id,title,desc,image,price,type){
    var clothes=[

        {
            id:id,
            title:title,
            type:type,
            description:desc,
            price:price,
            imagePath:image,
        }
        ]
    let storedCart;
    if (localStorage.cart){
        storedCart=JSON.parse(localStorage.cart);       //if cart exists
    }else{
        storedCart=[];     //if the cart doesn't exist
    }
    storedCart.push(clothes[0]);
    localStorage.cart=JSON.stringify(storedCart);
    alert("Item added to cart!")

}

//function to remove specific item from cart
function removeFromCart(index){
    let cart=JSON.parse(localStorage.cart);
    cart.splice(index, 1);  //deletes the item
    cart=JSON.stringify(cart);
    localStorage.setItem('cart',cart);  //resets the item in order for it to be empty
    alert("Item "+index+" removed")
    location.reload();          //to reload the page and show the updated cart



}

//to go to top of the page
function GoTop() {
    document.getElementById("uclanlogo").scrollIntoView({behavior: 'smooth'});
}

//to load the item in the item.php page
function loadItemPage(){

    let clothe = JSON.parse(sessionStorage.select);    //converts the text back to javascript object
    let clotheIndex = Number(JSON.parse(sessionStorage.selectindex));

    document.getElementById("product").innerHTML +="<img src=\""+clothe.imagePath+"\""+" alt='Product image' style=\"border-radius: 70%;\" width="+"\""+"400px"+"\""+"><br>";
    document.getElementById("product").innerHTML +="<br/>"+ "<p style=\"color: #F2BE1A;font-weight: bolder;font-size: large;\">"+clothe.type+"-"+clothe.colour + "</p>";
    document.getElementById("product").innerHTML +="<p style=\"font-size: small; padding-left: 180px; padding-right:180px;\">"+clothe.description + "<br><br>"+"</p>"+clothe.price+"<br></div>";
    document.getElementById("product").innerHTML +="<input type='button' style=\" display: inline-block;text-decoration: none; background-color: #F47721; border: none; color: white;\" onclick='addToCart(" + clotheIndex + ")' value='Add to cart'/>";

}

//Function to load the cart in cart.php
function loadCartPage(){
    //check if there are items in cart
    if (("cart" in localStorage)&&(localStorage.getItem("cart")!="[]")) {       //the second condition is to check whether the cart was emptied by removing the items one by one
        let count = 0;
        let storedClothes = JSON.parse(localStorage.cart);
        document.getElementById("CartDescr").innerHTML +="<p style=\"margin-top: 10px; text-align: center;\">Items added to your cart:</p>";
        document.getElementById("CartDescr").innerHTML +="<p style=\"display: inline;margin-top: 10px; margin-left:-40px;margin-right: 120px;font-weight: bold;\">Item</p>";
        document.getElementById("CartDescr").innerHTML +="<p style=\"display: inline;margin-top: 10px;margin-right: 90px;font-weight: bold;\">Product</p>";
        document.getElementById("CartDescr").innerHTML +="<p style=\"display: inline;margin-top: 10px;margin-left:40px;font-weight: bold;\">Price</p>";


        //goes through all the items in the cart
        storedClothes.forEach(
                clothe => {
                    document.getElementById("cartItem").innerHTML += "<img src=\"" + clothe.imagePath + "\"" + "alt='product image' " +
                        "style=\" margin-top: 20px;float: left; border-radius: 70%;\" width=" + "\"" + "60px" + "\";" + "><br></img>";
                    document.getElementById("cartItem").innerHTML += "<p style='display: inline; margin-right: 90px; float:left;'><br>" +
                        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+count+"</p>";
                    document.getElementById("cartItem").innerHTML += "<p style='display: inline;margin-right: 70px;float:left;'><br>" + clothe.title + "</p>";
                    document.getElementById("cartItem").innerHTML += "<p style='display: inline;margin-right: 70px;float:left;'><br>" + clothe.price + "</p>";
                   // document.getElementById("cartItem").innerHTML += "<p style='display: inline;float:left;'><br>" + clothe.colour + "</p>";
                    document.getElementById("cartItem").innerHTML += "<input type='button' style=\" margin-top:35px;display: inline-block;text-decoration: none; background-color: #F47721; border: none; color: white;\" onclick='removeFromCart(" + count + ")' value='Remove from cart'/>";
                    document.getElementById("cartItem").innerHTML += "<p><br><br></p>";
                    count++;
                }
            )
    }
    else {
        //shows a message if the cart is empty
        document.getElementById("cartItem").innerHTML += "<img src=\"emptyCart.png\" alt='Oops! Your cart is empty! Image' style='text-align: center; width: 90%;' >";
        /*Reference for picture: Reddy, K. (n.d), Oops! Your cart is empty!. [Online]
                                 Available at: https://dribbble.com/shots/11302442-Oops-Your-cart-is-empty#
                                 [Accessed 12 December 2021].*/
        document.getElementById("cartItem").innerHTML += "<p style='font-weight: bold'> Go shopping! </p>";
        document.getElementById("checkout").style.display='none';   //to hide the checkout button when the cart is empty
    }
}

//function to remove the localstorage/ empty cart
function emptyCart(){
    if ("cart" in localStorage) {
        localStorage.removeItem('cart');
        alert("Your cart is now empty")
        location.reload();          //to reload the page and show the cart empty
        location.reload();          //to reload the page and show the cart empty
    }
    else
    {
        alert("Your cart is already empty!!!")
    }
}


//takes the user to the first tshirt
function goToTshirts(){
    window.find("Tshirt");
    window.getSelection().empty();
}

//takes the user to the first hoddie
function goToHoodies(){

    window.find("Hoodie");
    window.getSelection().empty();
}

//takes the user to the first jumper
function goToJumpers(){
    window.find("cotton authentic character and practicality are combined in this winter jumper");
    window.getSelection().empty();
}

//adjusts the footer top margin based on which page you are
function adjustFooter(name){
    switch(name) {
        case 1:
            document.getElementById("footer").style.marginTop="20px";           //for adjusting the margin for index.php
            break;
        case 2:
            document.getElementById("footer").style.marginTop="100px";          //for adjusting the margin for cart.php
            break;
        case 3:
            document.getElementById("footer").style.marginTop="0px";            //for adjusting the margin for products.php
            break;
        case 4:
            document.getElementById("footer").style.marginTop="290px";          //for adjusting the margin for item.php
            break;
    }



}
