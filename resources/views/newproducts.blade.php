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
    html, body {
      width: 100%;
      min-height: 100%;
      background-color: #014220; /* Deep green background */
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
      max-width: 1200px; /* Adjust as needed */
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
      flex-wrap: wrap; /* So columns stack if screen is narrow */
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
      cursor: pointer; /* If you want them clickable */
    }

    /* FORM that holds the shoe photo & other fields */
    .product-form {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      width: 100%; /* Let it expand as needed */
      background-color: #013419;
      border-radius: 8px;
      padding: 20px;
    }

    /* LEFT SIDE inside form => Photo + fields */
    .left-column {
      display: flex;
      flex-direction: column;
      gap: 15px;
      min-width: 250px; /* Adjust as needed */
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
      flex: 1; /* Expand if there's space */
    }
    .preview-container label {
      font-weight: bold;
      margin-bottom: 5px;
    }
    /* ONLY CHANGE: smaller & square photo preview */
    .preview-container img {
      width: 150px;     /* fixed width */
      height: 150px;    /* fixed height => square */
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
      resize: vertical; /* let user expand if needed */
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
      align-self: flex-start; /* keep it to the left side in the column */
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
      margin: 0 auto; /* center horizontally */
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
        align-self: flex-start; /* so it doesn't float right on narrow screens */
      }
    }
  </style>
</head>
<body>
  <div class="page-container">

    <!-- TOP SECTION -->
    <div class="top-section">
      <!-- Left: Title + Back button -->
      <div class="left-top">
        <div class="title">New Product</div>
        <button class="back-button">Back to Inventory</button>
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

      <!-- Product Form: Left column => Photo + fields, Right column => Photo preview + Description -->
      <form action="#" method="POST" enctype="multipart/form-data" class="product-form">
        {{-- If you have a real route, do: action="{{ route('products.store') }}" --}}
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
            <input type="text" id="shoe_name" name="shoe_name" placeholder="Enter shoe name" required />
          </div>

          <!-- Sizes -->
          <div class="field-group">
            <label for="sizes">Sizes</label>
            <input type="text" id="sizes" name="sizes" placeholder="e.g., 7, 8, 9" required />
          </div>

          <!-- Price -->
          <div class="field-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" placeholder="0.00" required />
          </div>

          <!-- Quantity -->
          <div class="field-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required />
          </div>

          <!-- Stock -->
          <div class="field-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" placeholder="Enter stock" required />
          </div>
        </div>

        <!-- RIGHT COLUMN: Photo preview + Description + "New Shoe" button -->
        <div class="right-column">
          <!-- Preview Container -->
          <div class="preview-container">
            <label>Photo Preview</label>
            <img id="shoePreview" src="" alt="No image selected" />
          </div>

          <!-- Description -->
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="6" placeholder="Enter shoe description"></textarea>

          <!-- "New Shoe" submit button -->
          <button type="submit" class="new-shoe-button">New Shoe</button>
        </div>
      </form>
    </div>

    <!-- CHECKOUT BUTTON at the bottom center -->
    <button class="checkout-button">Checkout</button>
  </div>

  <!-- JavaScript to show live preview of the uploaded photo -->
  <script>
    const photoInput = document.getElementById('photo');
    const previewImg = document.getElementById('shoePreview');

    photoInput.addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          previewImg.src = e.target.result;
        }
        reader.readAsDataURL(file);
      } else {
        // If no file is selected, remove the src
        previewImg.src = '';
      }
    });
  </script>
</body>
</html>
