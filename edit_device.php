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


<form method="post" action="_manage_device.php">
	<div class="container">
		<!-- <?php
		$deviceid = $_POST['id'];
		$result = mysqli_query($dbcon, "select * from $tb_device where id='$deviceid';") or die("database Fail selection!");			
		/*
		if (mysqli_num_rows($result) == 0) {
			echo "<h1>No Such Device!</h1>";
			exit;
		}
		 */

		$row = mysqli_fetch_array($result);
		?> -->
		
		<h3 class="demo-panel-title offset1">Device Info</h3>
		<div class="row demo-row">
			<div class="span8 offset2"><h4>Device ID is : <?php echo $row['id']?></h4>
			</div>
			<div class="span3 offset2">
				<input name="deviceName" type="text" value="<?php echo $row['deviceName']; ?>" placeholder="device name" class="span3" />
			</div>
			<div class="span8 offset2">
				<textarea name="description" value="<?php echo $row['description']; ?>" placeholder="Description" rows="5" class="span8"></textarea>
			</div>
		</div>


<!--








-->

			
		<div class="row demo-row">
			<div class="span3 offset2">
				<input type="submit" class="btn btn-large btn-block btn-success" value="Save">
			</div>
			<div class="span3 offset1">
				<a href="device.php" class="btn btn-large btn-block btn-warning">Cancel</a>
			</div>
		</div>
	</div>

</form>

<?php include 'footer.php'; ?>

