<!DOCTYPE html>

<html lang="en">
	<head>
		<link href="lib/css/bootstrap.css" rel="stylesheet">
		<link href="lib/css/flat-ui.css" rel="stylesheet">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script LANGUAGE="JavaScript"> 
  		<!-- 
  		function openwin() { 
  		window.open ("lostPassWord.php", "newwindow", "height=400, width=400, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, 	status=no") //写成一行
  } 
  //--> 
  </script> 
	 </head>
	 <body>
		<div class="container-fluid" style="white-space:nowrap;">
			<h1 class="demo-panel-title offset1">BlueRise</h1>
			<div class="row demo-row">
				<div class="offset1">
					<header>
					<div class="navbar navbar-inverse">
						<div class="navbar-inner" style="width:1048px;">
							<div class="container">
								<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="nav-collapse collapse">
									<ul class="nav">
										<li>
											<a href="#">
												Home
												<span class="navbar-unread">1</span>
											</a>
										</li>
										<li>
											<a href="support.html">
												Support
												<span class="navbar-unread">1</span>
											</a>
										</li>
										
										<li>
											<a href="#">
												How it works
												<span class="navbar-unread">1</span>
											</a>
										</li>
										<li>
											<a href="#">
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
				</div>
				<div class="row demo-samples offset1"  style="width:1048px;white-space:nowrap;">
					
						<div class="span5">
							<div class="tile">
								<ul>
									<li>
										<div class="todo-content">
											<div class="todo-icon fui-man-16"></div>
											<div class="control-group inactive">
												<input type="text" class="login-field" value="" placeholder="Enter your username" id="login-name" />
											</div>
										</div>
				 
									</li>

									<li>
										<div class="todo-icon fui-lock-16"></div>
										<div class="todo-content">
											<div class="control-group inactive">
												<input type="password" class="login-field" value="" placeholder="Password" id="login-pass" />
											</div>
										</div>
									</li>
								</ul>
							</div><!-- tile -->
		  
							<div class="span4 " style="margin-top:20px";>
								<a class="btn btn-large btn-block btn-info">Login</a>
							</div>
							<div class="span4"><a class="login-link" onclick="openwin()">Lost your password?</a></div>
							<div class="span4 "style="margin-top:10px";>
								<a  href="#myModal"data-toggle="modal" role="button" class="btn btn-large btn-block btn-primary">Register</a>
							</div>
						</div>
						<div class="span7 demo-video" style="white-space:nowrap;">
							<!--[if !IE]> -->
							<video class="video-js" controls
								preload="auto" width="620" height="349" poster="images/video/poster.jpg" data-setup="{}">
								<source src="video/big_buck_bunny.mp4" type="video/mp4">
								<source src="video/big_buck_bunny.webm" type="video/webm">
							</video>
							<!-- <![endif]-->

								<!--[if IE]>
								<video class="video-js" controls
								preload="auto" width="620" height="256" poster="http://video-js.zencoder.com/oceans-clip.jpg" data-setup="{}">
								<source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4'/>
								<source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm'/>
								</video>
								<![endif]-->
						</div> <!-- /video -->
					
				</div>
			</div>
		</div>
		<footer class="offset1"style="width:1048px;white-space:nowrap;">
			<div class="container"style="width:1048px;white-space:nowrap;">
				<div class="row">
					<table class="span12">
						<div class="span2"><a href="#">site map</a></div>
						<div class="span2"><a href="#">Join us</a></div>
						<div class="span2"><a href="#">Privacy policy</a></div>
						<div class="span2"><a href="#">Team of use</a></div>
						<div class="span2"><a href="#">contact</a></div>
						<div class="span12">
						<h4>Where the Internet of things is being built</h4>
						<p>Connect devices and apps on the BlueRise platform,
							exchange data and ideas with developers, and bring smart
							products to the world!</p>
						</div>
								
					</table>
						
				</div>
					
			</div><!--container-->
		</footer>
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div style="margin:20px;">
		<h3>Register</h3>
		<div class="row">
        <div class="span6">
          <input name="email"type="email" value="" placeholder="BlueRise@BlueRise.com" class="span6" />
        </div>
		</div>
		<div class="row">
        <div class="span6">
          <input name="Password"type="password" value="" placeholder="Password" class="span6" />
        </div>
		</div>
		<div class="row">
        <div class="span6">
          <input name="Password2"type="password" value="" placeholder="Confirm Password" class="span6" />
        </div>
		</div>
		
		<div class="row">
		<div class="span3">
          <input type="submit"class="btn btn-large btn-block btn-info" value="Submit" onclick="vali()">
        </div>
		<div class="span3">
          <input type="submit"class="btn btn-large btn-block btn-primary" data-dismiss="modal" aria-hidden="true" value="Cancel" >
        </div>
		</div>
		</div>
		</div>
		 <!-- Placed at the end of the document so the pages load faster -->
     <script src="lib/js/jquery.js"></script>
    <script src="lib/js/bootstrap-transition.js"></script>
     <script src="lib/js/bootstrap-modal.js"></script>
    <script src="lib/js/bootstrap-collapse.js"></script>
	</body>
	<html>
		
		