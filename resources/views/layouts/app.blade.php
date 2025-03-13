<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'My Website')</title>
  <link rel="icon" type="image/png" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

  <style>
    /*************************************************
     * 1) Base / Global Styles
     *************************************************/
    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #ebf3f7; /* Light mode background */
      color: #104904;          /* Light mode text color */
      transition: background-color 0.3s, color 0.3s;
    }
    /* Dark mode styles when .dark is applied on body */
    body.dark {
      background-color: #111;
      color: #eee;
    }

    /*************************************************
     * 2) Navigation Bar 
     *************************************************/
    #navigation {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #104904; /* light mode nav background */
      padding: 5px 20px;
      box-sizing: border-box;
      overflow: visible;
    }
    /* In dark mode, you might want a slightly different nav background */
    body.dark #navigation {
      background-color: #222;
    }
    #navigation img {
      flex-shrink: 0;
      width: 70px;
      height: 70px;
    }
    .luxury-text {
      flex-grow: 1;
      text-align: center;
      font-weight: bold;
      margin: 0;
      color: #ebf3f7;
      white-space: nowrap;
      overflow: hidden;
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
      transition: background-color 0.3s, color 0.3s;
    }
    .nav-buttons button:hover {
      background-color: #ebf3f7;
      color: #104904;
      box-shadow: 0 6px 6px rgba(0,0,0,0.2);
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
    /* Dropdown menu is hidden by default */
    .dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      top: 100%;
      background-color: white;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
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
      transition: background-color 0.3s;
    }
    /* When the dropdown has the "open" class, show the menu */
    .dropdown.open .dropdown-menu {
      display: block;
    }

    /*************************************************
     * 3) Content & Footer
     *************************************************/
    .content {
      padding: 2rem;
    }
    footer {
      background-color: #104904;
      color: #ebf3f7;
      text-align: center;
      padding: 1rem;
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <header id="navigation">
    <!-- Logo -->
    <a href="{{ route('home') }}">
      <img src="{{ asset('favicon_io/android-chrome-512x512.png') }}" alt="Logo">
    </a>
    <!-- Title -->
    <div class="luxury-text">
      <h1 style="font-weight: normal; margin: 0;">@yield('header-title', 'My Website')</h1>
    </div>
    <div class="right-section">
      @guest
        <div class="nav-buttons">
          <button onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
          <button onclick="window.location.href='{{ route('login') }}'">Log In</button>
        </div>
      @endguest
      <div class="dropdown" id="dropdownParent">
        <button class="menu-button" id="menuToggleBtn">
          <div class="menu-icon"></div>
          <div class="menu-icon"></div>
          <div class="menu-icon"></div>
        </button>
        <div class="dropdown-menu">
          <a href="{{ route('home') }}">Home</a>
          <a href="{{ route('products') }}">Products</a>
          <a href="{{ route('contact') }}">Contact</a>
          <a href="{{ route('aboutUs') }}">About Us</a>
          <a href="{{ route('wishlist') }}">Wishlist</a>
          @auth
            <a href="{{ route('basket') }}">Basket</a>
            <a href="{{ route('order') }}">Order History</a>
            <a href="{{ route('logout') }}">Logout</a>
          @endauth
        </div>
      </div>
      <!-- Dark Mode Toggle Button -->
      <button id="themeToggleBtn" style="margin-left: 10px; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">
        Toggle Dark Mode
      </button>
    </div>
  </header>

  <!-- Page Content -->
  <div class="content">
    @yield('content')
  </div>

  <footer>
    <p>&copy; 2025 Shoe Website. All rights reserved.</p>
  </footer>

  <script>
    // Dark Mode Toggle and Persistence
    const themeToggleBtn = document.getElementById('themeToggleBtn');
    // On page load, check localStorage for theme preference
    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark');
    }
    themeToggleBtn.addEventListener('click', function() {
      document.body.classList.toggle('dark');
      // Save the preference
      if(document.body.classList.contains('dark')){
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    });

    // Dropdown toggle for hamburger menu
    document.getElementById('menuToggleBtn').addEventListener('click', function() {
      const dropdown = document.getElementById('dropdownParent');
      dropdown.classList.toggle('open');
    });
  </script>
</body>
</html>
