<!DOCTYPE html>
<html >
<head>
    
    <title>Available live Matches</title>
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

    $conn1 = mysqli_connect("localhost", "root", "", "registration");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

session_start();


$sql = "SELECT * FROM match_details";


$result1= $conn->query($sql);//for singles


?>
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">SEE THE ON-GOING MATCHES</h1>
      
    </div>
    <!--for cricket-->
    <h2>Matches directed by Cricket Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Event-ID</th>
            <th>Match Name</th>
          
          </tr>
        </thead>
    
    <?php
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Cricket")
            {
            
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
                
            </tr> 
          
        <?php
      }
    }

    }
    else{
        echo "no matches available";
    }
    ?>
    </table>
   <form action="display_stats.php " method="post">
            <button>SEE LIVE</button>
    </form>

<!--for football-->
<h2>Matches directed by Football Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Event-ID</th>
            <th>Match Name</th>
          
          </tr>
        </thead>
    
    <?php
    $sql = "SELECT * FROM match_details";


    $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Football")
            {
                
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
                
            </tr> 
          
        <?php
      }
    }

    }
    else{
        echo "no matches available";
    }
    
    ?>
    </table>
   <form action="see_live_football.php " method="post">
            <button>SEE LIVE</button>
    </form>

<!--for carrom-->
<h2>Matches directed by Carrom Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Event-ID</th>
            <th>Match Name</th>
          
          </tr>
        </thead>
    
    <?php
    $sql = "SELECT * FROM match_details";

    $num_carrom='none';
    $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Carrom")
            {
                $num_carrom=$row['sports_name'];
            
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
                
            </tr> 
          
        <?php
      }
    }

    }
    else{
        echo "no matches available";
    }
    $_SESSION['sports_name']=$num_carrom;
    ?>
    </table>
   <form action="see_live_carrom.php " method="post">
            <button>SEE LIVE</button>
    </form>

<!--for volleyball-->
<h2>Matches directed by Volleyball Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Event-ID</th>
            <th>Match Name</th>
          
          </tr>
        </thead>
    
    <?php
    $sql = "SELECT * FROM match_details";


    $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Volleyball")
            {
            
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
                
            </tr> 
          
        <?php
      }
    }

    }
    else{
        echo "no matches available";
    }
    ?>
    </table>
   <form action="see_live_voll.php " method="post">
            <button>SEE LIVE</button>
    </form>

<!--for carrom-->
<h2>Matches directed by Batminton Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Event-ID</th>
            <th>Match Name</th>
          
          </tr>
        </thead>
    
    <?php
    $sql = "SELECT * FROM match_details";

    $num_carrom='none';
    $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Batminton")
            {
                
            
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
                
            </tr> 
          
        <?php
      }
    }

    }
    else{
        echo "no matches available";
    }
    
    ?>
    </table>
   <form action="see_live_batminton.php " method="post">
            <button>SEE LIVE</button>
    </form>

    h2>Matches directed by Table-tennis Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Event-ID</th>
            <th>Match Name</th>
          
          </tr>
        </thead>
    
    <?php
    $sql = "SELECT * FROM match_details";

    $num_carrom='none';
    $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Table-tennis")
            {
                
            
 ?>         
            <tr>
                <td><?php echo $row['event_id'];?></td>
                <td><?php echo $row['match_name'];?></td>
                
            </tr> 
          
        <?php
      }
    }

    }
    else{
        echo "no matches available";
    }
    
    ?>
    </table>
   <form action="see_live_tt.php " method="post">
            <button>SEE LIVE</button>
    </form>

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