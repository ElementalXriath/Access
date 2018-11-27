<?php
ob_start();
session_start();
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
    <link href="css2/datepicker.css" rel="stylesheet">
    <link href="css2/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css2/animate.css" rel="stylesheet">
    <link href="css2/style.css" rel="stylesheet">
   
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>