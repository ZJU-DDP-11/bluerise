<!DOCTYPE html>

<html lang="en">
	<head>
		<link href="lib/css/bootstrap.css" rel="stylesheet">
		<link href="lib/css/flat-ui.css" rel="stylesheet">
		<title>BlueRise</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="lib/js/jquery.js"></script>
		<script src="lib/js/bootstrap-transition.js"></script>
		<script src="lib/js/bootstrap-modal.js"></script>
		<script src="lib/js/bootstrap-collapse.js"></script>
		<script LANGUAGE="JavaScript"> 
			
			function openwin() { 
			window.open ("lostPassWord.php", "newwindow", "height=400, width=400, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, 	status=no"); //写成一行
			} 
		</script> 
	 </head>
	 <body>
		<div class="container">
			<h1>BlueRise</h1>
			<div class="row demo-row">
				<header class="span12">
				<div class="navbar navbar-inverse">
					<div class="navbar-inner">
						<div class="container">
							<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li>
										<a href="index.php">
											Home
											<span class="navbar-unread">1</span>
										</a>
									</li>
									<li>
										<a href="support.php">
											Support
											<span class="navbar-unread">1</span>
										</a>
									</li>
									
									<li>
										<a href="how.php">
											How it Works
											<span class="navbar-unread">1</span>
										</a>
									</li>
									<li>
										<a href="about.php">
											About Us
											<span class="navbar-unread">1</span>
										</a>
									</li>
								</ul>
							</div><!--/.nav-collapse -->
						</div><!--container-->
					</div><!--navbar-inner-->
					</header>
				</div>
				<div class="row">
					<div class="span4">
						<div class="tile">
							<ul>
								<li>
									<div class="todo-content">
										<div class="todo-icon fui-man-16"></div>
										<form action="_login.php" method="POST">
										<div class="control-group inactive">
											<input type="text" name="email"class="login-field" value="" placeholder="Enter your username" id="login-name" style="width: 160px; margin: 5px 0 0 0;" />
										</div>
									</div>
			 
								</li>

								<li>
									<div class="todo-icon fui-lock-16"></div>
									<div class="todo-content">
										<div class="control-group inactive">
											<input type="password"name="password" class="login-field" value="" placeholder="Password" id="login-pass" style="width: 160px; margin: 5px 0 0 0;" />
										</div>
									</div>
								</li>
							</ul>
							<div class="span3" style="margin-top:20px";>
								<input type="submit" class="btn btn-large btn-block btn-info" value="Login">
							</div>
							</form>
							<div class="span3"><a class="login-link" data-toggle="modal" role="button" href="#lostModal">Lost your password?</a></div>
							<div class="span3" style="margin-top:10px";>
								<a  href="#myModal" data-toggle="modal" role="button" class="btn btn-large btn-block btn-primary">Register</a>
							</div>
							<br clear="both">
						</div><!-- tile -->
					</div>
					<div class="span8 demo-video">
						<!--[if !IE]> -->
						<video class="video-js" controls
							preload="auto" width="620" height="349" poster="images/video/poster.jpg" data-setup="{}">
							<source src="video/big_buck_bunny.mp4" type="video/mp4">
							<source src="video/big_buck_bunny.webm" type="video/webm">
						</video>


					</div> <!-- /video -->
				</div>
			</div>
		</div>
		<footer style="margin-top: 30px;">
			<div class="container">
				<div class="row">
					<h3 class="footer-title">Where the Internet of things is being built</h3>
					<p>Connect devices and apps on the BlueRise platform,<br />exchange data and ideas with developers,<br />and bring smart
						products to the world!</p>
					<p><br /></p>
				</div>
			</div><!--container-->
		</footer>
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        	<div style="margin:20px;text-align:center;">
				<h3>Register</h3>
		        <form action="_register.php" method="POST">
					<div class="row">
			        	<div class="span6">
			        		<input name="email" required="required"type="email" value="" placeholder="BlueRise@BlueRise.com" class="span6" />
			        	</div>
					</div>
					<div class="row">
			        	<div class="span6">
			        		<input name="Password"required="required"type="password" value="" placeholder="Password" class="span6" />
			        	</div>
					</div>
					<div class="row">
			        	<div class="span6">
			        		<input name="Password2"  required="required"  type="password" onchange="validate_password()" placeholder="Confirm Password" class="span6" />
			        	</div>
					</div>
					<div class="row">
						<div class="span3">
			        		<input type="submit"class="btn btn-large btn-block btn-info" value="Submit">
			        	</div>
						<div class="span3">
			        		<input type="submit"class="btn btn-large btn-block btn-primary" data-dismiss="modal" aria-hidden="true" value="Cancel" >
			        	</div>
					</div>
	        	</form>
			</div>
		</div>
		<div id="lostModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="lostModalLabel" aria-hidden="true" style="width:400px;">
			<div style="margin:20px;text-align:center;">
				<h3>lost your password?</h3>
				<div>
			    	<form action="_sendEmail.php" method="GET">
			    		<input class="span3"type="email" name="email" placeholder="Enter your e-mail address" style="margin:0 auto;width:340px">
			    		<input class="btn btn-large btn-block btn-primary" type="submit" value="submit" style="margin:0px auto;width:200px;" onclick="location.href='index.php'">
			    	</form>
			    </div>
			</div>
		</div>
	</body>
	<html>

	
		
		