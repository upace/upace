<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
<script>
function logout(){	
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	Parse.User.logOut()
			window.location = '/superadmin/login';
	
}	


</script>
<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<a href="/"><span id="logo" style="margin-top: 0;"><img src="../img/logo.png" alt="uPace"></span></a>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				 <!--<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 3 </b> </span> -->

			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">New Members:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent members <i class="fa fa-angle-down"></i></span>

				<!-- Suggestion: populate this list with fetch and push technique -->
				<ul class="dropdown-menu" id="recent">
					<!--<li>
						<a href="javascript:void(0);">John Doe</a>
					</li>
					<li>
						<a href="javascript:void(0);">Angelina Jolie</a>
					</li>
					<li>
						<a href="javascript:void(0);">Jennifer Lopez</a>
					</li>-->
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
							<img src="../img/avatars/sunny.png" alt="John Doe" class="online" />						</a>
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
								<a href="javascript:void()" onclick="logout();" class="padding-10 padding-top-5 padding-bottom-5" ><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>							</li>
						</ul>
					</li>
				</ul>
 
				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="javascript:void()" onclick="logout();" id="signOut" title="Sign Out"  ><i class="fa fa-sign-out fa-lg"></i><strong><u>L</u>ogout</strong></a> </span>				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<!--<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>				</div>-->
				<!-- end search mobile button -->

				<!-- input: search field -->
				<!--<form action="" class="header-search pull-right">
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
				</form>-->
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<!--<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>				</div>-->
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
