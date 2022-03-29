READ ME FILE - ASSIGNMENT - INTERACTIVE APPLICATIONS
CHRISTOS TOPAKA
20889332
ctopaka@uclan.ac.uk


The implemented pages and their explanations in this assignment are:

index.html: 
 The main page where a basic welcome message is presented. 
At the top of the page, a header which consists of a logo, the title of the page (using <p> element) as well as the navigation buttons (<a href="somepage">Some Page</a>) exist. 
After the message, an html video element exists. Right below, is an <iframe> video.
At the bottom of the page, the footer can be found which has three rows of information in a form of list (each one of the categories). 
The first one is “Links”, the second one “Contact” information and the last one is “Location”.

products.html:
 In this page, all the products are presented using an array (which has all the products as objects) stored in session storage. 
Navigation to a specific product category is possible through three buttons (t-shirts, hoodies, jumpers). Those buttons use window.find to locate the first occurrence of the chosen category 
Below each product, there is a “Read more” button, which leads to the item.htmlpage where based on session storage, the chosen product is shown. 
Right next to it, there is “Add to cart” button which adds the product to the cart value in localStorage (localStorage.cart). 
In case the session storage or the local storage do not exist, they are created. 
The page has a header and a footer, in the same fashion as in index.html.
Additionally, a button that takes the user to the top of the page is available (uses scrollIntoView and the header). 


item.html:
 In this page you can find all the details of the product (name, colour, description, price) which were retrieved from the session storage. 
Furthermore, you can add the item to the cart using this page as well, in the same way as in products.html. 
Also, a “Back” button exists, which takes you back to your previous page usign history.back(). 
In the same way as index.html and products.html, the header and footer are implemented.

cart.html:
 This page has all the products the user added to the cart, if any, based on the value stored in localStorage.
Specifically, the item number, colour, product and the image of each product are presented in a "table style" manner. 
In case the cart is empty, an appropriate message will appear in the page. 
Additionally, there is a choice to remove an individual item from the list using local storage and cart.splice. 
Also, a “Back” button exists like in item.html. A button exists to empty the whole cart using localStorage.removeItem.
Like all the above-mentioned pages, cart.html has a header and footer, no different than the other ones. 

