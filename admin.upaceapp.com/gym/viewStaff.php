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
				Staff		
			<span>>  
				Edit Staff
			</span>
		</h1>
	</div>
	
	
</div>

				<!-- row -->
				
				<div class="row">
				
					<div class="col-sm-12">
				
				
							<div class="well well-sm">
				
								<div class="row">
				
									<div class="col-sm-12 col-md-12">
										<div class="well well-light well-sm no-margin no-padding">
				
											<div class="row">
				
												<div class="col-sm-12">
													<div id="myCarousel" class="carousel fade profile-carousel">
														<!-- <div class="air air-bottom-right padding-10">
															<a href="javascript:void(0);" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Follow</a>&nbsp; <a href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-link"></i> Connect</a>
														</div> -->
														
														<ol class="carousel-indicators">
															<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
															<li data-target="#myCarousel" data-slide-to="1" class=""></li>
															<li data-target="#myCarousel" data-slide-to="2" class=""></li>
														</ol>
														<div class="carousel-inner">
															<!-- Slide 1 -->
															<div class="item active">
																<img src="<?php echo ROOT;?>img/demo/s1.jpg" alt="demo user">
															</div>
															<!-- Slide 2 -->
															<div class="item">
																<img src="<?php echo ROOT;?>img/demo/s2.jpg" alt="demo user">
															</div>
															<!-- Slide 3 -->
															<div class="item">
																<img src="<?php echo ROOT;?>img/demo/m3.jpg" alt="demo user">
															</div>
														</div>
													</div>
												</div>
				
												<div class="col-sm-12">
				
													<div class="row">
				
														<div class="col-sm-3 profile-pic">
															<img src="<?php echo ROOT;?>img/avatars/male.png" alt="demo user">
														</div>
														<div class="col-sm-6">
															<h1 id="Name">
															<br>
															<small id="Title"> </small></h1>
				
															<ul class="list-unstyled" id="Contact">
																
															</ul>
															<br>
															<p class="font-md">
																<i>Description</i>
															</p>
															<p id="Description">
				
																
				
															</p>
															<br>
															<li id="Mail"></li>
															<br>
												<br>
				<li id="">
					<select name="type" id="type" >
					</select>
				</li>
					<br>
					<br>
				<footer>
					<button type="button" id="typeChange" class="btn btn-primary">
						Change Type
					</button>
				</footer>	
																		</div>
														<div class="col-sm-3">
															<!--<h1><small>Permissions</small></h1>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																add/delete account
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																make reservations
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																delete reservations
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																view data on app usage
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																view feedback
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																input occupancy of gym
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																change class information
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																change equipment information
															</label>

															<label class="checkbox">
																<input type="checkbox" checked="checked" name="checkbox">
																<i></i>
																change facility information
															</label>
															<form id="smart-form-register" class="smart-form">
															<header>
																 Reset password 
															</header>
								
															
								
															<fieldset>
																
																<section>
																	<label class="input">
																		<input type="text" name="equipmentname" placeholder="Password">
																	</label>
																</section>
																<section>
																	<label class="input">
																		<input type="text" name="equipmentname" placeholder="Verify Password">
																	</label>
																</section>
																
															</fieldset>
															<footer>
																<button type="submit" class="btn btn-primary">
																	Change Password
																</button>
															</footer>-->
														</form>


														</div>
				
													</div>
				
												</div>
				
											</div>

										</div>
				
									</div>

								</div>
				
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
                getStaffById('<?php echo $_REQUEST['lid']; ?>');
                
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					capacity : {
						required : true
					},
					hourOfOperation : {
						required : true,
					},
					closeDate : {
						required : true,
					},
					phone : {
						required : true,
					},
					locationId : {
						required : true,
					}
				},
	
				// Messages for form validation
				messages : {
					
					name : {
						required : 'Please enter Gym Name'
					},
					capacity : {
						required : 'Please enter Max Occupancy of gym'
					},
					hourOfOperation : {
						required : 'Please enter Hours of operation',
					},
					closeDate : {
						required : 'Please enter the Dates the gym will be closed ',
					},
					phone : {
						required : 'Please enter Phone number',
					},
					locationId : {
						required : 'Please select Location',
					}
					
				},
				
				invalidHandler: function(event, validator) {
				    // 'this' refers to the form
				    var errors = validator.numberOfInvalids();
				    if(errors)
					{
						validateError = 1;
					}
					else{
						validateError = 0;
						
					}
				  },
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
					
						
				}
				
				
				
				
			});
			
			$('#typeChange').click(function() {
			   
				document.getElementById('typeChange').style.pointerEvents = 'none';
		    		document.getElementById('typeChange').style.opacity = '0.50';
				updateStaffType($('#type').val(),"<?php echo $_GET['lid']?>");
				
						
			   
		    });
	
			
			

		
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
