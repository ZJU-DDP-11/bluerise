<?php
	$css = "<style>
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
		  .namecard-row{
		  	margin:0 auto;
		  	padding-top:15px;
		  	height:30px;
		  	width:90%;
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
		    .itemTitle{
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
		  	  border-radius: 5px;
		  	  border: 1px #000 solid;
		  	  font-size: 15px;
		  	  color: inherit;
		  	  font-weight: bold;
		  	  height:120px;
		  	  width:90%;
		  	  margin:0 auto;
		  	  
		    }
	</style>
	";
	$script = "
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
	<script>
		var deviceCenter = new google.maps.LatLng(39.92,116.46)
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
	</script>";
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
					API Key
				</div>
			</div>
			<div class="namecard-row">
				<div class="itemTitle">
					<span class="fui-video-24"></span>
					Device name
				</div>
				<div class="item">
					My device
				</div>
			</div>
			<div class="namecard-row">
				<div class="itemTitle">
					<span class="fui-new-24"></span>
					Description
				</div>
			</div>
			<div class="Area">
				Description
			</div>
			<div class="namecard-row">
				<button class="btn btn-primary" onclick="location.href='#'">Edit</button>
			</div>
		</div>
		<div id="data-bar">
		</div>
		<div id="chart-bar">
		</div>
	</div>
</body>
</html>