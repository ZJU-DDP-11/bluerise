<?php
include("_func_info.php");
session_start();
session_destroy();
gotoThePage("index.php") ;
?>