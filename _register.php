<?php
include("_func_info.php");
$email=$_REQUEST['email'];
$querySelectId=("SELECT MAX(ID) AS id FROM user");
$passWord=$_REQUEST['Password'];
$passWord2=$_REQUEST['Password2'];
if($passWord!=$passWord2){
echo "<script>alert('password dismatch');location.href='index.php';</script>";
}
$resultSelect = mysqli_fetch_assoc(mysqli_query($dbcon,$querySelectId));
$id=$resultSelect['id']+1;

 $currtime=date("Y-m-d H:i:s");
$result=mysqli_query($dbcon,"INSERT INTO user VALUE('$id','$email','PASSWORD($passWord)','F','$currtime','null','null','null');");
if(!empty($result))
echo"<script>alert('register success');location.href='index.php';</script>";
else
echo"<script>alert('this email address has been registered');location.href='index.php';</script>";


?>