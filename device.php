<?php
session_start();
include("func_info.php");
/*
if ($_SESSION["authen"]==false) {
	gotoThePage($homepage);
	exit;
}
 */
?>

<?php include 'header.php'; ?>

<a href="#addDevice" role="button" class="btn span2 offset9 btn-success" data-toggle="modal">Create Device</a>

<?php
#$userid = $_SESSION['userid'];
$userid = 1;
$result = mysqli_query($dbcon, "select * from $tb_device where userid='$userid';");
?>

<div class = 'row span14'>
	<table class = "">
	<br>
		<td>Deivce Name</td>
		<td>Description</td>
		<td>Manage</td>
	</br>
<?php
while ( ($device = mysql_fetch_array($result)) ) {
	echo "<tr>";
	echo "<td>".$device['deviceName']."</td>";
	echo "<td>".$device['description']."</td>";
	echo "<td>";
	echo "<a class='btn btn-primary btn-large btn-block' href='#'>Edit</a>";
	echo "<a class='btn btn-primary btn-large btn-block' href='#'>Delete</a>";
	echo "</td>";
	echo "</tr>";
}
?>
	</table>
</div>

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



<?php include 'footer.php'; ?>

