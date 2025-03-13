<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
</head>
<header id="navigation">

    <a href="{{route('home')}}">
      <img src="{{asset('favicon_io/android-chrome-512x512.png')}} " alt="Logo">
    </a>

    <div class="luxury-text">
      <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
    </div>

    <div class="right-section">
   
      <div class="dropdown">

        <button class="menu-button">
          <div class="menu-icon"></div>
          <div class="menu-icon"></div>
          <div class="menu-icon"></div>
        </button>
        <div class="dropdown-menu">
          <a href="{{route('home')}}">Home</a>
          <a href="{{route('products')}}">Products</a>
          <a href="{{route('contact')}}">Contact</a>
          <a href="{{route('aboutUs')}}">About us</a>
          <a href="{{route('basket')}}">Basket</a>
          <a href='{{route('order')}}'>Order History</a>
          <a href="{{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </header> 

  <body>
 

<div class="logo-box">
    <img src="{{ asset('images/Screenshot_2025-10-28_105449.png')}}" alt="raphael-wilson-logo">
</div>

<div class="admin-buttons-container">
    <div class="inventory-container">
        <h1>Inventory</h1>
        <div class="link-container">
            <a href="{{route('stock')}}">View all stock <span class="arrow">&rsaquo;</span> </a>
        </div>
    </div>    

    <div class="order-container">
    <h1>Orders</h1>
    <div class="link-container">
            <a href="{{route('orders')}}">View all orders <span class="arrow">&rsaquo;</span> </a>
        </div>
    </div>

    <div class="customers-container">
    <h1>Customers</h1>
    <div class="link-container">
            <a href="{{route('customers')}}">View all customers <span class="arrow">&rsaquo;</span> </a>
        </div>
    </div>
</div>

  </body>


<style> 

.logo-box img{
    display:flex;
    margin:auto;
    width:40%;
    height:auto;
}

.logo-box {
    margin:auto;
    margin-top:1%;
    background-color: #104904;
    width:75%;
    border-radius:10px;
}

.admin-buttons-container {
    margin-top:-2%;
    display:grid;
    justify-items: center;
    align-items:center;
    grid-template-columns: repeat(3, 1fr);
    padding:30px;
}

.inventory-container a, .order-container a, .customers-container a {
    color: #ebf3f7;
    text-decoration: none; 
}

.inventory-container, .order-container, .customers-container {
    display:flex;
    margin: auto;
    text-align: center;
    flex-direction:column;
    margin:20px;
    width:30%;
    height:100px;
    padding:50px;
    padding-top:60px;
    padding-bottom:60px;
    justify-content: center;
    align-items:center;
    background-color: #104904;
    border-radius:20px;
    color: #ebf3f7;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.4);
    
}



.link-container {
    text-align: center;
}

.arrow {
    font-size: 20px;
}

.inventory-container a:hover {
    text-decoration: none;
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
            top: 100%;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0.2, 0.2, 0.2, 0.2);
            border-radius: 5px;
            overflow: hidden;
            z-index:1000;

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
