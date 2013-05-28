
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
	$deviceid=$get_json->apikey;	
	$description=$get_json->datastreams[0]->description;
	$data=$get_json->datastreams[0]->current_value;
	date_default_timezone_set('Asia/Hong_Kong');
	$time=date("Y-m-d h:i:s");
	$unit=$get_json->datastreams[0]->unit;
    $sql=mysqli_query( $dbcon,"insert into data (deviceid,description,data,time,unit) values('$deviceid','$description','$data','$time','$unit');") or die("Fail to Insert");
	$sql=mysqli_query( $dbcon,"insert into testjson(json) values('$a'');") or die("Fail to Insert");
?>