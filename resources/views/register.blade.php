<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="icon" type="image" href="favicon_io\android-chrome-512x512.png">

    <title>Register</title>
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
            <a href="{{route('logout')}}">Logout</a>
            <a href="{{ route('wishlist') }}">Wishlist</a> <!-- Added Wishlist link -->
            <a href="{{route('basket')}}">Basket</a>
        </div>
    </div>
</div>
</header>

<body>
    <section id="register">
        <div class="register-header">
            <h2>Register</h2>
        </div>

        <div class="register-container">
        <form id="register-form" method="POST" action="{{ route('customer.register') }}">
            @csrf
            <input type="text" name="customer_fname" placeholder="First Name">
            <br><br>
            <input type="text" name="customer_sname" placeholder="Last Name">
            <br><br>
            <input type="email" name="customer_email" placeholder="Email" />
            <br><br>

            <input type="text" name="address_number" placeholder="Address Number">
            <br><br>
            <input type="text" name="address_street" placeholder="Street Name">
            <br><br>
            <input type="text" name="address_postcode" placeholder="Postcode">
            <br><br>
            <input type="password" name="account_number" placeholder="Payment Number" />
            <br><br>
            
            <input type="password" name="customer_password" placeholder="Password" />
            <br><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <br><br>
            <input type="text" name="security_question" placeholder="What is your mother's maiden name?">
            <br><br>
            <input type="submit" name="submitted" value="Register" />
            <br><br>

            <input type="hidden" name="submitted" value="true" />
            <p>Already a user? <a href="{{ route('login') }}">Log in here</a></p>
        </form>
    </div>
        <div class="side-logo-admin">
            <img src="{{asset('favicon_io/android-chrome-192x192.png')}}" alt="side-logo-admin">
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
        white-space: nowrap; /*stops text going underneath when larger*/
        overflow: hidden; /*so it doesnt overflow the container*/
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
            flex-shrink: 0; /*stops logo shrinking*/
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
        
        .register-container {
            display: flex;
            align-items: stretch;
           
        }

        .side-logo-admin {
            display: flex;
            align-items: bottom;
            justify-content:center;
            flex:1;
        }


        .side-logo-admin img {
            height: 100%;
            width: auto; 
            max-width:100%;
            object-fit:contain;
        }

        #register-form, #admin-register-form {
            padding-top:25px;
            padding: right -30px;
            margin-left: 5%;
            background-color: #104904;
            border-radius:20px;
            width:40%;
            min-height: 550px;
        }

        #register-form p a, #admin-register-form p a {
            color:#ebf3f7;
            font-weight: bold;
        }
        
        #register p,#admin-register-form p{
            color:white;
            margin-left:5%;
            padding:10px;
        }
        
        .admin-register{
            color:white;
            
        }

        input[type="checkbox"] + label {
            color: white;
            
        }
        input[type="checkbox"] {
            margin-left:5%;
        }

        #register h2 {
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

    input[name="admin_fname"], input[name="admin_sname"],
    input[name="admin_email"], input[name="admin_password"],
    input[name="admin_password_confirmation"] {
        border-radius: 20px;
        background-color: white;
        border-radius: 20px;
        padding: 15px;
        width: 70%;
        box-sizing: border-box;
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

    input[name="admin_register"] {
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
            width:540px;
            margin-left:55%;
            margin-bottom:6%;
        }

    img[alt="side-logo-admin"] {
        width:420px;
        margin-left:55%;
        margin-top:-44%;
    }
    
</style>