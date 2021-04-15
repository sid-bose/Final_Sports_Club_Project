<?php

$con = mysqli_connect("localhost", "root", "", "event_create");
$conn = mysqli_connect("localhost", "root", "", "co-ordinator");

if($con->connect_error) {
    die("Connection failed due to error in code : " . $con->connect_error);
    }

 if($conn->connect_error) {
        die("Connection failed due to error in code : " . $conn->connect_error);
        }


$sql1 = "SELECT * FROM double_creator";
$result = $con->query($sql1);

$sql2 = "SELECT * FROM coordinator_reg";
$result2 = $conn->query($sql2);

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Create Event</title>
    <link href="style3.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body>
<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">EVENT CREATION PORTAL FOR DOUBLES TYPE</h1>
      <p class="leading-relaxed mt-4"></p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5"></h2>
      <form action="double_creator.php" method="post">
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Sports Name</label>
        <input type="text" id="full-name" name="sports_name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Date of Event</label>
        <input type="text" id="email" name="event_date" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Time of Event</label>
        <input type="text" id="full-name" name="event_time" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <!-- <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Event Type(Doubles or Singles)</label>
        <input type="text" id="full-name" name="sports_type" class="w-full bg-gray-6'00 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div> -->
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Team A Name</label>
        <input type="text" id="full-name" name="tname_a" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Team B Name</label>
        <input type="text" id="full-name" name="tname_b" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Total Number of Players in Team A</label>
        <input type="text" id="full-name" name="a_players" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Total Number of Players in Team A</label>
        <input type="text" id="full-name" name="b_players" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-400">Description</label>
        <textarea id="message" name="desc" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">CREATE</button>
      <p class="text-xs mt-3">*Sports club All rights Reserved*</p>
    </div>
    </form>
      
        

       
                 
        

      <!--  -->
      <!-- <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Sports2</label>
        <input type="text" id="full-name" name="sports2" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Sports3</label>
        <input type="text" id="full-name" name="sports3" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div> -->
      <!-- <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-400">Description</label>
        <textarea id="message" name="desc" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">CREATE</button>
      <p class="text-xs mt-3">*Sports club All rights Reserved*</p>
    </div>
    </form>-->
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
    <form action="tournament_c.php" method="post">
    <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">BACK
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
// $desc=filter_input(INPUT_POST, 'desc');


$sports_name= filter_input(INPUT_POST, 'sports_name');
$event_date= filter_input(INPUT_POST, 'event_date');
$event_time=filter_input(INPUT_POST, 'event_time');
// $sports_type=filter_input(INPUT_POST, 'sports_type');
$tname_a=filter_input(INPUT_POST, 'tname_a');
$tname_b=filter_input(INPUT_POST, 'tname_b');
$a_players=filter_input(INPUT_POST, 'a_players');
$b_players=filter_input(INPUT_POST, 'b_players');
$desc=filter_input(INPUT_POST, 'desc');

if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc())
        {
            if($row['username']==$_SESSION['username'])
            {
                $sports_coord=$row['sports'];
                break;
            }
        }
    }
    $sports=array('Cricket' , 'Football' , 'Volleyball' , 'Carrom' , 'Batminton' , 'Table-tennis');
 $num=count($sports);  

 while($num!=0)
 {
 if($sports[$num-1]==$sports_name)
 {
         $flag1=true;
         break;
 }
 else if($sports[$num-1]!=$sports_name  &&  $num==1)
 {
         $flag1=false;
   break;
  
 }
 else{
   $num=$num-1;  
 }
}

 if (!empty($sports_name))
   {    
    if (!empty($event_date) && !empty($event_time)  &&    !empty($tname_a))
    {
      
      if($flag1==true)
      {
          if($sports_coord==$sports_name)
           {
             $sql1 = "INSERT INTO double_creator (`sports_name`, `sports_date`, `sports_time`,`tname_a`, `tname_b`, `no_play_a`, `no_play_b`,`desc_event`)
             VALUES ('$sports_name','$event_date','$event_time','$tname_a','$tname_b','$a_players','$b_players', '$desc')" ;

             if ($con->query($sql1))
                {
           
                    
                    echo "<p class='login_wrong'>EVENT CREATED SUCCESSFULLY<p>";
                    

               }
               else
                {
                   echo '<script>alert("something went wrong while creating event")</script>' ;
               
                 }

            
            }
            else{
                echo"Your field doesnt match the sports field";

            }
         
              
    }
    else{
         echo '<script>alert("sports field invalid")</script>';
         
    }


    } 
    else{
        echo '<script>alert("fill all the fields")</script>';
    }
  }

$con->close();
$conn->close();

?>