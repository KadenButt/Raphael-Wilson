<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="icon" type = "image" href = "favicon_io\android-chrome-512x512.png">
        
        <title>Register</title>
    </head>

    <header id="navigation">
        <button id= "home" onclick="window.location.href='index.blade.php'">Home</button>
        <button id= "products" onclick="window.location.href='products.blade.php'">Products</button>
        <button id= "contact" onclick="window.location.href='contact.blade.php'">Contact</button>
        <button id= "about us" onclick="window.location.href='aboutus.blade.php'">About us</button>

    </header>

    <body>
        <section id="register">
            <div id="register-header">
                <h2>Register</h2>
            </div>
            <form id="register-form" action="register.blade.php" method="POST">

                <input type="email" name="email" placeholder="Email"/>
                <br><br>
                <input type="password" name="password" placeholder="Password"/>
                <br><br>
                <input type="password" name="confirm-password" placeholder="Confirm Password"/>
                <br><br>
                <input type="submit" name="submitted" value="Register"/>

                <input type = "hidden" name = "submitted" value = "true" />

                <p>Already a user? <a href= "login.blade.php">Log in here</a></p>

            </form>
            </section>
    </body>
</html>
