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

  <title>admin_home</title>
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
                    <h5 class="" style="color:skyblue"><?php 
                    
                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $qry=new MongoDB\Driver\Query([]);
                    $rows=$mongo->executeQuery("WebCrate.admins",$qry);

                    foreach($rows as $row)
                    {
                      if($_SESSION['user_session']==$row->mail )
                      {
                          echo $row->fname;
                      }
                    }
                    ?></h5>
              </li>
              <li class="active"><a href="admin_home.php">Request</a></li>
              <li><a href="my_projects.php">My Projects</a></li>
              
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
        <h2>Request Status</h2>
       </div>
      <div class="row mt-5">

      <?php 
        $user=$_SESSION['user_session'];
        $filters=['dev_mail'=>$user];
          require 'composer_files/autoload.php';
          $mong=new MongoDB\Client("mongodb://localhost:27017");
          $db=$mong->WebCrate;
            $mObj=$db->request->find($filters);
              
               foreach($mObj as $row)
               {
                
                    if($row['dev_mail']!=$user)
                    {?>
                      <h4 class="tex-center">No Request Available</h4>
                    <?php 
                    }
                ?>
        <div class="col mt-5">
        <Form action="dashboard.php" method="post" enctype="multipart/form-data">
          
            <div class="row">
                <div class="col-6">
                        <h4 class="tex-center">Client Name : <?php echo $row['client'];?></h4>
                        <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                        <p> <strong>Project Type : </strong> <?php echo $row['info'];?></p>
                        <p> <strong>Project description : </strong> <?php echo $row['des'];?></p>
                </div>
            </div>
            
              <div>
                <?PHP
                $mail=$row['mail'];
                $info=$row['info'];
                $filter=['dev_mail'=>$user,'info'=>$info,'mail'=>$mail];
                $option=[];
                  $mOb=$db->waiting->find($filter,$option);

                  foreach($mOb as $row)
                  {
                ?>
                 <a class="btn btn-danger btn-lg float-center text-white">Cancelled</a>
                
            <?php
                  }
            ?>
                <button type="button" class="btn btn-lg  float-center " style="background-color:orange;color:white;"><a class="text-white" href="confirm.php?client=<?php echo $row['client'];?>&mail=<?php echo $row['mail'];?>&info=<?php echo $row['info'];?>&des=<?php echo $row['des'];?>&dev_mail=<?php echo $row['dev_mail'];?>">Confirm Request ?</a></button>
                <a class="btn btn-danger btn-lg float-center text-white" href="cancel.php?client=<?php echo $row['client'];?>&mail=<?php echo $row['mail'];?>&info=<?php echo $row['info'];?>&des=<?php echo $row['des'];?>&dev_mail=<?php echo $row['dev_mail'];?>">Cancel Request </a>
              </div>
            </Form>

          </div>
        </div>
        
        <?php

               }
      ?>

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