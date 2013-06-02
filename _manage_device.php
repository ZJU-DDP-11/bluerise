<?php

session_start();
include("_func_info.php");
if ( isset($_SESSION["userid"]) ) {
	gotoThePage($homepage);
	exit;
}

$deviceName = $_POST['deviceName'];
$description = $_POST['description'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$altitude = $_POST['altitude'];
$userid = $_SESSION['userid'];
$deviceid = $_POST['id']; 

$delete_id = null;
if ($_GET['delete'] == 1) {
	$delete_id = $_GET['id'];
}

if ($delete_id != null) {
	$result = mysqli_query($dbcon, "select * from $tb_device where id=$delete_id;");
	$row = mysqli_fetch_array($result);
	if ($userid == $row['userid']) {
		mysqli_query($dbcon, "update $tb_device active=0 where id=$delete_id;");
	}
}
else if (!$deviceid) { //Create new deivce
	$cmd  = "insert into $tb_device(id, deviceName, description, userid, latitude, longitude, altitude, active) ";
	$cmd .= "values(null, '$deviceName', '$description', $userid, null, null, null, 1);";
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

