<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <title>Log in</title>
    </head>

    <header id="navigation">
        <button id= "home" onclick="window.location.href='index.blade.php'">Home</button>
        <button id= "products" onclick="window.location.href='products.blade.php'">Products</button>
        <button id= "contact" onclick="window.location.href='contact.blade.php'">Contact</button>
        <button id= "about us" onclick="window.location.href='aboutus.blade.php'">About us</button>

    </header>

    <body>
        <section id="login">
            <div id="login-header">
                <h2>Log in</h2>
            </div>
            <form id="login-form" action="login.blade.php" method="POST">

                <input type="email" name="email" placeholder="Email"/>
                <br><br>
                <input type="password" name="password" placeholder="Password"/>
                <br><br>
                <input type="submit" name="submitted" value="Log in"/>

                <input type = "hidden" name = "submitted" value = "true" />

                <p>Not a user? <a href= "register.blade.php">Register here</a></p>

            </form>
            </section>
    </body>
</html>