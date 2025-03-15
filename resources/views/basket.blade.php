<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="icon" type="image/png" href="{{asset('favicon_io/android-chrome-512x512.png')}}">

    <style>
        @media (max-width: 768px) {
            #navigation {
                flex-direction: column;
                align-items: center;
            }

            .basket-container {
                align-items: center;
                flex-direction: column;
                grid-template-columns: repeat(2, 1fr);
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

        .basket-text {
            margin-top:-2%;
            text-align: center;
            font-size: 30px;
        }
        
        .basket-contents {
            text-align: center;
            position: relative;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            width:80%;
            max-width: 400px;
            padding-bottom: 5px;
            box-sizing: border-box;
            margin: 20px auto;
        }

        .basket-contents h3 {
            margin-top: 0;
            margin-bottom: 0;
        }

        .basket-container {
            margin-top:-3%;
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            flex-wrap: wrap;
            position: relative;
        }
 
        .black-shoe img {
            width: 100%;
            height:250px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
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

        .total {
            width: 340px;
            grid-column: 3 / 4; /* Place the checkout button in the 3rd column */
            text-align: center;
            margin-left: 10%;
            margin-bottom:10%;
            border-radius: 20px;
            background-color: #104904;
            color: #ebf3f7;
            padding: 10px;
            box-sizing: border-box;
            align-self:center; /* Align to the top of the grid row */
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
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
        }

        .checkout-button:hover {
            background-color: #ebf3f7;
            color: #104904;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
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
                    <a href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <div class="basket-text">
        <h1>Basket</h1>
    </div>
    <div class="basket-container">
            @for ($i = 0; $i < count($products); $i++)
                <div class="basket-contents">
                    <div class="black-shoe">
                        <img src="data:image/jpeg;base64,{{ base64_encode($products[$i]->product_photo) }}" alt="shoe">
                    </div>
                    <h3>{{ $products[$i]->product_name }}</h3>
                    <div class="shoe-description">
                        <p>
                            <b>Size: </b> {{ $sizes[$i] }}
                        </p>
                        <form id="change-quantity" method="POST" action="{{ route('basket.change_quantity')}}">
                            @csrf
                            <label for="quantity"><b>Quantity: </b></label>
                            <input type="number" id="quantity" name="quantity" min="1" value="{{$basket_items[$i]->quantity}}">
                            <input type="hidden" name="basket_item_id" value="{{$basket_items[$i]->basket_item_id}}" />
                            <button type="submit"> Change</button>
                        </form>
                        
                        <p>In stock</p>
                       
                        <h3>£{{ $products[$i]->product_price * $basket_items[$i]->quantity }}</h3>
                    </div>
                    <br>
                    <div class="delete-button">
                        <form id="delete-item" method="POST" action="{{ route('basket.delete') }}">
                            @csrf
                            <button type="submit"> Delete</button>
                            <input type="hidden" name="item_id" value="{{$basket_items[$i]->basket_item_id}}" />
                        </form>
                    </div>
                
            </div>    @endfor
            <div class="total">
        <h2>Total: £{{$price}}</h2>
        <form method="POST" action="{{ route('order.create') }}">
            @csrf
            <button class="checkout-button" type="submit">
                <h2>Continue to Checkout</h2>
            </button>
            <input type="hidden" name="total_price" value="{{$price}}" />
        </form>
    </div>
</div>


    </div>


</body>

</html>
