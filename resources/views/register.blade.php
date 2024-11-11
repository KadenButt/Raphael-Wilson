<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <title>Register</title>
    </head>
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
