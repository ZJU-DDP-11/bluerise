<html lang="en">
<head>
	  <meta charset="utf-8">
	  <!-- Le styles -->
	  <link href="lib/css/bootstrap.css" rel="stylesheet">
	  <link href="lib/css/flat-ui.css" rel="stylesheet">
	  <style>
		  .demo-panel-title{
			  margin-left:20px;
		  }
		  #container{
			  margin-left: auto;
			  margin-right:auto;
			  width: 960px;
		  }
		  .bar-icon {
			  margin-left:10px;
		  }
		  .word{
			  overflow:hidden;
		  }
		  #accordion2 {
		  	margin-left: 760px;
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
	  <script src="lib/js/jquery.js"></script>
	  <script src="lib/js/bootstrap-transition.js"></script>
	  <script src="lib/js/bootstrap-collapse.js"></script>
</head>
<body>
<div id="container">
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
								<a href="#">
									Home
								</a>
							</li>
							<li >
								<a href="#">
									Support
								</a>
							</li>
							<li>
								<a href="#">
									How it works
								</a>
							</li>
							<li>
								<a href="#">
									About Us
								</a>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--container-->
			</div><!--navbar-inner-->
		</div>
	</div>
</div>
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
  