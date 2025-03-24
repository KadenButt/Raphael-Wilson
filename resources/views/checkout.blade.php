<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
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
                <a href="{{route('order')}}">Order History</a>
                <a href="{{route('customer.details')}}">Change Customer Details</a>
                @if(session('admin'))
                <a href="{{ route('admin.home') }}">Admin Home</a>
                @endif
                <a href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
</header>
<body>
    <h1>Checkout</h1>
    <div class="checkout-section">
        <h3 id="total_price">Total Price: £{{$price}}</h3>
        <input type="hidden" name="total_price" value="{{ $price }}">
        <div class="payment-container">
            <input type="email" name="Email address" placeholder="Email Address" required>
            <br>
            <input type="text" name="Payment-Number" placeholder="Payment Number" required>
            <br>
            <input type="password" name="CVV" placeholder="CVV number" required>
            <br>
            <div class="save-payment">
                <input type="checkbox" name="Save Payment">
                <label for="Save Payment"> Please tick the box if you would like to save your payment information for future purchasing</label>
                <br>
            </div>
        </div>
        <div class="button-container">
            <button class="checkout-button" onclick="window.location.href='{{route('order')}}'">Purchase Order</button>
            <button class="basket-button" onclick="window.location.href='{{route('basket')}}'">Return to Basket</button>
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

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #ebf3f7;
    color: #104904;
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
    flex-shrink: 0;
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
    font-size: 15px;
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
    top: 100%;
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
    background: none;
    border: none;
    color: #ebf3f7;
    cursor: pointer;
}

.luxury-text {
    flex-grow: 1;
    text-align: center;
    font-family: Arial, sans-serif;
    white-space: nowrap;
    overflow: hidden;
    color: #ebf3f7;
    font-weight: bold;
    margin: 0;
}

h1 {
    text-align: center;
    margin: 20px 0;
    font-size: 30px;

}

#total_price {
    margin: 0 0 20px 5%;
    color: #ebf3f7;
}

.payment-container {
    display: flex;
    align-items: center;
    flex-direction: column;
    gap: 5px;
}

.checkout-section {
    padding-top: 20px;
    padding: right -30px;
    margin: 0 auto; 
    background-color: #104904;
    border-radius: 20px;
    width: 35%;
    min-height: 400px;
    color: #ebf3f7;
}

input[type="email"] {
    border-radius: 20px;
    background-color: white;
    padding: 15px;
    width: 80%;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

input[type="text"] {
    border-radius: 20px;
    background-color: white;
    padding: 15px;
    width: 80%;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

input[type="password"] {
    border-radius: 20px;
    background-color: white;
    padding: 15px;
    width: 80%;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

.save-payment {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-top: 10px;
}

.save-payment label {
    font-size: 16px;
    color: #ebf3f7;
}

.button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    gap: 20px;
}

.checkout-button {
    cursor: pointer;
    background-color: #ebf3f7;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    font-weight: bold;
    font-size: 18px;
    color: #104904;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.checkout-button:hover {
    background-color: #ebf3f7;
    color: #104904;
    box-shadow: 0 6px 6px rgba(0.2, 0.2, 0.2, 0.2);
}

.basket-button {
    cursor: pointer;
    background-color: #ebf3f7;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    font-weight: bold;
    font-size: 18px;
    color: #104904;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.basket-button:hover {
    background-color: #ebf3f7;
    color: #104904;
    box-shadow: 0 6px 6px rgba(0.2, 0.2, 0.2, 0.2);
}

</style>
