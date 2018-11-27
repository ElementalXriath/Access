
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
<h1><strong>Note-Book</strong> : Assignment Notes</h1>
<br>
<br>



                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                New Note
                            </button>
                        </div>



<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','smart_invoice_v1');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM notes WHERE assignment_id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {

   
?>

					
			<br>		  
<span>Note:<?php echo $row['date'];?></span><br>
<input value="<?php echo $row['note'];?>"  type="text" class="form-control" name="data[assignment_id]" id="assignment_id" placeholder="Add Note">
  
<form method="post" action="insertnote.php">
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-book modal-icon"></i>
                                            <h4 class="modal-title">Add Note</h4>
                                            <h5 class="font-bold">Assignment : <?php echo $q; ?></h5>
                                       
                
                                        </div>
                                        <div class="modal-body text-center">
                                        <?php 			
			                                $page = end( $url_arr );
			                            ?>
                                             <?php if(isset( $_SESSION['logged_in']) ) { ?>
                                      <h1>Author : 	<?php echo $_SESSION['first_name']; ?></h1>

                                        <div class="col-sm-12"><input type="text" value="" class="form-control" name="note"></div>
                                        <div class="col-md-3"><input type="hidden" value="TIMESTAMP" name="date"></div>
                                        <div class="col-md-3"><input type="hidden" value="<?php echo $q; ?>" name="assignment_id"></div>
                                        <div class="col-md-3"><input type="hidden" value="<?php echo $_SESSION['first_name']; ?>" name="author"></div>
                                  
         

                                        <?php }?>

                                        <br>
                                      
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" value="Insert" class="btn btn-primary">Save Note</button>
                                        </div>
                                    </div>
                                </div>
                            </div>	
</form>
<?php
}
 mysqli_close($con);
?>                     

