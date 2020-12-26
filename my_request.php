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

  <title>Request Form</title>
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
    <!--request collection-->
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
              <li><a href="developer.php">Developer</a></li>
              <li><a href="#">My Request</a></li>
              
              
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
      <div class="row" style="margin-top:10px;">

      <?php 
        $user=$_SESSION['user_session'];
        $filters=['mail'=>$user];
          require 'composer_files/autoload.php';
          $mong=new MongoDB\Client("mongodb://localhost:27017");
          $db=$mong->WebCrate;
            $mObj=$db->waiting->find($filters);

               foreach($mObj as $row)
               {
                ?>
        <div class="col"><!--client details-->
        <Form action="" method="post" enctype="multipart/form-data">
          
            <div class="row">
                <div class="col-6">
                        <h4 class="tex-center">Your details</h4>
                        <p class="mt-5"> <strong>Name : </strong><?php echo $row['client'];?></p>
                        <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                        <p> <strong>Project Type : </strong> <?php echo $row['info'];?></p>
                        <p> <strong>Project description : </strong> <?php echo $row['des'];?></p>
                </div><!--client details end-->
                <div class="col-6"><!--developer details-->
                            <?php 
                                $dev=$row['dev_mail'];
                                $info=$row['info'];
                                $mail=$_SESSION['user_session'];
                                $name=$row['client'];
                                $filters=['mail'=>$dev];
                                require 'composer_files/autoload.php';
                                $mong=new MongoDB\Client("mongodb://localhost:27017");
                                $db=$mong->WebCrate;
                                    $mObj=$db->developer->find($filters);
                        
                                    foreach($mObj as $row)
                                    {
                                        if($row->mail==$dev)
                                        {
                                        ?>
                                        <h4 class="tex-center">Developer details</h4>
                                        <p class="mt-5"> <strong>Developer Name : </strong> <?php echo $row['f_name'];?></h4>
                                        <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                                        <p> <strong>Specilization : </strong> <?php echo $row['field'];?></p>
                                        <p> <strong>Project fee : </strong> <?php echo $row['fee'];?></p>
                                        
                                                <?php
                                    
                                       }
                                    }
                                   ?>
                                    <a class="btn btn-lg btn-danger float-center text-white" >Request Cancelled</a>
                                    <a class="btn btn-lg btn-warning float-center text-white" href="delete.php?name=<?php echo $name;?>&mail=<?php echo $mail;?>&info=<?php echo $info;?>&dev_mail=<?php echo $dev;?>" >Delete Request</a>
                                    
                                    <?php
                                       }
                                    ?>
                                    
                </div><!--client details end-->
            </div>
            
          </section>



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
        <div class="col"><!--client details-->
        <Form action="" method="post" enctype="multipart/form-data">
          
            <div class="row">
                <div class="col-6">
                        <h4 class="tex-center">Your details</h4>
                        <p class="mt-5"> <strong>Name : </strong><?php echo $row['client'];?></p>
                        <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                        <p> <strong>Project Type : </strong> <?php echo $row['info'];?></p>
                        <p> <strong>Project description : </strong> <?php echo $row['des'];?></p>
                </div><!--client details end-->
                <div class="col-6"><!--developer details-->
                            <?php 
                                $dev=$row['dev_mail'];
                                $info=$row['info'];
                                
                                $filters=['mail'=>$dev];
                                require 'composer_files/autoload.php';
                                $mong=new MongoDB\Client("mongodb://localhost:27017");
                                $db=$mong->WebCrate;
                                    $mObj=$db->developer->find($filters);
                        
                                    foreach($mObj as $row)
                                    {
                                        if($row->mail==$dev)
                                        {
                            ?>
                            <h4 class="tex-center">Developer details</h4>
                            <p class="mt-5"> <strong>Developer Name : </strong> <?php echo $row['f_name'];?></h4>
                            <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                            <p> <strong>Specilization : </strong> <?php echo $row['field'];?></p>
                            <p> <strong>Project fee : </strong> <?php echo $row['fee'];?></p>
                            
                                    <?php
                                    
                                       }
                                    }
                              
                                    ?>
                </div><!--client details end-->
            </div>
            
          
             
                <!--request details-->
              <div class="card-footer bg-white mt-5" style="margin-left:400px">
              <?php 

                    $filters=['mail'=>$user,'dev_mail'=>$dev,'info'=>$info];
                    $options=['limit'=>1];
                        require 'composer_files/autoload.php';
                        $mong=new MongoDB\Client("mongodb://localhost:27017");
                        $db=$mong->WebCrate;
                        $mObj=$db->request->find($filters,$options);

                            foreach($mObj as $row)
                            {
                             
                        ?>
                <a class="btn btn-lg btn-warning float-center text-white" >Request in waiting</a>
                <?php 
                    
                  }   
                ?>
              </div>
              <div class="card-footer bg-white mt-5" style="margin-left:400px">
              <?php 
                    $filters=['mail'=>$user,'dev_mail'=>$dev];
                        require 'composer_files/autoload.php';
                        $mong=new MongoDB\Client("mongodb://localhost:27017");
                        $db=$mong->WebCrate;
                        $mObj=$db->project->find($filters);

                            foreach($mObj as $row)
                            {
                              if($row['mail']!=$user)
                               {
              ?>
                <button type="button" class="btn btn-lg btn-success float-center" >Request confirmed</button>
                <a href="payment.php?" class="btn btn-lg btn-primary float-center">Dashboard</a>
                
                <?php 
                            }
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
    <!--end of request collection-->


     <!--developer collection-->
     
<div class="container" data-aos="fade-up">
<div class="row mt-5">
<?php 
  $user=$_SESSION['user_session'];
  $filters=['mail'=>$user];
    require 'composer_files/autoload.php';
    $mong=new MongoDB\Client("mongodb://localhost:27017");
    $db=$mong->WebCrate;
      $mObj=$db->project->find($filters);

         foreach($mObj as $row)
         {
          ?>
  <div class="col "><!--client details-->
  <Form action="dashboard.php" method="post" enctype="multipart/form-data">
    
      <div class="row">
          <div class="col-6">
                  <h4 class="tex-center">Your details</h4>
                  <p class="mt-5"> <strong>Name : </strong><?php echo $row['client'];?></p>
                  <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                  <p> <strong>Project Type : </strong> <?php echo $row['info'];?></p>
                  <p> <strong>Project description : </strong> <?php echo $row['des'];?></p>
          </div><!--client details end-->
          <div class="col-6"><!--developer details-->
                      <?php 
                       $p_mail=$row['mail'];
                       $info=$row['info'];
                          $dev=$row['dev_mail'];
                          $filters=['mail'=>$dev];
                          $options=[];
                          require 'composer_files/autoload.php';
                          $mong=new MongoDB\Client("mongodb://localhost:27017");
                          $db=$mong->WebCrate;
                              $mObj=$db->developer->find($filters,$options);
                  
                              foreach($mObj as $row)
                              {
                                  if($row['mail']==$dev)
                                  {
                      ?>
                      <h4 class="tex-center">Developer details</h4>
                      <p class="mt-5"> <strong>Developer Name : </strong> <?php echo $row['f_name'];?></h4>
                      <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                      <p> <strong>Specilization : </strong> <?php echo $row['field'];?></p>
                      <p> <strong>Project fee : </strong> <?php echo $row['fee'];?></p>
                      
                              <?php
                                 }
                              }
                        
                              ?>
          </div><!--client details end-->
      </div>
      
    
       
          
        <div class="card-footer bg-white " style="margin-left:330px;padding:20px">
        <?php 
               
                $filters=['mail'=>$user,'dev_mail'=>$dev,'info'=>$info];
                $options=[];
                  require 'composer_files/autoload.php';
                  $mong=new MongoDB\Client("mongodb://localhost:27017");
                  $db=$mong->WebCrate;
                  $mObj=$db->project->find($filters,$options);

                      foreach($mObj as $row)
                      {
                        if($row['mail']==$p_mail)
                         {
                        ?>
                          <button type="button" class="btn btn-lg btn-success float-center mr-3" >Request confirmed</button>
                          <a href="payment.php?name=<?php echo $row['client']?>&mail=<?php echo $row['mail']?>&info=<?php echo $row['info']?>&dev_mail=<?php echo $row['dev_mail'];?>" class="btn btn-lg btn-primary float-center">Dashboard</a>
                          
                          <?php 
                      }
             
                  if($row['mail']!=$p_mail)
                  {
                      ?>
                      <button type="button" class="btn btn-lg float-center" style="background-color:red ; color: white; ">Request in waiting</button>
              <?php 
                  }
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
<!--end of project collection-->
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