
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
</head>
<body>
<h1>Fill in the details to approve</h1>
<form action="approval_double.php" method="post">
<!-- <p>Sports Name</p>
<input type=" text"  name="sports_name"> -->
<p>Event id</p>
<input type="text" name="event_id">
<input type="submit" value="approve">
</form>
<form action="avail_tour_a.php" method="post">
    <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">HOME
    <form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
</body>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>

<?php

$conn=mysqli_connect("localhost","root","","event_create");
if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
$event_id=filter_input(INPUT_POST, 'event_id');
session_start();

$sql="UPDATE double_creator
     SET flag_var='1'
     WHERE id='$event_id'";
   if($conn->query($sql))
   {
       echo"Approved Successfully for event id: $event_id";

   }
   else{
       echo"Approval error";
   }

$conn->close();
?>