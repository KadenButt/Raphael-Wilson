<!DOCTYPE html>
<html lang="en">

<style>

footer {
    background-color: #011501;
    padding: 45px 20px;
    text-align: center;
  }
  
  footer p {
    color: #EAEAEA;
    margin: 0;
    font-weight: 200;
    font-size: 15px;
  }
  .social-icon {
    color: white;
    margin: 0 15px;
    font-size: 24px;
    text-decoration: none;
    transition: color 0.3s, transform 0.3s;
  }
  
  .social-icon:hover {
    color: #1da1f2; 
    transform: scale(1.2);
  }
  
  .dark-mode-toggle {
    background-color: #146D24;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 20px;
    margin-left: 20px;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  
  .dark-mode-toggle:hover {
    background-color: #1F8D32;
    color: #000;
  }
  
  body.light-mode {
    background-color: #FFFFFF;
    color: #222222;
  }
  
  body.light-mode p {
    color: #222222;
  }
  
  body.light-mode h1, 
  body.light-mode h2, 
  body.light-mode h3, 
  body.light-mode h4, 
  body.light-mode h5, 
  body.light-mode h6 {
    color: #222222;
  }
  
  body.light-mode .first {
    background-color: #f4f4f4;
    background-image: none;
  }
  
  body.light-mode .second {
    background-color: #f9f9f9;
  }
  
  body.light-mode .third {
    background-color: #e2e2e2;
  }
  
  body.light-mode footer {
    background-color: #333333;
  }
  
  body.light-mode footer p {
    color: #ffffff;
  }
  
  body.light-mode .social-icon {
    color: #ffffff;
  }
  
  body.light-mode .cta {
    background-color: #146D24;
    color: #fff;
  }
  
  body.light-mode .cta:hover {
    background-color: #1F8D32;
    color: #000;
  }

</style>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet"/>
        <title>Raphael Wilson</title>
        <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body>
        <header id="navigation">
            <a href="{{ route('home') }}">
                <img src="{{ asset('favicon_io/android-chrome-512x512.png') }}" alt="Logo">
            </a>

            <div class="luxury-text">
                <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
            </div>

            <div class="search-container">
                <form action="{{ route('product.search') }}" method="POST" class="search-form">
                    @csrf
                    <div class="search-wrapper">
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                            <span>Search</span>
                        </button>
                        <input type="text" placeholder="Search" class="search-input" name="product_name">
                    </div>
                </form>
            </div>

            <div class="right-section">
                @guest
                    <div class="nav-buttons">
                        <button id="signup" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
                        <button id="login" onclick="window.location.href='{{ route('login') }}'">Log In</button>
                    </div>
                @endguest

                <div class="dropdown">
                    <button class="menu-button">
                        <div class="menu-icon"></div>
                        <div class="menu-icon"></div>
                        <div class="menu-icon"></div>
                    </button>
                    <div class="dropdown-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('products') }}">Products</a>
                        <a href="{{ route('contact') }}">Contact</a>
                        <a href="{{ route('aboutUs') }}">About us</a>
                        @auth
                            <a href="{{ route('wishlist') }}">Wishlist</a> <!-- Added Wishlist link -->
                            <a href="{{ route('basket') }}">Basket</a>
                            <a href="{{ route('order') }}">Order History</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <div class="banner">
            <img src="{{ asset('images/Screenshot_2024-10-28_105449.png') }}" alt="Raphael Wilson Footwear Logo" class="banner-logo">
        </div>

        <div class="category-container">
            @foreach($categories as $category)
                <a href="{{ route('category', [$category->category_id]) }}">
                    <div class="category-box">{{ $category->category_name }}</div>
                </a>
            @endforeach



        </div>
    </body>

    <footer>
    <div class="container">
      <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
    </div>
   
  <button id="darkModeToggle" class="dark-mode-toggle">
    <i id="modeIcon" class="fas fa-moon"></i>
  </button>
  </footer>

  <script>
  const toggleBtn = document.getElementById('darkModeToggle');
  const modeIcon = document.getElementById('modeIcon');

  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');

    // Change icon based on mode
    if (document.body.classList.contains('light-mode')) {
      modeIcon.classList.remove('fa-moon');
      modeIcon.classList.add('fa-sun');
    } else {
      modeIcon.classList.remove('fa-sun');
      modeIcon.classList.add('fa-moon');
    }
  });
</script>

</html>