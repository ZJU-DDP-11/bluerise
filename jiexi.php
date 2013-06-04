
<?php
	include("_func_info.php");
	
   //$jsonReceiveData = json_decode($_POST);
   //print_r($_POST);
   
//$tb_device	= "device";
//$tb_user	= "user";
//$tb_data	= "data";

//$dbcon=mysqli_connect($dbhost, $dbaccount, $dbpassword, $dbname) or die("Fail to connect to database: ".mysqli_connect_error());
	//$dbcon=mysql_connect("localhost","root") or die("æ•°æ®åº“æœåŠ¡å™¨è¿žæŽ¥é”™è¯¯".mysql_error());
	//mysql_select_db("ddp",$dbcon) or die("æ•°æ®åº“è®¿é—®é”™è¯¯".mysql_error());
	$a=file_get_contents('php://input');
	
	$get_json=json_decode($a);
	$deviceid=(int)($get_json->apikey);	
	$description=addslashes($get_json->datastreams[0]->description);
	$data=(double)($get_json->datastreams[0]->current_value);
	date_default_timezone_set('Asia/Hong_Kong');
	$time=date("Y-m-d h:i:s");
	$unit=addslashes($get_json->datastreams[0]->unit);

	error_log("¾ÓÈ»Ð´²»½øÀ´£¡£¡ !!!!shoooooot!!!");
	/*
	$file = fopen("./mysqli_error_log.txt","a+");
	fwrite($file, $a);
	fwrite($file, '¾ÓÈ»Ð´²»½øÀ´£¡£¡ !!!!shoooooot!!!');
	fclose($file);
	 */

	$result = mysqli_query($dbcon, "select * from $tb_datatype where description='$description';");
	if (!$result) {
		mysqli_query($dbcon, "insert into $tb_dataype(id, description, unit) values(null, '$description', '$unit');");
		$result = mysqli_query($dbcon, "select id from $tb_datatype where description='$description';");
		$row = mysqli_fetch_array($result);
		$typeid = $row['id'];
		mysqli_query($dbcon, "insert into $tb_data(deviceid, data, time, typeid) values($deviceid, '$data', $time, $typeid);");
	}
	else {
		$row = mysqli_fetch_array($result);
		$typeid = $row['id'];
		mysqli_query($dbcon, "insert into $tb_data(deviceid, data, time, typeid) values($deviceid, '$data', '$time', $typeid);");
	}

	error_log(mysqli_error($dbcon));
	
	/*
    $sql=mysqli_query( $dbcon,"insert into $tb_data(deviceid,description,data,time,unit) values($deviceid,'$description','$data','$time','$unit');") or die("Fail to Insert");
	$sql1=mysqli_query( $dbcon,"insert into testjson(json) values('$a');") or die("Fail to Insert a a a ");
	 */
?>
