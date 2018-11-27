<?php 
ob_start();
session_start();
error_reporting(0);
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

    <title>INSPINIA | Advanced Form Elements</title>

    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css2/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css2/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="css2/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="css2/plugins/textSpinners/spinners.css" rel="stylesheet">
    <link href="css2/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="css2/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="css2/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="css2/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="css2/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="css2/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css2/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css2/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="css2/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="css2/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="css2/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="css2/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css2/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="css2/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link href="css2/animate.css" rel="stylesheet">
    <link href="css2/style.css" rel="stylesheet">



  <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>ACAR</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>

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
  xmlhttp.open("GET","getusernew.php?q="+str,true);
  xmlhttp.send();
}
</script>


</head>
