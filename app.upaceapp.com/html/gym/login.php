<?php require_once('include/config.php');?>
<?php require_once('include/functions.php');?>
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>	
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) {
    window.location = '/admin/index.php' ;
}
</script>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php require_once('include/header.php');?>
		<link href="<?php echo ROOT?>font-awesome/css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo ROOT?>css/style.css" rel="stylesheet">
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

	<div class="overlay" id="forgot_div" style="display:none;">
            <div class="container">
                <form method="post" id="forgot_form">
                    <div class="login-pg signup-pg terms">
                        <div class="row">
                                <div class="col-lg-12">
                                                <h1>PASSWORD</h1>
                                <a href="javascript:void(0);" class="cancel" onclick="$('#forgot_div').fadeOut(800);"><img src="<?php echo ROOT;?>img/cancel.png" alt=""></a>
                                        <p style="text-align:center">Enter your Email address to reset your password</p>
                            </div>
                        </div>
                        <div class="txt-field">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" value="" id="forgot_email" name="forgot_email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="button" id="forgot_btn" class="signup" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
           </div>
        </div>	

		<!-- MAIN PANEL -->
		<div id="main" role="main" style="margin:0 auto;width:50%;">

			

			<!-- MAIN CONTENT -->
			<div id="content">




<!-- widget grid -->
<section id="widget-grid" class="">

	<div class="row">
		<div class="col-sm-12">
			<center><img src="/img/logo.png" class="img-responsive" style="max-width: 200px" /></center>
		</div>
	</div>	


	<!-- START ROW -->

	<div class="row">

		

		<!-- NEW COL START -->
		<article class="col-sm-8 col-md-8 col-lg-8" style="width:100%;margin-top:12%;">
		
			
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
					
					data-widget-sortable="false"
					
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Login </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box 
					<div class="jarviswidget-editbox">
						
						
					</div>-->
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="result-msg"></div>
						<form id="smart-form-register" class="smart-form" method="post" >
						
							<header>
								Login
							</header>

							

							<fieldset>
								<section class="col col-9">
									<div class="form-group">
										<label class="control-label col-md-2" for="prepend">Username</label>
										<div class="col-md-10">
											<div class="icon-addon addon-md">
							                    <input type="text" placeholder="Username" class="form-control" id="username" name="username" />
							                    
							                </div>
										</div>
									</div>
								</section>
								
								<section class="col col-9">
									<div class="form-group">
										<label class="control-label col-md-2" for="prepend">Password</label>
										<div class="col-md-10">
											<div class="icon-addon addon-md">
							                    <input type="password" placeholder="password" class="form-control" id="password" name="password" />
							                </div>
										</div>
									</div>
								</section>
								
								
								
							</fieldset>
							
							
							<footer>
								
								<button type="button" class="btn btn-primary" name="Submit" id="Submit" value="Register">
									Submit
								</button>
							</footer>
							<footer>
								
								<button type="button" class="btn btn-primary" name="Forgot" id="Forgot" value="Forgot Password" onclick="$('#forgot_div').fadeIn(800);">
									Forgot Password
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
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			
			pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					username : { required : true },
					password : { required : true }
					
				},
	
				// Messages for form validation
				messages : {
					username : { required : 'Please enter Username' },
					password : { required : 'Please enter Password' },
					
				},
				
				invalidHandler: function(event, validator) {
				    var errors = validator.numberOfInvalids();
				    if(errors)
					{
						validateError = 1;
					}
					else{
						validateError = 0;
					}
				  },
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
			
			$('#Submit').click(function() {
			   if ($('#smart-form-register').valid()) {
				 $('.result-msg').html('');
				 var form = $( "form" ).serializeArray();
				 document.getElementById('Submit').style.pointerEvents = 'none';
				 document.getElementById('Submit').style.opacity = '0.50';
				 login(form);
			   } else {
				  
			   }
		    });
		    
		    $('#forgot_btn').click(function(){
                                rest_password();
                        })
	
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
