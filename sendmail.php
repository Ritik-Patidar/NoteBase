<?php

$to_email = "ritikpatidar029@gmail.com" ;
$subject = "email sending test via PHP" ;
$body = "Hi, This is a test email send by PHP by Ritik" ;
$header = "From: ritik.patidar.sbg@gmail.com"; 

if(mail($to_email,$subject,$body,$header)){
    echo "Email successfully Sent to $to_email";
}
else{
    echo "Email sending failed";
}


?>