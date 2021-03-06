<?php require_once('include/config.php'); 
$message = '';
if(isset($_POST['add_image']))
{
	$target_path="../images/gym_map/";
	$userfile_name = $_FILES['map_image']['name'];
	$userfile_tmp = $_FILES['map_image']['tmp_name'];
	$gym_id = $_POST['gym_id'];
	$ext =explode('.',$userfile_name);
	$ext = end($ext);
	$img_name =$gym_id.'_map.'.$ext;
	$img=$target_path.$img_name;
	//echo $userfile_tmp.' - '.$img;
	if($ext=='png')
	{
		if(move_uploaded_file($userfile_tmp, $img))
		{
			$message = 'Map image saved successfully.';
		}
		else
		{
			$message = 'Imternal error please try again later.';
		}
	}
	else
	{
		$message = 'Please upload .jpg file.';
	}
	
}
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php require_once('include/header.php');?>

	</head>
	
	
	<body class="">

		<!-- HEADER -->
		<?php
                        require_once('include/los-header.php');
                ?>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<?php
				require_once('include/los-userInfo.php');
			?>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<?php
				require_once('include/los-nav.php');
			?>
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your details." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">


<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-bar-chart-o"></i> 
				Equipments
			<span>>  
				Equipments Map
			</span>
		</h1>
	</div>
	
	
</div>

<!-- widget grid -->
<section id="widget-grid" class="">


	<!-- START ROW -->

	<div class="row">

		

		<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
					
					data-widget-colorbutton="false"	
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true" 
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Equipments Map </h2>				
					
				</header>

				<!-- widget div-->
				
					
					<div class="map-container" style="padding:0px !important">
						<div class="window-mockup">
							<div class="window-bar"></div>
						</div>
						<div id="mapplic"></div>
					</div>
					
				
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->

			<div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false" style="display:none;">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2 style="cursor:pointer" onclick="$('.change_map_div').toggle();">Change Map Image </h2>				
					
				</header>

				<div style="display:none;" class="change_map_div">
					<div class="widget-body">
						<!-- content goes here -->
	
						<form id="add-event-form" method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Select Image</label>
									<input  id="map_image" name="map_image" maxlength="40" type="file">			<input type="hidden" name="gym_id" id="gym_id">	
								</div>

								<div class="form-actions">
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-default" type="submit" name="add_image" id="add-event" >
														Save													</button>
												</div>
											</div>
										</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		

		</article>
		<!-- END COL -->		

	</div>

	<!-- END ROW -->

</section>
<!-- end widget grid -->




			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

	

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<?php
                    require_once('include/los-shortcut.php');
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<?php require_once('include/footer.php');?>
		<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
                <script type="text/javascript" src="http://momentjs.com/downloads/moment.min.js"></script>
                <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.css" />
                <script type="text/javascript" src="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.js"></script>
                <script type="text/javascript" src="js/site.js"></script>

				<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>css/map.css">
				<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>mapplic/mapplic.css">

				<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
				<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
				<!-- <script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/jquery-1.11.0.min.js"></script> -->
				<script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/hammer.js"></script>
				<script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/jquery.easing.js"></script>
				<script type="text/javascript" src="<?php echo ROOT; ?>js/map/js/jquery.mousewheel.js"></script>
				<script type="text/javascript" src="<?php echo ROOT; ?>js/map/mapplic/mapplic.js"></script>

				
				 <script type="text/javascript" src="js/equi_map.js"></script>
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {	
			var currentUser = Parse.User.current();
			$('#gym_id').val(currentUser.get('universityGymId'));
			<?php if(!empty($message))
			{ ?>
				showSuccess('<?php echo $message; ?>');
				<?php
			} ?>
			$( ".mapplic-pin" ).on('click',function(){
				alert('hi');
				})
					
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
				_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>

	</body>

</html>
