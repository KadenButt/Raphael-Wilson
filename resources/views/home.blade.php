<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="styles.css">
    <link  href="{{asset('css/home.css')}}" rel="stylesheet"/>
    <!-- <link  href="{{ URL::asset('css/main.css') }}" rel="stylesheet"/>     -->
    <title>Raphael Wilson</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body>
    <header id="navigation">

        <a href="home.blade.php">
            <img src="Raphael-wilson-logo.png" alt="Logo">
        </a>

        <div class="luxury-text">
             <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
        </div>

        <div class="search-container">
            <form action="/search" method="GET" class="search-form">
                <div class="search-wrapper">
                    <button type="submit" class="search-button">
                        <i class="fas fa-search"></i>
                        <span>Search</span>
                    </button>
                    <input type="text" placeholder="Search" class="search-input">
                </div>
            </form>
        </div>

<div class="right-section"> 

    <div class="nav-buttons">
        <button id="signup" onclick="window.location.href='register.blade.php'">Sign Up</button>
        <button id="login" onclick="window.location.href='login.blade.php'">Log In</button>
    </div>


    <div class="dropdown">
        <button class="menu-button">
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
            <div class="menu-icon"></div>
        </button>
        <div class="dropdown-menu">
            <a href="home.blade.php">Home</a>
            <a href="products.blade.php">Products</a>
            <a href="contact.blade.php">Contact</a>
            <a href="aboutus.blade.php">About us</a>
            <a href="basket.blade.php">Basket</a>
        </div>
    </div>
</div>
</header>

        <div class="banner">
            <img src="{{ asset('images\Screenshot_2024-10-28_105449.png') }}" alt="Raphael Wilson Footwear Logo" class="banner-logo">
        </div>

        <div class="category-container">
            <div class="category-box">CATEGORY 1</div>
            <div class="category-box">CATEGORY 2</div>
            <div class="category-box">CATEGORY 3</div>
        </div>

        <div class="bottom-categories">
            <div class="category-box1">CATEGORY 4</div>
            <div class="category-box1">CATEGORY 5</div>
        </div>
      
    </body>
</html>

<style>
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

/* On hover, hide the "Search" text */
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
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
    flex-direction: column;
    justify-content: flex-end;
    text-align: center;
    word-wrap: break-word;
    max-width: 100%;
}

.category-box:hover {
    transform: translateY(-5px) scale(1.09);
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    background-color: #f8f8f8;
    color:#104904;
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

.category-box > * {
    width: calc(100% - 40px);
    margin: 0 auto;
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

.bottom-categories {
    display: flex;
    justify-content: center;
    gap: 60px;
    padding: 40px 10%;
    max-width: 1400px;
    width: 80%;
    margin: 50px auto 0;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}

.category-box1 {
    width: 30%;
    min-width: 250px;
    height: 200px;
    background-color: #104904;
    border-radius: 0.1px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    text-align: center;
    word-wrap: break-word;
    max-width: 100%;
}

.category-box1:hover {
    transform: translateY(-5px) scale(1.09);
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    background-color: #f8f8f8;
    color:#104904;
}

.category-box1::after {
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

.category-box1:hover::after {
    transform: scaleX(1);
}

.category-box1 > * {
    width: calc(100% - 40px);
    margin: 0 auto;
}

@media (max-width: 1200px) {
    .bottom-categories {
        width: 90%;
        gap: 40px;
    }
}

@media (max-width: 768px) {
    .category-container {
        grid-template-columns: 1fr;
    }

    .bottom-categories {
        grid-template-columns: 1fr;
        width: 90%;
    }
}
</style>


