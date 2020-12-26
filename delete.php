<?php
session_start();
if(!isset($_SESSION['user_session']))
{
  header('Location:login.php');
}
            $mail=$_REQUEST['mail'];
            $dev_mail=$_REQUEST['dev_mail'];
            $info=$_REQUEST['info'];
		
       
                  $bulk = new MongoDB\Driver\BulkWrite;
                  $filters=['mail'=>$mail,'dev_mail'=>$dev_mail,'info'=>$info];
                  $options=[];
                  $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                  $bulk->delete($filters, $options);

                  $result = $mongo->executeBulkWrite('WebCrate.waiting',$bulk);
                  
                echo "<script>document.location.href='my_request.php';</script>";
                
          
            
?>

