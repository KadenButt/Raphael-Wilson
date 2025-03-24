<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <style>
      body {
        /* We'll add a transition so the color changes smoothly */
        transition: background-color 0.3s ease, color 0.3s ease;
      }
    </style>


    <style>
        @media (max-width: 768px) {
            #navigation {
                flex-direction: column;
                align-items: center;
            }
        }

        .order-header {
            margin-top: -2%;
            font-size: 30px;
            text-align: center;
        }

        .order-confirmation {
            margin-left: 5%;
            margin-top: -2%;
        }

        .orders-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .order {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ebf3f7;
            padding: 15px;
            padding-bottom: 5px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            width: 220px;
        }

        .order img {
            width: 180px;
            height: auto;
            object-fit: cover;
            margin-bottom: 10px;
        }


        .order-details {
            color: #ebf3f7;
            background-color: #104904;
            border-radius: 20px;
            width: 100%;
            padding: 10px;
            text-align: center;
        }

        #cancel-button,
        #cancel-button2 {
            margin-top: 10px;
            font-weight: bold;
            border: none;
            color: #ebf3f7;
            background-color: #104904;
            border-radius: 50px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #cancel-button:hover,
        #cancel-button2:hover {
            background-color: #ebf3f7;
            color: #104904;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .order-details2 {
            margin-left: 50%;
            color: #ebf3f7;
            background-color: #104904;
            align-items: center;
            border-radius: 20px;
            width: 160px;
            padding: 10px;
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
            transition: background-color 0.3s ease;
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
            transition: background-color 0.3s ease, color 0.3s ease;

        }

        .dropdown-menu a {
            display: block;
            padding: 10px 20px;
            color: #104904;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, color 0.3s ease;

        }

        .dropdown-menu a:hover {
            background-color: #ebf3f7;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: white;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #004d00;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1,
        h2 {
            text-align: center;
            color: white;
        }

        .contact-info,
        .social-media,
        .contact-form {
            margin: 20px 0;
        }

        .contact-info p,
        .social-media a {
            margin: 5px 0;
            color: white;
        }

        .contact-info a,
        .social-media a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .social-media {
            text-align: center;
        }

        .social-media a:hover {
            color: #f2f2f2;
        }

        .contact-form label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }

        .contact-form input,
        .contact-form textarea {
            width: calc(100% - 40px);
            max-width: 700px;
            margin: 0 auto 15px;
            display: block;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            color: #333;
            box-sizing: border-box;
        }

        .contact-form button {
            padding: 10px 20px;
            background-color: #003300;/ color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            margin: 20px auto 0;
        }

        .contact-form button:hover {
            background-color: #002200;
        }



        body.dark {
            background-color: #111 !important;
            color: #eee !important;
        }
        body.dark #navigation {
            background-color: #222 !important;
        }
        body.dark .menu-icon {
            background-color: #aaa !important;
        }
        body.dark .dropdown-menu {
            background-color: #333 !important;
            color: #fff !important;
        }
        body.dark .dropdown-menu a {
            color: #fff !important;
        }
        body.dark .container {
            background-color: #333 !important;
        }
        body.dark h1, 
        body.dark h2,
        body.dark .contact-info p,
        body.dark .social-media a,
        body.dark .contact-form label {
            color: #fff !important;
        }
        body.dark .contact-form input,
        body.dark .contact-form textarea {
            background-color: #444 !important;
            color: #fff !important;
            border: 1px solid #666 !important;
        }
        body.dark .contact-form button {
            background-color: #555 !important;
            color: #eee !important;
        }
        body.dark .contact-form button:hover {
            background-color: #666 !important;
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
      @guest
      <div class="nav-buttons">
        <button id="signup" onclick="window.location.href='{{route('register')}}'">Sign Up</button>
        <button id="login" onclick="window.location.href='{{route('login')}}'">Log In</button>
      </div>
      @endguest



      <button id="themeToggleBtn" 
        style="padding: 10px; 
               border-radius: 4px; 
               font-weight: bold; 
               background-color: #fff; 
               color: #104904; 
               border: 2px solid #104904; 
               cursor: pointer;
               transition: background-color 0.3s ease, color 0.3s ease;">
        Dark Mode
      </button>





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
          @auth
          @if(session('admin'))
          <a href="{{ route('admin.home') }}">Admin Home</a>
          @endif
          @endauth
          <a href="{{route('logout')}}">Logout</a>

          @endauth
        </div>
      </div>
    </div>
  </header>

    </header>


    <div class="container">
        <h1>Contact Us</h1>

        <div class="contact-info">
            <h2>Our Details</h2>
            <p><strong>Email:</strong> <a href="mailto:raphaelwilsonfootwear@gmail.com">raphaelwilsonfootwear@gmail.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+44745572003">+44745572003</a></p>
            <p><strong>Address:</strong> The Priory Queensway St, B4 6FP</p>
        </div>

        <div class="social-media">
            <h2>Follow Us</h2>
            <a href="https://www.instagram.com/raphaelwilsonfootwear" target="_blank">Instagram</a>
        </div>

        <div class="contact-form">
            <h2>Get in Touch</h2>
            <form action="{{route('contact.submit')}}" method="POST">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div>
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
    </div>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;
    const themeToggleBtn = document.getElementById('themeToggleBtn');

    // If user had dark mode on before, keep it on
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
    }

    themeToggleBtn.addEventListener('click', function() {
        body.classList.toggle('dark');
        if (body.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
});
</script>






</body>

</html>