<?php
session_start();
include("_func_info.php");
if ( !isset($_SESSION["userid"]) ) {
	gotoThePage($homepage);
	exit;
}

$deviceName = addslashes($_POST['deviceName']);
$description = addslashes($_POST['description']);
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$altitude = $_POST['altitude'];
$userid = $_SESSION['userid'];
$deviceid = addslashes($_POST['id']); 

$delete_id = null;
if ($_GET['delete'] == 1) {
	$delete_id = addslashes($_GET['id']);
}

$stmt = mysqli_stmt_init($dbcon);  //initial the $stmt

if ($delete_id != null) {
	$query = "select * from $tb_device where id = ?;";
	mysqli_stmt_prepare($stmt, $query) or die("fail on prepare");
	mysqli_stmt_bind_param($stmt, 'i', $delete_id); //Set the parameters
	mysqli_stmt_execute($stmt) or die("failed to find the deleting device");  //execution!

	$result = mysqli_stmt_get_result($stmt);
	//$result = mysqli_query($dbcon, "select * from $tb_device where id='$delete_id';") or die("finding del_id device fail");
	
	$row = mysqli_fetch_array($result);
	if ($userid == $row['userid']) {
		$query = "update $tb_device set active=0 where id= ? ;";
		mysqli_stmt_prepare($stmt, $query) or die("die for preparing deleting device");
		mysqli_stmt_bind_param($stmt, 'i', $delete_id);
		mysqli_stmt_execute($stmt) or die("failed to delete the device");  //execution!
		//mysqli_query($dbcon, "update $tb_device set active=0 where id='$delete_id';") or die("deleteing failed");
	}
}
else if ($deviceid == null) { //Create new deivce
	$query  = "insert into $tb_device(id, deviceName, description, userid, latitude, longitude, altitude, active) ";
	$query .= "values(null, ?, ?, ?, null, null, null, 1);";
	mysqli_stmt_prepare($stmt, $query) or die("dying on prepare for creating new device");
	mysqli_stmt_bind_param($stmt, 'ssi', $deviceName, $description, $userid);
	mysqli_stmt_execute($stmt) or die("Can not add new device in database!");
	//$query  = "insert into $tb_device(id, deviceName, description, userid, latitude, longitude, altitude, active) ";
	//$query .= "values(null, '$deviceName', '$description', $userid, null, null, null, 1);";
	//mysqli_query($dbcon, $query) or die("Can not add new device in database!");
	
}
else {
	$query  = "update $tb_device set ";
	$query .= "deviceName = ?, ";
	$query .= "description = ?, ";
	$query .= "longitude = ?, ";
	$query .= "latitude = ? ";
	$query .= "where userid = ? and id = ? ;";
	mysqli_stmt_prepare($stmt, $query) or die("die for preparing add new device");
	mysqli_stmt_bind_param($stmt,'ssddii', $deviceName, $description, $longitude, $latitude, $userid, $deviceid);
	mysqli_stmt_execute($stmt) or die("Can not add new device in database!"); //execution!
	/*
	$query  = "update $tb_device set ";
	$query .= "deviceName = '$deviceName', ";
	$query .= "description = '$description', ";
	$query .= "longitude = '$longitude', ";
	$query .= "latitude = '$latitude' ";
	$query .= "where userid = $userid and id = '$deviceid' ;";
	mysqli_query($dbcon, $query);
	 */
	
}

mysqli_stmt_close($stmt);

gotoThePage($devicepage);
exit;
?>

