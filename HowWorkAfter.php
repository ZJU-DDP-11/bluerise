<?php
	session_start();
	include("_func_info.php");

	if ($_SESSION["userid"]==null) {
		gotoThePage($homepage);
		exit;
	}
	$css = <<<CSS
	<style type="text/css">
	  body {
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
CSS;
	
	include 'header.php';
?>
		<hr>
		<div class="jumbotron">
			<h1>How BlueRise works</h1>
		    <p class="lead">The Internet of Things was an idea. Now it’s a reality. Right now on the BlueRise platform, developers and companies are connecting devices and apps to securely store and exchange data. It’s the one solution that brings big ideas about the world to the world.</p>
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
