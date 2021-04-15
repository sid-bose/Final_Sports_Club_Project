<!DOCTYPE html>
<html >
<head>
    
    <title>Available tournaments</title>
    <link href="style3.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <!-- <link href="style.css" rel="stylesheet"/> -->
</head>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "event_create");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1 = mysqli_connect("localhost", "root", "", "co-ordinator");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

session_start();

$sql3="SELECT * FROM coordinator_reg";
$sql = "SELECT * FROM single_creator";
$sql2="SELECT * FROM double_creator";

$result1= $conn->query($sql);//for singles
$result2=$conn->query($sql2);//for doubles
$result=$conn1->query($sql3);

if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['username']==$_SESSION['username'])
            {
               $coord_type=$row['sports'];
            }
        }
    }
?>
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">SEE THE APPROVED EVENTS</h1>
      
    </div>

<?php
if($coord_type=='Carrom' ||  $coord_type=='Table-tennis' ||  $coord_type=='Batminton')
{
?>
<h3>For Singles</h3>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>Date of Sports</th>
            <th>Time of Sports</th>
            <th>Match Description</th>
            <th>Maximum Participants</th>
            <th>Event ID</th>
          </tr>
        </thead>
    
    <?php
if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            if($row['sports_name']==$coord_type && $row['flag_var']=='1')
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

    }
    else{
        echo "no events available";
    }
    ?>
    </table>
   <?php
}
?>
    <h3>For Doubles</h3>
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
            if($row['sports_name']==$coord_type && $row['flag_var']=='1')
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

    }
    else{
        echo "no events available";
    }
    ?>
    </table>
   
<?php
$conn1->close();
$conn->close();

?>
</body>
</html>