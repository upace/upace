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
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your details." data-html="true">
						<i class="fa fa-refresh"></i>					</span>				</span>

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
				Class
			<span>>  
				View Class			</span>		</h1>
	</div>
</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
						
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget well" id="wid-id-0">
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
									<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
									<h2>View Rooms </h2>				
								</header>

								<!-- widget div-->
								<div>
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body no-padding">
										<form id="smart-form-register" class="smart-form" novalidate="novalidate" style="display:none;">
											<header> Search  </header>
											<fieldset>
												<div class="row">
													<section class="col col-6">
														<label class="input"> 
															
															<input id="class_search" type="text" placeholder="Serach By Class Name"/>
														</label>
													</section>
													<section class="col col-6">
														<label class="input">
															<input id="room_search" type="text" placeholder="Serach By Room Name"/>
														</label>
													</section>
												</div>

												<div class="row">
													<section class="col col-6">
														<label class="input">
															<input id="instructor_search" type="text" placeholder="Serach By Instructor Name"/>
														</label>
													</section>
													<section class="col col-6">
														<label class="input">
															<input id="date_search" type="text" placeholder="Serach By date"/>
														</label>
													</section>
												</div>

												<div class="row">
													<section class="col col-6">
														<label class="input">
															<input id="day_search" type="text" placeholder="Serach By day"/>
														</label>
													</section>
													
												</div>
											</fieldset>
											
										</form>
										<table id="example" class="display projects-table table table-striped table-bordered table-hover rooms tablesorter" cellspacing="0" width="100%">
									        <thead>
									            <tr roll="row">
																						<th>#</th>
                                                                                        <th>Sl. No.</th>
									                									<th>Class Name</th>
                                                                                        <th>Room</th>
                                                                                        <th>Instructor</th>
                                                                                        <th>Date</th>
																						<th>Day</th>
                                                                                        <th>Spots</th>
                                                                                        <th>Walk in Spots</th>
											<th>Action</th>
									            </tr>
									        </thead>
									        <tbody>
<!--												<tr class="odd" role="row">
													
													<td>
														Another Test Room
													</td>
													<td>
														Room1
													</td>
													<td>
														<span class="onoffswitch">
															<input id="st6" class="onoffswitch-checkbox" type="checkbox" name="start_interval">
															<label class="onoffswitch-label" for="st6">
																<span class="onoffswitch-inner" data-swchoff-text="OFF" data-swchon-text="ON"></span>
																<span class="onoffswitch-switch"></span>															</label>
														</span>													</td>
													<td><a class="btn btn-primary" href="/editRoom">
															
															Edit Rooms
														</a>
													</td>
												</tr>-->
											</tbody>
									    </table>
									</div>
									<a href="javascript:void(0);" class="btn btn-primary check_all">Check All</a>
									<a href="javascript:void(0);" class="btn btn-primary delete_checked">Delete Selected</a>
									<!-- end widget content -->
								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->
						</article>
						<!-- WIDGET END -->
					</div>

					<!-- end row -->

					<!-- row -->

					<div class="row">

						<!-- a blank row to get started -->
						<div class="col-sm-12">
							<!-- your contents here -->
						</div>
					</div>

					<!-- end row -->
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

		<?php require_once('include/footer.php');?>
		<script src="<?php echo ROOT; ?>js/plugin/moment/moment.min.js"></script>
		<script src="<?php echo ROOT; ?>js/moment-range.min.js"></script>
                <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
                <script type="text/javascript" src="js/site.js"></script>
<script type="text/javascript" src="http://tablesorter.com/__jquery.tablesorter.min.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.css" />
          <script type="text/javascript" src="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript">
			var oTable,nodes;
			get_classes();
		
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
			function showlist(name)
			{
				$(name).show();
			}
			function closelist(name)
			{
				$(name).hide();
			}
			$(function(){
				
				$('#date_search').datepicker({onSelect:function(){
					oTable.fnDraw(); 
				}});
				
				$('.check_all').on('click',function(){
					if($('.check_all').html()=='Uncheck All')
					{
						$('.check_all').removeAttr('checked');
						$('.check_all').html('Check All');
						$('.class_chk',nodes).each(function(){
							//$(this).removeAttr('checked');
							this.checked=false;
						})
					}
						else
					{
							$('.check_all').html('Uncheck All');
							$('.check_all').attr('checked','checked');
						$('.class_chk',nodes).each(function(){
							//$(this).attr('checked','true');
							this.checked=true;
						})
					}
				});

				$('.delete_checked').on('click',function()
				{
					if(confirm('Are you sure, you want to delete?'))
					{
						if($('.class_chk:checked',nodes).length==0)
						{
							showSuccess('Please select class first.');
						}
						else
						{
							$('.class_chk',nodes).each(function(){
								if($(this).is(':checked'))
								{	var chkbx = $(this);
									var Classes = Parse.Object.extend("classes");
									var q = new Parse.Query(Classes);
									q.get($(this).val(), {
									   success: function(q) { 
										//console.log(q);
										//alert(q.id);
										var cid = q.id;
										q.destroy({
											success:function()
											{
												var Slots = Parse.Object.extend("class_slot");
												var cs = new Parse.Query(Slots);
												cs.equalTo('classId',cid);
												cs.find({
													success:function(all_slots)
													{
														if(all_slots)
														{
															for(i in all_slots)
															{
																all_slots[i].destroy();
																del_slot_res(cid,all_slots[i].id);
																del_fed(cid,all_slots[i].id);
																$(chkbx).closest('tr').remove();
															}
															showSuccess('Class deleted successfully.');
														}
													}
												})

												


												//$('.rooms tbody').empty();
												//get_classes();
												
												//$('#example').DataTable();
												//window.location.reload();
											},
											error:function(){
												showError('Class could not be saved. Please try again.');
											}
										})            
									   },
									   error: function(q, error) {
										  //showError(error.message);
									   }
									 });
								}
							});
						}
					}
				});

				$("#class_search,#room_search,#day_search,#instructor_search").on("keyup", function() {
					//alert('first');
				  oTable.fnDraw(); // redraw the table, which will automatically invoke our filter again
				});
				$('#date_search').on('blur',function(){
					oTable.fnDraw(); 
				})

			})

			var check_all_input_values = function(oSettings, aData, iDataIndex) {
 
			 //alert('second');
			  var platformSearchValue = $("#class_search").val();
			  var thisRowsPlatformValue = aData[2];
			  if(!(thisRowsPlatformValue.match(platformSearchValue))) {
				  return false;
			   }
			 
			
			  var gradeSearchValue = $("#room_search").val();
			  var thisRowsGradeValue = aData[3];
			  if(!(thisRowsGradeValue.match(gradeSearchValue ))) {
				  return false;
			   }
			 
			 
			  var browserSearchValue = $("#instructor_search").val();
			  var thisRowsBrowserValue = aData[4];
			  if(!(thisRowsBrowserValue.match(browserSearchValue))) {
				  return false;
			   }

			    var date_search = $("#date_search").val();
			  var thisdate_search = aData[5];
			  if(!(thisdate_search.match(date_search))) {
				  return false;
			   }

			   var day_search = $("#day_search").val();
			  var thisday_search = aData[6];
			  if(!(thisday_search.match(day_search))) {
				  return false;
			   }
			 
			  
			  return true;
			};
 


			function del_slot_res(class_id,slot_id)
			{
				var Res = Parse.Object.extend("class_reservation");
				var cs = new Parse.Query(Res);
				cs.equalTo('classId',class_id);
				cs.equalTo('slotId',slot_id);
				cs.find({
					success:function(reservations){
						if(reservations)
						{
							for(i in reservations)
							{
								reservations[i].destroy();
							}
						}
					}
				})
			}
			function del_fed(class_id,slot_id)
			{
				var Res = Parse.Object.extend("feedback");
				var cs = new Parse.Query(Res);
				cs.equalTo('classId',class_id);
				cs.equalTo('slotId',slot_id);
				cs.find({
					success:function(reservations){
						if(reservations)
						{
							for(i in reservations)
							{
								reservations[i].destroy();
							}
						}
					}
				})
			}
		</script>
		<style>
			/*.dataTables_filter, .dataTables_info { display: none; }*/
		</style>
	</body>
</html>
