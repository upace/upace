<?php 
require_once('include/config.php');
$dt = date('Y-m-d H:i:s',$_REQUEST['d']);
$nw_dt = date('Y-m-d H:i:s');
$date1 = new DateTime($dt);
$date2 = new DateTime($nw_dt);
$diff = $date2->diff($date1);
$hours = $diff->h;
$hours = $hours + ($diff->days*24);


if(!isset($_REQUEST['uid']) || empty($_REQUEST['uid']) || $hours>23 || !isset($_REQUEST['d']) || empty($_REQUEST['d']))
{
	header('Location: '.ROOT.'admin/broken.php');
}
require_once('include/functions.php');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function() {
			checkUrlStaff("<?php echo base64_decode($_REQUEST['uid']);?>");
			});
</script>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php require_once('../include/header.php');?>
		<link rel="shortcut icon" href="<?php echo ROOT?>img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo ROOT?>img/favicon.ico" type="image/x-icon">
		<style>
		label{display:block;}
		</style>
	</head>
	
	
	<body class="">
		<section class="login-bg">
			<!-- Page Content -->
			<div class="container">
				<div class="login-pg">
					<h1>Register Now </h1>
					<div class="clearfix"></div>
					
					<div class="clearfix"></div>
					<form class="txt-field" id="loginForm">
						<input type="hidden" name="userId" id="userId" value="<?php echo base64_decode($_REQUEST['uid']);?>" />
					   <label>  <input type="text" placeholder="Username" class="form-control" id="username" name="username" /></label>
					   <div class="clearfix"></div>
					 
					  <label> 
						<input type="password" placeholder="Password" class="form-control" id="password" name="password" />
						</label>
						<label> 
						<input type="password" placeholder="Confirm Password" class="form-control" id="confirmPassword" name="confirmPassword" />
					   </label> 
					   
					   <input type="button" id="Submit" value="Register" class="button" />
					</form>
					
					
				</div>
			</div>
			<!-- /.container -->
		</section>
		

		<!-- 
		<div id="main" role="main">
			<div id="content">
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-8 col-md-8 col-lg-8">
			<div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Register Now </h2>	
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="result-msg"></div>
						<form id="smart-form-register" class="smart-form" method="post" >
						<input type="hidden" name="userId" id="userId" value="<?php echo base64_decode($_REQUEST['uid']);?>" />
							<header>
								Register Now
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
								
								<section class="col col-9">
									<div class="form-group">
										<label class="control-label col-md-2" for="prepend">Confirm Password</label>
										<div class="col-md-10">
											<div class="icon-addon addon-md">
							                    <input type="password" placeholder="confirmPassword" class="form-control" id="confirmPassword" name="confirmPassword" />
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
						</form>						
						
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
			</div>
		</div>-->
		
		<?php
		#require_once('include/los-shortcut.php');
		
		?>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<?php require_once('include/footer.php');?>
		
		<!-- PAGE RELATED PLUGIN(S) -->
	<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>	
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			
			pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#loginForm").validate({
	
				// Rules for form validation
				rules : {
					username : { required : true },
					password : { required : true },
					confirmPassword : { required : true,equalTo: "#password" }
				},
	
				// Messages for form validation
				messages : {
					username : { required : 'Please enter Username' },
					password : { required : 'Please enter Password' },
					confirmPassword : { required : 'Please enter Confirm Password ' }
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
			   if ($('#loginForm').valid()) {
				 $('.result-msg').html('');
				 var form = $( "form" ).serializeArray();
				 //console.log(form);
				 document.getElementById('Submit').style.pointerEvents = 'none';
		    			document.getElementById('Submit').style.opacity = '0.50';
				 registerStaff(form);
			   } else {
				  
			   }
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

		</script>

	</body>

</html>
