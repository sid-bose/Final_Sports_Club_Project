<?php
session_start();
$conn= mysqli_connect("localhost", "root", "", "match");
 if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

$sql="DELETE FROM batting";
$result=$conn->query($sql);
$sql="DELETE FROM bowling";
$result1=$conn->query($sql);
if($result && $result1)
{
    session_destroy();
    echo "<script> window.location.assign('coord_login.php'); </script>";
}
else{
    echo"could not end the match";
}




?>