<?php
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
include("_func_info.php");
 $result=mysqli_query($dbcon, "SELECT* FROM user WHERE email='$email' and password='PASSWORD($password)'");
 $user=mysqli_fetch_assoc($result);
 if(!empty($result)){
	$_SESSION['email']=$email;
	$_SESSION['userid']=$user['id'];
	echo "<script>location.href='device.php';</script>";
 }
 else
 echo "<script>alert('wrong email or password');location.href='index.php';</script>";
 ?>