<?php

     $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
define('ROOT', $pageURL.$_SERVER['HTTP_HOST'].'/');

    //$to = 'nits.bikash@gmail.com'; // this is your Email address
    $from = 'no-reply@uparse.com'; // this is the sender's Email address
    $subject = 'Cron test';
    $message = 'lorem ipsum doller sit amet '.ROOT;

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From:" . $from. "\r\n";
    //$headers .= "CC: nits.bikash@gmail.com";
    if(mail($to,$subject,$message,$headers))
    {
        echo json_encode(array('status' => true));
    }
    else {
        echo json_encode(array('status' => false));
    }
    exit;