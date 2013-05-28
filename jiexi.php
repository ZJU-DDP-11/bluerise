
<?php
	include("_func_info.php");
   //$jsonReceiveData = json_decode($_POST);
   print_r($_POST);
   $sql=mysql_query("insert into testjson(json)values($_POST)");

?>