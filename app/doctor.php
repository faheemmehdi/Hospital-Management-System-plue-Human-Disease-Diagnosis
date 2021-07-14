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
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT * FROM doctor ORDER BY id DESC";
 
$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>