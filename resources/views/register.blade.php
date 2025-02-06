<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="icon" type="image" href="favicon_io\android-chrome-512x512.png">

    <title>Register</title>
</head>

<header id="navigation">

<script>
document.addEventListener("DOMContentLoaded", function () {
    const adminCheckbox = document.querySelector('input[name="admin"]');
    const userCheckbox = document.querySelector('input[name="user"]');
    const customerForm = document.getElementById("register-form");
    const adminForm = document.getElementById("admin-register-form");

    function toggleAddressFields() {
        customerForm.style.display = "block";
        adminForm.style.display = "none";

        if (adminCheckbox.checked) {
            // Show admin form, hide customer form
            customerForm.style.display = "none";
            adminForm.style.display = "block";

            // Uncheck user checkbox if it exists
         
            adminCheckbox.checked = false;
            
        } else if(userCheckbox.checked) {
            // Show customer form, hide admin form
            customerForm.style.display = "block";
            adminForm.style.display = "none";

            // Uncheck admin checkbox if needed
        
            userCheckbox.checked = false;
            
        }
    }

    // Add event listeners only if the elements exist
    if (adminCheckbox) adminCheckbox.addEventListener("change", toggleAddressFields);
    if (userCheckbox) userCheckbox.addEventListener("change", toggleAddressFields);

    // Initialize on page load
    toggleAddressFields();
});

</script>

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


        <!-- Form for the customer login -->
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
            <input type="submit" name="submitted" value="Register" />
            <br>
            
            <label for="admin">Register As Admin</label><br>
            <input type="checkbox" name="admin" >
            
            <input type="hidden" name="submitted" value="true" />
            <p>Already a user? <a href="{{ route('login') }}">Log in here</a></p>
        </form>

        <!-- Form for the admin login -->
        <form id="admin-register-form" method="POST" action="{{ route('customer.register') }}">
            @csrf
            <input type="text" name="customer_fname" placeholder="First Name">
            <br><br>
            <input type="text" name="customer_sname" placeholder="Last Name">
            <br><br>
            <input type="email" name="customer_email" placeholder="Email" />
            <br><br>
            
            <input type="password" name="customer_password" placeholder="Password" />
            <br><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <br><br>
            <input type="submit" name="submitted" value="Register" />
            <br>
            
            <label for="user">Register As A User</label><br>
            <input type="checkbox" name="user" >
            
            <input type="hidden" name="submitted" value="true" />
            <p>Already a user? <a href="{{ route('login') }}">Log in here</a></p>
        </form>



        <img src="{{asset('favicon_io/android-chrome-192x192.png')}}" alt="side-logo">
    </section>



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
        
        #register-form {
            padding-top:10px;
            padding: right -30px;
            margin-left: 5%;
            background-color: #104904;
            border-radius:20px;
            width:40%;
        }
        
        #register p {
            color:white;
            margin-left:5%;
            padding:10px;
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
            width:540px;
            margin-left:55%;
            margin-top:-44%;
            margin-bottom:6%;
        }

</style>