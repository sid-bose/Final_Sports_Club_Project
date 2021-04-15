<!DOCTYPE html>
<html>
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new player</title>
</head>
<body>
    <h1>Add a new striker</h1>
    <form action="new_player_b.php" method="post">
     <p>Select new player</p>
     <input type="text" name="new_player">
     <input type="submit" value="comfirm">
    </form>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</body>
</html>
<?php

$conn = mysqli_connect("localhost", "root", "", "match");

    if ($conn->connect_error) {
        die("Connection failed due to error in code : " . $conn->connect_error);
        }

        $new_player= filter_input(INPUT_POST, 'new_player');


        $conn1= mysqli_connect("localhost", "root", "", "members_reg_event");
         if ($conn1->connect_error) {
            die("Connection failed due to error in code : " . $conn1->connect_error);
            }
        
            $conn2= mysqli_connect("localhost", "root", "", "toss");
            if ($conn2->connect_error) {
               die("Connection failed due to error in code : " . $conn2->connect_error);
               }
        session_start();
        $existing_id=$_SESSION['event_id'];
        $bat_id=$_SESSION['bat_id'];
        
        $sql="SELECT  team_b FROM toss_details";
        $result=$conn2->query($sql);
        
        if($result)
        {
        if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                    
                    $team_name_b=$row['team_b'];
                }
        
            }
        
        }
        
        $sql="SELECT player_name FROM cricket_reg WHERE event_id='$existing_id' AND team_name='$team_name_b'";
        $result=$conn1->query($sql);
        
        $flag1=true;
        
        if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc())
                {
                    if($row['player_name']==$new_player)
                    {
                        $flag1=true;
                        break;
                    }
                    else{
                        $flag1=false;
                        
                    }
                }
        
            }
        
            
        
                $team_name_bat=$_SESSION['team_name_bat'];
                if($flag1==true)
                {
                   $sql="UPDATE batting
                         SET  striker_name='$new_player',
                              striker_runs=0,
                              striker_fours=0,
                              striker_sixes=0
                        WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";
                    $result=$conn->query($sql);
                    if($result)
                    {
                        echo"new player added";
                        echo"<a href='ball_by_ball.php'>Click here to direct<a>";
                    }
                    else{
                        echo"could not add new player";
                    }
                }
                else{
                    echo"This name does not exist in the list of registered players";
                }


?>