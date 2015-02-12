<?php require_once('include/config.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) {
    window.location = 'landing' ;
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
	<?php require_once('include/header.php');?>
</head>

<body>
<script>
/*jQuery("#flogin").on("click", function(e){
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
Parse.User.logOut();
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    Parse.FacebookUtils.init({
      appId      : '513297188812943',                        // App ID from the app dashboard
      channelUrl : '//localhost.local/XXXXX/channel.html', // Channel file for x-domain comms
      status     : false,                                 // Check Facebook Login status
      xfbml      : true,                                  // Look for social plugins on the page
      logging    : true
    });

        Parse.FacebookUtils.logIn('email', {
            success: function(user) {
                if (!user.existed()) {

                    alert("User signed up and logged in through Facebook!");

                } else {

                    alert("User logged in through Facebook!");

                }
            },
            error: function(user, error) {
                alert("User cancelled the Facebook login or did not fully authorize.");
            }
        });



  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

});*/
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
jQuery.ajaxSetup({ cache: true });
 jQuery.getScript('//connect.facebook.net/en_US/all.js', function(){
  FB.init({ appId: '513297188812943'});    
  jQuery("#flogin").on("click", function(e){
   //alert('sadasd');
   e.preventDefault();    
   FB.login(function(response){
    // FB Login Failed //
    if(!response || response.status !== 'connected') {
     //alert("Given account information are not authorised", "Facebook says");
	 document.getElementById('login').style.pointerEvents = 'auto';
									document.getElementById('login').style.opacity = '1';
								   //alert('Invalid Username or Password !');
								   showError('Given account information are not authorised !');
    }else{
     // FB Login Successfull //
     FB.api('/me', function(fbdata){      
      console.log(fbdata); 
      var User = Parse.Object.extend("User");
	  var query = new Parse.Query(User);
        query.equalTo('email', fbdata.email);
		query.equalTo('fbId', fbdata.id);
		query.first({
			success: function(results){
				console.log(results);
				if(results)
				{
					
						
						// init the FB JS SDK
						Parse.FacebookUtils.init({
						  appId      : '513297188812943',                        // App ID from the app dashboard
						  channelUrl : '//localhost.local/XXXXX/channel.html', // Channel file for x-domain comms
						  status     : false,                                 // Check Facebook Login status
						  xfbml      : true,                                  // Look for social plugins on the page
						  logging    : true
						});
						//alert('asd');

							Parse.FacebookUtils.logIn(null, {
								success: function(user) {
									if (!user.existed()) {

										//alert("User signed up and logged in through Facebook!");

									} else {

										//alert("User logged in through Facebook!");
										window.location = '/landing?first=true';

									}
								},
								error: function(user, error) {
									//alert("User cancelled the Facebook login or did not fully authorize.");
									document.getElementById('login').style.pointerEvents = 'auto';
									document.getElementById('login').style.opacity = '1';
								   //alert('Invalid Username or Password !');
								   showError(error.message+'Your Account is not Active yet !');
								}
							});



					  

					  // Load the SDK asynchronously
					  (function(d, s, id){
						 var js, fjs = d.getElementsByTagName(s)[0];
						 if (d.getElementById(id)) {return;}
						 js = d.createElement(s); js.id = id;
						 js.src = "//connect.facebook.net/en_US/all.js";
						 fjs.parentNode.insertBefore(js, fjs);
					   }(document, 'script', 'facebook-jssdk'));
					
				}
				else
				{
					showError('Sorry Please register first to Upace!');
				}
			}
		});
        
      
     })
    }
   }, {scope:"email"});
    })
 });
</script>
    <section class="login-bg">
        <div class="overlay" id="forgot_div" style="display:none;">
            <div class="container">
                <form method="post" id="forgot_form">
                    <div class="login-pg signup-pg terms">
                        <div class="row">
                                <div class="col-lg-12">
                                                <h1>PASSWORD</h1>
                                <a href="javascript:void(0);" class="cancel" onclick="$('#forgot_div').fadeOut(800);"><img src="img/cancel.png" alt=""></a>
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
    
    <!-- Page Content -->
    <div class="container">
        <div class="login-pg">
        	<h1>LOGIN</h1>
            <div class="clearfix"></div>
            <div class="social-btn">
            	<div class="facebook"><input type="button" value="FACEBOOK" class="button" id="flogin"></div>
                 <div class="twitter"><input type="button" value="TWITTER" class="button" id="twitter" onclick="window.location='twitterLogin';"></div> 
            </div>
            <div class="clearfix"></div>
            <h2>OR</h2>
            <div class="clearfix"></div>
            <form class="txt-field" id="loginForm">
		       <label><input type="text" placeholder="Username" name="username" id="username" /></label>
		       <div class="clearfix"></div>
		       <aside>
		       <input type="button" value="FORGOT" class="forgot_btn" id="signup" onclick="$('#forgot_div').fadeIn(800);"/>
		       <input type="password" placeholder="Password" name="password" id="password" />
		       
		       </aside>
		       <input type="button" value="Login" class="button" id="login" />
            </form>
            <a href="<?php echo $ROOT;?>/register"><input type="button" value="Sign up NOW" class="signup" id="signup" /></a>
            
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



		<?php require_once('include/functions.php');?>
</body>
<style>
label{display:block;}
</style>
</html>
