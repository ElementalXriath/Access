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
<?php include 'templatesVEO/header.php'; ?>

<body>


<div id="wrapper">

<?php include 'templatesVEO/navtemp.php'; ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include 'templatesVEO/static-nav.php'; ?>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>SEED</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">This is</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>


                
                <div class="col-sm-8">
                    <div class="title-action">
                    <a href="js/tinymce/plugins/filemanager/dialog.php?type=0" class="btn iframe-btn" type="button">Open Filemanager</a>
                        
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <div class="middle-box text-center animated fadeInRightBig">
                    <h3 class="font-bold">This is page content</h3>
                    <div class="error-desc">
                        You can create here any grid layout you want. And any variation layout you imagine:) Check out
                        main dashboard and other site. It use many different layout.
                        <br/><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
                    </div>
                </div>
            </div>
    
    <?php include 'templatesVEO/footer.php'; ?>

