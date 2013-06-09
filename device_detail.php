<?php
	include("_func_info.php");
	$deviceid = $_GET["id"];
	$result_device = mysqli_query($dbcon, "select * from $tb_device where id='$deviceid';") or die("Query device data failed!");
	$device = mysqli_fetch_array($result_device);
	$lat = $device["latitude"];
	$lng = $device["longitude"];
	if($lat == '')
		$lat = 39.92;
	if($lng == '')
		$lng =  116.46;
	
	$css = "<style>
		#map-canvas {
			  position:relative;
			  margin:10px 10px 10px 10px;
			  height: 300px;
			  width:440px;
		  }
		  #map-bar{
			  border:1px solid;
			  margin: 0px 20px 10px 20px;
			  border-radius:5px;
			  box-shadow: 2px 2px 2px #888888;
			  height: 320px;
			  width: 460px;
			  float: left;
		  }
		  #container{
			  margin-left:auto;
			  margin-right:auto;
		  }
		  #name-card{
			  border:1px solid;
			  margin:0px 0px 10px 520px;
			  border-radius:5px;
			  box-shadow: 2px 2px 2px #888888;
			  height:320px;
			  width:460px;
		  }
		  .namecard-row{
		  	margin:0 auto;
		  	padding-top:15px;
		  	height:30px;
		  	width:90%;
		  }
		
		.itemTitle {
		  font-weight:bold;
		  color: inherit;
		  float: left;
		  font-size: 20px;
		  height:30px;
		  width:45%;
		}
		.item{
		  	  font-weight:bold;
		  	  font-size: 20px;
		  	  color: inherit;
		  	  height:30px;
		  	  width: 45%;
		  	  float:right;
		    }
		.Area{
			  padding:3px;
		  	  border-radius: 5px;
		  	  border: 1px #000 solid;
		  	  font-size: 15px;
		  	  color: inherit;
		  	  font-weight: bold;
		  	  height:120px;
		  	  width:90%;
		  	  margin:0 auto;
		    }
		.data-bar {
		    border-radius: 5px;
		    border: 1px #000 solid;
		    box-shadow: 2px 2px 2px #888888;
		    height: 180px;
		    width: 960px;
		    margin: 20px;
		}
		.meta {
			width: 140px;
			height: 160px;
			float: left;
			padding-left: 14px;
		}
		.meta .description {
			font-size: 16px;
			color: #C0392B;
		}
		.meta .data {
			font-size: 16px;
			color: #F39C12;
			margin-top: 4px;
			font-size: 40px;
		}
		.meta .date {
			font-size: 15px;
			color: #34495E;
			font-family: 'Helvetica Neue', Arial, sans-serif;
			font-weight: bold;
		}
		.chart {
			width: 800px;
			height: 180px;
			float: left;
		}
	</style>
	";

	$script = "
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
	<script>
		var deviceCenter = new google.maps.LatLng(".$lat.",".$lng.")
		var map;
		function initialize() {
			var mapOptions = {
				zoom: 8,
				center: deviceCenter,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
		 	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		 	
		 	var marker = new google.maps.Marker({
		 		position:deviceCenter,
		 		title:'Click to zoom'
		 	});
		  	marker.setMap(map);
		  	
		  	google.maps.event.addListener(marker,'click',function() {
		  		map.setZoom(9);
		  		map.setCenter(marker.getPosition());
		  	});
		  	google.maps.event.addListener(map,'center_changed',function() {
		  	  window.setTimeout(function() {
		  		map.panTo(marker.getPosition());
		  	  },2000);
		  	  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<script type='text/javascript' src='https://www.google.com/jsapi'></script>
	</style>";

$stmt = mysqli_stmt_init($dbcon);
$query = "select * from $tb_data where deviceid = ?;";
mysqli_stmt_prepare($stmt, $query) or die("fail on prepare");
mysqli_stmt_bind_param($stmt, 'i', $deviceid);
mysqli_stmt_execute($stmt) or die("failed");

$result = mysqli_stmt_get_result($stmt);

$data_array = array();
while ($row = mysqli_fetch_array($result)) {
	$typeid = $row['typeid'];
	if (!array_key_exists($typeid, $data_array)) {
		$data_array["$typeid"] = array();

		// get meta data
		$meta_stmt = mysqli_stmt_init($dbcon);
		$meta_query = "select * from $tb_datatype where id = ?;";
		mysqli_stmt_prepare($meta_stmt, $meta_query) or die("fail on prepare");
		mysqli_stmt_bind_param($meta_stmt, 'i', $typeid);
		mysqli_stmt_execute($meta_stmt) or die("failed");
		$meta_result = mysqli_stmt_get_result($meta_stmt);
		$meta_row = mysqli_fetch_array($meta_result);

		$unit = $meta_row['unit'];
		$description = $meta_row['description'];

		array_push($data_array["$typeid"], array($unit, $description));
	}

	$date = new DateTime($row['time']);
	$data_item = array($date->format("m.d H:i"), $row['data']);
	array_push($data_array["$typeid"], $data_item);
}

$data_json = json_encode($data_array);

$script .= <<<EOF
<script>
var all_data = $data_json;

google.load("visualization", "1", {packages:["corechart"]});

$(function() {
	for (typeid in all_data) {
		var one_data = all_data[typeid];
		var last_data = one_data[one_data.length - 1][1];
		if (last_data.toString().length > 5) {
			last_data = last_data.toFixed(2);
		}
		$('#container').append('<div class="data-bar">\
	<div class="meta">\
		<h2 class="description">' + one_data[0][1] + '</h2>\
		<p class="data">' + last_data + one_data[0][0] + '</p>\
		<date class="date">' + one_data[one_data.length - 1][0] + '</date>\
	</div>\
	<div class="chart" id="chart-' + typeid + '"></div>\
</div>');

		var max_length = 15;
		if (one_data.length > max_length + 1) {
			one_data = [one_data[0]].concat(one_data.slice(-max_length));
		}
		var data = google.visualization.arrayToDataTable(one_data);
		var options = {
			legend: {position: 'none'},
			chartArea: { left: 30, top: 15, width: 770, height: 130}
		};
		var chart = new google.visualization.LineChart(document.getElementById('chart-' + typeid));
		chart.draw(data, options);
	}
});</script>"
EOF;

include("header.php");
?>
		<div id="map-bar">
			<div id="map-canvas"></div>
		</div>
		<div id="name-card">
			<div class="namecard-row" style="margin-top:10px;">
				<div class="itemTitle">
					<span class="fui-cmd-24"></span>
					Device Id
				</div>
				<div class="item">
					<?php echo $device["id"] ?>
				</div>
			</div>
			<div class="namecard-row">
				<div class="itemTitle">
					<span class="fui-video-24"></span>
					Device name
				</div>
				<div class="item">
					<?php echo $device["deviceName"] ?>
				</div>
			</div>
			<div class="namecard-row">
				<div class="itemTitle">
					<span class="fui-new-24"></span>
					Description
				</div>
			</div>
			<div class="Area">
				<?php echo $device["description"] ?>
			</div>
			<div class="namecard-row">
				<button class="btn btn-primary" onclick="location.href='<?php echo $editdevicepage."?id=".$deviceid ?>'">Edit</button>
			</div>
		</div>
	</div>
</body>
</html>