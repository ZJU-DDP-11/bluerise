<?php
session_start();
include("_func_info.php");
/*
if ($_SESSION["authen"]==false) {
	gotoThePage($homepage);
	exit;
}
 */
?>

<?php include 'header.php'; ?>

<a href="#addDevice" role="button" class="btn span2 offset9 btn-success" data-toggle="modal">Create Device</a>
<div id="addDevice" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	    <h3 id="myModalLabel">Configure your Device</h3>
	  </div>
	  <div class="modal-body">
		<form action="#" method="get">
			<input type="text" placeholder="name" style="height:40px;">
			<input type="text" placeholder="Description" style="height:80px; width:500px;">
		</form>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <button class="btn btn-primary">Save Configurations</button>
	  </div>
</div>

<?php
#$userid = $_SESSION['userid'];
$userid = 1;
$result = mysqli_query($dbcon, "select * from $tb_device where userid='$userid';") or die("Fail selection!");
?>

<div name="device table" class = 'span15'>
	<table class = 'span14' style='text-align: center;'>
	<tr>
		<td class='span4'><h2>Deivce ID</h2></td>
		<td class='span4'><h2>Device Name</h2></td>
		<td class='span5'><h2>Manage</h2></td>
	</tr>

<?php
while ( ($device = mysqli_fetch_array($result)) ) {
	echo "<tr>";
	echo "<td class='span4'><h4>".$device['id']."</h4></td>";
	echo "<td class='span4'><h4>".$device['deviceName']."</h4></td>";
	echo "<td class='span5'>";
	echo "<a class='btn btn-medium btn-primary span1' href='#'>Edit</a>";
	echo "<a class='btn btn-medium btn-danger span1' href='#'>Delete</a>";
	echo "<a class='btn btn-medium btn-info span1' href='#'>Info</a>";
	echo "</td>";
	echo "</tr>";
}
?>
	</table>
</div>

	



<?php include 'footer.php'; ?>

