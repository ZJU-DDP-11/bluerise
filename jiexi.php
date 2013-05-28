
<?php
	include("_func_info.php");
   //$jsonReceiveData = json_decode($_POST);
   print_r($_POST);
   $sql=mysqli_query($dbcon, "insert into testjson(json)values($_POST)");

?>