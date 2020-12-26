<?php
session_start();
if(!isset($_SESSION['user_session']))
{
  header('Location:login.php');
}

        require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->WebCrate;
        $cll=$db->waiting;
		
       
            $ins= array(
                "client"=>$_REQUEST['client'],
                "mail"=>$_REQUEST['mail'],
                "info"=>$_REQUEST['info'],   
                "des"=>$_REQUEST['des'],
                "dev_mail"=>$_REQUEST['dev_mail']
            );
            
            $mail=$_REQUEST['mail'];
            $dev_mail=$_REQUEST['dev_mail'];
            $info=$_REQUEST['info'];
            if($cll->insertOne($ins))                                   //insert
            {

                  $bulk = new MongoDB\Driver\BulkWrite;
                  $filters=['mail'=>$mail,'dev_mail'=>$dev_mail,'info'=>$info];
                  $options=[];
                  $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                  $bulk->delete($filters, $options);

                  $result = $mongo->executeBulkWrite('WebCrate.request',$bulk);
                  
                echo "<script>document.location.href='my_projects.php';</script>";
                
            }
            else
            {
                echo 'some issue occured';
            }

                  

            
?>

