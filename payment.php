<?php
    
    session_start();
    if(!isset($_SESSION['user_session']))
    {
      
      header('Location:login.php');
    }

    if(isset($_SESSION['user_session']))
    {
        $client=$_REQUEST['name'];
        $mail=$_REQUEST['mail'];
        $info=$_REQUEST['info']; 
        $dev_mail=$_REQUEST['dev_mail'];
        $filters=['client'=>$client,'mail'=>$mail,'info'=>$info];
        $options=[];
        require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->WebCrate;
        $mObj=$db->bill->find($filters,$options);

            foreach($mObj as $row)
            {
                echo "<script>document.location.href='./NiceAdmin/dashboard.php?name=$client&mail=$mail&info=$info&dev_mail=$dev_mail';</script>";
            
            }

                  
?>


<!DOCTYPE html>
<html>
<head>
 <title>
    
    </title> 
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
   
  <body style="background-image:url('img/pexels-edward-eyer-1045541.jpg');background-repeat:no-repeat;">
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
              <li><a href="my_request.php">My Request</a></li>
              
              
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>

         
        </div>
      </div>

    </div>
  </header>
<!-- poster -->
   <!--Navbar-->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="border: 0; box-shadow: none;">

<div class="container">

  
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


</div>

</nav>
<!--/.Navbar-->
      
      
      <!-- payment section-->
      <div class="container py-5 ">
    <!-- For demo purpose -->
    <div class="row mb-4 ">
        <div class="col-lg-8 mx-auto text-center">
            <h4 class=" text-primary">Complete payment to book</h4>
        </div>
    </div><!-- End -->
     
       
    <form  method="POST">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                <!-- End -->
                    <!-- Credit card form content -->
                    <div class="card-body">
                        <div class="row">
                        
                            <div class="col-md-7">
                                                    
                                <div class="form-group">
                                        Client Name : <input type="text" class="form-control" value="<?php echo $_GET['name'];?>"> 
                                    </div>
                                      
                                    <div class="form-group">
                                            Email id :<input type="email" class="form-control" value="<?php echo $_SESSION['user_session'];?>"> 
                                    </div>
                                    <?php
                                    $mail=$_SESSION['user_session'];
                                    $dev_mail=$_GET['dev_mail'];
                                    $filters=['mail'=>$dev_mail];
                                    $options=[];
                                           require 'composer_files/autoload.php';
                                           $mong=new MongoDB\Client("mongodb://localhost:27017");
                                           $db=$mong->WebCrate;
                                           $mObj=$db->developer->find($filters,$options);
                         
                                               foreach($mObj as $row)
                                               {
                                    ?>
                                    <div class="form-group">
                                           Developer Name : <?php echo $row['f_name'];?> 
                                           Developer fee : <?php echo $row['fee'];?> 
                                    </div>
                                    <input type="hidden" name="fee" value="<?php echo $row['fee'];?> ">
                                    <?php
                                    }
                                    ?>
                                </div>
                          </div>
                    </div>
                    
                 <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                           
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control" pattern="[a-zA-Z]+" minlength="3" required> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " pattern="^\d{16}$" required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <!--<i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> --></span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="password" required class="form-control" pattern="^\d{3}$" required> </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-primary btn-block" name="pay">Confirm Payment</button>
                                    <a href="my_request.php" class="btn btn-outline-primary btn-block">Cancel</a>
                                
                                
                    </div> <!-- End -->
                    <!-- Paypal info -->
                   
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
       </div>
    </div>
    </form>  
        
     
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
<?php
    if(isset($_POST['pay']))
    {
        


            
    require 'composer_files/autoload.php';
    $mong=new MongoDB\Client("mongodb://localhost:27017");
    $db=$mong->WebCrate;
    $cll=$db->bill;
    
        $status="paid";
        $ins= array(
            "client"=>$_REQUEST['name'],
            "mail"=>$_REQUEST['mail'],
            "info"=>$_REQUEST['info'],   
            "dev_mail"=>$_REQUEST['dev_mail'],
            "fee"=>$_REQUEST['fee'],
            "status"=>$status
        );
        
        $mail=$_REQUEST['mail'];
        $dev_mail=$_REQUEST['dev_mail'];
        if($cll->insertOne($ins))                                   //insert
        {

             /* $bulk = new MongoDB\Driver\BulkWrite;
              $filters=['mail'=>$mail,'dev_mail'=>$dev_mail];
              $options=[];
              $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
              $bulk->delete($filters, $options);

              $result = $mongo->executeBulkWrite('WebCrate.request',$bulk);
              */
            echo "<script>if(confirm('Payment successful.')){document.location.href='./NiceAdmin/dashboard.php?name=$client&mail=$mail&info=$info&dev_mail=$dev_mail';}</script>";
            
        }
        else
        {
            echo 'some issue occured';
        }
            
        
    }

    echo "<script>if(confirm('Payment successful.'))(document.location.href='./NiceAdmin/dashboard.php';</script>";
            
}

?>