<?php

// Importing DBConfig.php file.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "hospital";
 
//Define your database username here.
$HostUser = "root";
 
//Define your database password here.
$HostPass = "";

// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);


$title = $obj['title'];
$address = $obj['address'];
$phone = $obj['phone'];
$emergency = $obj['emergency'];
$support = $obj['support'];
$email = $obj['email'];
$currency = $obj['currency'];
$block_1_text_under_title = $obj['block_1_text_under_title'];
$service_block__text_under_title = $obj['service_block__text_under_title'];
$doctor_block__text_under_title = $obj['doctor_block__text_under_title'];
$facebook_id = $obj['facebook_id'];
$twitter_id = $obj['twitter_id'];
$google_id = $obj['google_id'];
$youtube_id = $obj['youtube_id'];
$skype_id = $obj['skype_id'];
$twitter_username = $obj['twitter_username'];
 
 // Creating SQL query and insert the record into MySQL database table.

$Sql_Query = "UPDATE website_settings SET title='$title',address='$address',phone='$phone',emergency='$emergency',support='$support',email='$email',currency='$currency',block_1_text_under_title='$block_1_text_under_title',service_block__text_under_title='$service_block__text_under_title',doctor_block__text_under_title='$doctor_block__text_under_title',facebook_id='$facebook_id',twitter_id='$twitter_id',google_id='$google_id',youtube_id='$youtube_id',skype_id='$skype_id',twitter_username='$twitter_username' ";
 

 if(mysqli_query($con,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = 'Data Inserted Successfully into MySQL Database' ;

// Converting the message into JSON format.
$json = json_encode($MSG);

// Echo the message.
 echo $json ;
 
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>