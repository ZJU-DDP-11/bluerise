<?php
	$css = "
	<style type='text/css'>
		#change-password-btn {
			height: 41px;
			padding-top: 9px;
		}

		#password-message {
			height: 28px;
			padding-top: 9px;
			padding-bottom: 0px;
		}
	</style>"
	include('header.php');
?>
	<form id="delete_account_form" method="post" action="_user_settings_action.php" style="display: none;">
		<input name="delete_account" type="hidden" />
	</form>
	<form method="post" action="_user_settings_action.php">
		<div class="container">
			<?php
			require "_func_info.php";
			$email = $_SESSION['email'];
			$sql = "SELECT * FROM user WHERE email = '$email'";
			$result = mysqli_query($dbcon, $sql);
			$row = mysqli_fetch_array($result);
			$organization = $row['organization'];
			$website = $row['website'];
			$about = $row['about'];
			$receive_notification = $row['receive_notification'];
			?>
			<h3 class="demo-panel-title offset1">Basic Info</h3>
			<div class="row demo-row">
				<div class="span3 offset2">
					<input title="E-mail" name="email" type="text" disabled="disabled" value="<?php echo $email; ?>" placeholder="meow@meow.com" class="span3" />
				</div>
				<div id="change-password" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="change-password-label" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="change-password-modal">Change Password</h3>
					</div>
					<div class="modal-body">
						<div class="span3">
							<input name="old_password" type="password" placeholder="Old password" class="span3" />
						</div>
						<div class="span3">
							<input name="new_password" type="password" placeholder="New password" class="span3" />
							<input name="new_password_confirm" type="password" placeholder="Confirm password" class="span3" />
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit">Save changes</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</div>
				<div class="span3">
					<a href="#change-password" role="button" data-toggle="modal" class="btn btn-large btn-block btn-info" id="change-password-btn">Change Password</a>
				</div>
				<div class="span6 offset2">
					<?php
						if ($_GET['success'] === '0') {
					?>
					<div id="password-message" class="alert alert-error">
						<strong>Error!</strong> Check your password.
					</div>
					<?php
						} else if ($_GET['success'] === '1') {
					?>
					<div id="password-message" class="alert alert-success">
						<strong>Success!</strong> Password changed.
					</div>
					<?php } ?>
				</div>
			</div>
			
			<h3 class="demo-panel-title offset1">Detailed Info</h3>
			<div class="row demo-row">
				<div class="span3 offset2">
					<input title="Organization" name="organization" type="text" value="<?php echo $organization; ?>" placeholder="Organization" class="span3" />
					<input title="Website" name="website" type="text" value="<?php echo $website; ?>" placeholder="Website" class="span3" />
				</div>
				<div class="span8 offset2">
					<textarea title="About" name="about" placeholder="About" rows="5" class="span8"><?php echo $about; ?></textarea>
				</div>
			</div>
			
<!-- 			<h3 class="demo-panel-title offset1">Communication Settings</h3>
			<div class="row demo-row">
				<div class="span6 offset2">
					<?php
						if ($receive_notification === '1') {
					?>
						<label class="checkbox checked" for="receive-email">
							<span class="icon"></span>
							<span class="icon-to-fade"></span>
							<input name="receive_notification" checked="checked" type="checkbox" id="receive-email">Receive notifications
						</label>
					<?php
						}
						else {
					?>
						<label class="checkbox" for="receive-email">
							<span class="icon"></span>
							<span class="icon-to-fade"></span>
							<input name="receive_notification" type="checkbox" id="receive-email">Receive notifications
						</label>
					<?php } ?>
				</div>
			</div> -->

			<div class="row demo-row"></div>

			<div class="row demo-row">
				<div class="span3 offset2">
					<input type="submit" class="btn btn-large btn-block btn-success" value="Save">
				</div>
				<div id="delete-account-modal" class="modal modal hide fade" tabindex="-1" role="dialog" aria-labelledby="delete-account-label" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="alert-heading" id="delete-account-header">Delete Account</h3>
					</div>
					<div class="modal-body">
						<p>Are you sure?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" onclick="$('#delete_account_form').submit()">Delete This Account</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					</div>
				</div>
				<div class="span3 offset1">
					<a href="#delete-account-modal" role="button" data-toggle="modal" class="btn btn-large btn-block btn-danger">Delete Account</a>
				</div>
			</div>
			<div class="row demo-row"></div>
		</div><!--container-->
	</form>
	
<?php include('footer.php'); ?>