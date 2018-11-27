<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_invoice_v1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$client_name = $_POST['client_name'];
$client_type = $_POST['client_type'];
$file_number = $_POST['file_number'];
$ass_jr = $_POST['ass_jr'];
$ass_catagory = $_POST['ass_catagory'];
$ass_date = $_POST['ass_date'];
$con_name = $_POST['con_name'];
$con_phone = $_POST['con_phone'];
$con_fax = $_POST['con_fax'];
$con_ext = $_POST['con_ext'];
$con_email = $_POST['con_email'];
$con_address = $_POST['con_address'];
$ins_name = $_POST['ins_name'];
$ins_dob = $_POST['ins_dob'];
$ins_ssn = $_POST['ins_ssn'];
$ins_att = $_POST['ins_att'];
$ins_insuracne_carrier = $_POST['ins_insurance_carrier'];
$ins_insuracne_policy = $_POST['ins_insurance_policy'];
$ins_insuracne_contact = $_POST['ins_insurance_contact'];
$ins_att_phone = $_POST['ins_att_phone'];
$ins_att_email = $_POST['ins_att_email'];
$ins_att_address = $_POST['ins_att_address'];
$ins_number = $_POST['ins_number'];
$ins_auto = $_POST['ins_auto'];
$ins_auto_driver = $_POST['ins_auto_driver'];
$ins_auto_driver_number = $_POST['ins_auto_driver_number'];
$ins_auto_driver_email = $_POST['ins_auto_driver_email'];
$ins_auto_driver_address = $_POST['ins_auto_driver_address'];
$ins_email = $_POST['ins_email'];
$ins_address = $_POST['ins_address'];
$claimant_name = $_POST['claimant_name'];
$claimant_dob = $_POST['claimant_dob'];
$claimant_ssn = $_POST['claimant_ssn'];
$claimant_number = $_POST['claimant_number'];
$claimant_auto = $_POST['claimant_auto'];
$claimant_auto_owner  = $_POST['claimant_auto_owner'];
$claimant_auto_driver = $_POST['claimant_auto_driver'];
$claimant_insuracne_carrier = $_POST['claimant_insurance_carrier'];
$claimant_insuracne_policy = $_POST['claimant_insurance_policy'];
$claimant_insuracne_contact = $_POST['claimant_insurance_contact'];
$claimant_injury = $_POST['claimant_injury'];
$claimant_doctor = $_POST['claimant_doctor'];
$claimant_doctor_number  = $_POST['claimant_doctor_number'];
$claimant_att  = $_POST['claimant_att'];
$claimant_att_number  = $_POST['claimant_att_number'];
$claimant_att_email  = $_POST['claimant_auto_email'];
$claimant_att_address  = $_POST['claimant_auto_address'];
$claimant_email = $_POST['claimant_email'];
$claimant_address = $_POST['claimant_address'];
$loss_date = $_POST['loss_date'];
$loss_time = $_POST['loss_time'];
$loss_location = $_POST['loss_location'];
$loss_description = $_POST['loss_description'];
$sn_policenumber = $_POST['sn_policenumber'];
$sn_casenumber = $_POST['sn_casenumber'];
$sn_policelocation = $_POST['sn_policelocation'];
$assignment_handler = $_POST['assignment_handler'];
$company_code = $_POST['company_code'];
$author = $_POST['author'];


$sql = "INSERT INTO assignments_t1 (client_name, client_type, file_number, ass_jr, ass_catagory, ass_date, con_name, con_phone, con_fax, con_ext, con_email, con_address, ins_name, ins_number, ins_auto, claimant_dob, ins_auto_driver, ins_auto_driver_number, ins_auto_driver_email, ins_auto_driver_address, ins_email, ins_address, claimant_name, claimant_number, claimant_auto, claimant_auto_owner, claimant_injury, claimant_doctor, claimant_doctor_number, claimant_att, claimant_att_number, claimant_att_email, claimant_att_address, claimant_email, claimant_address, loss_date, loss_time, loss_location, loss_description, sn_policenumber, sn_casenumber, sn_policelocation, ins_dob, ins_ssn, ins_insurance_carrier, ins_insurance_policy, ins_insurance_contact, claimant_insurance_carrier, claimant_insurance_policy, claimant_insurance_contact, claimant_auto_driver, assignment_handler, ins_att, ins_att_phone, ins_att_address, ins_att_email, company_code, author)
VALUES ('$client_name', '$client_type', '$file_number', '$ass_jr', '$ass_catagory', '$ass_date', '$con_name', '$con_phone', '$con_fax', '$con_ext', '$con_email', '$con_address', '$ins_name', '$ins_number', '$ins_auto', '$claimant_dob', '$ins_auto_driver', '$ins_auto_driver_number', '$ins_auto_driver_email', '$ins_auto_driver_address', '$ins_email', '$ins_address', '$claimant_name', '$claimant_number', '$claimant_auto', '$claimant_auto_owner', '$claimant_injury', '$claimant_doctor', '$claimant_doctor_number', '$claimant_att', '$claimant_att_number', '$claimant_att_email', '$claimant_att_address', '$claimant_email', '$claimant_address', '$loss_date', '$loss_time', '$loss_location', '$loss_description', '$sn_policenumber', '$sn_casenumber', '$sn_policelocation', '$ins_dob', '$ins_ssn', '$ins_insurance_carrier', '$ins_insuracne_policy', '$ins_insuracne_contact', '$claimant_insuracne_carrier', '$claimant_insurance_policy', '$claimant_insurance_contact', '$claimant_auto_driver', '$assignment_handler', '$ins_att', '$ins_att_phone', '$ins_att_address', '$ins_att_email', '$company_code', '$author')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: n_ass_form.php');exit;
?>