<?php
  session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Developer Module</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.html">Web Crate</a></h1>
          
          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#developer" class="active">Developer</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#designs">Designs</a></li>
              
              <li><a href="#contact">Contact</a></li>

            </ul>
          </nav>

         
        </div>
      </div>

    </div>
  </header>
  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our provide Team</h2>
        <p>Developers or software engineers are team members that apply their knowledge of engineering and programming languages in software development. Experience designers ensure that the product is easy and pleasant to use. They conduct user interviews, market research, and design a product with end-users in mind.</p>
      </div>

      <div class="">

        <div class="testimonial-item" >
          <p >
            
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            <button class="btn float-right d-flex mt-3 mr-4" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">Book for project

            </button>
          </p>
          <img src="assets/img/WhatsApp Image 2020-09-17 at 1.57.50 AM.jpeg" class="testimonial-img" alt="" style="width: 150px; height: auto;">
          <h3>Lazares Sathya</h3>
          <h4>Web Developer</h4>
        </div>

        <div class="testimonial-item">
          <p>
            
            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
            <button class="btn float-right d-flex mt-3 mr-4" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">Book for project

            </button>
          </p>
          <img src="assets/img/WhatsApp Image 2020-09-17 at 2.10.45 AM.jpeg" class="testimonial-img" alt="" style="width: 150px; height: auto;">
          <h3>Shobhan Manik</h3>
          <h4>Full Stack Developer</h4>
        </div>

        <div class="testimonial-item">
          <p>
            
            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
            <button class="btn float-right d-flex mt-3 mr-4" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">Book for project

            </button>
          </p>
          <img src="assets/img/WhatsApp Image 2020-12-01 at 9.06.59 PM.jpeg" class="testimonial-img" alt="" style="width: 150px; height: auto;">
          <h3>Atul Ashish</h3>
          <h4>Web Developer</h4>
        </div>

        <div class="testimonial-item">
          <p>
           
            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore.
            <button class="btn float-right d-flex mt-3 mr-4" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">Book for project

            </button>
          </p>
          <img src="assets/img/IMG_8766.JPG" class="testimonial-img" alt="" style="width: 150px; height: auto;">
          <h3>Syed Faizan</h3>
          <h4>Back End Developer</h4>
        </div>

        <div class="testimonial-item">
          <p>
          
            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa.
            <button class="btn float-right d-flex mt-3 mr-4" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">Book for project

            </button>
          </p>
          <img src="assets/img/IMG_8869.JPG" class="testimonial-img" alt="" style="width: 150px; height: auto;">
          <h3>Sijoy Samuel</h3>
          <h4>Network Security</h4>
        </div>
        <div class="testimonial-item">
          <p>
            
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo fuga repellendus est soluta laboriosam quisquam aspernatur esse in reiciendis, pariatur quae odio similique quam suscipit perspiciatis iure eos quasi a, ea quis. Eligendi, voluptatum, temporibus neque nulla soluta maxime modi architecto totam aperiam delectus, doloremque vitae vero id pariatur ducimus.
           <button class="btn float-right d-flex mt-3 mr-4" style="background-color:#5846f9 ; color: white; border: 2px solid #6F32E2;">Book for project

           </button>
          </p>
          
          <img src="assets/img/IMG_8873.JPG" class="testimonial-img" alt="" style="width: 150px; height: auto; ">
          <h3>Sangram Rauta</h3>
          <h4>UX/UI Designer</h4>
        </div>

      </div>

    </div>
  </section>
 

   
 

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>