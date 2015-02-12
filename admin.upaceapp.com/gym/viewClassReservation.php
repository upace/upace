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

				<!--<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your details." data-html="true">
						<i class="fa fa-refresh"></i>					</span>				</span>-->

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
                            View Reservation			</span>		</h1>
    </div>
    <!--<a href="addSlot.php?rid=<?php echo $_GET['rid']; ?>">
        <button type="button" class="btn btn-primary add_slot" style="float: right;margin-top: 20px; margin-right: 20px;">
                Add Slot
        </button>
    </a>-->
</div>
				
				<section id="widget-grid1" class="">
					<div style="width:100%;">
						<div id="shwAccord"></div>
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
									<h2>View Class Reservation</h2>				
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
										
										<table id="example" class="display projects-table table table-striped table-bordered table-hover equipments" cellspacing="0" width="100%">
									        <thead>
									            <tr roll="row">
									                <th>#</th>
									                <th>Full Name</th>
									                <th>Class Name</th>
									                <th>Date</th>
									                <th>Start Time</th>
									                <th>End Time</th>
									                <th>Checkin</th>
													<th>Payment</th>
									                <th>Action</th>
									            </tr>
									        </thead>
									        <tbody>
												
												
												
												
										</tbody>
									    </table>
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

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<?php require_once('include/footer.php');?>
                <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
                <script type="text/javascript" src="js/site.js"></script>
                <script type="text/javascript" src="http://momentjs.com/downloads/moment.min.js"></script>
		<script type="text/javascript">
                    //----------- Get Equipments List
                    //get_equipments();
                    // get_occupancies(); 
					get_class_reservation_list();
					get_class_reservation_table();
                    
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
			function show_acc(elem)
			{
				$('.accord ul').hide();
				$(elem).find('ul').show();
			}
		</script>
<style>
.accord {
list-style-type: none;
margin: 0px 10px 0px 10px;
padding: 4px 27px;
width: 93%;
background: #fff;
float: left;
border:1px solid #cecece;
border-bottom:0px solid #000;
}
.accord h3{
margin: 0px;
width: 50%;
float: left;
}
.firstspan{
margin: 0px;

float: left;
color: #999;
font-weight: bold;

line-height:35px;border-right:1px solid #EEEEEE;width:20%;
}
.firstspan_n{
margin: 0px;

float: right;
color: #999;


line-height:35px;border-left:1px solid #EEEEEE;width:30%;
}
.accord ul{
padding: 12px;float: left;width: 100%;
display:none;
}
.accord ul li{
list-style-type: none;
border: 1px solid #eee;float: left;width: 100%;
}
.accord ul li h4{
width: 50%;
float: left;
border-right: 1px solid #eee;
padding: 7px 10px;
font-size: 14px;
font-weight: bold;
color: #999;
}
.onoffswitch{
line-height: 81px;
margin-top: 7px !important;width:auto !important;float: left;
}
.accord:first-child{
border-radius:8px 8px 0px 0px;
/*margin: 0px 10px;*/
}
.accord:last-child{
border-radius:0px 0px 8px 8px;
border-bottom:1px solid #cecece;
}

</style>
	</body>
</html>
