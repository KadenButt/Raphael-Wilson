<!DOCTYPE html>
<html lang="en">
<style> 
/*
* font-family: 'Roboto', sans-serif;
* font-weight: 100, 400, 400-italic, 700;
*/
* {
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
  }
  
  body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #0A1E0A;
    color: #EAEAEA;
    font-weight: 400;
  }
  
  
  img {
    max-width: 100%;
  }
  
  p {
    font-size: 1.125rem;
    color: #EAEAEA;
    margin: 0 0 15px;
    line-height: 1.7;
  }
  
  h1, h2, h3, h4 {
    margin: 0;
    color: #EAEAEA;
  }
  
  h1 {
    font-size: 38px;
  }
  
  @media (min-width: 768px) {
    h1 {
      font-size: 150px;
    }
  }
  
  h2 {
    font-size: 32px;
  }
  
  @media (min-width: 768px) {
    h2 {
      font-size: 62px;
    }
  }
  
  h4, h5, h6 {
    margin: 0;
    color: #000000;
  }
  
  h4 {
    font-size: 24px;
  }
  
  @media (min-width: 768px) {
    h4 {
      font-size: 48px;
    }
  }
  
  h5 {
    font-size: 20px;
  }
  
  @media (min-width: 768px) {
    h5 {
      font-size: 40px;
    }
  }
  
  h6 {
    font-size: 16px;
  }
  
  @media (min-width: 768px) {
    h6 {
      font-size: 32px;
    }
  }
  
  section {
    padding: 100px 20px;
  }
  
  a.cta {
    padding: 12px 32px;
    text-align: center;
    text-decoration: none;
    background-color: #146D24;
    border: 1px solid #11511C;
    border-radius: 30px;
    color: #FFFFFF;
    text-transform: uppercase;
    display: inline-block;
    -webkit-box-shadow: rgba(0, 0, 0, 0.7) 0px 6px 18px 0px;
            box-shadow: rgba(0, 0, 0, 0.7) 0px 6px 18px 0px;
    -webkit-transition: all 0.7s ease;
    transition: all 0.7s ease;
  }
  
  a.cta:hover {
    background-color: #1F8D32;
    border: 1px solid #0E3C10;
    color: #000000;
  }
  
  .container {
    max-width: 1150px;
    margin: 0 auto;
  }
  
  .banner {
    background: url(./images/banner.jpg) no-repeat;
    background-position: center;
    background-size: cover;
  }
  
  .banner h1 {
    color: rgba(255, 255, 255, 0.9);
    text-transform: uppercase;
    font-weight: 700;
  }
  
  .first {
    background-color: #092509;
    background-image: linear-gradient(315deg, #146D24 0%, #11511C 74%);
  }
  
  .second {
    background-color: #ffffff;
    position: relative;
  }
  
  .second .right-content {
    color: #000000;
    position: absolute;
    top: 50%;
    right: 20px; 
    transform: translateY(-50%);
    text-align: right;
    max-width: 40%; 
  }
  
  
  
  .third {
    background-color: #4d8c0b;
  }
  
  footer {
    background-color: #011501;
    padding: 45px 20px;
    text-align: center;
  }
  
  footer p {
    color: #EAEAEA;
    margin: 0;
    font-weight: 200;
    font-size: 15px;
  }
  .social-icon {
    color: white;
    margin: 0 15px;
    font-size: 24px;
    text-decoration: none;
    transition: color 0.3s, transform 0.3s;
  }
  
  .social-icon:hover {
    color: #1da1f2; 
    transform: scale(1.2);
  }
  
  .dark-mode-toggle {
    background-color: #146D24;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 20px;
    margin-left: 20px;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }
  
  .dark-mode-toggle:hover {
    background-color: #1F8D32;
    color: #000;
  }
  
  body.light-mode {
    background-color: #FFFFFF;
    color: #222222;
  }
  
  body.light-mode p {
    color: #222222;
  }
  
  body.light-mode h1, 
  body.light-mode h2, 
  body.light-mode h3, 
  body.light-mode h4, 
  body.light-mode h5, 
  body.light-mode h6 {
    color: #222222;
  }
  
  body.light-mode .first {
    background-color: #f4f4f4;
    background-image: none;
  }
  
  body.light-mode .second {
    background-color: #f9f9f9;
  }
  
  body.light-mode .third {
    background-color: #e2e2e2;
  }
  
  body.light-mode footer {
    background-color: #333333;
  }
  
  body.light-mode footer p {
    color: #ffffff;
  }
  
  body.light-mode .social-icon {
    color: #ffffff;
  }
  
  body.light-mode .cta {
    background-color: #146D24;
    color: #fff;
  }
  
  body.light-mode .cta:hover {
    background-color: #1F8D32;
    color: #000;
  }
</style>

<head>



  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;1,400&display=swap" rel="stylesheet">
 
  <link rel="stylesheet" href="resources\css\about.css">
  <title> About US</title>
</head>
<body>
  <section class="banner">
    <div class="container">
      <h1 style="font: size 800px;">About us...</h1>
     
    </div>     
  </section>  
  <section class="first">
    <div class="container">
      <h2>Our Story</h2>
      <p>At Raphael Wilson, we believe that luxury is more than just a label—it’s a lifestyle. Our journey began with a simple yet powerful vision: to redefine sophistication through footwear that blends timeless elegance with modern craftsmanship. Every pair of shoes we create is a statement of style, confidence, and impeccable artistry</p>
      
    </div>
  </section>
  <section class="second">
    <div class="container">
      <div class="left-img">
        <img src="./images/photo-1.jpg" alt="Person">
      </div>
      <div class="right-content">
        <h5>Craftsmanship & Quality</h5>
        <p style="color: black;">We source the finest materials from around the world to ensure that every step you take is one of unparalleled comfort and refinement. Our master artisans employ traditional techniques alongside cutting-edge innovation to craft shoes that stand the test of time. From hand-stitched detailing to premium leather finishes, each design embodies precision and passion.</p>

        <a class="cta" href="products">View Products »</a>
      </div>
    </div>
  </section>
  <section class="third">
    <div class="container">
      <div class="left-content">
        <h2>Sustainability & Ethical Responsibility</h2>
        <p>True luxury comes with responsibility. We are committed to sustainable practices that prioritize ethical sourcing, eco-conscious production, and fair labor. Our dedication to sustainability ensures that our shoes not only elevate your style but also contribute to a better future for our planet and communities.</p>
       
      
  </section>  
  
  <section class="six">
    <div class="container">
      <h2>How to Get in Touch</h2>
      <p>Our site Has a dedicated contact us page press below to access or use navigation bar</p>
     
      
      <a class="cta" href="contact">Contact us »</a>
    </div>
  </section>
  <footer>
    <div class="container">
      <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
    </div>
   
  <button id="darkModeToggle" class="dark-mode-toggle">
    <i id="modeIcon" class="fas fa-moon"></i>
  </button>
  </footer>
  
</body>

<script>
  const toggleBtn = document.getElementById('darkModeToggle');
  const modeIcon = document.getElementById('modeIcon');

  toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');

    // Change icon based on mode
    if (document.body.classList.contains('light-mode')) {
      modeIcon.classList.remove('fa-moon');
      modeIcon.classList.add('fa-sun');
    } else {
      modeIcon.classList.remove('fa-sun');
      modeIcon.classList.add('fa-moon');
    }
  });

  
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="WhBErEfIHZGSvb4lZvk3L";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();


</script>

</html>