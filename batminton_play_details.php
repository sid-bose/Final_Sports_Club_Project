<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batminton Player Details</title>
</head>
<body>
    
    <form action="batminton_play_details.php" method="post">
    <p>Player 1 Name</p>
    <input type="text" name="1_name">
    <p>Player 2 Name</p>
    <input type="text" name="2_name">
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

$name1= filter_input(INPUT_POST, '1_name');
$name2=filter_input(INPUT_POST, '2_name');


$conn1= mysqli_connect("localhost", "root", "", "members_reg_event");
 if ($conn1->connect_error) {
    die("Connection failed due to error in code : " . $conn1->connect_error);
    }


session_start();
$existing_id=$_SESSION['event_id'];

// echo $team_name_a;
// echo $team_name_b;
// echo $existing_id;

$sql="SELECT player_name FROM batminton_reg WHERE event_id='$existing_id'";
$result=$conn1->query($sql);

$flag1=true;
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['player_name']==$name1)
            {
                $flag1=true;
                break;
            }
            else{
                $flag1=false;
                
            }
        }

    }

    $sql="SELECT player_name FROM batminton_reg WHERE event_id='$existing_id'";
    $result=$conn1->query($sql);
    
    $flag2=true;
    if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                if($row['player_name']==$name2)
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
            $sql="INSERT INTO batminton_live (`player_1`, `player_2`) VALUES ('$name1','$name2')";
            $result=$conn->query($sql);
            if($result)
            {
                 $_SESSION['player_1']=$name1;
                 $_SESSION['player_2']=$name2;
                 
                 if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION['batmin_id']=$row['batmin_id'];
            }
    
        }
                 
               
                 echo "<script> window.location.assign('batminton_match.php'); </script>";
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
        