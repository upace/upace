/*
 *  Register new user
 */

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
    var gym = getValue("gym");
    var fbId = getValue("fbId");
	 var auth = getValue("auth");
    //alert(fbId);
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
    user.set('isActive',1);
    user.set('universityGymId',gym);
    user.set('fbId',fbId);
	//user.set('authData',auth);

    user.signUp(null, {
             success: function(user) {
                // Everything's done!
                    //console.log(user.id);

                              //alert('Registered'+user.id);


                               /*$.ajax({
                                      url : "/include/ajax.php",
                                      type: "POST",
                                      data : { method: 'send_mail_verification', firstName: firstName, Email: email,userId: user.id },
                                      success: function(data1)
                                      {
                                            if(data1){
                                              showSuccess('You have Successfully registered. Please check email to activate your account.');
                                              $('#loginForm')[0].reset();
                                              document.getElementById('signup').style.pointerEvents = 'auto';
                                              document.getElementById('signup').style.opacity = '1';
                                              
                                                //var Login = Parse.Object.extend("User");
                                                Parse.User.logIn(username, password, {
                                                        success: function(login) {
                                                            //alert(user.get("email"));
                                                            //if(user.get("isActive")==1)
                                                            //{
                                                                window.location = 'landing';
                                                            //}
                                                                
                                                        }
                                                    });
                                            }else{
                                              showError('Sorry Registered not Successful');
                                              document.getElementById('signup').style.pointerEvents = 'auto';
                                           document.getElementById('signup').style.opacity = '1';
                                            }

                                      }
                           });*/
						   Parse.FacebookUtils.init({
      appId      : '513297188812943',                        // App ID from the app dashboard
      channelUrl : '//localhost.local/XXXXX/channel.html', // Channel file for x-domain comms
      status     : false,                                 // Check Facebook Login status
      xfbml      : true,                                  // Look for social plugins on the page
      logging    : true
    });
                           if (!Parse.FacebookUtils.isLinked(user)) {
							  Parse.FacebookUtils.link(user, null, {
								success: function(user) {
								  //alert("Woohoo, user logged in with Facebook!");
								  
								},
								error: function(user, error) {
								  alert(error.message);
								}
							  });
							}

							var r1 = Parse.Object("user_payment");
									r1.set("user", user);
									r1.set("userId",user.id);
									r1.set("isPaid",false);
									if(r1.save())
									{
										showSuccess('You have Successfully registered. ');
										$('#loginForm')[0].reset();
										document.getElementById('signup').style.pointerEvents = 'auto';
										document.getElementById('signup').style.opacity = '1';

										//var Login = Parse.Object.extend("User");
										Parse.User.logIn(username, password, {
										 success: function(login) {
												//alert(user.get("email"));
												//if(user.get("isActive")==1)
												//{
													window.location = 'landing';
												//}

										 }
										});
									}
                                
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

/*
 * Universities for select in Register Page
 */
function list_universities()
{
    var University = Parse.Object.extend("university");
    var q = new Parse.Query(University);
    var c=1;
    q.notEqualTo("is_deleted", true);
    q.equalTo('isActive',1);
    q.find({
        success: function(results){
            for(i in results){
                var university = results[i];
                //option = '<option value="'++'">'++'</option>';
                $("#university").append(new Option(university.get('name'), university.id));
           }
        }
    });
}

/*
 *  Get Gyms By University
 */
function get_gyms(universityId)
{
    var Gym = Parse.Object.extend("university_gym");
    var q = new Parse.Query(Gym);   
    q.equalTo('universityId',universityId);
    q.equalTo('isActive',1);
    q.equalTo('isDelete',0);
    q.find({
        success: function(results){
            $("#gym").empty();
            $("#gym").append(new Option("Select Gym", ""));
            for(i in results){
                var university = results[i];
                //option = '<option value="'++'">'++'</option>';
                $("#gym").append(new Option(university.get('name'), university.id));
           }
        }
    });
}

/*
 *  Password Reset
 */
function rest_password()
{
    var email = $('#forgot_email').val();
     var result=Parse.User.requestPasswordReset(email,{
         success : function(){
             showSuccess('Please check your email to reset password.');
             $('#forgot_email').val('');
             $('#forgot_div').fadeOut(800);
         },
         error : function(){
             showError('Invalid email id.');
         }
     
     });    
}

/*Check user type for redirection after reset password*/
function checkUserType(usr)
{
    //alert(usr);
    var users = Parse.Object.extend('User');
    var User = new Parse.Query(users);
    User.equalTo('username',usr);
    User.first({
        success: function(results){
            var uu = results;
            var type =  uu.get('userType');
            if(type=='superadmin')
            {
            	window.location.href = 'superadmin/login';
            }
            else if(type=='admin')
            {
            	window.location.href = 'admin/login';
            }
            else if(type=='gymadmin' || type=='staff' || type=='manager' || type=='instructor' )
            {
            	window.location.href = 'gym/login';
            }
            else if(type=='user')
            {
            	
            }
        }
    });
}
