<?php
session_start();
$conn= mysqli_connect("localhost", "root", "", "match");
 if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

$sql="DELETE FROM football_live";
$result=$conn->query($sql);
if($result)
{
    session_destroy();
    echo "<script> window.location.assign('coord_login.php'); </script>";
}
else{
    echo"could not end the match";
}




?>