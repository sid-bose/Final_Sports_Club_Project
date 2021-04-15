<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batter Details</title>
</head>
<body>
    
    <form action="batter_details_b.php" method="post">
    <p>Striker Name</p>
    <input type="text" name="striker_name">
    <p>Non-striker Name</p>
    <input type="text" name="non_striker_name">
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

$striker_name= filter_input(INPUT_POST, 'striker_name');
$non_striker_name=filter_input(INPUT_POST, 'non_striker_name');
$inning_num= filter_input(INPUT_POST, 'inning_num');

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

$sql="SELECT team_b FROM toss_details";
$result=$conn2->query($sql);
$team_name_a='none';
$team_name_b='none';
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
// echo $team_name_a;
// echo $team_name_b;
// echo $existing_id;
echo"<h1>Batting details for TEAM $team_name_b</h1>";
$sql="SELECT player_name FROM cricket_reg WHERE event_id='$existing_id' AND team_name='$team_name_b'";
$result=$conn1->query($sql);

$flag1=true;
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['player_name']==$striker_name)
            {
                $flag1=true;
                break;
            }
            else{
                $flag1=false;
                
            }
        }

    }

    $sql="SELECT player_name FROM cricket_reg WHERE event_id='$existing_id' AND team_name='$team_name_b'";
    $result=$conn1->query($sql);
    
    $flag2=true;
    if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                if($row['player_name']==$non_striker_name)
                {
                    $flag2=true;
                    break;
                }
                else{
                    $flag2=false;
                    
                }
            }
    
        }


        if($flag1==true && $flag2==true)
        {
            $sql="INSERT INTO batting (`striker_name`, `nonstriker_name`, `team_name_bat`,`inning_num_bat`) VALUES ('$striker_name','$non_striker_name','$team_name_b','$inning_num')";
            $result=$conn->query($sql);
            if($result)
            {
                 $_SESSION['striker_name']=$striker_name;
                 $_SESSION['nonstriker_name']=$non_striker_name;
                 $_SESSION['inning_num_bat']=$inning_num;
                 $_SESSION['team_name_bat']=$team_name_b;
                 echo "<script> window.location.assign('bowling_details_a.php'); </script>";
            }
            else{
                echo"insertion error";
            }
        }
        else{
            echo"names not correct";
        }

        $conn->close();
        $conn1->close();
        $conn2->close();
?>



