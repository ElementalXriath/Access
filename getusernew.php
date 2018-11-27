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

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','smart_invoice_v1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con);
$sql="SELECT * FROM assignments_t1 WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

   
?>

               
                      <!--IBOX HEADER-->
 
            
                      <div class="col-lg-12 info-bg" style="margin:0;padding:0">
                            <div class="tabs-container"  style="margin:0;padding:0px; background-color:white">
                                <ul class="nav nav-tabs" role="tablist" style="font-size:4px">
                                    <li style="border-radius:4px;border:1px solid grey;box-shadow: 0px 14px 18px 0 white, 0 16px 20px 0 rgba(0, 0, 0, 0.19);background-image: linear-gradient( grey, white);"><a class="nav-link active" data-toggle="tab" href="#tab-11"><i class="fa fa-codepen" style="color:black;font-size:15px"></i></a></li>
                                    <li style="background-image: linear-gradient(grey, white);"><a class="nav-link" data-toggle="tab" href="#tab-22"><i class="fa fa-edit" style="color:black;font-size:17px"></i></a></li>

                                    <li style="background-image: linear-gradient(grey, white);"><a class="btn btn-white btn-bitbucket " style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
		                            <i class="fa fa-file fa-4x"></i>
		                        </a></li>
                                    <li style="background-image: linear-gradient(grey, white);"><a class="btn btn-white btn-bitbucket" style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);" value="Print ACAR" id="btnPrint">
		                            <i class="fa fa-print fa-4x"></i>
		                        </a></li>
                                <li style="background-image: linear-gradient(black, white);"><a class="btn btn-success btn-bitbucket" style=" box-shadow: 0 5px 9px 0 blue, 0 6px 23px 0 rgba(0, 0, 0, 0.19); border:1px solid grey" >
		                            <i class="fa fa-book fa-4x" style="color:white"></i>
		                        </a></li>
                                </ul>
    
                                <div class="col-lg-12 gray-bg">        
                                <div class="tab-content ">
    
                                    <div id="tab-11" class="tab-pane active">
                                        <div class="panel-body text-center" style="background-image: linear-gradient(whitesmoke, white, white , white);">
                                        <div class="text-left">
		                    		                    
                                                     
                                                                     
                                                    </div>
                            
                                        <h1>{<i  class="fa fa-cubes fa-5x icondb-changer" style="font-size:50px" ></i>}</h1>
                                        <h1><span style="color:aqua">{</span>Assignment Details<span style="color:aqua">}</span></h1>
                                        
                            <hr>
                            <h4>Author: <?php echo $row['author']; ?>  /  Date-Created:  <?php echo $row['ass_date']; ?>  <br> /  Due Date :  <?php echo $row['id']; ?> ! Due in 4 Days !</h4>
                            <hr>
                        <h5 id="mdo">Assignment-Form Progression : 12% /  Missing Fields 42 / Total 51 <a href="">Whats Missing?</a></h5>
                            <div class="progress gray-bg" style="background-image:linear-gradient(to right, grey, black, black);box-shadow: 0px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="progress-bar progress-bar-striped progress-bar-info" style="width: 12%;" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                            <hr>
        
                                    
                                            <div class="row">

                                                <div class="col-lg-4"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 white, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">-Assignment ID-</b>
                                                                    <br> <hr>
                                                                    ASMT_ID: <span style="color:aqua">   <?php echo $row['id']; ?></span>
                                                                </h4>
                                                                <hr>
                                                              
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Date:</label>
                                                                <?php echo $row['ass_date']; ?>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>State:</label>
                                                                <span style="color:aqua">   <?php echo $row['ass_jr']; ?> </span>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Type:</label>
                                                             <?php echo $row['ass_catagory']; ?>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-4"> 
                                                    <div class="widget black-bg p-xs text-white">
                                                                <h4>
                                                                    -Client- <br><b style="color:green"><?php echo $row['client_name']; ?></b>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                              File: <span style="color:green"><?php echo $row['file_number']; ?></span>
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Rep: </label>
                                                                <?php echo $row['con_name']; ?>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>State: </label>
                                                                <?php echo $row['con_address']; ?>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Client: </label>
                                                                <?php echo $row['client_name']; ?>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-4"> 
                                                    <div class="widget gray-bg p-xs"  style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    Client-Rep
                                                                    <br> <?php echo $row['con_name']; ?>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                Phone: <?php echo $row['con_number']; ?>
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                                <span class="fa fa-envelope m-r-xs"></span>
                                                                <label>Email:</label>
                                                                <?php echo $row['con_email']; ?>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-home m-r-xs"></span>
                                                                <label>Address:</label>
                                                                <?php echo $row['con_address']; ?>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-phone m-r-xs"></span>
                                                                <label>Fax:</label>
                                                                <?php echo $row['con_number']; ?>
                                                            </li>
                                                        </ul>   
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            
                                        
        <h1><span style="color:aqua">{</span><span style="color:green">CLMT</span> Details<span style="color:aqua">}</span></h1>
                                            <hr>

                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19); background-color:white"><a class="nav-link active" data-toggle="tab" href="#tab-31"> <i style="color:teal" class="fa fa-id-badge fa-1x"></i></a></li>
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link" data-toggle="tab" href="#tab-41"><i style="color:skyblue" class="fa fa-gavel fa-1x"></i></a></li>
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link" data-toggle="tab" href="#tab-51"><i style="color:red" class="fa fa-ambulance fa-1x"></i></a></li>
                            <li  style=" box-shadow: 0 5px 9px 0 purple, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link" data-toggle="tab" href="#tab-61"><i style="color:purple" class="fa fa-car fa-1x"></i></a></li>
                        </ul>
                        <div class="tab-content" style=" box-shadow: 0 5px 9px 0 white, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                            <div id="tab-31" class="tab-pane active" style="border-radius:8px">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                    
                                    <div class="row">
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">-Claimant-</b>
                                                                    <br>
                                                                    Name: <span style="color:teal">   <?php echo $row['claimant_name']; ?></span>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>DOB:</label>
                                                                <span style="color:teal">   <?php echo $row['claimant_dob']; ?> </span>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>SSN:</label>
                                                                <span style="color:teal">   <?php echo $row['claimant_ssn']; ?> </span>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Notes:</label>
                                                             <?php echo $row['']; ?>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs text-white"  style=" box-shadow: 0 5px 9px 0 green, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    -Contact- <br><b style="color:teal">Private</b>
                                                                </h4>
                                                                <hr>
                                                              
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Phone: </label>
                                                                <b style="color:green"><?php echo $row['claimant_phone']; ?></b>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>Email: </label>
                                                                <b style="color:green"> <?php echo $row['claimant_email']; ?></b>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Address: </label>
                                                                <b style="color:green"><?php echo $row['claimant_address']; ?></b>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-41" class="tab-pane">
                                <div class="panel-body">
                                <div class="col-lg-12">
                                    
                                    <div class="row">
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">-Claimant Attorney-</b>
                                                                    <br>
                                                                    Name: <span style="color:skyblue">   <?php echo $row['claimant_att']; ?></span>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Phone:</label>
                                                                <span style="color:skyblue">  <?php echo $row['claimant_att_phone']; ?></span>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>SSN:</label>
                                                        <span style="color:skyblue">   <?php echo $row['claimant_att_email']; ?> </span>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Address:</label>
                                                                <span style="color:skyblue"> <?php echo $row['claimant_att_address']; ?> </span>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs text-white"  style=" box-shadow: 0 5px 9px 0 orange, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    -Legal-Documents- <br>
                                                                    <hr>
                                                                    <h5 style="color:black">Rendering Utility Module -- {: <b style="color:aqua"> Uploader </b>:} </h5>   
                                                                </h4>
                                                                <hr>
                                                              
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                             <h6>Upload Documents  To == From   Attorney</h6>
                                                             
                                                            </li>
                                                            <li>
                                                           
                                                         
                                                      
                                                            </li>
                                                            <li>
                                                             
                                                            <div class="text-center">
		                    		                    
                                                        <a class="btn btn-dark btn-bitbucket " style=" box-shadow: 0 5px 9px 0 orange, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                            <i class="fa fa-upload" style="color:white"></i><strong style="color:orange"></strong>
                                                           
                                                        </a>
                                                        <a class="btn btn-dark btn-bitbucket " style=" box-shadow: 0 5px 9px 0 orange, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                            <i class="fa fa-image"></i>
                                                        </a>                 
                                                    </div>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    </div>

                                </div>
                                
                            </div>
                            <div id="tab-51" class="tab-pane">
                                <div class="panel-body">
                                <div class="row">
                                                <div class="col-lg-3"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 pink, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">Claimant Doctor</b>
                                                                    <br>
                                                                    Name: <span style="color:red">   <?php echo $row['claimant_doc']; ?></span>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Phone:</label>
                                                                <span style="color:red"><?php echo $row['claimant_doc_number']; ?></span>
                                                            </li>
                                                         
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-9"> 
                                                    <div class="widget black-bg p-xs text-white"  style=" box-shadow: 0 5px 9px 0 red, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    -Claimant Injury- <br><b style="color:grey">Description</b>
                                                                </h4>
                                                                <hr>
                                                      

                                                                    <h6>... <?php echo $row['claimant_injury']; ?></h6>
                                                        

                                                                <hr>
    
                                                    </div>
                                                </div>
</div>
                                    </div>
                                </div>
                                
                            <div id="tab-61" class="tab-pane">
                                <div class="panel-body">
                                <div class="row">
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 slategrey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">Claimant Auto</b>
                                                                    <br><hr>
                                                                    Model: <span style="color:purple">   <?php echo $row['claimant_auto']; ?></span>
                                                                </h4>
                                                                <hr>
                                                               
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Owner:</label>
                                                                <span style="color:purple"><?php echo $row['claimant_auto_owner']; ?></span>
                                                            </li>
                                                            <li>
                                                            
                                                            <label>Driver:</label>
                                                            <span style="color:purple"><?php echo $row['claimant_auto_driver']; ?></span>
                                                        </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 purple, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">Claimant Insurance</b>
                                                                    <br> <hr>
                                                                    Carrier: <span style="color:purple">   <?php echo $row['claimant_insurance_carrier']; ?></span>
                                                                </h4>
                                                                <hr>
                                                               
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Policy:</label>
                                                                <span style="color:purple"><?php echo $row['claimant_insurance_policy']; ?></span>
                                                            </li>
                                                            <li>
                                                            
                                                            <label>Contact:</label>
                                                            <span style="color:purple"><?php echo $row['claimant_insurance_contact']; ?></span>
                                                        </li>
                                                        </ul>
    
                                                    </div>
                                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            <hr>
                                            
                                         
            <h1><span style="color:aqua">{</span><span style="color:yellow">INSR</span> Details<span style="color:aqua">}</span></h1>
                                                <hr>
                                                <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19); background-color:white"><a class="nav-link active" data-toggle="tab" href="#tab-33"> <i style="color:teal" class="fa fa-id-badge fa-1x"></i></a></li>
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link" data-toggle="tab" href="#tab-44"><i style="color:skyblue" class="fa fa-gavel fa-1x"></i></a></li>
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link" data-toggle="tab" href="#tab-55"><i style="color:red" class="fa fa-ambulance fa-1x"></i></a></li>
                            <li  style=" box-shadow: 0 5px 9px 0 black, 0 6px 23px 0 rgba(0, 0, 0, 0.19);"><a class="nav-link" data-toggle="tab" href="#tab-66"><i style="color:purple" class="fa fa-car fa-1x"></i></a></li>
                        </ul>
                        <div class="tab-content" style=" box-shadow: 0 5px 9px 0 white, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                            <div id="tab-33" class="tab-pane active" style="border-radius:16px">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                    
                                    <div class="row">
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">-Insured-</b>
                                                                    <br>
                                                                    Name: <span style="color:teal">   <?php echo $row['ins_name']; ?></span>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>DOB:</label>
                                                                <span style="color:teal">   <?php echo $row['ins_dob']; ?> </span>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>SSN:</label>
                                                                <span style="color:teal">   <?php echo $row['ins_ssn']; ?> </span>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Notes:</label>
                                                             <?php echo $row['']; ?>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs text-white"  style=" box-shadow: 0 5px 9px 0 green, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    -Contact- <br><b style="color:teal">Private</b>
                                                                </h4>
                                                                <hr>
                                                              
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Phone: </label>
                                                                <b style="color:green"><?php echo $row['ins_phone']; ?></b>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>Email: </label>
                                                                <b style="color:green"> <?php echo $row['ins_email']; ?></b>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Address: </label>
                                                                <b style="color:green"><?php echo $row['ins_address']; ?></b>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-44" class="tab-pane">
                                <div class="panel-body">
                                <div class="col-lg-12">
                                    
                                    <div class="row">
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 grey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">-Insured Attorney-</b>
                                                                    <br>
                                                                    Name: <span style="color:skyblue">   <?php echo $row['ins_att']; ?></span>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Phone:</label>
                                                                <span style="color:skyblue">  <?php echo $row['ins_att_phone']; ?></span>
                                                            </li>
                                                            <li>
                                                           
                                                                <label>SSN:</label>
                                                        <span style="color:skyblue">   <?php echo $row['ins_att_email']; ?> </span>
                                                            </li>
                                                            <li>
                                                             
                                                                <label>Address:</label>
                                                                <span style="color:skyblue"> <?php echo $row['ins_att_address']; ?> </span>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6"> 
                                                    <div class="widget black-bg p-xs text-white"  style=" box-shadow: 0 5px 9px 0 orange, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    -Legal-Documents- <br>
                                                                    <hr>
                                                                    <h5 style="color:black">Rendering Utility Module -- {: <b style="color:aqua"> Uploader </b>:} </h5>   
                                                                </h4>
                                                                <hr>
                                                              
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                             <h6>Upload Documents  To == From   Attorney</h6>
                                                             
                                                            </li>
                                                            <li>
                                                           
                                                         
                                                      
                                                            </li>
                                                            <li>
                                                             
                                                            <div class="text-center">
		                    		                    
                                                        <a class="btn btn-dark btn-bitbucket " style=" box-shadow: 0 5px 9px 0 orange, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                            <i class="fa fa-upload" style="color:white"></i><strong style="color:orange"></strong>
                                                           
                                                        </a>
                                                        <a class="btn btn-dark btn-bitbucket " style=" box-shadow: 0 5px 9px 0 orange, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                            <i class="fa fa-image"></i>
                                                        </a>                 
                                                    </div>
                                                            </li>
                                                        </ul>
    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                    </div>

                                </div>
                                
                            </div>
                            <div id="tab-55" class="tab-pane">
                                <div class="panel-body">
                                <div class="row">
                                                <div class="col-lg-3"> 
                                                    <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 pink, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    <b style="color:white">Insured Doctor</b>
                                                                    <br>
                                                                    Name: <span style="color:red">   <?php echo $row['ins_doc']; ?></span>
                                                                </h4>
                                                                <hr>
                                                                <h4>
                                                                
                                                                </h4>
                                                        <ul class="list-unstyled m-t-md">
                                                            <li>
                                                            
                                                                <label>Phone:</label>
                                                                <span style="color:red"><?php echo $row['ins_doc_number']; ?></span>
                                                            </li>
                                                         
                                                        </ul>
    
                                                    </div>
                                                </div>
                                                <div class="col-lg-9"> 
                                                    <div class="widget black-bg p-xs text-white"  style=" box-shadow: 0 5px 9px 0 red, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                                                                <h4>
                                                                    -Insured Injury- <br><b style="color:grey">Description</b>
                                                                </h4>
                                                                <hr>
                                                      

                                                                    <h6>... <?php echo $row['ins_injury']; ?></h6>
                                                        

                                                                <hr>
    
                                                    </div>
                                                </div>
                                            
                                    </div>
                                </div>
                            </div>
                            <div id="tab-66" class="tab-pane">
                                <div class="panel-body">
                                <div class="row">
        <div class="col-lg-6"> 
            <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 slategrey, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                        <h4>
                            <b style="color:white">ins Auto</b>
                            <br><hr>
                            Model: <span style="color:purple">   <?php echo $row['ins_auto']; ?></span>
                        </h4>
                        <hr>
                       
                <ul class="list-unstyled m-t-md">
                    <li>
                    
                        <label>Owner:</label>
                        <span style="color:purple"><?php echo $row['ins_auto_owner']; ?></span>
                    </li>
                    <li>
                    
                    <label>Driver:</label>
                    <span style="color:purple"><?php echo $row['ins_auto_driver']; ?></span>
                </li>
                </ul>

            </div>
        </div>
        <div class="col-lg-6"> 
            <div class="widget black-bg p-xs animated pulse" style=" box-shadow: 0 5px 9px 0 purple, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">
                        <h4>
                            <b style="color:white">INS Insurance</b>
                            <br> <hr>
                            Carrier: <span style="color:purple">   <?php echo $row['ins_insurance_carrier']; ?></span>
                        </h4>
                        <hr>
                       
                <ul class="list-unstyled m-t-md">
                    <li>
                    
                        <label>Policy:</label>
                        <span style="color:purple"><?php echo $row['ins_insurance_policy']; ?></span>
                    </li>
                    <li>
                    
                    <label>Contact:</label>
                    <span style="color:purple"><?php echo $row['ins_insurance_contact']; ?></span>
                </li>
                </ul>

            </div>
        </div>

</div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        </div>
                                    </div>
                               
    
    
                                    <div id="tab-22" class="tab-pane">
                               
                                    <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1>
                          Editing ASMT : <span style="color:red"><?php echo $row['id'];?></span>
                        </h1>
                            <nav id="navbar-header" class="navbar navbar-light bg-light btn-xs " style="box-shadow: 0px 14px 18px 0 aqua, 0 16px 20px 0 rgba(0, 0, 0, 0.19);background-image:linear-gradient(to right, grey, black, black);border-radius:18px;font-size:9px">
                            <a class="navbar-brand" href="#"><i class="fa fa-codepen fa-2x" style="color:aqua;"></i></a>
                            <ul class="nav nav-pills">
                            <li class="nav-item">
                            <a class="nav-link btn-light btn"  style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);" href="#">Assignment</a>
                            </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-outline-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Claimant</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#navbar-claimant">Claimant Main</a>
                                    <a class="dropdown-item" href="#cv">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#ci">Attorney</a>
                                </div>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  btn btn-outline-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Insured</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#ii">Insurance</a>
                                    <a class="dropdown-item" href="#ia">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    
                                  <a class="dropdown-item" href="#ia">Attorney</a>
                                    </div>  </li>
                                    <li class="nav-item">
                                    <a class="nav-link   btn btn-outline-info"  href="#loss">Loss</a>
                                    </li>
                            </ul>
                            </nav>
                            <hr>
                    </div>
                </div>
            </div>

            <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
 <?php if(isset( $_SESSION['logged_in']) ) { ?>
            <div class="ibox" style="">
                <div class="ibox-content">

                        <h4>Author : <?php echo $_SESSION['first_name']; ?>  Handler :<?php echo $row['file_number'];?> </h4> <?php }?>
 <hr>
                        <h5 id="mdo">Assignment-Form Progression : 12% /  Missing Fields 42 / Total 51 <a href="">Whats Missing?</a></h5>
                            <div class="progress gray-bg" style="background-image:linear-gradient(to right, grey, black, black);box-shadow: 0px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="progress-bar progress-bar-striped progress-bar-info" style="width: 12%;" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                            <hr>
                            <h5>Rendering Form Scope -- {<i class="fa fa-codepen" style="color:aqua;font-size:15px"></i>} </h5>
        <div class="row"> 
            <h2><span style="color:aqua"><b> Assignment </b></span> Details </h2>    
        </div>
<hr>
       
          
            <form method="post" action="update.php">

<input  value="<?php echo $row['id'];?>" type="hidden"  class="form-control" name="assignment_id">

<div class="row">   <!--Company ROW-->
    
    

<div class="col-lg-6"><!--Company Info-->

<div class="row"><label class="col-lg-3 col-form-label">Company</label>
<div class="col-lg-9"><input  value="<?php echo $row['client_name'];?>" type="text" placeholder="Company" class="form-control" name="client_name"> <span class="form-text m-b-none"><hr></span>
</div>
</div>

<div class="row"><label class="col-lg-3 col-form-label">File-Number</label>
<div class="col-lg-9"><input  value="<?php echo $row['file_number'];?>" style="color:blue" type="text" placeholder="Clients File Number" class="form-control" name="file_number"></div>
</div>
</div>

<hr>






<div class="col-lg-6"><!--Company Info-->

<div class="row"><label class="col-lg-3 col-form-label">Date</label>

<div class="col-lg-3"><input value="<?php echo $row['ass_date'];?>" value="<?php echo $row['ass_date'];?>" type="date"  placeholder="Date" class="form-control" name="ass_date"> <span class="form-text m-b-none"><hr></span>
</div>
<label class="col-lg-3 col-form-label">Jurisdiction</label>

<div class="col-lg-3"><input value="<?php echo $row['ass_jr'];?>"  type="Name" placeholder="State" class="form-control" name="ass_jr"> <span class="form-text m-b-none"><hr></span>
</div>
</div>


<div class="row"><label class="col-lg-3 col-form-label">Client Type</label>

<div class="col-lg-9"><input value="<?php echo $row['client_type'];?>" style="color:blue" type="text" placeholder="Client-Type" class="form-control" name="client_type"></div>
</div>
</div>
</div>
<hr>
<div class="row">


<div class="col-lg-6"><!--Company Info-->




<div class="row"><label class="col-lg-3 col-form-label">Catagory</label>

<div class="col-lg-9"><input value="<?php echo $row['ass_catagory'];?>" style="color:blue" type="text" placeholder="" class="form-control" name="ass_catagory"></div>
</div>
</div>
</div>



    <hr>
        <div class="row"> 
            <h2><span style="color:aqua"><b> Client Rep </b></span> Details </h2>    
        </div>
    <hr>
       

<div class="row">   <!--Rep ROW-->
    


    <div id="list-item-1" class="col-lg-6"><!--Client Rep Info-->
    
    <div class="row"><label class="col-lg-3 col-form-label">Client-Rep</label>
    
    <div class="col-lg-9"><input value="<?php echo $row['con_name'];?>" type="text" placeholder="Rep Name" class="form-control" name="con_name"> <span class="form-text m-b-none"><hr></span>
    </div>
    </div>
    <div class="row"><label class="col-lg-3 col-form-label">Rep-Fax</label>
    
    <div class="col-lg-9"><input value="<?php echo $row['con_fax'];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="con_fax"></div>
    </div>
    </div>
    
    
    
    
    
    
    
    <div class="col-lg-6"><!--Client Rep Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Phone</label>
        
        <div class="col-lg-3"><input value="<?php echo $row['con_phone'];?>" type="text"  placeholder="Phone" class="form-control" name="con_phone"> <span class="form-text m-b-none"><hr></span>
        </div>
        <label class="col-lg-3 col-form-label">EXT.</label>
        
        <div class="col-lg-3"><input value="<?php echo $row['con_ext'];?>" type="Name" placeholder="Ext." class="form-control" name="con_ext"> <span class="form-text m-b-none"><hr></span>
        </div>
        </div>
        
        
        <div class="row"><label class="col-lg-3 col-form-label">Rep-Email</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['con_email'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="con_email">
            </div>
        </div>
    </div>

    
</div>


    
<hr>
        
<nav id="navbar-claimant" class="navbar navbar-light bg-light" style="box-shadow: 0px 14px 18px 0 aqua, 0 16px 20px 0 rgba(0, 0, 0, 0.19);background-image:linear-gradient(to right, grey, black, black);border-radius:18px;font-size:9px">
                            <a class="navbar-brand" href="#"></a>
                            <ul class="nav nav-pills">
                            <li class="nav-item">
                            <a class="nav-link  btn btn-outline-info" href="#navbar-header">Assignment</a>
                            </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="box-shadow: 0px 14px 18px 0 aqua, 0 16px 20px 0 rgba(0, 0, 0, 0.19);">Claimant</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#ca">Attorney</a>
                                    <a class="dropdown-item" href="#cv">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#ci">Insurance</a>
                                </div>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  btn btn-outline-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Insured</a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="#navbar-insured">Info</a>
                                    <a class="dropdown-item" href="#iatt">Attorney</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#ia">Automobile</a>                                   
                                                            </div>
                                    <li class="nav-item">
                                    <a class="nav-link  btn btn-outline-info" href="#loss">Loss</a>
                                    </li>
                            </ul>
                            </nav>
                            <hr>
                            <h5>Rendering Form Scope -- {<i class="fa fa-codepen" style="color:aqua;font-size:15px"></i>} </h5>
        <h1><span style="color:aqua">{</span>Claimant Entry<span style="color:aqua">}</span></h1>
        
               <hr>
            
<br>
<div class="row">   <!--Claimant ROW-->
    

    <div class="col-lg-6"><!--Claimant Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Claimant Name</label>
    
            <div class="col-lg-9"><input value="<?php echo $row['claimant_name'];?>" type="text" placeholder="Maiden" class="form-control" name="claimant_name"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Claimant-Phone</label>
    
            <div class="col-lg-9"><input value="<?php echo $row['claimaint_phone'];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="claimant_phone">
            </div>
           
            
        </div>

    </div>
       
    <div class="col-lg-6"><!--Claimant Rep Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">CL-DOB</label>
    
        <div class="col-lg-3"><input value="<?php echo $row['claimant_dob'];?>"  type="text"  placeholder="Birth-Day" class="form-control" name="claimant_dob"> <span class="form-text m-b-none"><hr></span>
        </div>

        <label class="col-lg-3 col-form-label">CL-Social</label>
    
        <div class="col-lg-3"><input value="<?php echo $row['claimant_ssn'];?>" type="Password" placeholder="SSN" class="form-control" name="claimant_ssn" > <span class="form-text m-b-none"><hr></span>
        </div>

            </div>
            <div class="row"><label class="col-lg-3 col-form-label">Email</label>
        
                <div class="col-lg-9"><input value="<?php echo $row['claimant_emmail'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="claimant_email"> 
                </div>

            </div>
        </div>
    </div> <!--Claimant Row end-->


<h5>Extending Form_Scope Array -- {<i class="fa fa-codepen" style="color:aqua;font-size:15px"></i>} </h5>
<div class="row">   <!--Claimant ROW-->
    
    <div class="col-lg-6"><!--Claimant Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">CL- Address</label>   

            <div class="col-lg-9"><input value="<?php echo $row['claimant_address'];?>" type="text" placeholder="Address" class="form-control" name="claimant_address"><span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Email</label>
   
            <div class="col-lg-9"><input value="<?php echo $row['claimant_email'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="claimant_email">
             </div> 

            
        </div>
    </div>   
</div>


<hr>
        <div class="row"> 
            <h2 id="ca"><span style="color:aqua"><b>Claimant</b></span> Attorney</h2>    
        </div>
<hr>

<div class="row">   <!--Claimant ATT ROW-->
     
    <div class="col-lg-6"><!--Claimant ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Att-Name</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['claimant_att_name'];?>" type="text" placeholder="Name" class="form-control" name="claimant_att_name"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Att-Phone</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['claimant_att_phone'];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="claimant_att_phone">
            </div>

        </div>
    </div>
    

    <div class="col-lg-6"><!--Claimant ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Att-Fax</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['claimant_att_fax'];?>" type="text" placeholder="Fax" class="form-control" name="claimant_att_fax"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Att-Email</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['claimant_att_email'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="claimant_att_email">
            </div>

        </div>
    </div>
</div>
<hr>
<div class="row">
        <div class="col-lg-6"><!--Claimant ATT Info-->
    
            <div class="row"><label class="col-lg-3 col-form-label">Att-Address</label>
            
                <div class="col-lg-9"><input value="<?php echo $row['claimant_att_address'];?>" type="text" placeholder="Name" class="form-control" name="claimant_att_address"> <span class="form-text m-b-none"><hr></span>
                </div>
    
            </div>
            <div class="row"><label class="col-lg-3 col-form-label">Function</label>
            
                <div class="col-lg-9"><input value="<?php echo $row[''];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="">
                </div>
    
            </div>
        </div>
</div>



<hr>
<div class="row"> 
    <h2 id='cv'><span style="color:aqua"><b> Claimant </b></span>Vehicle</h2>    
</div> 
<hr>


<div class="row">   <!--Claimant Auto ROW-->    
    <div class="col-lg-6"><!--Claimant Auto  Info-->    
        <div class="row"><label class="col-lg-3 col-form-label">Maker and Model</label>
         
             <div class="col-lg-9"><input value="<?php echo $row['claimant_auto'];?>" type="text" placeholder="Name" class="form-control" name="claimant_auto"> <span class="form-text m-b-none"><hr></span>
             </div>

         </div>
         <div class="row"><label class="col-lg-3 col-form-label">Opertator:</label>
         
             <div class="col-lg-9"><input value="<?php echo $row['claimant_auto_driver'];?>" style="color:blue" type="text" placeholder="Opertator" class="form-control" name="claimant_auto-driver">
             </div>
 
         </div>
    </div>
     
 
    <div class="col-lg-6"><!--Claimant ATT Info--> 

         <div class="row"><label class="col-lg-3 col-form-label">Owner:</label>
         
             <div class="col-lg-9"><input value="<?php echo $row['claimant_auto-owner'];?>" type="text" placeholder="Name" class="form-control" name="claimant_auto-owner"> <span class="form-text m-b-none"><hr></span>
             </div>
 
         </div>

         <div class="row"><label class="col-lg-3 col-form-label">Damage-Est</label>
         
             <div class="col-lg-9"><input value="<?php echo $row[''];?>" style="color:blue" type="text" placeholder="Estimate" class="form-control" name="">
             </div>
 
         </div>

    </div>
</div><!--Claimant Auto End-->
<hr>
<h3><span style="color:green"><b>Claimant</b></span>



<span style="color:blue"><b>Insurance Carrier</b></span></h3>
 <hr>
        <div class="row">
            <div class="col-lg-6"><!--Claimant ATT Info-->
        
                <div class="row"><label class="col-lg-3 col-form-label">Insurance Carrier</label>
                
                    <div class="col-lg-9"><input value="<?php echo $row['claimant_insuracne_carrier'];?>" type="text" placeholder="Compnay Title" class="form-control" name="claimant_insuracne_carrier"> <span class="form-text m-b-none"><hr></span>
                    </div>
        
                </div>
                <div class="row"><label class="col-lg-3 col-form-label">Policy Number :</label>
                
                    <div class="col-lg-9"><input value="<?php echo $row['claimant_insuracne_policy'];?>" style="color:blue" type="text" placeholder="Insurance Policy" class="form-control" name="claimant_insuracne_policy">
                    </div>
        
                </div>

            </div>
            <div class="col-lg-6"><!--Claimant ATT Info-->
            
                <div class="row"><label class="col-lg-3 col-form-label">Insurance Contact</label>
            
                    <div class="col-lg-9"><input value="<?php echo $row['claimant_insurance_contact'];?>" type="text" placeholder="Compnay Title" class="form-control" name="claimant_insurance_contact"> <span class="form-text m-b-none"><hr></span>
                    </div>

                </div>
                <div class="row"><label class="col-lg-3 col-form-label"> PDF :</label>
            
                    <div class="col-lg-9"><input value="<?php echo $row[''];?>" style="color:blue" type="button" value="Upload-Proof of Insurace" class="form-control" name="">
                    </div>

                </div>

            </div>
        </div>
        <hr>
        
        
        <nav id="navbar-insured" class="navbar navbar-light bg-light" style="box-shadow: 0px 14px 18px 0 aqua, 0 16px 20px 0 rgba(0, 0, 0, 0.19);background-image:linear-gradient(to right, grey, black, black);border-radius:18px;font-size:9px">
                            <a class="navbar-brand" href="#"></a>
                            <ul class="nav nav-pills">
                            <li class="nav-item">
                            <a class="nav-link   btn btn-outline-info"   href="#">Assignment</a>
                            </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  btn btn-outline-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Claimant</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#navbar-claimant">Claimant Main</a>
                                    <a class="dropdown-item" href="#cv">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#ci">Attorney</a>
                                </div>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">Insured</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#navbar-insured">Info</a>
                                    <a class="dropdown-item" href="#ia">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#iatt">Attorney</a>
                                            </div>
                                    <li class="nav-item">
                                    <a class="nav-link  btn btn-outline-info"  href="#loss">Loss</a>
                                    </li>
                            </ul>
                            </nav>

                        <hr>
                            <h5>Rendering Form Scope -- {<i class="fa fa-codepen" style="color:aqua;font-size:15px"></i>} </h5>
        <h1><span style="color:aqua">{</span>Insured Enrty<span style="color:aqua">}</span></h1>
        
               <hr>
<div class="row">   <!--ins ROW-->


<div class="col-lg-6"><!--ins Info-->

<div class="row"><label class="col-lg-3 col-form-label"><span>Insured Name</span></label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_name'];?>" type="text" placeholder="Maiden" class="form-control" name="ins_name"> <span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Ins-Phone</label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_phone'];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="ins_phone">
    </div>
   
    
</div>

</div>

<div class="col-lg-6"><!--ins Rep Info-->

<div class="row"><label class="col-lg-3 col-form-label">Ins-DOB</label>

<div class="col-lg-3"><input value="<?php echo $row['ins_dob'];?>"  type="text"  placeholder="Birth-Day" class="form-control" name="ins_dob"> <span class="form-text m-b-none"><hr></span>
</div>

<label class="col-lg-3 col-form-label">Ins-Social</label>

<div class="col-lg-3"><input value="<?php echo $row['ins_ssn'];?>" type="Password" placeholder="SSN" class="form-control" name="ins_ssn" > <span class="form-text m-b-none"><hr></span>
</div>

    </div>
    <div class="row"><label class="col-lg-3 col-form-label">Ins-Email</label>

        <div class="col-lg-9"><input value="<?php echo $row['ins_email'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="ins_email"> 
        </div>

    </div>
</div>
</div> <!--ins Row end-->


<h1>-</h1>
<div class="row">   <!--ins ROW-->

<div class="col-lg-6"><!--ins Info-->

<div class="row"><label class="col-lg-3 col-form-label">Ins- Address</label>   

    <div class="col-lg-9"><input value="<?php echo $row['ins_address'];?>" type="text" placeholder="Address" class="form-control" name="ins_address"><span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Email</label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_email'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="ins_email">
     </div> 

    
</div>
</div>   
</div>


<hr>
<div class="row" style="back-ground"> 
    <h2 id="iatt"><span style="color:yellow"><b>Insured</b></span> Attorney</h2>    
</div>
<hr>

<div class="row">   <!--ins ATT ROW-->

<div class="col-lg-6"><!--ins ATT Info-->

<div class="row"><label class="col-lg-3 col-form-label">Att-Name</label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_att_name'];?>" type="text" placeholder="Name" class="form-control" name="ins_att_name"> <span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Att-Phone</label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_att_phone'];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="ins_att_phone">
    </div>

</div>
</div>


<div class="col-lg-6"><!--ins ATT Info-->

<div class="row"><label class="col-lg-3 col-form-label">Att-Fax</label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_att_fax'];?>" type="text" placeholder="Fax" class="form-control" name="ins_att_fax"> <span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Att-Email</label>

    <div class="col-lg-9"><input value="<?php echo $row['ins_att_email'];?>" style="color:blue" type="text" placeholder="Email" class="form-control" name="ins_att_email">
    </div>

</div>
</div>
</div>
<hr>
<div class="row">
<div class="col-lg-6"><!--ins ATT Info-->

    <div class="row"><label class="col-lg-3 col-form-label">Att-Address</label>
    
        <div class="col-lg-9"><input value="<?php echo $row['ins_att_address'];?>" type="text" placeholder="Name" class="form-control" name="ins_att_address"> <span class="form-text m-b-none"><hr></span>
        </div>

    </div>
    <div class="row"><label class="col-lg-3 col-form-label">Function</label>
    
        <div class="col-lg-9"><input value="<?php echo $row[''];?>" style="color:blue" type="text" placeholder="Phone #" class="form-control" name="">
        </div>

    </div>
</div>
</div>



<hr>
<div class="row"> 
<h2 id="ia"><span style="color:yellow"><b>Insured</b></span> Vehicle</h2>    
</div>
<hr>


<div class="row">   <!--ins Auto ROW-->    
<div class="col-lg-6"><!--ins Auto  Info-->    
<div class="row"><label class="col-lg-3 col-form-label">Maker and Model</label>
 
     <div class="col-lg-9"><input value="<?php echo $row['ins_auto'];?>" type="text" placeholder="Name" class="form-control" name="ins_auto"> <span class="form-text m-b-none"><hr></span>
     </div>

 </div>
 <div class="row"><label class="col-lg-3 col-form-label">Opertator:</label>
 
     <div class="col-lg-9"><input value="<?php echo $row['ins_auto_driver'];?>" style="color:blue" type="text" placeholder="Opertator" class="form-control" name="ins_auto_driver">
     </div>

 </div>
</div>


<div class="col-lg-6"><!--ins ATT Info--> 

 <div class="row"><label class="col-lg-3 col-form-label">Owner:</label>
 
     <div class="col-lg-9"><input value="<?php echo $row['ins_auto_owner'];?>" type="text" placeholder="Name" class="form-control" name="ins_auto-owner"> <span class="form-text m-b-none"><hr></span>
     </div>

 </div>

 <div class="row"><label class="col-lg-3 col-form-label">Damage-Est</label>
 
     <div class="col-lg-9"><input value="<?php echo $row[''];?>" style="color:blue" type="text" placeholder="Estimate" class="form-control" name="">
     </div>

 </div>

</div>
</div><!--ins Auto End-->
<hr>
<h3 id="ii"><span style="color:yellow"><b>Insured</b></span>



<span style="color:blue"><b>Insurance Carrier</b></span></h3>
<hr>
<div class="row">
    <div class="col-lg-6"><!--ins ATT Info-->

        <div class="row"><label class="col-lg-3 col-form-label">Insurance Carrier</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['ins_insurance_carrier'];?>" type="text" placeholder="Company Title" class="form-control" name="ins_insurance_carrier"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Policy Number :</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['ins_insuracne_policy'];?>" style="color:blue" type="text" placeholder="Insurance Policy" class="form-control" name="ins_insuracne_policy">
            </div>

        </div>

    </div>
    <div class="col-lg-6"><!--ins ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Insurance Contact</label>
    
            <div class="col-lg-9"><input value="<?php echo $row['ins_insurance_contact'];?>" type="text" placeholder="Company Title" class="form-control" name="ins_insurance_contact"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label"> PDF :</label>
    
            <div class="col-lg-9"><input value="<?php echo $row[''];?>" style="color:blue" type="button" value="Upload-Proof of Insurace" class="form-control" name="">
            </div>

        </div>

    </div>
</div>
<hr>
        
        
        <nav id="loss" class="navbar navbar-light bg-light" style="box-shadow: 0px 14px 18px 0 aqua, 0 16px 20px 0 rgba(0, 0, 0, 0.19);background-image:linear-gradient(to right, grey, black, black);border-radius:18px;font-size:9px">
                            <a class="navbar-brand" href="#">  </a>
                            <ul class="nav nav-pills">
                            <li class="nav-item">
                            <a class="nav-link  btn btn-outline-info"   href="#">Assignment</a>
                            </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  btn btn-outline-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Claimant</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#navbar-claimant">Claimant Main</a>
                                    <a class="dropdown-item" href="#cv">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#ci">Attorney</a>
                                </div>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle  btn btn-outline-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Insured</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#navbar-insured">Info</a>
                                    <a class="dropdown-item" href="#ia">Automobile</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#iatt">Attorney</a>
                                            </div>
                                    <li class="nav-item">
                                    <a class="nav-link btn-light"  href="#loss" style=" box-shadow: 0 5px 9px 0 aqua, 0 6px 23px 0 rgba(0, 0, 0, 0.19);">Loss</a>
                                    </li>
                                 
                            </ul>
                            </nav>

       <hr>


<span style="color:blue"><b>Loss-Report</b></span></h3>
<hr>
<div class="row">
    <div class="col-lg-6"><!--ins ATT Info-->

        <div class="row"><label class="col-lg-3 col-form-label">Loss Date :</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['loss_date'];?>" type="date" placeholder="Loss-Date" class="form-control" name="loss_date"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Time :</label>
        
            <div class="col-lg-9"><input value="<?php echo $row['loss_time'];?>" style="color:blue" type="time" placeholder="Loss-Time" class="form-control" name="loss_time">
            </div>

        </div>

    </div>
    <div class="col-lg-6"><!--ins ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Description Of Loss</label>
    
            <div class="col-lg-9"><input value="<?php echo $row['floss_description'];?>" type="text" placeholder="Description" class="form-control" name="loss_description"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label"> Location : </label>
    
            <div class="col-lg-9"><input value="<?php echo $row['loss_location'];?>" style="color:blue" type="text"  class="form-control" name="loss_location">
            </div>

        </div>
        <hr>
      
                    
    </div>
</div>
<hr>
<button class="btn btn-info " type="submit" value="Upddate">Save</button>
<hr>



</div></div>
</div>
</div>








    </form>






<form id="form1">
        <div style="display:none" id="dvContainer">
            <div>
               <h1 style="text-align:center">Assignment Report</h1> <br>
               <h5>Assignment: <?php echo $row['id']; ?>  Date Created: <?php echo $row['ass_date']; ?>  </h5>
            </div>
         <hr>
            <div style="text-align:center">
    
            <h4>Company Information</h4>
            
            </div>
            <hr>
    <div>
        
            <div style="width:25%;float:left">
                <h6>Company File Numnber:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>: <?php echo $row['file_number']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>Client Rep</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>: <?php echo $row['con_name']; ?></h6>
            </div>
       
    </div>
    
    <div>
        
            <div style="width:25%;float:left">
                <h6>Company Name:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>:<?php echo $row['client_name']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>Client Number</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>: <?php echo $row['file_number']; ?></h6>
            </div>
       
    </div>
    
    <div>
        
            <div style="width:25%;float:left">
                <h6>Address:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>: <?php echo $row['con_address']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>Catagorey:</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>: <?php echo $row['ass_catagory']; ?></h6>
            </div>
       
    </div>
    <div>
        
            <div style="width:25%;float:left">
                <h6>Adjuster:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>: <?php echo $row['con_name']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>Adjusters Phone (Ext):</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>Phone: <?php echo $row['con_number']; ?> Ext </h6>
            </div>
       
    </div>
    <hr>
        <div style="text-align:center">
    
            <h4>Insured Information</h4>
            
            </div>
            <hr>
            <br>
    <div>
        
            <div style="width:25%;float:left">
                <h6>Insured Name:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>: <?php echo $row['ins_name']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>Date Of Birth:</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>: <?php echo $row['claimant_dob']; ?></h6>
            </div>
       
    </div>
    
    <div>
        
            <div style="width:25%;float:left">
                <h6>Address:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>: <?php echo $row['ins_address']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>SSN:</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>: <?php echo $row['']; ?></h6>
            </div>
       
    </div>
    
    
    <div>
        
            <div style="width:25%;float:left">
                <h6>Contact:</h6>
            </div>
            <div style="width:25%;float:left">
                <h6>: <?php echo $row['']; ?></h6>
            </div>
            <div style="width:25%;float:left">
                <h6>Contact Phone:</h6>
            </div>
            <div style="width:25%;float:left">
               <h6>: <?php echo $row['ins_number']; ?></h6>
            </div>
       
    </div>
    <hr>
    <h5>Insured Automobile Information <i class="fa fa-car"></i></h5>
     
    <div>
        
        <div style="width:25%;float:left">
            <h6> Vehicle Description:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['ins_auto']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Owner:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['ins_auto_driver']; ?></h6>
        </div>
    
    </div>
    <div>
        
        <div style="width:25%;float:left">
            <h6>Operator:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['ins_auto_driver']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Notes:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['']; ?></h6>
        </div>
    
    </div>
     <hr>
     <hr>
     <hr>
         <div>
               <h1 style="text-align:center">Loss Information</h1> <br>
      
            </div>
            <hr>
            <div>
        
        <div style="width:25%;float:left">
            <h6> Loss Time:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['loss_time']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Loss Date:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['loss_date']; ?></h6>
        </div>
    
    </div>
    <div>
        
        <div style="width:25%;float:left">
            <h6>Location:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['loss_location']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Description:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['loss_description']; ?></h6>
        </div>
    
    </div>
    <hr>
         <div>
               <h1 style="text-align:center">Claimant Information</h1> <br>
      
            </div>
            <div>
            <hr>
        <div style="width:25%;float:left">
            <h6>Claimant Name:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['claimant_name']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Date of Birth:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['claimant_dob']; ?></h6>
        </div>
    
    </div>
    <div>
        
        <div style="width:25%;float:left">
            <h6>Phone:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Address:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['claimant_address']; ?></h6>
        </div>
    
    </div> 
    <hr>
    <h5>Insured Automobile Information <i class="fa fa-car"></i></h5>
     
    <div>
        
        <div style="width:25%;float:left">
            <h6> Vehicle Description:</h6>
        </div>
        <div style="width:25%;float:left">
              <h6>: <?php echo $row['claimant_auto']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Owner:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['claimant_auto_owner']; ?></h6>
        </div>
    
    </div>
    <div>
        
        <div style="width:25%;float:left">
            <h6>Operator:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>Notes:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['file_number']; ?></h6>
        </div>
    
    </div>
    <div>
        
        <div style="width:25%;float:left">
            <h6>Insurance Carrier:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>
                Policy Number:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['']; ?></h6>
        </div>
    
    </div>
    
    <div>
        
        <div style="width:25%;float:left">
            <h6>Contact Number:</h6>
        </div>
        <div style="width:25%;float:left">
            <h6>: <?php echo $row['']; ?></h6>
        </div>
        <div style="width:25%;float:left">
            <h6>
                EXTr:</h6>
        </div>
        <div style="width:25%;float:left">
           <h6>: <?php echo $row['']; ?></h6>
        </div>
    
    </div>
    <hr>
      <div>
               <h1 style="text-align:center">Attorney Information</h1> <br>
      
            </div>
    <hr>
            <div>
        
        <div style="width:20%;float:left">
            <h6>Attorney Name:</h6>
        </div>
        <div style="width:20%;float:left">
            <h6>: <?php echo $row['claimant_att']; ?></h6>
        </div>
        <div style="width:20%;float:left">
            <h6>
                Number  : <?php echo $row['claimant_att_number']; ?></h6>
        </div>
        <div style="width:20%;float:left">
           <h6></h6>
        </div>
        <div style="width:20%;float:left">
           <h6>Address: <?php echo $row['claimant_att_address']; ?></h6>
        </div>
    
    </div>
    <hr>
      <div>
               <h1 style="text-align:center">Medical Information</h1> <br>
      
            </div>
    <hr>
            <div>
        
        <div style="width:20%;float:left">
            <h6>Doctor Name:</h6>
        </div>
        <div style="width:20%;float:left">
            <h6>: <?php echo $row['claimant_doctor']; ?></h6>
        </div>
        <div style="width:20%;float:left">
            <h6>
                Number  : <?php echo $row['claimant_doctor_number']; ?></h6>
        </div>
        <div style="width:20%;float:left">
           <h6></h6>
        </div>
        <div style="width:20%;float:left">
           <h6>Address: <?php echo $row['']; ?></h6>
        </div>
    
    </div>
    
      <div>
               <h1 style="text-align:center">Witness Information</h1> <br>
      
            </div>
    <hr>
            <div>
        
        <div style="width:20%;float:left">
            <h6>Witness Name:</h6>
        </div>
        <div style="width:20%;float:left">
            <h6>: <?php echo $row['']; ?></h6>
        </div>
        <div style="width:20%;float:left">
            <h6>
                Number  : <?php echo $row['']; ?></h6>
        </div>
        <div style="width:20%;float:left">
           <h6></h6>
        </div>
        <div style="width:20%;float:left">
           <h6>Address: <?php echo $row['']; ?></h6>
        </div>
    
    </div>
    
        </div>
    
        </form>
 
    <script>
         $(document).ready(function(){
    
             var updateOutput = function (e) {
                 var list = e.length ? e : $(e.target),
                         output = list.data('output');
                 if (window.JSON) {
                     output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                 } else {
                     output.val('JSON browser support required for this demo.');
                 }
             };
             // activate Nestable for list 1
             $('#nestable').nestable({
                 group: 1
             }).on('change', updateOutput);
    
             // activate Nestable for list 2
             $('#nestable2').nestable({
                 group: 1
             }).on('change', updateOutput);
    
             // output initial serialised data
             updateOutput($('#nestable').data('output', $('#nestable-output')));
             updateOutput($('#nestable2').data('output', $('#nestable2-output')));
    
             $('#nestable-menu').on('click', function (e) {
                 var target = $(e.target),
                         action = target.data('action');
                 if (action === 'expand-all') {
                     $('.dd').nestable('expandAll');
                 }
                 if (action === 'collapse-all') {
                     $('.dd').nestable('collapseAll');
                 }
             });
         });
    </script>
       <?php
           }
            mysqli_close($con);
           ?>                     
        