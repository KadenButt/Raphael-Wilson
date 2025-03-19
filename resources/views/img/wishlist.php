<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>
  <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      overflow: hidden;
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

    /* Wishlist-specific styles */
    .heart-logo {
      font-size: 48px;
      color: #0d9722;
      margin-bottom: 20px;
    }

    .wishlist-container {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
      text-align: left;
    }

    .input-group {
      margin-bottom: 20px;
    }

    select, button {
      padding: 10px;
      font-size: 16px;
      margin-right: 10px;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    li:last-child {
      border-bottom: none;
    }

    .remove-button {
      background-color: #ff4d4d;
      color: white;
      border: none;
      border-radius: 3px;
      padding: 5px 10px;
      cursor: pointer;
      font-size: 12px;
    }

    .remove-button:hover {
      background-color: #cc0000;
    }
  </style>
</head>

<body>
  <!-- Navigation Bar -->
  <header id="navigation">
    <a href="{{route('home')}}">
      <img src="{{asset('favicon_io/android-chrome-512x512.png')}}" alt="Logo">
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
          <a href='{{route('order')}}'>Order History</a>
          <a href="{{route('logout')}}">Logout</a>
          @endauth
        </div>
      </div>
    </div>
  </header>

  <!-- Wishlist Content -->
  <div class="heart-logo">
    <i class="fa fa-heart"></i>
  </div>

  <div class="wishlist-container">
    <h2>My Wishlist</h2>
    <div class="input-group">
      <select id="item-dropdown">
        <option value="">Select an item</option>
        <option value="Red Royal High Heel Shoe">Red Royal High Heel Shoe</option>
        <option value="Blue Banquet Heels">Blue Banquet Heels</option>
        <option value="Green Garden Shoes">Green Garden Shoes</option>
        <option value="Yellow Shoe">Yellow Shoe</option>
      </select>
      <button onclick="addToWishlist()">Add to Wishlist</button>
    </div>
    
    <h3>Wishlist Items:</h3>
    <ul id="wishlist-items"></ul>
  </div>

  <script>
    // Function to add selected item to the wishlist
    function addToWishlist() {
      const dropdown = document.getElementById('item-dropdown');
      const selectedItem = dropdown.value;
      const wishlistItems = document.getElementById('wishlist-items');

      if (selectedItem) {
        const li = document.createElement('li');
        li.textContent = selectedItem;

        // Add a remove button
        const removeButton = document.createElement('button');
        removeButton.className = 'remove-button';
        removeButton.textContent = 'Remove';
        removeButton.onclick = function() {
          wishlistItems.removeChild(li);
        };

        li.appendChild(removeButton);
        wishlistItems.appendChild(li);
        dropdown.value = ''; // Reset dropdown
      }
    }
  </script>
</body>

</html>