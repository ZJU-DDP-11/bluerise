
<?php
	include("_func_info.php");
	
   //$jsonReceiveData = json_decode($_POST);
   //print_r($_POST);
   
//$tb_device	= "device";
//$tb_user	= "user";
//$tb_data	= "data";

//$dbcon=mysqli_connect($dbhost, $dbaccount, $dbpassword, $dbname) or die("Fail to connect to database: ".mysqli_connect_error());
	//$dbcon=mysql_connect("localhost","root") or die("数据库服务器连接错误".mysql_error());
	//mysql_select_db("ddp",$dbcon) or die("数据库访问错误".mysql_error());
	$a=file_get_contents('php://input');
	
	$get_json=json_decode($a);
	$deviceid=(int)($get_json->apikey);	
	$description=addslashes($get_json->datastreams[0]->description);
	$data=(double)($get_json->datastreams[0]->current_value);
	date_default_timezone_set('Asia/Hong_Kong');
	$time=date("Y-m-d h:i:s");
	$unit=addslashes($get_json->datastreams[0]->unit);

	$result = mysqli_query($dbcon, "select * from $tb_datatype where description='$description';");
	if (!$result) {
		mysqli_query($dbcon, "insert into $tb_dataype(id, description, unit) values(null, '$description', '$unit');");
		$result = mysqli_query($dbcon, "select id from $tb_datatype where description='$description';");
		$typeid = (mysqli_fetch_array($result))['id'];
		mysqli_query($dbcon, "insert into $tb_data(deviceid, data, time, typeid) values($deviceid, '$data', $time, $typeid);");
	}
	else {
		$typeid = (mysqli_fetch_array($result))['id'];
		mysqli_query($dbcon, "insert into $tb_data(deviceid, data, time, typeid) values($deviceid, '$data', '$time', $typeid);");
	}

	$file = fopen("mysqli_error_log.txt","a+");
	fwrite($file,mysqli_error($dbcon));
	fclose($file);
	
	/*
    $sql=mysqli_query( $dbcon,"insert into $tb_data(deviceid,description,data,time,unit) values($deviceid,'$description','$data','$time','$unit');") or die("Fail to Insert");
	$sql1=mysqli_query( $dbcon,"insert into testjson(json) values('$a');") or die("Fail to Insert a a a ");
	 */
?>
