<?php

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "smart_invoice_v1"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

?>