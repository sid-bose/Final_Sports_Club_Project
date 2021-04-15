<?php
$conn = mysqli_connect("localhost", "root", "", "co-ordinator");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }


$sql = "SELECT * FROM coordinator_reg";
$result = $conn->query($sql);
if($result)
{
$rows=mysqli_num_rows($result);
}
if ($rows)
{
   printf("Number of row in the table : " . $rows);
}
if($rows<=6)
{
    echo"<p>you are eligible<p>";
    echo"<a href='coordinator_reg.php'>Click here to Register as Co-ordinator<a>";
}
else{
    echo"<p>Sorry there are no vacaciens right now<p>";
}


$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>application.php</title>
</head>
<body>
<h1>Checking whether u can be a coordinator or not</h1>
<h2>Click on the bellow button to know whether u can be a coordinator or not<h2>
<form action="application.php" method="post">
<p>Click to apply</p>
<input type="submit" value="APPLY"/>
</form>

    
</body>
</html>

