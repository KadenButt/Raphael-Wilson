{{-- resources/views/newproducts.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>New Product</title>
  <style>
    /* Base Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      width: 100%;
      min-height: 100%;
      background-color: #014220;
      /* Deep green background */
      font-family: Arial, sans-serif;
      color: #FFFFFF;
    }

    body {
      display: flex;
      flex-direction: column;
      /* Let page scroll if content is tall */
      overflow-y: auto;
    }

    /* Main container */
    .page-container {
      width: 90%;
      max-width: 1200px;
      /* Adjust as needed */
      margin: 20px auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
      position: relative;
    }

    /* TOP SECTION: Left => Title + Back button, Right => Brand box */
    .top-section {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .left-top {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .left-top .title {
      font-size: 48px;
      font-weight: bold;
    }

    .back-button {
      background-color: #013419;
      border: none;
      color: #FFFFFF;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background-color 0.3s ease;
      width: fit-content;
    }

    .back-button:hover {
      background-color: #025D2B;
    }

    .brand-box {
      width: 220px;
      height: 220px;
      border: 2px solid #FFFFFF;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .brand-box h2 {
      font-size: 24px;
      margin-bottom: 8px;
    }

    .brand-box p {
      margin: 2px 0;
      font-size: 14px;
    }

    /* MIDDLE SECTION: 
       Left column => Photo upload at top, then shoe fields below 
       Right column => Photo preview + Description 
       Also the bottom-left placeholders: "New Product, Search, Patend"
    */
    .middle-section {
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
      /* So columns stack if screen is narrow */
    }

    /* Bottom-left placeholders box */
    .bottom-box {
      background-color: #013419;
      border-radius: 8px;
      padding: 15px;
      width: 250px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      height: fit-content;
    }

    .bottom-box p {
      margin: 0;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      /* If you want them clickable */
    }

    /* FORM that holds the shoe photo & other fields */
    .product-form {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      width: 100%;
      /* Let it expand as needed */
      background-color: #013419;
      border-radius: 8px;
      padding: 20px;
    }

    /* LEFT SIDE inside form => Photo + fields */
    .left-column {
      display: flex;
      flex-direction: column;
      gap: 15px;
      min-width: 250px;
      /* Adjust as needed */
    }

    .field-group {
      display: flex;
      flex-direction: column;
    }

    .field-group label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .field-group input {
      padding: 8px;
      border: none;
      border-radius: 4px;
      color: #104904;
    }

    .field-group input::placeholder {
      color: #555;
    }

    /* RIGHT COLUMN inside form => Photo preview + Description + "New Shoe" button */
    .right-column {
      display: flex;
      flex-direction: column;
      gap: 15px;
      flex: 1;
      /* Expand if there's space */
    }

    .preview-container label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    /* ONLY CHANGE: smaller & square photo preview */
    .preview-container img {
      width: 150px;
      /* fixed width */
      height: 150px;
      /* fixed height => square */
      object-fit: cover;
      border: 2px solid #FFFFFF;
      border-radius: 4px;
    }

    .right-column textarea {
      width: 100%;
      padding: 8px;
      border: none;
      border-radius: 4px;
      color: #104904;
      resize: vertical;
      /* let user expand if needed */
    }

    .right-column textarea::placeholder {
      color: #555;
    }

    /* "New Shoe" submit button */
    .new-shoe-button {
      background-color: #014220;
      border: none;
      color: #FFFFFF;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      margin-top: 10px;
      align-self: flex-start;
      /* keep it to the left side in the column */
      transition: background-color 0.3s ease;
    }

    .new-shoe-button:hover {
      background-color: #025D2B;
    }

    /* CHECKOUT BUTTON at bottom center */
    .checkout-button {
      background-color: #013419;
      border: none;
      color: #FFFFFF;
      padding: 15px 30px;
      border-radius: 25px;
      cursor: pointer;
      font-size: 18px;
      font-weight: bold;
      transition: background-color 0.3s ease;
      margin: 0 auto;
      /* center horizontally */
      display: block;
      width: fit-content;
    }

    .checkout-button:hover {
      background-color: #025D2B;
    }

    /* Mobile adjustments */
    @media (max-width: 768px) {
      .top-section {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
      }

      .middle-section {
        flex-direction: column;
      }

      .brand-box {
        align-self: flex-start;
        /* so it doesn't float right on narrow screens */
      }
    }

    @media (max-width: 768px) {
      #navigation {
        flex-direction: column;
        align-items: center;
      }

      .product-container {
        align-items: center;
        flex-direction: column;
      }

      .black-shoe img {
        width: 150px;
      }

      .product-view {
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


    .product-view {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      /*keeps content vertical*/
      justify-content: space-between;
      text-align: left;
      position: relative;
      border-radius: 20px;
      background-color: #104904;
      color: #ebf3f7;
      margin-top: 5%;
      margin-left: 20px;
      margin-right: 15%;
      width: auto;
      height: auto;
      max-width: 100%;
      padding: 15px;
      padding-bottom: 5px;
      box-sizing: border-box;
    }

    .product-view h2 {
      margin-top: 0%;
    }

    .product-container {
      display: flex;
      align-items: flex-start;
      gap: 20px;
      position: relative;
    }

    .black-shoe {
      flex-shrink: 0;
      margin-top: 5%;
      margin-left: 5%;
      width: 100%;
      height: auto;
      object-fit: cover;
      max-width: 400px;
    }

    .black-shoe img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .basket-add-container {
      display: flex;
      align-items: center;
      gap: 30px;
      position: absolute;
      bottom: -15%;
      right: 15%;
    }

    .basket-confirmation {
      color: rgb(0, 123, 8);
      font-size: 20px;
    }

    .basket-button {
      bottom: -15%;
      right: 15%;
      display: inline-block;
      margin: 10px auto 0;
      padding: 5px 15px;
      background-color: #104904;
      color: white;
      font-weight: bold;
      font-size: 12px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
      text-align: center;

    }

    .basket-button:hover {
      background-color: #ebf3f7;
      color: #104904;
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
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

    button.link {
      background: none;
      border: none;
      color: #ebf3f7;
      cursor: pointer;
    }
  </style>
</head>
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
        @if(session('admin'))
        <a href="{{ route('admin.home') }}">Admin Home</a>
        @endif
        <a href="{{route('logout')}}">Logout</a>
        @endauth
      </div>
    </div>
  </div>
</header>

<body>
  <div class="page-container">

    <!-- TOP SECTION -->
    <div class="top-section">
      <!-- Left: Title + Back button -->
      <div class="left-top">
        <div class="title">Edit Product</div>
        <a href="{{route('products')}}" class="back-button">Back to Prodcuts</a>
      </div>

      <!-- Right: Brand box -->
      <div class="brand-box">
        <h2>Raphael Wilson</h2>
        <p>Footwear</p>
        <p>EST.2024</p>
      </div>
    </div>

    <!-- MIDDLE SECTION -->
    <div class="middle-section">
      <!-- Bottom-left placeholders -->
      <div class="bottom-box">
        <p>New Product</p>
        <p>Search</p>
        <p>Patend</p>
      </div>

      <!-- Product Form: Left column => Photo + fields, Right column => Photo preview + Description ///enctype="multipart/form-data"-->
      <form method="POST" action="{{route('admin.product.udpate', [$product->product_id])}}" class="product-form" enctype="multipart/form-data">
        @csrf
        <!-- LEFT COLUMN: Photo upload + other fields -->
        <div class="left-column">
          <!-- Photo Upload -->
          <div class="field-group">
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo" accept="image/*" />
          </div>

          <!-- Shoe Name -->
          <div class="field-group">
            <label for="shoe_name">Shoe Name</label>
            <input type="text" id="shoe_name" name="shoe_name" placeholder="Enter shoe name" value="{{$product->product_name}}" />
          </div>

          <!-- Category -->
          <div class="field-group">
            <label for="category">Category</label>
            <select name="category">
              @foreach($categories as $category)
                @if($product->category_id == $category->category_id)
                <option selected value="{{$category->category_id}}">{{$category->category_name}}</option>
                
                @else
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                @endif

              @endforeach
            </select>
          </div>

          <!-- Price -->
          <div class="field-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="{{$product->product_price}}" />
          </div>

        </div>

        <!-- RIGHT COLUMN: Photo preview + Description + "New Shoe" button -->
        <div class="right-column">
          <!-- Preview Container -->
          <div class="preview-container">
            <label>Photo Preview</label>
            <img src="data:image/jpeg;base64,{{ base64_encode($product->product_photo) }}" alt="shoe">
          </div>

          <!-- Description -->
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="6">{{ $product->product_description }}</textarea>

          <!-- "New Shoe" submit button -->
          <button type="submit" class="new-shoe-button">Save Changes</button>

        </div>
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
  </div>

  <!-- JavaScript to show live preview of the uploaded photo -->
  <script>
    const photoInput = document.getElementById('photo');
    const previewImg = document.getElementById('shoePreview');

    photoInput.addEventListener('change', function(event) {
      const file = event.target.files[0]; // Get the selected file
      if (file) {
        const reader = new FileReader(); // Create a FileReader object

        // Set up the onload event handler
        reader.onload = function(e) {
          previewImg.src = e.target.result; // Set the src of the image to the file's data URL
          previewImg.style.display = 'block'; // Make the image visible
        };

        // Read the file as a Data URL
        reader.readAsDataURL(file);
      } else {
        // If no file is selected, remove the src and hide the image
        previewImg.src = '';
        previewImg.style.display = 'none';
      }
    });

    // On page load, check if there's an existing image
    window.addEventListener('load', function() {
      if (previewImg.src && previewImg.src !== '#') {
        previewImg.style.display = 'block'; // Show the existing image
      } else {
        previewImg.style.display = 'none'; // Hide the image if no src is set
      }
    });
  </script>
</body>

</html>