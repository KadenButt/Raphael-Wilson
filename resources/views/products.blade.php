<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="icon" type="image/png" href="favicon_io/android-chrome-512x512.png">
    <link rel = "stylesheet" href = "styles.css">
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
            width:150px;
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
            white-space: nowrap; /*stops text going underneath when larger*/
            overflow: hidden; /*so it doesnt overflow the container*/
            color: #ebf3f7;
            font-weight: bold;
            margin: 0;   
        }

        .basket-text {
            text-align: center;
            font-size: 30px;
        }

        .basket-contents {
            text-align: left;
            position: relative;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            margin-top:5%;
            margin-left:20px;
            margin-right: 40%;
            width:100%;
            max-width:400px;
            padding: 15px;
            padding-bottom:5px;
            box-sizing: border-box;
        }

        .basket-contents h2{
            margin-top:0%;
        }

        .basket-container {
            display:flex;
            align-items:flex-start;
            flex-wrap: nowrap;
            position:relative;
        }

        .black-shoe {
            margin-top:5%;
            margin-left:5%;
            width:200px;
            height:auto;
            object-fit:cover;
        }

        .black-shoe img {
            width:200px;
            height:auto;
            object-fit:cover;
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
            font-size:15px;
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
            top: 120%;
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
            background:none;
            border:none;
            color: #ebf3f7;
            cursor:pointer;
        }
        .total {
            text-align: left;
            position: absolute;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            top:auto;
            bottom:5%;
            right:10%;
            width:80%;
            max-width:300px;
            padding: 10px;
            padding-bottom:5px;
            box-sizing: border-box;
        }
        .checkout-button {
            display: block;
            margin: 10px auto 0; 
            padding: 5px 15px;
            background-color: white;
            color: #104904;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
}

        .checkout-button:hover {
            background-color: #ebf3f7;
            color: #104904;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
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

.search-item-row ul{
    background: white;
    border-top: 1px;
    padding: 15px 10px;
}

.search-item-row ul li{
    list-style: none;
    border-radius: 3px;
    padding: 15px 10px;
    cursor: pointer;
}

.search-item-row ul li:hover {
    background: #e9f3ff;
}

div.gallery {
    border: 1px solid #ccc;
    margin-top: 50px;
  }
  
  div.gallery:hover {
    border: 1px solid #777;
  }
  
  div.gallery img {
    width: 100%;
    height: 200px;
  }
  
  div.desc {
    padding: 15px;
    text-align: center;
  }
  
  .responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
    margin-bottom: 40px;
  }
    </style>
</head>
<body>
    <header id="navigation">

        <a href="home.blade.php">
        <img src="Raphael-wilson-logo.png" alt="Logo">
        </a>

        <div class="luxury-text">
            <h1><span style="font-weight:normal">Luxury footwear right at your fingertips</span></h1>
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
    <div class = "search-box">
            <div class = "row">
            <input type = "text" id = "search-input-box" placeholder = "Search Products" autocomplete="off">
            <button class = "search-icon material-symbols-outlined">search</button>
        </div>
        <div class = "search-item-row">
        </div>
    </div>

    <div class = "responsive" id = "product-list">
        <div class = "gallery" data-keywords="Retro Sandals">
            <a target = "_blank"> 
                <img src = "https://i.pinimg.com/736x/02/13/3c/02133cee6f455581663337b25808a3ee.jpg" alt = "Retro Sandals" width = "600" height = "400"></a>
            <div class = "desc"> Retro Sandals <br> Sizes 6-9 <br> A luxury shoe for every occassion <br> £700
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery" data-keywords = "Hiking Sandals">
            <a target = "_blank">
                <img src = "https://i.pinimg.com/originals/a6/5f/c2/a65fc24d738bfeb457847e3a623fe7e0.jpg" alt = "Hiking Sandals" width = "600" height = "400"></a>
            <div class = "desc"> Hiking Sandals <br> Sizes 6-9 <br> A luxury shoe for every occassion <br> £700
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://i.pinimg.com/originals/74/0f/35/740f35d2757270d5fe16f696bfca7baf.jpg" alt = "Fashion pro Boots" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://thumbs.dreamstime.com/b/air-force-pilot-combat-boots-icon-doodle-hand-drawn-outline-style-part-military-equipments-set-vector-236492638.jpg" alt = "Combat Boots" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://static.vecteezy.com/system/resources/previews/007/645/009/original/high-heels-shoes-outline-stype-design-element-illustration-free-vector.jpg" alt = "Classy High Heels" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://th.bing.com/th/id/OIP.IEF9vSlXMqtXBW2bWtZnfQHaHa?rs=1&pid=ImgDetMain" alt = "Premium OG Heels" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://img.freepik.com/premium-vector/sneakers-outline-drawing-black-lines-sport-shoe-white-background_231873-1297.jpg?w=2000" alt = "Lowtop 1996 Sneakers" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://static.vecteezy.com/system/resources/previews/006/426/627/original/shoes-sneaker-outline-drawing-sneakers-drawn-in-a-sketch-style-black-line-sneaker-trainers-template-outline-illustration-free-vector.jpg" alt = "Hi top basketball Sneakers" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://static.vecteezy.com/system/resources/thumbnails/005/622/869/small_2x/running-shoes-outline-icon-illustration-on-white-background-free-vector.jpg" alt = "24' Supreme Running Shoes" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
    <div class = "responsive">
        <div class = "gallery">
            <a target = "_blank">
                <img src = "https://th.bing.com/th/id/OIP.PiRqzdoTS8QNZCCrExYvhAHaHa?w=740&h=740&rs=1&pid=ImgDetMain" alt = "Vintage Running Shoes" width = "600" height = "400"></a>
            <div class = "desc"> Add product description here
            </div>
        </div>
    </div>
</body>
    <script>
        let availableKeywords = [
            'retro sandals',
            'Hiking Sandals',
            'Boots 1',
            'Boots 2',
            'Heels 1',
            'Heels 2',
            'Sneakers 1',
            'Sneakers 2',
            'Running Shoes 1',
            'Running Shoes 2',
        ];

        const resultsBox = document.querySelector (".search-item-row");
        const inputBox = document.getElementById ("search-input-box");
        const searchButton = document.querySelector(".search-icon");
        const productList = document.querySelectorAll(".gallery");

        inputBox.onkeyup = function(){
            let result = [];
            let input = inputBox.value;
            if (input.length){
                result = availableKeywords.filter((keyword)=>{
                    return keyword.toLowerCase().includes(input.toLowerCase());
                });
            display (result);
            }
        }

        function display(result){
            const content = result.map((list)=>{
                return "<li onclick=selectInput(this)>" + list + "</li>";
            });
            resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
        }

        function selectInput(list){
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

    </script>
