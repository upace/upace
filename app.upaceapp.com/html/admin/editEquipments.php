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
				Equipments
			<span>>  
				Edit Equipments
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
					<h2>Edit Equipments form </h2>				
					
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
						
						<form id="smart-form-register" class="smart-form">
							<header>
								Edit Equipments
							</header>

							

							<fieldset>
									<section>
										<label class="input">
											<input type="text" name="name" id="name" placeholder="Equipment Name">
                                                                                        <input type="hidden" name="equipment_id" id="equipment_id" value="<?php echo (!empty($_REQUEST['rid'])?$_REQUEST['rid']:''); ?>">
										</label>
									</section>
                                                            
								
								<div class="row">
									<section class="col col-6">
										<label class="select">
											<select name="room" id="room">
												<option value="0" selected="" disabled="">select Room</option>
												
											</select> <i></i> </label>
									</section>
                                                                    
									<section class="col col-6">
										<label class="select">
											<select name="adv_signup_lt" id="adv_signup_lt">
												<option value="0" selected="" disabled="">Select Advance Signup Limit</option>
												<option value="No Limit">No Limit</option>
												<option value="1 Month">1 Month</option>
												<option value="1 Week">1 Week</option>
												<option value="2 Weeks">2 Weeks</option>
												<option value="24 Hour">24 Hour</option>
											</select> <i></i> </label>
									</section>
								</div>	

								<div class="row">
									
									<section class="col col-6">
										<label class="select">
											<select name="signup_lt" id="signup_lt">
												<option value="0" selected="" disabled="">Select Sign Up Limit</option>
												<option value="No Limit">No Limit</option>
												<option value="1 Reservations">1 Reservations Per day</option>
												<option value="2 Reservations">2 Reservations Per day</option>
                                                                                                <option value="3 Reservations">3 Reservations Per day</option>
											</select> <i></i> </label>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<div class="row">
								<section>
									<label class="textarea"> 										
										<textarea name="description" id="description" placeholder="Description" style="height:150px;"></textarea>
									</label>
								</section>
								</div>
							</fieldset>
							<footer>
								<button type="button" id="add_equipment" class="btn btn-primary">
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
		
		$(document).ready(function() {
                        // Add Rooms In the List
			//get_rooms_list();
                        setTimeout(equipmentDetails('<?php echo (!empty($_REQUEST['rid'])?$_REQUEST['rid']:''); ?>'), 3000);
			pageSetUp();

					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					name : {
                                            required : true
					},
                                        room : {
                                            required : true
                                        },
					adv_signup_lt : {
                                            required : true,
					},
                                        signup_lt : {
                                            required : true,
                                        },
                         description : {
                             required : true,
                         }
				},
	
				// Messages for form validation
				messages : {
					name : {
						required : 'Please enter equipment name.'
					},
                                        room : {
                                            required : 'Please select room.'
                                        },
					adv_signup_lt : {
                                            required : 'Please Select Advance Signup Limit.',
						
					},
                                        signup_lt : {
                                            required : 'Please Select Sign Up Limit.'
                                        },
                         description : {
                             required : true,
                         }
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
                        $('#add_equipment').click(function() {
			   if ($('#smart-form-register').valid()) {
				 var form = $( "form" ).serializeArray();				
				 update_equipment(form);
			   } else {
				  
			   }
                        });
			
	
			// START AND FINISH DATE
			$('#startdate').datepicker({
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
