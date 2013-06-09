<?php
$userid=$_POST['userid'];
$passWord=$_POST['password'];
include("_func_info.php");
echo $passWord;
echo $userid;
$stmt=mysqli_prepare($dbcon,"UPDATE user SET password=PASSWORD(?) WHERE id=?;") or die("wan yi zhou - prepare");
mysqli_stmt_bind_param($stmt, 'si', $passWord, $userid) or die("wan yi zhou - bind");
mysqli_stmt_execute($stmt)  or die("wan yi zhou - execute");
$row_affect=mysqli_stmt_affected_rows($stmt);
mysqli_stmt_close($stmt);
$stmt2=mysqli_prepare($dobcon,"DELETE FROM setpassword WHERE id=?");
mysqli_stmt_bind_param($stmt2, 'i', $userid);
mysqli_stmt_execute($stmt2);
//$result=mysqli_query($dbcon,"UPDATE  user SET password=PASSWORD($passWord)  WHERE id='$userid';DELETE  FROM setpassword WHERE  id='$userid'");
//$row=mysqli_affected_rows($dbcon);
if($row_affect!=0)
echo "<script>alert('change password success');location.href='index.php';</script>";


?>
