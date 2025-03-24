<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
<link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
<style>
    @media (max-width: 768px) {
        #navigation {
            flex-direction: column;
            align-items: center;
        }

        .basket-container {
            align-items: center;
            flex-direction: column;
        }

        .black-shoe img {
            width: 150px;
        }

        .basket-contents {
            max-width: 100%;
        }
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


    .black-shoe {
        margin-top: 5%;
        margin-left: 5%;
        width: 200px;
        height: auto;
        object-fit: cover;
    }

    .black-shoe img {
        width: 200px;
        height: auto;
        object-fit: cover;
    }

    #navigation {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #104904;
        padding: 5px 20px;
        box-sizing: border-box;
        overflow: visible;
        transition: background-color 0.3s ease;
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
        transition: background-color 0.3s ease;
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
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px 20px;
        color: #104904;
        text-decoration: none;
        font-weight: bold;
        white-space: nowrap;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown-menu a:hover {
        background-color: #ebf3f7;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .search-box {
        width: 300px;
        margin: 50px auto 0;
        border-radius: 5px;
    }

    .row {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        background: white;
        border-radius: 5px;
    }

    input {
        flex: 1;
        height: 50px;
        background: white;
        border: 0;
        outline: 0;
        font-size: 18px;
        color: #333;
    }

    button {
        background: transparent;
        border: 0;
        outline: 0;
    }

    button search-icon {
        width: 25px;
        color: #555;
    }

    .search-item-row ul {
        background: white;
        border-top: 1px;
        padding: 15px 10px;
    }

    .search-item-row ul li {
        list-style: none;
        border-radius: 3px;
        padding: 15px 10px;
        cursor: pointer;
    }

    .search-item-row ul li:hover {
        background: #e9f3ff;
    }

    div.gallery {
        background-color: #104904;
        color: white;
        border: 1px solid #ccc;
        margin-top: 50px;
        border-radius: 20px;
        transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;


    }

    div.gallery:hover {
        border: 1px solid black;
    }

    div.gallery img {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        width: 100%;
        height: 200px;
    }

    div.desc {
        padding: 15px;
        text-align: center;
        transition: color 0.3s ease;
    }

    .responsive {
        padding: 0 52px;
        float: left;
        width: 25%;
    }

    body.dark {
        background-color: #111 !important;
        color: #eee !important;
    }

    body.dark #navigation {
        background-color: #222 !important;
    }

    body.dark .menu-icon {
        background-color: #999 !important;
    }

    body.dark .dropdown-menu {
        background-color: #333 !important;
        color: #fff !important;
    }

    body.dark .dropdown-menu a {
        color: #fff !important;
    }

    body.dark div.gallery {
        background-color: #333 !important;
        color: #fff !important;
        border: 1px solid #666 !important;
    }

    body.dark div.desc {
        color: #fff !important;
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



    <div class="search-box">
        <div class="row">
            <input type="text" id="search-input-box" placeholder="Search Products" autocomplete="off">
            <button class="search-icon material-symbols-outlined">search</button>
        </div>
        <div class="search-item-row">
        </div>
    </div>

    <label for="redirectSelect">Choose a category</label>
    <select id="redirectSelect" onchange="redirectToPage()">
        <option name="">Choose Category</option>
        <option value="{{route('products')}}">All</option>

        @foreach($categories as $category)
        <option value="{{ route('category', [$category->category_id]) }}">{{ $category->category_name }}</option>
        @endforeach
    </select>
    <br>
    @foreach($products as $product)
    <a href="{{route('product', [$product->product_id])}}">
        <div class="responsive" id="product-list">
            <div class="gallery" data-keywords="{{$product->product_name}}">
                <img src="data:image/jpeg;base64,{{ base64_encode($product->product_photo) }}" alt="Retro Sandals" width="600" height="400">
                <div class="desc"> <b>{{$product->product_name}}</b> <br> Sizes 4-10 <br> £{{$product->product_price}} <br>
                </div>
            </div>
        </div>
    </a>
    @endforeach


</body>
<script>
    let availableKeywords = [
        <?php
        foreach ($products as $product)
            echo '\'' . $product->product_name . '\',';
        ?>
    ];

    const resultsBox = document.querySelector(".search-item-row");
    const inputBox = document.getElementById("search-input-box");
    const searchButton = document.querySelector(".search-icon");
    const productList = document.querySelectorAll(".gallery");

    inputBox.onkeyup = function() {
        let result = [];
        let input = inputBox.value;
        if (input.length) {
            result = availableKeywords.filter((keyword) => {
                return keyword.toLowerCase().includes(input.toLowerCase());
            });
            display(result);
        }
    }

    function display(result) {
        const content = result.map((list) => {
            return "<li onclick=selectInput(this)>" + list + "</li>";
        });
        resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
    }

    function selectInput(list) {
        inputBox.value = list.innerHTML;
        resultsBox.innerHTML = '';
    }
    searchButton.onclick = function() {
        const searchQuery = inputBox.value.toLowerCase().trim();

        productList.forEach((product) => {
            const keywords = product.getAttribute("data-keywords")?.toLowerCase() || '';

            if (searchQuery && keywords.includes(searchQuery)) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    }

    function redirectToPage() {
        const select = document.getElementById("redirectSelect");
        const selectedValue = select.value;
        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;
        const themeToggleBtn = document.getElementById('themeToggleBtn');

        // If user had dark mode on before, keep it on
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark');
        }

        themeToggleBtn.addEventListener('click', function() {
            body.classList.toggle('dark');
            if (body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    });
</script>
</script>