<!DOCTYPE html>
<html >
<head>
    
    <title>Available tournaments</title>
    <link href="style3.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <!-- <link href="style.css" rel="stylesheet"/> -->
</head>
<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "event_create");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1 = mysqli_connect("localhost", "root", "", "registration");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

session_start();


$sql = "SELECT * FROM single_creator";
$sql2="SELECT * FROM double_creator";

$result1= $conn->query($sql);//for singles
$result2=$conn->query($sql2);//for doubles

?>
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">SEE THE AVAILABLE EVENTS</h1>
      
    </div>
    <!--for cricket-->
    <h2>Events created by Cricket Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Team A Name</th>
            <th>Team B Name</th>
            <th>Total players in team A</th>
            <th>Total players in team B</th>
            <th>Match Description</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc())
        {
            if($row['sports_name']=="Cricket" && $row['flag_var']=='1')
            {
            
 ?>         
            <tr>
                <td><?php echo $row['sports_date'];?></td>
                <td><?php echo $row['sports_time'];?></td>
                <td><?php echo $row['tname_a'];?></td>
                <td><?php echo $row['tname_b'];?></td>
                <td><?php echo $row['no_play_a'];?></td>
                <td><?php echo $row['no_play_b'];?></td>
                <td><?php echo $row['desc_event'];?></td>
                <td><?php echo $row['id'];?></td>
            </tr> 
          
        <?php
      }
    }
    ?>
    <form action="crick_reg_1.php " method="post">
            <button>Register</button>
    </form>
    <?php
    }
    else{
        echo "no events available";
    }
    ?>
    </table>
  

<!--for football-->
<h2>Events created by Football Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Team A Name</th>
            <th>Team B Name</th>
            <th>Total players in team A</th>
            <th>Total players in team B</th>
            <th>Match Description</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
    $sql2="SELECT * FROM double_creator";
    $result2=$conn->query($sql2);
if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc())
        {
            if($row['sports_name']=="Football" && $row['flag_var']=='1')
            {
            
 ?>         
            <tr>
                <td><?php echo $row['sports_date'];?></td>
                <td><?php echo $row['sports_time'];?></td>
                <td><?php echo $row['tname_a'];?></td>
                <td><?php echo $row['tname_b'];?></td>
                <td><?php echo $row['no_play_a'];?></td>
                <td><?php echo $row['no_play_b'];?></td>
                <td><?php echo $row['desc_event'];?></td>
                <td><?php echo $row['id'];?></td>
            </tr> 
          
        <?php
      }
      
    }
    ?>
    <form action="foot_reg_1.php " method="post">
            <button>Register</button>
    </form>
    <?php
    }
    else{
        echo "no events available";
    }
    ?>
    </table>
   
    
    <!--for volleyball-->
<h2>Events created by Volleyball Co-ordinator</h2>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Team A Name</th>
            <th>Team B Name</th>
            <th>Total players in team A</th>
            <th>Total players in team B</th>
            <th>Match Description</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
    $sql2="SELECT * FROM double_creator";
    $result2=$conn->query($sql2);
if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc())
        {
            if($row['sports_name']=="Volleyball" && $row['flag_var']=='1')
            {
            
 ?>         
            <tr>
                <td><?php echo $row['sports_date'];?></td>
                <td><?php echo $row['sports_time'];?></td>
                <td><?php echo $row['tname_a'];?></td>
                <td><?php echo $row['tname_b'];?></td>
                <td><?php echo $row['no_play_a'];?></td>
                <td><?php echo $row['no_play_b'];?></td>
                <td><?php echo $row['desc_event'];?></td>
                <td><?php echo $row['id'];?></td>
            </tr> 
          
        <?php
      }
      
    }
    ?>
    <form action="voll_reg_1.php " method="post">
            <button>Register</button>
    </form>
    <?php
    }
    else{
        echo "no events available";
    }
    ?>
    </table>
   

    <!--for carrom-->
<h2>Events created by Carrom Co-ordinator</h2>
<h3>For Singles</h3>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Maximum Participant</th>
            <th>Match Description</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Carrom" && $row['flag_var']=='1')
            {
            
 ?>         
            <tr>
                <td><?php echo $row['sports_date'];?></td>
                <td><?php echo $row['sports_time'];?></td>
                <td><?php echo $row['max_parp'];?></td>
                <td><?php echo $row['desc_event'];?></td>
                <td><?php echo $row['id'];?></td>
            </tr> 
          
        <?php
      }
      
    }
    ?>
    <form action="carrom_reg_1_s.php " method="post">
            <button>Register</button>
    </form>
    <?php
    }
    else{
        echo "no events available";
    }
    ?>
   </table>
    

     <!--for table-tennis-->
<h2>Events created by Table-Tennis Co-ordinator</h2>
<h3>For Singles</h3>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Maximum Participant</th>
            <th>Match Description</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
     $sql = "SELECT * FROM single_creator";
     $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Table-tennis" && $row['flag_var']=='1')
            {
            
 ?>         
            <tr>
                <td><?php echo $row['sports_date'];?></td>
                <td><?php echo $row['sports_time'];?></td>
                <td><?php echo $row['max_parp'];?></td>
                <td><?php echo $row['desc_event'];?></td>
                <td><?php echo $row['id'];?></td>
            </tr> 
          
        <?php
      }
      
    }
    ?>
    <form action="tt_reg_1.php " method="post">
            <button>Register</button>
    </form>
    <?php
    }
    else{
        echo "no events available";
    }
    ?>
    </table>
  
    

     <!--for batminton-->
<h2>Events created by Batminton Co-ordinator</h2>
<h3>For Singles</h3>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Maximum Participant</th>
            <th>Match Description</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
     $sql = "SELECT * FROM single_creator";
     $result1= $conn->query($sql);//for singles
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']=="Batminton"  && $row['flag_var']=='1')
            {
            
 ?>         
            <tr>
                <td><?php echo $row['sports_date'];?></td>
                <td><?php echo $row['sports_time'];?></td>
                <td><?php echo $row['max_parp'];?></td>
                <td><?php echo $row['desc_event'];?></td>
                <td><?php echo $row['id'];?></td>
            </tr> 
          
        <?php
      }
      
    }
    ?>
    <form action="batminton_reg_1.php " method="post">
            <button>Register</button>
    </form>
    <?php
    }
    else{
        echo "no events available";
    }
    ?>
    </table>
  
    
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