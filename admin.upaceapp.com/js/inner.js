/*
 *  Get Occupied equipments
 */
function get_equipments()
{
    current_time = new Date();
    time_now= moment(current_time).format('01/01/2011 hh:mm A');
    day_no = moment().format('e') - 1;
	//console.log(day_no);
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("slots");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
	q.equalTo('dayIndex',day_no);
    q.include('gymId');
    q.include('equipId');
    q.include('roomId');
    q.descending('equipId');
    q.find({
      success: function(slots){
        for(i in slots)
        {
            slot = slots[i];
            gym = slot.get('gymId');
            equip = slot.get('equipId');
			
            if(equip)
            {
                if(Date.parse(time_now) < Date.parse('01/01/2011 '+slot.get('start_time')))
                {
                    if(equipments[equip.id] && ((Date.parse('01/01/2011 ' + equipments[equip.id]) > Date.parse('01/01/2011 '+slot.get('start_time')))))
                    {
                        equipments[equip.id] = slot.get('start_time');
                    }
                    else if(!equipments[equip.id])
                    {
                        equipments[equip.id] = slot.get('start_time');
                    }
                }
            }
        }
       
        for(j in slots)
        {
            slot = slots[j];
            gym = slot.get('gymId');
            equip = slot.get('equipId');
            if(equip && equipments[equip.id] == slot.get('start_time'))
            {
                room = slot.get('roomId');
                row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_equip(this)" data-equipId="' + equip.id + '" data-id="'+slot.id+'">';
                //if(current.id == user.id)
                //{
                   row +=  '<strong style="display:none;">&nbsp;</strong>';
                //}
                row +=  '<h4>'+equip.get('name')+'</h4>';
                row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
                row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
                row +='</div>';
                $('.listings').append(row);
                
                
            }
          }
            var EquipOccup = Parse.Object.extend("equipment_occupancy");
            var equipoccup = new Parse.Query(EquipOccup);
            equipoccup.equalTo('userId',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slotId');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slotId');
                            if(moment().diff(c_res.get('reservationDate'), 'days') == 0)
                            {
                                $('.equip-'+res_slot.id+ ' strong').show();
                                $('.equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
          
      }
    })
    //console.log(time_now);
    //return false;
   /* var current = Parse.User.current();
    var chk=0;
    var Occup = Parse.Object.extend("gym_equipment");
    var q = new Parse.Query(Occup);
    q.equalTo("universityId", current.get("universityId"));
    //q.include("gymId");
    //q.include("userId");
    //q.include("equipmentId");
    q.include("roomId");
    //q.include('slotId');
    q.include("gym");
    q.descending('createdAt');
    q.find({
        success:function(equipments){
            var row='';
            for(i in equipments)
            {
                data=equipments[i];
                room=data.get("roomId");
                gym=data.get('gym');
                   
                row = '<div class="list-single" onclick="view_equip(this)" data-id="'+data.id+'">';
                if(current.id == user.id)
                {
                    row +=  '<strong>&nbsp;</strong>';
                }
                row +=  '<h4>'+data.get('name')+ " " + (chk) + '</h4>';
                row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
                //row +=  '<span>'+s.get('start_time')+' - '+s.get('end_time')+'</span>';
               
                                
                                
                var Slots = Parse.Object.extend('slots');
                var slots = new Parse.Query(Slots);
                slots.equalTo('equipId',data);
                slots.find({
                    success:function(slts){
                        console.log(slts);
                        for(j in slts)
                        {
                            s=slts[j];
                            console.log(data.id +" - " + s.id);
                            console.log('time now ' + time_now);
                            console.log('start time' + '01/01/2011 '+s.get('start_time'));
                            //if(Date.parse(time_now) < Date.parse('01/01/2011 '+s.get('start_time')))
                            //{
                               row +=  '<span>'+s.get('start_time')+' - '+s.get('end_time')+'</span>';
                               
                                //break;
                            //}
                            chk++;
                        }
                    }
                })
                
                 row +='</div>';
                $('.listings').append(row);
                
            }
        }
    })*/
    
}


function get_equipmentsByDate(dt)
{
    current_time = new Date(dt);
    time_now= moment(current_time).format(dt+' hh:mm A');
    todays_date = moment(current_time).format('DD.MM.YYYY');
    day_no = moment(current_time).format('e') - 1;
    //console.log(current_time);
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("slots");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
	q.equalTo('dayIndex',day_no);
    q.include('gymId');
    q.include('equipId');
    q.include('roomId');
    q.descending('equipId');
    q.find({
      success: function(slots){
        for(i in slots)
        {
            slot = slots[i];
            gym = slot.get('gymId');
            clsDate = gym.get('closeDate').split(',');
            var chkCls=jQuery.inArray(dt,clsDate);
            //console.log(chkCls);
            equip = slot.get('equipId');
            if(equip && chkCls=='-1')
            {
                
                if(Date.parse(time_now) < Date.parse(dt + ' '+slot.get('start_time')))
                {
                    
                    if(equipments[equip.id] && ((Date.parse(dt + ' ' + equipments[equip.id]) > Date.parse(dt + ' '+slot.get('start_time')))))
                    {
                        equipments[equip.id] = slot.get('start_time');
                        //console.log(chkCls+'in1');
                    }
                    else if(!equipments[equip.id])
                    {
                        equipments[equip.id] = slot.get('start_time');
                        //console.log(chkCls+'in2');
                    }
                }
            }
        }
        //console.log(equipments);
        //console.log(jQuery.isEmptyObject( equipments ));
        if(!jQuery.isEmptyObject( equipments ))
        {
			for(j in slots)
			{
			  slot = slots[j];
			  gym = slot.get('gymId');
			  equip = slot.get('equipId');
			  if(equip && equipments[equip.id] == slot.get('start_time'))
			  {
				 room = slot.get('roomId');
				 row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_equip(this)" data-equipId="' + equip.id + '" data-id="'+slot.id+'">';
				 //if(current.id == user.id)
				 //{
				    row +=  '<strong style="display:none;">&nbsp;</strong>';
				 //}
				 row +=  '<h4>'+equip.get('name')+'</h4>';
				 row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
				 row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
				 row +='</div>';
				 $('.listings').append(row);
				 
				 
			  }
			}
         }
         else{
         		row = '<div class="list-single equip- gym" onclick="view_class(this)" data-classId="" data-id="">';
		     //if(current.id == user.id)
		     //{
		        row +=  '<strong style="display:none;">&nbsp;</strong>';
		     //}
		     row +=  '<h4>Sorry No Equipment Available.</em></h4>';
		     row +='</div>';
		     $('.listings').append(row);
         } 
            var EquipOccup = Parse.Object.extend("equipment_occupancy");
            var equipoccup = new Parse.Query(EquipOccup);
            equipoccup.equalTo('userId',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slotId');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slotId');
                            console.log(dt + " - " + c_res.get('reservationDate'));
                            if(dt == c_res.get('reservationDate'))
                            {
                                $('.equip-'+res_slot.id+ ' strong').show();
                                $('.equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
          
      }
    })
    
    
}
/*
 *  Get Occupied equipments
 */
function get_classes()
{
    current_time = new Date();
    time_now= moment(current_time).format('01/01/2011 hh:mm A');
    todays_date = moment().format('DD.MM.YYYY');
    console.log(current_time);
    var current = Parse.User.current();
    var Occup = Parse.Object.extend("class_slot");
    var q = new Parse.Query(Occup);
     var allclases = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    //console.log(current.get("universityId"));
    //q.include("room");
    //q.include("userId");
    //q.include("equipmentId");
    //q.include("equipmentId.roomId");
    //q.include('slotId')
    q.limit(1000);
    q.include('gym');
    q.include('class');
    q.include('class.room');
    q.find({
        success:function(slots){
            var row='';
            for(i in slots)
            {
                slot = slots[i];
                gym = slot.get('gym');
                classes = slot.get('class');
                //console.log(classes.get('name'));
                if(classes && (todays_date == classes.get('date')))
                {
                    
                    //console.log(time_now + " - " + slot.get('start_time'));
                    if(Date.parse(time_now) < Date.parse('01/01/2011 '+slot.get('start_time')))
                    {
                        if(allclases[classes.id] && ((Date.parse('01/01/2011 ' + allclases[classes.id]) > Date.parse('01/01/2011 '+slot.get('start_time')))))
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                        else if(!allclases[classes.id])
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                    }
                }
            }
            console.log(allclases);
            for(j in slots)
            {
                slot = slots[j];
                gym = slot.get('gym');
                classes = slot.get('class');
                
                if(classes && allclases[classes.id] == slot.get('start_time'))
                {
                    room = classes.get('room');
                    //class1 = slot.get('classId');
                    row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_class(this)" data-classId="' + classes.id + '" data-id="'+slot.id+'">';
                    //if(current.id == user.id)
                    //{
                       row +=  '<strong style="display:none;">&nbsp;</strong>';
                    //}
                    class_name = classes.get('name');
					class_name = (class_name.length>9)?class_name.substring(0,9):class_name;
                    row +=  '<h4 title="' + classes.get('name') + '">' + class_name + '</em></h4>';
                    row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
                    row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
                    row +='</div>';
                    $('.listings').append(row);


                }
            }
            
            var ClassOccup = Parse.Object.extend("class_reservation");
            var equipoccup = new Parse.Query(ClassOccup);
            equipoccup.equalTo('user',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slot');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slot');
                            if(moment().diff(res_slot.get('date'), 'days') == 0)
                            {
                                $('.equip-'+res_slot.id+ ' strong').show();
                                $('.equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
        }
    })
}

function get_classesByDate(dt)
{
    current_time = new Date(dt);
    time_now= moment(current_time).format(dt+' hh:mm A');
    todays_date = moment(current_time).format('DD.MM.YYYY');
    console.log(todays_date);
    var current = Parse.User.current();
    var Occup = Parse.Object.extend("class_slot");
    var q = new Parse.Query(Occup);
     var allclases = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    //console.log(current.get("universityId"));
    //q.include("room");
    //q.include("userId");
    //q.include("equipmentId");
    //q.include("equipmentId.roomId");
    //q.include('slotId')
    q.limit(1000);
    q.include('gym');
    q.include('class');
    q.include('class.room');
    q.find({
        success:function(slots){
            var row='';
            for(i in slots)
            {
                slot = slots[i];
                gym = slot.get('gym');
                classes = slot.get('class');
                //console.log(classes.get('date'));
                if(classes && (todays_date == classes.get('date')))
                {
                    
                  //console.log(time_now + " - " + slot.get('start_time'));
                    if(Date.parse(time_now) < Date.parse(dt+' '+slot.get('start_time')))
                    {
                        if(allclases[classes.id] && ((Date.parse(dt+' ' + allclases[classes.id]) > Date.parse(dt + ' '+slot.get('start_time')))))
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                        else if(!allclases[classes.id])
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                    }
                }
            }
            console.log(allclases);
            if(!jQuery.isEmptyObject( allclases ))
            {
			  
			  for(j in slots)
			  {
				 slot = slots[j];
				 gym = slot.get('gym');
                                 classes = slot.get('class');
				 //console.log(classes.id);
				 if(classes && allclases[classes.id] == slot.get('start_time'))
				 {
                                     
                                    room = classes.get('room');
				     //class1 = slot.get('classId');
				     row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_class(this)" data-classId="' + classes.id + '" data-id="'+slot.id+'">';
				     //if(current.id == user.id)
				     //{
				        row +=  '<strong style="display:none;">&nbsp;</strong>';
				     //}
				     class_name = classes.get('name');
					 class_name = (class_name.length>9)?class_name.substring(0,9):class_name;
                     row +=  '<h4 title="' + classes.get('name') + '">' + class_name + '</em></h4>';
				     row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
				     row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
				     row +='</div>';
				     $('.listings').append(row);


				 }
			  }
            }
            else
            {
            	
            	row = '<div class="list-single equip- gym" onclick="view_class(this)" data-classId="" data-id="">';
		     //if(current.id == user.id)
		     //{
		        row +=  '<strong style="display:none;">&nbsp;</strong>';
		     //}
		     row +=  '<h4>Sorry No Class Found.</em></h4>';
		     row +='</div>';
		     $('.listings').append(row);
            }
            
            var ClassOccup = Parse.Object.extend("class_reservation");
            var equipoccup = new Parse.Query(ClassOccup);
            equipoccup.equalTo('user',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slot');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slot');
                            console.log(dt + " - " + c_res.get('date'));
                            if(moment(dt,'MM/DD/YYYY').format('MM/DD/YYYY') == moment(c_res.get('date'),'DD.MM.YYYY').format('MM/DD/YYYY'))
                            {
                                $('.equip-'+res_slot.id+ ' strong').show();
                                $('.equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
        }
    });
}

/*
 * 
 * Get Class Details
 */
function get_class_slot(slotId)
{
    var d = new Date();
    var days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("class_slot");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    var dt = getParameterByName('dt');
    if(!dt)
    {
        dt=moment().format('MM/DD/YYYY');
    }
    q.equalTo("objectId",slotId);
    q.include('gym');
    q.include('class');
    q.include('class.room');
    
    q.first({
      success: function(slots){
            cdetails=slots.get("class");
            room=cdetails.get("room");
            gym = slots.get('gym');
            var userAgain = Parse.Object.extend("User");
            var UA = new Parse.Query(userAgain);
            UA.equalTo("objectId",current.id);
            UA.first({
                success:function(curUser){
                    fav_classes = curUser.get('fav_class');
                    //alert(fav_classes + " - " + fav_classes.indexOf(cdetails.id));
					if(fav_classes)
					{
						if(fav_classes.indexOf(cdetails.id)==-1)
						{
							$('.add_to_fav').show();
						}
						else
						{
							$('.fav_added').show();
						}
					}
					else
					{
						$('.add_to_fav').show();
					}
                }
            })
           //alert(cdetails.get('description'));
            reserved_spots = slots.get('reserved_spots');
			if(reserved_spots)
			{
				openspots = parseInt(cdetails.get('spots')) - parseInt(reserved_spots);
			}
			else
			{
				openspots =  parseInt(cdetails.get('spots'));
			}
            $('#class_id').val(cdetails.id);
            $('#slot').val(slots.id);
            $('.equip-div h1').html(cdetails.get('name'));
            $('.equip-div h3.gym_class').html(room.get('name') + " | " + gym.get('name'));
            $('.equip-div h3.gym_time').html(days[d.getDay()] + " " + d.getDate() + "/" + (d.getMonth()+1) + " | " + slots.get('start_time')+' - '+slots.get('end_time'));
            $('.menu-title h3 span').html(gym.get('name'));
            $('.current_res').append('<h4>'+slots.get('start_time')+' - '+slots.get('end_time')+'</h4>');
            $('.equip-div h3.yellow_text span').html(openspots);
			$('.equip-div p').html(cdetails.get('description'));

			$('.share_popup .wall h2').html(cdetails.get('name'));
			$('.share_popup .wall .rm1').html(room.get('name') + " | " + gym.get('name'));
			$('.share_popup .wall .dt1').html(days[d.getDay()] + " " + d.getDate() + "/" + (d.getMonth()+1) + " | " + slots.get('start_time')+' - '+slots.get('end_time'));


           var EquipOccup = Parse.Object.extend("class_reservation");
            var equipoccup = new Parse.Query(EquipOccup);
            //equipoccup.equalTo('userId',current);
            equipoccup.equalTo('classId',cdetails.id);
            equipoccup.equalTo('slotId',slots.id);
            equipoccup.equalTo('user',current);
            equipoccup.include('user');
            equipoccup.first({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        res_user = is_reserved.get('user');
                        //console.log('reservation date' + is_reserved.get('date'));
                        if(moment(dt,'MM/DD/YYYY').format('DD.MM.YYYY') == is_reserved.get('date'))
                        {
                            
                            if(res_user.id == current.id)
                            {
                                $('.cancel_res').show();
                                $('#occupId').val(is_reserved.id);
								$('.sicon').show();
                            }
							else if(openspots<=0)
							{
									$('.cancel_res').hide();
									$('.save_res').hide();
									$('.notify_res').show();
							}
                            //$('.equip-div h3.yellow_text span').html('Occupied');
                        }
                        else
                        {
                            $('.save_res').show();
                            //$('.equip-div h3.yellow_text span').html('Available');
                        }
                    }
                    else
                    {
                        $('.save_res').show();
                       // $('.equip-div h3.yellow_text span').html('Available');
					   if(openspots<=0)
							{
									$('.cancel_res').hide();
									$('.save_res').hide();
									$('.notify_res').show();
							}
                    }

					/*if(openspots<=0)
					{
							$('.cancel_res').hide();
							$('.save_res').hide();
							$('.notify_res').show();
					}*/
                    
                    
                    
                }
            });
                
            var otherSlot = Parse.Object.extend("class_slots");
            var os = new Parse.Query(otherSlot);
            os.equalTo('classId',cdetails.id);
            os.notEqualTo('start_time',slots.get('start_time'));
            os.find({
                success:function(others){
                    for(i in others)
                    {
                        other_slot = others[i];
                        $('.other_slot').append('<h4 onclick="show_slot(\'' + other_slot.id + '\')" style="cursor:pointer">'+other_slot.get('start_time')+' - '+other_slot.get('end_time')+'</h4>');
                    }
                }
            })
      }
    })
}


/*
 * Get Class Reservation
 */
function save_class_res()
{
    var current = Parse.User.current();
    user = current.id;
    var classId = $('#class_id').val();
    var slotId = $('#slot').val();
     var User = Parse.Object.extend("User");
        var u = new Parse.Query(User);
        var c=1;
        u.equalTo("objectId", user);
        //q.include('gymId');
        u.first({
          success: function(ud){
                var UG =  Parse.Object.extend("classes");
                var ug = new Parse.Query(UG);
                ug.equalTo("objectId", classId);
                ug.first({
                    success : function(result){
                        var current = Parse.User.current();
                        var Gym =  Parse.Object.extend("university_gym");
                        var gm = new Parse.Query(Gym);
                        gm.equalTo("objectId", current.get('universityGymId'));
                        gm.include("university");
                        gm.first({
                            success: function(gym)
                            {
                                var university = gym.get("university");
                    		var universityId = university.id;
                    		var universityGymId = gym.id;
                                var Slot =  Parse.Object.extend("class_slot");
                                var slot = new Parse.Query(Slot);
                                slot.equalTo("objectId", slotId);
                                slot.first({
                                    success: function(slt)
                                    {
                                        var r1 = Parse.Object("class_reservation");
                                        r1.set("university", university);
                                        r1.set("gym", gym);
                                        r1.set("class", result);
                                        r1.set("date", result.get('date'));
                                        r1.set("slot", slt);
                                        r1.set("user",current);
                                        r1.set("start_time",slt.get('start_time'));
                                        r1.set("end_time",slt.get('end_time'));
                                        r1.set("universityId", university.id);
                                        r1.set("gymId", gym.id);
                                        r1.set("userId", current.id);
                                        r1.set("slotId", slt.id);
                                        r1.set("classId",result.id);
                                        r1.set("isActive",true);
                                        r1.save(null,{
                                            success:function(){
                                                 showSuccess('Class saved successfully.');
                                                 dt = getParameterByName('dt');
												 reseved_spots = slt.get('reserved_spots')
												 if(reseved_spots)
												{
													 reseved_spots = parseInt(reseved_spots) + 1;
												}
												else
												{
														reseved_spots = 1;
												}
												 var update_slot = Parse.Object("class_slot");
												 update_slot.id = slt.id;
												 update_slot.set('reserved_spots',reseved_spots);
												 update_slot.save(null,{
													 success:function(){
														 if(dt)
														 {
															 window.location.href='classes?dt=' + dt;
														 }
														 else
														 {
															window.location.href='classes';
														 }
													 },
													  error:function(){
														 showError('Internal error. Please try again later.'); 
													  }
												 })
                                       
                                                 
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
 * Get parameters from url
 * @param {type} name (Parameter name)
 * @returns {String}
 */
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


/*
 * Get Occupancy details
 */
function get_occupancy_details(slotId)
{
    dt = getParameterByName('dt');
	if(!dt)
    {
        dt=moment().format('MM/DD/YYYY');
    }
    if(dt)
    {
        var d = new Date(dt);
    }
    else
    {
        var d = new Date();
    }
    
    var days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    todays_date = moment(dt).format('MM/DD/YYYY'); 
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("slots");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    q.equalTo("objectId",slotId);
    q.include('gymId');
    q.include('equipId');
    q.include('roomId');
    
    q.first({
      success: function(slots){
            equip=slots.get("equipId");
            room=slots.get("roomId");
           
            gym = slots.get('gymId');
            

			var userAgain = Parse.Object.extend("User");
            var UA = new Parse.Query(userAgain);
            UA.equalTo("objectId",current.id);
            UA.first({
                success:function(curUser){
                    fav_classes = curUser.get('fav_equip');
					if(fav_classes)
					{
						//alert(fav_classes + " - " + fav_classes.indexOf(cdetails.id));
						if(fav_classes.indexOf(equip.id)==-1)
						{
							$('.add_to_fav').show();
						}
						else
						{
							$('.fav_added').show();
						}
					}
					else
					{
						$('.add_to_fav').show();
					}
                }
            })


            $('#equip').val(equip.id);
            $('#slot').val(slots.id);
            $('.equip-div h1').html(equip.get('name'));
            $('.equip-div h3.gym_class').html(room.get('name') + " | " + gym.get('name'));
            $('.equip-div h3.gym_time').html(days[d.getDay()] + " " + d.getDate() + "/" + (d.getMonth()+1) + " | " + slots.get('start_time')+' - '+slots.get('end_time'));
            $('.menu-title h3 span').html(gym.get('name'));
            $('.current_res').append('<h4>'+slots.get('start_time')+' - '+slots.get('end_time')+'</h4>');
			if(equip.get('notes'))
			{
				$('.equip-div p').html(equip.get('notes'));
			}
			else
		   {
				$('.equip-div p').html('');
		   }
			$('.share_popup .wall h2').html(equip.get('name'));
			$('.share_popup .wall .rm1').html(room.get('name') + " | " + gym.get('name'));
			$('.share_popup .wall .dt1').html(days[d.getDay()] + " " + d.getDate() + "/" + (d.getMonth()+1) + " | " + slots.get('start_time')+' - '+slots.get('end_time'));

            var EquipOccup = Parse.Object.extend("equipment_occupancy");
            var equipoccup = new Parse.Query(EquipOccup);
            //equipoccup.equalTo('userId',current);
            equipoccup.equalTo('equipmentId',equip);
            equipoccup.equalTo('slotId',slots);
            equipoccup.equalTo('reservationDate',todays_date);
            equipoccup.include('userId');
            equipoccup.first({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        res_user = is_reserved.get('userId');
                        
                        if(dt == is_reserved.get('reservationDate'))
                        {
                             $('#occupId').val(is_reserved.id);
                            if(res_user.id == current.id)
                            {
                                $('.cancel_res').show();
								$('.sicon').show();
                            }
                            else
                            {
                                $('.notify_res').show();
                            }
                            $('.equip-div h3.yellow_text span').html('Occupied');
                        }
                        else
                        {
                           
                            $('.save_res').show();
                            $('.equip-div h3.yellow_text span').html('Available');
                        }
                    }
                    else
                    {
                        $('.save_res').show();
                        $('.equip-div h3.yellow_text span').html('Available');
                    }
                }
            });
                
            var otherSlot = Parse.Object.extend("slots");
            var os = new Parse.Query(otherSlot);
            os.equalTo('equipId',equip);
            os.notEqualTo('start_time',slots.get('start_time'));
            os.find({
                success:function(others){
                    for(i in others)
                    {
                        other_slot = others[i];
                        $('.other_slot').append('<h4 onclick="show_slot(\'' + other_slot.id + '\')" style="cursor:pointer">'+other_slot.get('start_time')+' - '+other_slot.get('end_time')+'</h4>');
                    }
                }
            })
      }
    })
    /*var Occup = Parse.Object.extend("equipment_occupancy");
    var q = new Parse.Query(Occup);
    var d = new Date();
    var days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    q.equalTo("objectId", occupId);
    q.include("gymId");
    q.include("userId");
    q.include("equipmentId");
    q.include("equipmentId.roomId");
    q.include('slotId')
    q.first({
        success:function(data){
            user = data.get("userId");
            if(current.id == user.id)
            {
                $('.cancel_res').show();
                $('#occupId').val(occupId);
            }
            
            equip=data.get("equipmentId");
            room=equip.get("roomId");
            slot = data.get('slotId');
            gym = data.get('gymId');
            var checkOccup = Parse.Object.extend("equipment_occupancy");
            var co = new Parse.Query(checkOccup);
            co.equalTo('userId',current);
            co.equalTo('equipmentId',equip);
            co.equalTo('slotId',slot);
            co.first({
                success:function(isAvailable){   
                    if(isAvailable)
                    {
                        
                    }
                    else
                    {
                        $('.save_res').show();
                    }
                     //$('.cancel_res').show();
                },
                error:function(){
                     
                }
            });
            $('#equip').val(equip.id);
            $('#slot').val(slot.id);
            $('.equip-div h1').html(equip.get('name'));
            $('.equip-div h3.gym_class').html(room.get('name') + " | " + gym.get('name'));
            $('.equip-div h3.gym_time').html(days[d.getDay()] + " " + d.getDate() + "/" + d.getMonth() + " | " + slot.get('start_time')+' - '+slot.get('end_time'));
            $('.menu-title h3 span').html(gym.get('name'));
            $('.current_res').append('<h4>'+slot.get('start_time')+' - '+slot.get('end_time')+'</h4>');
             var Slots = Parse.Object.extend("slots");
             var slt = new Parse.Query(Slots);
             var start_time = slot.get('start_time');
             var end_time = slot.get('end_time');
             slt.equalTo('equipId',equip);
             slt.notEqualTo('start_time', start_time);
             slt.notEqualTo('end_time', end_time);
             slt.find({
                 success:function(slots){
                     for(i in slots){
                         var temp_slot = slots[i];
                         $('.other_slot').append('<h4>'+temp_slot.get('start_time')+' - '+temp_slot.get('end_time')+'</h4>');
                     }
                 }
             })
        }
    })*/
}

/*
 * Save equipment reservation
 */
function save_res()
{
    var current = Parse.User.current();
    var user = current.id;
    var slotId = $('#slot').val();
    var equipment = $('#equip').val();
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
                        gm.equalTo("objectId", current.get('universityGymId'));
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
                                        r1.set('reservationDate',moment(dt).format('MM/DD/YYYY'));
                                        r1.set('slot',slt.id);
                                        r1.set('equipment',equipment);
                                        r1.save(null,{
                                            success:function(){
                                                 showSuccess('Reservation saved successfully.');
                                                 dt = getParameterByName('dt');
                                                 if(dt)
                                                 {
                                                     window.location.href='equipment?dt=' + dt;
                                                 }
                                                 else
                                                 {
                                                    window.location.href='equipment';
                                                 }
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
 * 
 * Cancel class reservation
 */
function delete_class_res()
{
    if(confirm('Are you sure, you want to cancel your reservation?'))
    {
        var equi_id = $('#occupId').val();
        var GE = Parse.Object.extend("class_reservation");
        var q = new Parse.Query(GE);
		q.include('slot');
		q.include('class');
        q.get(equi_id, {
           success: function(q) { 
			class_details = q.get('class');
			slot_details = q.get('slot');
			
            if(q.destroy({}))
            { 		
				var update_slot = Parse.Object("class_slot");
				update_slot.id = $('#slot').val();
				update_slot.increment('reserved_spots',-1);
				update_slot.save(null,{
					 success:function(){
						 reserved_spots = slot_details.get('reserved_spots');
						total_spots = class_details.get('spots');
						
						if(reserved_spots && total_spots && reserved_spots>=total_spots)
						{
								var EquipNoti = Parse.Object.extend("class_notification");
								var equipnoti = new Parse.Query(EquipNoti);
								equipnoti.equalTo('slotId',slot_details.id);
								equipnoti.ascending('createdAt');
								equipnoti.include('user');
								equipnoti.first({
									success:function(result){
										if(result)
										{
										  name = class_details.get('name');
										  userdetails = result.get('user');
										  receiver = userdetails.get('email');
										  subject = 'Class reservation notification.';
										  content = "Hello " + userdetails.get('firstname') + " " + userdetails.get('lastname') + ",<br/><br/>";
										  content += name + " is now available. To reserve this please login to uPace.<br/><br/>";
										  content += "Thanks,<br/>Upace";
										  $.ajax({
											  type:'post',
											  dataType:'json',
											  url:$('#rootUrl').val() + 'include/send_mail.php',
											  data:{receiver:receiver, subject:subject, content:content},
											  async:false,
											  success:function(data){
												  console.log(data);
												  showSuccess('Reservation canceled successfully.');
													//window.location.reload();
													dt = getParameterByName('dt');

													if(dt)
													{
													   setTimeout(function(){window.location.href='classes?dt=' + dt;},3000);
													}
													else
													{
														setTimeout(function(){window.location.href='classes';},3000);
													}
											  }
										  });
										}
										else
										{
											 showSuccess('Reservation canceled successfully.');
													//window.location.reload();
													dt = getParameterByName('dt');

													if(dt)
													{
													   setTimeout(function(){window.location.href='classes?dt=' + dt;},3000);
													}
													else
													{
														setTimeout(function(){window.location.href='classes';},3000);
													}
										}
									}
								})
						}
						else
						{
							showSuccess('Reservation canceled successfully.');
							//window.location.reload();
							dt = getParameterByName('dt');

							if(dt)
							{
							   setTimeout(function(){window.location.href='classes?dt=' + dt;},3000);
							}
							else
							{
								setTimeout(function(){window.location.href='classes';},3000);
							}
							//$('.save_res').show();
						 }
					 }
				})
            }
            else
            {
                showError('Reservation could not be canceled. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
    }
}

/*
 * Cancel Reservation
 */
 function delete_occupancy()
 {
     
    if(confirm('Are you sure, you want to cancel your reservation?'))
    {
        dt=getParameterByName('dt');
        var equi_id = $('#occupId').val();
        var EquipNoti = Parse.Object.extend("equipment_notification");
        var equipnoti = new Parse.Query(EquipNoti);
        equipnoti.equalTo('occupancyId',equi_id);
        equipnoti.ascending('createdAt');
        equipnoti.include('user');
        equipnoti.first({
            success:function(result){
                var GE = Parse.Object.extend("equipment_occupancy");
                var q = new Parse.Query(GE);
                q.include('equipmentId');
                q.get(equi_id, {
                   success: function(q) {
                      name = q.get('equipmentId').get('name');
                      //console.log(q);
                      if(q.destroy({}))
                      {
                        if(result)
                              {
                                  userdetails = result.get('user');
                                  receiver = userdetails.get('email');
                                  subject = 'Equipment reservation notification.';
                                  content = "Hello " + userdetails.get('firstname') + " " + userdetails.get('lastname') + ",<br/><br/>";
                                  content += name + " is now available. To reserve this please login to uPace.<br/><br/>";
                                  content += "Thanks,<br/>Upace";
                                  $.ajax({
                                      type:'post',
                                      dataType:'json',
                                      url:$('#rootUrl').val() + 'include/send_mail.php',
                                      data:{receiver:receiver, subject:subject, content:content},
                                      async:false,
                                      success:function(data){
                                          console.log(data);
                                      }
                                  });
                              }
                              showSuccess('Reservation canceled successfully.');

                          //window.location.reload();
                          if(dt)
                          {
                              setTimeout(function(){window.location.href='equipment?dt='+dt;},3000);
                          }
                          else
                          {
                              setTimeout(function(){window.location.href='equipment';},3000);
                          }
                      }
                        //showError('Reservation could not be canceled. Please try again.');
                    
                   },
                   error: function(q, error) {
                      showError(error.message);
                   }
                 });
                
            }
        })
    }
 }
 
 /*
  * Get Gym List
  */

function getAllGym(){
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
                $('#gym').append(new Option(gym.get('name'), gym.id));
            }
        }
    })
}


/*
  * Get Gym List for popup
  */
function getPopupGym(){
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
                newelem = '<div class="wall"><h2 onclick="select_page_gym(this);" data-pgid="' + gym.id + '">' + gym.get('name') + '</h2></div>';
                $('.page-gym-popup').append(newelem);
            }
        }
    })
}

function select_page_gym(elem)
{
    $('.list-single').hide(200);
    pgid=$(elem).data('pgid');
    
    $('.gym-' + pgid).show(200);
    $('.page-gym').hide(400);
}
/*
 * Add new class reservation
 */
function save_class_single(elem)
{
     var current = Parse.User.current();
    user = current.id;
    var classId = $(elem).data('classid');
    var slotId = $(elem).data('id');
     var User = Parse.Object.extend("User");
        var u = new Parse.Query(User);
        var c=1;
        u.equalTo("objectId", user);
        //q.include('gymId');
        u.first({
          success: function(ud){
                var UG =  Parse.Object.extend("classes");
                var ug = new Parse.Query(UG);
                ug.equalTo("objectId", classId);
                ug.first({
                    success : function(result){
                        var current = Parse.User.current();
                        var Gym =  Parse.Object.extend("university_gym");
                        var gm = new Parse.Query(Gym);
                        gm.equalTo("objectId", current.get('universityGymId'));
                        gm.include("university");
                        gm.first({
                            success: function(gym)
                            {
                                var university = gym.get("university");
                    		var universityId = university.id;
                    		var universityGymId = gym.id;
                                var Slot =  Parse.Object.extend("class_slot");
                                var slot = new Parse.Query(Slot);
                                slot.equalTo("objectId", slotId);
                                slot.first({
                                    success: function(slt)
                                    {
                                        var r1 = Parse.Object("class_reservation");
                                        r1.set("university", university);
                                        r1.set("gym", gym);
                                        r1.set("class", result);
                                        r1.set("date", result.get('date'));
                                        r1.set("slot", slt);
                                        r1.set("user",current);
                                        r1.set("start_time",slt.get('start_time'));
                                        r1.set("end_time",slt.get('end_time'));
                                        r1.set("universityId", university.id);
                                        r1.set("gymId", gym.id);
                                        r1.set("userId", current.id);
                                        r1.set("slotId", slt.id);
                                        r1.set("classId",result.id);
                                        r1.set("isActive",true);
                                        r1.save(null,{
                                            success:function(result){
                                                 showSuccess('Class saved successfully.');
                                                 //window.location.href='classes';
                                                $(elem).attr('data-occupId',result.id);
                                                $(elem).find('strong').show();
                                                $(elem).removeClass('select')
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
 * Add New reservation
 */
function save_res_single(elem)
{
    var current = Parse.User.current();
    var user = current.id;
    var slotId = $(elem).data('id');
    var equipment = $(elem).data('equipid');
    var dt=getParameterByName('dt');
    if(!dt)
    {
        dt=moment().format('MM/DD/YYYY');
    }
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
                        gm.equalTo("objectId", current.get('universityGymId'));
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
                                        var CheckOccup =  Parse.Object.extend("equipment_occupancy");
                                        var ChkOcp = new Parse.Query(CheckOccup);
                                        ChkOcp.equalTo('equipment',equipment);
                                        ChkOcp.equalTo('slot',slt.id);
                                        ChkOcp.equalTo('reservationDate',dt);
                                        ChkOcp.first({
                                            success:function(is_res){
                                                
                                                if(is_res)
                                                {
                                                   // window.location.href='equipment';
                                                }
                                                else
                                                {
                                                     var r1 = Parse.Object("equipment_occupancy");
                                                    r1.set("gymId", gym);
                                                    r1.set("userId", ud);
                                                    r1.set("slotId", slt);
                                                    r1.set("equipmentId",result);
                                                    r1.set("university", university);
                                                    r1.set("universityId", universityId);
                                                    r1.set("universityGymId", universityGymId);
                                                    r1.set('reservationDate',dt);
                                                    r1.set('slot',slt.id);
                                                    r1.set('equipment',equipment);
                                                    r1.save(null,{
                                                        success:function(result){
                                                             showSuccess('Reservation saved successfully.');
                                                             //window.location.href='equipment';
                                                             console.log(result);
                                                              $(elem).attr('data-occupId',result.id);
                                                             $(elem).find('strong').show();
                                                             $(elem).removeClass('select')
                                                        },
                                                        error:function(r1,error){
                                                               showError(error.message);
                                                        }                             
                                                    })
                                                }
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
 * 
 */
function cancel_class_single(elem)
{
    
   var equi_id = $(elem).data('occupid');
    if(equi_id)
    {
        var GE = Parse.Object.extend("class_reservation");
        var q = new Parse.Query(GE);
        q.get(equi_id, {
           success: function(q) { 
            if(q.destroy({}))
            { 
                showSuccess('Reservation canceled successfully.');
                $(elem).find('strong').hide();
                $(elem).removeClass('select');
                $(elem).removeAttr('data-occupId');
            }
            else
            {
                showError('Reservation could not be canceled. Please try again.');
            }
           },
           error: function(q, error) {
              showError(error.message);
           }
         });
    }
}

/*
 * Cancel Reservation
 */
 function cancel_res(elem)
 {
        var equi_id = $(elem).data('occupid');
        if(equi_id)
        {
            var EquipNoti = Parse.Object.extend("equipment_notification");
            var equipnoti = new Parse.Query(EquipNoti);
            equipnoti.equalTo('occupancyId',equi_id);
            equipnoti.ascending('createdAt');
            equipnoti.include('user');
            equipnoti.first({
            success:function(result){
                var GE = Parse.Object.extend("equipment_occupancy");
                var q = new Parse.Query(GE);
                q.include('equipmentId');
                q.get(equi_id, {
                   success: function(q) { 
                    name = q.get('equipmentId').get('name');
                    if(q.destroy({}))
                    { 
                        if(result)
                        {
                            userdetails = result.get('user');
                            receiver = userdetails.get('email');
                            subject = 'Equipment reservation notification.';
                            content = "Hello " + userdetails.get('firstname') + " " + userdetails.get('lastname') + ",<br/><br/>";
                            content += name + " is now available. To reserve this please login to uPace.<br/><br/>";
                            content += "Thanks,<br/>Upace";
                            $.ajax({
                                type:'post',
                                dataType:'json',
                                url:$('#rootUrl').val() + 'include/send_mail.php',
                                data:{receiver:receiver, subject:subject, content:content},
                                async:false,
                                success:function(data){
                                    console.log(data);
                                }
                            });
                        }
                     
                        showSuccess('Reservation canceled successfully.');
                        //window.location.reload();
                        //window.location.href='equipment';
                        $(elem).find('strong').hide();
                        $(elem).removeClass('select');
                        $(elem).removeAttr('data-occupId');
                    }
                    else
                    {
                        showError('Reservation could not be canceled. Please try again.');
                    }
                   },
                   error: function(q, error) {
                      showError(error.message);
                   }
                 });
             }
         })
     }
    
 }
 
 /*
 * Show/Hide settings 
 */
function show_settings(status)
{
    if(status=='show')
    {
        $('.settings_overlay').show('slide',400);
    }
    else if(status=='hide')
    {
        $('.settings_overlay').hide('slide',400);
    }
}

 /*
 * Show/Hide Search 
 */
function show_search(status)
{
    if(status=='show')
    {
        $('.search_overlay').show('slide',400);
    }
    else if(status=='hide')
    {
        $('.search_overlay').hide('slide',400);
    }
}
 /*
 * Show/Hide Hours 
 */
function show_hours(status)
{
    if(status=='show')
    {
        $('.hours_overlay').show('slide',400);
    }
    else if(status=='hide')
    {
        $('.hours_overlay').hide('slide',400);
    }
}
/*
 * Get rooms percentage for front end
 */
function get_room_percentage()
{
    var current = Parse.User.current();
    var Slot =  Parse.Object.extend("room");
    var slot = new Parse.Query(Slot);
    slot.equalTo("universityGymId", current.get('universityGymId'));
    slot.include('gymId');
    slot.find({
        success:function(result){
            j=0;
            var slide='';
            var total=0;
            var reserved = 0;
            var gymname='';
            for(i in result)
            {
                room=result[i];
                gymname=room.get('gymId').get('name');
                
                if(j==0)
                {
                    if(i==0)
                    {
                        slide += '<div class="item active">';
                    }
                    else
                    {
                        slide += '<div class="item">';
                    }
                }
                total += room.get('totalOccupancy');
                reserved += (parseInt(room.get('male'))+parseInt(room.get('female')));
                var percentage = ((parseInt(room.get('male'))+parseInt(room.get('female')))*100)/room.get('totalOccupancy');
                percentage = parseInt(percentage);
                color = getColor(percentage);
                slide +=    '<div class="col-lg-3 col-md-3 col-sm-3">';
                slide +=        '<div class="myStat' + i + ' pull-left" data-dimension="250" data-text="'+ percentage +'" data-width="30" data-fontsize="38" data-percent="'+ percentage +'" data-fgcolor="' + color + '"  data-bgcolor="rgba(255, 255, 255, 0.5)">';
                slide +=        '</div>';
                slide +=        '<h4>' + room.get('name') + '</h4>';
                slide +=    '</div>';
                j++;
                if(j==3 || ((result.length - 1)==i))
                {
                    slide += '</div>';
                    j=0
                }
                
                
            }
            $('.class_occup').append(slide);
            total_perc = (parseInt((reserved*100)/total));
            big_color = getColor(total_perc);
            var rgbaCol = 'rgba(' + parseInt(big_color.slice(-6,-4),16) + ',' + parseInt(big_color.slice(-4,-2),16) + ',' + parseInt(big_color.slice(-2),16) +',0.7)';
            $('.big_green').css('background-color', rgbaCol);
            $('.big_green h1').html( total_perc + '%');
            $('.big_green h2').html(reserved + '/' + total + ' MEMBERS');
            $('.big_green p').html('TOTAL OCCUPANCY <BR> ' + gymname);
            for(i in result)
            {
                
                $('.myStat'+i).circliful();
            }
        }
    })
    
    
    var all_gym=[];
    var otherGym =  Parse.Object.extend("room");
    var othergym = new Parse.Query(otherGym);
    othergym.ascending('universityGymId');
    othergym.equalTo("universityId", current.get('universityId'));
    othergym.include('gymId');
    othergym.find({
        success:function(result){
            var old_gym='',old_gym_name='';
            var gym_res = 0;
            var gym_total = 0;
            var old_gym_id = '';
            var temp=[];
            var k=0;
            var ll=0;
            for(i in result)
            {
                room = result[i];
                gym = room.get('gymId');
                if(old_gym!='')
                {
                    if(old_gym==gym.id)
                    {
                        gym_res += (room.get('male') + room.get('female'));
                        gym_total += room.get('totalOccupancy');
                        //console.log('if');
                    }
                    else 
                    {
                        //all_gym[old_gym_name] = ((gym_res*100)/gym_total);
                        all_gym[ll] = new Array();
                        all_gym[ll]['name'] = old_gym_name;
                        all_gym[ll]['percentage'] = ((gym_res*100)/gym_total);
                        all_gym[ll]['id'] = old_gym;
                        k++;
                        ll++;
                        //console.log(old_gym_name + " - " + gym_total + " - " + gym_res);
                        gym_res = (room.get('male') + room.get('female'));
                        gym_total = room.get('totalOccupancy');
                        old_gym = gym.id;
                        //ll = gym.id;
                        old_gym_name = gym.get('name');
                        //console.log('else');
                    }
                    //console.log(result.length + " " + i);
                    if((result.length -1 ) == i)
                    {
                        //all_gym[old_gym_name] = ((gym_res*100)/gym_total);
                        all_gym[ll] = new Array();
                        all_gym[ll]['name'] = old_gym_name;
                        all_gym[ll]['percentage'] = ((gym_res*100)/gym_total);
                        all_gym[ll]['id'] = old_gym;
                        k++;
                        ll++;
                       // console.log(old_gym_name + " - " + gym_total + " - " + gym_res);
                    }
                }
                else 
                {
                    old_gym = gym.id;
                    //ll = gym.id;
                    old_gym_name = gym.get('name');
                    gym_res = (room.get('male') + room.get('female'));
                    gym_total = room.get('totalOccupancy');
                }
            }
            
            var og='';
            console.log(all_gym);
            gyms_count =  all_gym.length;
            if(gyms_count == 1)
            {
				gyms_class = 'conitional1';				
			}
			else if(gyms_count == 2)
			{
				gyms_class = 'conitional2';	
			}
			else if(gyms_count == 3)
			{
				gyms_class = 'conitional3';	
			}
			else if(gyms_count == 4)
			{
				gyms_class = 'conitional4';	
			}
			else if(gyms_count == 5)
			{
				gyms_class = 'conitional5';	
			}
			else{
				gyms_class = 'conitional5';	
			}
            for(a in all_gym)
            {
                no = 10/all_gym.length;
                og = '<li><a href="landing?rid='+ all_gym[a]['id'] +'" data-ajax="false">';
                og +=   '<div class="col-lg-3 col-md-3 col-sm-3 no-padd ' + gyms_class + '">';
                og +=       '<h1 class="' + getColorClass(all_gym[a]['percentage']) + '">'+ parseInt(all_gym[a]['percentage']) +'%</h1>';
                og +=       '<p>'+ all_gym[a]['name'] +'</p>';
                og +=   '</div></a>';
                og += '</li>';
                $('.bottom_gym ul').append(og);
            }
             
        }
    });
    
    
}


/*
* Get room percetage respect to room id
*/
function get_room_percentage_ById(id)
{
    
    var current = Parse.User.current();
    var Slot =  Parse.Object.extend("room");
    var slot = new Parse.Query(Slot);
    slot.equalTo("universityGymId", id);
    slot.include('gymId');
    slot.find({
        success:function(result){
            j=0;
            var slide='';
            var total=0;
            var reserved = 0;
            var gymname='';
            for(i in result)
            {
                room=result[i];
                gymname=room.get('gymId').get('name');
                
                if(j==0)
                {
                    if(i==0)
                    {
                        slide += '<div class="item active">';
                    }
                    else
                    {
                        slide += '<div class="item">';
                    }
                }
                total += room.get('totalOccupancy');
                reserved += (parseInt(room.get('male'))+parseInt(room.get('female')));
                var percentage = ((parseInt(room.get('male'))+parseInt(room.get('female')))*100)/room.get('totalOccupancy');
                percentage = parseInt(percentage);
                color = getColor(percentage);
                slide +=    '<div class="col-lg-3 col-md-3 col-sm-3">';
                slide +=        '<div class="myStat' + i + ' pull-left" data-dimension="250" data-text="'+ percentage +'" data-width="30" data-fontsize="38" data-percent="'+ percentage +'" data-fgcolor="' + color + '" data-bgcolor="rgba(255, 255, 255, 0.5)">';
                slide +=        '</div>';
                slide +=        '<h4>' + room.get('name') + '</h4>';
                slide +=    '</div>';
                j++;
                if(j==3 || ((result.length - 1)==i))
                {
                    slide += '</div>';
                    j=0
                }
                
                
            }
            $('.class_occup').append(slide);
            total_perc = (parseInt((reserved*100)/total));
            big_color = getColor(total_perc);
            var rgbaCol = 'rgba(' + parseInt(big_color.slice(-6,-4),16) + ',' + parseInt(big_color.slice(-4,-2),16) + ',' + parseInt(big_color.slice(-2),16) +',0.7)';
            $('.big_green').css('background-color', rgbaCol);
            $('.big_green h1').html( total_perc + '%');
            $('.big_green h2').html(reserved + '/' + total + ' MEMBERS');
            $('.big_green p').html('TOTAL OCCUPANCY <BR> ' + gymname);
            for(i in result)
            {
                
                $('.myStat'+i).circliful();
            }
        }
    })
    
    
    var all_gym=[];
    var otherGym =  Parse.Object.extend("room");
    var othergym = new Parse.Query(otherGym);
    othergym.ascending('universityGymId');
    othergym.equalTo("universityId", current.get('universityId'));
    othergym.include('gymId');
    othergym.find({
        success:function(result){
            var old_gym='',old_gym_name='';
            var gym_res = 0;
            var gym_total = 0;
            var old_gym_id = '';
            var temp=[];
            var k=0;
            var ll=0;
            for(i in result)
            {
                room = result[i];
                gym = room.get('gymId');
                if(old_gym!='')
                {
                    if(old_gym==gym.id)
                    {
                        gym_res += (room.get('male') + room.get('female'));
                        gym_total += room.get('totalOccupancy');
                        //console.log('if');
                    }
                    else 
                    {
                        //all_gym[old_gym_name] = ((gym_res*100)/gym_total);
                        all_gym[ll] = new Array();
                        all_gym[ll]['name'] = old_gym_name;
                        all_gym[ll]['percentage'] = ((gym_res*100)/gym_total);
                        all_gym[ll]['id'] = old_gym;
                        k++;
                        ll++;
                        //console.log(old_gym_name + " - " + gym_total + " - " + gym_res);
                        gym_res = (room.get('male') + room.get('female'));
                        gym_total = room.get('totalOccupancy');
                        old_gym = gym.id;
                        //ll = gym.id;
                        old_gym_name = gym.get('name');
                        //console.log('else');
                    }
                    //console.log(result.length + " " + i);
                    if((result.length -1 ) == i)
                    {
                        //all_gym[old_gym_name] = ((gym_res*100)/gym_total);
                        all_gym[ll] = new Array();
                        all_gym[ll]['name'] = old_gym_name;
                        all_gym[ll]['percentage'] = ((gym_res*100)/gym_total);
                        all_gym[ll]['id'] = old_gym;
                        k++;
                        ll++;
                       // console.log(old_gym_name + " - " + gym_total + " - " + gym_res);
                    }
                }
                else 
                {
                    old_gym = gym.id;
                    //ll = gym.id;
                    old_gym_name = gym.get('name');
                    gym_res = (room.get('male') + room.get('female'));
                    gym_total = room.get('totalOccupancy');
                }
            }
            
            var og='';
            console.log(all_gym);
            gyms_count =  all_gym.length;
            if(gyms_count == 1)
            {
				gyms_class = 'conitional1';				
			}
			else if(gyms_count == 2)
			{
				gyms_class = 'conitional2';	
			}
			else if(gyms_count == 3)
			{
				gyms_class = 'conitional3';	
			}
			else if(gyms_count == 4)
			{
				gyms_class = 'conitional4';	
			}
			else if(gyms_count == 5)
			{
				gyms_class = 'conitional5';	
			}
			else{
				gyms_class = 'conitional5';	
			}
            for(a in all_gym)
            {
                no = 10/all_gym.length;
                og = '<li><a href="landing?rid='+ all_gym[a]['id'] +'" data-ajax="false">';
                og +=   '<div class="col-lg-3 col-md-3 col-sm-3 no-padd ' + gyms_class + '">';
                og +=       '<h1 class="' + getColorClass(all_gym[a]['percentage']) + '">'+ parseInt(all_gym[a]['percentage']) +'%</h1>';
                og +=       '<p>'+ all_gym[a]['name'] +'</p>';
                og +=   '</div></a>';
                og += '</li>';
                $('.bottom_gym ul').append(og);
            }
             
        }
    });
    
    
}

/*
 *  Get color by percentage 
 */
function getColor(perc)
{
    if(perc >= 81)
    {
        return '#ef4036';
    }
    else if(perc>=51)
    {
       return '#DFE12B';
    }
    else
    {
         return '#17df33';
    }
}

/*
 * Get color class
 */
function getColorClass(perc)
{
    if(perc >= 81)
    {
        return 'red_bg';
    }
    else if(perc>=51)
    {
       return 'yellow_bg';
    }
    else
    {
         return 'green_bg';
    }
}

/*
 * Save feedback
 */
function save_feedback()
{
    ratings= $('#star_rate').val();
    feedback = $('#feedback_text').val();
    classId = $('#fedd_cid').val();
    slotId = $("#fedd_sid").val();
	reservId = $("#fedd_rid").val();
    if(ratings==0)
    {
        showError('Please give the rating.');
    }
    else if(feedback=='')
    {
        showError('Please give your comment.');
    }
    else
    {
        var current = Parse.User.current();
        var UG =  Parse.Object.extend("classes");
        var ug = new Parse.Query(UG);
        ug.equalTo("objectId", classId);
        ug.include("instructor");
        ug.first({
            success : function(result){
                staff = result.get('instructor');
                var Slot =  Parse.Object.extend("class_slot");
                var slots = new Parse.Query(Slot);
                slots.equalTo("objectId", slotId);
                slots.first({
                    success:function(slot){                
                        var r1 = Parse.Object("feedback");
                        r1.set("class", result);
                        r1.set("staff", staff);
                        r1.set("user", current);
                        r1.set("classId", result.id);
                        r1.set("staffId", staff.id);
                        r1.set("userId", current.id);
                        r1.set("rating", parseFloat(ratings));
                        r1.set("comment", feedback);
                        r1.set("gymId",current.get('universityGymId'));
                        r1.set("universityId",current.get("universityId"));
                        r1.set("start_time",slot.get('start_time'));
                        r1.set("end_time",slot.get('end_time'));
                        r1.set("slot", slot);
                        r1.set("post_date", moment().format('DD.MM.YYYY'));
                        r1.set("slotId", slotId);
                        r1.save(null,{
                            success:function(){
                                showSuccess("Thank you for your feedback.");
								 var cr = Parse.Object("class_reservation");
								 cr.id = reservId;
								 cr.set("feedback", true);
								 cr.save();
                                $('#star_rate').val(0);
                                $('#feedback_text').val('');
                                $('.feedback_page').hide('slide',400);
                            },
                            error:function(){
                                showError('Could not save feedback. Please try again later.');
                            }
                        });
                    }
                })
            }
        })
    }
}


/************Reservation Section*******************/
function get_equipmentsReservation()
{
    current_time = new Date();
    time_now= moment(current_time).format('01/01/2011 hh:mm A');
    
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("slots");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    q.include('gymId');
    q.include('equipId');
    q.include('roomId');
    q.descending('equipId');
    q.find({
      success: function(slots){
        for(i in slots)
        {
            slot = slots[i];
            gym = slot.get('gymId');
            equip = slot.get('equipId');
            if(equip)
            {
                if(Date.parse(time_now) < Date.parse('01/01/2011 '+slot.get('start_time')))
                {
                    if(equipments[equip.id] && ((Date.parse('01/01/2011 ' + equipments[equip.id]) > Date.parse('01/01/2011 '+slot.get('start_time')))))
                    {
                        equipments[equip.id] = slot.get('start_time');
                    }
                    else if(!equipments[equip.id])
                    {
                        equipments[equip.id] = slot.get('start_time');
                    }
                }
            }
        }
       
        for(j in slots)
        {
            slot = slots[j];
            gym = slot.get('gymId');
            equip = slot.get('equipId');
            if(equip && equipments[equip.id] == slot.get('start_time'))
            {
                room = slot.get('roomId');
                row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_equip(this)" data-equipId="' + equip.id + '" data-id="'+slot.id+'">';
                //if(current.id == user.id)
                //{
                   row +=  '<strong style="display:none;">&nbsp;</strong>';
                //}
				equip_name = equip.get('name');
				equip_name = (equip_name.length>9)?equip_name.substring(0,9):equip_name;
                row +=  '<h4 title="' + equip.get('name') + '">'+equip_name+'</h4>';
                row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
                row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
                row +='</div>';
                $('#listingsResrvation').append(row);
                
                
            }
          }
            var EquipOccup = Parse.Object.extend("equipment_occupancy");
            var equipoccup = new Parse.Query(EquipOccup);
            equipoccup.equalTo('userId',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slotId');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slotId');
                            if(moment().diff(c_res.get('reservationDate'), 'days') == 0)
                            {
                                $('#listingsResrvation .equip-'+res_slot.id+ ' strong').show();
                                $('#listingsResrvation .equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
          
      }
    })
    
}


function get_equipmentsReservationByDate(dt)
{
    current_time = new Date(dt);
    time_now= moment(current_time).format(dt+' hh:mm A');
    todays_date = moment(current_time).format('DD.MM.YYYY');
    
    //console.log(current_time);
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("slots");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    q.include('gymId');
    q.include('equipId');
    q.include('roomId');
    q.descending('equipId');
    q.find({
      success: function(slots){
        for(i in slots)
        {
            slot = slots[i];
            gym = slot.get('gymId');
            clsDate = gym.get('closeDate').split(',');
            var chkCls=jQuery.inArray(dt,clsDate);
            //console.log(chkCls);
            equip = slot.get('equipId');
            if(equip && chkCls=='-1')
            {
                
                if(Date.parse(time_now) < Date.parse(dt + ' '+slot.get('start_time')))
                {
                    
                    if(equipments[equip.id] && ((Date.parse(dt + ' ' + equipments[equip.id]) > Date.parse(dt + ' '+slot.get('start_time')))))
                    {
                        equipments[equip.id] = slot.get('start_time');
                        //console.log(chkCls+'in1');
                    }
                    else if(!equipments[equip.id])
                    {
                        equipments[equip.id] = slot.get('start_time');
                        //console.log(chkCls+'in2');
                    }
                }
            }
        }
        //console.log(equipments);
        //console.log(jQuery.isEmptyObject( equipments ));
        if(!jQuery.isEmptyObject( equipments ))
        {
			for(j in slots)
			{
			  slot = slots[j];
			  gym = slot.get('gymId');
			  equip = slot.get('equipId');
			  if(equip && equipments[equip.id] == slot.get('start_time'))
			  {
				 room = slot.get('roomId');
				 row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_equip(this)" data-equipId="' + equip.id + '" data-id="'+slot.id+'">';
				 //if(current.id == user.id)
				 //{
				    row +=  '<strong style="display:none;">&nbsp;</strong>';
				 //}
				 equip_name = equip.get('name');
				 equip_name = (equip_name.length>9)?equip_name.substring(0,9):equip_name;
                 row +=  '<h4 title="' + equip.get('name') + '">'+equip_name+'</h4>';
				 row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
				 row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
				 row +='</div>';
				 $('#listingsResrvation').append(row);
				 
				 
			  }
			}
         }
         else{
         		row = '<div class="list-single equip- gym" onclick="view_class(this)" data-classId="" data-id="">';
		     //if(current.id == user.id)
		     //{
		        row +=  '<strong style="display:none;">&nbsp;</strong>';
		     //}
		     row +=  '<h4>Sorry No Equipment Available.</em></h4>';
		     row +='</div>';
		     $('#listingsResrvation').append(row);
         } 
            var EquipOccup = Parse.Object.extend("equipment_occupancy");
            var equipoccup = new Parse.Query(EquipOccup);
            equipoccup.equalTo('userId',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slotId');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slotId');
                            console.log(dt + " - " + c_res.get('reservationDate'));
                            if(dt == c_res.get('reservationDate'))
                            {
                                $('#listingsResrvation .equip-'+res_slot.id+ ' strong').show();
                                $('#listingsResrvation .equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
          
      }
    })
    
    
}
/*
 *  Get Occupied equipments
 */
function get_classesReservation()
{
    current_time = new Date();
    time_now= moment(current_time).format('01/01/2011 hh:mm A');
    todays_date = moment().format('DD.MM.YYYY');
    console.log(current_time);
    var current = Parse.User.current();
    var Occup = Parse.Object.extend("class_slot");
    var q = new Parse.Query(Occup);
     var allclases = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    //console.log(current.get("universityId"));
    //q.include("room");
    //q.include("userId");
    //q.include("equipmentId");
    //q.include("equipmentId.roomId");
    //q.include('slotId')
    q.limit(1000);
    q.include('gym');
    q.include('class');
    q.include('class.room');
    q.find({
        success:function(slots){
            var row='';
            for(i in slots)
            {
                slot = slots[i];
                gym = slot.get('gym');
                classes = slot.get('class');
                //console.log(classes.get('name'));
                if(classes && (todays_date == classes.get('date')))
                {
                    
                    //console.log(time_now + " - " + slot.get('start_time'));
                    if(Date.parse(time_now) < Date.parse('01/01/2011 '+slot.get('start_time')))
                    {
                        if(allclases[classes.id] && ((Date.parse('01/01/2011 ' + allclases[classes.id]) > Date.parse('01/01/2011 '+slot.get('start_time')))))
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                        else if(!allclases[classes.id])
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                    }
                }
            }
            console.log(allclases);
            for(j in slots)
            {
                slot = slots[j];
                gym = slot.get('gym');
                classes = slot.get('class');
                
                if(classes && allclases[classes.id] == slot.get('start_time'))
                {
                    room = classes.get('room');
                    //class1 = slot.get('classId');
                    row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_class(this)" data-classId="' + classes.id + '" data-id="'+slot.id+'">';
                    //if(current.id == user.id)
                    //{
                       row +=  '<strong style="display:none;">&nbsp;</strong>';
                    //}
					class_name = classes.get('name');
					class_name = (class_name.length>9)?class_name.substring(0,9):class_name;
                    row +=  '<h4 title="' + classes.get('name') + '">' + class_name + '</em></h4>';
                    row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
                    row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
                    row +='</div>';
                    $('#listingsClass').append(row);


                }
            }
            
            var ClassOccup = Parse.Object.extend("class_reservation");
            var equipoccup = new Parse.Query(ClassOccup);
            equipoccup.equalTo('user',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slot');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slot');
                            if(moment().diff(res_slot.get('date'), 'days') == 0)
                            {
                                $('#listingsClass .equip-'+res_slot.id+ ' strong').show();
                                $('#listingsClass .equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
        }
    })
}

function get_classesReservationByDate(dt)
{
    current_time = new Date(dt);
    time_now= moment(current_time).format(dt+' hh:mm A');
    todays_date = moment(current_time).format('DD.MM.YYYY');
    console.log(todays_date);
    var current = Parse.User.current();
    var Occup = Parse.Object.extend("class_slot");
    var q = new Parse.Query(Occup);
     var allclases = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    //console.log(current.get("universityId"));
    //q.include("room");
    //q.include("userId");
    //q.include("equipmentId");
    //q.include("equipmentId.roomId");
    //q.include('slotId')
    q.limit(1000);
    q.include('gym');
    q.include('class');
    q.include('class.room');
    q.find({
        success:function(slots){
            var row='';
            for(i in slots)
            {
                slot = slots[i];
                gym = slot.get('gym');
                classes = slot.get('class');
                //console.log(classes.get('date'));
                if(classes && (todays_date == classes.get('date')))
                {
                    
                  //console.log(time_now + " - " + slot.get('start_time'));
                    if(Date.parse(time_now) < Date.parse(dt+' '+slot.get('start_time')))
                    {
                        if(allclases[classes.id] && ((Date.parse(dt+' ' + allclases[classes.id]) > Date.parse(dt + ' '+slot.get('start_time')))))
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                        else if(!allclases[classes.id])
                        {
                            allclases[classes.id] = slot.get('start_time');
                        }
                    }
                }
            }
            console.log(allclases);
            if(!jQuery.isEmptyObject( allclases ))
            {
			  
			  for(j in slots)
			  {
				 slot = slots[j];
				 gym = slot.get('gym');
                                 classes = slot.get('class');
				 //console.log(classes.id);
				 if(classes && allclases[classes.id] == slot.get('start_time'))
				 {
                                     
                                    room = classes.get('room');
				     //class1 = slot.get('classId');
				     row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_class(this)" data-classId="' + classes.id + '" data-id="'+slot.id+'">';
				     //if(current.id == user.id)
				     //{
				        row +=  '<strong style="display:none;">&nbsp;</strong>';
				     //}
				     class_name = classes.get('name');
					 class_name = (class_name.length>9)?class_name.substring(0,9):class_name;
                     row +=  '<h4 title="' + classes.get('name') + '">' + class_name + '</em></h4>';
				     row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
				     row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
				     row +='</div>';
				     $('#listingsClass').append(row);


				 }
			  }
            }
            else
            {
            	
            	row = '<div class="list-single equip- gym" onclick="view_class(this)" data-classId="" data-id="">';
		     //if(current.id == user.id)
		     //{
		        row +=  '<strong style="display:none;">&nbsp;</strong>';
		     //}
		     row +=  '<h4>Sorry No Class Found.</em></h4>';
		     row +='</div>';
		     $('#listingsClass').append(row);
            }
            
            var ClassOccup = Parse.Object.extend("class_reservation");
            var equipoccup = new Parse.Query(ClassOccup);
            equipoccup.equalTo('user',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slot');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slot');
                            console.log(dt + " - " + c_res.get('date'));
                            if(moment(dt,'MM/DD/YYYY').format('MM/DD/YYYY') == moment(c_res.get('date'),'DD.MM.YYYY').format('MM/DD/YYYY'))
                            {
                                $('#listingsClass .equip-'+res_slot.id+ ' strong').show();
                                $('#listingsClass .equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });
        }
    });

}

/*
 * Notify Me if Available for equipment
 */
function notify_res()
{
    var occupId = $('#occupId').val();
    var current = Parse.User.current();
    var EquipOccup = Parse.Object.extend("equipment_occupancy");
    var equipoccup = new Parse.Query(EquipOccup);
    //equipoccup.equalTo('userId',current);
    equipoccup.equalTo('objectId',occupId);
    equipoccup.first({
        success:function(occup){
            var r1 = Parse.Object("equipment_notification");
            r1.set("occupancy", occup);
            r1.set("user",current);
            r1.set("occupancyId",occup.id);
            r1.set("userId",current.id);
            r1.save(null,{
                success:function(){
                    showSuccess('Notification saved successfully.');
                },
                error:function(){
                    showError('Notification could not be saved.');
                }
            })
        }
    })
    
}

/*
* Notify me if available for class
*/
function notify_class_res()
{
    var occupId = $('#slot').val();
    var current = Parse.User.current();
    var EquipOccup = Parse.Object.extend("class_slot");
    var equipoccup = new Parse.Query(EquipOccup);
    //equipoccup.equalTo('userId',current);
    equipoccup.equalTo('objectId',occupId);
    equipoccup.first({
        success:function(occup){
            var r1 = Parse.Object("class_notification");
            r1.set("slot", occup);
            r1.set("user",current);
            r1.set("slotId",occup.id);
            r1.set("userId",current.id);
            r1.save(null,{
                success:function(){
                    showSuccess('Notification saved successfully.');
                },
                error:function(){
                    showError('Notification could not be saved.');
                }
            })
        }
    })
    
}


/*
* On deck of landing page
*/
function my_on_deck()
{
	
    current_time = new Date();
    time_now= moment(current_time).format('01/01/2011 hh:mm A');
    
    var current = Parse.User.current();
    var Slot = Parse.Object.extend("slots");
    var q = new Parse.Query(Slot);
    var equipments = [];
    var temp=[]
    var c=1;
    q.equalTo("universityId", current.get("universityId"));
    q.include('gymId');
    q.include('equipId');
    q.include('roomId');
    q.descending('equipId');
    q.find({
      success: function(slots){
        for(i in slots)
        {
            slot = slots[i];
            gym = slot.get('gymId');
            equip = slot.get('equipId');
            if(equip)
            {
                if(Date.parse(time_now) < Date.parse('01/01/2011 '+slot.get('start_time')))
                {
                    if(equipments[equip.id] && ((Date.parse('01/01/2011 ' + equipments[equip.id]) > Date.parse('01/01/2011 '+slot.get('start_time')))))
                    {
                        equipments[equip.id] = slot.get('start_time');
                    }
                    else if(!equipments[equip.id])
                    {
                        equipments[equip.id] = slot.get('start_time');
                    }
                }
            }
        }
		var z=0;
       forcheck= 0;
	   var row ='';
	   var st = 0;
        for(j in slots)
        {
            slot = slots[j];
            gym = slot.get('gymId');
            equip = slot.get('equipId');
			 
            if(equip && equipments[equip.id] == slot.get('start_time'))
            {
                room = slot.get('roomId');
                //row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_equip(this)" data-equipId="' + equip.id + '" data-id="'+slot.id+'">';
                //if(current.id == user.id)
                //{
                  // row +=  '<strong style="display:none;">&nbsp;</strong>';
                //}
                // +=  '<h4>'+equip.get('name')+'</h4>';
                //row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
               // row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
               // row +='</div>';
               // $('.listings').append(row);
                if(z==0)
                {
                    if(st==0)
                    {
                        row += '<div class="item active"><div class="col-lg-3 col-md-3 col-sm-3 bg_black"><h1>ON</h1><h2>DECK</h2></div>';
						st++;
                    }
                    else
                    {
                        row += '<div class="item">';
                    }
                }
				 strat_time = slot.get('start_time');
			     strat_time = strat_time.replace('PM',"");				
				 strat_time = strat_time.replace('AM',"");
				 row += '<div class="col-lg-3 col-md-3 col-sm-3" onclick="window.location=\'view_equipment?slot=' + slot.id + '\'">';
				 row += '<h3>' + ltrim(strat_time) + '</h3>';
				 row +=	'<h4>' + moment().format('ddd MM/DD') + '</h4>';
				 row +=	'<p>' + equip.get('name') + '<br>' + room.get('name') + '</p>';
				 row += '</div>';
                 
				 forcheck++;
				 z++;
					if(z==3 || ((slots.length - 1)==j))
					{
						row += '</div>';
						z=0
					}
				 /*if(forcheck == 3)
				{
					 break;
				}*/
            }
          }
		  $('#deck').append(row);
           /* var EquipOccup = Parse.Object.extend("equipment_occupancy");
            var equipoccup = new Parse.Query(EquipOccup);
            equipoccup.equalTo('userId',current);
            //equipoccup.equalTo('equipmentId',equip);
            //equipoccup.equalTo('slotId',slot);
            equipoccup.include('slotId');
            equipoccup.find({
                success:function(is_reserved){
                    if(is_reserved)
                    {
                        for(n in is_reserved)
                        {
                            c_res = is_reserved[n];
                            res_slot = c_res.get('slotId');
                            if(moment().diff(c_res.get('reservationDate'), 'days') == 0)
                            {
                                $('.equip-'+res_slot.id+ ' strong').show();
                                $('.equip-'+res_slot.id).attr('data-occupId',c_res.id);
                            }
                        }
                    }
                }
            });*/
          
      }
    })

		function ltrim(strng) {
			var trimmed = strng.replace(/^0+/, '');
			return trimmed;
		}
 	
}