<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="icon" type = "image" href = "favicon_io\android-chrome-512x512.png">
        
        <title>Reset Password</title>
    </head>

    <header id="navigation">
        <button id= "home" onclick="window.location.href='home.blade.php'">Home</button>
        <button id= "products" onclick="window.location.href='products.blade.php'">Products</button>
        <button id= "contact" onclick="window.location.href='contact.blade.php'">Contact</button>
        <button id= "about us" onclick="window.location.href='aboutus.blade.php'">About us</button>

    </header>

    <body>

        <section id="reset-password">
            <div id="reset-header">
                <h2>Reset Password</h2>
            </div>
            <form id="reset-form" action="login.blade.php" method="POST">

                <input type="email" name="email" placeholder="Email"/>
                <br><br>
                <input type="password" name="new-password" placeholder="New Password"/>
                <br><br>
                <input type="password" name="confirm-new-password" placeholder="Confirm New Password"/>
                <br><br>
                <input type="submit" name="submitted" value="Reset Password"/>

                <input type = "hidden" name = "submitted" value = "true" />

                <p>Not a user? <a href="register.blade.php">Register here</a></p>

            </form>
        </section>
    </body>
</html>
