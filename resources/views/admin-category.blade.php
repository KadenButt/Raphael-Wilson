<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers</title>
  <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
</head>
<header id="navigation">

    <a href="{{route('home')}}">
        <img src="{{asset('favicon_io/android-chrome-512x512.png')}} " alt="Logo">
    </a>

    <div class="luxury-text">
        <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
    </div>

    <div class="right-section">
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
                <a href="{{route('basket')}}">Basket</a>
                <a href="{{route('order')}}">Order History</a>
                <a href="{{route('customer.details')}}">Change Customer Details</a>
                <a href="{{ route('admin.home') }}">Admin Home</a>
                <a href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    </div>
</header>

<body>

  <div class="category-header">
    <h1>New Category</h1>
  </div>

  <div class="category-box">

    <h2>New Category Name</h2>
    <form method="POST" action="{{route('admin.category.create')}}" >
      @CSRF
      <input type="text" name="category-text" />
      <br>
      <button id="category-button" type='submit'>Create Category</button>
    </form>
  </div>
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
    @if(session('success'))
    <div class="basket-confirmation">
      <p>Product Created</p>
    </div>
    @endif
</body>


<style>
  .category-box #category-button {
    margin-top: 10px;
    font-weight: bold;
    border: none;
    color: #104904;
    background-color: #ebf3f7;
    border-radius: 50px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  input[name="category-text"] {
    border-radius: 5px;
    border: 2px solid #ebf3f7;

  }

  input[name="category-text"]:focus {
    outline: none;

  }

  #category-button:hover {
    background-color: rgb(26, 126, 6);
    color: #ebf3f7;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  }

  .category-box {
    padding: 10px;
    margin: auto;
    width: 50%;
    justify-content: center;
    text-align: center;
    border-radius: 20px;
    background-color: #104904;
    color: #ebf3f7;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
  }

  .category-header {
    font-size: 30px;
    justify-items: center;
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
    /*stops logo shrinking*/
    width: 70px;
    height: 70px;
  }

  .right-section {
    display: flex;
    align-items: center;
    gap: 15px;

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

  }

  .dropdown-menu a:hover {
    background-color: #ebf3f7;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
  }
</style>