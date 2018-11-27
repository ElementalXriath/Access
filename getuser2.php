

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

					
					    <h5>Assignment Number</h5>
							<input value="<?php echo $row['id'];?>"  type="text" class="form-control" name="data[assignment_id]" id="assignment_id" placeholder="Your File Number">
						<h5>Client File Number</h5>
							<input value="<?php echo $row['file_number'];?>"  type="text" class="form-control" name="data[company_file_number]" id="company_file_number" placeholder="Your File Number">
						<br>
						<h5>Attention</h5>
				
							<input value="<?php echo $row['client_name'];?>"  type="text" class="form-control" name="data[attention]" id="attention" placeholder="Attention...">
					
						<br>
						<h5>Date Of Loss</h5>
					
							<input value="<?php echo $row['loss_date'];?>"  type="text" class="form-control" name="data[dateofloss]" id="dateofloss" placeholder="Date of Loss">
							<br>
						<h5>Claimant Vrs Insured</h5>
					
							<input value="<?php echo $row['claimant_name'];?> VS <?php echo $row['ins_name'];?>"  type="text" class="form-control" name="data[cvi]" id="cvi" placeholder="CVI">

<?php
}
 mysqli_close($con);
?>                     
