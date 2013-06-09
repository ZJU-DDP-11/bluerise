<?php
$info=explode("&",$_SERVER["QUERY_STRING"]);
$info2=explode("%40",$info[0]);
$email=$info2[0]."@".$info2[1];
$code=$info[1];
include("_func_info.php");
 $result=mysqli_query($dbcon,"SELECT user.id FROM setpassword,user WHERE user.email='$email' AND user.id=setpassword.id AND setpassword.auth='$code'");
 if(!empty($result)){
	$result_id=mysqli_fetch_array($result);
	$userid=$result_id['id'];

	}
else
	gotoThePage("index.php");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="lib/css/bootstrap.css" rel="stylesheet">
		<link href="lib/css/flat-ui.css" rel="stylesheet">
	</head>
	<body>
		<form method="POST" action="_resetPassWord.php">
			<input value="<?php echo$userid;?>" type="hidden" name="userid">
			<input type="password" name="password">
			<input type="submit" value="submit">
		</form>
	<body>
</html>