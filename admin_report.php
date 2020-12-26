<?php

session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }

  $name=$_REQUEST['name'];
  $info=$_REQUEST['info'];
  $mail=$_REQUEST['mail'];
  $filters=['client'=>$name,'info'=>$info,'mail'=>$mail];
  $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
  $qry=new MongoDB\Driver\Query($filters);
  $rows=$mongo->executeQuery("WebCrate.project",$qry);

  foreach($rows as $row)
  {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Report</title>
      <link rel="icon" type="image/png" href="images/logo1.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
    <div class="container" id="values">
    <h1>Project Details</h1>  
    <?php
       $mail=$_REQUEST['mail'];
       $name=$_REQUEST['name'];
       $info=$_REQUEST['info'];
       $dev_mail=$_REQUEST['dev_mail'];
    ?>
    <a href="./NiceAdmin/admin_dashboard.php?name=<?php echo $name;?>&mail=<?php echo $mail;?>&info=<?php echo $info;?>&dev_mail=<?php echo $dev_mail;?>" type="button" class="btn btn-secondary ml-5 float-right"  >Back</a>
   
    <div class="mt-5">
         <button type="button" class="btn btn-primary ml-5" onclick="print();" >Get Receipt</button>
        </div>
    <div class="row" style="margin-top:50px">
      <div class="col">
            client name : <?php echo  $row->client;?></br>
            Project Tilte : <?php echo  $row->info;?></br>
            mail id : <?php echo  $row->mail;?></br>
            project description : <?php echo  $row->des;?></br>
      </div>
      <div class="col">
      <?php 
                    $filter=['client'=>$row->client,'info'=>$row->info,'dev_mail'=>$row->dev_mail];
                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $qry=new MongoDB\Driver\Query($filter);
                    $rows=$mongo->executeQuery("WebCrate.bill",$qry);

                    foreach($rows as $row)
                    {?>
                      client name : <?php echo  $row->client;?></br>
                      Project Tilte : <?php echo  $row->info;?></br>
                      mail id : <?php echo  $row->mail;?></br>
                      Developer Name : <?php echo  $row->dev_mail;?></br>
                      ___________________________________________</br>
                      Amount paid : <?php echo  $row->fee;?></br>
                      Payment status : paid</br>
                    <?php
                    }
            ?>
      </div>
    </div>
        
        <script>
            $('#print').click(function()
                {
                  $(.container).printThis();
                });
            }
        </script>
        
  <script src="js/jquery.js"></script>
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    </body>
    </html>
         <?php
  }


?>