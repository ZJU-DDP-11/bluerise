<meta charset="utf-8">
<?php
	require 'connect.php';

	$email = $_POST["email"];
	$organization = $_POST["organization"];
	$website = $_POST["website"];
	$about = $_POST["website"];
	$receive_notification = $_POST["receive_notification"];

	$sql = "UPDATE user SET organization = '$organization', website = '$website', about = '$about', receive_notification = '$receive_notification' WHERE username = '$email'";
	$result = mysqli_query($con, $sql);

	require 'unconnect.php';
?>