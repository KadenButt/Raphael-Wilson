<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
    <style>

    @media (max-width: 768px) {
        #navigation {
            flex-direction: column;
            align-items: center;
        }

        .basket-container {
            align-items: center;
            flex-direction: column;
        }

        .black-shoe img {
            width:150px;
        }

        .basket-contents {
            max-width: 100%;
        }
    }
       body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ebf3f7;
            color: #104904;
        }

        .luxury-text {
            flex-grow: 1;
            text-align: center;
            font-family: Arial, sans-serif;
            white-space: nowrap; /*stops text going underneath when larger*/
            overflow: hidden; /*so it doesnt overflow the container*/
            color: #ebf3f7;
            font-weight: bold;
            margin: 0;   
        }

        .basket-text {
            text-align: center;
            font-size: 30px;
        }

        .basket-contents {
            text-align: left;
            position: relative;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            margin-top:5%;
            margin-left:20px;
            margin-right: 40%;
            width:100%;
            max-width:400px;
            padding: 15px;
            padding-bottom:5px;
            box-sizing: border-box;
        }

        .basket-contents h2{
            margin-top:0%;
        }

        .basket-container {
            display:flex;
            align-items:flex-start;
            flex-wrap: nowrap;
            position:relative;
        }

        .black-shoe {
            margin-top:5%;
            margin-left:5%;
            width:200px;
            height:auto;
            object-fit:cover;
        }

        .black-shoe img {
            width:200px;
            height:auto;
            object-fit:cover;
        }

        #navigation {
            display: flex;
            align-items: center; 
            justify-content: space-between;
            background-color: #104904;
            padding: 5px 20px;
            box-sizing: border-box;
            overflow: visible;
        }

        #navigation img {
            flex-shrink: 0; /*stops logo shrinking*/
            width: 70px;
            height: 70px;
        }

        .right-section {
            display: flex;
            align-items: center;
            gap: 15px; 
            flex-shrink: 0;
        }

   
        .nav-buttons {
            display: flex;
            gap: 10px;
        }

        .nav-buttons button {
            padding: 10px 20px;
            background-color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size:15px;
            color: #104904;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-buttons button:hover {
            background-color: #ebf3f7;
            color: #104904;
            box-shadow: 0 6px 6px rgba(0.2, 0.2, 0.2, 0.2);
            
        }

        .dropdown {
            position: relative;
        }

        .menu-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            background: none;
            border: none;
            height: 30px; 
            gap: 6px; 
        }

        .menu-icon {
            background-color: white;
            width: 35px;
            height: 6px;
            border-radius: 2px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 120%;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0.2, 0.2, 0.2, 0.2);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            color: #104904;
            text-decoration: none;
            font-weight: bold;
            white-space: nowrap;
        }

        .dropdown-menu a:hover {
            background-color: #ebf3f7;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
        button.link {
            background:none;
            border:none;
            color: #ebf3f7;
            cursor:pointer;
        }
        .total {
            text-align: left;
            position: absolute;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            top:auto;
            bottom:5%;
            right:10%;
            width:80%;
            max-width:300px;
            padding: 10px;
            padding-bottom:5px;
            box-sizing: border-box;
        }
        .checkout-button {
            display: block;
            margin: 10px auto 0; 
            padding: 5px 15px;
            background-color: white;
            color: #104904;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
}

        .checkout-button:hover {
            background-color: #ebf3f7;
            color: #104904;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header id="navigation">

        <a href="home.blade.php">
        <img src="Raphael-wilson-logo.png" alt="Logo">
        </a>

        <div class="luxury-text">
            <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
        </div>

        <div class="right-section">

            <div class="nav-buttons">
                <button id="signup" onclick="window.location.href='register.blade.php'">Sign Up</button>
                <button id="login" onclick="window.location.href='login.blade.php'">Log In</button>
            </div>


            <div class="dropdown">
                <button class="menu-button">
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                    <div class="menu-icon"></div>
                </button>
                <div class="dropdown-menu">
                    <a href="home.blade.php">Home</a>
                    <a href="products.blade.php">Products</a>
                    <a href="contact.blade.php">Contact</a>
                    <a href="aboutus.blade.php">About us</a>
                    <a href="basket.blade.php">Basket</a>
                </div>
            </div>
        </div>
    </header>

        <div class ="basket-text">
            <h1>Basket</h1>
        </div>

        <div class="basket-container">
            <div class="black-shoe">
                <img src="black-shoe.png" alt="black-shoe">
            </div>

            <div class="basket-contents">
                <h2>Guzzi dress shoe
                </h2>
                <div class="shoe-description">
                <p>
                    Indulge in the pinnacle of luxury footwear
                    <br>
                    <b>Size: </b>9
                    <br>
                    <b>Quantity: </b>1
                    <br>
                    In stock
                    </p>
                    <h3>£1,499</h3>
                </div>
                <div class="delete-button">
                    <button class="link">Delete</button>
                </div>
            </div>
            <div class="total">
            <h2>Total: £1,499</h2>
            <button class="checkout-button" onclick="window.location.href='checkout.blade.php'"><h2>Continue to Checkout</h2></button>
            </div>
            
        </div>
        

</body>
</html>
