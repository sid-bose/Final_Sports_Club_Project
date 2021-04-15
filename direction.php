<!DOCTYPE html>
<html >
<head>
    
    <title>Direct the Matches</title>
    <link href="style3.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <!-- <link href="style.css" rel="stylesheet"/> -->
</head>
<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "match");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1 = mysqli_connect("localhost", "root", "", "co-ordinator");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

session_start();


$sql = "SELECT * FROM match_details";
$sql1="SELECT coord_name FROM match_details";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
?>
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Direct the Matches</h1>
      
    </div>
    <?php

      if($result1)
      {
        if ($result1->num_rows > 0) 
        {
            while($row1 = $result1->fetch_assoc())
            {
                  if($row1['coord_name']==$_SESSION['Name'])
                  {

    ?>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Event_id</th>
            <th>Match_Event</th>
            
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
          if($row['coord_name']==$_SESSION['Name'])
                  {
                    $_SESSION['coord_name']=$row['coord_name'];

 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
            
                
            </tr> 
       <?php   
                  }  
        }
        echo"<a href='direct_verify.php'>Click here to direct any match<a>";
        
    }
    else{
        echo "no matches available";
    }
    ?>
    </table>
    <?php
                  }
                }
        }
      }
    ?>
    <?php
    
$conn->close();
$conn1->close();
?>
    <!-- <form action="tour_reg_m.php" method="post">
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">REGISTER FOR ANY EVENT
    </form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button> -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>