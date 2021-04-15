<?php
$conn = mysqli_connect("localhost", "root", "", "event_create");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
  
    $conn1 = mysqli_connect("localhost", "root", "", "members_reg_event");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
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
    <title>Cricket Registration</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="style3.css" rel="stylesheet"/>
</head>
<body>

<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">Cricket Registration Portal</h1>
      <p class="leading-relaxed mt-4">Register fast as vacancies fill up u may not be able to register later.</p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5">Cricket Registration</h2>
      <form action="crick_reg.php" method="post">
      <!-- <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Name</label>
        <input type="text" id="full-name" name="name" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div> -->
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Email-ID</label>
        <input type="email" id="email" name="email" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Team Name</label>
        <input type="text" id="full-name" name="tname" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">You are a :</label>
        <input type="text" id="full-name" name="position" placeholder="Batsman or Bowler or Wicketkeeper or All-rounder" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Register</button>
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
// $name= filter_input(INPUT_POST, 'name');
$email= filter_input(INPUT_POST, 'email');
$tname= filter_input(INPUT_POST, 'tname');
$pos= filter_input(INPUT_POST, 'position');

if($tname==$_SESSION['tname_a'] || $tname==$_SESSION['tname_b'])
{
  $flag=true;
}
else{
  $flag=false;
}

$position=array('All-rounder','Bowler','Batsman','Wicketkeeper');
for($i=0;$i<=3;$i++)
{
  if($pos==$position[$i])
  {
    $flag2=true;
    break;
  }
  else{
    $flag2=false;
  }
}
$event_exist_id= $_SESSION['event_id'];
$tname_a=$_SESSION['tname_a'];
$tname_b=$_SESSION['tname_b'];
$max_a= $_SESSION['no_play_a'];
$max_b= $_SESSION['no_play_b'];
$real_name=$_SESSION['player_name'];

$sql1="SELECT * FROM cricket_reg WHERE team_name='$tname_a'";
$result=$conn1->query($sql1);

if ($result->num_rows > 0)
{
  if(mysqli_num_rows($result)<=(int)($max_a))
  {
    $flag3=true;
  }
  else{
    $flag3=false;
  }
}

$sql1="SELECT * FROM cricket_reg WHERE team_name='$tname_b'";
$result=$conn1->query($sql1);
if ($result->num_rows > 0)
{
  if(mysqli_num_rows($result)<=(int)($max_b))
  {
    $flag4=true;
  }
  else{
    $flag4=false;
  }
}

if( !empty($email) && !empty($tname) && !empty($pos))
{
   if($flag==true)
   {
       if($flag2==true)
       { 


          if($flag3==true && $flag4==true)
          {
          $sql= " UPDATE cricket_reg 
                  SET   email='$email',
                        team_name='$tname',
                        pos='$pos'
                  WHERE event_id= '$event_exist_id' AND player_name='$real_name'";

          if($conn1->query($sql))
          {
            echo"Registered Successfully";
            
          }
          else{
            echo"Insertion Error";
          }
       }

       if($flag3==true && $flag4==false)
          {
            if($tname!=$tname_b)
          {
            $sql= " UPDATE cricket_reg 
            SET   email='$email',
                  team_name='$tname',
                  pos='$pos'
            WHERE event_id= '$event_exist_id' AND player_name='$real_name'";

          if($conn1->query($sql))
          {
            echo"Registered Successfully";
            
          }
          else{
            echo"Insertion Error";
          }
        }
        else{
          echo '<script>alert("no vacancies for the team you selected")</script>';
        }
       }

       if($flag3==false && $flag4==true)
          {
            if($tname!=$tname_a)
            {
              $sql= " UPDATE cricket_reg 
              SET   email='$email',
                    team_name='$tname',
                    pos='$pos'
              WHERE event_id= '$event_exist_id' AND player_name='$real_name'";

          if($conn1->query($sql))
          {
            echo"Registered Successfully";
            
          }
          else{
            echo"Insertion Error";
          }
        }
        else{
          echo '<script>alert("no vacancies for the team you selected")</script>';
        }
       }

       if($flag3==false && $flag4==false)
          {
            echo '<script>alert("all the teams are full")</script>';
       }

       }
       else{
        echo '<script>alert("position has to be either All-rounder,Bowler,Batsman or Wicketkeeper")</script>';
       }

   }
   else{
    echo "<script>alert('the team name does not exist for this event ')</script>";
   }



}
else{
  echo '<script>alert("fill all the fields")</script>';
}

?>
