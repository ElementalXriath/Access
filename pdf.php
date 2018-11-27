<?php
require_once("dompdf/dompdf_config.inc.php");
//define('DOMPDF_ENABLE_AUTOLOAD', false);

require_once 'config.php'; 
require_once 'Cl/User.php';
require_once 'Cl/DBclass.php';

if((isset($_GET['uuid'])) && !empty( $_GET['uuid'])){
	$uuid = $_GET['uuid'];
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
//$logo = BASE_PATH.$logo;
$companyName = isset($settings['companyName'])?$settings['companyName']:COMPANY_NAME;
$address = isset($settings['address'])?$settings['address']:COMPANY_ADDRESS;
$phone = isset($settings['phone'])?$settings['phone']:PHONE;
$contactEmail = isset($settings['contactEmail'])?$settings['contactEmail']:EMAIL;
$totalAmount = isset($invoice['data']['totalAftertax']) ? invoiceNumFormat($invoice['data']['totalAftertax']): 0;
$clientCompanyName = isset($invoice['data']['clientCompanyName']) ? $invoice['data']['clientCompanyName']: '';
$company_file_number = isset($invoice['data']['company_file_number']) ? $invoice['data']['company_file_number']: '';
$attention = isset($invoice['data']['attention']) ? $invoice['data']['attention']: '';
$clientAddress = isset($invoice['data']['clientAddress']) ? $invoice['data']['clientAddress']: '';
$assignment_id = isset($invoice['data']['assignment_id']) ? $invoice['data']['assignment_id']: '';
$cvi = isset($invoice['data']['cvi']) ? $invoice['data']['cvi']: '';
$dateofloss = isset($invoice['data']['dateofloss']) ? $invoice['data']['dateofloss']: '';
function invoiceNumFormat($number){
	return sprintf("%.2f", $number);
}

$html ="<html style='width:100%;height:auto'>";
$html .='<head> <title>Smart Invoice</title>';

$html .="<style> 
body {
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
}			
table {
	border-collapse: collapse;
}
#invoice-main th, #invoice-main td {
	border: 1px solid #333;
	padding:5px;
}
		
		
</style>";

$html .='</head>';

$html .="<body style='width:95%;height:auto; margin-right:20px;font-family: 'Source Sans Pro''>";
$html .='<div class="page">';

$html .='<table style="width: 100%; margin-bottom: 20px"> <tr>';
$html .='<td style="text-align:  left;">';
$html .='<span style="font-size: 22px; font-weight: bold"><img src="'.$logo.'"/> </span><br>'.$companyName.'<br>';
$html .= $address.'<br/>';
$html .= 'Phone: '.$phone.'<br/>';
$html .= 'Email: '.$contactEmail.'<br/> '; 
$html .= '</td>';

$html .= '<td style="text-align: right;">';

$html .= '<br><br><br><br><br><br>';
$html .= 'Invoice #&nbsp;'.$invoiceNo.'<br>';
$html .= $invoiceDate.'<br>';
$html .= '<br><br><br><br><br><br>';
$html .= '<div style="border:2px solid black">';
$html .= '<strong style="font-size: 18px">TOTAL AMOUNT DUE-<br> <span style="color:red;font-size:28px">$'.$totalAmount.'</span></strong><br>';
$html .= '</div>';
$html .= '<br>';
$html .= '</td>';
$html .= '</tr> </table>';



$html .= '<table style="width: 100%; margin-top: 20px;">';
$html .= '<tr>';
$html .= '<td style="text-align:  left;">';
$html .= '<h2 style="line-height:10px;background-color:;display:inline;padding:10px 20px 20px 10px;">Bill To,</h2><br><br>';
$html .= $clientCompanyName.'<br>';
$html .= $clientAddress;
$html .= '</td>';
$html .= ' <td style="text-align: right;"></td>';					
$html .= '</tr>';		  
$html .= '</table>';
$html .= '<br>';
$html .= 'Attention: '.$attention.'';
$html .= '<br>';
$html .= 'Vs: '.$cvi.'';
$html .= '<br>';
$html .= 'C.A File # <span style="color:green"><b>'.$assignment_id.'<b></span><br>';
$html .= 'Your File # <b>'.$company_file_number.'<b><br>';
$html .= '<br>';
$html .= 'Date of Loss: '.$dateofloss.'<br>';
$html .= '<br>';						

$html .= '<hr class="divider"/>';

if(isset($invoice['data']['Invoice'])&&!empty($invoice['data']['Invoice'])){
	$html .= '<table id="invoice-main" style="width: 100%; margin-top: 20px;border-collapse:collapse;">';
	$html .= '<thead>';
	$html .= '<tr style="border-bottom: 1px solid #ccc; line-height: 30px; font-weight: bold;background-color: #c0c0c0;">';
	$html .= '<th style="text-align: left">DATE</th>';
	$html .= '<th style="text-align: left; width: 350px;">Service Description</th><th style="text-align: left">Rate</th><th style="text-align: left">Hourly</th><th style="text-align: right">Srv. Total</th>';
	$html .= '</tr></thead>';
	$html .= '<tbody>';
	
	foreach ( $invoice['data']['Invoice']['itemNo'] as $key=>$item){
		$html .= '<tr style="border-bottom: 1px solid #ccc; line-height: 30px;">';
			$itemNo = isset($invoice['data']['Invoice']['itemNo'][$key]) ? $invoice['data']['Invoice']['itemNo'][$key] : '';
			$itemName = isset($invoice['data']['Invoice']['itemName'][$key]) ? $invoice['data']['Invoice']['itemName'][$key]: '';
			$price = isset($invoice['data']['Invoice']['price'][$key]) ? invoiceNumFormat($invoice['data']['Invoice']['price'][$key]): '';
			$quantity = isset($invoice['data']['Invoice']['quantity'][$key]) ? $invoice['data']['Invoice']['quantity'][$key]: '';
			$total = isset($invoice['data']['Invoice']['total'][$key]) ? invoiceNumFormat($invoice['data']['Invoice']['total'][$key]): '';
			
			$html .= '<td style="text-align: left">'.$itemNo.'</td>';
			$html .= '<td style="text-align: left">'.$itemName.'</td>';
			$html .= '<td style="text-align: left">'.$price.'</td>';
			$html .= '<td style="text-align: left">'.$quantity.'</td>';
			$html .= '<td style="text-align: right">'.$total.'</td>';
		$html .= '</tr>';
	}
	$html .= '</tbody></table>';
}
$html .= '<p> &nbsp;</p>';


$html .= '<div style="width:100%;">';

$html .= '<div style="width:50%;padding:0px;margin:0px;float:left;">';
$html .= '<span style="font-size:20px;"> Notes:&nbsp;</span><br/>';
$notes = isset($invoice['data']['notes']) ? $invoice['data']['notes']: '';;
$html .= '<p>'.$notes.'</p>';
$html .= '</div>';


$html .= '<div style="width:50%;padding:0px;margin:0px;float:right;">';

$subTotal = isset($invoice['data']['subTotal']) ? invoiceNumFormat($invoice['data']['subTotal']): '';
$taxAmount = isset($invoice['data']['taxAmount']) ? invoiceNumFormat($invoice['data']['taxAmount']): '';
$amountPaid = isset($invoice['data']['amountPaid']) ? invoiceNumFormat($invoice['data']['amountPaid']): '';
$amountDue = isset($invoice['data']['amountDue']) ? invoiceNumFormat($invoice['data']['amountDue']): '';
$html .= '<div style="text-align:right">';
$html .= '<span style="width:100px;display: inline-block;margin-left:150px">Subtotal:&nbsp;</span> <span style="width:75px;display: inline-block;float:right;">$'.$subTotal.'</span><br/>';
$html .= '<span style="width:100px;display: inline-block;margin-left:150px">Tax Amount:&nbsp;</span> <span style="width:75px;display: inline-block;float:right;">$'.$taxAmount.'</span><br/>';
$html .= '<span style="width:100px;display: inline-block;margin-left:150px">Total:&nbsp;</span> <span style="width:75px;display: inline-block;float:right;">$'.$totalAmount.'</span><br/>';
$html .= '<span style="width:100px;display: inline-block;margin-left:150px">Amount Paid:&nbsp;</span> <span style="width:75px;display: inline-block;float:right;">$'.$amountPaid.'</span><br/>';
$html .= '<span style="width:100px;display: inline-block;margin-left:150px">Amount Due:&nbsp;</span> <span style="width:75px;display: inline-block;float:right;">$'.$amountDue.'</span><br/>';
$html .= '</div></div>';
$html .= '</div>';
$html .='</div></body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

