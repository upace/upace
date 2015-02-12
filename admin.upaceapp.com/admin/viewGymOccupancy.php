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
<style>
#shwGrid ul
{
	clear:both;
	display:none;
}
</style>

<div class="row">
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
		<h1 class="page-title txt-color-blueDark">
			
			<!-- PAGE HEADER -->
			<i class="fa-fw fa fa-bar-chart-o"></i> 
				Occupancy
			<span>>  
				Details View			</span>		</h1>
<h1 class="page-title txt-color-blueDark gymRoom">
					Gym
			<span>>  
				Room			</span>		</h1>

	</div>
</div>
				
				<section id="widget-grid" class="">
				<div class="form-group">
					  <label>Select Date</label>
					  <form name="form1" id="form1" action="" method="get">
					  <?php if(isset($_REQUEST['day']) && !empty($_REQUEST['day'])){$dt=$_REQUEST['day'];}
					  else{$dt=date('Y/m/d');}?>
					  <input class="form-control start_time"  id="day" name="day" readonly="readonly" type="text" placeholder="Search by date" required="required" value="<?php echo $dt;?>" />
					  <input type="hidden" name="gid" id="gid" value="<?php echo $_REQUEST['gid']?>"/>
					  <input type="hidden" name="rid" id="rid" value="<?php echo $_REQUEST['rid']?>"/>
					  <input type="submit" name="Search" value="Search" class="btn btn-primary" />
					  </form>
			    </div> 
                               <div class="row">
                               <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 <div class="jarviswidget well" id="">     
                                                <div id="sin-chart" class="chart has-legend"></div>
                               </div> 
                               </article>
                               </div>        
                   </section>
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
									<h2>View Occupancy </h2>				
								</header>

								<div class="allGyms" >
									<ul class="gymsList">
									</ul>
								</div>
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
										<div>
											
											<ul id="shwGrid">
												<ul id='12_AM'><li class="ligrid1">12:00 - 12:59 AM</li></ul>
												<ul id='01_AM'><li class="ligrid1">01:00 - 01:59 AM</li></ul>
												<ul id='02_AM'><li class="ligrid1">02:00 - 02:59 AM</li></ul>
												<ul id='03_AM'><li class="ligrid1">03:00 - 03:59 AM</li></ul>
												<ul id='04_AM'><li class="ligrid1">04:00 - 04:59 AM</li></ul>
												<ul id='05_AM'><li class="ligrid1">05:00 - 05:59 AM</li></ul>
												<ul id='06_AM'><li class="ligrid1">06:00 - 06:59 AM</li></ul>
												<ul id='07_AM'><li class="ligrid1">07:00 - 07:59 AM</li></ul>
												<ul id='08_AM'><li class="ligrid1">08:00 - 08:59 AM</li></ul>
												<ul id='09_AM'><li class="ligrid1">09:00 - 09:59 AM</li></ul>
												<ul id='10_AM'><li class="ligrid1">10:00 - 10:59 AM</li></ul>
												<ul id='11_AM'><li class="ligrid1">11:00 - 11:59 AM</li></ul>
												<ul id='12_PM'><li class="ligrid1">12:00 - 12:59 PM</li></ul>
												<ul id='01_PM'><li class="ligrid1">01:00 - 01:59 PM</li></ul>
												<ul id='02_PM'><li class="ligrid1">02:00 - 02:59 PM</li></ul>
												<ul id='03_PM'><li class="ligrid1">03:00 - 03:59 PM</li></ul>
												<ul id='04_PM'><li class="ligrid1">04:00 - 04:59 PM</li></ul>
												<ul id='05_PM'><li class="ligrid1">05:00 - 05:59 PM</li></ul>
												<ul id='06_PM'><li class="ligrid1">06:00 - 06:59 PM</li></ul>
												<ul id='07_PM'><li class="ligrid1">07:00 - 07:59 PM</li></ul>
												<ul id='08_PM'><li class="ligrid1">08:00 - 08:59 PM</li></ul>
												<ul id='09_PM'><li class="ligrid1">09:00 - 09:59 PM</li></ul>
												<ul id='10_PM'><li class="ligrid1">10:00 - 10:59 PM</li></ul>
												<ul id='11_PM'><li class="ligrid1">11:00 - 11:59 PM</li></ul>
											</ul>
											
										</div>
									</div>
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
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.css" />
        <script type="text/javascript" src="<?php echo ROOT; ?>js/datetimepicker/bootstrap-datetimepicker.js"></script>
		     <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
                <script type="text/javascript" src="js/site.js"></script>

		<script type="text/javascript">
			function checkNumber(e)
			{
				if(e.which >= 48 && e.which<=57)
				 return true;
				else 
				 return false; 
			}
			//get_listOccupancy();
			//getGymPercentage();
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
			var $chrt_border_color = "#efefef";
			var $chrt_grid_color = "#DDD"
			var $chrt_main = "#E24913";
			/* red       */
			var $chrt_second = "#6595b4";
			/* blue      */
			var $chrt_third = "#FF9F01";
			/* orange    */
			var $chrt_fourth = "#7e9d3a";
			/* green     */
			var $chrt_fifth = "#BD362F";
			/* dark red  */
			var $chrt_mono = "#000";
			$(document).ready(function() {

				$('#day').datepicker({
				dateFormat : 'yy/mm/dd',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				/*onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}*/
			});
				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				//pageSetUp();


				/* Sin chart */

                //var sin = [];
                var ggg = new Array();
                var uvId = currentUser.get('universityId');
				var uvId = '<?php echo $_REQUEST["gid"]?>';
				var rmId = '<?php echo $_REQUEST["rid"]; ?>';
                var Occ = Parse.Object.extend("university_gym");
                var qOcc = new Parse.Query(Occ);
                qOcc.equalTo('objectId',uvId);
				qOcc.limit('1000');
                qOcc.find({
                	success: function(qOccRes){
                	 for(j in qOccRes)
                	 {
                	 	var gymId = qOccRes[j].id;
						/******************* Check Gym Start time and End Time *********************/
							gym_details = qOccRes[j];
							cur_day = $('#day').val();
							console.log(gym_details);
							week_day = moment(cur_day,'YYYY/MM/DD').format('e');
							start_time = gym_details.get('openTime' + week_day);
							end_time = gym_details.get('closeTime' + week_day);

							gym_start_time = moment(start_time,"hh:mm A").format('H');
							gym_end_time = moment(end_time,"hh:mm A").format('H');
							
							//console.log("start time - " + st_time['0']);
							//var i=0;
							do
							{
								//.log('start :- ' + start_time);
								st_time = start_time.split(':');
								temp_time = ("0" + st_time['0']).slice(-2);
								split_ap = st_time['1'].split(' ');
								$('#' + temp_time + '_' + split_ap['1']).show();
								st_time['0']++;
								if(st_time['0']==12)
								{
									if(split_ap['1'] == 'AM')
									{
										split_ap['1'] = 'PM';
									}
									else
									{
										split_ap['1'] = 'AM';
									}
								}
								if(st_time['0']==13)
								{
									start_time = "01:00 " + split_ap['1'];
								}
								else
								{
									temp_time = ("0" + st_time['0']).slice(-2);
									start_time = temp_time + ":00 " + split_ap['1'];

								}
								//console.log('end :- ' + start_time);
								//i++;
							}
							while(start_time != end_time);
								
							//while(i != 20);
							//while(start_time != end_time);
						/******************* Check Gym Start time and End Time *********************/
                	 	getDataChartGym(gymId,j,qOccRes.length,rmId);
                	 }
                	}
                })
					/************* Get Room And Gym Details ******************/
				if(rmId)
				{
					var RM = Parse.Object.extend("room");
					var rm = new Parse.Query(RM);
					rm.equalTo('objectId',rmId);
					rm.include('university');
					rm.first({
						success: function(RmDetails){
							if(RmDetails)
							{
								univ = RmDetails.get('university');
								var tmp = univ.get('name') + ' <span>> ' + RmDetails.get('name') + '</span>';	
								$('.gymRoom').html(tmp);
							}							
						}
					});
				}
				/************* Get Room And Gym Details ******************/
                
				function getDataChartGym(gymId,j,qLen,rmId)
                {
                	 //alert(qLen+'|'+j);
                   var sin = [];
                   //alert(gymId)
                   var Room = Parse.Object.extend("room_occupancy");
		           var q = new Parse.Query(Room);
		           var c=1;var old_date;
		           var i=0;
		           var checkDate = $('#day').val();//'2015/01/07';
		           var prevdate='';
		            if(rmId)
					{
					   q.equalTo("roomId", rmId);
					}
					else
					{
						q.equalTo("gymId", gymId);
					}
		           q.ascending('updatedAt');
		           q.include('gym');
				   q.limit('1000');
		           q.find({
		             success: function(results){
		                if(!jQuery.isEmptyObject(results))
		                {
		                	
							for(i in results)
							{
				              if(i==0)
				              {
				              	var noRomms = 0;
				               var totalPercentage = 0;
				              }
				              
				              
				              var room = results[i];
				              var GYM = room.get('gym');
				              //console.log(room);
				              var row;
				              if(room)
				              {
				                  date = new Date(room.updatedAt);
				                  if(moment(date).format('YYYY/MM/DD') == checkDate )
								  {
									  console.log(date);
									  var per = room.get('percentage');
									  console.log(per);
									  sin.push([date, per]);
									  if(per<51){var cls='green';}
									  else if(per<91 && per>50){var cls='yellow';}
									  else if(per>=91 ){var cls='red';}
									  var row;
									  var row = '<li class="ligrid '+cls+'" style="text-align:center">';
									  row += '<h4><b>'+per+'%</b></h4>';
									  row += moment(date).format('hh:mm A');
									  row += '</li>';
									  if(row){
										  console.log(moment(date).format('hh A') + ' - ' + moment(old_date).format('hh A'));
										  
										  $('#'+moment(date).format('hh_A')).append(row);
										  old_date = date;
										  }
								  }
							   }
				             }
							  //var tt = parseInt(totalPercentage/noRomms);
							  //console.log('Last|'+totalPercentage+'|'+noRomms);
							  //sin.push([prevdate, tt]);
							  
							  ggg.push({'data':sin,'label':GYM.get('name')});
				          
						}
		           	}
		           });
		           
		           if(parseInt(qLen-1)==j)
		           {
		           	//alert(qLen+j);
		           	//console.log(ggg);
		           	//getChartData(ggg);
		           	setTimeout(function() { getChartData(ggg,checkDate); }, 5000);
		           }
                }

               /* function getDataChartGym(gymId,j,qLen)
                {
                	 //alert(qLen+'|'+j);
                   var sin = [];
                   //alert(gymId)
                   var Room = Parse.Object.extend("room_occupancy");
		           var q = new Parse.Query(Room);
		           var c=1;
		           var i=0;
		           //alert(noRomms);
		           var prevdate='';
		           q.equalTo("gymId", gymId);
		           q.descending('updatedAt');
		           q.include('gym');
		           q.find({
		             success: function(results){
		                if(!jQuery.isEmptyObject(results))
		                {
		                	for(i in results){
				              if(i==0)
				              {
				              	var noRomms = 0;
				               var totalPercentage = 0;
				              }
				              
				              //alert(parseInt(noRomms));
				              var room = results[i];
				              var GYM = room.get('gym');
				              //console.log(i);
				              
				              if(room)
				              {
				                  
				                  date = new Date(room.updatedAt);
				                  console.log(date);
				                  var per = room.get('percentage');
				                  if(prevdate)
				                  {
				                  	//alert('prev');
				                  	//console.log(moment(date).format('YYYY.MM.DD'));
				                  	//console.log(moment(prevdate).format('YYYY.MM.DD'));
				                  	if(moment(date).format('YYYY.MM.DD')==moment(prevdate).format('YYYY.MM.DD'))
				                  	{
				                  		totalPercentage = parseInt(totalPercentage+per);
				                  		noRomms++;
				                  		//console.log('Same|'+totalPercentage+'|'+noRomms);
				                  		
				                  	}
				                  	else if(i==0)
				                  	{
				                  		totalPercentage = parseInt(totalPercentage+per);
				                  		noRomms++;
				                  	}
				                  	else
				                  	{
				                  		//console.log('All|'+totalPercentage+'|'+noRomms);
				                  		var tt = parseInt(totalPercentage/noRomms);
				                  		sin.push([prevdate, tt]);
				                  		var totalPercentage = parseInt(per);
				                  		var noRomms = 1;
				                  		//alert(noRomms);
				                  	}
				                  }
				                  else{
				                  	//alert(per);
				                  	totalPercentage = parseInt(totalPercentage+per);
				                  	noRomms++;
				                  	//console.log('New|'+totalPercentage+'|'+noRomms);
				                  }
				                  
				                  
				                  //console.log(date);
				                  //sin.push([date, per]);
				                  //console.log(sin);
				                  prevdate = date;
				              }
				              
				          }
				          var tt = parseInt(totalPercentage/noRomms);
				          //console.log('Last|'+totalPercentage+'|'+noRomms);
				          sin.push([prevdate, tt]);
				          
				          ggg.push({'data':sin,'label':GYM.get('name')});
				          
				      }
		           	}
		           });
		           
		           if(parseInt(qLen-1)==j)
		           {
		           	//alert(qLen+j);
		           	//console.log(ggg);
		           	//getChartData(ggg);
		           	setTimeout(function() { getChartData(ggg); }, 5000);
		           }
                }*/
                
                
               function getChartData(ggg,checkDate)
		     {
		         if ($("#sin-chart").length) 
		         {
		        // console.log(ggg);
		         
		         /*var plot = $.plot($("#sin-chart"), [
		         
		         {
		                 data : sin+j,
		                 label : "Gym"
		         },{
		                 data : sin+j,
		                 label : "Gym"
		         }],*/
		         var plot = $.plot($("#sin-chart"), ggg, {
		                 series : {
		                         lines : {
		                                 show : true
		                         },
		                         points : {
		                                 show : true
		                         }
		                 },
		                 grid : {
		                         hoverable : true,
		                         clickable : false,
		                         tickColor : $chrt_border_color,
		                         borderWidth : 0,
		                         borderColor : $chrt_border_color,
		                 },
		                 tooltip : true,
		                 tooltipOpts : {
		                         //content : "Date <b>$x</b> Occupancy <span>$y</span>",
		                        	dateFormat: "%I:%M",
		                         defaultTheme : false
		                 },
		                 colors : [$chrt_second, $chrt_fourth],
		                 yaxis : {
		                         min : 0,
		                         max : 110
		                 },
		                 xaxis : {
		                         mode : 'time',
		                         timeformat:'%I:%M %P',
								 minTickSize: [1, "hour"],
								 min: ((new Date(checkDate)).getTime() + gym_start_time*60*60*1000),
								 max: ((new Date(checkDate)).getTime() + gym_end_time*60*60*1000),
		                         //min: ((new Date(checkDate)).getTime() - 1*60*60*1000),
								 //max: ((new Date(checkDate)).getTime() + 25*60*60*1000),
								 timezone: "browser"
		                 }
		         });
		         
		         $("#sin-chart").bind("plotclick", function(event, pos, item) {
				if (item) {
					$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
					plot.highlight(item.series, item.datapoint);
				}
						    });
						}
		     }
                
                                    
					
				});
		</script>
		<style>
			.divGrid{margin: 22px;}
			.ligrid{width: auto;
float: left;
list-style-type: none;
font-weight:bold;
padding: 9px 22px;
font-size: 14px;
font-weight: normal;
color: #fff;
font-family: ProximaNova-Regular;
margin: 5px 5px;}
.red{background: #EF4036;}
.green{background: #17DF33;}
.yellow{background: #DBC525;}
.ligrid1{width: auto;
float: left;
list-style-type: none;
font-weight:bold;
padding: 9px 22px;
font-size: 14px;
font-weight: normal;
color: #000;
font-family: ProximaNova-Regular;
margin: 5px 5px;
line-height: 38px;}
#shwGrid ul
{
	clear:both;
}
		</style>
	</body>
</html>
