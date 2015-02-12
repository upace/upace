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
				Add Gym Closing Date
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
					<h2>Add Gym Closing Date form </h2>				
					
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
						<input type="hidden" style="width:100%;height:150px;" name="closeDate" id="closeDate" value="">
							<header>
								Add Gym Closing Date
							</header>

							<fieldset>
							
								<section class="col col-9">
									
									
									<div class="row">
										<section class="col col-6">
										Close Multiple Dates
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="closeMultiDate" id="closeMultiDate" placeholder="Dates the gym will be closed" class="" data-dateformat='yy-mm-dd' />
											</label>
										</section>
									</div>	
									<div class="row">	
										<section class="col col-6">	
										Close Date Range From
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="closeStartDate" id="closeStartDate" placeholder="Close Dates range From" class="" data-dateformat='yy-mm-dd' />
											</label>
										</section>
										<section class="col col-6">
										Close Date Range To	
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="closeEndDate" id="closeEndDate" placeholder="Close Dates range To" class="" data-dateformat='yy-mm-dd' />
											</label>
										
										</section>
									
									</div>
								</section>
									
									
									
							</fieldset>
							<footer>
								<button type="button" id="Submit" class="btn btn-primary">
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
		$('#closeMultiDate').multiDatesPicker();
		$('.start_time').datetimepicker({
                            format: 'hh:mm A',
                            pickDate: false
                            
                        });
                        $('.end_time').datetimepicker({
                            format: 'hh:mm A',
                            pickDate: false                            
                        });
		
		$(document).ready(function() {
			
                        
			pageSetUp();
			getCloseDates();
					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					
					
				},
	
				// Messages for form validation
				messages : {
					
					
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
			$('#Submit').click(function() {
			   if ($('#smart-form-register').valid()) {
					$('.result-msg').html('');
					var $form = $(this);
					var form = $( "form" ).serializeArray();
					// console.log(form);
					document.getElementById('Submit').style.pointerEvents = 'none';
					document.getElementById('Submit').style.opacity = '0.50';
					editCloseDate(form);
				} else {
				  
			   	}
			});
                    
	
			// START AND FINISH CLOSING DATE
			$('#closeStartDate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#closeEndDate').datepicker('option', 'minDate', selectedDate);
				}
			});
			$('#closeEndDate').datepicker({
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
