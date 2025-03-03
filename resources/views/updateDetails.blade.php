<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    <link rel="icon" type="image/png" href="{{asset('favicon_io/android-chrome-512x512.png')}}">

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
                    <a href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </header>
<body> 
    <section id="update-details">
        <div class="details-header">
            <h2>Update Details</h2>
        </div>
        <form id="details-form" method="POST" action="{{ route('customer.update') }}">
            @csrf
            <input type="text" name="customer_fname" value="{{$customer->customer_fname;}}">
            <br><br>
            <input type="text" name="customer_sname" value="{{$customer->customer_sname;}}">
            <br><br>
            <input type="email" name="customer_email" value="{{$customer->customer_email;}}" />
            <br><br>
            <input type="text" name="address_number" value="{{$address->address_number;}}">
            <br><br>
            <input type="text" name="address_street" value="{{$address->address_street}}">
            <br><br>
            <input type="text" name="address_postcode" value="{{$address->address_postcode}}">
            <br><br>
            <input type="password" name="account_number" value="{{$payment->account_number}}" />
            <br><br>
            <input type="submit" name="submitted" value="Update" />
            <br>
            <input type="hidden" name="submitted" value="true" />
        </form>
        <img src="{{asset('favicon_io/android-chrome-512x512.png')}}" alt="side-logo">

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
    </body>
    </html>

    <style>
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

        #details-form {
            padding-top:10px;
            padding: right -30px;
            padding-bottom: 10px;
            margin-left: 5%;
            background-color: #104904;
            border-radius:20px;
            width:40%;
        }
        
        #update-details p {
            color:white;
            margin-left:5%;
            padding:10px;
        }

        #update-details h2 {
            font-size: 40px;
            margin-left:19%;
            margin-top:1%;
        }

    input[type="text"],input[type="email"],
    input[type="password"] {
        margin-left:5%;
        border-radius:20px;
        background-color: white;
        border-radius:20px;
        padding:5px;
        width:60%;
        box-sizing:border-box;
    }

    input[type="submit"] {
        margin-left:5%;
        cursor:pointer;
        background-color: white;
        border-radius:20px;
        box-sizing:border-box;
        padding:10px;
        font-weight:bold;
        font-size:15px;
    }

    input[type="submit"]:hover {
        background-color: #ebf3f7;
        transition: background-color 0.3s ease, color 0.3s ease;
        box-shadow: 0 4px 6px rgba(0.2, 0.2, 0.2, 0.2);
    }

    img[alt="side-logo"] {
            width:400px;
            margin-left:55%;
            margin-top:-44%;
            margin-bottom:0.7%
        }
    </style>