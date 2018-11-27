<?php 
require_once 'config.php';
if((isset($_POST['uuid'])) && !empty( $_POST['uuid'])){
	$uuid = $_POST['uuid']; 
	$user = new Cl_User();
	$results = $user->getInvoice($uuid);
	$settings = $user->getSettings();
	
	$invoice = array();
	if(!empty( $results )){
		$invoice = json_decode( $results['invoice'], true);
	}
	
}
$invoiceNo = isset($results['id'])? $results['id']: '';
$invoiceDate = isset($results['created'])? date("M d, Y", strtotime($results['created'])): date("M d, Y");


$logo = isset($settings['companyLogo'])? 'img/'.$settings['companyLogo']:LOGO;
$logo = BASE_PATH.$logo;
$companyName = isset($settings['companyName'])?$settings['companyName']:COMPANY_NAME;
$address = isset($settings['address'])?$settings['address']:COMPANY_ADDRESS;
$phone = isset($settings['phone'])?$settings['phone']:PHONE;
$company_file_number = isset($settings['company_file_number'])?$settings['company_file_number']:PHONE;
$cvi = isset($settings['cvi'])?$settings['cvi']:PHONE;
$dateofloss = isset($settings['dateofloss'])?$settings['dateofloss']:PHONE;
$assignment_id = isset($settings['assignment_id'])?$settings['assignment_id']:PHONE;
$attention = isset($settings['attention'])?$settings['attention']:PHONE;
$contactEmail = isset($settings['contactEmail'])?$settings['contactEmail']:EMAIL;

$totalAmount = isset($invoice['data']['totalAftertax']) ? invoiceNumFormat($invoice['data']['totalAftertax']): 0;

function invoiceNumFormat($number){
	return sprintf("%.2f", $number);
}
?>
<html style='width:100%;height:auto'>
<head>
	<title>Smart Invoice</title>
</head>
<body style='width:95%;height:auto; margin-right:20px;font-family: 'Source Sans Pro''>
	 <div class="page">
	 	<table style="width: 100%; margin-bottom: 20px">
			<tr>
				<td style="text-align:  left;">
	           		<span style="font-size: 22px; font-weight: bold"><img src="<?php echo $logo;  ?>"/> </span><br>
					<?php echo $companyName; ?> <br>
					<?php echo $address; ?><br/>
		      		Phone:  <?php echo $phone; ?><br/>
		      		Tax Id :<?php echo $contactEmail; ?><br/>
								
	           </td>
	           <td style="text-align: right;">
	           		Invoice # <?php echo $invoiceNo; ?><br>
	                <?php echo $invoiceDate; ?><br>
	                <br>
	                <br>
	                <br>
	               <h3><span style="border:2px solid black;border-radius:24px;padding:30px">Total Amount
	              <strong style="font-size: 25px">$<?php echo $totalAmount; ?></strong></span></h3><br>
	           </td>
	                        
	    	</tr>
		</table>
		<table style="width: 100%; margin-top: 40px;">
	    	<tr>
	        	<td style="text-align:  left;">
					<h2 style="line-height:10px;background-color: #c0c0c0;display:inline-block;padding:10px 20px 10px 10px;">Bill To,</h2><br>
					<?php echo isset($invoice['data']['clientCompanyName']) ? $invoice['data']['clientCompanyName']: ''; ?>,<br>
					<?php echo isset($invoice['data']['clientAddress']) ? $invoice['data']['clientAddress']: ''; ?> <br><br>
					<b><span style="font-size:20px">Attn:<b></span><span style="font-size:20px"><b> <?php echo isset($invoice['data']['attention']) ? $invoice['data']['attention']: ''; ?><b></span><br><br>
					<span style="font-size:20px">RE:</span><span style="font-size:20px"><b>  <?php echo isset($invoice['data']['cvi']) ? $invoice['data']['cvi']: ''; ?><b></span><br><br>
					<span>Your File Number:&nbsp;</span><?php echo isset($invoice['data']['company_file_number']) ? $invoice['data']['company_file_number']: ''; ?><br>
				    <span>Our File Number:&nbsp;</span><?php echo isset($invoice['data']['assignment_id']) ? $invoice['data']['assignment_id']: ''; ?><br>
					<span>D/A:&nbsp;</span><?php echo isset($invoice['data']['dateofloss']) ? $invoice['data']['dateofloss']: ''; ?><br>
										
					
				
					
								
	           </td>
	
	           <td style="text-align: right;">
	                            
	           </td>
	
	        </tr>
	    </table>
	
	    <hr class="divider"/>
	    
	    <?php if(isset($invoice['data']['Invoice'])&&!empty($invoice['data']['Invoice'])){?>
	    <table style="width: 100%; margin-top: 20px; border-collapse:collapse;">
	    	<thead>
	       		<tr style="border-bottom: 1px solid #ccc; line-height: 30px; font-weight: bold;background-color: #c0c0c0;">
	            	<th style="text-align: left">Date</th>
	                <th style="text-align: left; width: 350px;">Service Description</th>
	                <th style="text-align: left">Rate</th>
	                <th style="text-align: left">Quantity</th>
	                <th style="text-align: right">Line Total</th>
	           	</tr>
	     	</thead>
	       	<tbody>
	        	<?php foreach ( $invoice['data']['Invoice']['itemNo'] as $key=>$item){?>
					<tr style="border-bottom: 1px solid #ccc; line-height: 30px;">
						<td style="text-align: left"> <?php echo isset($invoice['data']['Invoice']['itemNo'][$key]) ? $invoice['data']['Invoice']['itemNo'][$key] : ''; ?></td>
						<td  style="text-align: left"> <?php echo isset($invoice['data']['Invoice']['itemName'][$key]) ? $invoice['data']['Invoice']['itemName'][$key]: ''; ?> </td>
						<td  style="text-align: left">$ <?php echo isset($invoice['data']['Invoice']['price'][$key]) ? invoiceNumFormat($invoice['data']['Invoice']['price'][$key]): ''; ?> </td>
						<td  style="text-align: left">&nbsp; <?php echo isset($invoice['data']['Invoice']['quantity'][$key]) ? $invoice['data']['Invoice']['quantity'][$key]: ''; ?> </td>
						<td style="text-align: right">$ <?php echo isset($invoice['data']['Invoice']['total'][$key]) ? invoiceNumFormat($invoice['data']['Invoice']['total'][$key]): ''; ?> </td>
					</tr>
				<?php } ?>
	      	</tbody>
		</table>
		<?php }?>
		<p> &nbsp;</p>
	
	    <div style="width:100%;">
			<div style="width:50%;padding:0px;margin:0px;float:left;">
				<span style="font-size:20px;"> Notes:&nbsp;</span><br/>
				<p> <?php echo isset($invoice['data']['notes']) ? $invoice['data']['notes']: ''; ?> </p>
			</div>
			<div style="width:50%;padding:0px;margin:0px;float:right;">
				<div style="text-align:right">
					<span style="width:150px;display: inline-block;">Subtotal:&nbsp;</span> <span style="width:150px;display: inline-block;">$ <?php echo isset($invoice['data']['subTotal']) ? invoiceNumFormat($invoice['data']['subTotal']): ''; ?> </span><br/>
					<span style="width:150px;display: inline-block;">Tax Amount:&nbsp;</span> <span style="width:150px;display: inline-block;">$ <?php echo isset($invoice['data']['taxAmount']) ? invoiceNumFormat($invoice['data']['taxAmount']): ''; ?> </span><br/>
					<span style="width:150px;display: inline-block;">Total:&nbsp;</span> <span style="width:150px;display: inline-block;">$ <?php echo $totalAmount; ?> </span><br/>
					<span style="width:150px;display: inline-block;">Amount Paid:&nbsp;</span> <span style="width:150px;display: inline-block;">$ <?php echo isset($invoice['data']['amountPaid']) ? invoiceNumFormat($invoice['data']['amountPaid']): ''; ?> </span><br/>
					<span style="width:150px;display: inline-block;">Amount Due:&nbsp;</span> <span style="width:150px;display: inline-block;">$ <?php echo isset($invoice['data']['amountDue']) ? invoiceNumFormat($invoice['data']['amountDue']): ''; ?> </span><br/>
				</div>
			</div>
		</div>
	</div>
</body>
</html>