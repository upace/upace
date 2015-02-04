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
				Settings
			<span>>  
				Gym Info
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
			<div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-collapsed="false" data-widget-togglebutton="false" >
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
					<h2>Gym Info form </h2>				
					
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
						<div class="result-msg"></div>
						<form id="smart-form-register" class="smart-form">
						<input type="hidden" name="lid" id="lid" />
						<input type="hidden" name="closeDate" id="closeDate" value="">
							<header>
								Update Gym Info
							</header>

							<fieldset>
							
								<section class="col col-9">
									<div class="row">
									<section class="col col-6">
										Open
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="openTime" id="openTime" placeholder="Open Time" class="start_time" />
										</label>
									</section>
									<section class="col col-6">
										Close
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="closeTime" id="closeTime" placeholder="Close Time" class="end_time" />
										</label>
									</section>
									
									<section class="col col-6">
										Phone
										<label class="input"> <i class="icon-append fa fa-phone"></i>
											<input type="tel" name="phone" id="phone" placeholder="Phone number" data-mask="(999) 999-9999" />
										</label>
									</section>
									</div>
								<!--	
								<fieldset class="time_fields">	
									<div class="row">
										<section class="col col-6">
											Multiple Closing Date
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="closeMultiDate[]" id="closeMultiDate1" placeholder="Dates the gym will be closed" class="closeMultiDate" data-dateformat='yy-mm-dd' />
											</label>
										</section>
									</div>
								</fieldset >		
							
								<button type="button" id="addMultiDate" class="btn btn-primary">
									Add Multi Closing Date 
								</button>
							
									
								<fieldset class="date_fields">	
									<div class="row">	
										<section class="col col-3">	
										 Closing Date From
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="closeStartDate[]" id="closeStartDate1" placeholder="Close Dates range From" class="" data-dateformat='yy-mm-dd' />
											</label>
										</section>
										
										<section class="col col-3">
										Closing Date To	
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="closeEndDate[]" id="closeEndDate1" placeholder="Close Dates range To" class="" data-dateformat='yy-mm-dd' />
											</label>
										
										</section>
										</div>
								</fieldset>
								<button type="button" id="addDateRange" class="btn btn-primary">
									Add Closing Date Range
								</button>
									-->
									
								</section>
									
									
									
							</fieldset>
							<footer>
								<button type="button" id="Submit" class="btn btn-primary">
									Update Gym Info
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
		require_once('include/functions.php');
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<?php require_once('include/footer.php');?>
		<script src="<?php echo ROOT; ?>js/plugin/moment/moment.min.js"></script>
		<script src="<?php echo ROOT; ?>js/moment-range.min.js"></script>
		<script src="<?php echo ROOT; ?>js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.css" />
          <script type="text/javascript" src="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.js"></script>
          <script type="text/javascript" src="<?php echo ROOT; ?>js/jquery-ui.multidatespicker.js"></script>
		<!--<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
                <script type="text/javascript" src="js/site.js"></script>-->
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		function checkNumber(e)
		{
			if(e.which >= 48 && e.which<=57)
			 return true;
			else 
			 return false; 
		}
		$('.closeMultiDate').multiDatesPicker();
		$('.start_time').datetimepicker({
                            format: 'hh:mm A',
                            pickDate: false
                            
                        });
                        $('.end_time').datetimepicker({
                            format: 'hh:mm A',
                            pickDate: false                            
                        });
		
		$(document).ready(function() {
			get_gymInfo();
                        
			pageSetUp();
			var slot_count = 2;
			var dateRange_count = 2;
					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					closeTime : {
						required : true,
					},
					openTime : {
						required : true,
					},
					phone : {
						required : true,
					}
					
					
				},
	
				// Messages for form validation
				messages : {
					closeTime : {
						required : 'Please select Close time',
					},
					openTime : {
						required : 'Please select Open time',
					},
					phone : {
						required : 'Please enter phone number',
					}
					
					
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
	
			$('#addMultiDate').on('click',function(){
                            var row='';
                            row += '<div class="row">';
                            row +=     '<section class="col col-6">';
                            row +=         'Closing Date From<label class="input">';
                            row +=             '<input type="text" name="closeMultiDate[]" id="closeMultiDate' + slot_count + '" placeholder="Closing Dates" class="closeMultiDate" data-dateformat="yy-mm-dd">';
                            row +=         '</label>';
                            row +=    '</section>';
                            row += '</div>';
                            $('.time_fields').append(row);
                            $('.closeMultiDate').multiDatesPicker();
                            
                            
                            slot_count ++;
                        });
                
               $('#addDateRange').on('click',function(){
                            var row='';
                            row += '<div class="row">';
                            row +=     '<section class="col col-6">';
                            row +=         'Closing Date From<label class="input">';
                            row +=             '<input type="text" name="closeStartDate[]" id="closeStartDate' + dateRange_count + '" placeholder="Close Dates range From" class="" data-dateformat="yy-mm-dd">';
                            row +=         '</label>';
                            row +=    '</section>';
                            row +=     '<section class="col col-6">';
                            row +=         'Closing Date To<label class="input">';
                            row +=             '<input type="text" name="closeEndDate[]" id="closeEndDate' + dateRange_count + '" placeholder="Close Dates range To" class="" data-dateformat="yy-mm-dd">';
                            row +=         '</label>';
                            row +=    '</section>';
                            row += '</div>';
                            $('.date_fields').append(row);
                            $('#closeStartDate'+dateRange_count).datepicker({
							dateFormat : 'dd.mm.yy',
							prevText : '<i class="fa fa-chevron-left"></i>',
							nextText : '<i class="fa fa-chevron-right"></i>',
							onSelect : function(selectedDate) {
								$('#closeEndDate'+dateRange_count).datepicker('option', 'minDate', selectedDate);
							}
						});
						$('#closeEndDate'+dateRange_count).datepicker({
							dateFormat : 'dd.mm.yy',
							prevText : '<i class="fa fa-chevron-left"></i>',
							nextText : '<i class="fa fa-chevron-right"></i>',
							onSelect : function(selectedDate) {
								$('#finishdate').datepicker('option', 'minDate', selectedDate);
							}
						});
                            
                            
                            dateRange_count ++;
                        });         
	
			$('#Submit').click(function() {
			   if ($('#smart-form-register').valid()) {
					$('.result-msg').html('');
					var $form = $(this);
					var form = $( "form" ).serializeArray();
					// console.log(form);
					document.getElementById('Submit').style.pointerEvents = 'none';
					document.getElementById('Submit').style.opacity = '0.50';
					editGymInfo(form);
				} else {
				  
			   	}
			});
                    
	
			// START AND FINISH CLOSING DATE
			$('#closeStartDate1').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#closeEndDate').datepicker('option', 'minDate', selectedDate);
				}
			});
			$('#closeEndDate1').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});


		
		})

		</script>
	</body>

</html>
