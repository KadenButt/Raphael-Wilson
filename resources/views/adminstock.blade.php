<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Stock</title>
    <style>
        /* Basic Reset / Body */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #014220; /* Deep green background */
            color: #FFFFFF; /* White text */
        }

        /* Container */
        .admin-container {
            padding: 20px;
        }

        /* Navigation */
        .admin-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #013419; /* Slightly darker green */
            padding: 10px 20px;
            border-radius: 5px;
        }
        .admin-nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }
        .admin-nav ul li {
            cursor: pointer;
        }
        .search-bar input {
            padding: 5px;
            border-radius: 4px;
            border: none;
        }

        /* Categories */
        .categories {
            margin-top: 20px;
        }

        /* Product List */
        .product-list {
            margin-top: 20px;
        }
        .product-item {
            display: flex;
            gap: 15px;
            align-items: center;
            background-color: #025D2B; /* A green shade for item background */
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .product-photo {
            width: 80px;
            height: 80px;
            background-color: #013419; 
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            overflow: hidden; /* so the image fits nicely if larger */
        }
        /* We replaced the <p>Photo</p> with an <img> for preview */
        .product-photo img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .product-details h4 {
            margin-bottom: 5px;
        }

        /* Action Buttons */
        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }
        .action-buttons button {
            padding: 10px 20px;
            background-color: #013419;
            color: #FFFFFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .action-buttons button:hover {
            background-color: #025D2B;
        }

        /* Create Product Form */
        .create-product-form {
            margin-top: 20px;
            background-color: #025D2B;
            padding: 20px;
            border-radius: 5px;
        }
        .create-product-form h3 {
            margin-bottom: 10px;
        }
        .create-product-form label {
            display: block;
            margin-top: 10px;
        }
        .create-product-form input,
        .create-product-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-radius: 4px;
        }
        .create-product-form button[type="submit"] {
            margin-top: 15px;
            background-color: #013419;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .create-product-form button[type="submit"]:hover {
            background-color: #014220;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Top navigation bar -->
        <nav class="admin-nav">
            <ul>
                <li>Admin</li>
                <li>Sign Up</li>
                <li>Customer View</li>
            </ul>
            <div class="search-bar">
                <input type="text" placeholder="Search..." />
            </div>
        </nav>

        <!-- Categories section -->
        <div class="categories">
            <h3>Categories</h3>
        </div>

        <!-- Product list (example placeholders) -->
        <div class="product-list">
            <!-- Example of one product item; repeat or loop through your data -->
            <div class="product-item">
                <div class="product-photo">
                    <!-- Replaced <p>Photo</p> with an <img> for live preview -->
                    <img id="adminPhotoPreview" src="" alt="No Photo">
                </div>
                <div class="product-details">
                    <h4>Shoe Name</h4>
                    <p>Sizes</p>
                    <p>Description</p>
                    <p>Price</p>
                    <p>Stock No</p>
                </div>
            </div>
            <!-- Replicate more product-item blocks or loop through your products from the controller -->
        </div>

        <!-- Action buttons -->
        <div class="action-buttons">
            <button class="create-product-btn">Create New Product</button>
            <button class="stock-report-btn">Generate Stock Level Report</button>
        </div>

        <!-- Form for creating/uploading a new product -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="create-product-form">
            @csrf
            <h3>Create / Upload New Product</h3>

            <label for="photo">Upload Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*">

            <label for="name">Shoe Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="sizes">Sizes:</label>
            <input type="text" name="sizes" id="sizes" placeholder="e.g., 7, 8, 9" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="3"></textarea>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" required>

            <label for="stock">Stock No:</label>
            <input type="number" name="stock" id="stock" required>

            <button type="submit">Save Product</button>
        </form>
    </div>

    <!-- Small JavaScript snippet to show the uploaded photo in the .product-photo img -->
    <script>
        const photoInput = document.getElementById('photo');
        const adminPhotoPreview = document.getElementById('adminPhotoPreview');

        photoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    adminPhotoPreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                // If no file is selected, clear the preview
                adminPhotoPreview.src = '';
            }
        });
    </script>
</body>
</html>
