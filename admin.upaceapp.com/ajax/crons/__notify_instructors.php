<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->
<?php require_once('include/config.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	
<script type="text/javascript" src="<?php echo ROOT?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo ROOT?>js/moment.js"></script>
<head>
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");

</script>
  
   <?php
   
    $to = 'nits.bikash@gmail.com'; // this is your Email address
    $from = 'no-reply@uparse.com'; // this is the sender's Email address
    $subject = 'Cron test';
    $message = 'lorem ipsum doller sit amet API - '.API." JSKEY - ".JSKEY;

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From:" . $from. "\r\n";
    //$headers .= "CC: nits.bikash@gmail.com";
    mail($to,$subject,$message,$headers);
   ?>
</head>

<body onload="notify_instructors()">
    <script>
        
        function notify_instructors()
        {
             $.ajax({
                                            type:'post',
                                            dataType:'json',
                                            url:'<?php echo ROOT; ?>' + 'crons/include/send_mail.php',
                                            data:{receiver:'nits.bikash@gmail.com', subject:'Next Class Notification', content:'ajax test'},
                                            async:false,
                                            success:function(data){
                                                console.log(data);
                                            }
                                        });
                                        
                                        
           current_time = new Date();
           current_time = moment(current_time).add(2, 'hours');
            time_now= moment(current_time).format('01/01/2011 hh:mm A');
            todays_date = moment().format('DD.MM.YYYY');
            //console.log(time_now);
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
            q.include('class.instructor');
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
                            console.log(time_now + " - " + slot.get('start_time'));
                            if(Date.parse(time_now) == Date.parse('01/01/2011 '+slot.get('start_time')))
                            {
                                allclases[classes.id] = [];
                                allclases[classes.id]['start_time'] = slot.get('start_time');
                                allclases[classes.id]['end_time'] = slot.get('end_time');
                            }
                        }
                    }
                    console.log(allclases);
                    for(j in slots)
                    {
                        slot = slots[j];
                        //console.log(slot.get('start_time'));
                        gym = slot.get('gym');
                        classes = slot.get('class');
                        if(classes && allclases[classes.id] && allclases[classes.id]['start_time'] == slot.get('start_time'))
                        {
                            //console.log(slot.get('start_time'));
                            room = classes.get('room');
                            instructor = classes.get('instructor');
                            
                            var ClassOccup = Parse.Object.extend("class_reservation");
                            var equipoccup = new Parse.Query(ClassOccup);
                            equipoccup.equalTo('class',classes);
                            equipoccup.include('user');
                            equipoccup.find({
                                success:function(reserved){
                                    if(reserved)
                                    {
                                        email_message = '';
                                        for(k in reserved)
                                        {
                                            if(email_message=='')
                                            {
                                                email_message = "Hello " + instructor.get('firstname') + " " + instructor.get('lastname') + ",<br/> Your next class is from " + allclases[reserved[k].get('classId')]['start_time'] + " to " + allclases[reserved[k].get('classId')]['end_time'] + " in " + room.get('name') + ". Students are below :-<br/><br/>";
                                            }
                                             temp_user =  reserved[k].get('user');
                                             email_message += temp_user.get('firstname') + " " + temp_user.get('lastname') + "<br/>";
                                        }
                                        email_message += "<br/>Room occupancy is " + (room.get('male') + room.get('female')) + "/" + room.get('totalOccupancy') + ".<br/><br/>";
                                        email_message += "Thanks,<br/>Upace";
                                        //console.log(email_message);
                                         $.ajax({
                                            type:'post',
                                            dataType:'json',
                                            url:'<?php echo ROOT; ?>' + 'crons/include/send_mail.php',
                                            data:{receiver:instructor.get('email'), subject:'Next Class Notification', content:email_message},
                                            async:false,
                                            success:function(data){
                                                console.log(data);
                                            }
                                        });
                                    }
                                }
                            })
                            //class1 = slot.get('classId');
                            row = '<div class="list-single equip-'+slot.id+' gym-'+gym.id+'" onclick="view_class(this)" data-classId="' + classes.id + '" data-id="'+slot.id+'">';
                            //if(current.id == user.id)
                            //{
                               row +=  '<strong style="display:none;">&nbsp;</strong>';
                            //}
                            row +=  '<h4>'+classes.get('name')+ '</em></h4>';
                            row +=  '<p>'+room.get('name')+'<em>' + gym.get('name') +'</em></p>';
                            row +=  '<span>'+slot.get('start_time')+' - '+slot.get('end_time')+'</span>';
                            row +='</div>';
                            $('.listings').append(row);


                        }
                    }

                    /*var ClassOccup = Parse.Object.extend("class_reservation");
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
                    });*/
                }
            })
        }
    </script>
   
    

</body>
</html>
