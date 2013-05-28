<meta charset="utf-8">
<?php
	require "_func_info.php";
	#$email = $_SESSION['username'];
	$email = "liu.dongyuan@gmail.com";
	$organization = $_POST["organization"];
	$website = $_POST["website"];
	$about = $_POST["about"];
	if (isset($_POST["receive_notification"]))
		$receive_notification = 1;
	else
		$receive_notification = 0;
	$old_password = $_POST["old_password"];
	$new_password = $_POST["new_password"];
	$new_password_confirm = $_POST["new_password_confirm"];

	if ($new_password) {
		$sql = "SELECT * FROM user WHERE email = '$email' and password = password('$old_password')";
		$result = mysqli_query($dbcon, $sql);
		$row = mysqli_fetch_array($result);
		if ($row) {
			if ($new_password === $new_password_confirm) {
				$sql = "UPDATE user SET password = password('$new_password') WHERE email = '$email' LIMIT 1";
				mysqli_query($dbcon, $sql);
				$page = "user_settings.php?success=1";
			}
			else {
				$page = "user_settings.php?success=0";
			}
		}
		else {
			$page = "user_settings.php?success=0";
		}
		gotoThePage($page);
	}

	$sql = "UPDATE user SET organization = '$organization', website = '$website', about = '$about', receive_notification = $receive_notification WHERE email = '$email' LIMIT 1";
	mysqli_query($dbcon, $sql);
	$page = "user_settings.php";
	gotoThePage($page);
?>