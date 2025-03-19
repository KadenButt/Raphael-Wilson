<<<<<<< Updated upstream
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="{{asset('css/home.css')}}" rel="stylesheet"/>
    <title>Raphael Wilson</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Navigation Bar Styles */
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

        /* Search Bar Styles */
        .search-container {
            display: flex;
            align-items: center;
            margin: 0 20px;
        }

        .search-form {
            display: flex;
            align-items: center;
            color: #104904;
        }

        .search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 8px 12px;
            border: 1px solid #104904;
            border-radius: 4px;
            width: 0;
            font-size: 14px;
            outline: none;
            position: absolute;
            right: 100%;
            opacity: 0;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .search-button {
            padding: 8px 16px;
            background: #104904;
            border: 1px solid #104904;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            z-index: 2;
        }

        .search-wrapper:hover .search-input {
            width: 200px;
            opacity: 1;
            pointer-events: all;
            margin-right: 10px;
        }

        .search-button:hover {
            background: #0d3603;
        }

        .search-button i {
            font-size: 14px;
        }

        .search-button span {
            margin-left: 5px;
        }

        .search-wrapper:hover .search-button span {
            display: none;
        }

        @media (max-width: 768px) {
            .search-container {
                margin: 10px 0;
                width: 100%;
            }

            .search-wrapper:hover .search-input {
                width: 150px;
            }
        }

        /* Category Styles */
        .category-container {
            display: flex;
            justify-content: space-between;
            grid-template-columns: repeat(3, 1fr);
            gap: 60px;
            padding: 40px 10%;
            margin: 40px auto;
            max-width: 1400px;
            width: 80%;
        }

        .category-box {
            width: 30%;
            min-width: 250px;
            height: 200px;
            background-color: #104904;
            border-radius: 0.1px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            align-items: center;
            font-size: clamp(0.8rem, 1.5vw, 1.2rem);
            font-weight: bold;
            color: #fff;
            margin: 0;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-sizing: border-box;
            text-align: center;
            word-wrap: break-word;
            max-width: 100%;
        }

        .category-box:hover {
            transform: translateY(-5px) scale(1.09);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            background-color: #f8f8f8;
            color: #104904;
        }

        .category-box::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #104904;
            transform: scaleX(0);
            transition: transform 0.5s ease;
        }

        .category-box:hover::after {
            transform: scaleX(1);
        }

        @media (max-width: 1200px) {
            .category-box {
                width: calc(50% - 15px);
            }
        }

        @media (max-width: 768px) {
            .category-box {
                width: 100%;
                margin: 0 auto;
            }
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

        <div class="search-container">
            <form action="{{route('product.search')}}" method="POST" class="search-form">
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
                    <a href="{{route('wishlist')}}">Wishlist</a> <!-- Wishlist Link -->
                    @auth
                    <a href="{{route('basket')}}">Basket</a>
                    <a href="{{route('order')}}">Order History</a>
                    <a href="{{route('logout')}}">Logout</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Banner -->
    <div class="banner">
        <img src="{{ asset('images/Screenshot_2024-10-28_105449.png') }}" alt="Raphael Wilson Footwear Logo" class="banner-logo">
    </div>

    <!-- Category Container -->
    <div class="category-container">
        @foreach($categories as $category)
        <a href="{{route('category', [$category->category_id])}}">
            <div class="category-box">{{$category->category_name}}</div>
        </a>
        @endforeach
    </div>\
</body>
</html>
>>>>>>> Stashed changes
