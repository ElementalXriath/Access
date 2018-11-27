<?php include 'templatesVEO/header.php'; ?>
<body>


    
              
                    <?php require_once 'templates/message.php'; ?>

        <form method="post" action="insert.php">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">
                <input class="navbar-brand btn btn-info" style="background-color: aqua" type="submit" value="insert">
                
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right text-center">
                        <li style="color:grey"><a class="nav-link page-scroll" href="#page-top"> <i class="fa fa-eject fa-2x"></i><br /> Top </a></li>
                        <li><a class="nav-link page-scroll" href="#features"><i class="fa fa-cube fa-2x"></i><br />Assignment Info</a></li>
                        <li><a class="nav-link page-scroll" href="#whyus"><i class="fa fa-user-o fa fa-2x"> </i><br />Client-Entry</a></li>
                        <li><a class="nav-link page-scroll" href="#claimant"><i class="fa fa-child fa fa-2x"> </i><br />Claimant-Entry</a></li>
                        <li><a class="nav-link page-scroll" href="#insured"><i class="fa fa-id-badge fa fa-2x"> </i><br />Insured-Enrty</a></li>
                        <li><a class="nav-link page-scroll" href="#loss"><i class="fa fa-car fa fa-2x"> </i><br />Loss-Info</a></li>                      
                     
                        
                
                    </ul>
                </div>
            </div>
        </nav>
</div>

<section class="black-bg rounded col-md-12">
 <hr>
 <hr><hr>

<br>
 <h5 style="color: aqua" id="mdo">Assignment-Form Progression : 12% /  Missing Fields 42 / Total 51 <a style='color: greenyellow' href="">Whats Missing?</a></h5>
 <div class="progress gray-bg" style="background-image:linear-gradient(to right, grey, black, aqua);box-shadow: 0px 14px 18px 0 whitesmoke, 0 16px 20px 0 rgba(0, 0, 0, 0.19);">
     <div class="progress-bar progress-bar-striped progress-bar-info" style="width: 12%;" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
 </div>
<hr><hr>
<hr>
</section>

<br><br><br>

    
<section id="features" class="gray-section"  style="background-image:linear-gradient(to right, white, whitesmoke, whitesmoke, white);box-shadow: 2px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);">
       
                <hr>
              
        <div class="navy-line"></div>    
    <div class="container">
                     
            <div class="row"> 
                <h1><i class="fa fa-cube fa-2x"> </i>  Assignment <span style="color:aqua"> {<b> Details </b>}</span></h1>    
            </div>
        <hr>
        <div class="row">
         
        </div>
       
      
            
            <hr>
            <div class="navy-line"></div>
        </div>

</section>


<section id="whyus"  class="gray-section features active" style="background-image:linear-gradient(to right, white, whitesmoke, whitesmoke, white);box-shadow: 2px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);"><!-- MAIN INFO-->
    <hr>
    <div class="navy-line">
        
    </div>    
        <div class="container">
                       
    <div class="row"> 
            <h1><i class="fa fa-cube fa-2x"> </i>  Assignment <span style="color:aqua"> {<b> Clients </b>}</span></h1>     
    </div><hr>
 

        <div class="row">   <!--Company ROW-->
    
    

            <div class="col-lg-6"><!--Company Info-->
            
            <div class="row"><label class="col-lg-3 col-form-label">Company</label>
            <div class="col-lg-9"><input type="text" placeholder="Company" class="form-control" name="client_name"> <span class="form-text m-b-none"><hr></span>
            </div>
            </div>
            
            <div class="row"><label class="col-lg-3 col-form-label">File-Number</label>
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Clients File Number" class="form-control" name="file_number"></div>
            </div>
            </div>
            
            <hr>
            
            
            
            
            
            
            <div class="col-lg-6"><!--Company Info-->
            
            <div class="row"><label class="col-lg-3 col-form-label">Date</label>
            
            <div class="col-lg-3"><input id="" type="date"  placeholder="Date" class="form-control" name="ass_date"> <span class="form-text m-b-none"><hr></span>
            </div>
            <label class="col-lg-3 col-form-label">Jurisdiction</label>
            
            <div class="col-lg-3"><input type="Name" placeholder="State" class="form-control" name="ass_jr"> <span class="form-text m-b-none"><hr></span>
            </div>
            </div>
            
            
            <div class="row"><label class="col-lg-3 col-form-label">Client Type</label>
            
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Client-Type" class="form-control" name="client_type"></div>
            </div>
            </div>
            </div>
            <hr>
            <div class="row">
            
            
            <div class="col-lg-6"><!--Company Info-->
            
            
            
            
            <div class="row"><label class="col-lg-3 col-form-label">Catagory</label>
            
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="" class="form-control" name="ass_catagory"></div>
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
                
                <div class="col-lg-9"><input type="text" placeholder="Rep-Name" class="form-control" name="con_name"> <span class="form-text m-b-none"><hr></span>
                </div>
                </div>
                <div class="row"><label class="col-lg-3 col-form-label">Rep-Fax</label>
                
                <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Fax" class="form-control" name="con_fax"></div>
                </div>
                </div>
                
                
                
                
                
                
                
                <div class="col-lg-6"><!--Client Rep Info-->
                
                    <div class="row"><label class="col-lg-3 col-form-label">Phone</label>
                    
                    <div class="col-lg-3"><input type="text"  placeholder="Phone" class="form-control" name="con_phone"> <span class="form-text m-b-none"><hr></span>
                    </div>
                    <label class="col-lg-3 col-form-label">EXT.</label>
                    
                    <div class="col-lg-3"><input type="Name" placeholder="Ext." class="form-control" name="con_ext"> <span class="form-text m-b-none"><hr></span>
                    </div>
                    </div>
                    
                    
                    <div class="row"><label class="col-lg-3 col-form-label">Rep-Email</label>
                    
                        <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="con_email">
                        </div>
                    </div>
                </div>
            
                
            </div>
            
            
               </div> 
            <hr>
                    
            <div class="navy-line"></div>
</section>

<section id="claimant" class="gray-section claimant" style="background-image:linear-gradient(to right, white, whitesmoke, whitesmoke, white);box-shadow: 2px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);"><!--CLAIMANT-->

     <hr>
     <div class="navy-line"></div>  
   <div class="container">
               

                     
                  <h1><i class="fa fa-cube fa-2x"> </i>  Assignment <span style="color:aqua"> {<b>Cliamant Details </b>}</span></h1>   
        
               <hr>
            
<br>
<div class="row">   <!--Claimant ROW-->
    

    <div class="col-lg-6"><!--Claimant Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Claimant Name</label>
    
            <div class="col-lg-9"><input type="text" placeholder="Birth Name" class="form-control" name="claimant_name"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Claimant-Phone</label>
    
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Phone #" class="form-control" name="claimant_phone">
            </div>
           
            
        </div>

    </div>
       
    <div class="col-lg-6"><!--Claimant Rep Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">CL-DOB</label>
    
        <div class="col-lg-3"><input  type="text"  placeholder="Date of Birth" class="form-control" name="claimant_dob"> <span class="form-text m-b-none"><hr></span>
        </div>

        <label class="col-lg-3 col-form-label">CL-Social</label>
    
        <div class="col-lg-3"><input type="Password" placeholder="Social" class="form-control" name="claimant_ssn" > <span class="form-text m-b-none"><hr></span>
        </div>

            </div>
            <div class="row"><label class="col-lg-3 col-form-label">Email</label>
        
                <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="claimant_email"> 
                </div>

            </div>
        </div>
    </div> <!--Claimant Row end-->

<hr>
<div class="row">   <!--Claimant ROW-->
    
    <div class="col-lg-6"><!--Claimant Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">CL- Address</label>   

            <div class="col-lg-9"><input type="text" placeholder="Address" class="form-control" name="claimant_address"><span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Email</label>
   
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="claimant_email">
             </div> 

            
        </div>
    </div>   
</div>


<hr>
        <div class="row"> 
            <h3 id="ca"><span style="color:aqua"><b>Claimant</b></span> Attorney</h3>    
        </div>
<hr>

<div class="row">   <!--Claimant ATT ROW-->
     
    <div class="col-lg-6"><!--Claimant ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Att-Name</label>
        
            <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="claimant_att_name"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Att-Phone</label>
        
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Phone #" class="form-control" name="claimant_att_phone">
            </div>

        </div>
    </div>
    

    <div class="col-lg-6"><!--Claimant ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Att-Fax</label>
        
            <div class="col-lg-9"><input type="text" placeholder="Fax" class="form-control" name="claimant_att_fax"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Att-Email</label>
        
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="claimant_att_email">
            </div>

        </div>
    </div>
</div>
<hr>
<div class="row">
        <div class="col-lg-6"><!--Claimant ATT Info-->
    
            <div class="row"><label class="col-lg-3 col-form-label">Att-Address</label>
            
                <div class="col-lg-9"><input type="text" placeholder="Address" class="form-control" name="claimant_att_address"> <span class="form-text m-b-none"><hr></span>
                </div>
    
            </div>
            <div class="row"><label class="col-lg-3 col-form-label">Letter From Attorney</label>
            
                <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Phone #" class="form-control" name="">
                </div>
    
            </div>
        </div>
</div>



<hr>
<div class="row"> 
    <h3 id='cv'><span style="color:aqua"><b> Claimant </b></span>Vehicle</h3>    
</div> 
<hr>


<div class="row">   <!--Claimant Auto ROW-->    
    <div class="col-lg-6"><!--Claimant Auto  Info-->    
        <div class="row"><label class="col-lg-3 col-form-label">Maker and Model</label>
         
             <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="claimant_auto"> <span class="form-text m-b-none"><hr></span>
             </div>

         </div>
         <div class="row"><label class="col-lg-3 col-form-label">Opertator:</label>
         
             <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Name" class="form-control" name="claimant_auto-driver">
             </div>
 
         </div>
    </div>
     
 
    <div class="col-lg-6"><!--Claimant ATT Info--> 

         <div class="row"><label class="col-lg-3 col-form-label">Owner:</label>
         
             <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="claimant_auto-owner"> <span class="form-text m-b-none"><hr></span>
             </div>
 
         </div>

         <div class="row"><label class="col-lg-3 col-form-label">Damage-Est</label>
         
             <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Estimate" class="form-control" name="">
             </div>
 
         </div>

    </div>
</div><!--Claimant Auto End-->
<hr>
<h3><span style="color:aqua"><b>Claimant</b></span>



<span style="color:red"><b>Insurance Carrier</b></span></h3>
 <hr>
        <div class="row">
            <div class="col-lg-6"><!--Claimant ATT Info-->
        
                <div class="row"><label class="col-lg-3 col-form-label">Insurance Carrier :</label>
                
                    <div class="col-lg-9"><input type="text" placeholder="Compnay Title" class="form-control" name="claimant_insuracne_carrier"> <span class="form-text m-b-none"><hr></span>
                    </div>
        
                </div>
                <div class="row"><label class="col-lg-3 col-form-label">Policy Number :</label>
                
                    <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Insurance Policy" class="form-control" name="claimant_insuracne_policy">
                    </div>
        
                </div>

            </div>
            <div class="col-lg-6"><!--Claimant ATT Info-->
            
                <div class="row"><label class="col-lg-3 col-form-label">Insurance Contact :</label>
            
                    <div class="col-lg-9"><input type="text" placeholder="Compnay Title" class="form-control" name="claimant_insurance_contact"> <span class="form-text m-b-none"><hr></span>
                    </div>

                </div>
                <div class="row"><label class="col-lg-3 col-form-label"> PDF :</label>
            
                    <div class="col-lg-9"><input style="color:blue" type="button" value="Upload-Proof of Insurace" class="form-control" name="">
                    </div>

                </div>

            </div>
        </div>
        <hr>
        
   </div>
</section>


 
<section id="insured" class="gray-section loss" style="background-image:linear-gradient(to right, white, whitesmoke, whitesmoke, white);box-shadow: 2px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);"> <!--Insured-->

    <hr>
    <div class="navy-line"></div>  
      <div class="container">
            <h1><i class="fa fa-cube fa-2x"> </i>  Assignment <span style="color:aqua"> {<b> Isnured Details </b>}</span></h1>   
        
               <hr>
<div class="row">   <!--ins ROW-->


<div class="col-lg-6"><!--ins Info-->

<div class="row"><label class="col-lg-3 col-form-label"><span>Insured Name</span></label>

    <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="ins_name"> <span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Ins-Phone</label>

    <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Phone #" class="form-control" name="ins_phone">
    </div>
   
    
</div>

</div>

<div class="col-lg-6"><!--ins Rep Info-->

<div class="row"><label class="col-lg-3 col-form-label">Ins-DOB</label>

<div class="col-lg-3"><input  type="text"  placeholder="Date of Birth" class="form-control" name="ins_dob"> <span class="form-text m-b-none"><hr></span>
</div>

<label class="col-lg-3 col-form-label">Ins-Social</label>

<div class="col-lg-3"><input type="Password" placeholder="SSN" class="form-control" name="ins_ssn" > <span class="form-text m-b-none"><hr></span>
</div>

    </div>
    <div class="row"><label class="col-lg-3 col-form-label">Ins-Email</label>

        <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="ins_email"> 
        </div>

    </div>
</div>
</div> <!--ins Row end-->


<h1>-</h1>
<div class="row">   <!--ins ROW-->

<div class="col-lg-6"><!--ins Info-->

<div class="row"><label class="col-lg-3 col-form-label">Ins- Address</label>   

    <div class="col-lg-9"><input type="text" placeholder="Address" class="form-control" name="ins_address"><span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Email</label>

    <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="ins_email">
     </div> 

    
</div>
</div>   
</div>


<hr>
<div class="row" style="back-ground"> 
    <h3 id="iatt"><span style="color:yellow"><b>Insured</b></span> Attorney</h3>    
</div>
<hr>

<div class="row">   <!--ins ATT ROW-->

<div class="col-lg-6"><!--ins ATT Info-->

<div class="row"><label class="col-lg-3 col-form-label">Att-Name</label>

    <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="ins_att_name"> <span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Att-Phone</label>

    <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Phone #" class="form-control" name="ins_att_phone">
    </div>

</div>
</div>


<div class="col-lg-6"><!--ins ATT Info-->

<div class="row"><label class="col-lg-3 col-form-label">Att-Fax</label>

    <div class="col-lg-9"><input type="text" placeholder="Fax" class="form-control" name="ins_att_fax"> <span class="form-text m-b-none"><hr></span>
    </div>

</div>
<div class="row"><label class="col-lg-3 col-form-label">Att-Email</label>

    <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Email" class="form-control" name="ins_att_email">
    </div>

</div>
</div>
</div>
<hr>
<div class="row">
<div class="col-lg-6"><!--ins ATT Info-->

    <div class="row"><label class="col-lg-3 col-form-label">Att-Address</label>
    
        <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="ins_att_address"> <span class="form-text m-b-none"><hr></span>
        </div>

    </div>
    <div class="row"><label class="col-lg-3 col-form-label">Function</label>
    
        <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Phone #" class="form-control" name="">
        </div>

    </div>
</div>
</div>



<hr>
<div class="row"> 
<h3 id="ia"><span style="color:yellow"><b>Insured</b></span> Vehicle</h3>    
</div>
<hr>


<div class="row">   <!--ins Auto ROW-->    
<div class="col-lg-6"><!--ins Auto  Info-->    
<div class="row"><label class="col-lg-3 col-form-label">Maker and Model</label>
 
     <div class="col-lg-9"><input type="text" placeholder="Model of Vehicle" class="form-control" name="ins_auto"> <span class="form-text m-b-none"><hr></span>
     </div>

 </div>
 <div class="row"><label class="col-lg-3 col-form-label">Opertator:</label>
 
     <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Opertator" class="form-control" name="ins_auto-driver">
     </div>

 </div>
</div>


<div class="col-lg-6"><!--ins ATT Info--> 

 <div class="row"><label class="col-lg-3 col-form-label">Owner:</label>
 
     <div class="col-lg-9"><input type="text" placeholder="Name" class="form-control" name="ins_auto-owner"> <span class="form-text m-b-none"><hr></span>
     </div>

 </div>

 <div class="row"><label class="col-lg-3 col-form-label">Damage-Est</label>
 
     <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Estimate" class="form-control" name="">
     </div>

 </div>

</div>
</div><!--ins Auto End-->
<hr>
<h3 id="ii"><span style="color:aqua"><b>Insured</b></span>



<span style="color:red"><b>Insurance Carrier</b></span></h3>
<hr>
<div class="row">
    <div class="col-lg-6"><!--ins ATT Info-->

        <div class="row"><label class="col-lg-3 col-form-label">Insurance Carrier</label>
        
            <div class="col-lg-9"><input type="text" placeholder="Company Title" class="form-control" name="ins_insuracne_carrier"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Policy Number :</label>
        
            <div class="col-lg-9"><input style="color:blue" type="text" placeholder="Insurance Policy" class="form-control" name="ins_insuracne_policy">
            </div>

        </div>

    </div>
    <div class="col-lg-6"><!--ins ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Insurance Contact</label>
    
            <div class="col-lg-9"><input type="text" placeholder="Inurance Rep" class="form-control" name="ins_insurance_contact"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label"> Proof Of Ownership :</label>
    
            <div class="col-lg-9"><input style="color:blue" type="button" value="Upload-Proof of Insurace" class="form-control" name="">
            </div>

        </div>

    </div>
</div>
</div>
<hr>

  
</section>

<section id="loss" class="timeline gray-section" style="background-image:linear-gradient(to right, white, whitesmoke, whitesmoke, white);box-shadow: 2px 14px 18px 0 grey, 0 16px 20px 0 rgba(0, 0, 0, 0.19);"><!--Loss-->

    <div class="navy-line"></div>
   <div class="container">
        <h1><i class="fa fa-cube fa-2x"> </i>  Assignment <span style="color:aqua"> {<b> Loss Details </b>}</span></h1>   
<hr>
<div class="row">
    <div class="col-lg-6"><!--ins ATT Info-->

        <div class="row"><label class="col-lg-3 col-form-label">Loss Date :</label>
        
            <div class="col-lg-9"><input type="date" placeholder="Loss-Date" class="form-control" name="loss_date"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Time :</label>
        
            <div class="col-lg-9"><input style="color:blue" type="time" placeholder="Loss-Time" class="form-control" name="loss_time">
            </div>

        </div>

    </div>
    <div class="col-lg-6"><!--ins ATT Info-->
    
        <div class="row"><label class="col-lg-3 col-form-label">Description Of Loss</label>
    
            <div class="col-lg-9"><input type="text" placeholder="Description" class="form-control" name="loss_description"> <span class="form-text m-b-none"><hr></span>
            </div>

        </div>
        <div class="row"><label class="col-lg-3 col-form-label">Loss Location : </label>
    
            <div class="col-lg-9"><input style="color:blue" type="text"  class="form-control" name="loss_location">
            </div>

        </div>
        <hr>
      
                    
    </div>
</div>
<hr>
   </div>

</section>


</form>
                   <?php include 'templatesVEO/footer.php'; ?>
  