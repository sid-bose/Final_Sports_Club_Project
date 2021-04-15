<?php
$conn = mysqli_connect("localhost", "root", "", "event_create");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1 = mysqli_connect("localhost", "root", "", "members_reg_event");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }
    

$conn2= mysqli_connect("localhost", "root", "", "registration");
if ($conn2->connect_error) {
    die("Connection failed due to error in code : " . $conn2->connect_error);
    }

$sql = "SELECT * FROM double_creator";
$result = $conn->query($sql);



session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check_event</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="style3.css" rel="stylesheet"/>
</head>
<body>

<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">Kindly put in the Event ID u want to register for</h1>
      <p class="leading-relaxed mt-4">Make sure to put the exact same id for which u want to register for.</p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5">Event id checking</h2>
      <form action="crick_reg_1.php" method="post">
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Name</label>
        <input type="text" id="full-name" name="name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Event-id</label>
        <input type="text" id="full-name" name="event_id" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <!-- <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Password</label>
        <input type="password" id="email" name="password" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div> -->
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Check</button>
      <p class="text-xs mt-3">*Sports club All rights Reserved*</p>
    </div>
    </form>
  </div>
</section>

<header class="text-gray-400 bg-gray-900 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">IIITG SPORTS CLUB</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <!-- <a class="mr-5 hover:text-white">First Link</a>
      <a class="mr-5 hover:text-white">Second Link</a>
      <a class="mr-5 hover:text-white">Third Link</a>
      <a class="mr-5 hover:text-white">Fourth Link</a> -->
    </nav>
    <form action="index.php" method="post">
    <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">HOME
    <form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php
$name=filter_input(INPUT_POST, 'name');
$event_id=filter_input(INPUT_POST, 'event_id');
$sql="SELECT id FROM double_creator WHERE sports_name='Cricket' AND flag_var='1'";
$result=$conn->query($sql);


if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['id']==$event_id)
            {
                $flag=true;
                break;
            }
            else{
                $flag=false;
            }
        }
    }

    $sql="SELECT * FROM double_creator WHERE id='$event_id'";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            
            $_SESSION['no_play_a']=$row['no_play_a'];
            $_SESSION['no_play_b']=$row['no_play_b'];
        }
    }
    $sql="SELECT tname_a FROM double_creator WHERE id='$event_id'";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            
            $_SESSION['tname_a']=$row['tname_a'];
            break;
            
        }
    }
    $sql="SELECT tname_b FROM double_creator WHERE id='$event_id'";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            
            $_SESSION['tname_b']=$row['tname_b'];
            echo  $_SESSION['tname_b'];
            break;
        }
    }
    
    $team_a_n=$_SESSION['tname_a'];
    $team_b_n=$_SESSION['tname_b'];
    $sql="SELECT * FROM cricket_reg";
    $result=$conn1->query($sql);
    $flag5=true;
    if($result)
    {
      if($result->num_rows == 0)
      {
        
        $sql="INSERT INTO cricket_reg (`event_id`,`player_name`,`email`,`team_name`,`pos`) VALUES ('$event_id','none1','none12@gmail.com','$team_a_n','bowler')";
        $result1=$conn1->query($sql);
        $sql="INSERT INTO cricket_reg (`event_id`,`player_name`,`email`,`team_name`,`pos`) VALUES ('$event_id','none2','none34@gmail.com','$team_b_n','bowler')";
        $result2=$conn1->query($sql);

      }
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['player_name']==$name)
            {
                $flag5=false;
                
                break;
            }
            else{
                
                $flag5=true;
            }
        }

    }
}
if($flag5==true)
{  
if($_SESSION['Name']==$name)
{
if(!empty($event_id))
  {
     if($flag==true)
     {
           $sql="INSERT INTO cricket_reg (`event_id`,`player_name`) VALUES ('$event_id','$name')";
           if($conn1->query($sql))
           {
               $_SESSION['event_id']=$event_id;
               $_SESSION['player_name']=$name;
               echo "<script> window.location.assign('crick_reg.php'); </script>";
               
           }
           else{
            echo '<script>alert("Query insertion error")</script>' ;
           }
     }
     else{
        echo '<script>alert("Your Event ID doesnt match with any available event ID")</script>' ;
     }



  }
}
else{
    echo"enter your name only";
}
}
else{
    echo"YOU HAVE ALREADY REGISTERED FOR THIS EVENT";
}
  $conn->close();
  $conn1->close();

?>