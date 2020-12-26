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
            <li class="nav-item ">
                    <h5 style="color:skyblue"><?php 
                    
                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $qry=new MongoDB\Driver\Query([]);
                    $rows=$mongo->executeQuery("WebCrate.users",$qry);

                    foreach($rows as $row)
                    {
                      if($_SESSION['user_session']==$row->mail )
                      {
                          echo $row->fname;
                      }
                    }
                    ?></h5>
              </li>
              <li><a href="index.php">Home</a></li>
              <li><a href="#developer" class="active">Developer</a></li>
              <li><a href="my_request.php">My Request</a></li>
              
              <li><a href="logout.php">Logout</a></li>
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

     
      <div class="row mt-5">

      <?php 
        
          require 'composer_files/autoload.php';
          $mong=new MongoDB\Client("mongodb://localhost:27017");
          $db=$mong->WebCrate;
            $mObj=$db->developer->find();

               foreach($mObj as $row)
               {
                ?>
        <div class="col-md-4 mt-5">
          <div class="card">

            <Form action="request.php" method="post" enctype="multipart/form-data">
             <img class="card-img-top"style="position:relative" src="data:jpeg;base64,<?=base64_encode($row->v_image->getData())?>" height=390px; width="auto;"/>
                        
                <div class="card-body">
                  <h4 class="tex-center"><strong>Name : </strong> <?php echo $row['f_name'];?></h4>
                  <p> <strong>Work Experience : </strong><?php echo $row['exp'];?></p>
                  <p> <strong>Languages : </strong> <?php echo $row['skill'];?></p>
                  <p> <strong>Specialization : </strong> <?php echo $row['field'];?></p>
                  <p> <strong>Fee : &#8377; </strong><?php echo $row['fee'];?></p>
                  <input type="hidden" name="dev_mail" value="<?php echo $row['mail'];?>">
                </div>
              <div class="card-footer bg-white">
                <button type="submit" class="btn  float-center" style="background-color: #5846f9 ; color: white; ">
                select for project</button>
              </div>
            </Form>

          </div>
        </div>
        <?php
               }
      ?>

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