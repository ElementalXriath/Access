<?php
ob_start();
session_start();
require_once 'config.php'; 
?>
<?php 
	if(!empty($_POST)){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->registration( $_POST );
			if($data){
				$_SESSION['success'] = USER_REGISTRATION_SUCCESS;
				header('Location: index.php');exit;
			}
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<meta name="description" content="invoice system, php invoice script, invoice script, pro invoice maker, free php invoice/billing script, php Invoice software, php invoice generator script, invoice script open source, invoice generator php script, invoice script in php, javascript invoice script, invoice maker php script, php invoice script tutorial">
    <meta name="keywords" content="invoice system, php invoice script, invoice script, pro invoice maker, free php invoice/billing script, php Invoice software, php invoice generator script, invoice script open source, invoice generator php script, invoice script in php, javascript invoice script, invoice maker php script, php invoice script tutorial">
	<meta name="author" content="https://plus.google.com/+MuniAyothi/">
    <title>PHP Invoice System</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet"> 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<style>
body{
	background-image: url(VEO/img/register.png);

	}
	</style>
  </head>
  <body>
	<div class="container" style="hieght: 500px;">
		<div class="text-center" style="margin-top:50px;">
				<?php require_once 'templates/ads.php';?>
		</div>
		<div class="login-form">
			<?php require_once 'templates/message.php';?>
			
			<h1 class="text-center" style="font-family: 'Orbitron', sans-serif;">Register</h1>
			<div class="form-header" style=" opacity: 10;" >
				<i class="fa fa-user"></i>
			</div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register">
				<div>
					<input name="first_name" id="first_name" type="text" class="form-control" placeholder="First Name"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email" id="email" type="email" class="form-control" placeholder="Email address" > 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="password" id="password" type="password" class="form-control" placeholder="Password"> 
					<span class="help-block"></span>
				</div>
				<div>
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirm Password"> 
					<span class="help-block"></span>
				</div>
				<button id="submit_btn" class="btn btn-block btn-success" type="submit">Sign Up</button>
			</form>
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-lock"></i>
						<a href="forget_password.php"> Forgot password? </a>
					
					</div>
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<i class="fa fa-check"></i>
						<a href="index.php"> Sign In </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->

	
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/register.js"></script>
  </body>
</html>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>    