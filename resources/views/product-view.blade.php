<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
</head>
<header id="navigation">

<a href="home.blade.php">
<img src="Raphael-wilson-logo.png" alt="Logo">
</a>

<div class="luxury-text">
    <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
</div>

<div class="right-section">

    <div class="nav-buttons">
        <button id="signup" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
        <button id="login" onclick="window.location.href='{{ route('login') }}'">Log In</button>
    </div>


    <div class="dropdown">
        <button class="menu-button">
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
        </button>
        <div class="dropdown-menu">
            <a href="'{{ route('home') }}'">Home</a>
            <a href="'{{ route('products') }}'">Products</a>
            <a href="'{{ route('contact') }}'">Contact</a>
            <a href="'{{ route('about') }}'">About us</a>
            <a href="'{{ route('basket') }}'">Basket</a>
        </div>
    </div>
</div>
</header>

<body>

    <div class="product-container">
            <div class="black-shoe">
                <img src="black-shoe.png" alt="black-shoe">
            </div>

            <div class="product-view">
                <h2>Guzzi dress shoe</h2>
                <div class="shoe-description">
                <p>
                    <b>Indulge in the pinnacle of luxury footwear</b>
                    <br>
                    Crafted from the finest leather with a polished black finish, these shoes exude sophistication and style.
                    Featuring a cushioned insole for unparalleled comfort and a subtly elevated heel, providing elegance and presence.
                    <br><br>
                    <label for="size"><b>Size:</b></label>
                    <input type="number" id="size" name="size" min="1" max="12">
                    <br><br>
                    <label for="quantity"><b>Quantity:</b></label>
                    <input type="number" id="quantity" name="quantity" min="1">
                    <br><br>
                    In stock
                    <br><br>
                    Sold by: Raphael Wilson
                    <br><br>
                    Dispatched by: Raphael Wilson
                    </p>
                    <h3>£1,499</h3>
                </div>
            </div>
            <button class="basket-button" onclick="window.location.href='{{ route('basket') }}'"><h2>Add to Basket</h2></button>
        </div>

    
</body>
</html>

<style>
@media (max-width: 768px) {
        #navigation {
            flex-direction: column;
            align-items: center;
        }

        .product-container {
            align-items: center;
            flex-direction: column;
        }

        .black-shoe img {
            width:150px;
        }

        .product-view {
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


        .product-view {
            flex-grow: 1;
            display: flex;
            flex-direction: column; /*keeps content vertical*/
            justify-content: space-between;
            text-align: left;
            position: relative;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            margin-top:5%;
            margin-left:20px;
            margin-right: 15%;
            width:auto;
            height:auto;
            max-width:100%;
            padding: 15px;
            padding-bottom:5px;
            box-sizing: border-box;
        }

        .product-view h2{
            margin-top:0%;
        }

        .product-container {
            display:flex;
            align-items:flex-start;
            gap: 20px;
            position:relative;
        }

        .black-shoe {
            flex-shrink:0;
            margin-top:5%;
            margin-left:5%;
            width:100%;
            height:auto;
            object-fit:cover;
            max-width: 400px;
        }

        .black-shoe img {
            width:100%;
            height:auto;
            object-fit:cover;
        }

        .basket-button {
            position:absolute;
            bottom:-15%;
            right: 15%;
            display: inline-block;
            margin: 10px auto 0; 
            padding: 5px 15px;
            background-color: #104904;
            color: white;
            font-weight: bold;
            font-size: 12px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
        
        }

        .basket-button:hover{
            background-color: #ebf3f7;
            color: #104904;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
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
</style>