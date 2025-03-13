<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>My Wishlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

  <style>
    /*************************************************
     * 1) Base / Global Styles
     *************************************************/
    html, body {
      margin: 0;
      padding: 0;
      /* Ensure the page takes the full viewport height and use flex layout */
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: Arial, sans-serif;
      background-color: #ebf3f7; /* Light mode background */
      color: #104904;          /* Light mode text */
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
     * 3) Wishlist Container & Header
     *************************************************/
    .wishlist-container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1rem;
      flex: 1; /* Take remaining vertical space */
    }
    .wishlist-header {
      text-align: center;
      margin-bottom: 2rem;
      font-size: 2rem;
      color: #104904;
      margin-top: 1rem;
    }

    /*************************************************
     * 4) Cards Grid & Cards
     *************************************************/
    .wishlist-items {
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      justify-content: center;
    }
    .wishlist-card {
      background-color: #104904;
      color: #ebf3f7;
      border-radius: 20px;
      max-width: 280px;
      text-align: center;
      padding: 1.5rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      transition: transform 0.3s;
    }
    .wishlist-card:hover {
      transform: translateY(-4px);
    }
    .wishlist-card img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      object-fit: cover;
      margin-bottom: 1rem;
    }
    .wishlist-product-name {
      font-size: 1.25rem;
      margin: 0.5rem 0;
      font-weight: bold;
    }
    .wishlist-product-price {
      font-weight: bold;
      margin-bottom: 1rem;
      color: #fff;
    }
    .wishlist-btns {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1rem;
    }
    .btn-remove,
    .btn-move-to-cart {
      padding: 10px 20px;
      background-color: white;
      color: #104904;
      border: none;
      border-radius: 10px;
      font-size: 0.9rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .btn-remove:hover,
    .btn-move-to-cart:hover {
      background-color: #ebf3f7;
      color: #104904;
      box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }
    .wishlist-empty {
      text-align: center;
      font-style: italic;
      color: #777;
      margin-top: 2rem;
    }

    /*************************************************
     * 5) Footer
     *************************************************/
    footer {
      background-color: #104904;
      color: #ebf3f7;
      text-align: center;
      padding: 1rem;
      margin-top: auto;
      transition: background-color 0.3s, color 0.3s;
    }
    /* Dark mode override for footer */
    body.dark footer {
      background-color: #000;
      color: #eee;
    }

    @media (max-width: 768px) {
      .wishlist-card {
        max-width: 90%;
      }
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <header id="navigation">
    <!-- Logo -->
    <a href="{{ route('home') }}">
      <img src="{{ asset('favicon_io/android-chrome-512x512.png') }}" alt="Logo">
    </a>
    <!-- Title -->
    <div class="luxury-text">
      <h1 style="font-weight: normal; margin: 0;">My Wishlist</h1>
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
      <!-- Dark Mode Toggle -->
      <button id="themeToggleBtn">Toggle Dark Mode</button>
    </div>
  </header>

  <!-- Wishlist Main Content -->
  <div class="wishlist-container">
    <h1 class="wishlist-header">My Wishlist</h1>
    <div class="wishlist-items" id="wishlistItems">
      <!-- Wishlist items will be dynamically inserted here by JavaScript -->
    </div>
  </div>

  <!-- Footer -->
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

    // Wishlist JavaScript
    let wishlistData = JSON.parse(localStorage.getItem('wishlist')) || [];
    const wishlistContainer = document.getElementById('wishlistItems');

    function renderWishlist() {
      wishlistContainer.innerHTML = '';
      if (wishlistData.length === 0) {
        wishlistContainer.innerHTML = '<p class="wishlist-empty">Your wishlist is currently empty.</p>';
        return;
      }
      wishlistData.forEach(item => {
        const itemCard = document.createElement('div');
        itemCard.classList.add('wishlist-card');
        itemCard.innerHTML = `
          <img src="${item.image}" alt="${item.name}">
          <h3 class="wishlist-product-name">${item.name}</h3>
          <p class="wishlist-product-price">£${Number(item.price).toFixed(2)}</p>
          <div class="wishlist-btns">
            <button class="btn-remove">Remove</button>
            <button class="btn-move-to-cart">Move to Cart</button>
          </div>
        `;
        const removeBtn = itemCard.querySelector('.btn-remove');
        removeBtn.addEventListener('click', () => {
          removeFromWishlist(item.id);
        });
        const moveToCartBtn = itemCard.querySelector('.btn-move-to-cart');
        moveToCartBtn.addEventListener('click', () => {
          alert('Item moved to cart (this is a demo).');
          removeFromWishlist(item.id);
        });
        wishlistContainer.appendChild(itemCard);
      });
    }

    function removeFromWishlist(id) {
      wishlistData = wishlistData.filter(product => product.id !== id);
      localStorage.setItem('wishlist', JSON.stringify(wishlistData));
      renderWishlist();
    }

    renderWishlist();
  </script>
</body>
</html>
