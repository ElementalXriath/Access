<?php include 'templatesVEO/header.php'; ?>



<body class="fixed-sidebar">
<?php 
	if( !empty( $_POST )){
		try {
			$user_obj = new Cl_User();
			$data = $user_obj->account( $_POST );
			if($data)$_SESSION['success'] = PASSOWRD_CHANAGE_SUCCESS;
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}
?>
<div id="wrapper">


<?php include 'templatesVEO/navtemp.php'; ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <?php include 'templatesVEO/static-nav.php'; ?>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
               
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight" style="background-image: url(VEO/img/header.png); background-size: cover;"> 

<div class="container-fluid">
	
	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
		
		<h1 class="page-header">My Account: </h1>
		<?php require_once 'templates/message.php';?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="account-form" method="post" class="form-horizontal myaccount" role="form">
			<div class="load-animate">
				<div class="form-group">
					<span for="inputEmail3" class="col-sm-4 control-span">Name</span>
					<div class="col-sm-8">
						<p> <?php echo $_SESSION['first_name']; ?> </p>
					</div>
				</div>
				<div class="form-group">
					<span for="inputPassword3" class="col-sm-4 control-span">Email</span>
					<div class="col-sm-8">
						<p> <?php echo $_SESSION['email']; ?> </p>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<span for="inputPassword3" class="col-sm-4 control-span">Current Password</span>
					<div class="col-sm-8">
						<input name="old_password" id="old_password" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				
				<div class="form-group">
					<span for="inputPassword3" class="col-sm-4 control-span"> New Password</span>
					<div class="col-sm-8">
						<input name="password" id="password" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="inputPassword3" class="col-sm-4 control-span"> Confirm Password</span>
					<div class="col-sm-8">
						<input name="confirm_password" id="confirm_password" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
				<input type="hidden" id="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"/>
				
				
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button type="submit" class="btn btn-default">Change Password</button>
					</div>
				</div>
			</div>
		</form>
		

	</div>
	
	
</div>


        </div> <!--Datatable-->
        <script src="js/jquery.validate.min.js"></script>
<script src="js/account.js"></script>   
	

        <?php include 'templatesVEO/footer.php'; ?>


