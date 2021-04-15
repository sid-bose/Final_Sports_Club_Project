<?php
$conn = mysqli_connect("localhost", "root", "", "registration");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
    session_start();
    $sql="SELECT * from registration_details";
    $result=$conn->query($sql);

$conn2= mysqli_connect("localhost", "root", "", "event_register");
if ($conn2->connect_error) {
    die("Connection failed due to error in code : " . $conn2->connect_error);
    }
    
    $sql2="SELECT * from mem_reg";
    $result2=$conn2->query($sql2);
      ?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Your Dashboard</title>
    <link rel="stylesheet" href="style3.css"/>
</head>
<body>
    <h1>Sports you have Selected</h1>
    <table class="content-table">
    <thead>
           <tr>
            <th>Sports1</th>
            <th>Sports2</th>
            <th>Sports3</th>
            <!-- <th>Date</th>
            <th>Time</th>
            <th>Description</th> -->
          </tr>
        </thead>
    
<?php
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['username']==$_SESSION['username'])
            {
                $name_real=$row['Name'];
    ?>
              <tr>
                <td><?php echo $row['sports1'];?></td>
                <td><?php echo $row['sports2'];?></td>
                <td><?php echo $row['sports3'];?></td>
                
            </tr> 
    <?php
            }

        }
    }
   ?>
   </table>

   <h1>See the events you have registered in</h1>
   <table class="content-table">
    <thead>
           <tr>
            <th>Events Registered</th>
            <!-- <th>Sports2</th>
            <th>Sports3</th> -->
            <!-- <th>Date</th>
            <th>Time</th>
            <th>Description</th> -->
          </tr>
        </thead>
    
<?php
   // echo $name_real;
    if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc())
        {
            if($row['name']==$name_real)
            {
    ?>
              <tr>
                <td><?php echo $row['sports_type'];?></td>  
                
            </tr> 
    <?php
            }

        }
    }
   ?>
   </table>

   <?php

    $conn2->close();
    $conn->close();

?>






    <!-- <p>Sports u have selected <p>
    <p>Tournamnets you have participated</p>
    <p>highest scores</p> -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
</body>
</html>