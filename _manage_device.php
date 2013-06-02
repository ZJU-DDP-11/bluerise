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

$stmt = mysqli_stmt_init($dbcon);  //initial the $stmt

if ($delete_id != null) {
	$query = "select * from ? where id= ? ;";
	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_bind_param($stmt, 'si', $tb_device, $delete_id); //Set the parameters
	mysqli_stmt_execute($stmt) or die("failed to find the deleting device");  //execution!

	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_array($result);
	if ($userid == $row['userid']) {
		$query = "update ? set active=0 ? where id= ? ;";
		mysqli_stmt_prepare($stmt, $query);
		mysqli_stmt_bind_param($stmt, 'si', $tb_device, $delete_id);
		mysqli_stmt_execute($stmt) or die("failed to delete the device");  //execution!
	}
}
else if (!$deviceid) { //Create new deivce
	$query  = "insert into ?(id, deviceName, description, userid, latitude, longitude, altitude, active) ";
	$query .= "values(null, '?', '?', ?, null, null, null, 1);";
	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_bind_param($stmt, 'sssi', $tb_device, $deviceName, $description, $userid);
	mysqli_stmt_execute($stmt) or die("Can not add new device in database!");
}
else {
	$query  = "update ? set ";
	$query .= "deviceName = '?', ";
	$query .= "description = '?', ";
	$query .= "longitude = '?', ";
	$query .= "latitude = '?' ";
	$query .= "where userid = ? and id = ? ;";
	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_bind_param($stmt,'sssddii', $tb_device, $deviceName, $description, $longitude, $latitude, $userid, $deviceid);
	mysqli_stmt_execute($stmt) or die("Can not add new device in database!"); //execution!
}

mysqli_stmt_close($stmt);

gotoThePage($devicepage);
exit;
?>

