

<?php
function create_random($length=15){
$random="";
for($i=0;$i<$length;$i++){
	$random.=chr(mt_rand(97, 122));
}
return $random;
}
$con =mysql_connect("localhost","wyz","123456")or die("can't connect to database");
mysql_select_db("ddp",$con);
 mysql_query("set names utf8");
require("PHPMailer-master/class.phpmailer.php");
$addressEmail=$_REQUEST['email'];
$select_email=mysql_query("SELECT* FROM user WHERE email='$addressEmail';");
if(!empty($select_email)){
$result=mysql_fetch_assoc($select_email);
$code= create_random(15);
$id=$result['id'];
$insert_result=mysql_query("INSERT INTO setpassword VALUES('$id','$code')");
$url="http://localhost/bluerise/changePassWord.php?";
$url.=$addressEmail."&".$code;
$mail=new PHPMailer();
$mail->IsSMTP(); //設定使用SMTP方式寄信  
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->Host ='ssl://smtp.gmail.com'; //設定SMTP主機 
$mail->Port = 465; //設定SMTP埠位，預設為25埠。
$mail->CharSet = "utf8";
$mail->Username = "advancedenglishwriting2@gmail.com";
$mail->Password = "ewriting2";
$mail->From = "advancedenglishwriting2@gmail.com";
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