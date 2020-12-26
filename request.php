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
                    <h5 class="" style="color:skyblue">
                    <?php 
                    
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
        <h2>User Request Form</h2>
        <p>Request forms allow you to capture work requests as they come in. These forms also enable you to establish a formal process for submitting, tracking, evaluating, and implementing those requests.</p>
      </div>
      <div class="mt-5">
        <form method="post" method="">
            <div class="form-group">
               <input type="text-blue" name="client" class="form-control" placeholder="Name" style="color: #5846f9; pattern="[a-zA-Z]+" minlength="3" required>
               </div> 
             <div class="form-group">
               <input type="email text-blue" name="mail" class="form-control" value="<?php echo $_SESSION['user_session'];?>" placeholder="Email" style="color: #5846f9;">
               </div> 
               <div class="form-group">
                <input type="text-blue" name="info" class="form-control" placeholder="Project type" style="color: #5846f9;" required>
                </div>
             
             <div class="form-group">
               <textarea class="form-control" name="des" rows="4" placeholder="Project description" style="color: #5846f9;"required></textarea>
               </div> 
               <input type="hidden" name="dev_mail" value="<?php echo $_POST['dev_mail'];?>">
               <button type="submit" name="dtl" class="btn align-items-center justify-content-center d-flex mt-3 float-center  font-weight-bold" style="background-color:#5846f9 ; color: white; ">Request</button>
               
             </form>  
        
      </div>
<?php

if(isset($_POST["dtl"]))
{
            	  $client=$_POST['client'];
                $mail=$_POST['mail'];
                $info=$_POST['info'];
                $des=$_POST['des'];
                $dev_mail=$_POST['dev_mail'];
				$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
				$bulk = new MongoDB\Driver\BulkWrite;
				$data =[
					"client"=>$client,
					"mail"=>$mail,
          "info"=>$info,
          "des"=>$des,
          "dev_mail"=>$dev_mail
					];
				$bulk->insert($data);
				if( $mng->executeBulkWrite('WebCrate.request', $bulk))
				{
          //header("Location:index.php");
          echo "<script>if(confirm('request sent, wait for confirmation.')){document.location.href='my_request.php'}</script>";
				}
				else
				{
				echo "Unsuccessful";
				}
		


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