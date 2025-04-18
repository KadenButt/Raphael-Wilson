<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
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
      @guest
      <div class="nav-buttons">
        <button id="signup" onclick="window.location.href='{{route('register')}}'">Sign Up</button>
        <button id="login" onclick="window.location.href='{{route('login')}}'">Log In</button>
      </div>
      @endguest



      <button id="themeToggleBtn" 
        style="padding: 10px; 
               border-radius: 4px; 
               font-weight: bold; 
               background-color: #fff; 
               color: #104904; 
               border: 2px solid #104904; 
               cursor: pointer;
               transition: background-color 0.3s ease, color 0.3s ease;">
        Dark Mode
      </button>





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
          
          @auth
          <a href="{{route('basket')}}">Basket</a>
          <a href="{{route('order')}}">Order History</a>
          <a href="{{route('customer.details')}}">Change Customer Details</a>
          @auth
          @if(session('admin'))
          <a href="{{ route('admin.home') }}">Admin Home</a>
          @endif
          @endauth
          <a href="{{route('logout')}}">Logout</a>

          @endauth
        </div>
      </div>
    </div>
  </header>

<body>

    <div class="order-header">
        <h2>Your Orders</h2>
    </div>

    @if(session('success'))
    <div class="order-confirmation">
        <p>{{session('success')}}</p>
    </div>
    @endif

    <div class="orders-container">
        @for ($i = 0; $i < count($orderItems); $i++)
            <div class="order">
            <div class="order-photo1">
                <img src="data:image/jpeg;base64,{{ base64_encode($products[$i]->product_photo) }}" alt="shoe">
            </div>
            <div class="order-details">
                <p><b>{{ $products[$i]->product_name }}</b></p>
                <p>Order Status: {{ $orders[ $orderItems[$i]->order_id ]->order_status }}</p>
                <p>Order Number: {{$orderItems[$i]->order_id}}</p>
                <p>Quantity: {{$orderItems[$i]->order_item_quantity}}
                <p><b> £{{$products[$i]->product_price * $orderItems[$i]->order_item_quantity}} </b></p>
            </div>
            <form id='delete-order' method='POST' action="{{ route('order.delete') }}">
                @csrf
                <button id="cancel-button" type='submit'> Cancel Order</button>
                <input type="hidden" name="order_item_id" value="{{$orderItems[$i]->order_item_id}}" />

            </form>
    </div>
    @endfor
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
        margin-top: -2%;
        font-size: 30px;
        text-align: center;
    }

    .order-confirmation {
        margin-left: 5%;
        margin-top: -2%;
    }

    .orders-container {
        display: grid;
        flex-wrap: wrap;
        position: relative;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: -1%;
    }

    .order {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 5px;
        margin: 0;

    }

    .order img {
        width: 100%;
        height: auto;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        display: block;
        margin: 0;
        padding: 0;
    }

    .order-photo1 {
        width: 60%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .order-details {
        color: #ebf3f7;
        background-color: #104904;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        width: 60%;
        text-align: center;
        margin: 0;
    }

    #cancel-button {
        margin-top: 10px;
        font-weight: bold;
        border: none;
        color: #ebf3f7;
        background-color: #104904;
        border-radius: 50px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    #cancel-button:hover {
        background-color: #ebf3f7;
        color: #104904;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
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
        white-space: nowrap;
        /*stops text going underneath when larger*/
        overflow: hidden;
        /*so it doesnt overflow the container*/
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
        flex-shrink: 0;
        /*stops logo shrinking*/
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

    }

    .dropdown-menu a:hover {
        background-color: #ebf3f7;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>