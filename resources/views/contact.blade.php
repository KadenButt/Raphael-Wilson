<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; 
            color: white; 
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #004d00; 
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1, h2 {
            text-align: center;
            color: white; 
        }
        .contact-info, .social-media, .contact-form {
            margin: 20px 0;
        }
        .contact-info p, .social-media a {
            margin: 5px 0;
            color: white; 
        }
        .contact-info a, .social-media a {
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
        .contact-form input, .contact-form textarea {
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
            background-color: #003300; /
            color: white;
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
    </style>
</head>
<body>
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
            <form action="#" method="post">
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
</body>
</html>
