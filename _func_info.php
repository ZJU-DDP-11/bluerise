<?php
$homepage	= "index.php";
$devicepage	= "device.php";
$editdevicepage = "edit_device.php";
$device_detail = "device_detail.php";
$_mdevicepage	= "_manage_device.php";

$dbhost 	= "localhost";
$dbaccount	= "ddp";
$dbpassword	= "ddprocks";
$dbname		= "ddp";
$tb_device	= "device";
$tb_user	= "user";
$tb_data	= "data";
$tb_datatype	= "datatype";

$dbcon=mysqli_connect($dbhost, $dbaccount, $dbpassword, $dbname) or die("Fail to connect to database: ".mysqli_connect_error());

function gotoThePage($page) { //Not appropriate for the pure PHP page without HTML outputs;
		echo "<script language='javascript' type='text/javascript'> window.location.href='".$page."'</script>";
	}

?>
