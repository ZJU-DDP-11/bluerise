<?php
$userid=$_POST['userid'];
$passWord=$_POST['password'];
include("_func_info.php");
$result=mysqli_query($dbcon,"UPDATE TABLE user SET password='PASSWORD($passWord)'WHERE id='$userid';DELETE  FROM setpassoword WHERE  id='$userid'");
echo "<script>alert('change password success');location.href='index.php';</script>";


?>
