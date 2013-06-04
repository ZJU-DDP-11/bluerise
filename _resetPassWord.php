<?php
$userid=$_POST['userid'];
$passWord=$_POST['password'];
include("_func_info.php");
$result=mysqli_query($dbcon,"UPDATE  user SET password=PASSWORD($passWord)  WHERE id='$userid';DELETE  FROM setpassword WHERE  id='$userid'");
if(mysqli_affected_rows($dbcon)!=0)
echo "<script>alert('change password success');location.href='index.php';</script>";


?>
