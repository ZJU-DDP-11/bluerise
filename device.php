<?php
session_start();
include("func_info.php");
/*
if ($_SESSION["authen"]==false) {
	gotoThePage($homepage);
	exit;
}
 */
?>
<html>
<head>
	<link href="lib/css/bootstrap.css" rel="stylesheet">
	<link href="lib/css/flat-ui.css" rel="stylesheet">
	<script src="lib/js/jquery.js"></script>
    	<script src="lib/js/bootstrap-transition.js"></script>
     	<script src="lib/js/bootstrap-modal.js"></script>
    	<script src="lib/js/bootstrap-collapse.js"></script>

	<title>Blue Rise - Your Own Device</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
<a href="#addDevice" role="button" class="btn span2 offset9 btn-success" data-toggle="modal">Create Device</a>

<?php

?>

	<div id="addDevice" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	    <h3 id="myModalLabel">Configure your Device</h3>
	  </div>
	  <div class="modal-body">
		<form action="#" method="get">
			<input type="text" placeholder="name" style="height:40px;">
			<input type="text" placeholder="Description" style="height:80px; width:500px;">
		</form>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <button class="btn btn-primary">Save Configurations</button>
	  </div>
	</div>

</div>

<?php include 'footer.php'; ?>
</body>
</html>
