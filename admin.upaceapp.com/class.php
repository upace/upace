<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> uPace </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- uPace Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">

		<!-- uPace RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override uPace
		     specific styles this will also ensure you retrain your customization with each uPace update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
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
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<a href="/"><span id="logo" style="margin-top: 0;"> <img src="img/logo.png" alt="uPace"> </span></a>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 3 </b> </span>

			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">New Members:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent members <i class="fa fa-angle-down"></i></span>

				<!-- Suggestion: populate this list with fetch and push technique -->
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">John Doe</a>
					</li>
					<li>
						<a href="javascript:void(0);">Angelina Jolie</a>
					</li>
					<li>
						<a href="javascript:void(0);">Jennifer Lopez</a>
					</li>
				</ul>
				<!-- end dropdown-menu-->

			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="img/avatars/sunny.png" alt="John Doe" class="online" />						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>							</li>
							<li class="divider"></li>
							<li>
								<a href="profile" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>							</li>
							<li class="divider"></li>
							<li>
								<a href="login" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="login" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<form action="" class="header-search pull-right">
					<input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"]'>
					<button type="submit">
						<i class="fa fa-search"></i>					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>				</div>
				<!-- end fullscreen button -->
				
				<!-- #Voice Command: Start Speech -->
				<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
					<div> 
						<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
						<div class="popover bottom"><div class="arrow"></div>
							<div class="popover-content">
								<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
								<h4 class="vc-title-error text-center">
									<i class="fa fa-microphone-slash"></i> Voice command failed
									<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
									<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>								</h4>
								<a href="javascript:void(0);" class="btn btn-success" onClick="commands.help()">See Commands</a> 
								<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onClick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a>							</div>
						</div>
					</div>
				</div>
				<!-- end voice command -->

			</div>
			<!-- end pulled right: nav area -->
		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe						</span>
						<i class="fa fa-angle-down"></i>					</a>				</span>			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<?php
				require_once('los-nav.php');
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
							Add Class							</span>						</h1>
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
												<label>Class Name</label>
												<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Class Name">
											</div>
											<div class="form-group">
												<label>Location</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="budget" class="valid">
															<option value="0" selected="" disabled="">Location</option>
															<option value="1">Room1</option>
															<option value="2">Room2</option>
														</select> <i></i> </label>
												</section>
											</div>
											<div class="form-group">
												<label>Class Description</label>
												<textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="400" id="description"></textarea>
												<p class="note">Maxlength is set to 400 characters</p>
											</div>
											<div class="form-group">
											
												<section  class="smart-form">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="radio-inline"  onClick="showfirst('#id1','#id2')">
															<i></i>Recurring </label>
														<label class="radio">
															<input type="radio" name="radio-inline" onClick="showfirst('#id2','#id1')">
															<i></i>Non Recurring </label>
													</div>
												</section>
											
											</div>
											<div id="id1" style="display:none">
												<div class="form-group">
													<label>Start date</label>
													<input type="text"  class="form-control" name="startdate" id="startdate" placeholder="Start Date" class="hasDatepicker">
													<i class="icon-append fa fa-calendar"></i>
												</div>
												<div class="form-group">
													<label>End date</label>
													<input type="text"  class="form-control" name="enddate" id="enddate" placeholder="End Date" class="hasDatepicker">
													
													<i class="icon-append fa fa-calendar"></i>
												</div>
												<div class="form-group">
													<input  id="title" name="title" maxlength="40" type="checkbox" value="1 Days">1 Days
													<input   id="title" name="title" maxlength="40" type="checkbox" value="4 Days">4 Days
													<input  id="title" name="title" maxlength="40" type="checkbox" value="7 Days">7 Days
													<input id="title" name="title" maxlength="40" type="checkbox" value="2 Week">2 Week
													<input id="title" name="title" maxlength="40" type="checkbox" value="3 Week">3 Week
												</div>
												<div class="form-group">
													<label>Start time</label>
													<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Start time">
												</div>
												<div class="form-group">
													<label>End time</label>
													<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="End time">
												</div>
												<hr>
											</div>
											<div id="id2" style="display:none">
												<div class="form-group">
													<label>Start date</label>
													<input type="text"  class="form-control" name="startdate1" id="startdate1" placeholder="Start Date" class="hasDatepicker">
												</div>
												<div class="form-group">
													<label>Start time</label>
													<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Start time">
												</div>
												<div class="form-group">
													<label>End time</label>
													<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="End time">
												</div>
												<hr>
											</div>
											<div class="form-group">
												<label>Instructor Name</label>
												<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Instructor Name">
											</div>
											
											<div class="form-group">
												<label>How many spots open in the class?</label>
												<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="How many spots open in the class?">
											</div>
											<div class="form-group">
												<label>How far in advance can they sign up</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="budget" class="valid">
															<option value="0" selected="" disabled="">Select</option>
															<option value="1">No limit</option>
															<option value="2">1 month</option>
															<option value="2">2 weeks</option>
															<option value="2">1 week</option>
															<option value="2">24 hours</option>
														</select> <i></i> </label>
												</section>
											</div>
											
											<div class="form-group">
												<label>How often can students sign up for class?</label>
												<section class="smart-form">
													<label class="select state-success">
														<select name="budget" class="valid">
															<option value="0" selected="" disabled="">Select</option>
															<option value="1">No limit</option>
															<option value="2">Insert Limit</option>
														</select> <i></i> </label>
												</section>
											</div>
											
										</fieldset>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-default" type="button" id="add-event" >
														Add Class													</button>
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
									<div id="calendar"></div>
				
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
		require_once('los-shortcut.php');
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="js/plugin/moment/moment.min.js"></script>
		<script src="js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>

		

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			

			    "use strict";
			
			    var date = new Date();
			    var d = date.getDate();
			    var m = date.getMonth();
			    var y = date.getFullYear();
			
			    var hdr = {
			        left: 'title',
			        center: 'month,agendaWeek,agendaDay',
			        right: 'prev,today,next'
			    };
			
			    var initDrag = function (e) {
			        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			        // it doesn't need to have a start or end
			
			        var eventObject = {
			            title: $.trim(e.children().text()), // use the element's text as the event title
			            description: $.trim(e.children('span').attr('data-description')),
			            icon: $.trim(e.children('span').attr('data-icon')),
			            className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
			        };
			        // store the Event Object in the DOM element so we can get to it later
			        e.data('eventObject', eventObject);
			
			        // make the event draggable using jQuery UI
			        e.draggable({
			            zIndex: 999,
			            revert: true, // will cause the event to go back to its
			            revertDuration: 0 //  original position after the drag
			        });
			    };
			
			    var addEvent = function (title, priority, description, icon) {
			        title = title.length === 0 ? "Untitled Event" : title;
			        description = description.length === 0 ? "No Description" : description;
			        icon = icon.length === 0 ? " " : icon;
			        priority = priority.length === 0 ? "label label-default" : priority;
			
			        var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
			            icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();
			
			        $("#event-container").effect("highlight", 800);
			
			        initDrag(html);
			    };
			
			    /* initialize the external events
				 -----------------------------------------------------------------*/
			
			    $('#external-events > li').each(function () {
			        initDrag($(this));
			    });
			
			    $('#add-event').click(function () {
			        var title = $('#title').val(),
			            priority = $('input:radio[name=priority]:checked').val(),
			            description = $('#description').val(),
			            icon = $('input:radio[name=iconselect]:checked').val();
			
			        addEvent(title, priority, description, icon);
			    });
			
			    /* initialize the calendar
				 -----------------------------------------------------------------*/
			
			    $('#calendar').fullCalendar({
			
			        header: hdr,
			        buttonText: {
			            prev: '<i class="fa fa-chevron-left"></i>',
			            next: '<i class="fa fa-chevron-right"></i>'
			        },
			
			        editable: true,
			        droppable: true, // this allows things to be dropped onto the calendar !!!
			
			        drop: function (date, allDay) { // this function is called when something is dropped
			
			            // retrieve the dropped element's stored Event Object
			            var originalEventObject = $(this).data('eventObject');
			
			            // we need to copy it, so that multiple events don't have a reference to the same object
			            var copiedEventObject = $.extend({}, originalEventObject);
			
			            // assign it the date that was reported
			            copiedEventObject.start = date;
			            copiedEventObject.allDay = allDay;
			
			            // render the event on the calendar
			            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			            // is the "remove after drop" checkbox checked?
			            if ($('#drop-remove').is(':checked')) {
			                // if so, remove the element from the "Draggable Events" list
			                $(this).remove();
			            }
			
			        },
			
			        select: function (start, end, allDay) {
			            var title = prompt('Event Title:');
			            if (title) {
			                calendar.fullCalendar('renderEvent', {
			                        title: title,
			                        start: start,
			                        end: end,
			                        allDay: allDay
			                    }, true // make the event "stick"
			                );
			            }
			            calendar.fullCalendar('unselect');
			        },
			
			        events: [{
			            title: 'All Day Event',
			            start: new Date(y, m, 1),
			            description: 'long description',
			            className: ["event", "bg-color-greenLight"],
			            icon: 'fa-check'
			        }, {
			            title: 'Long Event',
			            start: new Date(y, m, d - 5),
			            end: new Date(y, m, d - 2),
			            className: ["event", "bg-color-red"],
			            icon: 'fa-lock'
			        }, {
			            id: 999,
			            title: 'Repeating Event',
			            start: new Date(y, m, d - 3, 16, 0),
			            allDay: false,
			            className: ["event", "bg-color-blue"],
			            icon: 'fa-clock-o'
			        }, {
			            id: 999,
			            title: 'Repeating Event',
			            start: new Date(y, m, d + 4, 16, 0),
			            allDay: false,
			            className: ["event", "bg-color-blue"],
			            icon: 'fa-clock-o'
			        }, {
			            title: 'Meeting',
			            start: new Date(y, m, d, 10, 30),
			            allDay: false,
			            className: ["event", "bg-color-darken"]
			        }, {
			            title: 'Lunch',
			            start: new Date(y, m, d, 12, 0),
			            end: new Date(y, m, d, 14, 0),
			            allDay: false,
			            className: ["event", "bg-color-darken"]
			        }, {
			            title: 'Birthday Party',
			            start: new Date(y, m, d + 1, 19, 0),
			            end: new Date(y, m, d + 1, 22, 30),
			            allDay: false,
			            className: ["event", "bg-color-darken"]
			        }, {
			            title: 'Smartadmin Open Day',
			            start: new Date(y, m, 28),
			            end: new Date(y, m, 29),
			            className: ["event", "bg-color-darken"]
			        }],
			
			        eventRender: function (event, element, icon) {
			            if (!event.description == "") {
			                element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description +
			                    "</span>");
			            }
			            if (!event.icon == "") {
			                element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon +
			                    " '></i>");
			            }
			        },
			
			        windowResize: function (event, ui) {
			            $('#calendar').fullCalendar('render');
			        }
			    });
			
			    /* hide default buttons */
			    $('.fc-header-right, .fc-header-center').hide();

			
				$('#calendar-buttons #btn-prev').click(function () {
				    $('.fc-button-prev').click();
				    return false;
				});
				
				$('#calendar-buttons #btn-next').click(function () {
				    $('.fc-button-next').click();
				    return false;
				});
				
				$('#calendar-buttons #btn-today').click(function () {
				    $('.fc-button-today').click();
				    return false;
				});
				
				$('#mt').click(function () {
				    $('#calendar').fullCalendar('changeView', 'month');
				});
				
				$('#ag').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaWeek');
				});
				
				$('#td').click(function () {
				    $('#calendar').fullCalendar('changeView', 'agendaDay');
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
			$('#startdate').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			$('#startdate1').datepicker({
				dateFormat : 'dd.mm.yy',
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
				onSelect : function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});
			$('#enddate').datepicker({
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
	</body>
</html>