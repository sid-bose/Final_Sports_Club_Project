<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Details</title>
</head>
<body>
   
    <form action="bowling_details_b.php" method="post">
    <p>Bowler Name</p>
    <input type="text" name="bowler">
    <p>Inning Number</p>
    <input type="text" name="inning_num">
    <input type="submit" value="next">
    </form>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
<?php
 $conn= mysqli_connect("localhost", "root", "", "match");
 if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

$bowler_name= filter_input(INPUT_POST, 'bowler');
$inning_num=   filter_input(INPUT_POST, 'inning_num');


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
echo"<h1>Bowling Details of TEAM $team_name_b</h1>";
$sql="SELECT player_name FROM cricket_reg WHERE event_id='$existing_id' AND team_name='$team_name_b'";
$result=$conn1->query($sql);

$flag1=true;

if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['player_name']==$bowler_name)
            {
                $flag1=true;
                break;
            }
            else{
                $flag1=false;
                
            }
        }

    }

    

        if($_SESSION['inning_num_bat']==$inning_num)
        {
        if($flag1==true)
        {
            $sql="INSERT INTO bowling (`bow_name`,`team_name_ball`,`inning_num_ball`) VALUES ('$bowler_name','$team_name_b','$inning_num')";
            $result=$conn->query($sql);
            if($result)
            {
                $_SESSION['bow_name']=$bowler_name;
                $_SESSION['team_name_ball']=$team_name_b;
                
                echo "<script> window.location.assign('ball_by_ball.php'); </script>";
            }
            else{
                echo"insertion error";
            }
        }
        else{
            echo"name is not correct";
        }
    }
    else{
        echo"inning numbers do not match";
    }
        $conn->close();
        $conn1->close();
        $conn2->close();
?>