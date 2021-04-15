<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Live stats</title>
</head>
<body>
    <h1>SEE Live Score</h1>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "match");

    if ($conn->connect_error) {
        die("Connection failed due to error in code : " . $conn->connect_error);
        }
    session_start();
    $sql2="SELECT match_name,sports_name FROM match_details";
    $result=$conn->query($sql2);
    ?>
    
    <?php


    $sql1="SELECT player_1,score_1 FROM batminton_live";
    $result=$conn->query($sql1);
    ?>
    
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>Player_1_Name</th>
            <th>Score</th>
            
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['player_1'];?></td>
                <td><?php echo $row['score_1'];?></td>
                
                
            </tr> 
       <?php     
        }
        
        
    }
    else{
        echo "no matches available";
    }
    ?>
    </table>
    <?php
    $sql1="SELECT player_2,score_2 FROM batminton_live";
    $result=$conn->query($sql1);
    ?>
    
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>Player_2_Name</th>
            <th>Score</th>
            
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['player_2'];?></td>
                <td><?php echo $row['score_2'];?></td>
                
                
            </tr> 
       <?php     
        }
        
        
    }
    else{
        echo "no matches available";
    }
    ?>
    </table>

    <?php

$conn->close();
?>
 <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>