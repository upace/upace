Parse.initialize("nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr", "thCEUZ2AV4ShhzGlQpxYucpLI0uwj7JNBizIrThe");

/*var roleACL = new Parse.ACL();
roleACL.setPublicReadAccess(true);
var role = new Parse.Role("Administrator", roleACL);
role.save();
  
var Role = Parse.Object.extend("_Role"); 
var query = new Parse.Query(Role); 
query.equalTo("objectId", "3E47PmEjy4"); 
query.first({ success: function(role) {
    var queryU = new Parse.Query(Parse.User);

    queryU.equalTo("email", "nits.bikash@gmail.com");  // find all the users
    queryU.first({
        success: function(usersToAddToRole) {

              role.getUsers().add(usersToAddToRole);

               role.save();
           }
      });
  }
  });

Parse.User.logIn("bikash", "123456", {
  success: function(user) {
    console.log(user.get("email"));
  },
  error: function(user, error) {
    console.log("you shall not pass!");
  }
});*/


 
/*
 *  Get all universities
 */
function get_universities()
{
    var University = Parse.Object.extend("university");
    //var User = Parse.Object.extend("user");
   // var innerQuery = new Parse.Query(User);
    //innerQuery.exists("users");
    var q = new Parse.Query(University);
    //q.matchesQuery("objectId", innerQuery);
    //q.equalTo("objectId", u_id);
    var c=1;
    q.notEqualTo("is_deleted", true);
    q.equalTo("isActive", 1);
    q.include('users');
    q.find({
      success: function(results){
         for(i in results){
            var university = results[i];
            var user = results[i].get('users');
            if(user)
            {
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>' + user.get('firstname') + '</td>';
                row += '<td>' + user.get('lastname') + '</td>';
                row += '<td>'+university.get('name')+'</td>';
                row += '<td>' + user.get('email') + '</td>';
                row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                row +=      '<a class="btn btn-primary" href="editUniversity?uid='+ university.id +'"><i class="fa fa-pencil-square"></i>Edit</a>';
                row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="deleteUniversity(\''+university.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
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


/*
 *  Get University Details By Id(Superadmin -> Edit University)
 */
function get_universityById(u_id)
{
    var University = Parse.Object.extend("university");
    var q = new Parse.Query(University);
    q.equalTo("objectId", u_id);
    q.include('users');
    q.first({
         success: function(results){
             var university = results;
             var user = results.get('users');
             $('#university').val(university.get('name'));
             $('#firstname').val(user.get('firstname'));
             $('#lastname').val(user.get('lastname'));
             $('#user_id').val(user.id);
         }
    });
}

function deleteUniversity(univ_id)
{
    if(confirm('Are you sure, you want to delete?'))
    {
        var University = Parse.Object("university");
        University.id = univ_id;
        University.set('is_deleted',true); 
        if(University.save())
        {
            window.location.reload();
        }
    }
}

/*
 *  Update University (Superadmin -> Update University)
 */

function updateUniversity(data)
{
    var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var user_id=getValue('user_id');
    var univ_id = getValue("univ_id");
    var name = getValue("university");
    var firstname = getValue("firstname");
    var lastname = getValue("lastname");
    
    
    var University = Parse.Object("university");
    University.id = univ_id;
    University.set('name',name);  
    
    
    var user = Parse.Object("user");
    user.id=user_id;
    user.set('firstname',firstname);
    user.set('lastname',lastname);
    
    if(University.save())
    {
        
        window.location.href='universities';
         //user.save();  
    }
    
    /*var q = new Parse.Query(University);
    q.equalTo("objectId", univ_id);
    q.include('users');
    q.first({
         success: function(results){
             results.set('name',name);
             results.save();   
             
                     
         }
    });*/
}
    
/*
 *  Add New room
 */
function add_room(data)
{
    var values = {};
    
    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var gymId = getValue("gym");
    var roomname = getValue("roomname");
    //alert(gymId);
    //var gymId = 'eexv0lmEQO'; //---------------- Comment this and set this dynamic
    
    var UG = Parse.Object.extend("university_gym");
    var q = new Parse.Query(UG);
    q.equalTo("objectId", gymId);
    q.include("university");
    q.first({
      success: function(results){
      	var university = results.get("university");
      	console.log(university);
      	var universityId = university.id;
      	
            var Room = Parse.Object.extend("room");
            var r1 = new Room({"name":roomname,"gymId":results,"universityId":universityId,"university":university,"universityGymId":results.id});
            r1.save(null,{
                success:function(){
                     showSuccess('Room added successfully.');
                     window.location.href='viewRooms';
                },
                error:function(r1,error){
                       showError(error.message);
                }
            })
        }
    });
    
}

/*
 *  Fetch rooms for listing
 */
function get_rooms()
{
    var universityId = currentUser.get('universityId');
    var Room = Parse.Object.extend("room");
    var q = new Parse.Query(Room);
    var c=1;
    q.equalTo("universityId", universityId);
    q.include('gymId');
    q.find({
      success: function(results){
         for(i in results){
            var gym = results[i].get("gymId");
            var room = results[i];
            //var user = results[i].get('users');
            if(room)
            {
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                row += '<td>'+room.get('name')+'</td>';
                row += '<td>'+gym.get('name')+'</td>';
                row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                row +=      '<a class="btn btn-primary" href="editRoom?rid='+ room.id +'"><i class="fa fa-pencil-square"></i>Edit</a>';
                row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_room(\''+room.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
                row += '</td>';
                row += '</tr>';
                $('table.rooms tbody').append(row);
            }
            //console.log(university);
            //console.log(book.get("firstname")+ " " +book.get("name"));
          }
          $('#datatable_tabletools').dataTable();
      }
    });
}

/*
 *  Get room Details By Id
 */
function roomDetails(roomId)
{
    var Room = Parse.Object.extend("room");
    var q = new Parse.Query(Room);
    q.equalTo("objectId", roomId);
    //q.include('users');
    q.first({
         success: function(results){
             $('#roomname').val(results.get('name'));
             $('#roomId').val(results.id);
         }
    });
    
}


/*
 *  Update room details
 */
function update_room(data)
{
    var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
   
    var roomId = getValue("roomId");
    var name = getValue("roomname");
    
    var Room = Parse.Object("room");
    Room.id = roomId;
    Room.set('name',name);  
    if(Room.save())
    {
        showSuccess('Room updated successfully.');
        window.location.href='viewRooms';
    }
    else
    {
        showError('Room could not be saved. Please try again.');
    }
     
}

/*
 *  Delete Room
 */
function delete_room(roomId)
{
    if(confirm('Are you sure, you want to delete?'))
    {
        var Room = Parse.Object.extend("room");
        var q = new Parse.Query(Room);
        q.get(roomId, {
           success: function(q) { 
            if(q.destroy({}))
            { 
                showSuccess('Room deleted successfully.');
                window.location.reload();
            }
            else
            {
                showError('Room could not be saved. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
    }
}

/*
 * Add new equipment
 */
function add_equipment(data)
{
    var values = {};
    
    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });
    
    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var name = getValue("name");
    var quantity = getValue("quantity");
    var room = getValue("room");
    var adv_signup_lt = getValue("adv_signup_lt");
    var mac_time_lt = getValue("mac_time_lt");
    var signup_lt = getValue("signup_lt");
    var gymId = getValue("gym");
    var current = Parse.User.current();
    var tot_row = $(".time_fields .row").length * quantity;
    for(j=0;j<quantity;j++)
    {
        var Room = Parse.Object.extend("room");
        var q = new Parse.Query(Room);
        var c=1;
        q.equalTo("objectId", room);
        //q.include('gymId');
        q.first({
          success: function(results){
                var UG =  Parse.Object.extend("university_gym");
                var ug = new Parse.Query(UG);
                ug.equalTo("objectId", gymId);
                ug.include("university");
                ug.first({
                    success: function(gym)
                    {
                        var university = gym.get("university");
                        var universityId = university.id; 
                        var universityGymId = gym.id;
                        var r1 = Parse.Object("gym_equipment");
                        r1.set("name", name);
                        r1.set("gym",gym);
                        r1.set("roomId",results);
                        r1.set("adv_signup_lt",adv_signup_lt);
                        r1.set("mac_time_lt",mac_time_lt);
                        r1.set("signup_lt", signup_lt);
                        r1.set("status", true);
                        r1.set("university", university);
                        r1.set("universityId", universityId);
                        r1.set("universityGymId", universityGymId);
                        r1.save(null,{
                            success:function(equip){
                               
                                $('.time_fields .row').each(function(){
                                    var s1 = Parse.Object("slots");
                                    var start_time = $(this).find('.start_time').val();
                                    var end_time = $(this).find('.end_time').val();
                                    s1.set("gymId", gym);
                                    s1.set("roomId",results);
                                    s1.set("equipId",equip);
                                    s1.set("start_time",start_time);
                                    s1.set("end_time",end_time);
                                    s1.set("university", university);
                        			 s1.set("universityId", universityId);
                       			 s1.set("universityGymId", universityGymId);
                                    s1.save({
                                        success:function(){
                                            tot_row--;
                                            if(tot_row == 0)
                                            {
                                                $('#smart-form-register')[0].reset();
                                                showSuccess('Gym equipment added successfully.');
                                                window.location.href='viewEquipments';
                                            }
                                        }
                                    })
                                })
                               
                            },
                            error:function(r1,error){
                                   showError(error.message);
                            }                            
                        })
                    },
                    error:function(ug,error){
                                   showError(error.message);
                    }        
                })
            },
            error: function(r1,error){
                           showError('Sorry room is not available.');
                    }
        });
    }
}

/*
 * Room list for select 
 */
function get_rooms_list(gymId)
{
    var Room = Parse.Object.extend("room");
    var q = new Parse.Query(Room);
    var c=1;
    q.equalTo("universityGymId", gymId);
    //q.include('gymId');
    q.find({
      success: function(results){
         for(i in results){
            var room = results[i];
            //var user = results[i].get('users');
            if(room)
            {
                $("#room").append(new Option(room.get('name'), room.id));
            }
            //console.log(university);
            //console.log(book.get("firstname")+ " " +book.get("name"));
          }
          
      }
    });
}

/*
 *  Get Equipments for listing
 */
function get_equipments()
{
    var current = Parse.User.current();
    var UG =  Parse.Object.extend("university");
    var ug = new Parse.Query(UG);
    ug.equalTo("objectId", current.get('universityId'));
    ug.first({
        success: function(gym)
        {   var equipments = Parse.Object.extend('gym_equipment');
            var eqpmnts = new Parse.Query(equipments);
            eqpmnts.equalTo('university',gym);
            eqpmnts.include('roomId');
            eqpmnts.include('gym');
            eqpmnts.descending('createdAt');
            eqpmnts.find({
                success: function(results){
                    c=1;
                    for(i in results){
                        var room = results[i].get('roomId');
                        var Gym = results[i].get('gym');
                        var equip = results[i];
                        var row='<tr>';
                        row += '<td>' + c + '</td>';
                        row += '<td>'+Gym.get('name')+'</td>';
                        row += '<td>'+equip.get('name')+'</td>';
                        row += '<td>'+room.get('name')+'</td>';
                        row += '<td>'+equip.get('adv_signup_lt')+'</td>';
                        row += '<td>'+equip.get('mac_time_lt')+'</td>';
                        row += '<td>'+equip.get('signup_lt')+'</td>';
                        row += '<td>';
                        row +=      '<span class="onoffswitch">';
                        row +=          '<input id="st'+c+'" class="onoffswitch-checkbox" type="checkbox" onclick="change_eqStatus(\''+ equip.id +'\')"';
                        row +=          equip.get('status')?'checked="checked"':'';
                        row +=          'name="start_interval">';
                        row +=          '<label class="onoffswitch-label" for="st'+(c)+'">';
                        row +=              '<span class="onoffswitch-inner" data-swchoff-text="OFF" data-swchon-text="ON"></span>'
                        row +=              '<span class="onoffswitch-switch"></span>';
			row +=          '</label>';
			row +=      '</span>';
                        row += '</td>';
                        row += '<td>';
                        row +=      '<a class="btn btn-primary" href="viewSlot?rid='+ equip.id +'"><i class="fa fa-eye"></i>View Slots</a>';
                        //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                        row +=      '<a class="btn btn-primary" href="editEquipments?rid='+ equip.id +'"><i class="fa fa-pencil-square"></i>Edit</a>';
                        row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_equipment(\''+equip.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
                        row += '</td>';
                        row += '</tr>';
                        $('table.equipments tbody').append(row); 
                        /*
                        row = '<tr>';
                        row +=  '<td>';
                        row +=  '</td>';
                        row +=  '<td colspan="6" id="in_tab' + c + '">';
                        row +=  '</td>';
                        row +=  '<td>';
                        row +=  '</td>';
                        row += '</tr>';
                        $('table.equipments tbody').append(row);
                        
                        var Slots = Parse.Object.extend('slots');
                        var slots = new Parse.Query(Slots);
                        slots.equalTo('equipId',equip);
                        slots.find({
                            success: function(slot){
                                var table = '<table>';
                                table += '<tr>';
                                table +=  '<th> Start Time </th>';
                                table +=  '<th> End Time </th>';
                                table += '</tr>';
                                for(s in slot){

                                   var s1 = slot[s];
                                   table += '<tr>';
                                   table +=  '<td>';
                                   table +=  s1.get('start_time');
                                   table +=  '</td>';
                                   table +=  '<td>';
                                   table +=  s1.get('end_time');
                                   table +=  '</td>';
                                   table += '</tr>';

                                }
                                 table += '</table>';
                                 console.log(table);
                                $('#in_tab'+c).html(table);
                            }
                        }) */
                           
                            
                        
                        c++;
                        
                    }
                    $('.projects-table').dataTable();
                },
                error:function(eqpmnts,error){
                                    showError(error.message);
                             }  
            });
        }
    });
 }
 
 /*
  * Delete equipment
  */
 function delete_equipment(equi_id)
 {
     
    if(confirm('Are you sure, you want to delete?'))
    {
        var GE = Parse.Object.extend("gym_equipment");
        var q = new Parse.Query(GE);
        q.get(equi_id, {
           success: function(q) { 
            if(q.destroy({}))
            { 
                 $('table.equipments tbody').empty();
                showSuccess('Equipment deleted successfully.');
                get_equipments();
               
                //window.location.reload();
            }
            else
            {
                showError('Equipment could not be saved. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
    }
 }
 
 /*
 * 
 *  Get equipment Details By Id
 */
function equipmentDetails(equipId)
{
    //get_rooms_list();
    var GE = Parse.Object.extend("gym_equipment");
    var q = new Parse.Query(GE);
    q.equalTo("objectId", equipId);
    //q.include('users');
    q.first({
         success: function(results){
             //console.log()
             $('#name').val(results.get('name'));
             $('#room').val(results.get('room'));
             $('#adv_signup_lt').val(results.get('adv_signup_lt'));
             $('#mac_time_lt').val(results.get('mac_time_lt'));
             $('#signup_lt').val(results.get('signup_lt'));
             $('#quantity').val(results.get('quantity'));
         }
    });
    
}

/*
 *  Update equipment details
 */
function update_equipment(data)
{
    var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var name = getValue("name");
    var room = getValue("room");
    var adv_signup_lt = getValue("adv_signup_lt");
    var mac_time_lt = getValue("mac_time_lt");
    var signup_lt = getValue("signup_lt");
    var equip_id = getValue("equipment_id");
    
     var Room = Parse.Object.extend("room");
        var q = new Parse.Query(Room);
        var c=1;
        q.equalTo("objectId", room);
        //q.include('gymId');
        q.first({
          success: function(results){
            var r1 = Parse.Object("gym_equipment");
            r1.id=equip_id;
            r1.set("name", name);
            r1.set("roomId",results);
            r1.set("adv_signup_lt",adv_signup_lt);
            r1.set("mac_time_lt",mac_time_lt);
            r1.set("signup_lt", signup_lt);
            r1.save(null,{
                success:function(){
                     showSuccess('Gym equipment saved successfully.');
                     window.location.href='viewEquipments';
                },
                error:function(r1,error){
                       showError(error.message);
                }                            
            });
        },
        error:function(q,error){
               showError(error.message);
        }   
    })  
}

function change_eqStatus(eq_id)
{
    var GE = Parse.Object.extend("gym_equipment");
    var q = new Parse.Query(GE);
    q.equalTo("objectId", eq_id);
    q.first({
            success: function(results){
                
                    var r1 = Parse.Object("gym_equipment");
                    r1.id=eq_id;
                    if(results.get('status'))
                    {
                        r1.set("status",false);
                    }
                    else
                    {
                        r1.set("status",true);
                    }
                    r1.save(null,{
                        success:function(){
                             showSuccess('Gym equipment status changed successfully.');
                             //window.location.href='viewEquipments';
                        },
                        error:function(r1,error){
                               showError('Gym equipment could not be changed. Please try again later.');
                        }                            
                    });
                
        },
        error:function(r1,error){
                showError(error.message);
         } 
    })
    
}
  
 /*
 * Equipment list for select 
 */
function get_equipments_list(gymId)
{
    var GE = Parse.Object.extend("gym_equipment");
    var q = new Parse.Query(GE);
    var c=1;
    q.equalTo("status", true);
    q.equalTo('universityGymId',gymId);
    q.find({
      success: function(results){
         for(i in results){
            var room = results[i];
            //var user = results[i].get('users');
            if(room)
            {
                $("#equipment").append(new Option(room.get('name'), room.id));
            }
            //console.log(university);
            //console.log(book.get("firstname")+ " " +book.get("name"));
          }
          
      }
    });
}

/*
 * Add New Occupancy
 */
function add_occupancy(data)
{
    var values = {};
    
    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });
    
    var getValue = function (valueName) {
        return values[valueName];
    };
    var user = getValue("user");
    var slotId = getValue("slot");
    var equipment = getValue("equipment");
    var universityGymId = getValue("gym");
    //console.log('Room Id ' + room);
    //console.log('Equipment Id ' + equipment);
    var User = Parse.Object.extend("User");
        var u = new Parse.Query(User);
        var c=1;
        u.equalTo("objectId", user);
        //q.include('gymId');
        u.first({
          success: function(ud){
                var UG =  Parse.Object.extend("gym_equipment");
                var ug = new Parse.Query(UG);
                ug.equalTo("objectId", equipment);
                ug.first({
                    success : function(result){
                        var current = Parse.User.current();
                        var Gym =  Parse.Object.extend("university_gym");
                        var gm = new Parse.Query(Gym);
                        gm.equalTo("objectId", universityGymId);
                        gm.include("university");
                        gm.first({
                            success: function(gym)
                            {
                                var university = gym.get("university");
                    		  var universityId = university.id;
                    		  var universityGymId = gym.id;
                                var Slot =  Parse.Object.extend("slots");
                                var slot = new Parse.Query(Slot);
                                slot.equalTo("objectId", slotId);
                                slot.first({
                                    success: function(slt)
                                    {
                                        var r1 = Parse.Object("equipment_occupancy");
                                        r1.set("gymId", gym);
                                        r1.set("userId", ud);
                                        r1.set("slotId", slt);
                                        r1.set("equipmentId",result);
                                        r1.set("university", university);
                        				r1.set("universityId", universityId);
                        				r1.set("universityGymId", universityGymId);
                                        r1.save(null,{
                                            success:function(){
                                                 showSuccess('Gym equipment added successfully.');
                                                 window.location.href='viewOccupancy';
                                            },
                                            error:function(r1,error){
                                                   showError(error.message);
                                            }                             
                                        })
                                    }
                            })
                        }
                        })
                    }
                
                })
            }
        })
}

/*
 * View all ocuupancy
 */
function get_occupancies()
{
    var current = Parse.User.current();
    var UG =  Parse.Object.extend("university");
    var ug = new Parse.Query(UG);
    ug.equalTo("objectId", current.get('universityId'));
    ug.first({
        success: function(gym)
        {   
            var equip_occup = Parse.Object.extend('equipment_occupancy');
            var eqpmnts = new Parse.Query(equip_occup);
            eqpmnts.equalTo('university',gym);
            eqpmnts.include('gymId');
            eqpmnts.include('equipmentId');
            eqpmnts.include('slotId');
            eqpmnts.include('userId');
            eqpmnts.find({
                success: function(results){
                    c=1;
                    for(i in results){
                        var occup = results[i];
                        var Gym = results[i].get('gymId');
                        var user = results[i].get('userId');
                        var equipment = results[i].get('equipmentId');
                        var slot = results[i].get('slotId');
                        var row='<tr>';
                        row += '<td>' + (c++) + '</td>';
                        row += '<td>'+Gym.get('name')+'</td>';
                        row += '<td>'+user.get('firstname')+" "+user.get('lastname')+'</td>';
                        row += '<td>'+equipment.get('name')+'</td>';
                        row += '<td>'+slot.get('start_time')+'</td>';
                        row += '<td>'+slot.get('end_time')+'</td>';  
                        row += '<td>';
                        //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                        //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                        row +=      '<a class="btn btn-primary" href="editOccupancy?rid='+ occup.id +'"><i class="fa fa-pencil-square"></i>Edit</a>';
                        row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_occupancy(\''+occup.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
                        row += '</td>';
                        row += '</tr>';
                        $('table.equipments tbody').append(row);
                    }
                    
                    $('.projects-table').dataTable();
                }
            });
        }
    });
}

/*
  * Delete equipment occupancy
  */
 function delete_occupancy(equi_id)
 {
     
    if(confirm('Are you sure, you want to delete?'))
    {
        var GE = Parse.Object.extend("equipment_occupancy");
        var q = new Parse.Query(GE);
        q.get(equi_id, {
           success: function(q) { 
            if(q.destroy({}))
            { 
                $('table.equipments tbody').empty();
                showSuccess('Equipment deleted successfully.');
                get_occupancies();
               
                //window.location.reload();
            }
            else
            {
                showError('Equipment could not be saved. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
    }
 }
 
 /*
  * Add New Time SLot
  */
 function add_slot(data,rid)
 {
    var values = {};
    
    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });
    
    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var start_time = getValue("start_time");
    var end_time = getValue("end_time");
    var name = getValue("name");
    
    var current = Parse.User.current();
    
    var UG =  Parse.Object.extend("gym_equipment");
    var ug = new Parse.Query(UG);
    ug.equalTo("objectId", rid);
    ug.first({
        success: function(equip)
        {
            var r1 = Parse.Object("slots");
            r1.set("start_time", start_time);
            r1.set("end_time",  end_time);
            r1.set("equipId", equip);
            //r1.set("name", name);
            //r1.set("gymId",gym);
            r1.save(null,{
                success:function(){
                     showSuccess('Time Slot added successfully.');
                     window.location.href='viewSlot?rid='+rid;
                },
                error:function(error){
                       showError(error.message);
                }                            
            })
        },
        error:function(error){
            showError(error.message);
        }        
    })
 }
 
 
 /*
 * Get All Slots
 */
function get_slots(equipId)
{
    var current = Parse.User.current();
    var UG =  Parse.Object.extend("gym_equipment");
    var ug = new Parse.Query(UG);
    ug.equalTo("objectId", equipId);
    ug.first({
        success: function(equip)
        {   var Slots = Parse.Object.extend('slots');
            var eqpmnts = new Parse.Query(Slots);
            eqpmnts.equalTo('equipId',equip);
            //eqpmnts.include('roomId');
            //eqpmnts.include('equipmentId');
            eqpmnts.find({
                success: function(results){
                    c=1;
                    for(i in results){
                        var occup = results[i];
                       
                        var row='<tr>';
                        row += '<td>' + (c++) + '</td>';
                        //row += '<td>'+occup.get('name')+'</td>';
                        row += '<td>'+occup.get('start_time')+'</td>';
                        row += '<td>'+occup.get('end_time')+'</td>';
                        row += '<td>';
                        //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                        //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                        row +=      '<a class="btn btn-primary" href="editSlot?rid='+ occup.id +'&sid=' + equipId + '"><i class="fa fa-pencil-square"></i>Edit</a>';
                        row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_slot(\''+occup.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
                        row += '</td>';
                        row += '</tr>';
                        $('table.equipments tbody').append(row);
                    }
                    $('.projects-table').dataTable();
                }
            });
        }
    });
}

/*
  * Delete equipment occupancy
  */
 function delete_slot(equi_id)
 {
     
    if(confirm('Are you sure, you want to delete?'))
    {
        var GE = Parse.Object.extend("slots");
        var q = new Parse.Query(GE);
        q.get(equi_id, {
           success: function(q) { 
            if(q.destroy({}))
            { 
                $('table.equipments tbody').empty();
                showSuccess('Slot deleted successfully.');
                //get_slots();
                //$('.projects-table').dataTable().fnDestroy();
               // $('.projects-table').dataTable();
                window.location.reload();
            }
            else
            {
                showError('Slot could not be saved. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
    }
 }

/*
 * 
 *  Get slot Details By Id
 */
function slotDetails(slotId)
{
    //get_rooms_list();
    var GE = Parse.Object.extend("slots");
    var q = new Parse.Query(GE);
    q.equalTo("objectId", slotId);
    //q.include('users');
    q.first({
         success: function(results){
             //console.log()
             //$('#name').val(results.get('name'));
             $('#start_time').val(results.get('start_time'));
             $('#end_time').val(results.get('end_time'));
             $('#slotId').val(results.id);
         }
    });
    
}


/*
 *  Update Slot details
 */
function update_slot(data,rid)
{
    var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };
    
    var name = getValue("name");
    var start_time = getValue("start_time");
    var end_time = getValue("end_time");
    var slotId = getValue("slotId");
    
    var Slot = Parse.Object("slots");
    Slot.id = slotId;
    Slot.set('start_time',start_time);  
    Slot.set('end_time',end_time);
    //Slot.set('name',name);
    if(Slot.save())
    {
        showSuccess('Slot updated successfully.');
        window.location.href='viewSlot?rid='+rid;
    }
    else
    {
        showError('Slot could not be saved. Please try again.');
    }
     
}

/*
 * Get slot list for select box
 */
function get_slot_list(equipId)
{
    var current = Parse.User.current();
    var UG =  Parse.Object.extend("gym_equipment");
    var ug = new Parse.Query(UG);
    ug.equalTo("objectId", equipId);
    ug.first({
        success:function(equip){
            var Slot = Parse.Object.extend("slots");
            var q = new Parse.Query(Slot);
            var c=1;
            q.equalTo("equipId", equip);
            //q.include('gymId');
            q.find({
              success: function(results){
                 if(results)
                 {
                    $("#slot").empty();
                    $("#slot").append(new Option('Select Time Slot',''));
                    for(i in results){
                       var slot = results[i];
                       //var user = results[i].get('users');
                       if(slot)
                       {
                           $("#slot").append(new Option(slot.get('start_time') + " - " + slot.get('end_time'), slot.id));
                       }
                       //console.log(university);
                       //console.log(book.get("firstname")+ " " +book.get("name"));
                     }
                 }

              }
            });
        }
    })
}

/*
 *  Get User Listing for university
 */ 
function get_users()
{
    //var current = Parse.User.current();
   // console.log(current);
   // console.log("University " + current.get('universityId'));
    var users = Parse.Object.extend('User');
    var eqpmnts = new Parse.Query(users);
    eqpmnts.equalTo('userType','user');
    eqpmnts.descending('createdAt');
    //eqpmnts.include('roomId');
    //eqpmnts.include('equipmentId');
    eqpmnts.find({
        success: function(results){
            c=1;
            for(i in results){
                var user = results[i];
                var phone = user.get('phone')?user.get('phone'):'NA';
                var row='<tr>';
                row += '<td>' + (c++) + '</td>';
                //row += '<td>'+occup.get('name')+'</td>';
                row += '<td>'+user.get('firstname')+'</td>';
                row += '<td>'+user.get('lastname')+'</td>';
                row += '<td>'+ phone +'</td>';
                row += '<td>'+user.get('email')+'</td>';
                row += '<td>'+user.get('userType')+'</td>';
                //row += '<td>';
                //row +=      '<a class="btn btn-primary" href="/calendar"><i class="fa fa-eye"></i>View Classes</a>';
                //row +=      '<a class="btn btn-primary" href="/viewEquipments"><i class="fa fa-eye"></i>View Equipment History</a>'
                //row +=      '<a class="btn btn-primary" href="editSlot?rid='+ occup.id +'&sid=' + equipId + '"><i class="fa fa-pencil-square"></i>Edit</a>';
                //row +=      '<a class="btn btn-primary" href="javascript:void(0);" onclick="delete_slot(\''+occup.id+'\')"><i class="fa fa-crosshairs"></i>Delete</a>';
                //row += '</td>';
                row += '</tr>';
                $('table.users tbody').append(row);
            }
            $('.users').dataTable();
        }
    });
}

/*
 * University users list for select box
 */
function get_university_user_list(gymId)
{
    var current = Parse.User.current();
    //console.log(current);
    //console.log("University " + current.get('universityId'));
    var users = Parse.Object.extend('User');
    var eqpmnts = new Parse.Query(users);
    eqpmnts.equalTo('universityGymId',gymId);
    eqpmnts.equalTo('userType','user');
    eqpmnts.notEqualTo('objectId',current.id);
    eqpmnts.descending('createdAt');
    //eqpmnts.include('roomId');
    //eqpmnts.include('equipmentId');
    eqpmnts.find({
        success: function(results){
            c=1;
            for(i in results){
                user=results[i];
                $('#user').append(new Option(user.get('firstname')+" "+user.get('lastname'), user.id));
            }
        }
    })
}

/*
 * Get details to edit occupancy
 */
function edit_occupancy(occupId)
{
    var current = Parse.User.current();
    var users = Parse.Object.extend('User');
    var eqpmnts = new Parse.Query(users);
    eqpmnts.equalTo('universityId',current.get('universityId'));
    eqpmnts.notEqualTo('objectId',current.id);
    eqpmnts.descending('createdAt');
    eqpmnts.find({
        success: function(results){
            for(i in results){
                user=results[i];
                $('#user').append(new Option(user.get('firstname')+" "+user.get('lastname'), user.id));
            }
            var GE = Parse.Object.extend("gym_equipment");
            var q = new Parse.Query(GE);
            q.equalTo("status", true);
            q.find({
              success: function(gym_equip){
                 for(i in gym_equip){
                    var room = gym_equip[i];
                    if(room)
                    {
                        $("#equipment").append(new Option(room.get('name'), room.id));
                    }
                  }
                var EO = Parse.Object.extend("equipment_occupancy");
                var q = new Parse.Query(EO);
                q.equalTo("objectId", occupId);
                q.first({
                    success: function(occup)
                    {
                        $('#user').val(occup.get('userId').id);
                        $("#equipment").val(occup.get('equipmentId').id);
                        get_slot_list(occup.get('equipmentId').id);
                        setTimeout(function(){$('#slot').val(occup.get('slotId').id);},3000);
                    }
                })

              }
            });
        }
    })
    
}

/*--All Gym Listing respect to university--*/
function getAllGym(){
    var universityId = currentUser.get('universityId');
    var UG = Parse.Object.extend('university_gym');
    var qug = new Parse.Query(UG);
    qug.equalTo('universityId',universityId);
    qug.notEqualTo('isDelete',1);
    qug.equalTo('isActive',1);
    qug.descending('createdAt');
    //eqpmnts.include('roomId');
    //eqpmnts.include('equipmentId');
    qug.find({
        success: function(results){
            c=1;
            for(i in results){
                gym=results[i];
                $('#gym').append(new Option(gym.get('name'), gym.id));
            }
        }
    })
}

/*-------All University--------*/
function getAllUniversity(){
    var UG = Parse.Object.extend('university');
    var qug = new Parse.Query(UG);
    qug.notEqualTo('is_delete',true);
    qug.equalTo('isActive',1);
    qug.descending('createdAt');
    //eqpmnts.include('roomId');
    //eqpmnts.include('equipmentId');
    qug.find({
        success: function(results){
            c=1;
            for(i in results){
                gym=results[i];
                $('#university').append(new Option(gym.get('name'), gym.id));
            }
        }
    })
}
