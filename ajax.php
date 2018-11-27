<?php

require_once 'config.php';
$db = new Cl_DBclass();


if(isset($_POST['type']) && $_POST['type'] == 'customerName' ){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT id, customerName FROM customers where UPPER($type) LIKE '%".strtoupper($name)."%'";
	$result = mysqli_query($db->con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['id'].'|'.$row['customerName'];
		array_push($data, $name);
	}
	mysqli_close($db->con);
	echo json_encode($data);exit;
}





if(isset($_POST['type']) && $_POST['type'] == 'sendEmail' ){
	require_once 'phpMail/PHPMailerAutoload.php';
	$email = $_POST['email'];
	$uuid = $_POST['uuid'];
	
	$file_content = file_get_contents(BASE_PATH.'email.php?uuid='.$uuid);
	
	
	
	$mail = new PHPMailer;
	
	$mail->From = ADMIN_EMAIL;
	$mail->FromName = SENDER_NAME;
	$mail->addAddress( $email );               // Name is optional
	$mail->addReplyTo(REPLY_EMAIL, 'Reply Mail');
	
	
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = 'Electronic Invoice From '.COMPANY_NAME;
	$mail->Body    = $file_content;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo "true";
	}
	
	exit;
}


if(isset($_POST['type']) && $_POST['type'] == 'clientAddress' ){
	$id = $_POST['id'];
	$query = "SELECT id, addressLine1, addressLine2, city, state, country, phone FROM customers WHERE id =$id";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	$address = '';
	if(!empty( $data )){
		$address = isset($data['addressLine1'])? $data['addressLine1'].', &#13;' : '';

		$city = isset($data['city'])? $data['city']: '';
		$state = isset($data['state'])? $data['state']: '';
		$country = isset($data['country'])? $data['country']: '';
		$phone = isset($data['phone'])? $data['phone']: '';
		$address .=$city.',  '.$country.',   '.$state.'';
	
	
		
	}
	mysqli_close($db->con);
	echo $address;exit;
}



if(!empty($_POST['type'])){ 
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT productCode, productName, buyPrice FROM products where quantityInStock !=0 and UPPER($type) LIKE '%".strtoupper($name)."%' LIMIT 50";
	$result = mysqli_query($db->con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['productCode'].'|'.$row['productName'].'|'.$row['buyPrice'];
		array_push($data, $name);
	}	
	mysqli_close($db->con);
	echo json_encode($data);exit;
}





/*$query = "SELECT id FROM products";
$result = mysqli_query($db->con, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['id'];
	array_push($data, $name);
}

foreach ($data as $value){
	$uuid = uniqid();
	echo $query = "UPDATE products SET `uuid` = '$uuid' WHERE `id` = $value"; echo "<br/>";
	mysqli_query($db->con, $query);
}
mysqli_close($db->con);*/


