<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
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

<body>
    
    <div class="order-header">
        <h2>Your Orders</h2>
    </div>

    <div class="order-confirmation">
        <p>Order made successfully. Your order number is 17346790.</p>
    </div>
       
<div class="orders-container">

    <div class="order">
        <div class="order-photo1">
            <img src="black-shoe.png" alt="black-shoe">
        </div>
        <div class="order-details">
            <p><b>Guzzi dress shoe</b></p>
            <br>
            <label for="order-status">Order Status:</label>
            <select id="order-status" name="order-status">
                <option value="processing">Processing</option>
                <option value="dispatched">Dispatched</option>
                <option value="out-for-delivery">Out for delivery</option>
                <option value="delivered">Delivered</option>
            </select>
            <p>Order Number: 18947590</p>
            <p><b>Price: £1,499</b></p>
        </div>
        <button id="cancel-button" onclick="window.location.href='{{ route('cancel') }}'">Cancel Order</button>
    </div>

    
    <div class="order">
        <div class="order-photo2">
            <img src="black-trainer.png" alt="black-trainer">
        </div>
        <div class="order-details">
            <p><b>Prava running shoe</b></p>
            <br>
            <label for="order-status">Order Status:</label>
            <select id="order-status" name="order-status">
                <option value="processing">Processing</option>
                <option value="dispatched">Dispatched</option>
                <option value="out-for-delivery">Out for delivery</option>
                <option value="delivered">Delivered</option>
            </select>
            <p>Order Number: 174938340</p>
            <p><b>Price: £1,199</b></p>
        </div>
        <button id="cancel-button2" onclick="window.location.href='{{ route('cancel') }}'">Cancel Order</button>
    </div>
</div>

</body>
</html>

<style>

     @media (max-width: 768px) {
        #navigation {
            flex-direction: column;
            align-items: center;
        }
    }

    .order-header {
        margin-top:-2%;
        font-size:30px;
        text-align:center;
    }
            
    .order-confirmation {
        margin-left:5%;
        margin-top:-2%;
    }

    .orders-container {
        display:flex;
        gap: 20px;
        justify-content: center;
        margin-top:20px;
    }

    .order {
        display: flex;
        flex-direction: column;
        align-items: center; 
        background-color: #ebf3f7;
        padding: 15px;
        padding-bottom: 5px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); 
        width: 220px; 
}

    .order img {
        width: 180px;
        height: auto;
        object-fit: cover;
        margin-bottom: 10px;
    }


   .order-details {
        color: #ebf3f7;
        background-color: #104904;
        border-radius:20px;
        width: 100%;
        padding:10px;
        text-align:center;
   }

   #cancel-button, #cancel-button2{
        margin-top: 10px;
        font-weight:bold;
        border: none;
        color: #ebf3f7;
        background-color: #104904;
        border-radius: 50px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
}

    #cancel-button:hover, #cancel-button2:hover {
        background-color: #ebf3f7;
        color: #104904;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

   .order-details2 {
        margin-left: 50%;
        color: #ebf3f7;
        background-color: #104904;
        align-items:center;
        border-radius:20px;
        width: 160px;
        padding:10px;
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
            top: 108%;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0.2, 0.2, 0.2, 0.2);
            border-radius: 5px;
            overflow: hidden;
         
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            color: #104904;
            text-decoration: none;
            font-weight: bold;
        
        }

        .dropdown-menu a:hover {
            background-color: #ebf3f7;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
</style>