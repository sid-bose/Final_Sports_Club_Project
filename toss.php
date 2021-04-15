<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toss</title>
</head>
<body>
<h1>Toss Details</h1>
    <form action="toss.php"  method="post">
    <p>Team A Name</p>
    <input type="text" name="team_a">
    <p>Team B Name</p>
    <input type="text" name="team_b">
    <p>Toss A</p>
    <input type="text" name="toss_a">
     <p>Toss B</p>
     <input type="text" name="toss_b">
     <p>Number of Overs</p>
    <input type="text" name="overs">
     <input type="submit" value="Confirm" >
    </form>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "toss");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1= mysqli_connect("localhost", "root", "", "event_create");
    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }
    
        $conn2 = mysqli_connect("localhost", "root", "", "match");

        if ($conn2->connect_error) {
            die("Connection failed due to error in code : " . $conn2->connect_error);
            }
session_start();

    $team_a = filter_input(INPUT_POST, 'team_a');
    $team_b = filter_input(INPUT_POST, 'team_b');
    $toss_a = filter_input(INPUT_POST, 'toss_a');
    $toss_b= filter_input(INPUT_POST, 'toss_b');
    $over= filter_input(INPUT_POST, 'overs');

$event_id=$_SESSION['event_id'];

$sql="SELECT tname_a  FROM double_creator WHERE id='$event_id'";
$result=$conn1->query($sql);
$flag=true;
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['tname_a']==$team_a)
            {
                $flag=true;
                break;
            }
            else{
                $flag=false;
                
            }
        }

    }

    $sql="SELECT tname_b FROM double_creator WHERE id='$event_id'";
    $result=$conn1->query($sql);
    $flag1=true;
    if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                if($row['tname_b']==$team_b)
                {
                    $flag1=true;
                    break;
                }
                else{
                    $flag1=false;
                    
                }
            }
    
        }


if($flag==true && $flag1==true)
{
    $sql1 = "INSERT INTO toss_details (`team_a`, `team_b`, `toss_a`, `toss_b`,`overs`)  
         VALUES ('$team_a','$team_b','$toss_a','$toss_b','$over')";
    $result1=$conn->query($sql1);
    if($result1)
    {
        $_SESSION['overs']=$over;
        $_SESSION['toss_a']=$toss_a;
        $_SESSION['toss_b']=$toss_b;
        if($toss_a=='heads' && $toss_b=='tails')
        {
        echo "<a href='batter_details_a.php'>Click here to start Directing<a>";
        }
        if($toss_a=='tails' && $toss_b=='heads')
        {
            echo "<a href='batter_details_b.php'>Click here to start Directing<a>";
        }
        
    }
    else{
        echo"tossing error";
    }

}
else{
    echo"entered wrong team names";
}

?>
