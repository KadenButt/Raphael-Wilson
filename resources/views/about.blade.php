<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
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
      text-align: center;
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

    .about-text {
      text-align: center;
      font-size: 30px;
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
  </style>
</head>

<body>
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
          <a href="{{route('logout')}}">Logout</a>

          @endauth
        </div>
      </div>
    </div>
  </header>

  <div class="about-text">
    <h1>About Us</h1>
  </div>

  <main>
    <section id="explanaition">
      <p>
        Raphael Wilson is a branded luxury footwear business, we sell to successful and wealthy individuals with an eye for designer footwear. Focusing on designer footwear including smart shoes, boots, heels, trainers, and more from prominent luxury brands.
      </p>
    </section>

    <section id="benefits">
      <h2>Why Shop With Us?</h2>
      <div class="benefit">

        <p>
          Feel confident within yourself
        </p>
      </div>
      <div class="benefit">

        <p>
          Get a personalised shopping experience
        </p>
      </div>
      <div class="benefit">

        <p>
          Shop for all your faviorite brands
        </p>
      </div>
    </section>
  </main>

</body>

</html>
