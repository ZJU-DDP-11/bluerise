<?php

session_start();
include("_func_info.php");
/*
if ($_SESSION["authen"]==false) {
	gotoThePage($homepage);
	exit;
}
 */

$deviceName = $_POST['deviceName'];
$description = $_POST['description'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$altitude = $_POST['altitude'];
$userid = 1; //$_SESSION['userid']
$deviceid = $_POST['id']; 

if (!$deviceid) { //Create new deivce
	$cmd  = "insert into $tb_device(id, deviceName, description, userid, latitude, longitude, altitude) ";
	$cmd .= "values(null, '$deviceName', '$description', $userid, null, null, null);";
	mysqli_query($dbcon, $cmd) or die("Can not add new device in database!");
}
else {
	$cmd  = "update $tb_device set ";
	$cmd .= "deviceName = '$deviceName', ";
	$cmd .= "description = '$description', ";
	$cmd .= "longitude = '$longitude', ";
	$cmd .= "latitude = '$latitude' ";
	$cmd .= "where userid = $userid and id = $deviceid ;";
	mysqli_query($dbcon, $cmd);
}

gotoThePage($devicepage);
exit;
?>

