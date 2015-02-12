<?php ?>
	
<script>
function register(data)
{
    var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };

    var username = getValue("username");
    var password = getValue("password");
    var email = getValue("email");
    var firstName = getValue("firstName");
    var lastName = getValue("lastName");
    var universityId = getValue("university");
    var memberType = getValue("memberType");
    var gymFrequency = getValue("gymFrequency");
    
   
    //alert(objectId);
    var user = new Parse.User();
				user.set("lastname", lastName);
				user.set("firstname", firstName);
				user.set("email", email);
				user.set("username", username);
				user.set("password", password);
				user.set("universityId", universityId);
				user.set("memberType", memberType);
				user.set("gymFrequency", gymFrequency);
				user.set("userType", 'user');
						 
				user.signUp(null, {
					 success: function(user) {
					    // Everything's done!
						console.log(user.id);
						
							  //alert('Registered'+user.id);
							 
							  
							   $.ajax({
								  url : "/include/ajax.php",
								  type: "POST",
								  data : { method: 'send_mail_verification', firstName: firstName, Email: email,userId: user.id },
								  success: function(data1)
								  {
									if(data1){
									  showSuccess('You have Successfully registered. Please check email to activate your account.');
									  document.getElementById('signup').style.pointerEvents = 'auto';
		    						       document.getElementById('signup').style.opacity = '1';
									}else{
									  showError('Sorry Registered not Successful');
									  document.getElementById('signup').style.pointerEvents = 'auto';
		    						       document.getElementById('signup').style.opacity = '1';
									}
								   
								  }
							   });
							  
						    
					},
					error: function(user, error) {
						//alert("Error: " + error.code + " " + error.message);
						showError(error.message);
						document.getElementById('signup').style.pointerEvents = 'auto';
		    				document.getElementById('signup').style.opacity = '1';
						//$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">'+error.message+'</div>');
					}
					
					
				});
}

function checkUrl(data)
{
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var User = Parse.Object.extend("User");
     var query = new Parse.Query(User);
     query.equalTo("objectId", data);
     query.first({
     	success: function (user) {
     		var isActive = user.get('isActive');
     		if(isActive==1)
     		{
     			window.location = '/index.php?broken=true';
     		}
     		else{
     			var User = Parse.Object.extend("User");
      			var query = new Parse.Query(User);
                        query.equalTo("objectId", data);
                        query.first({
                        		success : function (user){
                        			
                                   user.set("isActive", 1);

                                   user.save(null, {
			                          success: function (user) {
									//alert('You are successfully registered.');
									console.log(user.get("username"));
									// alert(user.get("email"));
									 window.location = '/index.php?login=true';
									  
													
			                          },
								  error:function(user,error){
									   console.log(error.message);
									   alert("Error: " + error.code + " " + error.message);
								  }
			                      });
                        		}
                        });
     		}
     	}
     });
}	

function login(data)
{
	 var values = {};
	$.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };

    var username = getValue("username");
    var password = getValue("password");
    //alert(password);
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    
    var User = Parse.Object.extend("User");
    Parse.User.logIn(username, password, {
		  success: function(user) {
		    //alert(user.get("email"));
		    if(user.get("isActive")==1)
		    {
		    		window.location = '/landing?first=true';
		    }
		    else{
		    		Parse.User.logOut()
				//window.location = '/login'; 
				document.getElementById('login').style.pointerEvents = 'auto';
			    document.getElementById('login').style.opacity = '1';
			   //alert('Invalid Username or Password !');
			   showError('Your Account is not Active yet !');
		    }	
		  },
		  error: function(user, error) {
		    document.getElementById('login').style.pointerEvents = 'auto';
		    document.getElementById('login').style.opacity = '1';
		   //alert('Invalid Username or Password !');
		   showError('Invalid Username or Password !');
		  // $.notifyBar({ cssClass: "error", html: "Invalid Username or Password !",position: "top",delay:100000 });
		    
		  }
	});
}		
</script>
<?php

?>
