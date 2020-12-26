<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="icon" type="image/png" href="images/logo1.png"/>
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
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

		<div class="wrapper" style="background-image: url('images/pot.jpg');">
			<div class="inner">
			<div class="text-center">
				<h6><a href="login.php" class="txt2 hov1"><span><i class="fa fa-arrow-left"></i></span></a></h6>
			</div>
				<div class="image-holder mt-3">
				<h3 class="d-flex justify-content-center">User Form</h3>
					<img src="images/Website-Design-in-Vapi-Valsad-Daman-Silvassa-By-Website-Designer-of-Web-Development-Company-Weblatic.png" alt="" class="mt-4" width="100%">
					<strong class="d-flex justify-content-center mt-4" ><a href="admin_reg.php" style="color:purple;font-size:20px">Register as Admin ?</a></strong>
				</div>
	<form  method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" oninput='c_pass.setCustomValidity(c_pass.value != new_pass.value ? "Passwords do not match." : "")'>
					
					<div class="row">
						<div class="col-6 wrap-input100 validate-input m-b-20" data-validate="first name">
							<input class="input100" type="text" id="fname" name="fname" placeholder="First name" pattern="[a-zA-Z]+" required minlength="3" >
                    		<span class="focus-input100"></span>
							<h6 id="mailCheck" style="color:orange"></h6>
						</div>
						<div class="col-6 wrap-input100 validate-input m-b-20" data-validate="last name">
							<input class="input100" type="text" id="lname" name="lname" placeholder="last name" pattern="[a-zA-Z]+" minlength="3" required>
                    		<span class="focus-input100"></span>
							<h6 id="mailCheck" style="color:orange"></h6>
						</div>
					</div>
					
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter email id">
					<input class="input100" type="text" id="mail" name="mail" placeholder="Enter email id" pattern="[^ @]*@[^ @]*" required>
                    <span class="focus-input100"></span>
					<h6 id="mailCheck" style="color:orange"></h6>
				</div>
					
				<div class="wrap-input100 validate-input m-b-20" data-validate="first name">
							<input class="input100" type="phone" id="phone" name="phone" placeholder="Phone number" pattern="^\d{10}$" required>
                    		<span class="focus-input100"></span>
							<h6 id="mailCheck" style="color:orange"></h6>
				</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input class="input100" type="password" id="pass" name="pass" placeholder="password" pattern="([^\s][A-z0-9À-ž\s]+)"  minlength="3" required>
                    	<span class="focus-input100"></span>
                    	<h6 id="passCheck" style="color:orange"></h6>
					</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input class="input100" type="password" id="Cpass" name="Cpass" placeholder="Confirm password" pattern="([^\s][A-z0-9À-ž\s]+)"  minlength="3" required>
                    	<span class="focus-input100"></span>
                    	<h6 id="passCheck" style="color:orange"></h6>
					</div>

					<div class="login100-form-btn w-100">
							<button type="submit" class="login100-form-btn" name="reg" >Register</button>
				</div>
				</form>
			</div>
		</div>
		<script>
		function checkPasswordMatch() {
                var password = $("#pass").val();
                var confirmPassword = $("#Cpass").val();

                if (password != confirmPassword)
                    $("#passCheck").html("Passwords do not match!");
                else
                    $("#passCheck").html("Passwords match.");
            }
	</script>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>


<?php
$new=$_REQUEST['pass'];
$cpass=$_REQUEST['Cpass'];
if(isset($_REQUEST['reg']))
{
    if($new==$cpass)
     {
		     require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->WebCrate;
        $cll=$db->users;
    
       if($_POST)                                       
        {
            $ins= array(
                "fname"=>$_REQUEST['fname'],
                "lname"=>$_REQUEST['lname'],
                "mail"=>$_REQUEST['mail'],
                "phone"=>$_REQUEST['phone'],   
                "password"=>$_REQUEST['Cpass'],
            );
            
            if($cll->insertOne($ins))                                   //insert
            {
                $mail=$_REQUEST['mail'];
                $_SESSION['user_session']=$mail;
				//header('Location:http://localhost:8080/myProject/index.php');
				echo "<script>document.location.href='index.php';</script>";
            }
            else
            {
                echo 'some issue occured';
            }
        }

        else
        {
            echo 'not inserted';
        }
	}
	
	else
	{
		echo "<script>if(confirm('Password not matching.'));</script>";

	}
}
    ?>  