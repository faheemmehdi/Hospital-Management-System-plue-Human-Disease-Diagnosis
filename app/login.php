<?php
 
// Importing DBConfig.php file.
$HostName = "localhost";
 
//Define your database name here.
$DatabaseName = "hospital";
 
//Define your database username here.
$HostUser = "root";
 
//Define your database password here.
$HostPass = "";

// Create connection
$con = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
// Populate User email from JSON $obj array and store into $email.
$email = $obj['email'];
 
// Populate Password from JSON $obj array and store into $password.
// $password = $obj['password'];

//Applying User Login query with email and password match.
$Sql_Query = "select * from appcode where code = '$email' ";

// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));


if(isset($check)){

 $SuccessLoginMsg = 'Data Matched';
 
 // Converting the message into JSON format.
$SuccessLoginJson = json_encode($SuccessLoginMsg);
 
// Echo the message.
 echo $SuccessLoginJson ; 

 }
 
 else{
 
 // If the record inserted successfully then show the message.
$InvalidMSG = 'Invalid App Code Please Try Again' ;
 
// Converting the message into JSON format.
$InvalidMSGJSon = json_encode($InvalidMSG);
 
// Echo the message.
 echo $InvalidMSGJSon ;
 
 }
 
 mysqli_close($con);
?>