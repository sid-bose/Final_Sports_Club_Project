<!DOCTYPE html>
<html>
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new Bowler</title>
</head>
<body>
    <h1>Add a new striker</h1>
    <form action="change_bowler_b.php" method="post">
     <p>Select new bowler</p>
     <input type="text" name="new_bowler">
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

        $new_bowler= filter_input(INPUT_POST, 'new_bowler');


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
        $ball_id=$_SESSION['ball_id'];
        $team_name_ball=$_SESSION['team_name_ball'];
        
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
                    if($row['player_name']==$new_bowler)
                    {
                        $flag1=true;
                        break;
                    }
                    else{
                        $flag1=false;
                        
                    }
                }
        
            }
        
            
        
        
                if($flag1==true)
                {
                   $sql="UPDATE bowling
                         SET  bow_name='$new_bowler'
                        WHERE ball_id=$ball_id AND team_name_ball='$team_name_ball'";
                    $result=$conn->query($sql);
                    if($result)
                    {
                        echo"new bowler added";
                        echo"<a href='ball_by_ball.php'>Click here to direct<a>";
                    }
                    else{
                        echo"could not add new bowler";
                    }
                }
                else{
                    echo"This name does not exist in the list of registered players";
                }


?>