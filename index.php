<?php include 'header.php'; ?>
	<div class="container">					
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
			<div class="span4"><a class="login-link" href="#">Lost your password?</a></div>
			<div class="span4 "style="margin-top:10px";>
				<a  href="#myModal"data-toggle="modal" role="button" class="btn btn-large btn-block btn-primary">Register</a>
			</div>
		</div>
		<div class="span7 demo-video" style="white-space:nowrap;">
			<video class="video-js" controls
				preload="auto" width="620" height="349" poster="images/video/poster.jpg" data-setup="{}" style="width:560px;">
				<source src="video/big_buck_bunny.mp4" type="video/mp4">
				<source src="video/big_buck_bunny.webm" type="video/webm">
			</video>
		</div>
	</div>
<?php include 'footer.php'; ?>