<?php
 
//Define your host here.
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

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
     user-scalable=0' >
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">
      <style>
      .unselectable {
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: #cc0000;
      }
    </style>
</head>

<body class=" unselectable overflow-hidden items-center justify-center" style="background: #edf2f7;">
  <?php
        $display = "select count(*) from appointment";
        $query = mysqli_query($conn,$display);
        $tmovie = mysqli_fetch_array($query);
       ?>
     
<div>
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
      <!-- Dashboard -->
    </h2>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
          <i class="fa fa-calendar"></i>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600">
            Total Appointment
          </p>
          <p class="text-lg font-semibold text-gray-700">
            <?php echo $tmovie['0']; ?>
          </p>
        </div>
      </div>
        <?php
        $displayb = "select count(*) from bed";
        $queryb = mysqli_query($conn,$displayb);
        $bed = mysqli_fetch_array($queryb);
       ?>
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
          <i class="fa fa-procedures"></i>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600">
            Total Bed
          </p>
          <p class="text-lg font-semibold text-gray-700">
            <?php echo $bed['0']; ?>
          </p>
        </div>
      </div>
       <?php
        $displayp = "select count(*) from patient";
        $queryp = mysqli_query($conn,$displayp);
        $patient = mysqli_fetch_array($queryp);
       ?>
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
            </path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600">
            Total Patient
          </p>
          <p class="text-lg font-semibold text-gray-700">
            <?php echo $patient['0']; ?>
          </p>
        </div>
      </div>
      <?php
        $displaydo = "select count(*) from Doctor";
        $querydo = mysqli_query($conn,$displaydo);
        $Doctor = mysqli_fetch_array($querydo);
       ?>
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div
          class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
          <i class="fa fa-user-md"></i>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600">
            Total Doctor
          </p>
          <p class="text-lg font-semibold text-gray-700">
            <?php echo $Doctor['0']; ?>
          </p>
        </div>
      </div>
      <?php
        $displaypa = "select count(*) from payment";
        $querypa = mysqli_query($conn,$displaypa);
        $payment = mysqli_fetch_array($querypa);
       ?>
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div
          class="p-3 mr-4 text-pink-500 bg-pink-100 rounded-full">
          <i class="fa fa-money-check"></i>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600">
            Total Payment Invoice
          </p>
          <p class="text-lg font-semibold text-gray-700">
            <?php echo $payment['0']; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>