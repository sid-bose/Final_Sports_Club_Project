<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCarrom Player Details</title>
</head>
<body>
    
    <form action="football_play_details.php" method="post">
    <p>Team A Name</p>
    <input type="text" name="a_name">
    <p>Team B Name</p>
    <input type="text" name="b_name">
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

$namea= filter_input(INPUT_POST, 'a_name');
$nameb=filter_input(INPUT_POST, 'b_name');


$conn1= mysqli_connect("localhost", "root", "", "members_reg_event");
 if ($conn1->connect_error) {
    die("Connection failed due to error in code : " . $conn1->connect_error);
    }


session_start();
$existing_id=$_SESSION['event_id'];

// echo $team_name_a;
// echo $team_name_b;
// echo $existing_id;

$sql="SELECT team_name FROM football_reg WHERE event_id='$existing_id'";
$result=$conn1->query($sql);

$flag1=true;
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['team_name']==$namea)
            {
                $flag1=true;
                break;
            }
            else{
                $flag1=false;
                
            }
        }

    }

    $sql="SELECT team_name FROM football_reg WHERE event_id='$existing_id'";
    $result=$conn1->query($sql);
    
    $flag2=true;
    if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                if($row['team_name']==$nameb)
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
            $sql="INSERT INTO football_live (`team_a`, `team_b`) VALUES ('$namea','$nameb')";
            $result=$conn->query($sql);
            if($result)
            {
                 $_SESSION['team_a']=$namea;
                 $_SESSION['team_b']=$nameb;
                 if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION['foot_id']=$row['foot_id'];
            }
    
        }
                 
               
                 echo "<script> window.location.assign('football_match.php'); </script>";
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
        