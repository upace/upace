<?php require_once('include/config.php'); ?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
            <?php require_once('include/header.php');?>
	</head>
	
	
	<body class="">
<div class="modal fade" id="terms" >
	<div class="modal-dialog" style="width:50%">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">All Gym List</h4>
	  </div>
	  <div class="modal-body">
		<ul id="showListOfGym">
			
		</ul>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
	  </div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
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
				User
			<span>>  
				View User
			</span>
		</h1>
	</div>
	
	<a data-toggle="modal" data-target="#terms" style="cursor:pointer;text-decoration:none"><div style="float: right;background:#000;border-radius:100%;padding: 7px;margin-right: 22px;margin-top: 19px;"><img src="<?php echo ROOT;?>img/icon_location.png" style="width:18px;"/></div>
	<a>
	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="total">
		
	</div>
</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>View User</h2>
				
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
				
										<table id="datatable_tabletools" class="table table-striped table-bordered table-hover users" width="100%">
											<thead>
												<tr>
													<th data-hide="phone">ID</th>
													<th data-class="expand">Gym Name</th>
													<th data-class="expand">First Name</th>
													<th data-class="expand">Last Name</th>
													<th>Phone</th>
													<th data-hide="phone">Email</th>
													<th data-hide="phone">Has Paid</th>
<!--													<th data-hide="phone">Action</th>-->
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


		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		get_users();
		showListOfGym();

		</script>
<style>
h2{margin:0px;}
#showListOfGym li{list-style-type:none;}
#showListOfGym li a{text-decoration: none;
/*font-weight: bold;*/
font-size: 16px;}
</style>
	</body>

</html>