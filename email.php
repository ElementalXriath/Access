<?php 
require_once 'config.php';

$uuid = $_GET['uuid'];

$user = new Cl_User();
$results = $user->getInvoice($uuid);
$settings = $user->getSettings();
$invoice = array();
if(!empty( $results )){
	$invoice = json_decode( $results['invoice'], true);
}
$invoiceNo = isset($results['id'])? $results['id']: '';
$invoiceDate = isset($results['created'])? date("M d, Y", strtotime($results['created'])): date("M d, Y");


$logo = isset($settings['companyLogo'])? 'img/'.$settings['companyLogo']:LOGO;
$logo = BASE_PATH.$logo;
$companyName = isset($settings['companyName'])?$settings['companyName']:COMPANY_NAME;
$address = isset($settings['address'])?$settings['address']:COMPANY_ADDRESS;
$phone = isset($settings['phone'])?$settings['phone']:PHONE;
$contactEmail = isset($settings['contactEmail'])?$settings['contactEmail']:EMAIL;

$totalAmount = isset($invoice['data']['totalAftertax']) ? invoiceNumFormat($invoice['data']['totalAftertax']): 0;

function invoiceNumFormat($number){
	return sprintf("%.2f", $number);
}


?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>[REPLACE THIS WITH YOUR TITLE]</title>
        <style media="all" type="text/css">
    		body{font:13px/1.231 "Arial",sans-serif;background-color: #f0f3f4;}
			 #wrapper { width: 100%; margin: 2em 0; background-color: #9EBF00; color: #fff; }
			.container { margin: 0 auto; line-height: 130%; color: #4d4d4d; text-align: left; }
			.frame { background-color: #b6d93f; font-size: 1px; line-height: 1px;  }
			.hairline { background-color: #9ebf00; font-size: 1px; line-height: 1px; }
			.masthead, .gutter { color: #999; background-color: #fff; }
			.content { line-height: 158%; color: #999; background-color: #fff; }
			#webversion, #footer { margin: 0 auto; text-align: center; font-size: 85%; }
			/*** general styles ***/
			h1, h1 a, h2, h2 a {  color: #000; }
			h1 span { padding: 0 .5em; background: #fff; }
			h1 {
				margin: 32px 0 19px;
				font: bold 85% "Verdana", sans-serif;
				text-transform: uppercase;
				text-align: center;
				letter-spacing: .1em;
				background: transparent url("dots_h.gif") repeat-x 0 55%;
			}
			h3, h3 a { color: #808080; }
			h3 { margin: 0 0 .1em; font: normal 165%/109% "Arial", sans-serif; }
			table{ border-collapse:collapse;border-spacing:0; border: 0; }
			caption,th,td {text-align:left;font-weight:normal; margin: 0; padding: 0; }
			pre,code,kbd,samp,tt{font-family:monospace;line-height:100%;}
			th, td { vertical-align: top; }
			a { text-decoration: none; }
			blockquote { margin: 0; padding: 5px 30px; text-align: center; }
			blockquote, blockquote p { font: italic 16px/145% "Georgia", serif; }
			p, blockquote { color: #999; }
			p { margin: 0 0 1em; font: normal 100%/158% "Arial", sans-serif; vertical-align: top; }
			.hide { text-align: center; color: red; font-size: 150%; }
			.content p a, .content li a { color: #8AAD09; text-decoration: underline; }
			.content p.dt { margin-bottom: .8em; font: italic 95%/135% "Arial", sans-serif; }
			img.right { float: right; margin: 0 0 30px 20px; }
			.contact { text-align: center; }
			.contact, .contact p, .contact a { text-decoration: none; }
			.contact p { margin-bottom: 0; line-height: 140%; }
			.contact a:hover { text-decoration: underline; }
			#webversion, #webversion a {
				font: bold 12px/28px "Trebuchet", "Trebuchet MS", serif;
				color: #fff;
			}
			#credit { padding-bottom: 20px; }
			#credit, #credit a {
				color: #fff;
				font: normal 10px/13px "Verdana", sans-serif;
				text-align: center;
			}
			#contact_info { padding: 5px; }
    	</style>
</head>
<body>
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td class="navbar navbar-inverse" align="center">
                <!-- This setup makes the nav background stretch the whole width of the screen. -->
                <table width="650px" cellspacing="0" cellpadding="3" class="container">
                    <tr class="navbar navbar-inverse">
                        <td colspan="4"><a class="brand" href="<?php echo BRANDING_URL;?>">SmartTutorials.net</a></td>
                        <td><ul class="nav pull-right"><li><a href="<?php echo BRANDING_URL;?>">Get The Invoice Script</a></li></ul></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" align="center">
            	<div style="margin-bottom:30px;"></div>
                <table width="650px" cellspacing="0" cellpadding="3" class="container">
                    <tr>
						<td style="text-align:  left;">
			           		<span style="font-size: 22px; font-weight: bold"><img style="height: 65px;" src="<?php echo $logo;  ?>"/> </span><br>
							<?php echo $companyName; ?> <br>
							<?php echo $address; ?><br/>
				      		Phone:  <?php echo $phone; ?><br/>
				      		Email: <?php echo $contactEmail; ?><br/>
										
			           </td>
			           <td style="text-align: right;">
			           		Invoice # <?php echo $invoiceNo; ?><br>
			                <?php echo $invoiceDate; ?><br>
			                <strong style="font-size: 18px"><?php echo $totalAmount; ?></strong><br>
			           </td>
			                        
			    	</tr>
                </table>
                <div style="margin-bottom:30px;"></div>
                <table width="650px" cellspacing="0" cellpadding="3" class="container">
                    <tr>
                    	<tr>
				        	<td style="text-align:  left;">
								<h2 style="margin-bottom:5px;line-height:10px;background-color: #c0c0c0;display:inline-block;padding:10px 20px 10px 10px;">Bill To,</h2><br>
								<?php echo isset($invoice['data']['clientCompanyName']) ? $invoice['data']['clientCompanyName']: ''; ?>,<br>
								<?php echo isset($invoice['data']['clientAddress']) ? $invoice['data']['clientAddress']: ''; ?>
											
				           </td>
				
				           <td style="text-align: right;">
				                            
				           </td>
				
				        </tr>
                    </tr>
                </table>    
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" align="center">
                <table width="650px" cellspacing="0" cellpadding="3" class="container">
                	<tr>
                		<td> <hr> </td>
                	</tr>
                    <tr>
                        <td>
                        	<?php if(isset($invoice['data']['Invoice'])&&!empty($invoice['data']['Invoice'])){?>
                           	<table style="width: 100%; margin-top: 20px; border-collapse:collapse;">
								<thead>
						       		<tr style="border-bottom: 1px solid #ccc; line-height: 40px; font-weight: bold;background-color: #c0c0c0;">
						            	<th style="text-align: left">Item No</th>
						                <th style="text-align: left; width: 350px;">Item Description</th>
						                <th style="text-align: left">Price</th>
						                <th style="text-align: left">Quantity</th>
						                <th style="text-align: right">Line Total</th>
						           	</tr>
						     	</thead>
						       	<tbody>
						       		<?php foreach ( $invoice['data']['Invoice']['itemNo'] as $key=>$item){?>
										<tr style="border-bottom: 1px solid #ccc; line-height: 30px;">
											<td style="text-align: left"> <?php echo isset($invoice['data']['Invoice']['itemNo'][$key]) ? $invoice['data']['Invoice']['itemNo'][$key] : ''; ?></td>
											<td  style="text-align: left"> <?php echo isset($invoice['data']['Invoice']['itemName'][$key]) ? $invoice['data']['Invoice']['itemName'][$key]: ''; ?> </td>
											<td  style="text-align: left"> <?php echo isset($invoice['data']['Invoice']['price'][$key]) ? invoiceNumFormat($invoice['data']['Invoice']['price'][$key]): ''; ?> </td>
											<td  style="text-align: left"> <?php echo isset($invoice['data']['Invoice']['quantity'][$key]) ? $invoice['data']['Invoice']['quantity'][$key]: ''; ?> </td>
											<td style="text-align: right"> <?php echo isset($invoice['data']['Invoice']['total'][$key]) ? invoiceNumFormat($invoice['data']['Invoice']['total'][$key]): ''; ?> </td>
										</tr>
									<?php } ?>
                           		</tbody>
                           	</table>
                           	<?php }?>
							<p> &nbsp;</p>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        
        <tr>
            <td bgcolor="#FFFFFF" align="center">
                <table width="650px" cellspacing="0" cellpadding="3" class="container">
                	<tr>
                		<td>
                			<div style="width:100%;">
								<div style="width:50%;padding:0px;margin:0px;float:left;">
									<span style="font-size:20px;"> Notes:&nbsp;</span><br/>
									<p> <?php echo isset($invoice['data']['notes']) ? $invoice['data']['notes']: ''; ?> </p>
								</div>
								<div style="width:50%;padding:0px;margin:0px;float:right;">
									<div style="text-align:right">
										<span style="width:150px;display: inline-block;">Subtotal:&nbsp;</span> <span style="width:150px;display: inline-block;"> <?php echo isset($invoice['data']['subTotal']) ? invoiceNumFormat($invoice['data']['subTotal']): ''; ?> </span><br/>
										<span style="width:150px;display: inline-block;">Tax Amount:&nbsp;</span> <span style="width:150px;display: inline-block;"> <?php echo isset($invoice['data']['taxAmount']) ? invoiceNumFormat($invoice['data']['taxAmount']): ''; ?> </span><br/>
										<span style="width:150px;display: inline-block;">Total:&nbsp;</span> <span style="width:150px;display: inline-block;"> <?php echo $totalAmount; ?> </span><br/>
										<span style="width:150px;display: inline-block;">Amount Paid:&nbsp;</span> <span style="width:150px;display: inline-block;"> <?php echo isset($invoice['data']['amountPaid']) ? invoiceNumFormat($invoice['data']['amountPaid']): ''; ?> </span><br/>
										<span style="width:150px;display: inline-block;">Amount Due:&nbsp;</span> <span style="width:150px;display: inline-block;"> <?php echo isset($invoice['data']['amountDue']) ? invoiceNumFormat($invoice['data']['amountDue']): ''; ?> </span><br/>
									</div>
								</div>
							</div>
                		</td>
                	</tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td bgcolor="#FFFFFF" align="center">
            	<div style="margin-bottom:30px;"></div>
                <table width="650px" cellspacing="0" cellpadding="3" class="container">
                		<tbody>
                		<tr><td height="4" class="hairline">&nbsp;</td></tr>
						<tr><td height="34" class="contact">&nbsp;</td></tr>
						<tr>
			
							<td align="center" id="contact_info" class="contact">
								<p id="address"><?php echo CONTACT_ADDRESS; ?><br>
								<a href="<?php echo BRANDING_URL; ?>">by <?php echo CONTACT_ADDRESS_BY; ?></a><br>
								<?php echo ADMIN_EMAIL; ?><br> 
								</p>
							</td>
			
						</tr>
						<tr><td height="34" class="contact">&nbsp;</td></tr>
						<tr><td height="4" class="hairline">&nbsp;</td></tr>
					</tbody>
        		</table>
        		<div style="margin-bottom:30px;"></div>
            </td> 
        </tr>       
    </table>
</body>
</html>
