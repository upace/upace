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
    
  
	var University = Parse.Object.extend("university");
      var query = new Parse.Query(University);
      query.equalTo("objectId", objectId);
       query.first({
                            success: function (university) {
                               console.log(university);
                               var lastname= university.get('lastname');
                               var firstname= university.get('firstname');
                               var email= university.get('email');
                               var user = new Parse.User();
						user.set("lastname", lastname);
						user.set("firstname", firstname);
						user.set("email", email);
						user.set("username", username);
						user.set("password", password);
						user.set("userType", 'admin');
						user.set("isActive", 1);
						user.set("login_count", 1);
						user.set("universityId", objectId);
                               user.signUp(null, {
                                    
				                          success: function (user) {
										var University = Parse.Object.extend("university");
										university.set("users", user);
										university.set("isActive", 1);
										university.set("isConfirmed", 1);
										university.save(null, {
											success: function (university) {
												
												Parse.User.logIn(username, password, {
												  success: function(user) {
												   // alert(user.get("email"));
												   // window.location = '/admin/index.php';
												   window.location = '/admin/addGym';
												  },
												  error: function(user, error) {
												    console.log("you shall not pass!");
												  }
												});
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



/*function register(data)
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
    
  
	var User = Parse.Object.extend("User");
      var query = new Parse.Query(User);
                        query.equalTo("objectId", objectId);
                        query.first({
                            success: function (user) {
                               //console.log(user);
                               user.save(null, {
                                    success: function (user) {

                                        user.set("username", username);
                                        user.set("password", password);
                                        user.set("isActive", 1);

                                        user.save(null, {
				                          success: function (user) {
										//alert('You are successfully registered.');
										console.log(user.get("username"));
										console.log(password)
										Parse.User.logIn(user.get("username"), password, {
										  success: function(user) {
										   // alert(user.get("email"));
										    window.location = '/admin/index.php';
										  },
										  error: function(user, error) {
										    console.log("you shall not pass!");
										  }
										});				
				                          },
									  error:function(user,error){
										   console.log(error.message);
										   alert("Error: " + error.code + " " + error.message);
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
}*/



function checkUrl(data)
{	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var University = Parse.Object.extend("university");
     var query = new Parse.Query(University);
     query.equalTo("objectId", data);
     query.first({
     	success: function (university) {
     		//console.log(university.id);
     		var isConfirmed = university.get('isConfirmed');
     		if(isConfirmed==1)
     		{
     			window.location = '/admin/broken.php';
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
		    //alert(user.get("email"));
		   	var isActive = user.get("isActive");
		   	var userType = user.get("userType");
			var login_count = user.get("login_count");
		    if(isActive==1 && userType=='admin')
		    {
		    	if(login_count)
				{
		    		 window.location = '/admin/index.php';
				}
				else
				{
					
					var up_count = Parse.Object("User");
					up_count.id = user.id;
					up_count.increment('login_count');
					up_count.save(null,{
						success:function(){
							window.location = '/admin/addGym';
						}
					})
					
					/*var up_count = Parse.Object("User");
					up_count.id = user.id;
					up_count.increment('login_count');
					up_count.save(null,{
						success:function(){
							
						}
					})*/
				}

		    }
		    else{ 
		    		Parse.User.logOut()
				//window.location = '/login'; 
				///document.getElementById('Submit').style.pointerEvents = 'auto';
			    // document.getElementById('Submit').style.opacity = '1';
			    // $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry you donot have permission to Login!</div>');

				 document.getElementById('login').style.pointerEvents = 'auto';
			    document.getElementById('login').style.opacity = '1';
			   //alert('Invalid Username or Password !');
			   showError('Sorry you donot have permission to Login!');
		    }
		  },
		  error: function(user, error) {
		    //$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry wrong UserName or Password!</div>');
		    //document.getElementById('Submit').style.pointerEvents = 'auto';
		    //document.getElementById('Submit').style.opacity = '1';

			document.getElementById('login').style.pointerEvents = 'auto';
			    document.getElementById('login').style.opacity = '1';
			   //alert('Invalid Username or Password !');
			   showError('Sorry wrong UserName or Password!');
		  }
	});
}


function add_location(data){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    
    console.log(currentUser.get('universityId'));
    var universityId = currentUser.get('universityId');
			
	var values = {};
	$.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };

    var country = getValue("country");
    var city = getValue("city");
    var state = getValue("state");
    var code = getValue("code");
    var address = getValue("address");
    
    var Location = Parse.Object.extend("location");
    var r1 = new Location({"state":state,"city":city,"country":country,"zipCode":code,"address":address,"universityId":universityId,"isActive":1,"isDelete":0});
    r1.save(null,{
        success:function(){
             $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Location Saved Successfully!</div>');
						    document.getElementById('Submit').style.pointerEvents = 'auto';
						    document.getElementById('Submit').style.opacity = '1';
        },
        error:function(r1,error){
               $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry cannot save location! Please try again.</div>');
						    document.getElementById('Submit').style.pointerEvents = 'auto';
						    document.getElementById('Submit').style.opacity = '1';
        }
    })
    
}


function getLocation(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityId = currentUser.get('universityId');
	
	var Location = Parse.Object.extend("location");
    
    var q = new Parse.Query(Location);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.equalTo("universityId", universityId);
    q.equalTo("isDelete", 0);
    q.find({
      success: function(results){
         for(i in results){
            var location = results[i];
            //var user = results[i].get('users');
            if(location)
            {
            
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + location.get('country') + '</td>';
                row += '<td>' + location.get('state') + '</td>';
                row += '<td>'+location.get('city')+'</td>';
                row += '<td>' + location.get('address') + '</td>';
                row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                row +=      '<a class="btn btn-primary" href="editLocation?lid='+ location.id +'"><i class="fa fa-pencil-square"></i>Edit</a>';
                row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="deleteLocation(\''+location.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
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

function getLocationById(u_id)
{
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var Location = Parse.Object.extend("location");
    var q = new Parse.Query(Location);
    q.equalTo("objectId", u_id);
    q.first({
         success: function(results){
            console.log(results);
             var location = results;
             //var user = results.get('users');
             $('#country').val(location.get('country'));
             $('#state').val(location.get('state'));
             $('#city').val(location.get('city'));
              $('#address').val(location.get('address'));
              $('#code').val(location.get('zipCode'));
             
         }
    });
}

function updateLocation(data){
	var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var lid = getValue("lid");
    var country = getValue("country");
    var city = getValue("city");
    var state = getValue("state");
    var code = getValue("code");
    var address = getValue("address");
    
    
    var Location = Parse.Object("location");
    Location.id = lid;
    Location.set('country',country);
    Location.set('city',city);
    Location.set('state',state);
    Location.set('zipCode',code);
    Location.set('address',address);  
    if(Location.save())
    {
        $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Location Saved Successfully!</div>');
						    document.getElementById('Submit').style.pointerEvents = 'auto';
						    document.getElementById('Submit').style.opacity = '1';
        //window.location.href='universities';
         //user.save();  
    }
    
    
}

function deleteLocation(loc_id)
{
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    if(confirm('Are you sure, you want to delete?'))
    {
        var Location = Parse.Object("location");
        Location.id = loc_id;
        Location.set('isDelete',1); 
        if(Location.save())
        {
           
            window.location.reload();
        }
    }
}


function getAllData(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityId = currentUser.get('universityId');
	
	var Location = Parse.Object.extend("location");
     var q = new Parse.Query(Location);
     q.equalTo("universityId", universityId);
     q.equalTo("isDelete", 0);
     q.find({
      success: function(results){
      console.log(results);
         var row='<option value="" selected="" disabled="">Select Location</option>';
         for(i in results){
            var location = results[i];
            //var user = results[i].get('users');
            
            
            if(location)
            {
            
                
                row += '<option value="' + location.id+ '">'+ location.get('address') + ', ' + location.get('city') + ', '+ location.get('state') +', '+ location.get('zipCode') +'</option>';
                
                
            }
            //console.log(university);
            //console.log(book.get("firstname")+ " " +book.get("name"));
          }
          $('#locationId').html(row);
         
      }
    });
     
}

function addGym(data){
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
    
    var name = getValue("name");
    var hourOfOperation = getValue("hourOfOperation");
    var capacity = getValue("capacity");
    var closeMultiDate = getValue("closeMultiDate");
    var openTime0 = getValue("start_time0");
    var closeTime0 = getValue("end_time0");
	 var openTime1 = getValue("start_time1");
    var closeTime1 = getValue("end_time1");
	 var openTime2 = getValue("start_time2");
    var closeTime2 = getValue("end_time2");
	 var openTime3 = getValue("start_time3");
    var closeTime3 = getValue("end_time3");
	 var openTime4 = getValue("start_time4");
    var closeTime4 = getValue("end_time4");
	 var openTime5 = getValue("start_time5");
    var closeTime5 = getValue("end_time5");
	var openTime6 = getValue("start_time6");
    var closeTime6 = getValue("end_time6");

    var phone = getValue("phone");
   // var locationId = getValue("locationId");
    var closeStartDate = getValue("closeStartDate");
    var closeEndDate = getValue("closeEndDate");
    
    var city = getValue("city");
    var state = getValue("state");
    var zip = parseInt(getValue("code"));
    var address = getValue("address");
    var country = getValue("country");
    
	var universityId = currentUser.get('universityId');    
	var User = Parse.Object.extend("university");
	var query = new Parse.Query(User);
	query.equalTo("objectId", universityId);
	query.first({
	success:function(uunniv){
		var totalGym = uunniv.get('totalGym');
		var gggg = Parse.Object.extend("university_gym");
		var query = new Parse.Query(gggg);
		query.equalTo("universityId", universityId);
		query.count({
			success:function(gYm){
				if(gYm>=totalGym)
				{
					$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background:#eee;color:red">Sorry cannot add anymore gym.Total '+totalGym+' Gym allowed to add. </div>');
	 document.getElementById('Submit').style.pointerEvents = 'auto';
	 document.getElementById('Submit').style.opacity = '1';
				}
				else{
					
				if((closeStartDate=='' && closeEndDate!='') || (closeStartDate!='' && closeEndDate==''))
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
   // var date_str=new Date(closeDate);
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
                    				  var universityId = currentUser.get('universityId');
	
								  var University = Parse.Object.extend("university");
								  var q = new Parse.Query(University);
								  q.equalTo("objectId", universityId); 
								  q.first({	
                    					success: function(univ){
                    					var Gym = Parse.Object.extend("university_gym");
									var b1 = new Gym({"name":name,"email":email,"firstname":firstname,"lastname":lastname,"capacity":parseInt(capacity),"hourOfOperation":parseInt(hourOfOperation),"closeMultiDate":closeMultiDate,"closeStartDate":closeStartDate,"closeEndDate":closeEndDate,"closeDate":closeDate,"openTime0":openTime0,"closeTime0":closeTime0,"openTime1":openTime1,"closeTime1":closeTime1,"openTime2":openTime2,"closeTime2":closeTime2,"openTime3":openTime3,"closeTime3":closeTime3,"openTime4":openTime4,"closeTime4":closeTime4,"openTime5":openTime5,"closeTime5":closeTime5,"openTime6":openTime6,"closeTime6":closeTime6,"phone":phone,"university":univ,"universityId":univ.id,"isDelete":0,"isActive":1,"city":city,"state":state,"country":country,"address":address,"zip":zip});
									b1.save(null, {
									    success:function(b1){
										 console.log(b1.id);
										  var sendMail = 1;
										  
										   $.ajax({
											  url : "include/ajax.php",
											  type: "POST",
											  data : { method: 'send_mail_verification', firstName: firstname, Email: email,userId: b1.id },
											  success: function(data1)  
											  {
												if(data1){
													cur_user = Parse.User.current();
													login_count = cur_user.get('login_count');
													if(!login_count)
													{
														var up_count = Parse.Object("User");
														up_count.id = cur_user.id;
														up_count.increment('login_count');
														up_count.save(null,{
															success:function(){
																window.location = '/admin/addRoom';
															}
														})
													}
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
										  
									    },
									    error:function(b1,error){
										   console.log(error.message);
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
					
				}
		
			}
		});
	}
});
               
}		

function getGym(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityId = currentUser.get('universityId');
	
	var UniversityGym = Parse.Object.extend("university_gym");
    
    var q = new Parse.Query(UniversityGym);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.equalTo("universityId", universityId);
    q.equalTo("isDelete", 0);
    q.find({
      success: function(results){
         for(i in results){
            var gym = results[i];
            //var user = results[i].get('users');
            if(gym)
            {
            
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + gym.get('name') + '</td>';
                row += '<td>' + gym.get('capacity') + '</td>';
                row += '<td>'+gym.get('hourOfOperation')+'</td>';
                row += '<td>' + gym.get('phone') + '</td>';
                row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                row +=      '<a class="btn btn-primary" href="editGym?lid='+ gym.id +'"><i class="fa fa-pencil-square"></i>Edit</a>';
                row +=      '<a class="btn btn-primary" href="gymClosingDate?gid='+ gym.id +'"><i class="fa fa-pencil-square"></i>Closing Date</a>';
                row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="deleteGym(\''+gym.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
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

function updateGym(data){
	var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var lid = getValue("lid");
    var name = getValue("name");
    var capacity = parseInt(getValue("capacity"));
    var hourOfOperation = parseInt(getValue("hourOfOperation"));
    var closeMultiDate = getValue("closeMultiDate");
    //var closeTime = getValue("closeTime");
    //var openTime = getValue("openTime");
    var phone = getValue("phone");
    var locationId = getValue("locationId");
    var closeStartDate = getValue("closeStartDate");
    var closeEndDate = getValue("closeEndDate");
    
	 var openTime0 = getValue("start_time0");
    var closeTime0 = getValue("end_time0");
	 var openTime1 = getValue("start_time1");
    var closeTime1 = getValue("end_time1");
	 var openTime2 = getValue("start_time2");
    var closeTime2 = getValue("end_time2");
	 var openTime3 = getValue("start_time3");
    var closeTime3 = getValue("end_time3");
	 var openTime4 = getValue("start_time4");
    var closeTime4 = getValue("end_time4");
	 var openTime5 = getValue("start_time5");
    var closeTime5 = getValue("end_time5");
	var openTime6 = getValue("start_time6");
    var closeTime6 = getValue("end_time6");

    var city = getValue("city");
    var state = getValue("state");
    var zip = parseInt(getValue("code"));
    var address = getValue("address");
    var country = getValue("country");
    //alert(city);
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
	    
	} */ 
	var UniversityGym = Parse.Object("university_gym");
	    UniversityGym.id = lid;
	    UniversityGym.set('name',name);
	    UniversityGym.set('capacity',capacity);
	    UniversityGym.set('hourOfOperation',hourOfOperation);
	    //UniversityGym.set('closeDate',closeDate);
	    //UniversityGym.set('closeTime',closeTime);
	    //UniversityGym.set('openTime',openTime);
	    UniversityGym.set('phone',phone);  
	    //UniversityGym.set('locationId',locationId); 
	    //UniversityGym.set('closeMultiDate',closeMultiDate);
	    //UniversityGym.set('closeStartDate',closeStartDate);
	    //UniversityGym.set('closeEndDate',closeEndDate); 
		UniversityGym.set('openTime0',openTime0);
	    UniversityGym.set('closeTime0',closeTime0);

		UniversityGym.set('openTime1',openTime1);
	    UniversityGym.set('closeTime1',closeTime1);

		UniversityGym.set('openTime2',openTime2);
	    UniversityGym.set('closeTime2',closeTime2);

		UniversityGym.set('openTime3',openTime3);
	    UniversityGym.set('closeTime3',closeTime3);

		UniversityGym.set('openTime4',openTime4);
	    UniversityGym.set('closeTime4',closeTime4);

		UniversityGym.set('openTime5',openTime5);
	    UniversityGym.set('closeTime5',closeTime5);

		UniversityGym.set('openTime6',openTime6);
	    UniversityGym.set('closeTime6',closeTime6);
	    

	    UniversityGym.set('city',city);
	    UniversityGym.set('state',state);
	    UniversityGym.set('zip',zip);
	    UniversityGym.set('address',address);
	    UniversityGym.set('country',country);
	    if(UniversityGym.save())
	    {
		   $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Gym details Saved Successfully!</div>');
							    document.getElementById('Submit').style.pointerEvents = 'auto';
							    document.getElementById('Submit').style.opacity = '1';
		   //window.location.href='universities';
		    //user.save();  
	    }  
    
    
}

function deleteGym(gym_id)
{
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    if(confirm('Are you sure, you want to delete?'))
    {
                 
        var UniversityGym = Parse.Object("university_gym");
        UniversityGym.id = gym_id;
        UniversityGym.set('isDelete',1); 
		UniversityGym.save(null,{
			success:function(){
				window.location.reload();
			}
		})
        
    }
}


function getGymById(u_id)
{
   Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var UniversityGym = Parse.Object.extend("university_gym");
    var q = new Parse.Query(UniversityGym);
    q.equalTo("objectId", u_id);
    q.first({
         success: function(results){
            console.log(results);
             var universitygym = results;
             //var user = results.get('users');
             $('#name').val(universitygym.get('name'));
             $('#capacity').val(universitygym.get('capacity'));
             $('#hourOfOperation').val(universitygym.get('hourOfOperation'));
             console.log(universitygym.get('closeDate'));
             var d = universitygym.get('closeDate');
            //date = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();

              $('#closeDate').val(d);
              $('#closeMultiDate').val(universitygym.get('closeMultiDate'));
              $('#closeStartDate').val(universitygym.get('closeStartDate'));
              $('#closeEndDate').val(universitygym.get('closeEndDate'));
              
             // $('#closeTime').val(universitygym.get('closeTime'));
             // $('#openTime').val(universitygym.get('openTime'));
              $('#phone').val(universitygym.get('phone'));
              //$('#locationId').val(universitygym.get('locationId'));
              
              $('#city').val(universitygym.get('city'));
              $('#state').val(universitygym.get('state'));
              $('#address').val(universitygym.get('address'));
              $('#code').val(universitygym.get('zip'));
              $('#country').val(universitygym.get('country'));

			  $('#start_time0').val(universitygym.get('openTime0'));
              $('#end_time0').val(universitygym.get('closeTime0'));

			  $('#start_time1').val(universitygym.get('openTime1'));
              $('#end_time1').val(universitygym.get('closeTime1'));

			  $('#start_time2').val(universitygym.get('openTime2'));
              $('#end_time2').val(universitygym.get('closeTime2'));

			  $('#start_time3').val(universitygym.get('openTime3'));
              $('#end_time3').val(universitygym.get('closeTime3'));

			  $('#start_time4').val(universitygym.get('openTime4'));
              $('#end_time4').val(universitygym.get('closeTime4'));

			  $('#start_time5').val(universitygym.get('openTime5'));
              $('#end_time5').val(universitygym.get('closeTime5'));

			  $('#start_time6').val(universitygym.get('openTime6'));
              $('#end_time6').val(universitygym.get('closeTime6'));


             
         }
    });
}

 
/*--------Gym Related Function---------*/

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
	var universityGymId = getValue("gym");
    
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
                    				  var gStaff = Parse.Object.extend("gym_staff");
									  var gquery = new Parse.Query(gStaff);
									  gquery.equalTo("email", email);
									  gquery.first({
										success: function (suser) {
										if(suser){
											//console.log(user);
											$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Email Already in use.</div>');
										document.getElementById('Submit').style.pointerEvents = 'auto';
											document.getElementById('Submit').style.opacity = '1';
										}
										else
										{
											//var universityGymId = currentUser.get('universityGymId');
	
								  var UniversityGym = Parse.Object.extend("university_gym");
								  var q = new Parse.Query(UniversityGym);
								  q.equalTo("objectId", universityGymId);
								  q.include("university");
								  q.first({	
                    					success: function(univ){
                    					var university = univ.get("university");
                    					var universityId = university.id;
                    					var str = univ.get('name');
										var gymname = str.replace(/'/g, "\\'");
                    					var GymStaff = Parse.Object.extend("gym_staff");
									var b1 = new GymStaff({"title":title,"email":email,"firstname":firstname,"lastname":lastname,"phone":phone,"description":description,"gymId":univ.id,"gym":univ,"type":type,"isActive":0,"universityId":universityId,"university":university});
									b1.save(null, {
									    success:function(b1){
										 console.log(b1.id);
										  var sendMail = 1;
										 
											
										   $.ajax({
											  url : "include/ajax.php",
											  type: "POST",
											  data : { method: 'send_mail_verification_for_staff', firstName: firstname, Email: email,userId: b1.id,type: type,gym:gymname },
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
										}
									  });

									  	
                    				}
                    				
                    				
                    			},
							  error:function(user,error){
								   
							  }
                    });
}	
/*
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
    //var description = CKEDITOR.instances.ckeditor.getData();
	var description = getValue("ckeditor");
    var universityGymId = getValue("gym");
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
                    				  //var universityGymId = currentUser.get('universityGymId');
	
								  var UniversityGym = Parse.Object.extend("university_gym");
								  var q = new Parse.Query(UniversityGym);
								  q.equalTo("objectId", universityGymId);
								  q.include("university");
								  q.first({	
                    					success: function(univ){
                    					var university = univ.get("university");
                    					var universityId = university.id;
							var str = univ.get('name');
							var gymname = str.replace(/'/g, "\\'");
                    					var GymStaff = Parse.Object.extend("gym_staff");
									var b1 = new GymStaff({"title":title,"email":email,"firstname":firstname,"lastname":lastname,"phone":phone,"description":description,"gymId":univ.id,"gym":univ,"type":type,"isActive":1,"university":university,"universityId":universityId});
									b1.save(null, {
									    success:function(b1){
										 console.log(b1.id);
										  var sendMail = 1;
										  
										  $.ajax({
											  url : "include/ajax.php",
											  type: "POST",
											  data : { method: 'send_mail_verification_for_staff', firstName: firstname, Email: email,userId: b1.id,type: type,gym:gymname },
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
}	*/	

function getStaff(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityId = currentUser.get('universityId');
	
	var gymStaff = Parse.Object.extend("gym_staff");
    
    var q = new Parse.Query(gymStaff);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.equalTo("universityId", universityId);
    //q.equalTo("isActive", 1);
    q.notEqualTo("isDelete", 1);
    q.include("gym");
    q.find({
      success: function(results){
         for(i in results){
            var gymStaff = results[i];
            var gym = results[i].get("gym");
            //var user = results[i].get('users');
	     var gymm = gymStaff.get('gym');
            var str =gymm.get('name');
            var gname = str.replace(/'/g, "\\'");
            
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + gymStaff.get('firstname') + '</td>';
                row += '<td>' + gymStaff.get('lastname') + '</td>';
                row += '<td>'+gymStaff.get('phone')+'</td>';
                row += '<td>' + gymStaff.get('email') + '</td>';
                row += '<td>' + gymStaff.get('type') + '</td>';
                row += '<td>' + gym.get('name') + '</td>';
                row += '<td>';
		if(gymStaff.get('isActive')!=1)
				{
					row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="staff_resend_link(\''+gymStaff.get('firstname')+'\',\''+gymStaff.get('email')+'\',\''+gymStaff.id+'\',\''+gymStaff.get('type')+'\',\''+gname+'\')"><i class="fa fa-crosshairs"></i>Resend link</a>';
				}
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
		row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_staff(\''+gymStaff.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
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
/*
  * Delete staff
  *///'X-Parse-Session-Token': sessiontoken
 function delete_staff(userId)
 {
     
    if(confirm('Are you sure, you want to delete?'))
    {
        Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
		var CurrentUser = Parse.User.current();
		var GE = Parse.Object.extend("gym_staff");
        var q = new Parse.Query(GE);
        q.get(userId, {
           success: function(q) { 
			   q.set('isDelete',1);
            if(q.save({}))
            { 
                $('table.equipments tbody').empty();
                showSuccess('staff deleted successfully.');
               // get_occupancies();
				setTimeout(function(){window.location.href="staff";},2000);
               
                //window.location.reload();
            }
            else
            {
                showError('staff could not be saved. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
		

    }
 }
function staff_resend_link(firstname,email,userId,type,gym)
{
	$.ajax({
	  url : "include/ajax.php",
	  type: "POST",
	  data : { method: 'send_mail_verification_for_staff', firstName: firstname, Email: email,userId: userId,type: type,gym:gym },
	  success: function(data1)
	  {
		if(data1){
		  //alert("successfully saved");
		  $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Successfully send mail.</div>');
		  showSuccess('Link sent successfully.');
		  //document.getElementById('Submit').style.pointerEvents = 'auto';
				//document.getElementById('Submit').style.opacity = '1';
		}else{
		  // alert("Not successfully saved");
		   $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry can not send mail. Please Try again.</div>');
		    showError('Sorry can not send link. Please Try again.');
		  //document.getElementById('Submit').style.pointerEvents = 'auto';
				//document.getElementById('Submit').style.opacity = '1';
		}
	   
	  }
   });
}
function getInstructor(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	
	var universityId = currentUser.get('universityId');
	
	var gymStaff = Parse.Object.extend("gym_staff");
    
    var q = new Parse.Query(gymStaff);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.equalTo("universityId", universityId);
    q.equalTo("isActive", 1);
    q.include("gym");
    q.find({
      success: function(results){
         for(i in results){
            var gymStaff = results[i];
            var gym = results[i].get("gym");
            if(gymStaff && (gymStaff.get('type')=='instructor'))
            {
            
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + gymStaff.get('firstname') + '</td>';
                row += '<td>' + gymStaff.get('lastname') + '</td>';
                row += '<td>'+gymStaff.get('phone')+'</td>';
                row += '<td>' + gymStaff.get('email') + '</td>';
                row += '<td>' + gym.get('name') + '</td>';
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

/*
* Function to add gym closing date
*/

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
		   window.location.href='gymClosingDate?gid='+lid;
		    //user.save();  
	    }
	}
}

function unique(list) {
    var result = [];
    var ln = list.length;
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
}

function getCloseDates(id){
    Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
    var u_id = id;//currentUser.get('universityGymId');
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


function getStaffRating(){
	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	var universityGymId = currentUser.get('universityId');
	
    var gymStaff = Parse.Object.extend("classes");
    var q = new Parse.Query(gymStaff);
    var c=1;
    q.equalTo("universityId", universityGymId);
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
					$('.timetable_div').append('<ul class="timing"><li style="width:100px;padding-right:5px;border-right:2px solid #fff;" class=""></li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li></ul>');
					//alert(parseInt(len-1));
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
		           row += '<td>' + user.get('firstname') + ' ' + user.get('lastname') + '</td>';
		           row += '</td>';
		           row += '</tr>';
		           $('table.universities tbody').append(row);
		           //return true;
     		
          }
          $('#datatable_tabletools').dataTable();
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
</script>
<?php

?>
