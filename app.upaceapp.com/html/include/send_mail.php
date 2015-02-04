<?php
/*
 *  receiver - Email id of receiver
 *  subject  - Subject of email
 *  content     - Content of email
 */
if(!empty($_POST))
{
    $to = $_POST['receiver']; // this is your Email address
    $from = 'no-reply@uparse.com'; // this is the sender's Email address
    $subject = $_POST['subject'];
    $message = $_POST['content'];

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From:" . $from. "\r\n";
    $headers .= "CC: nits.bikash@gmail.com";
    if(mail($to,$subject,$message,$headers))
    {
        echo json_encode(array('status' => true));
    }
    else {
        echo json_encode(array('status' => false));
    }
    exit;
}

