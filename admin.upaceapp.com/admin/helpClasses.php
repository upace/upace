<?php require_once('include/config.php'); ?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php require_once('include/header.php');?>
	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
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
				Classes		
			<span>
			</span>
		</h1>
	</div>
	
	
</div>

				<!-- row -->
				
				<div class="row">

					<div class="col-sm-12 col-md-12">
						<div class="well well-light well-lg">

							<h3>Add Class</h3>
							<p>
								Here you can add your classes, recurring and non recurring.<br />
								Classes must take place in a room from the <span class="text-info">Room dropdown</span> so please add a room before creating classes.
								
								<br /><br />
								
								<b>Single Class</b>
								<p>
									A single class occurs on a specific date and is added by click <span class="text-info">Non Recurring</span> as the class type option.<br />
									A single class time will be set by selecting the <span class="text-info">Start time</span> and <span class="text-info">End time</span>.
								</p>
								
								<br /><br />
								
								<b>Recurring Class</b>
								<p>
									A recurring class will require a <span class="text-info">Start date</span> and an <span class="text-info">End date</span>. They will recurr within this range.<br />
									A recurring class occurs one or more days by selecting the days you wish it to fall on.<br />
									A recurring class can have multiple time slots per day by adding a <span class="text-info">Start time</span> and <span class="text-info">End time</span> and using the <span class="text-info">Add More</span> button to add more time slots.<br />
									
									<br /><i>Example</i><br /><br />
									To create a recurring Yoga class on Monday and Thursday at 8am and 1pm you would follow these steps:<br />
									1.) Fill in the class basic information.<br />
									2.) Choose the start date and end date they will run, usually the start and end to a full sememster.<br />
									3.) Check off Mon and Thu for the day of the week checkboxes.<br />
									4.) Add a start time of 8am and the end time. <br />
									5.) Clcick Add More and add a start time of 1pm and the end time.<br />
								</p>
								
								<h3>View Upcoming Class</h3>
								<p>
									Here you can view all of your upcoming classes.<br />
									You can filter, sort and search to quickly access class information.<br />
									You can view individual <span class="text-info">Time Slots</span><br />
									You can vew the <span class="text-info">Feedback from the users</span><br />
								</p>
								
								<h3>View Past Class</h3>
								<p>
									Past classes are the same as upcoming classes, except they have already occured.
								</p>
							</p>

						</div>

					</div>

				</div>
				
				<!-- end row -->
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
		require_once('include/functions.php');
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<?php require_once('include/footer.php');?>
                
		<script type="text/javascript">
		//Get University Details
                
                
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
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
