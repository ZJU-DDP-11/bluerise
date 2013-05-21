<?php
$homepage	= "index.php";
$dbhost 	= "10.71.10.71";
$dbaccount	= "ddp";
$dbpassword	= "ddprocks";
$dbname		= "ddp";

$dbcon=mysqli_connect($dbhost, $dbaccount, $dbpassword, $dbname) or die("Fail to connect to database~");

function gotoThePage($page) { //Not appropriate for the pure PHP page without HTML outputs;
		echo "<script language='javascript' type='text/javascript'> window.location.href='".$page."'</script>";
	}
?>
