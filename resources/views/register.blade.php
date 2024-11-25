<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <link rel="icon" type="image" href="favicon_io\android-chrome-512x512.png">

    <title>Register</title>
</head>

<header id="navigation">
    <button id="home" onclick="window.location.href='index.blade.php'">Home</button>
    <button id="products" onclick="window.location.href='products.blade.php'">Products</button>
    <button id="contact" onclick="window.location.href='contact.blade.php'">Contact</button>
    <button id="about us" onclick="window.location.href='aboutus.blade.php'">About us</button>

</header>

<body>
    <section id="register">
        <div id="register-header">
            <h2>Register</h2>
        </div>
        <form id="register-form" method="POST" action="{{ route('customer.register') }}">
            @csrf
            <input type="text" name="fname" placeholder="First Name">
            <br><br>
            <input type="text" name="sname" placeholder="Last Name">
            <br><br>
            <input type="email" name="email" placeholder="Email" />
            <br><br>
            <input type="text" name="address_number" placeholder="Address Number">
            <br><br>
            <input type="text" name="street" placeholder="Street Name">
            <br><br>
            <input type="text" name="postcode" placeholder="Postcode">
            <br><br>
            <input type="password" name="payment_number" placeholder="Payment Number" />
            <br><br>
            <input type="password" name="password" placeholder="Password" />
            <br><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <br><br>
            <input type="submit" name="submitted" value="Register" />
            <br><br>
            <input type="hidden" name="submitted" value="true" />

            <p>Already a user? <a href="{{ route('customer.login') }}">Log in here</a></p>

        </form>
    </section>

    <section id="form-error">
        @if ($errors->any())
        <div class="alert alert-danger">
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