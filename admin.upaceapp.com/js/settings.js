
/*
 * 
 * Get Profile Details
 */
function get_profile_details()
{
    
    var current = Parse.User.current();
    var univ = Parse.Object.extend("university");
    var qq = new Parse.Query(univ);
    qq.equalTo("objectId", current.get('universityId'));
    qq.first({
    		success:function(is_res){
    			$('#univ').val(is_res.get('name'));
    		}
    });
    $('#firstname').val(current.get('firstname'));
    $('#lastname').val(current.get('lastname'));
    $('#settings_email').val(current.get('email'));
    $('#memberType').val(current.get('memberType'));
    
    var NF = Parse.Object.extend("notifications");
    var n = new Parse.Query(NF);
    n.equalTo("user", current);
    n.first({
        success:function(is_noti){
            
            if(is_noti)
            {
                if(is_noti.get('class_noti')==true)
                {
                    $('#class_noti').attr('checked','checked');
                }
                if(is_noti.get('daily_exercise')==true)
                {
                    $('#daily_exercise').attr('checked','checked');
                }
                if(is_noti.get('general_noti')==true)
                {
                    $('#general_noti').attr('checked','checked');
                }
                if(is_noti.get('via_email')==true)
                {
                    $('#via_email').attr('checked','checked');
                }
                if(is_noti.get('via_text')==true)
                {
                    $('#via_text').attr('checked','checked');
                }
                $('.noti_switch').bootstrapSwitch();
                //$('.noti_switch').bootstrapSwitch();
                //$('.noti_switch').destroy();
                //$('.noti_switch').bootstrapSwitch();
            }
           
        }
    })
    //console.log(current.get('email'));
    getSettingsGym();
}

/*--All Gym Listing respect to university--*/
function getSettingsGym(){
    var current = Parse.User.current();
    var universityId = current.get('universityId');
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
                $('#settings_gym').append(new Option(gym.get('name'), gym.id));
            }
            $('#settings_gym').val(current.get('universityGymId'));
        }
    })
}

/*
 * Save Settings Details
 */
function update_setting()
{
    var firstname= $('#firstname').val();
    var lastname = $('#lastname').val();
    var memberType = $('#memberType').val();
    var settings_gym = $('#settings_gym').val().trim();
    //var old_password = $('#old_password').val().trim();
    var new_password = $('#new_password').val().trim();
    var retype_password = $('#retype_password').val().trim();
    var settings_email = $('#settings_email').val().trim();
    var class_noti,daily_exercise,general_noti,via_email,via_text;
    class_noti=false;
    daily_exercise = false;
    general_noti = false;
    via_email = false;
    via_text = false;
    if(firstname.trim()=='')
    {
        showError('Please enter your First Name.');
    }
    else if(lastname.trim()=='')
    {
        showError('Please enter your Last Name.');
    }
    else
    {
        var set_user = Parse.User.current();
        var crnt = Parse.User.current();
        crnt.set('firstname',firstname);
        crnt.set('lastname',lastname);
        crnt.set('memberType',memberType);
        crnt.set('universityGymId',settings_gym);
        crnt.set('universityId',crnt.get('universityId'));
        crnt.set('username',crnt.get('username'));
        crnt.set('userType',crnt.get('userType'));
        crnt.set('universityId',crnt.get('universityId'));
        crnt.set('memberType',crnt.get('memberType'));
        crnt.set('isActive',crnt.get('isActive'));
        crnt.set('email',settings_email);
        if($('#class_noti').is(':checked'))
        {
            class_noti=true;
        }
       
        if($('#daily_exercise').is(':checked'))
        {
            daily_exercise=true;
        }
        
        if($('#general_noti').is(':checked'))
        {
            general_noti=true;
        }
        
        if($('#via_email').is(':checked'))
        {
            via_email=true;
        }
        
        if($('#via_text').is(':checked'))
        {
            via_text=true;
        }
        
        if(new_password!='' || retype_password!='')
        {
            if(new_password=='')
            {
                showError('Please enter your New Password');
            }
            else if(retype_password=='')
            {
                showError('Please enter your password again.');
            }
            else if(new_password!=retype_password)
            {
                showError('Please enter same password.');
            }
            else
            {
                crnt.set('password',new_password);
                crnt.save(null,{
                    success:function(){
                        var NF = Parse.Object.extend("notifications");
                        var n = new Parse.Query(NF);
                        n.equalTo("user", set_user);
                        n.first({
                            success:function(is_noti){
                                var noti = Parse.Object("notifications");
                                if(is_noti)
                                {
                                    noti.id = is_noti.id;
                                }
                                
                                noti.set('user',set_user);
                                noti.set('userId',set_user.id);
                                noti.set('class_noti',class_noti);
                                noti.set('daily_exercise',daily_exercise);
                                noti.set('general_noti',general_noti);
                                noti.set('via_email',via_email);
                                noti.set('via_text',via_text);
                                noti.save(null,{
                                    success:function(){
                                         $('#new_password').val('');
                                        $('#retype_password').val('');
                                        showSuccess('Your password updated successfully.');
                                    }
                                })
                            }
                        })
                       
                    },
                    error:function(q, error){
                        showError(error.message);
                    }
                });
            }
        }
        else
        {
            crnt.save(null,{
                    success:function(){
                         var NF = Parse.Object.extend("notifications");
                        var n = new Parse.Query(NF);
                        n.equalTo("user", set_user);
                        n.first({
                            success:function(is_noti){
                                var noti = Parse.Object("notifications");
                                if(is_noti)
                                {
                                    noti.id = is_noti.id;
                                }
                                noti.set('user',set_user);
                                noti.set('userId',set_user.id);
                                noti.set('class_noti',class_noti);
                                noti.set('daily_exercise',daily_exercise);
                                noti.set('general_noti',general_noti);
                                noti.set('via_email',via_email);
                                noti.set('via_text',via_text);
                                noti.save(null,{
                                    success:function(){
                                        showSuccess('Your settings updated successfully.');
                                    }
                                })
                            }
                        })
                       
                    },
                    error:function(q, error){
                        showError(error.message);
                    }
                });
        }
    }
}


/*
 * Class Reservation for search
 */
function search_classesReservation()
{
    current_time = new Date();
    time_now= moment(current_time).format('01/01/2011 hh:mm A');
    todays_date = moment().format('DD.MM.YYYY');
    //console.log(current_time);
    var current = Parse.User.current();
    var Occup = Parse.Object.extend("class_slot");
    var q = new Parse.Query(Occup);
     var allclases = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    q.limit(1000);
    q.include('gym');
    q.include('class');
    q.include('class.room');
    q.find({
        success:function(slots){
            var row='';
            
            for(j in slots)
            {
                slot = slots[j];
                gym = slot.get('gym');
                classes = slot.get('class');
                if(classes && moment(classes.get('date'),"DD.MM.YYYY") >= moment())
                {
                    room = classes.get('room');
                    cur_class_date = classes.get('date').replace(/\./g,'/');
                    //console.log(cur_class_date);
                    row =   '<div class="search_listings"  data-id="'+slot.id+'" onclick="view_classRedirect(this)" style="cursor:pointer;">';
                    row +=      '<div class="list-single">';
                    row +=          '<div class="col-lg-8 col-md-8 col-sm-8">';
                    row +=            	'<h4>' + classes.get('name') + '</h4>';
                    row +=              '<p class="sgymp">' + gym.get('name') + '</p>';
                    row +=              '<p class="sroomp">' + room.get('name') + '</p>';
                    row +=           '</div>';
                    row +=           '<div class="col-lg-4 col-md-4 col-sm-4">';
                    row +=            	'<p class="sdatep">' + moment(cur_class_date,"DD/MM/YYYY").format('MMM MM/DD') + '</p>';
                    row +=              '<p class="stimep">'+slot.get('start_time')+' - '+slot.get('end_time')+'</p>';
                    row +=           '</div>';
                    row +=      '</div>';
                    row +=   '</div>';
                   
                    $('#search_rows').append(row);


                }
            }
            
        }
    })
}

	

/*
 * Equipment reservation for search
 */
function search_equipmentsReservation()
{
    current_time1 = new Date();
    time_now1= moment(current_time1).format('01/01/2011 hh:mm A');
    
    var current1 = Parse.User.current();
    var Slot1 = Parse.Object.extend("slots");
    var q1 = new Parse.Query(Slot1);
    var equipments1 = [];
    var temp1=[]
    var c1=1;
    q1.equalTo("universityId", current1.get("universityId"));
    q1.include('gymId');
    q1.include('equipId');
    q1.include('roomId');
    q1.descending('equipId');
    q1.find({
      success: function(slots1){
        /*for(ii in slots1)
        {
            slot1 = slots1[ii];
            gym1 = slot1.get('gymId');
            equip1 = slot1.get('equipId');
            if(equip1)
            {
                if(Date.parse(time_now1) < Date.parse('01/01/2011 '+slot1.get('start_time')))
                {
                    if(equipments1[equip1.id] && ((Date.parse('01/01/2011 ' + equipments1[equip1.id]) > Date.parse('01/01/2011 '+slot1.get('start_time')))))
                    {
                        equipments1[equip1.id] = slot1.get('start_time');
                    }
                    else if(!equipments1[equip1.id])
                    {
                        equipments1[equip1.id] = slot1.get('start_time');
                    }
                }
            }
        }*/
        
        for(jj in slots1)
        {
            slot1 = slots1[jj];
            gym1 = slot1.get('gymId');
            equip1 = slot1.get('equipId');
            if(equip1)
            {
                room1 = slot1.get('roomId');
                //cur_class_date = classes.get('date').replace(/\./g,'/');
                //console.log(cur_class_date);
                row =   '<div class="search_listings search_deleted" id="search_equip-'+slot1.id+'" data-id="'+slot1.id+'" onclick="view_equipRedirect(this)" style="cursor:pointer;" >';
                row +=      '<div class="list-single">';
                row +=          '<div class="col-lg-8 col-md-8 col-sm-8">';
                row +=            	'<h4>' + equip1.get('name') + '</h4>';
                row +=              '<p class="sgymp">' + gym1.get('name') + '</p>';
                row +=              '<p class="sroomp">' + room1.get('name') + '</p>';
                row +=           '</div>';
                row +=           '<div class="col-lg-4 col-md-4 col-sm-4">';
                row +=            	'<p class="sdatep"></p>';
                row +=              '<p class="stimep">'+slot1.get('start_time')+' - '+slot1.get('end_time')+'</p>';
                row +=           '</div>';
                row +=      '</div>';
                row +=   '</div>';

                $('#search_rows').append(row);
                    
                    
                /*room1 = slot1.get('roomId');
                row1 = '<div class="list-single equip-'+slot1.id+' gym-'+gym1.id+'" onclick="view_equip(this)" data-equipId="' + equip1.id + '" data-id="'+slot1.id+'" id="'+slot1.id+'" >';
                //if(current.id == user.id)
                //{
                   row1 +=  '<strong style="display:none;">&nbsp;</strong>';
                //}
                row1 +=  '<h4>'+equip1.get('name')+'</h4>';
                row1 +=  '<p>'+room1.get('name')+'<em>' + gym1.get('name') +'</em></p>';
                row1 +=  '<span>'+slot1.get('start_time')+' - '+slot1.get('end_time')+'</span>';
                row1 +='</div>';
                $('#listingsResrvation').append(row1);*/
                
                
            }
          }
          
           /* var EquipOccup1 = Parse.Object.extend("equipment_occupancy");
            var equipoccup1 = new Parse.Query(EquipOccup1);
            //equipoccup1.equalTo('userId',current1);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup1.include('slotId');
            equipoccup1.include('equipmentId');
            equipoccup1.find({
                success:function(is_reserved1){
                    if(is_reserved1)
                    {
                        for(nn in is_reserved1)
                        {
                            c_res1 = is_reserved1[nn];
                            res_slot1 = c_res1.get('slotId');
                            $('#search_equip-'+res_slot1.id).removeClass('search_deleted')
                             //$('#search_equip-'+res_slot1.id).find('.sdatep').html(moment(c_res1.get('reservationDate'),"MM/DD/YYYY").format('MMM MM/DD'));
                            //console.log(c_res1.get('reservationDate') + " = " + moment());
                            if( moment(c_res1.get('reservationDate'),"MM/DD/YYYY") >= moment())
                            {
                                //$('.equip-'+res_slot1.id+ ' strong').show();
                                
                                //$('.equip-'+res_slot1.id).attr('data-occupId',c_res1.id);
                                //console.log('#search_equip-'+res_slot1.id + "/" + moment(c_res1.get('reservationDate'),"MM/DD/YYYY").format('MMM MM/DD'));
                                $('#search_equip-'+res_slot1.id).find('.sdatep').html(moment(c_res1.get('reservationDate'),"MM/DD/YYYY").format('MMM MM/DD'));
                                
                            }
                            else
                            {
                                //console.log('#search_equip-'+res_slot1.id+ ' + ' +moment(c_res1.get('reservationDate'),"MM/DD/YYYY").format('MMM MM/DD'));
                                $('#search_equip-'+res_slot1.id).remove();
                            }
                        }
                        //$('.search_deleted').remove(); 
                        $('.sdatep').show();
                    }
                }
            });*/
          
      }
    })
   
    
}

function view_equipRedirect(elem)
    {
        
            var slotId=$(elem).data('id');
            
               
                window.location='view_equipment?slot=' + slotId;
            
       
    }

	function view_classRedirect(elem)
    {
        
            var slotId=$(elem).data('id');
           
                window.location='view_class?slot=' + slotId; 
            
        
    }

function hours_gym()
{
    var current = Parse.User.current();
    var Occup = Parse.Object.extend("university_gym");
    var q = new Parse.Query(Occup);
    q.equalTo("objectId", current.get("universityGymId"));
    q.first({
        success:function(slots){
            console.log(slots.id);
			var row='';
            var weekday = new Array(7);
			weekday[0]=  "Sunday";
			weekday[1] = "Monday";
			weekday[2] = "Tuesday";
			weekday[3] = "Wednesday";
			weekday[4] = "Thursday";
			weekday[5] = "Friday";
			weekday[6] = "Saturday";
            for(j=0;j<7;j++)
            {
                var openTime ='';var closeTime ='';
				if(slots.get('openTime'+j)){openTime=slots.get('openTime'+j);}
				if(slots.get('closeTime'+j)){closeTime=slots.get('closeTime'+j);}
                    row =   '<div class="search_listings">';
                    row +=      '<div class="list-single">';
                    row +=          '<div class="col-lg-6 col-md-6 col-sm-6">';
                    row +=            	'<h4>' + weekday[j] + '</h4>';
                    row +=           '</div>';
                    row +=           '<div class="col-lg-6 col-md-6 col-sm-6">';
                    row +=            	'<p class="sdatep">' +openTime+ ' - '+closeTime+'</p>';
                    row +=           '</div>';
                    row +=      '</div>';
                    row +=   '</div>';
                   
                    $('#hours_rows').append(row);
         
            }
            
        }
    })
}