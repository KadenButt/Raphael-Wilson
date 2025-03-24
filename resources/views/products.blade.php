<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        #navigation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to right, #104904, #0a3202);
            padding: 15px 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        #navigation img {
            width: 60px;
            height: 60px;
        }

        .luxury-text h1 {
            font-size: 22px;
            font-weight: 600;
            color: #fff;
            margin: 0;
            text-transform: uppercase;
        }

        /* Navigation Buttons */
        .nav-buttons button {
            padding: 10px 16px;
            background: #ffffff;
            border: 1px solid #104904;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            color: #104904;
            transition: all 0.3s ease;
        }

        .nav-buttons button:hover {
            background: #104904;
            color: #ffffff;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
        }

        .menu-button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .menu-icon {
            width: 25px;
            height: 3px;
            background-color: #fff;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            z-index: 1000;
            min-width: 180px;
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 20px;
            color: #104904;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .dropdown-menu a:hover {
            background-color: #ebf3f7;
        }

        /* Show dropdown on hover or click */
        .dropdown:hover .dropdown-menu,
        .dropdown:focus-within .dropdown-menu {
            display: block;
        }

        /* Search Bar */
        .search-box {
            max-width: 600px;
            margin: 40px auto;
            padding: 10px;
        }

        .search-box .row {
            display: flex;
            align-items: center;
            background: #ffffff;
            border-radius: 30px;
            padding: 12px 20px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px;
        }

        .search-box button {
            background: none;
            border: none;
            cursor: pointer;
            color: #104904;
        }

        /* Product Grid */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex: 1 1 calc(25% - 20px);
            max-width: calc(25% - 20px);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .product-card .desc {
            padding: 15px;
            text-align: center;
        }

        .product-card .desc h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #104904;
        }

        .product-card .desc p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-card {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .product-card {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }

        /* Product Grid */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Space between cards */
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center; /* Center the cards */
}

/* Product Card */
.product-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    flex: 1 1 calc(25% - 20px); /* Adjust card width */
    max-width: calc(25% - 20px); /* Adjust card width */
    min-width: 250px; /* Minimum width for each card */
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.product-card .desc {
    padding: 15px;
    text-align: center;
}

.product-card .desc h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    color: #104904;
}

.product-card .desc p {
    margin: 5px 0;
    font-size: 14px;
    color: #666;
}

/* Responsive Design */
@media (max-width: 768px) {
    .product-card {
        flex: 1 1 calc(50% - 20px); /* Two cards per row on tablets */
        max-width: calc(50% - 20px);
    }
}

@media (max-width: 480px) {
    .product-card {
        flex: 1 1 100%; /* One card per row on mobile */
        max-width: 100%;
    }
}
    </style>
</head>
<body>
    <header id="navigation">
        <a href="{{ route('home') }}">
            <img src="{{ asset('favicon_io/android-chrome-512x512.png') }}" alt="Logo">
        </a>

        <div class="luxury-text">
            <h1>Luxury Footwear Right at Your Fingertips</h1>
        </div>

        <div class="right-section">
            @guest
                <div class="nav-buttons">
                    <button id="signup" onclick="window.location.href='{{ route('register') }}'">Sign Up</button>
                    <button id="login" onclick="window.location.href='{{ route('login') }}'">Log In</button>
                </div>
            @endguest

            <!-- Dropdown Menu -->
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
                    <a href="{{ route('aboutUs') }}">About Us</a>
                    @auth
                        <a href="{{ route('wishlist') }}">Wishlist</a>
                        <a href="{{ route('basket') }}">Basket</a>
                        <a href="{{ route('order') }}">Order History</a>
                        <a href="{{ route('logout') }}">Logout</a>
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
        <div class="search-item-row"></div>
    </div>

    <label for="redirectSelect">Choose a Category</label>
    <select id="redirectSelect" onchange="redirectToPage()">
        <option value="">Choose Category</option>
        <option value="{{ route('products') }}">All</option>
        @foreach($categories as $category)
            <option value="{{ route('category', [$category->category_id]) }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <div class="product-grid">
        @foreach($products as $product)
            <a href="{{ route('product', [$product->product_id]) }}">
                <div class="product-card" data-keywords="{{ $product->product_name }}">
                    <img src="data:image/jpeg;base64,{{ base64_encode($product->product_photo) }}" alt="{{ $product->product_name }}">
                    <div class="desc">
                        <h3>{{ $product->product_name }}</h3>
                        <p>Sizes 4-10</p>
                        <p>£{{ $product->product_price }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <script>
        // Dropdown Menu Toggle
        const dropdownButton = document.querySelector('.menu-button');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!event.target.closest('.dropdown')) {
                dropdownMenu.style.display = 'none';
            }
        });

        // Search Functionality
        const inputBox = document.getElementById("search-input-box");
        const resultsBox = document.querySelector(".search-item-row");
        const searchButton = document.querySelector(".search-icon");
        const productCards = document.querySelectorAll(".product-card");

        let availableKeywords = [
            <?php foreach($products as $product) echo '\''.$product->product_name . '\','; ?>
        ];

        inputBox.addEventListener("keyup", function() {
            let input = inputBox.value.toLowerCase();
            let matches = availableKeywords.filter(keyword => keyword.toLowerCase().includes(input));

            if (input.length) {
                resultsBox.innerHTML = `<ul>${matches.map(match => `<li onclick="selectInput(this)">${match}</li>`).join("")}</ul>`;
            } else {
                resultsBox.innerHTML = "";
            }
        });

        function selectInput(list) {
            inputBox.value = list.textContent;
            resultsBox.innerHTML = "";
        }

        searchButton.addEventListener("click", function() {
            let searchQuery = inputBox.value.toLowerCase().trim();
            productCards.forEach(product => {
                let keywords = product.getAttribute("data-keywords")?.toLowerCase() || "";
                product.style.display = keywords.includes(searchQuery) ? "block" : "none";
            });
        });

        // Redirect Function for Categories
        function redirectToPage() {
            const select = document.getElementById("redirectSelect");
            if (select.value) {
                window.location.href = select.value;
            }
        }
    </script>
</body>
</html>