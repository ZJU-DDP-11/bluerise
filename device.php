<?php
session_start();
include("_func_info.php");

if ($_SESSION["userid"]==null) {
	gotoThePage($homepage);
	exit;
}

?>

<?php include 'header.php'; ?>

<a href="#CreateDevice" role="button" class="btn span1 offset0 btn-success" data-toggle="modal">Create</a>
<div id="CreateDevice" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	    <h3 id="myModalLabel">Configure your Device</h3>
	  </div>
	  <div class="modal-body">
		<form action="_manage_device.php" method="post">
			<input type="text" placeholder="name" style="height:40px;" name='deviceName'>
			<input type="text" placeholder="Description" style="height:80px; width:500px;" name='description'>
			type:<select name='deviceType'>
				<option value=0>Default</option>
				<option value=1>Humidity</option>
				<option value=2>Luminance</option>
				<option value=3>Temperature</option>
			</select>
	  </div>
	  <div class="modal-footer">
	    <input type="submit" class="btn btn-primary" value='Create Device'>
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	</form>
	  </div>
</div>

<?php
$userid = $_SESSION['userid'];

$result = mysqli_query($dbcon, "select * from $tb_device where userid='$userid';") or die("database Fail selection!");


if (mysqli_num_rows($result)==  0) 
	echo "<div class = 'span15 offset1' align='center'><h1>&nbsp</h1><h2>Oops, You haven't add any devices yet</h2></div>";
else {
	echo "
	<div name='device table' class = 'span15'>
		<table class = 'span14' style='text-align: center;'>
		<tr>
			<td class='span1'></td>
			<td class='span3'><h2>Device ID</h2></td>
			<td class='span4'><h2>Device Name</h2></td>
			<td class='span5'><h2>Manage</h2></td>
		</tr>
	";	
	
	while ( ($device = mysqli_fetch_array($result)) ) if ($device['active'] == 1) {
		$deviceid = $device['id'];
		$deviceName = $device['deviceName'];
		$deviceTypePicPath = devicePicPath($device['type']);
		echo "<tr>";
		echo "<td class='span1'><img src='$deviceTypePicPath' style='width:30px; height:30px;'/></td>";
		echo "<td class='span3'><h4>$deviceid</h4></td>";
		echo "<td class='span4'><h4>$deviceName</h4></td>";
		echo "<td class='span5'>";
		echo "<a class='btn btn-medium btn-primary span1' href='$editdevicepage?id=$deviceid'>Edit</a>";
		echo "<a class='btn btn-medium btn-danger span1' href='$_mdevicepage?delete=1&id=$deviceid'>Delete</a>";
		echo "<a class='btn btn-medium btn-info span1' href='$device_detail?id=$deviceid'>Info</a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
	
</div>

<?php include 'footer.php'; ?>

