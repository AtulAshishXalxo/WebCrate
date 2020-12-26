<?php
  session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }
                    $key=$_REQUEST['key'];
                    $mail=$_REQUEST['mail'];
                    $name=$_REQUEST['name'];
                    $info=$_REQUEST['info'];
                    $dev_mail=$_REQUEST['dev_mail'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>details</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
              <li><a href="index.php">Home</a></li>
              <li class=""><a href="my_request.php">My Request</a></li>
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
        <h2>Requested Details</h2>
       </div>
      <div class="row mt-5">
<!--about project-->

        <?php
               
               if('pro'==$key)
               {
                  $user=$_SESSION['user_session'];
                  $filters=['mail'=>$mail,'info'=>$info];
                  require 'composer_files/autoload.php';
                  $mong=new MongoDB\Client("mongodb://localhost:27017");
                  $db=$mong->WebCrate;
                    $mObj=$db->project->find($filters);

               foreach($mObj as $row)
               {
                ?>
        <div class="col mt-5">
        <Form action="dashboard.php" method="post" enctype="multipart/form-data">
          
            <div class="row">
                <div class="col-6">
                        <h4 class="tex-center">Project : <?php echo $row['info'];?></h4>
                        <p> <strong>Project description : </strong> <?php echo $row['des'];?></p>
                        <p> <strong>Client Name : </strong><?php echo $row['client'];?></p>
                        <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                </div>
               

            </div>
            
              <div>
              
            
                <a href="./NiceAdmin/dashboard.php?name=<?php echo $row['client']?>&mail=<?php echo $row['mail']?>&info=<?php echo $row['info']?>&dev_mail=<?php echo $row['dev_mail']?>" class="btn btn-lg btn-primary float-center">Ok</a>
                          
              </div>
            </Form>

          </div>
        </div>
        <?php
               }
            }
      ?>
      <!-- end about project-->



      <!--about client-->
      <?php
               
               if("client"==$key)
               {
               $filters=['mail'=>$mail];
                 require 'composer_files/autoload.php';
                 $mong=new MongoDB\Client("mongodb://localhost:27017");
                 $db=$mong->WebCrate;
                   $mObj=$db->users->find($filters);
       
                      foreach($mObj as $row)
                      {
                       ?>
               <div class="col mt-5">
               <Form action="dashboard.php" method="post" enctype="multipart/form-data">
                 
                   <div class="row">
                       <div class="col-6">
                               <h4 class="tex-center">Client Name : <?php echo $row['fname'];?>  <?php echo $row['lname'];?></h4>
                               <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                               <p> <strong>Phone : </strong> <?php echo $row['phone'];?></p>
                       </div>
                   </div>
                   
                     <div> 
                     <?php
                     $filters=['mail'=>$mail,'info'=>$info,'dev_mail'=>$dev_mail];
                     $mObj=$db->project->find($filters);
                        foreach($mObj as $row)
                        {
                    ?>
                     <a href="./NiceAdmin/dashboard.php?name=<?php echo $row['client'];?>&mail=<?php echo $row['mail'];?>&info=<?php echo $row['info'];?>&dev_mail=<?php echo $row['dev_mail'];?>" class="btn btn-lg btn-primary float-center">Ok</a>
                <?php } ?>  
                     </div>
                   </Form>
       
                 </div>
               </div>
               <?php
                      }
                    }
             ?>
      <!--end about client-->
    
    <!--about developer-->

    <?php
               
               if('dev'==$key)
               {
               $filters=['mail'=>$dev_mail];
                 require 'composer_files/autoload.php';
                 $mong=new MongoDB\Client("mongodb://localhost:27017");
                 $db=$mong->WebCrate;
                   $mObj=$db->developer->find($filters);
       
                      foreach($mObj as $row)
                      {
                       ?>
               <div class="col mt-5">
               <Form action="dashboard.php" method="post" enctype="multipart/form-data">
                 
                   <div class="row">
                       <div class="col-6">
                               <h4 class="tex-center"> Developer Name : <?php echo $row['f_name'];?> <?php echo $row['l_name'];?></h4>
                               <p> <strong>Email Id : </strong><?php echo $row['mail'];?></p>
                               <p> <strong>Skills : </strong> <?php echo $row['skill'];?></p>
                               <p> <strong>Specilization : </strong> <?php echo $row['field'];?></p>
                               <p> <strong>Experience : </strong> <?php echo $row['exp'];?></p>
                               <p> <strong>Phone no : </strong> <?php echo $row['phone'];?></p>
                       </div>
                       <!--rating 
                       <div class="col-6">
                              <form action="rating.php" method="post">
                                  <i class="fa fa-star fa-2x" data-index="0"></i>
                                  <i class="fa fa-star fa-2x" data-index="1"></i>
                                  <i class="fa fa-star fa-2x" data-index="2"></i>
                                  <i class="fa fa-star fa-2x" data-index="3"></i>
                                  <i class="fa fa-star fa-2x" data-index="4"></i>
                                  <input type="hidden" name="count" id="count"></input>
                                  <input type="hidden" value="<?php echo $name?>" name="name">
                                  <input type="hidden" value="<?php echo $mail?>" name="mail">
                                  <input type="hidden" value="<?php echo $dev_mail?>" name="dev_mail">
                                  <input type="hidden" value="<?php echo $info?>" name="info">
                                  <button type="submit" class="btn btn-warning ml-4">rate</button>   
                            </form>
                        </div>
                   <!--rating ends-->

            </div>
                   
                     <div>
                     <?php

                    $filters=['mail'=>$mail,'info'=>$info,'dev_mail'=>$dev_mail];
                     $mObj=$db->project->find($filters);
                     foreach($mObj as $row)
                    {
                    ?>
                   
                       <a href="./NiceAdmin/dashboard.php?name=<?php echo $row['client'];?>&mail=<?php echo $row['mail'];?>&info=<?php echo $row['info'];?>&dev_mail=<?php echo $row['dev_mail'];?>" class="btn btn-lg btn-primary float-center">Ok</a>
                           <?php 
                }
                           ?>
                     </div>
                     
                   </Form>
       
                 </div>
               </div>
               <?php
                      }
                    }
             ?>
<!--end about developer-->
    </div>
   <!-- <div class="col-6 d-flex d-justify-content-center">
        <h4 class="ml-5">Rate developer</h4>
          <div style="padding:50px">
                      <i class="fa fa-star fa-2x" data-index="0"></i>
                      <i class="fa fa-star fa-2x" data-index="1"></i>
                      <i class="fa fa-star fa-2x" data-index="2"></i>
                      <i class="fa fa-star fa-2x" data-index="3"></i>
                      <i class="fa fa-star fa-2x" data-index="4"></i>
                      <span><h1 class="mt-2" name="count" id="count"></h1></span>
                      <a href="rating.php?key=dev&name=<?php echo $row['client'];?>&mail=<?php echo $row['mail'];?>&info=<?php echo $row['info'];?>&dev_mail=<?php echo $row['dev_mail'];?>" class="btn btn-lg btn-primary float-center">rate</a>  
          </div>
    </div>-->

  </section>
 
   
 
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>


var ratedIndex = -1;

$(document).ready(function(){
    resetStarColor();

    $('.fa-star').on('click',function(){
        ratedIndex = parseInt($(this).data('index'));
        $('#count').val(ratedIndex+1);
    });
    $('.fa-star').mouseover(function(){
        resetStarColor();

        var currentIndex = parseInt($(this).data('index'));

                for(var i=0; i <= currentIndex; i++)
                {
                    $('.fa-star:eq('+i+')').css('color','orange');
                }
    });
    $('.fa-star').mouseleave(function(){
        resetStarColor();
        if(ratedIndex != -1)
                {
                    for(var i=0; i <= ratedIndex;i++)
                      {
                          $('.fa-star:eq('+i+')').css('color','orange');
                      }
                }
    });
});
function resetStarColor()
    {
        $('.fa-star').css('color','gray');
    }
</script>

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