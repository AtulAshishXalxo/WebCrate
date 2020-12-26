<?php 

session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }

 


                    $name=$_REQUEST['name'];
                    $mail=$_REQUEST['mail'];
                    $info=$_REQUEST['info'];   
                    $dev_mail=$_REQUEST['dev_mail'];
                    $rating=$_REQUEST['count'];

        $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
				$bulk = new MongoDB\Driver\BulkWrite;
				$data =[
                    "client"=>$_REQUEST['name'],
                    "mail"=>$_REQUEST['mail'],
                    "info"=>$_REQUEST['info'],
                    "dev_mail"=>$_REQUEST['dev_mail'],
                    "rating"=>$_REQUEST['count']
					];
				$bulk->insert($data);
				if( $mng->executeBulkWrite('WebCrate.rating', $bulk))
				{
					header("Location:u_details.php?key=dev&name=$name&mail=$mail&info=$info&dev_mail=$dev_mail");
				}
      
?>
	