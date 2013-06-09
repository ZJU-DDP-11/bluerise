<?php
$homepage       = "index.php";
$devicepage     = "device.php";
$editdevicepage = "edit_device.php";
$device_detail  = "device_detail.php";
$_mdevicepage   = "_manage_device.php";

$dbhost         = "10.71.10.71";
$dbaccount      = "ddp";
$dbpassword     = "ddprocks";
$dbname         = "ddp";
$tb_device      = "device";
$tb_use         = "user";
$tb_data        = "data";
$tb_datatype    = "datatype";

$dbcon = mysqli_connect($dbhost, $dbaccount, $dbpassword, $dbname) or die("Fail to connect to database: " . mysqli_connect_error());

function gotoThePage($page) { //Not appropriate for the pure PHP page without HTML outputs;
	echo "<script language='javascript' type='text/javascript'> window.location.href='" . $page . "'</script>";
}

function devicePicPath($type) {
	$picPath = "pic/";
	switch($type) {
	case 1: return $picPath."humiSen.png";
	case 2: return $picPath."lightSen.png";
	case 3: return $picPath."temSen.png";
	default: break;
	}
	return $picPath."DefaultSen.png";
}

?>
