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
				Add Equipments
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
					<h2>Add Equipments form </h2>				
					
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
								Add Equipments
							</header>

							

							<fieldset>
									<section>
										<label class="input">
											<input type="text" name="name" id="name" placeholder="Equipment Name">
										</label>
									</section>
                                                            <section>
                                                                    <label class="input">
                                                                            <input type="text" name="quantity" id="quantity" placeholder="No of Equipment" onkeypress="return checkNumber(event)">
                                                                    </label>
                                                            </section>
                                                            
                                                            <section >
		 								<label class="input">
                                                                                    <input type="text" placeholder="Equipment Starting Number" name="start_number" id="start_number" onkeypress="return checkNumber(event)" class="">
                                                                                </label>
                                                                               
									</section>
								
								
								<div class="row">
									<section class="col col-6">
										<label class="select">
											<select name="type" id="type">
												<option value="0" selected="" disabled="">Select Equipment Type</option>
												
											</select> <i></i> </label>
									</section>
									
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
											<select name="mac_time_lt" id="mac_time_lt">
												<option value="0" selected="" disabled="">Select Machine Time Limit</option>
												<option value="1 hour">1 hour</option>
												<option value="45 minutes">45 minutes</option>
												<option value="30 minutes">30 minutes</option>
											</select> <i></i> </label>
									</section>
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

								<!-- <div class="row">
									<section class="col col-6">
										<label class="input">
											<input type="text" name="map_x" id="map_x" placeholder="X axis">
										</label>
									</section>
									<section class="col col-6">
										<label class="input">
											<input type="text" name="map_y" id="map_y" placeholder="Y axis">
										</label>
									</section>
									<section class="col col-6">
										<label>Please put value of X-axis and Y-axis from <a href='equipMap' target="_blank">map</a>.</label>
									</section>
								</div> -->
							</fieldset>
                                                        <header>
								Add Time 
							</header>
							<fieldset class="time_fields">
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Sunday
											<input type="text" placeholder="Start Time" name="start_time0" id="start_time0" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Sunday
											<input type="text" placeholder="End Time" name="end_time0" id="end_time0" class="end_time">
									    </label>
								    </section>
                                  </div>
							
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Monday
											<input type="text" placeholder="Start Time" name="start_time1" id="start_time1" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Monday
											<input type="text" placeholder="End Time" name="end_time1" id="end_time1" class="end_time">
									    </label>
								    </section>
                                  </div>
							
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Tuesday
											<input type="text" placeholder="Start Time" name="start_time2" id="start_time2" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Tuesday
											<input type="text" placeholder="End Time" name="end_time2" id="end_time2" class="end_time">
									    </label>
								    </section>
                                  </div>
							
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Wednesday
											<input type="text" placeholder="Start Time" name="start_time3" id="start_time3" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Wednesday
											<input type="text" placeholder="End Time" name="end_time3" id="end_time3" class="end_time">
									    </label>
								    </section>
                                  </div>
							
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Thursday
											<input type="text" placeholder="Start Time" name="start_time4" id="start_time4" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Thursday
											<input type="text" placeholder="End Time" name="end_time4" id="end_time4" class="end_time">
									    </label>
								    </section>
                                  </div>
							
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Friday
											<input type="text" placeholder="Start Time" name="start_time5" id="start_time5" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Friday
											<input type="text" placeholder="End Time" name="end_time5" id="end_time5" class="end_time">
									    </label>
								    </section>
                                  </div>
							
								  <div class="row">
								    <section class="col col-6">
		 								<label class="input">Saturday
											<input type="text" placeholder="Start Time" name="start_time6" id="start_time6" class="start_time">
										</label>
                                    </section>
								    <section class="col col-6">
									    <label class="input">Saturday
											<input type="text" placeholder="End Time" name="end_time6" id="end_time6" class="end_time">
									    </label>
								    </section>
                                  </div>
							

								<div class="row">
								<section>
									<label class="textarea"> 										
										<textarea name="description" id="description" placeholder="Description" style="height:150px;"></textarea>
									</label>
								</section>
								</div>
							</fieldset>                       
                                                            
                                                            
                                                                
                                                        </fieldset>
                                                        <!--<footer>
                                                                    <button type="button" name="add_more" id="add_more"  class="btn btn-primary">Add More</button>
                                                        </footer>-->
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
                <script type="text/javascript" src="http://momentjs.com/downloads/moment.min.js"></script>
                <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.css" />
                <script type="text/javascript" src="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.js"></script>
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
                        // Add Rooms In the List
			get_rooms_list();
               get_equipmentType(); 
               get_gymTime();        
			pageSetUp();
               var slot_count = 2;
					
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
                         mac_time_lt : {
                             required : true,
                         },
                         signup_lt : {
                             required : true,
                         },
                         quantity : {
                             required : true,
                         },
                         type : {
                             required : true,
                         },
                         start_number : {
                             required : true,
                         },
                         description : {
                             required : true,
                         },
						 start_time0 : {
                             required : true,
                         },
                         end_time0 : {
                             required : true,
                         },
						 start_time1 : {
                             required : true,
                         },
                         end_time1 : {
                             required : true,
                         },
						 start_time2 : {
                             required : true,
                         },
                         end_time2 : {
                             required : true,
                         },
						 start_time3 : {
                             required : true,
                         },
                         end_time3 : {
                             required : true,
                         },
						 start_time4 : {
                             required : true,
                         },
                         end_time4 : {
                             required : true,
                         },
						 start_time5 : {
                             required : true,
                         },
                         end_time5 : {
                             required : true,
                         },
						 start_time6 : {
                             required : true,
                         },
                         end_time6 : {
                             required : true,
                         }/*,
								  map_x : {
								 required : true,
							 },
									  map_y : {
								 required : true,
							 }*/
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
                         mac_time_lt : {
                             required : 'Please Select Machine Time Limit.',
                         },
                         signup_lt : {
                             required : 'Please Select Sign Up Limit.'
                         },
                         quantity : {
                             required : 'Please enter quantity'
                         },
                         type : {
                             required : 'Please Select Equipment type'
                         },
                         start_number : {
                             required : 'Please Enter Equipment Starting number'
                         },
                         description : {
                             required : 'Please Enter Description.'
                         },
						 start_time0 : {
                             required : 'Please Select Start time of Sunday.'
                         },
                         end_time0 : {
                             required : 'Please Select End time of Sunday.'
                         },
						 start_time1 : {
                             required : 'Please Select Start time of Monday.'
                         },
                         end_time1 : {
                             required : 'Please Select End time of Monday.'
                         },
						 start_time2 : {
                             required : 'Please Select Start time of Tuesday.'
                         },
                         end_time2 : {
                             required : 'Please Select End time of Tuesday.'
                         },
						 start_time3 : {
                             required : 'Please Select Start time of Wednesday.'
                         },
                         end_time3 : {
                             required : 'Please Select End time of Wednesday.'
                         },
						 start_time4 : {
                             required : 'Please Select Start time of Thursday.'
                         },
                         end_time4 : {
                             required : 'Please Select End time of Thursday.'
                         },
						 start_time5 : {
                             required : 'Please Select Start time of Friday.'
                         },
                         end_time5 : {
                             required : 'Please Select End time of Friday.'
                         },
						 start_time6 : {
                             required : 'Please Select Start time of Saturday.'
                         },
                         end_time6 : {
                             required : 'Please Select Start time of Saturday.'
                         }/*,
							 map_x : {
							  required : 'Please Enter X-axis.'
						 },
							 map_y : {
							  required : 'Please Enter Y-axis.'
						 }*/

				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
                        $('#add_more').on('click',function(){
                            var row='';
                            row += '<div class="row">';
                            row +=     '<section class="col col-6">';
                            row +=         '<label class="input">';
                            row +=             '<input type="text" placeholder="Start Time" name="start_time[]" id="start_time' + slot_count + '" class="start_time">';
                            row +=         '</label>';
                            row +=    '</section>';
                            row +=    '<section class="col col-6">';
                            row +=        '<label class="input">';
                            row +=                '<input type="text" placeholder="End Time" name="end_time[]" id="end_time' + slot_count + '" class="end_time">';
                            row +=        '</label>';
                            row +=    '</section>';
                            row += '</div>';
                            $('.time_fields').append(row);
                            $('.start_time').datetimepicker({
                                format: 'hh:mm A',
                                pickDate: false

                            });
                            $('.end_time').datetimepicker({
                                format: 'hh:mm A',
                                pickDate: false                            
                            });
                            
                            slot_count ++;
                        })
                        $('#add_equipment').click(function() {
			   if ($('#smart-form-register').valid()) {
				 var form = $( "form" ).serializeArray();				
				 add_equipment(form);
			   } else {
				  
			   }
                        });
			
	
			// START AND FINISH DATE
			 $('.start_time').datetimepicker({
                            format: 'hh:mm A',
                            pickDate: false
                            
                        });
                        $('.end_time').datetimepicker({
                            format: 'hh:mm A',
                            pickDate: false                            
                        });
                        
                        /*$(".start_time").on("dp.change",function (e) {
                           $(this).closest('.end_time').data("DateTimePicker").setMinTime(e.time);
                        });
                        
                        $(".end_time").on("dp.change",function (e) {
                           $(this).closest('.start_time').data("DateTimePicker").setMaxTime(e.time);
                        });*/


		
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
