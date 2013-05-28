<?php
session_start();
include("_func_info.php");
/*
if ($_SESSION["authen"]==false) {
	gotoThePage($homepage);
	exit;
}
 */
$css = "
		<style>
		  #map-bar{
			  padding:10px;
		  	  border:1px solid;
		  	  margin: 0 auto;
		  	  border-radius:5px;
		  	  box-shadow: 2px 2px 2px #888888;
		  	  height:380px;
		  	  width:500px;

		    }
		</style>";

$script = <<<SCRIPT
	<script
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>
	<script>
	var map;
	var myCenter=new google.maps.LatLng(51.508742,-0.120850);
	var marker;
	var infowin;

	function initialize()
	{
		var mapConfig = {
			center:myCenter,
			zoom:5,
			mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("googleMap"),mapConfig);

	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
		});
	}

	function placeMarker(location) {
		if(marker){
		 	marker.setMap(null);
		}

		marker = new google.maps.Marker({
			position: location,
			map: map,
			title: 'My Device Location'
		});
		infowin = new google.maps.InfoWindow({
			content: 'Your Device\'s Location:<br>'+'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
	  	});
	  	infowin.open(map,marker);

	  	google.maps.event.addListener(marker, 'click', function() {
	  		infowin.open(map, this);
	  	});
	}
	function GetMarker()
	{
		var lng = marker.getPosition().lng();
		var lat = marker.getPosition().lat();
		document.getElementById("lng").value = lng;
		document.getElementById("lat").value = lat;
		return true;
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
SCRIPT;
 include 'header.php'; ?>


<form method="post" action="_manage_device.php">
	<div class="container">
		<!-- <?php
		$deviceid = $_POST['id'];
		$result = mysqli_query($dbcon, "select * from $tb_device where id='$deviceid';") or die("database Fail selection!");			
		/*
		if (mysqli_num_rows($result) == 0) {
			echo "<h1>No Such Device!</h1>";
			exit;
		}
		 */

		$row = mysqli_fetch_array($result);
		?> -->
		
		<h3 class="demo-panel-title offset1" align="center">Device Info</h3>
		<div id="map-bar">
			<div id="googleMap" style="width:500px;height:380px;margin:0 auto;"></div>
		</div>
		<div class="container">
			<div class="span8 offset2"><h4>Device ID is : <?php echo $row['id']?></h4>
			</div>
			<div class="span3 offset2">
				<input name="deviceName" type="text" value="<?php echo $row['deviceName']; ?>" placeholder="device name" class="span3" />
			</div>
			<div class="span8 offset2">
				<textarea name="description" value="<?php echo $row['description']; ?>" placeholder="Description" rows="5" class="span8"></textarea>
			</div>
		</div>
		<input id='lng' name="longitude" type="hidden" value=''>
		<input id='lat' name="latitude" type="hidden" value=''>
		<div class="row demo-row">
			<div class="span3 offset2">
				<input type="submit" class="btn btn-large btn-block btn-success" value="Save" onclick="return GetMarker();">
			</div>
			<div class="span3 offset1">
				<a href="device.php" class="btn btn-large btn-block btn-warning">Cancel</a>
			</div>
		</div>
	</div>
</form>

<?php include 'footer.php'; ?>
