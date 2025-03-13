<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

  <style>
    /*************************************************
     * 1) Base / Global Styles
     *************************************************/
    html, body {
      margin: 0;
      padding: 0;
      /* Ensure full viewport height with flex layout */
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      color: white;
      transition: background-color 0.3s, color 0.3s;
    }
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
      background-color: #104904;
      padding: 5px 20px;
      box-sizing: border-box;
      overflow: visible;
    }
    body.dark #navigation {
      background-color: #222;
    }
    #navigation img {
      width: 70px;
      height: 70px;
      flex-shrink: 0;
    }
    .luxury-text {
      flex-grow: 1;
      text-align: center;
      font-family: Arial, sans-serif;
      white-space: nowrap;
      overflow: hidden;
      color: white;
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
      transition: background-color 0.3s ease;
    }
    .dropdown:hover .dropdown-menu {
      display: block;
    }
    /* Use click-to-toggle rather than hover */
    .dropdown.open .dropdown-menu {
      display: block;
    }
    /* Dark mode toggle button style */
    #themeToggleBtn {
      margin-left: 10px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /*************************************************
     * 3) Contact Us Container
     *************************************************/
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #004d00;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      flex: 1; /* Take remaining vertical space */
    }
    h1, h2 {
      text-align: center;
      color: white;
    }
    .contact-info,
    .social-media,
    .contact-form {
      margin: 20px 0;
    }
    .contact-info p,
    .social-media a {
      margin: 5px 0;
      color: white;
    }
    .contact-info a,
    .social-media a {
      text-decoration: none;
      color: white;
      font-weight: bold;
    }
    .social-media {
      text-align: center;
    }
    .social-media a:hover {
      color: #f2f2f2;
    }
    .contact-form label {
      display: block;
      margin-bottom: 5px;
      color: white;
    }
    .contact-form input,
    .contact-form textarea {
      width: calc(100% - 40px);
      max-width: 700px;
      margin: 0 auto 15px;
      display: block;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: white;
      color: #333;
      box-sizing: border-box;
    }
    .contact-form button {
      padding: 10px 20px;
      background-color: #003300;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      display: block;
      margin: 20px auto 0;
    }
    .contact-form button:hover {
      background-color: #002200;
    }

    /*************************************************
     * 4) Footer
     *************************************************/
    footer {
      background-color: #104904;
      color: #ebf3f7;
      text-align: center;
      padding: 1rem;
      margin-top: auto;
      transition: background-color 0.3s, color 0.3s;
    }
    body.dark footer {
      background-color: #000;
      color: #eee;
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
      <!-- Dark Mode Toggle -->
      <button id="themeToggleBtn">Toggle Dark Mode</button>
    </div>
  </header>

  <div class="container">
    <h1>Contact Us</h1>
    <div class="contact-info">
      <h2>Our Details</h2>
      <p><strong>Email:</strong> <a href="mailto:raphaelwilsonfootwear@gmail.com">raphaelwilsonfootwear@gmail.com</a></p>
      <p><strong>Phone:</strong> <a href="tel:+44745572003">+44745572003</a></p>
      <p><strong>Address:</strong> The Priory Queensway St, B4 6FP</p>
    </div>
    <div class="social-media">
      <h2>Follow Us</h2>
      <a href="https://www.instagram.com/raphaelwilsonfootwear" target="_blank">Instagram</a>
    </div>
    <div class="contact-form">
      <h2>Get in Touch</h2>
      <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
  <div>
    <section id="form-error">
      @if ($errors->any())
      <div>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </section>
  </div>

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
