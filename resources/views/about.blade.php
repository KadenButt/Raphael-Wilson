<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
  <style>
    /* Base / Global Styles */
    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #ebf3f7;
      color: #104904;
      text-align: center;
      transition: background-color 0.3s, color 0.3s;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    body.dark {
      background-color: #111;
      color: #eee;
    }

    /* Navigation Bar */
    #navigation {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #104904;
      padding: 5px 20px;
      box-sizing: border-box;
      overflow: visible;
    }
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
      font-family: Arial, sans-serif;
      white-space: nowrap;
      overflow: hidden;
      color: #ebf3f7;
      font-weight: bold;
      margin: 0;
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
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .dropdown:hover .dropdown-menu {
      display: block;
    }
    /* Use click-to-toggle rather than hover */
    .dropdown.open .dropdown-menu {
      display: block;
    }
    /* Dark Mode Toggle Button Style */
    #themeToggleBtn {
      margin-left: 10px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* About Us Page Content */
    .about-text {
      text-align: center;
      font-size: 30px;
      margin: 20px 0;
    }
    main {
      flex: 1; /* Take remaining vertical space */
    }
    #explanaition p {
      padding: 0 20px;
      font-size: 18px;
      line-height: 1.5;
    }
    #benefits {
      margin: 40px 0;
    }
    #benefits h2 {
      margin-bottom: 20px;
      font-size: 24px;
    }
    .benefit p {
      font-size: 18px;
      margin: 10px 0;
    }
  </style>
</head>

<body>
  <header id="navigation">
    <a href="{{ route('home') }}">
      <img src="{{ asset('favicon_io/android-chrome-512x512.png') }}" alt="Logo">
    </a>
    <div class="luxury-text">
      <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
    </div>
    <div class="right-section">
      @guest
        <div class="nav-buttons">
          <button id="signup" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
          <button id="login" onclick="window.location.href='{{ route('login') }}'">Log In</button>
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
          <a href="{{ route('aboutUs') }}">About us</a>
          <a href="{{ route('wishlist') }}">Wishlist</a>
          @auth
            <a href="{{ route('basket') }}">Basket</a>
            <a href="{{ route('order') }}">Order History</a>
            <a href="{{ route('logout') }}">Logout</a>
          @endauth
        </div>
      </div>
      <!-- Dark Mode Toggle Button -->
      <button id="themeToggleBtn">Toggle Dark Mode</button>
    </div>
  </header>

  <div class="about-text">
    <h1>About Us</h1>
  </div>

  <main>
    <section id="explanaition">
      <p>
        Raphael Wilson is a branded luxury footwear business. We sell to successful and wealthy individuals with an eye for designer footwear, focusing on smart shoes, boots, heels, trainers, and more from prominent luxury brands.
      </p>
    </section>

    <section id="benefits">
      <h2>Why Shop With Us?</h2>
      <div class="benefit">
        <p>Feel confident within yourself</p>
      </div>
      <div class="benefit">
        <p>Get a personalised shopping experience</p>
      </div>
      <div class="benefit">
        <p>Shop for all your favourite brands</p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Shoe Website. All rights reserved.</p>
  </footer>

  <script>
    // Dark Mode Toggle with Persistence
    const themeToggleBtn = document.getElementById('themeToggleBtn');
    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark');
    }
    themeToggleBtn.addEventListener('click', function() {
      document.body.classList.toggle('dark');
      if (document.body.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
      } else {
        localStorage.setItem('theme', 'light');
      }
    });

    // Dropdown toggle for hamburger menu
    document.getElementById('menuToggleBtn').addEventListener('click', function() {
      document.getElementById('dropdownParent').classList.toggle('open');
    });
  </script>
</body>
</html>
