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
				<i class="fa fa-arrow-circle-left hit"></i>			</span>		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!--<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>					</span>				</span>-->

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Reporting</li>
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
						<h1 class="page-title txt-color-blueDark"><i class="fa fa-home"></i> Reporting</h1>
					</div>
				</div>

				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">

						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-collapsed="false" data-widget-togglebutton="false">
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
									<!--<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>-->
									<h2>Users joined over time.</h2>

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

										<div id="sin-chart" class="chart has-legend"></div>

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
		<script type="text/javascript">
			// PAGE RELATED SCRIPTS
                        
			/* chart colors default */
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

							 var sin = [];
                                    var c=1;
                                    var prevdate='';
                                    
                                    var gymId = currentUser.get('universityId');
                                    var User = Parse.Object.extend("User");
                                    var q = new Parse.Query(User);
                                    q.equalTo("universityId", gymId);
                                    q.equalTo('userType','user');
                                    q.descending('createdAt');
                                    q.find({
                                      success: function(results){
                                         for(i in results){
                                            if(i==0)
                                            {
                                            	var noRomms = 0;
                                             var totalPercentage = 0;
                                            }
                                            
                                            var user = results[i];
                                            if(user)
                                            {
                                                
                                                date = new Date(user.createdAt);
                                                //var per = user.get('createdAt');
                                                if(prevdate)
                                                {
                                                	
                                                	
                                                	if(moment(date).format('YYYY.MM.DD')==moment(prevdate).format('YYYY.MM.DD'))
                                                	{
                                                		totalPercentage = parseInt(totalPercentage+1);
                                                		noRomms++;
                                                		
                                                	}
                                                	else if(i==0)
                                                	{
                                                		totalPercentage = parseInt(totalPercentage+1);
                                                		noRomms++;
                                                	}
                                                	else
                                                	{
                                                		
                                                		var tt = parseInt(totalPercentage);
                                                		sin.push([prevdate, tt]);
                                                		var totalPercentage = parseInt(1);
                                                		var noRomms = 1;
                                                	}
                                                }
                                                else{
                                                	totalPercentage = parseInt(totalPercentage+1);
                                                	noRomms++;
                                                }
                                                prevdate = date;
                                            }
                                            
                                        }
                                        var tt = parseInt(totalPercentage);
                                        sin.push([prevdate, tt]);
                                        if ($("#sin-chart").length) {
                                            console.log(sin);
                                            
                                            
                                            var plot = $.plot($("#sin-chart"), [{
                                                    data : sin,
                                                    label : ""
                                            }], {
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
                                                            dateFormat: "%y-%m-%d",
                                                            defaultTheme : false
                                                    },
                                                    colors : [$chrt_second, $chrt_fourth],
                                                    yaxis : {
                                                            min : 0,
                                                            max : 30
                                                    },
                                                    xaxis : {
                                                            mode : 'time',
                                                            min : moment().subtract(30, 'days'),
                                                            max : moment()
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
                                    
					
				})
			$(document).ready(function() {

				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();


				/* Sin chart */

				
				/*End sin chart
				Start sin chart2
				*/
				if ($("#sin-chart2").length) {
					var sin = [], cos = [];
					for (var i = 0; i < 16; i += 0.5) {
						sin.push([i, Math.sin(i)]);
						cos.push([i, Math.cos(i)]);
					}

					var plot = $.plot($("#sin-chart2"), [{
						data : sin,
						label : "sin(x)"
					}, {
						data : cos,
						label : "cos(x)"
					}], {
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
							clickable : true,
							tickColor : $chrt_border_color,
							borderWidth : 0,
							borderColor : $chrt_border_color,
						},
						tooltip : true,
						tooltipOpts : {
							//content : "Value <b>$x</b> Value <span>$y</span>",
							defaultTheme : false
						},
						colors : [$chrt_second, $chrt_fourth],
						yaxis : {
							min : -1.1,
							max : 1.1
						},
						xaxis : {
							min : 0,
							max : 15
						}
					});

					$("#sin-chart2").bind("plotclick", function(event, pos, item) {
						if (item) {
							$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
							plot.highlight(item.series, item.datapoint);
						}
					});
				}

				/* end sin chart2
				Start sin chart3 */
				
				if ($("#sin-chart3").length) {
					var sin = [], cos = [];
					for (var i = 0; i < 16; i += 0.5) {
						sin.push([i, Math.sin(i)]);
						cos.push([i, Math.cos(i)]);
					}

					var plot = $.plot($("#sin-chart3"), [{
						data : sin,
						label : "sin(x)"
					}, {
						data : cos,
						label : "cos(x)"
					}], {
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
							clickable : true,
							tickColor : $chrt_border_color,
							borderWidth : 0,
							borderColor : $chrt_border_color,
						},
						tooltip : true,
						tooltipOpts : {
							//content : "Value <b>$x</b> Value <span>$y</span>",
							defaultTheme : false
						},
						colors : [$chrt_second, $chrt_fourth],
						yaxis : {
							min : -1.1,
							max : 1.1
						},
						xaxis : {
							min : 0,
							max : 15
						}
					});

					$("#sin-chart3").bind("plotclick", function(event, pos, item) {
						if (item) {
							$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
							plot.highlight(item.series, item.datapoint);
						}
					});
				}

				/* end sin chart3 */

			});

			/* end flot charts */

		</script>

	</body>

</html>
