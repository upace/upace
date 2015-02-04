<?php require_once('include/config.php'); ?>
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
				Facility
			<span>>  
				Rooms
			</span>	
			<span>>  
				Add Room
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
					<h2>Add Room form </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form id="room-register" class="smart-form">
							<header>
								Add Room
							</header>

							<fieldset>
								<div class="row">
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                                <select name="university" id="university" onchange="get_gyms(this.value);">
                                                                                            <option value="0" selected="" disabled="">Select University</option>
                                                                                    </select> <i></i> </label>
                                                                    </section>
                                                                </div>
								<div class="row">
                                                                    <section class="col col-6">
                                                                            <label class="select">
                                                                                    <select name="gym" id="gym">
                                                                                            <option value="0" selected="" disabled="">Select Gym</option>
                                                                                    </select> <i></i> </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-6">
                                                                            <label class="input">
                                                                                    <input type="text" name="roomname" placeholder="Room Name" id="roomname">
                                                                            </label>
                                                                    </section>
                                                                </div>
                                             <div class="row">                   
									<section class="col col-6">
										<label class="input">
										<input type="text" name="totalOccupancy" onkeypress="return checkNumber(event)" placeholder="Total Occupancy" id="totalOccupancy" />
										</label>
									</section>
									</div>
									
									<div class="row">                   
									<section class="col col-6">
										<label class="">
										<input type="checkbox" name="allowOccupancy"  id="allowOccupancy" value="true" />&nbsp;Allow Occupancy
										</label>
									</section>
									</div>
<!--									<section class="col col-6">
										<label class="select">
											<select name="advance_signup_limit">
												<option value="0" selected="" disabled="">Select Location</option>
												<option value="1">Room1</option>
												<option value="2">Room2</option>
											</select> <i></i> </label>
									</section>-->
								</div>
							</fieldset>
							<footer>
								<button type="button" class="btn btn-primary" id="add_room">
									Submit
								</button>
							</footer>
						</form>						
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->
		

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
                <script type="text/javascript" src="js/site.js"></script>
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		function checkNumber(e)
		{
			if(e.which >= 48 && e.which<=57)
			 return true;
			else 
			 return false; 
		}
		$(document).ready(function() {
			//getAllGym();
                        /***********
                         * Get All university * 
                         */
                        getAllUniversity();
			pageSetUp();

					
			var $registerForm = $("#room-register").validate({
	
				// Rules for form validation
				rules : {
                                        university : {
						required : true
					},
					roomname : {
						required : true
					},
					gym : {
						required : true
					},
					totalOccupancy : {
						required : true
					}
					
				},
	
				// Messages for form validation
				messages : {
                                        university : {
						required : 'Please select university.'
					},
					roomname : {
						required : 'Please enter Room Name'
					},
					gym : {
						required : 'Please Select Gym'
					},
					totalOccupancy : {
						required : 'Please enter Total occupancy of the Room'
					}
					
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			$('#add_room').click(function() {
			   if ($('#room-register').valid()) {
				 var form = $( "form" ).serializeArray();				
				 add_room(form);
			   } else {
				  
			   }
                        });
                    
	
			// START AND FINISH DATE
			/*$('#startdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			
			$('#finishdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#startdate').datepicker('option', 'maxDate', selectedDate);
				}
			});*/


		
		})

		</script>
	</body>

</html>
