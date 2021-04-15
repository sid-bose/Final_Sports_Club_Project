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
    $sql2="SELECT match_name FROM match_details";
    $result=$conn->query($sql2);
    ?>
    <h2>Match Name:</h2>
    <?php
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>" . $row["match_name"]. "</td></tr> <br><br>";
    }

}

    $sql1="SELECT inning_num_bat,team_name_bat FROM batting WHERE inning_num_bat=1";
    $result=$conn->query($sql1);
    ?>
    <h3>Inning Number:</h3>
    <?php
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["inning_num_bat"]. "</td> <br><p>Batting Team Name<p><td>" .$row["team_name_bat"].  "</td><br></tr>";
        }

    }
    $sql="SELECT striker_name,striker_runs,striker_fours,striker_sixes FROM batting WHERE inning_num_bat=1";
    $result=$conn->query($sql);
    ?>
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>Striker</th>
            <th>RUNS</th>
            <th>FOURS</th>
            <th>SIXES</th>
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['striker_name'];?></td>
                <td><?php echo $row['striker_runs'];?></td>
                <td><?php echo $row['striker_fours'];?></td>
                <td><?php echo $row['striker_sixes'];?></td>
                
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
    $sql="SELECT nonstriker_name,non_striker_runs,nonstriker_fours,nonstriker_sixes FROM batting WHERE inning_num_bat=1";
    $result=$conn->query($sql);
    ?>
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>NON-Striker</th>
            <th>RUNS</th>
            <th>FOURS</th>
            <th>SIXES</th>
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['nonstriker_name'];?></td>
                <td><?php echo $row['non_striker_runs'];?></td>
                <td><?php echo $row['nonstriker_fours'];?></td>
                <td><?php echo $row['nonstriker_sixes'];?></td>
                
            </tr> 
       <?php     
        }
        
        
    }
    else{
        echo "no matches available";
    }
    ?>
    </table>
    <h2>TOTAL RUNS/WICKETS</h2>
    <?php
      $sql="SELECT total_runs,wickets FROM batting WHERE inning_num_bat=1";
      $result=$conn->query($sql);
      if($result)
      {
      if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $prev_runs=$row['total_runs'];
            echo "<tr><td>" . $row["total_runs"]. "</td>/<td>" . $row["wickets"] . "</td><td>";
        }
    }
}
 $sql="SELECT bow_name,over_num,ball_num  FROM bowling WHERE inning_num_ball=1";
$result=$conn->query($sql);
?>
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>BOWLER</th>
            <th>OVER</th>
            <th>Balls</th>
            
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['bow_name'];?></td>
                <td><?php echo $row['over_num'];?></td>
                <td><?php echo $row['ball_num'];?></td>
                
                
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
$sql="SELECT * FROM batting";
$result=$conn->query($sql);
if($result)
{
    if(mysqli_num_rows($result)>1)
    {
        
    $sql1="SELECT inning_num_bat,team_name_bat FROM batting WHERE inning_num_bat=2";
    $result=$conn->query($sql1);
    ?>
    <h3>Inning Number:</h3>
    <?php
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["inning_num_bat"]. "</td> <br><p>Batting Team Name<p><td>" .$row["team_name_bat"].  "</td><br></tr>";
        }

    }
    $sql="SELECT striker_name,striker_runs,striker_fours,striker_sixes FROM batting WHERE inning_num_bat=2";
    $result=$conn->query($sql);
    ?>
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>Striker</th>
            <th>RUNS</th>
            <th>FOURS</th>
            <th>SIXES</th>
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['striker_name'];?></td>
                <td><?php echo $row['striker_runs'];?></td>
                <td><?php echo $row['striker_fours'];?></td>
                <td><?php echo $row['striker_sixes'];?></td>
                
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
    $sql="SELECT nonstriker_name,non_striker_runs,nonstriker_fours,nonstriker_sixes FROM batting WHERE inning_num_bat=2";
    $result=$conn->query($sql);
    ?>
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>NON-Striker</th>
            <th>RUNS</th>
            <th>FOURS</th>
            <th>SIXES</th>
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['nonstriker_name'];?></td>
                <td><?php echo $row['non_striker_runs'];?></td>
                <td><?php echo $row['nonstriker_fours'];?></td>
                <td><?php echo $row['nonstriker_sixes'];?></td>
                
            </tr> 
       <?php     
        }
        
        
    }
    else{
        echo "no matches available";
    }
    ?>
    </table>
    <h2>TOTAL RUNS/WICKETS</h2>
    <?php
      $sql="SELECT total_runs,wickets FROM batting WHERE inning_num_bat=2";
      $result=$conn->query($sql);
      if($result)
      {
      if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {    
            $current_runs=$row['total_runs'];
            echo "<tr><td>" . $row["total_runs"]. "</td>/<td>" . $row["wickets"] . "</td><td>";
        }
    }
}
 $sql="SELECT bow_name,over_num,ball_num  FROM bowling WHERE inning_num_ball=2";
$result=$conn->query($sql);
?>
    <table class="content-table"   border="1px">
        <thead>
           <tr>
            <th>BOWLER</th>
            <th>OVER</th>
            <th>Balls</th>
            
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['bow_name'];?></td>
                <td><?php echo $row['over_num'];?></td>
                <td><?php echo $row['ball_num'];?></td>
                
                
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
    }
}
  $sql1="SELECT flag_win,team_name_bat FROM batting WHERE inning_num_bat=1";
  $result1=$conn->query($sql1);
  $sql2="SELECT flag_win,team_name_bat FROM batting WHERE inning_num_bat=2";
  $result2=$conn->query($sql2);
  if($result1)
  {
    if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            $decider1=$row['flag_win'];
            $team1=$row['team_name_bat'];
        }
    }

  }
  if($result2)
  {
    if ($result2->num_rows > 0) 
    {
        while($row = $result2->fetch_assoc())
        {
            $decider2=$row['flag_win'];
            $team2=$row['team_name_bat'];
        }
    }

  }
  if($decider1==1 && $decider2==0)
  {
      
      echo"<h1>TEAM $team1 has Won<h1>";
  }
  if($decider1==0 && $decider2==1)
  {
      
      echo"<h1>TEAM $team2 has Won<h1>";
  }



    ?>






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
