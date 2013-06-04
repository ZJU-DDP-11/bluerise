<?php
	session_start();
	require "_func_info.php";
	if (!isset($_SESSION["userid"])) {
		gotoThePage($homepage);
		exit;
	}
?>
<meta charset="utf-8">
<?php
	/* Begin Task */
	/* Informations part */
	$email = $_SESSION['email'];
	$organization = $_POST["organization"];
	$website = $_POST["website"];
	$about = $_POST["about"];
	if (isset($_POST["receive_notification"]))		/* test if recive notification is selected */
		$receive_notification = 1;					/* won't mind the value of receive_notification */
	else
		$receive_notification = 0;
	/* Password pard */
	$old_password = $_POST["old_password"];
	$new_password = $_POST["new_password"];
	$new_password_confirm = $_POST["new_password_confirm"];

	$stmt = mysqli_stmt_init($dbcon);				/* start stmt */

	/* Delete Account */
	if (isset($_POST["delete_account"]))			/* won't mind the value of delete_account */
		$delete_account = 1;
	else
		$delete_account = 0;

	if ($delete_account) {
		$sql = "UPDATE user SET active = 0 WHERE email = ? LIMIT 1";
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $email);
		mysqli_stmt_execute($stmt);
		session_destroy();
		$page = "index.php";
		gotoThePage($page);
	}

	/* Change Password */
	if ($new_password) {
		$sql = "SELECT * FROM user WHERE email = ? AND password = ?";
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 'ss', $email, password($old_password));
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_array($result);
		if ($row) {		/* if old password is right */
			if ($new_password === $new_password_confirm) {		/* if new password pass the confirmation */
				$sql = "UPDATE user SET password = ? WHERE email = ? LIMIT 1";
				mysqli_stmt_prepare($stmt, $sql);
				mysqli_stmt_bind_param($stmt, 'ss', password('$new_password'), $email);
				mysqli_stmt_execute($stmt);
				$page = "user_settings.php?success=1";
			}
			else {		/* if new password can't pass the confirmation */
				$page = "user_settings.php?success=0";
			}
		}
		else {		/* if old password is false */
			$page = "user_settings.php?success=0";
		}
		gotoThePage($page);
	}

	/* Update Informations */
	/* update the information with the contents submitted */
	$sql = "UPDATE user SET organization = ?, website = ?, about = ?, receive_notification = ? WHERE email = ? LIMIT 1";
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, 'sssis', $organization, $website, $about, $receive_notification, $email);
	mysqli_stmt_execute($stmt);

	/* End Task */
	mysqli_stmt_close($stmt);			/* close stmt */
	$page = "user_settings.php";		/* back to user settings page */
	gotoThePage($page);
?>