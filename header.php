<!DOCTYPE html> 
<html lang="en">
<head>
	  <meta charset="utf-8">
	  <!-- Le styles -->
	  <title>Blue Rise</title>
	  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	  <link href="lib/css/bootstrap.css" rel="stylesheet">
	  <link href="lib/css/flat-ui.css" rel="stylesheet">
	  <link href="lib/css/bootstrap-responsive.css" rel="stylesheet">
	  <link rel="shortcut icon" href="lib/images/favicon.ico">
	  <style>
		  .demo-panel-title{
			  margin-left:20px;
		  }
		  #header{
			  width:1000px;
			  height:160px;
			  clear:both;
			  margin-left: auto;
			  margin-right:auto;
		  }
		  #footer{
			  clear: both;
			  width:1000px;
			  z-index: 10;
			  height: 3em;
			  white-space:nowrap;
			  height:100px;
		  }

		  #container{
			  margin-left: auto;
			  margin-right:auto;
			  width: auto;
		  }
		  .bar-icon {
			  margin-left:10px;
		  }
		  .word{
			  overflow:hidden;
		  }
		  #accordion2 {
		  	margin-left: 760px;
		  	z-index: 1;
		  	background-color: white;
		  	position: absolute;
			top:30px;
		  	width: 220px;
		  	text-align: center;
		  }
		  #accordion2 .row {
		  	height: 40px;
		  }
	  </style>
	  <? 
	  	echo $css; 
	  	echo $script;
	  ?>
	  <script src="lib/js/jquery.js"></script>
	  <script src="lib/js/bootstrap-transition.js"></script>
	  <script src="lib/js/bootstrap-collapse.js"></script>
	  <script src="lib/js/bootstrap-modal.js"></script>
	
</head>

<body>
	<div id="container">
		<header id="header">
			<h1 class="demo-panel-title">BlueRise</h1>
			<div class="accordion" id="accordion2">
				<div class="accordion-group" >
				   	<div class="accordion-heading row">
				   		<div class="todo-icon fui-man-16" style="padding:0;margin:5px 5px 0 40px;"></div>
				   		<div id="user-account" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				   			example@example.com 
				   		</div>
				   	</div>
				   	<div id="collapseOne" class="accordion-body collapse">
				   		<div class="todo-icon fui-settings-16" style="padding:0px;margin:5px 5px 0 20px;"></div>
				   		<div class="accordion-inner">
				   			User setting
				   		</div>
				   		<div class="todo-icon fui-video-16" style="padding:0px;margin:5px 5px 0 20px;"></div>
				   		<div class="accordion-inner">
				   			Device
				   		</div>
				   		<div class="todo-icon fui-cross-16" style="padding:0px;margin:5px 5px 0 20px;"></div>
				   		<div class="accordion-inner">
				   			Log-out
				   		</div>
				   	</div>
				</div>
			</div>
			<div class="span12" style="width:960px;">
				<div class="navbar navbar-inverse">
					<div class="navbar-inner">
						<div class="container">
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li>
										<a href="/">
											Home
										</a>
									</li>
									<li >
										<a href="/support.php">
											Support
										</a>
									</li>
									<li>
										<a href="/how.php">
											How it Works
										</a>
									</li>
									<li>
										<a href="/about.php">
											About Us
										</a>
									</li>
								</ul>
							</div><!--/.nav-collapse -->
						</div><!--container-->
					</div><!--navbar-inner-->
				</div>
			</div>		
		</header>
