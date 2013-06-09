

<?php
function create_random($length=15){
$random="";
for($i=0;$i<$length;$i++){
	$random.=chr(mt_rand(97, 122));
}
return $random;
}
include("_func_info.php");
require("PHPMailer-master/class.phpmailer.php");
$addressEmail=$_REQUEST['email'];
$select_email=mysqli_query($dbcon,"SELECT* FROM user WHERE email='$addressEmail';");
if(mysqli_num_rows($select_email) != 0){
$result=mysqli_fetch_assoc($select_email);
$code= create_random(15);
$id=$result['id'];
$insert_result=mysqli_query($dbcon,"INSERT INTO setpassword VALUES('$id','$code')");
$url="http://10.71.10.71/changePassWord.php?";
$url.=$addressEmail."&".$code;
$mail=new PHPMailer();
$mail->IsSMTP(); //設定使用SMTP方式寄信  
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->Host ='ssl://smtp.gmail.com'; //設定SMTP主機 
$mail->Port = 465; //設定SMTP埠位，預設為25埠。
$mail->CharSet = "utf8";
$mail->Username = "blueriseweb@gmail.com";
$mail->Password = "bluerise123";
$mail->From = "blueriseweb@gmail.com";
$mail->FromName = "BlueRise";
$mail->Subject = "BlueRise account change password";
$mail->Body = "Dear user<br>click the following link to change password<a href=$url> $url</a><br>if  it is not your  account just ignore this email";
$mail->IsHTML(true); //設定郵件內容為HTML 


$mail->AddAddress($addressEmail, "user");
if(!$mail->Send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent";
	echo"<script type='test/javascript'>window.close();</script>";
}
}




?>
