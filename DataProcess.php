<?php 
	include("header.php");
 ?>
<html>
<head>
	<title>Simple Map</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<style>
		.row{
			
		}
		#map-canvas {
			  position:relative;
			  margin:10px 10px 10px 10px;
			  height: 300px;
			  width:440px;
		  }
		  #map-bar{
			  position:absolute;
			  border:1px solid;
			  margin: 80px 20px 10px 20px;
			  border-radius:5px;
			  box-shadow: 2px 2px 2px #888888;
			  height:320px;
			  width:460px;
		  }
		  #container{
			  margin-left:auto;
			  margin-right:auto;
		  }
		  #name-card{
			  position:absolute;
			  border:1px solid;
			  margin:80px 0px 10px 520px;
			  border-radius:5px;
			  box-shadow: 2px 2px 2px #888888;
			  height:320px;
			  width:460px;
		  }
	</style>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
</head>
<body>
	<div id="container" style="width:960px">
		<div id="map-bar">
			<div id="map-canvas"></div>
		</div>
		<div id="name-card">
			<div class="row">
				<span class="badge badge-success">1</span>
				<div class="itemTitle">
					
				</div>
				<div class="item">
					
				</div>
			</div>
			<div class="row">
				<div class="itemTitle">
					
				</div>
				<div class="item">
					
				</div>
			</div>
			<div class="row">
				<div class="itemTitle">
					
				</div>
				<div class="item">
					
				</div>
			</div>
			<div class="row">
				<div class="itemTitle">
					
				</div>
				<div class="item">
					
				</div>
			</div>
		</div>
		<div id="data-bar">
		</div>
		<div id="chart-bar">
		</div>
	</div>
</body>
</html>
<script>
var map;
function initialize() {
  var mapOptions = {
	zoom: 8,
	center: new google.maps.LatLng(39.92,116.46),
	mapTypeId: google.maps.MapTypeId.ROADMAP
};
  map = new google.maps.Map(document.getElementById('map-canvas'),
	  mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>