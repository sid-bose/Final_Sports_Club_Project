<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>live Match</title>
</head>
<body>
    <h1>Goal update</h1>
    <form action="voll_match.php" method="post">
    <p>SCORE A</p>
    <input type="text" name="goal_a">
    <p>SCORE B</p>
    <input type="text" name="goal_b">
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
$conn = mysqli_connect("localhost", "root", "", "match");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
    // $conn1 = mysqli_connect("localhost", "root", "", "toss");

    // if ($conn1->connect_error) {
    //     die("Connection failed due to error in code : " . $conn1->connect_error);
    //     }
        $goal_a= filter_input(INPUT_POST, 'goal_a');
        $goal_b = filter_input(INPUT_POST, 'goal_b');
        $X1=0;

        $sql="SELECT * FROM voll_live";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['goal_a']=$row['goal_a'];
                   
               }
       
           }
   
        }
        $sql="SELECT * FROM voll_live";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['goal_b']=$row['goal_b'];
                   
               }
       
           }
   
        }
        $sql="SELECT * FROM voll_live";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION['voll_id']=$row['voll_id'];
            }
    
        }
        function update_scores($x1,$x2){
             $num1=$_SESSION['goal_a'];
             $num2=$_SESSION['goal_b'];
             $num1=$num1+$x1;
             $num2=$num2+$x2;
             $voll_id=$_SESSION['voll_id'];

             $sql1="UPDATE voll_live
                SET goal_a=$num1,
                    goal_b=$num2
                WHERE voll_id=$voll_id";

$result=$GLOBALS['conn']->query($sql1);
if($result)
{
    echo"goals updated<br>";
}
else{
    echo"goals not updated";
    $num1=$num1-$x1;
    $num2=$num2-$x2;
}

        }

        update_scores($goal_a,$goal_b);
?>
        <form action="end_live_voll.php" method="post">
        <button>END LIVE</button>
        </form>

<?php


        
?>