
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
<?php include 'templatesVEO/header_pa.php'; ?>

<body class="fixed-sidebar">

<script>
      function ass_icon_fr() {
        document.getElementById("ass_icon").innerHTML = "<i class=\"fa fa-book\" style=\"color:black;font-size:30px\"></i>Choose...";
       
        
    
    
        var a = document.getElementById("");
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    
    
        
    }
    function ass_icon_client() {
        document.getElementById("ass_icon").innerHTML = "<i class=\"fa fa-user-circle\" style=\"color:blue;font-size:30px\"></i>Client Rep";
       
        
    
    
        var a = document.getElementById("");
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    
    
        
    }
    function ass_icon_claimant() {
        document.getElementById("ass_icon").innerHTML = "<i class=\"fa fa-drivers-license\" style=\"color:green;font-size:30px\"></i>Claimant";
       
        
    
    
        var a = document.getElementById("");
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    
    
        
    }
    function ass_icon_loss() {
        document.getElementById("ass_icon").innerHTML = "<i class=\"fa fa-window-close\" style=\"color:red;font-size:30px\"></i>Loss";
       
        
    
    
        var a = document.getElementById("");
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    
    
        
    }
    function ass_icon_insured() {
        document.getElementById("ass_icon").innerHTML = "<i class=\"fa fa-taxi\" style=\"color:yellow;font-size:30px\"></i>Insured";
       
        
    
    
        var a = document.getElementById("");
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    
    
        
    }
    function ass_icon_accounting() {
        document.getElementById("ass_icon").innerHTML = "<i class=\"fa fa-pie-chart\" style=\"color:yellow;font-size:30px\"></i>Accounting";
       
        
    
    
        var a = document.getElementById("");
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    
    
        
    }
</script>


<div id="wrapper">

<?php include 'templatesVEO/navtemp.php'; ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php include 'templatesVEO/static-nav.php'; ?>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <div>
                  
                    <div class="col-md-12">
                    <div class="widget style1 animated slideInRight " style="background: linear-gradient(to right, white, black);">
                            <div class="row">
                                <div class="col-4">
                                   
                                </div>
                                <div class="col-8 text-right">
                                <h2 style="float:right;color:white">
                          Edit Assignment<i class="fa fa-cube" style="color:purple;font-size:30px"></i>
                        </h2>
                                   
                                </div>
                            </div>
                    </div>
                </div>
            </div>
                    
                    </div>

                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight"> <!--Datatable-->

<div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist" style="font-size:10px">
                            <li style="background-image: linear-gradient(white, grey);"><a class="nav-link active" data-toggle="tab" href="#tab-6" onclick="ass_icon_fr()"><i class="fa fa-book" style="color:black;font-size:30px"></i><span style="color:black">Edit Form</span></a></li>

                        </ul>
                        <div class="tab-content">


                            <div role="tabpanel" id="tab-1" class="tab-pane">
                                <div class="panel-body">

                                </div>
                            </div>


                            <div role="tabpanel" id="tab-2" class="tab-pane">
                                <div class="panel-body">
                   
                                </div>
                            </div>



                            <div role="tabpanel" id="tab-4" class="tab-pane">
                                <div class="panel-body">
                             
                    
                                </div>
                            </div>




                              <div role="tabpanel" id="tab-6" class="tab-pane active">
                                <div class="panel-body">
                      
                           
                          
                            <div style="height:20px"></div>
                            <div class="col-sm-10">
                            <div class="row">
                       
                         
                          
                            <form>
                           
                            <div class="form-group row has-warning"><label class="col-sm-2 col-form-label">Search by Assigment Number:</label>

<div class="col-sm-10"><input placeholder="Seacrh Assignments" type="text "name="users" onchange="showUser(this.value)" class="form-control"></div>
</div>
                            </form>
                            <div class="hr-line-dashed"></div>
                                      
                          

<div id="txtHint"><b></b></div>
    
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
</div>

</div>

</div>
            
            </div> <!--Datatable-->
      <!-- Page-Level Scripts -->
    
    
    <?php include 'templatesVEO/footer.php'; ?>