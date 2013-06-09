<!DOCTYPE html> 
<html lang="en">
<head>
	  <meta charset="utf-8">
	  <!-- Le styles -->
	  <title>BlueRise</title>
	  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	  <link href="lib/css/bootstrap.css" rel="stylesheet">
	  <link href="lib/css/flat-ui.css" rel="stylesheet">
	  <script src="lib/js/jquery.js"></script>
	  <link rel="shortcut icon" href="lib/images/favicon.ico">
	  <style>
		  .demo-panel-title {
			  margin-left:20px;
		  }
		  #header {
			  width:1000px;
			  height:160px;
			  clear:both;
			  margin-left: auto;
			  margin-right:auto;
		  }
		  #footer {
			  clear: both;
			  margin-top: 40px;
			  width:1000px;
			  z-index: 10;
			  height: 3em;
			  white-space:nowrap;
			  height:100px;
		  }

		  .container {
			  margin-left: auto;
			  margin-right:auto;
			  width: 960px;
		  }
		  .bar-icon {
			  margin-left:10px;
		  }
		  .word {
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
		  a {
		  	text-decoration: none;
		  	color: rgb(52, 73, 94);
		  }
		  a:hover {
		  	color: #c90016;
		  }
	  </style>
		<style type="text/css">
		  body {
		    padding-top: 20px;
		    padding-bottom: 40px;
		  }
		
		  /* Custom container */
		  .container-narrow {
		    margin: 0 auto;
		    max-width: 700px;
		  }
		  .container-narrow > hr {
		    margin: 30px 0;
		  }
		
		  /* Main marketing message and sign up button */
		  .jumbotron {
		    margin: 60px 0;
		    text-align: center;
		  }
		  .jumbotron h1 {
		    font-size: 72px;
		    line-height: 1;
		  }
		  .jumbotron .btn {
		    font-size: 21px;
		    padding: 14px 24px;
		  }
		
		  /* Supporting marketing content */
		  .marketing {
		    margin: 60px 0;
		  }
		  .marketing p + h4 {
		    margin-top: 28px;
		  }
		</style>
	  <script src="lib/js/bootstrap-transition.js"></script>
	  <script src="lib/js/bootstrap-collapse.js"></script>
	  <script src="lib/js/bootstrap-modal.js"></script>

</head>

<body>
	<div class="container">
		<header id="header">
			<h1 class="demo-panel-title">BlueRise</h1>
			<div class="span12" style="width:960px;">
				<div class="navbar navbar-inverse">
					<div class="navbar-inner">
						<div class="container">
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li >
										<a href="HowWorkBefore.php">
											How it Works
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
		</header>
		<hr>
		<div class="jumbotron">
			<h1>How BlueRise works</h1>
			<p class="lead">The Internet of Things was an idea. Now it’s a reality. Right now on the BlueRise platform, developers and companies are connecting devices and apps to securely store and exchange data. It’s the one solution that brings big ideas about the world to the world.</p>
			<a class="btn btn-large btn-info" href="index.php">Sign up today</a>
		</div>

		<hr>

		<div class="row-fluid marketing">
		<div class="span6">
			<h4>Connect your device</h4>
			<p>Prototype with Arduino, configure commercial fitness trackers, energy monitors and air quality sensors.</p>

			<h4>Control, monitor and analyze</h4>
			<p>Customize your console to track device state and location, add alerts and notifications, and review historical activity.</p>

			<h4>Handle real-time data</h4>
			<p>Push and pull XML, JSON and CSV data to our secure and scalable RESTful API and socket-server for bi-directional interaction between devices and the web.</p>
		</div>

		<div class="span6">
			<h4>Search for devices</h4>
			<p>Query for devices and sensors by user, location, tag and unit or find commercial products that are pre-configured for Cosm.</p>

			<h4>Find interesting data</h4>
			 <p>Browse and search to discover what’s happening right now, both near you and throughout the world.</p>

			<h4>Collaborate with others</h4>
			<p>Get help from other developers, follow people and devices and build communities and conversations around data.</p>
			</div>
		</div>
		<hr>
		
		
			<?php include("footer.php"); ?>
		
		
		  </body>
		</html>
		