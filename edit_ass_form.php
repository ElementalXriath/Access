
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

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM assignments_t1 WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

   
?>

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
<button class="btn btn-info " type="submit" value="Insert">Save</button>
<hr>



</div></div>
</div>
</div>








    </form>


<?php
}
 mysqli_close($con);
?>                     
