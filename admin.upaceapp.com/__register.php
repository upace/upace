<?php require_once('include/config.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) {
    //window.location = 'myreservations' ;
}
</script>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>
	<?php require_once('include/header.php');?>
</head>

<body>
	<section class="login-bg">
    <!-- Page Content -->
    <div class="container">
        <div class="login-pg">
        	<h1>SIGN UP</h1>
            <div class="clearfix"></div>
            <div class="social-btn">
            	<div class="facebook"><input type="button" value="FACEBOOK" class="button"></div>
                <div class="twitter"><input type="button" value="TWITTER" class="button"></div>
            </div>
            <div class="clearfix"></div>
            <h2>OR</h2>
            <div class="clearfix"></div>
            <form class="txt-field" id="loginForm">
            	  <div class="social-btn">
            	  <div class="facebook">
            	  	<label><input type="text" placeholder="First Name" name="firstName" id="firstName" /></label>
            	  </div>
		       <div class="twitter">
		       	<label><input type="text" placeholder="Last Name" name="lastName" id="lastName" /></label>
		       </div>
		       </div>
		       <!--<label><input type="text" placeholder="First Name" name="firstName" id="firstName" /></label>
		       <label><input type="text" placeholder="Last Name" name="lastName" id="lastName" /></label>-->
		       
		       <label><input type="email" placeholder="Email" name="email" id="email" /></label>
		       <label><input type="text" placeholder="University" name="university" id="university" /></label>
		       
		       <label><input type="text" placeholder="Member Type" name="memberType" id="memberType" /></label>
		       <label><input type="text" placeholder="Gym Freqency" name="gymFrequency" id="gymFrequency" /></label>
		       
		       <label><input type="text" placeholder="Username" name="username" id="username" /></label>
		       <label><input type="password" placeholder="Password" name="password" id="password" /></label>
		       
		       <input type="button" value="Sign Up" class="button" id="signup" />
            </form>
            
            <input type="button" value="Login" class="signup" id="login" />
        </div>
    </div>
    <!-- /.container -->
    </section>
	
    <!-- jQuery include Start -->
    	<?php require_once('include/footer.php');?>
    <!--Inclued jquery End --->
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			//pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#loginForm").validate({
	
				// Rules for form validation
				rules : {
					firstName : { required : true },
					lastName : { required : true },
					email : { required : true },
					university : { required : true },
					memberType : { required : true },
					gymFrequency : { required : true },
					username : { required : true },
					password : { required : true }
				},
				messages : {
					firstName : { required : 'Please enter First Name' },
					lastName : { required : 'Please enter Last Name' },
					email : { required : 'Please enter Email' },
					university : { required : 'Please enter University' },
					memberType : { required : 'Please enter Member Type' },
					gymFrequency : { required : 'Please enter Gym Frequency' },
					username : { required : 'Please enter Username' },
					password : { required : 'Please enter Password' }
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
			
			$('#signup').click(function() {
			   if ($('#loginForm').valid()) {
				
				 var form = $( "form" ).serializeArray();
				 document.getElementById('signup').style.pointerEvents = 'none';
				 document.getElementById('signup').style.opacity = '0.50';
				 register(form);
			   } else {
				  
			   }
		    });
	
		})

		</script>
		<?php require_once('include/functions.php');?>
</body>
<style>
label{display:block;}
</style>
</html>
