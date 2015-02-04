<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->
<?php require_once('include/config.php');?>
<head>
<script>
//Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");

</script>
  
</head>

<body >
   <?php
   /*
    * Cron to send mail to instructor before 2 hour of a class. 
    */
  
   
    require '../../parse/autoload.php';
    use Parse\ParseClient;
    use Parse\ParseObject;
    use Parse\ParseQuery;
    use Parse\ParseACL;
    use Parse\ParsePush;
    use Parse\ParseUser;
    use Parse\ParseInstallation;
    use Parse\ParseException;
    use Parse\ParseAnalytics;
    use Parse\ParseFile;
    use Parse\ParseCloud;
    
    ParseClient::initialize(API, REST_API, MASTER_KEY );
   
    $timenow = date('h:i A',strtotime("+2 hour"));
    $todays_date = date('d.m.Y');
    $allclasses = array();
    //echo $timenow.'<br/>'.$todays_date;
    //exit;
    
    $classSlot = new ParseQuery("class_slot");
    $classSlot->includeKey("gym");
    $classSlot->includeKey("class");
    $classSlot->includeKey("class.room");
    $classSlot->includeKey("class.instructor");
    $slotResult = $classSlot->find();
    //echo"start<pre>";
    //var_dump($slotResult);
    foreach($slotResult as $tempSlot)
    {
        $classes = $tempSlot->get('class');
        //echo $todays_date."==".$classes->get('date')."<br/>";
        if(!empty($classes) && ($todays_date == $classes->get('date')))
        {
            //echo $timenow." - ".$tempSlot->get('start_time');
            if($timenow == $tempSlot->get('start_time'))
            {
                $allclasses[$classes->getObjectId()]['start_time'] = $tempSlot->get('start_time');
                $allclasses[$classes->getObjectId()]['end_time'] = $tempSlot->get('end_time');
            }
        }
        //echo $tempSlot->get('start_time')." - ".$tempSlot->get('end_time')."<br/>";
    }
    //print_r($allclasses);
    foreach($slotResult as $newSlot)
    {
        $tempGym=$newSlot->get('gym');
        $tempClass = $newSlot->get('class');
        //echo $tempClass->getObjectId()." - ".$allclasses[$tempClass->getObjectId()]['start_time']."==".$newSlot->get('start_time')."<br/>";
        
        if(!empty($tempClass) && ($allclasses[$tempClass->getObjectId()]['start_time'] == $newSlot->get('start_time')))
        {
            //echo "h1";
            $room = $tempClass->get('room');
            $instructor = $tempClass->get('instructor');
            
            $classOccup = new ParseQuery("class_reservation");
            $classOccup->equalTo('classId',$tempClass->getObjectId());
            $classOccup->includeKey('user'); 
            $occupResults = $classOccup->find();
            //var_dump($occupResults);
            if(!empty($occupResults))
            {
                $email_message = '';
                foreach($occupResults as $tempOccup)
                {
                    //echo "h2";
                    if(empty($email_message))
                    {
                        $email_message = "Hello ".$instructor->get('firstname')." ".$instructor->get('lastname').",<br/> Your next class is from ".$allclasses[$tempOccup->get('classId')]['start_time']." to ".$allclasses[$tempOccup->get('classId')]['end_time']." in ".$room->get('name').". Students are below :-<br/><br/>";                        
                    }
                    $tempUser = $tempOccup->get('user');
                    $email_message .= $tempUser->get('firstname')." ".$tempUser->get('lastname')."<br/>";
                    
                }
                $email_message .= "<br/>Room occupancy is " . ($room->get('male') + $room->get('female')) . "/" . $room->get('totalOccupancy') . ".<br/><br/>";
                $email_message .= "<br/>Thanks,<br/>Upace";
                    
                $to = $instructor->get('email'); // this is your Email address
                $from = 'Upace<no-reply@uparse.com>';  // this is the sender's Email address
                $subject = 'Next Class Notification';
                //$message = 'lorem ipsum doller sit amet API - '.API." JSKEY - ".JSKEY;

                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From:" . $from. "\r\n";
                //$headers .= "CC: nits.bikash@gmail.com";

                //echo $to."<br/>".$email_message;
                mail($to,$subject,$email_message,$headers);
            }
            else
            {
                $email_message = "Hello ".$instructor->get('firstname')." ".$instructor->get('lastname').",<br/> Your next class is from ".$allclasses[$tempClass->getObjectId()]['start_time']." to ".$allclasses[$tempOccup->getObjectId()]['end_time']." in ".$room->get('name').". There are no student reserved for this class.<br/>Thanks,<br/>Upace";  
                $email_message .= "<br/>Thanks,<br/>Upace";
                    
                $to = $instructor->get('email'); // this is your Email address
               $from = 'Upace<no-reply@uparse.com>';  // this is the sender's Email address
                $subject = 'Next Class Notification';
                //$message = 'lorem ipsum doller sit amet API - '.API." JSKEY - ".JSKEY;

                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From:" . $from. "\r\n";
                //$headers .= "CC: nits.bikash@gmail.com";

                //echo $to."<br/>".$email_message;
                mail($to,$subject,$email_message,$headers);
            }
        }
    }
    
    
    
//    $query = new ParseQuery("classes");
//
//    $results = $query->find();
//    $message =  "Successfully retrieved " . count($results) . " scores.<br/>";
//// Do something with the returned ParseObject values
//for ($i = 0; $i < count($results); $i++) {
//  $object = $results[$i];
//  $message.=$object->getObjectId() . ' - ' . $object->get('name'). " <br/>";
//}
//    $to = 'nits.bikash@gmail.com'; // this is your Email address
//    $from = 'no-reply@uparse.com'; // this is the sender's Email address
//    $subject = 'Cron test';
//    //$message = 'lorem ipsum doller sit amet API - '.API." JSKEY - ".JSKEY;
//
//    $headers  = 'MIME-Version: 1.0' . "\r\n";
//    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//    $headers .= "From:" . $from. "\r\n";
//    $headers .= "CC: nits.bikash@gmail.com";
//    //mail($to,$subject,$message,$headers);
   ?>
    
    
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
            //q.equalTo("universityId", current.get("universityId"));
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
