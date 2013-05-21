<?php 
	include("header.php");
 ?>
<html>
<head>
	<title>Simple Map</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<style>
		#map-canvas {
			  position:relative;
			  margin:10px 10px 10px 10px;
			  height: 200px;
			  width:400px;
		  }
		  #map-bar{
			  position:absolute;
			  border:1px solid;
			  margin:100px 10px 10px 100px;
			  border-radius:5px;
			  box-shadow: 2px 2px 2px #888888;
			  height:220px;
			  width:420px;
		  }
		  #name-card{
			  position:absolute;
			  border:1px solid;
			  margin:100px 10px 10px 100px;
			  border-radius:5px;
			  box-shadow: 2px 2px 2px #888888;
			  height:220px;
			  width:420px;
		  }
	</style>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script>
	var map;
	function initialize() {
	  var mapOptions = {
		zoom: 8,
		center: new google.maps.LatLng(0, 0),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	  map = new google.maps.Map(document.getElementById('map-canvas'),
		  mapOptions);
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</head>
<body>
	<div id="map-bar">
		<div id="map-canvas"></div>
	</div>
</body>
</html>