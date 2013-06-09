<?php
session_start();
include("_func_info.php");
/*
if ($_SESSION["authen"]==false) {
	gotoThePage($homepage);
	exit;
}
 */
 $deviceid = addslashes($_GET['id']);
 $userid = $_SESSION['userid'];
 $cmd = "select * from $tb_device where id='$deviceid' and userid = '$userid';";
 //echo $cmd;
 $result = mysqli_query($dbcon, $cmd) or die("database Fail selection!");
 $row = mysqli_fetch_array($result);
 
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

if($row['longitude'] == NULL || $row['latitude'] == NULL )
{
	$script ="
		<script
		src='http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false'>
		</script>
		<script>
		var map;
		var myCenter=new google.maps.LatLng(39.92,116.46);
		var marker;
		var infowin;
	
		function initialize()
		{
			var mapConfig = {
				center:myCenter,
				zoom:5,
				mapTypeId:google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById('googleMap'),mapConfig);
	
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
	
	             document.getElementById('lng').value = location.lng();
	             document.getElementById('lat').value = location.lat();
		}
	
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>";
}else
{
	$script = "
	<script
	src='http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false'>
	</script>
	<script>
	var map;
	var marker;
	var infowin;
	var myCenter = new google.maps.LatLng(".$row['latitude'].", ".$row['longitude'].");

	function initialize()
	{
		var mapConfig = {
			center:myCenter,
			zoom:8,
			mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('googleMap'),mapConfig);
	
	marker = new google.maps.Marker({
		map: map,
		position: myCenter,
		title:  'My Device Location'
	});
	
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

			 document.getElementById('lng').value = location.lng();
			 document.getElementById('lat').value = location.lat();
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>";
}


 include 'header.php'; ?>


<form method="post" action="_manage_device.php">
	<div class="container">
		<?php		

		if (mysqli_num_rows($result) == 0) {
			echo "<h1>No Such Device!</h1>";
			exit;
		}
		?> 
		
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
			<div class="span3 offset1">
				type
				<select name='deviceType'>
					<option value=0>Default</option>
					<option value=1 <?php if ($row['type'] == 1) echo "selected"; ?>>Humidity</option>
					<option value=2 <?php if ($row['type'] == 2) echo "selected"; ?>>Luminance</option>
					<option value=3 <?php if ($row['type'] == 3) echo "selected"; ?>>Temperature</option>
				</select>
			</div>
			<div class="span8 offset2">
				<textarea name="description" placeholder="Description" rows="5" class="span8"><?php echo $row['description']; ?></textarea>
			</div>
		</div>
		<input id='lng' name="longitude" type="hidden" value=''>
		<input id='lat' name="latitude" type="hidden" value=''>
		
		<input name = 'id' type = "hidden" value = '<?php echo $deviceid;?>'>
		<div class="row demo-row">
			<div class="span3 offset3">
				<input type="submit" class="btn btn-large btn-block btn-success" value="Save" onclick="return GetMarker();">
			</div>
			<div class="span3 offset1">
				<a href="device.php" class="btn btn-large btn-block btn-warning">Cancel</a>
			</div>
		</div>
	</div>
</form>

<?php include 'footer.php'; ?>

