<?php
    $css="
    <style type='text/css'>
    	body {
		padding-top: 20px;
		padding-bottom: 40px;
	  }
	
	  /* Custom container */
	  .containernarrow {
		margin: 0 auto;
		max-width: 700px;
	  }
	  .container-narrow > hr {
		margin: 30px 0;
	  }
	
	  /* Main marketing message and sign up button */
	  .jumbotron {
		margin: 60px 0;
		text-align: center;
	  }
	  .jumbotron h1 {
		font-size: 72px;
		line-height: 1;
	  }
	  .jumbotron .btn {
		font-size: 21px;
		padding: 14px 24px;
	  }
	
	  /* Supporting marketing content */
	  .marketing {
		margin: 60px 0;
	  }
	  .marketing p + h4 {
		margin-top: 28px;
	  }
	</style>
    ";
	include("header.php");
?>
	<form method="post" action="_user_settings_action.php">
		<div class="container">
			<?php
			require "_func_info.php";
			#$email = $_SESSION['username'];
			$email = "liu.dongyuan@gmail.com";
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
					<input name="email" type="text" disabled="disabled" value="<?php echo $email; ?>" placeholder="meow@meow.com" class="span3" />
				</div>
				<div id="change_password" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h3 id="changePasswordModal">Change Password</h3>
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
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						<button class="btn btn-primary" type="submit">Save changes</button>
					</div>
				</div>
				<div class="span3">
					<a href="#change_password" role="button" data-toggle="modal" class="btn btn-large btn-block btn-info">Change Password</a>
				</div>
				<div class="span3">
					<?php
						if ($_GET['success'] === '0') {
					?>
					<div class="alert alert-error">
						<strong>Error!</strong>
						<p>Check your password.</p>
					</div>
					<?php
						} else if ($_GET['success'] === '1') {
					?>
					<div class="alert alert-success">
						<strong>Success!</strong>
						<p>Password changed.</p>
					</div>
					<?php } ?>
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

	<script src="lib/js/jquery-1.8.2.min.js"></script>
	<script src="lib/js/jquery-ui-1.10.0.custom.min.js"></script>
	<script src="lib/js/jquery.dropkick-1.0.0.js"></script>
	<script src="lib/js/custom_checkbox_and_radio.js"></script>
	<script src="lib/js/custom_radio.js"></script>
	<script src="lib/js/jquery.tagsinput.js"></script>
	<script src="lib/js/bootstrap-tooltip.js"></script>
	<script src="lib/js/jquery.placeholder.js"></script>
	<script src="http://vjs.zencdn.net/c/video.js"></script>
	<script src="lib/js/application.js"></script>
	<script src="lib/js/jquery.js"></script>
	<script src="lib/js/bootstrap-transition.js"></script>
	<script src="lib/js/bootstrap-collapse.js"></script>
	<!--[if lt IE 8]>
	  <script src="js/icon-font-ie7.js"></script>
	  <script src="js/icon-font-ie7-24.js"></script>
	<![endif]-->
	<script type="text/javascript">
	  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	  try{
		var pageTracker = _gat._getTracker("UA-19972760-2");
		pageTracker._trackPageview();
		} catch(err) {}
	</script>
</div>
</body>
</html>