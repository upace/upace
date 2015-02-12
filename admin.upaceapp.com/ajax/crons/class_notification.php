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
   
   
    require 'parse/autoload.php';
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
    
    $classSlot = new ParseQuery("class_reservation");
    $classSlot->equalTo('date',$todays_date);
    $classSlot->includeKey('user');
    $classSlot->includeKey('class');
    $classSlot->includeKey('class.instructor');
    $classSlot->includeKey('slot');
    //$classSlot->getUpdatedAt();
    $slotResult = $classSlot->find();
    //echo"start<pre>";
    //var_dump($slotResult);
    foreach($slotResult as $tempSlot)
    {
        $userdetails = $tempSlot->get('user');
        $classDetails = $tempSlot->get('class');
        $instructorDetails = $classDetails->get('instructor');
        $slotDetails = $tempSlot->get('slot');
        //echo $userdetails->get('firstname').'<br/>';
        
        $to = $userdetails->get('email'); // this is your Email address
        $from = 'Upace<no-reply@uparse.com>'; // this is the sender's Email address
        $subject = 'You have booked for class '.$classDetails->get('name');
        //$message = 'lorem ipsum doller sit amet API - '.API." JSKEY - ".JSKEY;
        
        $email_message = "Hello ".$userdetails->get('firstname')." ".$userdetails->get('lastname').",<br/><br/>";
        $email_message .="You have a ".$classDetails->get('name')." class reserved for today from ".$slotDetails->get('start_time')." to ".$slotDetails->get('end_time').". Your instructor for today will be ".$instructorDetails->get('firstname')." ".$instructorDetails->get('lastname').".<br/><br/>Thanks,<br/>Upace";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From:" . $from. "\r\n";
        //$headers .= "CC: nits.bikash@gmail.com";

        //echo $to."<br/>".$email_message;
        mail($to,$subject,$email_message,$headers);
        //echo $tempSlot->get('start_time')." - ".$tempSlot->get('end_time')."<br/>";
    }
    //print_r($allclasses);
  
    
    
    

   ?>
    
    
    
   
    

</body>
</html>
