<?php
	session_start();
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
			  position:absolute;
			  border:1px solid;
			  margin: 0px 20px 10px 20px;
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
		#data-bar {
		    border-radius: 5px;
		    border: 1px #000 solid;
		    box-shadow: 2px 2px 2px #888888;
		    position:absolute;
		    height: 160px;
		    width: 960px;
		    top: 520px;
		    margin-left: 20px;
		}
		#data {
			width: 146px;
			height: 160px;
			float: left;
			padding-left: 14px;
		}
		#data h2 {
			font-size: 16px;
			color: #c90016;
		}
		#data p {
			font-size: 16px;
			color: #ffb515;
			margin-top: 4px;
			font-size: 40px;
		}
		#data date {
			font-size: 15px;
			color: #bbb;
			font-family: 'Helvetica Neue', Arial, sans-serif;
			font-weight: bold;
		}
		#chart {
			width: 800px;
			float: left;
		}
	</style>
	";

	$script ="
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
	<script src='http://d3js.org/d3.v3.min.js'></script>
	<style type='text/css'>
	div.tooltip {
	  position: absolute;
	  text-align: center;
	  padding: 6px 8px;
	  font: 12px sans-serif;
	  background: #ffb515;
	  border-radius: 6px;
	  color: white;
	}
	</style>

	<script type='text/javascript'>
	$(function() {
	var data_x = [4, 5, 6, 7, 8, 9, 10, 11, 12, 1, 2, 3];
	var data_y = [2660.43, 630.76, 998.77, 2728.24, 316.95, 523.00, 286.97, 1547.14, 1131.29, 2676.57, 559.24, 698.57];
	var data_max = 2728.24;

	var x_count = 12;
	var width = 800;
	var height = 150;

	function calcx(pos) {
	  return ((width - 50) / (x_count - 1)) * pos + 15;
	}
	function calcy(data, max) {
	  return height - (data / max) * (height - 50) - 30;
	}

	function maketm(tmid, tmdata, tmdmax) {
	  var svg = d3.select(tmid)
	    .append('svg')
	    .attr('width', width)
	    .attr('height', height)
	    .attr('style', 'overflow: hidden; position: relative;');
	  
	  var pathset = [];
	  for (var dp = 0; dp < tmdata.length - 1; dp++) {
	    pathset.push('M'+(calcx(dp))+','+(calcy(tmdata[dp], tmdmax))+'L'+(calcx(dp+1))+','+(calcy(tmdata[dp+1], tmdmax)));
	  }
	  svg.selectAll('path')
	    .data(pathset)
	    .enter()
	    .append('path')
	    .attr('style', '-webkit-tap-highlight-color: rgba(0, 0, 0, 0);')
	    .attr('fill', 'none')
	    .attr('stroke', '#d8e5eb')
	    .attr('d', function(d) {
	      return d;
	    })
	    .attr('stroke-width', '4px');
	  
	  var tooltip = d3.select('body').append('div')   
	    .attr('class', 'tooltip')               
	    .style('opacity', 0);

	  var circles = svg.selectAll('circle')
	    .data(tmdata)
	    .enter()
	    .append('circle')
	    .attr('style', '-webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: pointer;')
	    .attr('r', 5)
	    .attr('fill', '#ffffff')
	    .attr('stroke', '#cee2e9')
	    .attr('stroke-width', '2.5px')
	    .attr('cx', function(d, i) {
	      return calcx(i);
	    })
	    .attr('cy', function(d) {
	      return calcy(d, tmdmax);
	    })
	    .on('mouseover', function(d, i) {
	      d3.select(this).style('stroke', '#ffb515');
	      tooltip.transition()        
	        .duration(200)      
	        .style('opacity', .9);      
	      tooltip.html(d)
	        .style('left', d3.event.pageX + 'px')     
	        .style('top', d3.event.pageY - 30 + 'px'); 
	    })
	    .on('mouseout', function() {
	      d3.select(this).style('stroke', '#cee2e9');
	      tooltip.transition()
	        .duration(200)
	        .style('opacity', 0);
	    });

	  svg.selectAll('text')
	     .data(data_x)
	     .enter()
	     .append('text')
	     .attr('style', '-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: Arial;')
	     .attr('x', function(d, i) {
	       return calcx(i);
	     })
	     .attr('y', height - 10)
	     .attr('text-anchor', 'middle')
	     .attr('font-size', '12px')
	     .attr('font-family', 'Arial')
	     .attr('stroke', 'none')
	     .attr('fill', '#cee2e9')
	     .append('tspan')
	     .attr('style', '-webkit-tap-highlight-color: rgba(0, 0, 0, 0);')
	     .attr('dy', '4.1640625')
	     .text(function(d) {
	       return d + '月'
	     });
	}

	maketm('#chart', data_y, data_max);
	});
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
				<button class="btn btn-primary" onclick="location.href='edit_device.php'">Edit</button>
			</div>
		</div>
		<div id="data-bar">
			<div id="data">
			<h2>Temperature</h2>
			<p>26.1℃</p>
			<date>2013.04.01 13:00</date>
			</div>
			<div id="chart">
			</div>
		</div>
	</div>
</body>
</html>