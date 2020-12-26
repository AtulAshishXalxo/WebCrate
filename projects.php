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

  <title>projects</title>
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
              <li><a href="index.php">Home</a></li>
              <li><a href="developer.php">Developer</a></li>
              <li><a href="my_request.php">My Request</a></li>
              <li class="nav-item ">
                    <h5 class="" style="color:skyblue"><?php 
                    
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
        $filters=['mail'=>$user];
          require 'composer_files/autoload.php';
          $mong=new MongoDB\Client("mongodb://localhost:27017");
          $db=$mong->WebCrate;
            $mObj=$db->request->find($filters);

               foreach($mObj as $row)
               {
                ?>
        <div class="col">
        <Form action="dashboard.php" method="post" enctype="multipart/form-data">
          
            <div class="row">
                <div class="col-6">
                        <h4 class="tex-center">Client Name : <?php echo $row['client'];?></h4>
                        <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                        <p> <strong>Project Type : </strong> <?php echo $row['info'];?></p>
                        <p> <strong>Project description : </strong> <?php echo $row['des'];?></p>
                </div>
                <div class="col-6">
                            <?php 
                                $dev=$row['dev_mail'];
                                $filters=['mail'=>$user];
                                require 'composer_files/autoload.php';
                                $mong=new MongoDB\Client("mongodb://localhost:27017");
                                $db=$mong->WebCrate;
                                    $mObj=$db->developer->find($filters);
                        
                                    foreach($mObj as $row)
                                    {
                                        if($row->mail==$dev)
                                        {
                            ?>
                            
                            <h4 class="tex-center">Developer Name : <?php echo $row['f_name'];?></h4>
                            <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                            <p> <strong>Specilization : </strong> <?php echo $row['field'];?></p>
                            <p> <strong>Project fee : </strong> <?php echo $row['fee'];?></p>
                            
                                    <?php
                                    }
                                }
                                    ?>
                </div>
            </div>
            
          
             
                
              <div class="card-footer bg-white">
              <?php 
                    if($row->mail!=$user)
                    {
                        require 'composer_files/autoload.php';
                        $mong=new MongoDB\Client("mongodb://localhost:27017");
                        $db=$mong->WebCrate;
                        $mObj=$db->project->find($filters);

                            foreach($mObj as $row)
                            {
              ?>
                <button type="button" class="btn btn-lg float-center" style="background-color:green ; color: white; ">Request confirmed</button>
                <button type="submit" class="btn btn-lg  float-center" style="background-color:green ; color: white; ">Dashboard</button>
                
                <?php 
                            }
                    }   
                    if($row->mail==$user)
                    {
                        ?>
                <button type="button" class="btn btn-lg float-center" style="background-color:red ; color: white; ">Request in waiting</button>
                <?php 
                    }
                ?>
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