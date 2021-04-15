<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>For deletetion Pupose</h1>
    <form action="delete_match.php" method="post">
    <p>Sports Name</p>
    <input type="text" name="sports_type">
    <input type="submit" value="delete">
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
    session_start();
    

$sports_name=filter_input(INPUT_POST, 'sports_type');
$sql="SELECT * from match_details";
$result=$conn->query($sql);

if($_SESSION['sports_name']==$sports_name)
{
    $sql="DELETE FROM match_details WHERE sports_name='$sports_name'";
    if($conn->query($sql))
    {
        echo"succesfully deleted";
        echo"<a href='match_creation.php'>Click here to go back<a>";
    }
    else{
        echo"query deleion_error";
    }
}

$conn->close();




?>