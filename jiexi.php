
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
    $sql=mysqli_query( $dbcon,"insert into testjson (json) values('$_POST');") or die("jkjkjk");

?>