<?php ?>
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
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
    var objectId = getValue("userId");
    
    
    //alert(objectId);
    Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    
  
	var UniversityGym = Parse.Object.extend("university_gym");
      var query = new Parse.Query(UniversityGym);
      query.equalTo("objectId", objectId);
       query.first({
                            success: function (universitygym) {
                               //console.log(universitygym);
                               var lastname= universitygym.get('lastname');
                               var firstname= universitygym.get('firstname');
                               var email= universitygym.get('email');
                               var universityId = universitygym.get('universityId');
                               var user = new Parse.User();
						user.set("lastname", lastname);
						user.set("firstname", firstname);
						user.set("email", email);
						user.set("username", username);
						user.set("password", password);
						user.set("userType", 'gymadmin');
						user.set("universityGymId", objectId);
						user.set("universityId", universityId);
						user.set("isActive", 1);
                               user.signUp(null, {
                                    
				                          success: function (user) {
										var tpName = 'Admin';
										var roleACL = new Parse.ACL();
										 roleACL.setWriteAccess(user, true);
										 roleACL.setPublicReadAccess(true);
										 var role = new Parse.Role(tpName, roleACL);
										 console.log(role);
      									var rQuery = new Parse.Query(Parse.Role);
										rQuery.equalTo("name", tpName);
										rQuery.first({
											success: function(returnObj) {
												var Userrole = Parse.Object.extend("userrole");
												var userrole = new Userrole({"role":returnObj,"roleId":returnObj.id,"user":user,"userId":user.id});
												userrole.save(null, {
												    success:function(b1){
												    	var University = Parse.Object.extend("university_gym");
													universitygym.set("users", user);
													universitygym.set("isActive", 1);
													universitygym.save(null, {
														success: function (universitygym) {
											
															Parse.User.logIn(username, password, {
															  success: function(user) {
															   // alert(user.get("email"));
															    window.location = '/gym/index';
															  },
															  error: function(user, error) {
															    console.log("you shall not pass!");
															  }
															});
														}
													});
												    }
												})
											}
										});
										
										
										
														
				                          },
									  error:function(user,error){
										   console.log(error.message);
										   alert("Error: " + error.code + " " + error.message);
									  }
				                      
                                    
                                });

                            }
                        });
}


function registerStaff(data)
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
    var objectId = getValue("userId");
    
    
    //alert(objectId);
    Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    
  
	var UniversityGym = Parse.Object.extend("gym_staff");
      var query = new Parse.Query(UniversityGym);
      query.equalTo("objectId", objectId);
      query.include("gym");
       query.first({
                            success: function (universitygym) {
                               //console.log(universitygym);
                               var gym = universitygym.get('gym');
                               var lastname = universitygym.get('lastname');
                               var firstname = universitygym.get('firstname');
                               var email = universitygym.get('email');
                               var type = universitygym.get('type');
                               var universityId = universitygym.get('universityId');
                               
                               var user = new Parse.User();
						user.set("lastname", lastname);
						user.set("firstname", firstname);
						user.set("email", email);
						user.set("username", username);
						user.set("password", password);
						user.set("userType", type);
						user.set("universityGymId", gym.id);
						user.set("universityId", universityId);
						user.set("isActive", 1);
                               user.signUp(null, {
                                    
				                          success: function (user) {
										if(type=='staff'){var tpName = 'Staff';//'xG3rXcpPWY';
										}
										if(type=='instructor'){var tpName = 'Instructor';//'7LogkoFam3';
										}
										if(type=='manager'){var tpName = 'Fitness Manager';//'cP1E9qmm4d';
										}
										//alert(tpName);
										/*var role = Parse.Object.extend('Role');
										var rQuery = new Parse.Query(role);
      									rQuery.equalTo("objectId", tpName);
      									rQuery.first({
      										success: function (rl) {
      											console.log(rl);
      											alert(rl.id);
      										}
      									});*/
      									var roleACL = new Parse.ACL();
										 roleACL.setWriteAccess(user, true);
										 roleACL.setPublicReadAccess(true);
										 var role = new Parse.Role(tpName, roleACL);
										 console.log(role);
      									var rQuery = new Parse.Query(Parse.Role);
										rQuery.equalTo("name", tpName);
										rQuery.first({
										    success: function(returnObj) {
											   //alert("found role: "+ returnObj.id + ' '+returnObj.get("name"));
											   var Userrole = Parse.Object.extend("userrole");
												var userrole = new Userrole({"role":returnObj,"roleId":returnObj.id,"user":user,"userId":user.id});
												userrole.save(null, {
												    success:function(b1){
												    var staff = Parse.Object("gym_staff");
													staff.id = universitygym.id;
													staff.set("users", user);
													staff.set("isActive", 1);
													staff.save(null, {
														success: function (universitygym) {
												
															Parse.User.logIn(username, password, {
															  success: function(user) {
															   // alert(user.get("email"));
															    window.location = '/gym/index';
															  },
															  error: function(user, error) {
															    console.log("you shall not pass!");
															  }
															});
														}
													});
												    }
											});											   
											   
										    },
										    error: function(returnObj, error) {
										    alert("Failed with error: " + error.code + ":"+ error.message);
										    }
										});    
      									//alert(rl.id);
										/*var staff = Parse.Object("gym_staff");
										staff.id = universitygym.id;
										staff.set("users", user);
										staff.set("isActive", 1);
										staff.save(null, {
											success: function (universitygym) {
												
												Parse.User.logIn(username, password, {
												  success: function(user) {
												   // alert(user.get("email"));
												    window.location = '/gym/index';
												  },
												  error: function(user, error) {
												    console.log("you shall not pass!");
												  }
												});
											}
										});*/
														
				                          },
									  error:function(user,error){
										   console.log(error.message);
										   alert("Error: " + error.message);
										   //$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry wrong UserName or Password!</div>');
		    document.getElementById('Submit').style.pointerEvents = 'auto';
		    document.getElementById('Submit').style.opacity = '1';
									  }
				                      
                                    
                                });

                            }
                        });
}



function checkUrl(data)
{	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var UniversityGym = Parse.Object.extend("university_gym");
     var query = new Parse.Query(UniversityGym);
     query.equalTo("objectId", data);
     query.first({
     	success: function (universitygym) {
     		//console.log(university.id);
     		var isActive = universitygym.get('isActive');
     		if(isActive==1)
     		{
     			window.location = '/gym/broken.php';
     		}
     	}
     });
}

function checkUrlStaff(data)
{	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var UniversityGym = Parse.Object.extend("gym_staff");
     var query = new Parse.Query(UniversityGym);
     query.equalTo("objectId", data);
     query.first({
     	success: function (universitygym) {
     		//console.log(university.id);
     		var isActive = universitygym.get('isActive');
     		if(isActive==1)
     		{
     			window.location = '/gym/broken.php';
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
    //alert(objectId);
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    
    var User = Parse.Object.extend("User");
    Parse.User.logIn(username, password, {
		  success: function(user) {
		    //alert(user.get("email")+'|'+user.get("isActive")+'|'+user.get("userType"));
		   	var isActive = user.get("isActive");
		   	var userType = user.get("userType");
		    if(isActive==1 && (userType=='gymadmin'|| userType=='staff' || userType=='manager' || userType=='instructor'))
		    {
		    		 window.location = '/gym/index.php';
		    }
		    else{ 
		    		Parse.User.logOut()
				//window.location = '/login'; 
				document.getElementById('Submit').style.pointerEvents = 'auto';
			     document.getElementById('Submit').style.opacity = '1';
			     $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry you donot have permission to Login!</div>');
		    }
		  },
		  error: function(user, error) {
		    $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry wrong UserName or Password!</div>');
		    document.getElementById('Submit').style.pointerEvents = 'auto';
		    document.getElementById('Submit').style.opacity = '1';
		  }
	});
}	



function addStaff(data){
	var sendMail=0;

    var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };

    var firstname = getValue("firstname");
    var lastname = getValue("lastname");
    var email = getValue("email");
    var title = getValue("name");
    var phone = getValue("phone");
    var type = getValue("type");
    var description = getValue("ckeditor");//CKEDITOR.instances.ckeditor.getData();
    
    //var isActive = 1 ;
    
    
    //alert(phone);alert(name);alert(date_str);
    
				Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
					
				var User = Parse.Object.extend("User");
      			var query = new Parse.Query(User);
                    query.equalTo("email", email);
                    query.first({
                    			success: function (user) {
                    				if(user){
                    					console.log(user);
                    					$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Email Already in use.</div>');
									document.getElementById('Submit').style.pointerEvents = 'auto';
						    			document.getElementById('Submit').style.opacity = '1';
                    				}
                    				else
                    				{
                    				  var universityGymId = currentUser.get('universityGymId');
	
								  var UniversityGym = Parse.Object.extend("university_gym");
								  var q = new Parse.Query(UniversityGym);
								  q.equalTo("objectId", universityGymId);
								  q.include("university");
								  q.first({	
                    					success: function(univ){
                    					var university = univ.get("university");
                    					var universityId = university.id;
                    					
                    					var GymStaff = Parse.Object.extend("gym_staff");
									var b1 = new GymStaff({"title":title,"email":email,"firstname":firstname,"lastname":lastname,"phone":phone,"description":description,"gymId":univ.id,"gym":univ,"type":type,"isActive":0,"universityId":universityId,"university":university});
									b1.save(null, {
									    success:function(b1){
										 console.log(b1.id);
										  var sendMail = 1;
										  
										   $.ajax({
											  url : "include/ajax.php",
											  type: "POST",
											  data : { method: 'send_mail_verification_for_staff', firstName: firstname, Email: email,userId: b1.id,type: type },
											  success: function(data1)
											  {
												if(data1){
												  //alert("successfully saved");
												  $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Successfully saved.</div>');
												  document.getElementById('Submit').style.pointerEvents = 'auto';
					    								document.getElementById('Submit').style.opacity = '1';
												}else{
												  // alert("Not successfully saved");
												   $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry Not saved Successfully. Please Try again.</div>');
												  document.getElementById('Submit').style.pointerEvents = 'auto';
					    								document.getElementById('Submit').style.opacity = '1';
												}
											   
											  }
										   });
										   $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Successfully saved.</div>');
												  document.getElementById('Submit').style.pointerEvents = 'auto';
					    								document.getElementById('Submit').style.opacity = '1';
										  
									    },
									    error:function(b1,error){
										   console.log(error.message);
										   $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry Not saved Successfully. Please Try again.</div>');
												  document.getElementById('Submit').style.pointerEvents = 'auto';
					    								document.getElementById('Submit').style.opacity = '1';
										   var sendMail = 0;
									    }
									});	
                    					}
                    				  });	
                    				}
                    				
                    				
                    			},
							  error:function(user,error){
								   
							  }
                    });
}		

function getStaff(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityGymId = currentUser.get('universityGymId');
	
	var gymStaff = Parse.Object.extend("gym_staff");
    
    var q = new Parse.Query(gymStaff);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.equalTo("gymId", universityGymId);
    q.equalTo("isActive", 1);
    q.find({
      success: function(results){
         for(i in results){
            var gymStaff = results[i];
            //var user = results[i].get('users');
            
            
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + gymStaff.get('firstname') + '</td>';
                row += '<td>' + gymStaff.get('lastname') + '</td>';
                row += '<td>'+gymStaff.get('phone')+'</td>';
                row += '<td>' + gymStaff.get('email') + '</td>';
                row += '<td>' + gymStaff.get('type') + '</td>';
                row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                row +=      '<a class="btn btn-primary" href="viewStaff?lid='+ gymStaff.id +'"><i class="fa fa-eye"></i>View</a>';
                row += '</td>';
                row += '</tr>';
                $('table.universities tbody').append(row);
            
            //console.log(university);
            //console.log(book.get("firstname")+ " " +book.get("name"));
          }
          $('#datatable_tabletools').dataTable();
      }
    });
}

function getInstructor(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityGymId = currentUser.get('universityGymId');
	
	var gymStaff = Parse.Object.extend("gym_staff");
    
    var q = new Parse.Query(gymStaff);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.equalTo("gymId", universityGymId);
    q.equalTo("isActive", 1);
    q.find({
      success: function(results){
         for(i in results){
            var gymStaff = results[i];
            //var user = results[i].get('users');
            if(gymStaff && (gymStaff.get('type')=='instructor'))
            {
            
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + gymStaff.get('firstname') + '</td>';
                row += '<td>' + gymStaff.get('lastname') + '</td>';
                row += '<td>'+gymStaff.get('phone')+'</td>';
                row += '<td>' + gymStaff.get('email') + '</td>';
                row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                row +=      '<a class="btn btn-primary" href="viewInstructor?lid='+ gymStaff.id +'"><i class="fa fa-eye"></i>View</a>';
                row += '</td>';
                row += '</tr>';
                $('table.universities tbody').append(row);
            }
            //console.log(university);
            //console.log(book.get("firstname")+ " " +book.get("name"));
          }
          $('#datatable_tabletools').dataTable();
      }
    });
}

function getStaffById(u_id)
{
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var GymStaff = Parse.Object.extend("gym_staff");
    var q = new Parse.Query(GymStaff);
    q.equalTo("objectId", u_id);
    q.first({
         success: function(results){
            //console.log(results);
             var gymstaff = results;
             //var user = results.get('users');
             $('#Name').html(gymstaff.get('firstname')+' '+gymstaff.get('lastname'));
             $('#Title').html(gymstaff.get('title'));
             var email=gymstaff.get('email');
             var phone=gymstaff.get('phone');
             var typeStaff=gymstaff.get('type');
             
             $("#type").append(new Option('Staff', 'staff'));
             $("#type").append(new Option('Instructor', 'instructor'));
             $("#type").append(new Option('Manager', 'manager'));
             $('#Contact').html('<li><p class="text-muted"><i class="fa fa-phone"></i>&nbsp;&nbsp;'+phone+'</p></li><li><p class="text-muted"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:'+email+'">'+email+'</a></p></li>');
             //console.log(universitygym.get('closeDate'));
             $('#Description').html(gymstaff.get('description'));
             $('#Mail').html('<a href="mailto:'+email+'" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a>');
             $('#type').val(typeStaff);
             
             
             
             
         }
    });
}

function updateStaffType(type,staffId)
{
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var r1 = Parse.Object("gym_staff");
     r1.id=staffId;
     r1.set("type",type);
     r1.save(null,{
         success:function(){
              showSuccess('Type changed successfully.');
              window.location.href='viewStaff?lid='+staffId;
         },
         error:function(r1,error){
                showError('Sorry cannot change type. Please try again later.');
         }                            
     });
}

function getStaffRating(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityGymId = currentUser.get('universityGymId');
	
    var gymStaff = Parse.Object.extend("classes");
    var q = new Parse.Query(gymStaff);
    var c=1;
    q.equalTo("gymId", universityGymId);
    q.find({
      success: function(results){
         for(i in results){
            	var gymStaff = results[i];
            	console.log(results.length);
            	 getRating(gymStaff,i,results.length);
            	 
          }
          
      }
    });
}

function getRating(gymStaff,c,len)
{
	console.log(c);
	var rating=0;
	var feedback = Parse.Object.extend("feedback");
     var qr = new Parse.Query(feedback);
     qr.equalTo("class", gymStaff);
     qr.include("class");
     qr.include("staff");
     return qr.find({
      success: function(results){
         
         for(j in results){
            	var feedback = results[j];
            	var classes = feedback.get("class");
            	var staff = feedback.get("staff");
     		rating = (parseFloat(feedback.get('rating'))+parseFloat(rating)).toFixed(1);
     		if(parseInt(results.length-1)==j)
     		{
     			 //return rating;
     			 var tot = results.length;
     			 var row='<tr>';
		           //row += '<td>' + (c++) + '</td>';
		           row += '<td>' + classes.get('name') + '</td>';
		           row += '<td>'+(parseFloat(rating/tot)).toFixed(1)+'</td>';
		           row += '<td>';
		           //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
		           //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
		           row +=      '<a class="btn btn-primary" href="viewFeedback?lid='+ gymStaff.id +'"><i class="fa fa-eye"></i>View</a>';
		           row += '</td>';
		           row += '</tr>';
		           $('table.universities tbody').append(row);
		           
		           var div = '<div class="date_bar"><div class="left_day">' + classes.get('name') + '</div><div class="time_100"><div class="time_bar tm'+parseInt(rating/tot)+'" style="width:'+(parseFloat(rating/tot*44)).toFixed(1)+'px;"></div></div></div>';
		           
		           $('.timetable_div').append(div);
     		}
     		
          }
          
          //alert(parseInt(len-1)+c);
		          if(parseInt(len-1)==c)
				{
					//alert(parseInt(len-1));
					$('.timetable_div').append('<ul class="timing"><li style="width:100px;padding-right:5px;border-right:2px solid #fff;" class=""></li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li></ul>');
		       	 	jQuery('#datatable_tabletools').dataTable();
		       	 	return true;
				}
      }
    });
}	

function getStaffFeedback(id)
{
    //var rating=0;
    var c = 1;
    //alert(id);
    var feedback = Parse.Object.extend("feedback");
     var qr = new Parse.Query(feedback);
     qr.equalTo("classId", id);
     qr.include("class");
     qr.include("user");
     return qr.find({
      success: function(results){
         for(j in results){
            	var feedback = results[j];
            	var classes = feedback.get('class');
            	var user = feedback.get('user');
     		
     			 //return rating;
     			 var tot = results.length;
     			 var row='<tr>';
		           row += '<td>' + parseInt(c++) + '</td>';
		           row += '<td>' + classes.get('name') + '</td>';
		           row += '<td>' + classes.get('date') + '</td>';
		           row += '<td>' + feedback.get('start_time') + '</td>';
		           row += '<td>' + feedback.get('post_date') + '</td>';
		           row += '<td>' + (parseFloat(feedback.get('rating'))).toFixed(1)+ '</td>';
		           row += '<td>' + feedback.get('comment') + '</td>';
                           if(aslnos.indexOf(19)!=-1)
                           {
                                row += '<td>' + user.get('firstname') + ' ' + user.get('lastname') + '</td>';
                           }
		           row += '</td>';
		           row += '</tr>';
		           $('table.universities tbody').append(row);
		           //return true;
     		
          }
          if(aslnos.indexOf(19)==-1)
          {
            $('.feedback_username').remove();
          }
          $('#datatable_tabletools').dataTable();
          
          
      }
    });
}

function get_gymInfo()
{
    Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var u_id = currentUser.get('universityGymId');
    var UniversityGym = Parse.Object.extend("university_gym");
    var q = new Parse.Query(UniversityGym);
    q.equalTo("objectId", u_id);
    q.first({
         success: function(results){
            console.log(results);
             var universitygym = results;
             //var user = results.get('users');
             
              $('#closeTime').val(universitygym.get('closeTime'));
              $('#openTime').val(universitygym.get('openTime'));
              $('#phone').val(universitygym.get('phone'));
             // $('#closeDate').val(universitygym.get('closeDate'));
              
              //$('#closeMultiDate').val(universitygym.get('closeMultiDate'));
             // $('#closeStartDate').val(universitygym.get('closeStartDate'));
              //$('#closeEndDate').val(universitygym.get('closeEndDate'));
              $('#lid').val(u_id);
             
         }
    });
}

function editGymInfo(data)
{
	var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var lid = getValue("lid");
    var closeTime = getValue("closeTime");
    var openTime = getValue("openTime");
    var phone = getValue("phone");
    var closeStartDate = getValue("closeStartDate");
    var closeEndDate = getValue("closeEndDate");
   // var closeDate = getValue("closeDate");
    var closeMultiDate = getValue("closeMultiDate");
    
    /*if((closeStartDate=='' && closeEndDate!='') || (closeStartDate!='' && closeEndDate==''))
    {
    	 $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background:#eee;color:red">Please give the Close Date range.</div>');
	 document.getElementById('Submit').style.pointerEvents = 'auto';
	 document.getElementById('Submit').style.opacity = '1';
    }
    else
    {
	    if(closeStartDate!='' && closeEndDate!='')	
    	    {
		    
		    var StartDate = moment(closeStartDate,'DD.MM.YYYY');
		    var EndDate = moment(closeEndDate,'DD.MM.YYYY');
		    var range = moment().range(StartDate, EndDate);
		    //alert(moment().range(StartDate, EndDate));
		    //console.log(StartDate);console.log(EndDate);console.log(moment().range(StartDate, EndDate));
		    var closeDate = closeMultiDate;
		    console.log(closeDate);
		    range.by('days', function(dt) {
			  // Do something with `moment`
			  
			  //closeDate += +', ';
			  if(closeDate)
			  {
			    		closeDate += ', '+moment(dt).format('MM/DD/YYYY');
			  }
			  else
			  {
			  		closeDate = moment(dt).format('MM/DD/YYYY');
			  }  
			  //alert(moment(dt).format('MM/DD/YYYY'));
			  //alert(closeDate);
			});
	    }
	    
	    var UniversityGym = Parse.Object("university_gym");
	    UniversityGym.id = lid;
	    UniversityGym.set('closeTime',closeTime);
	    UniversityGym.set('openTime',openTime);
	   // UniversityGym.set('closeDate',closeDate);
	    //UniversityGym.set('closeMultiDate',closeMultiDate);
	   // UniversityGym.set('closeStartDate',closeStartDate);
	   // UniversityGym.set('closeEndDate',closeEndDate);
	     UniversityGym.set('phone',phone);
		 
	    if(UniversityGym.save())
	    {
		   $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Gym details Saved Successfully!</div>');
							    document.getElementById('Submit').style.pointerEvents = 'auto';
							    document.getElementById('Submit').style.opacity = '1';
		   //window.location.href='universities';
		    //user.save();  
	    }
	}*/
	
	var UniversityGym = Parse.Object("university_gym");
	    UniversityGym.id = lid;
	    UniversityGym.set('closeTime',closeTime);
	    UniversityGym.set('openTime',openTime);
	   // UniversityGym.set('closeDate',closeDate);
	    //UniversityGym.set('closeMultiDate',closeMultiDate);
	   // UniversityGym.set('closeStartDate',closeStartDate);
	   // UniversityGym.set('closeEndDate',closeEndDate);
	     UniversityGym.set('phone',phone);
		 
	    if(UniversityGym.save())
	    {
		   $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Gym details Saved Successfully!</div>');
							    document.getElementById('Submit').style.pointerEvents = 'auto';
							    document.getElementById('Submit').style.opacity = '1';
		   //window.location.href='universities';
		    //user.save();  
	    }
}

function editCloseDate(data)
{
	var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var lid = getValue("lid");
    var closeTime = getValue("closeTime");
    var openTime = getValue("openTime");
    var phone = getValue("phone");
    var closeStartDate = getValue("closeStartDate");
    var closeEndDate = getValue("closeEndDate");
    var closeDate = getValue("closeDate");
    var closeMultiDate = getValue("closeMultiDate");
    
    if(closeStartDate=='' && closeEndDate=='' && closeMultiDate=='')
    {
    		$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background:#eee;color:red">Please give the Closing Date.</div>');
		 document.getElementById('Submit').style.pointerEvents = 'auto';
		 document.getElementById('Submit').style.opacity = '1';
    }
    else if((closeStartDate=='' && closeEndDate!='') || (closeStartDate!='' && closeEndDate==''))
    {
    	 $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background:#eee;color:red">Please give the Close Date From To Range.</div>');
	 document.getElementById('Submit').style.pointerEvents = 'auto';
	 document.getElementById('Submit').style.opacity = '1';
    }
    else
    {
	    if(closeStartDate!='' && closeEndDate!='')	
    	    {
		  // alert('a'); 
		    var StartDate = moment(closeStartDate,'DD.MM.YYYY');
		    var EndDate = moment(closeEndDate,'DD.MM.YYYY');
		    var range = moment().range(StartDate, EndDate);
		    //alert(moment().range(StartDate, EndDate));
		    //console.log(StartDate);console.log(EndDate);console.log(moment().range(StartDate, EndDate));
		    if(closeMultiDate!='')
		    {
			    if(closeDate!='')
			    {
			    		 closeDate += ','+closeMultiDate;
			    }
			    else
			    {
			    		 closeDate = closeMultiDate;
			    }
		    }
		    //closeDate = closeMultiDate;
		    console.log(closeDate);
		    range.by('days', function(dt) {
			  // Do something with `moment`
			  
			  //closeDate += +', ';
			  if(closeDate!='')
			  {
			    		closeDate += ','+moment(dt).format('MM/DD/YYYY');
			  }
			  else
			  {
			  		closeDate = moment(dt).format('MM/DD/YYYY');
			  }  
			  //alert(moment(dt).format('MM/DD/YYYY'));
			  //alert(closeDate);
			});
	    }
	    else{
	    	    if(closeDate!='')
		    {
		    		 closeDate += ','+closeMultiDate;
		    }
		    else
		    {
		    		 closeDate = closeMultiDate;
		    }
	    }
	    var UniversityGym = Parse.Object("university_gym");
	    UniversityGym.id = lid;
	    closeDatearr = closeDate.split(',');
	    closeDateAll = unique(closeDatearr);
	    closeDatelast = closeDateAll.join(",");
	    console.log(closeDateAll.join(","));
	    
	    UniversityGym.set('closeMultiDate',closeMultiDate);
	    UniversityGym.set('closeStartDate',closeStartDate);
	    UniversityGym.set('closeEndDate',closeEndDate);
	    UniversityGym.set('closeDate',closeDatelast);
		 
	   if(UniversityGym.save())
	    {
		   $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Gym details Saved Successfully!</div>');
							    document.getElementById('Submit').style.pointerEvents = 'auto';
							    document.getElementById('Submit').style.opacity = '1';
		   window.location.href='gymClosingDate';
		    //user.save();  
	    }
	}
	
	
}

function getCloseDates(){
    Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var u_id = currentUser.get('universityGymId');
    var UniversityGym = Parse.Object.extend("university_gym");
    var q = new Parse.Query(UniversityGym);
    q.equalTo("objectId", u_id);
    q.first({
         success: function(results){
            console.log(results);
             var universitygym = results;
             //var user = results.get('users');
             
              $('#closeDate').val(universitygym.get('closeDate'));
              
              $('#lid').val(u_id);
             
         }
    });
}

function unique(list) {
    var result = [];
    var ln = list.length;
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
    
    
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
</script>
<?php

?>
