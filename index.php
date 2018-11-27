<?php 
ob_start();
session_start();
require_once 'config.php'; 
?>
<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->login( $_POST );
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
				$_SESSION['success'] = 'Logged In Successfully!';
				header('Location: home.php');exit;
			}
		} catch (Exception $e) {
			$error = $e->getMessage();
			$_SESSION['error'] = $error;
		}
	}
	//print_r($_SESSION);
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
		header('Location: home.php');exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/res-login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
	<script src="js/bootstrap.min.js"></script>
	<script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js'></script>
	<style>
body{
	background-image: url(img/bg2000.jpg);

	}
	</style>
 </head>
  <body>
	<div class="container">
		<div class="text-center" style="margin-top:50px;">
			
		</div>
		<div class="login-message">
			<?php require_once 'templates/message.php';?>
		</div>
		<div class="login-form" style="border-radius:24px:">
			<h1 class=" text-center" style="font-family: 'Orbitron', sans-serif; font-size:60px: color "><strong><b><span class="animate slideInRight" style="color:grey;font-size:40px">AC</span></b></strong><i class="fa fa-xing" style="color:blue">CESS</i><span style="color:"></span></h1>
			<h6  class=" text-center" style="font-family: 'Orbitron', sans-serif;">Claims Adjusting Software, Powered By : MYSQL</h6>
			<form id="login-form" method="post" class="form-signin" role="form">
				<input name="email" id="email" type="email" class="form-control"placeholder="Email address" autofocus> 
				<input name="password" id="password" type="password" class="form-control disable" placeholder="Password">
				<button id="submit_btn" class="btn btn-block btn-info" type="submit" style=" background-image: linear-gradient(to right, blue, white, blue);color:black;">Sign In</button>
			</form>
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-7 col-sm-7 col-md-7">
						<i class="fa fa-lock"></i> 
						<a href="forget_password.php"> Forgot password? </a>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5">
						<i class="fa fa-check"></i> 
						<a href="register.php"> Sign Up </a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>