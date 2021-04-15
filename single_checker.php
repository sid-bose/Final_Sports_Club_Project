<?php
$conn = mysqli_connect("localhost", "root", "", "co-ordinator");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
    session_start();

    $sql="SELECT Name ,username ,sports from coordinator_reg";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['username']==$_SESSION['username'])
            {
                $sports_type= $row["sports"];
                break;
            }

        }
    }
    echo"<br/>";

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check</title>
</head>
<body>
    <h1>Click on the button to check whether u can create singles match or not?</h1>
    <form action="single_checker.php" method="post">
     <button>Check</button>
    </form>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php
if($result)
{
if($sports_type=='Cricket' || $sports_type=='Football' ||  $sports_type=='Volleyball')
{
    echo"you cannot create singles for $sports_type";
}
else{
    echo"<script> window.location.assign('single_creator.php'); </script>";
}
}

?>