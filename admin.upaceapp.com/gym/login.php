<?php require_once('include/config.php');?>
<?php require_once('include/functions.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) {
    window.location = 'index' ;
}
</script>
<script type="text/javascript" src="<?php echo ROOT?>js/site.js"></script>
<?php if(isset($_REQUEST['username']) && !empty($_REQUEST['username']))
{?>
<script>
	checkUserType("<?php echo $_REQUEST['username'] ?>");
</script>
<?php }?>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>
	<?php require_once('../include/header.php');?>
	<link rel="shortcut icon" href="<?php echo ROOT?>img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo ROOT?>img/favicon.ico" type="image/x-icon">
</head>

<body>

    <section class="login-bg">
        <div class="overlay" id="forgot_div" style="display:none;">
            <div class="container">
                <form method="post" id="forgot_form">
                    <div class="login-pg signup-pg terms">
                        <div class="row">
                                <div class="col-lg-12">
                                                <h1>PASSWORD</h1>
                                <a href="javascript:void(0);" class="cancel" onClick="$('#forgot_div').fadeOut(800);"><img src="../img/cancel.png" alt=""></a>
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
                                    <input type="button" id="forgot_btn" class="signup" value="Submit" style="background:#4DB2C7 !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
           </div>
        </div>
    
    <!-- Page Content -->
    <div class="container">
        <div class="login-pg">
        	<h1>LOGIN</h1>
            <div class="clearfix"></div>
            
            <div class="clearfix"></div>
            <form class="txt-field" id="loginForm">
		       <label><input type="text" placeholder="Username" name="username" id="username" /></label>
		       <div class="clearfix"></div>
		       <aside>
		       <input type="button" value="FORGOT" class="forgot_btn" id="signup" onClick="$('#forgot_div').fadeIn(800);"/>
		       <input type="password" placeholder="Password" name="password" id="password" />
		       
		       </aside>
		       <input type="button" value="Login" class="button" id="login" />
            </form>
            
            
        </div>
    </div>
    <!-- /.container -->
    </section>
	 
    <!-- jQuery include Start -->
    	<?php require_once('../include/footer.php');?>
    <!--Inclued jquery End --->
		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			//pageSetUp();
			var validateError = 0;
					
			var $registerForm = $("#loginForm").validate({
	
				// Rules for form validation
				rules : {
					username : { required : true },
					password : { required : true }
				},
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
			
			$('#login').click(function() {
			   if ($('#loginForm').valid()) {
				 $('.result-msg').html('');
				 var form = $( "form" ).serializeArray();
				 document.getElementById('login').style.pointerEvents = 'none';
				 document.getElementById('login').style.opacity = '0.50';
				 login(form);
			   } else {
				  
			   }
                        });
                        
                        
                        $("#forgot_form").validate({
	
				// Rules for form validation
				rules : {
					forgot_email : { required : true }
				},
				messages : {
					forgot_email : { required : 'Please enter your email.' }
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
                        
                        $('#forgot_btn').click(function(){
                            if ($('#forgot_form').valid()) {
                                
                                rest_password();
                            }
                        })
	
		})

		</script>



	
</body>
<style>
label{display:block;}
</style>
</html>



