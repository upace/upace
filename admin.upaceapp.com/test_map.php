<!DOCTYPE html>
<html>
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<title>Mapplic - Custom Interactive Map Plugin - Mall Example</title>

		<!-- Viewport for Responsivity -->
		<meta name="viewport" content="width=100%, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
		<meta name="description" content="Map of a shopping mall, an example of using Mapplic, a premium custom interactive map plugin to display custom image or vector (SVG) maps. Touchscreen kiosk map compatible.">

		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/map.css">
		<link rel="stylesheet" type="text/css" href="mapplic/mapplic.css">
		<!-- Internet Explorer -->
		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="mapplic/mapplic-ie.css">
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrap">

		

			<!-- Site content -->
		
				
				<section class="inner over">
					<!-- Map -->
					<div class="map-container">
						
						<div id="mapplic"></div>
					</div>

					
				</section>


				<div class="map-container">
					<div class="window-mockup">
						<div class="window-bar"></div>
					</div>
					<div id="mapplic1"></div>
				</div>
				


			<!-- Site footer -->
			
		</div>

		<!-- Scripts -->
		<script type="text/javascript" src="js/map/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/map/js/hammer.js"></script>
		<script type="text/javascript" src="js/map/js/jquery.easing.js"></script>
		<script type="text/javascript" src="js/map/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/map/mapplic/mapplic.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#mapplic').mapplic({
					source: 'mall.json',
					sidebar: true,
					minimap: true,
					locations: false,
					deeplinking: true,
					fullscreen: true,
					hovertip: true,
					developer: true,
					maxscale: 4
				});

				$('#mapplic1').mapplic({
					source: 'apartment.json',
					sidebar: true,
					minimap: true,
					deeplinking: true,
					fullscreen: true,
					hovertip: true,
					developer: true,
					maxscale: 1
				});
			});
		</script>
	</body>
</html>