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
			$email = $_SESSION['username'];
			$sql = "SELECT * FROM user WHERE username = '$email'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$organization = $row['organization'];
			$website = $row['website'];
			$about = $row['about'];
			$receive_notification = $row['receive_notification'];
			?> -->
			<h3 class="demo-panel-title offset1">Basic Info</h3>
			<div class="row demo-row">
				<div class="span3 offset2">
					<input name="email" type="text" disabled="disabled" value="<?php echo $email; ?>" placeholder="meow@meow.com" class="span3" />
				</div>
				<div class="span3">
					<a href="#" class="btn btn-large btn-block btn-info">Change Password</a>
				</div>
			</div>
			
			<h3 class="demo-panel-title offset1">Detailed Info</h3>
			<div class="row demo-row">
				<div class="span3 offset2">
					<input name="organization" type="text" value="<?php echo $organization; ?>" placeholder="Organization" class="span3" />
					<input name="website" type="text" value="<?php echo $website; ?>" placeholder="Website" class="span3" />
				</div>
				<div class="span8 offset2">
					<textarea name="about" value="<?php echo $about; ?>" placeholder="About" rows="5" class="span8"></textarea>
				</div>
			</div>
			
			<h3 class="demo-panel-title offset1">Communication Settings</h3>
			<div class="row demo-row">
				<div class="span6 offset2">
					<?php
						if ($receive_notification) {
					?>
						<label class="checkbox checked" for="receive-email">
							<span class="icon"></span>
							<span class="icon-to-fade"></span>
							<input name="receive_notification" check type="checkbox" value id="receive-email">Receive notifications
						</label>
					<?php
						}
						else {
					?>
						<label class="checkbox" for="receive-email">
							<span class="icon"></span>
							<span class="icon-to-fade"></span>
							<input name="receive_notification" type="checkbox" value id="receive-email">Receive notifications
						</label>
					<?php } ?>
				</div>
			</div>

			<div class="row demo-row"></div>

			<div class="row demo-row">
				<div class="span3 offset2">
					<input type="submit" class="btn btn-large btn-block btn-success" value="Save">
				</div>
				<div class="span3 offset1">
					<a href="deleteAccount.php" class="btn btn-large btn-block btn-danger">Delete Account</a>
				</div>
			</div>

			<div class="row demo-row"></div>
		</div><!--container-->
	</form>

<?php include 'footer.php'; ?>

