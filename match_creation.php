<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Create</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="style3.css" rel="stylesheet"/>
</head>
<body>

<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">CREATE MATCH</h1>
      <p class="leading-relaxed mt-4"></p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5">Create Match</h2>
      <form action="match_creation.php" method="post">
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Event-id</label>
        <input type="text" id="full-name" name="id_of_events" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Event_type</label>
        <input type="text" id="full-name" name="event_type" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Match Name</label>
        <input type="text" id="email" name="match_name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Assign it to:</label>
        <input type="text" id="email" name="coord_name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Sports Name</label>
        <input type="text" id="email" name="sports_name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Create</button>
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
$host="localhost";
$user="root";
$password="";


$conn=mysqli_connect($host,$user,$password,"match");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

$conn1=mysqli_connect($host,$user,$password,"event_create");
if ($conn1->connect_error) {
    die("Connection failed due to error in code : " . $conn1->connect_error);
    }


    $conn2=mysqli_connect($host,$user,$password,"co-ordinator");
    if ($conn2->connect_error) {
        die("Connection failed due to error in code : " . $conn2->connect_error);
        }

    
    $event_ID = filter_input(INPUT_POST, 'id_of_events');
    
    $match_name = filter_input(INPUT_POST, 'match_name');
    $coord_name = filter_input(INPUT_POST, 'coord_name');
    $event_type=filter_input(INPUT_POST, 'event_type');
    $sports_name=filter_input(INPUT_POST, 'sports_name');

    $sql="SELECT * FROM coordinator_reg";
    $result=$conn2->query($sql);


    $num_row=mysqli_num_rows($result);
    $array_name=array();
    
    if($result)
    {
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            array_push($array_name,$row['Name']);
        }

    }
}
$flag=true;

    if($event_type=='Doubles')
    {
    $sql="SELECT id FROM double_creator WHERE  flag_var='1'";
    $result1=$conn1->query($sql);
    if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['id']==$event_ID)
            {
                $flag=true;
                echo"1";
                break;
            }
            else{
                
                echo"2";
                $flag=false;
            }
        }
    }
}
else{
    $sql="SELECT id FROM single_creator WHERE  flag_var='1'";
    $result1=$conn1->query($sql);
    if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['id']==$event_ID)
            {
                $flag=true;
                break;
            }
            else{
                $flag=false;
            }
        }
    }

}
$flag10=true;
$sql="SELECT * FROM match_details";
$result1=$conn->query($sql);
$delete_name='none';
if ($result1->num_rows > 0) 
{
    while($row = $result1->fetch_assoc())
    {
        if($sports_name==$row['sports_name'])
        {
            $flag10=true;
            $delete_name=$row['sports_name'];
            break;
        }
        else{
          $flag10=false;
        }
    }
}

$count_names=count($array_name);
$flag2=true;
for($i=0;$i<$count_names;$i++)
{
    if($coord_name==$array_name[$i])
    {
        $flag2=true;
        break;
    }
    else{
        $flag2=false;
    }
}

if($flag==true)
{
   if($flag2==true)
   { 
     if($flag10==false)
     {
      $sql="INSERT INTO match_details (`event_id`, `match_name`, `coord_name`,`sports_name`) VALUES ('$event_ID','$match_name','$coord_name','$sports_name')";
      $result=$conn->query($sql);
      if($result)
      {
          echo"Match created Successfully";
      }
      else{
          echo"Insertion failure";
      }

   }
   else{
     echo"You cannot create match of this type because one of this type will be live soon delete any previous record of this type if you want to continue";
     $_SESSION['sports_name']=$delete_name;
     echo"<a href='delete_match.php'>Click here to delete previous record of this type<a>";
   }
  }
   else{
       echo"Enter only the names of coordinator who have registered.";
   }





}
else{
    echo"Enter the event id which has got approved";
}



$conn->close();
$conn1->close();
$conn2->close();
?>