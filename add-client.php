<?php require_once 'templates/header.php';?>
<link href="css/admin.css" rel="stylesheet">
    
<?php 
	$user_obj = new Cl_User();
	if( !empty( $_POST )){
		try {
			$data = $user_obj->addClient( $_POST );
			if($data['status']){
				if($data['operation'] == 'update')$_SESSION['success'] = CLIENT_UPDATE_SUCCESS ;
				else $_SESSION['success'] = CLIENT_ADD_SUCCESS;
				header('Location: manage-client.php');exit;
			}else{
				$_SESSION['success'] = CLIENT_UPDATE_FAILURE;
				header('Location: manage-client.php');exit;
			}
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}elseif (isset($_GET['uuid']) && !empty($_GET['uuid'])){
		try {
			$user = new Cl_User();
			$results = $user->getClient( $_GET['uuid'] );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}
	
	$id = isset($results['id']) ? $results['id']: '';
	
	if(!empty($id)){
		$head_txt = 'Edit Client';
		$txt = 'Update Client';
	}else{
		$head_txt = 'Add Client';
		$txt = 'Save Client';
	} 
	
?>
<div class="container-fluid">
	<?php require_once 'templates/nav.php'; ?>
	<div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 col-xs-offset-3 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 main">
	
		<h1 class="page-header"><?php echo $head_txt;?>: <a href="manage-client.php" class="btn btn-success pull-right"> <i class="fa fa-reply"> </i>Manage Client</a></h1>
		<?php require_once 'templates/message.php';?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="product-form" method="post" class="form-horizontal myaccount" role="form">
			<div class="load-animate">
				
				<div class="form-group">
					<span for="customerName" class="col-sm-4 control-span">Customer Name</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['customerName']) ? $results['customerName']: ''; ?>" name="customerName" id="customerName" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				
				<div class="form-group">
					<span for="phone" class="col-sm-4 control-span"> Phone Number </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['phone']) ? $results['phone']: ''; ?>" name="phone" id="phone" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="addressLine1" class="col-sm-4 control-span"> Address Line1</span>
					<div class="col-sm-8">
						<textarea name="addressLine1" id="addressLine1" class="form-control" rows="3"> <?php echo isset($results['addressLine1']) ? $results['addressLine1']: ''; ?> </textarea>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="addressLine2" class="col-sm-4 control-span"> Address Line2 </span>
					<div class="col-sm-8">
						<textarea name="addressLine2" id="addressLine2" class="form-control" rows="3"> <?php echo isset($results['addressLine2']) ? $results['addressLine2']: ''; ?> </textarea>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="city" class="col-sm-4 control-span"> City Name</span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['city']) ? $results['city']: ''; ?>" name="city" id="city" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="state" class="col-sm-4 control-span"> Area Code </span>
					<div class="col-sm-8">
						<input value="<?php echo isset($results['state']) ? $results['state']: ''; ?>" name="state" id="state" type="text" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<span for="country" class="col-sm-4 control-span"> State </span>
					<div class="col-sm-8">
						<select name="country" id="country" class="form-control">
							<?php $user_obj->countryList(); ?>
						</select>
						<span class="help-block"></span>
					</div>
				</div>
				<input value="<?php echo isset($results['country']) ? $results['country']: ''; ?>" id="country_hidden" type="hidden" class="form-control">
				<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button id="submit_btn" type="submit" class="btn btn-primary"><?php echo $txt; ?></button>
					</div>
				</div>
			</div>
		</form>
	
	</div>
</div>	
<script src="js/jquery.validate.min.js"></script>
<script src="js/add-client.js"></script>  


