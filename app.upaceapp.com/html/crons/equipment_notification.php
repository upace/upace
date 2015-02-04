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
    
    $classSlot = new ParseQuery("gym_equipment");
    //$classSlot->equalTo('status',false);
    //$classSlot->getUpdatedAt();
    $slotResult = $classSlot->get();
    echo"start<pre>";
    //var_dump($slotResult);
    foreach($slotResult as $tempSlot)
    {
        var_dump($tempSlot);
        $updatedAt = $tempSlot->getUpdatedAt();
        var_dump(date('Y-m-d',  strtotime($updatedAt)).'<br/>');
        //echo $tempSlot->get('start_time')." - ".$tempSlot->get('end_time')."<br/>";
    }
    //print_r($allclasses);
  
    
    
    

   ?>
    
    
    
   
    

</body>
</html>
