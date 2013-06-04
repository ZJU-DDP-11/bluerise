<?php
$userid=$_POST['userid'];
$passWord=$_POST['password'];
include("_func_info.php");
echo $passWord;
echo $userid;
$stmt=mysqli_prepare($dbcon,"UPDATE  user SET password='PASSWORD(?)'  WHERE id=?;DELETE  FROM setpassword WHERE  id=?");
mysqli_stmt_bind_param($stmt, 'sii', $passWord, $userid,$userid);
mysqli_stmt_execute($stmt);
//$result=mysqli_query($dbcon,"UPDATE  user SET password='PASSWORD($passWord)'  WHERE id='$userid';DELETE  FROM setpassword WHERE  id='$userid'");
$row=mysqli_stmt_affected_rows($stmt);
if($row!=0)
echo "<script>alert('change password success');location.href='index.php';</script>";


?>
