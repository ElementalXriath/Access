<?php 
ob_start();
session_start();
//error_reporting(0);
require_once 'config.php'; 
$url=strtok($_SERVER["REQUEST_URI"],'?');
$url_arr = explode("/", $url);

if(!isset($_SESSION['logged_in']) && !in_array("quiz-result", $url_arr)){
	$_SESSION['error'] = "Please login to access this page";
	header('Location: index.php');exit;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Virtual EX. Office </title>

    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css2/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css2/animate.css" rel="stylesheet">
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/plugins/iCheck/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui-custom.css"/>
    <link rel="stylesheet" href="css/ui.jqgrid.css"/>
    <link href="css2/datepicker.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","print_ar.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>


