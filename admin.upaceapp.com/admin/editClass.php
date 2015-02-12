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
				<i class="fa fa-arrow-circle-left hit"></i>			</span>		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>					</span>				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Classes</li>
				</ol>
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
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa fa-calendar fa-fw "></i> 
							Classes
							<span>>
							Edit Class							</span>						</h1>
					</div>
					
				</div>
				<!-- row -->
				
				<div class="row">
				
					<div class="col-sm-12 col-md-12 col-lg-3">
						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">
							<header>
								<h2> Add Class </h2>
							</header>
				
							<!-- widget div-->
							<div>
				
								<div class="widget-body">
									<!-- content goes here -->
				
									<form id="add-event-form">
										<fieldset>
				
											<div class="form-group">
												<label>Gym</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="gym" id="gym" onchange="get_instructor_list(this.value);get_rooms_list(this.value)">
														<option value="0" selected="" disabled="">Select Gym</option>
													</select> <i></i> </label>
												</section>
											</div>
				
											<div class="form-group">
												<label>Class Name</label>
												<input class="form-control"  id="name" name="name" maxlength="40" type="text" placeholder="Class Name">
                                                                                                <input type="hidden" name="cid" id="cid">   
											</div>
											<div class="form-group">
												<label>Room</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="room" id="room" class="valid">
															<option value="" selected="" disabled="">Select Room</option>
																									</select> <i></i> </label>
												</section>
											</div>
											<div class="form-group">
												<label>Class Description</label>
												<textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="400" id="description" name="description"></textarea>
												<p class="note">Maxlength is set to 400 characters</p>
											</div>
											
                                             <div class="form-group">
												<label>Instructor Name</label>
<!--												<input class="form-control"  id="instructor" name="instructor" maxlength="40" type="text" placeholder="Instructor Name">-->
                                                                                                <label class="select state-success">
                                                                                                <select name="instructor" id="instructor" class="valid">
                                                                                                        <option value="0" selected="" disabled="">Select Instructor</option>		
                                                                                                </select> <i></i>
                                                                                                </label>
											</div>                                           
											
											<div class="form-group">
												<label>How many spots open in the class?</label>
												<input class="form-control"  id="spots" name="spots" maxlength="40" type="text" placeholder="How many spots open in the class?">
											</div>
											<div class="form-group">
												<label>Walk-in spots open in the class?</label>
												<input class="form-control"  id="walkin_spots" name="walkin_spots" maxlength="40" type="text" placeholder="Walk-in spots open in the class?">
											</div>
											
											<div class="form-group">
												<label>How far in advance can they sign up</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="advance_time" id="advance_time" class="valid">
															<option value="0" selected="" disabled="">Select</option>
															<option value="1">No limit</option>
															<option value="2">1 month</option>
															<option value="2">2 weeks</option>
															<option value="2">1 week</option>
															<option value="2">24 hours</option>
														</select> <i></i> </label>
												</section>
											</div>
											
											<!--<div class="form-group">
												<label>How often can students sign up for class?</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="students" id="students" class="valid">
															<option value="" selected="" disabled="">Select</option>
															
															<option value="10">10</option>
<option value="20">20</option>                                                                                          <option value="30">30</option>  
<option value="30">50</option>
<option value="-1">No limit</option>														</select> <i></i> </label>
												</section>
											</div>-->
											
										</fieldset>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-default" type="button" id="add-event" >
														Save													</button>
												</div>
											</div>
										</div>
									</form>
				
									<!-- end content -->
								</div>
							</div>
							<!-- end widget div -->
						</div>
						<!-- end widget -->
				
						
					</div>
					<div class="col-sm-12 col-md-12 col-lg-9">
				
						<!-- new widget -->
						<div class="jarviswidget jarviswidget-color-blueDark">
				
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
								<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
								<h2> My Classes </h2>
								<div class="widget-toolbar">
									<!-- add: non-hidden - to disable auto hide -->
									<div class="btn-group">
										<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
											Showing <i class="fa fa-caret-down"></i>										</button>
										<ul class="dropdown-menu js-status-update pull-right">
											<li>
												<a href="javascript:void(0);" id="mt">Month</a>											</li>
											<li>
												<a href="javascript:void(0);" id="ag">Agenda</a>											</li>
											<li>
												<a href="javascript:void(0);" id="td">Today</a>											</li>
										</ul>
									</div>
								</div>
							</header>
				
							<!-- widget div-->
							<div>
				
								<div class="widget-body no-padding">
									<!-- content goes here -->
									<div class="widget-body-toolbar">
				
										<div id="calendar-buttons">
				
											<div class="btn-group">
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
												<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>											</div>
										</div>
									</div>
									<div id="calendar" style="margin-top:20px;"></div>
				
									<!-- end content -->
								</div>
							</div>
							<!-- end widget div -->
						</div>
						<!-- end widget -->
					</div>
				</div>
				
				<!-- end row -->
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

	

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo ROOT; ?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?php echo ROOT; ?>js/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="<?php echo ROOT; ?>js/plugin/moment/moment.min.js"></script>
		<script src="<?php echo ROOT; ?>js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT; ?>js/plugin/fullcalendar/fullcalendar.css" />
		<script src="js/site.js"></script>

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
                 /*
                 * 
                 * Instructors
                 */
				  getAllGym();
                get_instructor_list();
                //get_instructor_list();
		/*
                 * 
                 * Get Rooms
                 */
                //get_rooms_list();
                
                setTimeout(classDetails('<?php echo $_REQUEST['rid']; ?>'),4000);
		$(document).ready(function() {
			
			pageSetUp();
			
                        var $registerForm = $("#add-event-form").validate({
	
				// Rules for form validation
				rules : {
					name : {
						required : true
					},
					room : {
						required : true
					},
                                        description : {
						required : true
					},
                                        instructor : {
						required : true
					},
                                        spots : {
						required : true
					},
                                        walkin_spots : {
						required : true,
					},
                                        advance_time : {
						required : true,
					}
				},
	
				// Messages for form validation
				messages : {
					name : {
						required : 'Please enter class name'
					},
					room : {
						required : 'Please select room'
					},
                                        description : {
						required : 'Please enter descreiption'
					},
                                        instructor : {
						required : 'Please enter Instructor Name'
					},
                                        spots : {
						required : 'Please enter open spots.'
					},
                                        walkin_spots : {
						required : 'Please enter Walk-in spots.'
					},
                                        advance_time : {
						required : 'Please select Advance time for signup.'
					}
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});

                        $('#add-event').click(function() {
			   if ($('#add-event-form').valid()) {
				 var form = $( "form" ).serializeArray();				
				 update_class(form); 
			   } else {
				  
			   }
                        });
                        
			    "use strict";
			
			   calenderClass();
			
			    			
		
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
			$('#start_date').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#end_date').datepicker('option', 'minDate', selectedDate);
				}
			});
			$('#start_date1').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				/*onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}*/
			});
			$('#end_date').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			function showfirst(s,h)
			{
				$(s).show();
				$(h).hide();
			}
		</script>
                <style>
                .invalid
                {
                    color:red;
                    margin-bottom:10px;
                }
                </style>
	</body>
</html>
