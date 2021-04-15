<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>live Match</title>
</head>
<body>
    <h1>Ball by ball update</h1>
    <form action="carrom_s_match.php" method="post">
    <p>Score1</p>
    <input type="text" name="score_1">
    <p>Score2</p>
    <input type="text" name="score_2">
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
        $score_1= filter_input(INPUT_POST, 'score_1');
        $score_2 = filter_input(INPUT_POST, 'score_2');
        $X1=0;

        $sql="SELECT * FROM carrom_live";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['score_1']=$row['score_1'];
                   
               }
       
           }
   
        }
        $sql="SELECT * FROM carrom_live";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['score_2']=$row['score_2'];
                   
               }
       
           }
   
        }
        $sql="SELECT * FROM carrom_live";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION['car_id']=$row['car_id'];
            }
    
        }

        function update_scores($x1,$x2){
             $num1=$_SESSION['score_1'];
             $num2=$_SESSION['score_2'];
             $num1=$num1+$x1;
             $num2=$num2+$x2;
             $car_id=$_SESSION['car_id'];

             $sql1="UPDATE carrom_live
                SET score_1=$num1,
                    score_2=$num2
                WHERE car_id=$car_id";

$result=$GLOBALS['conn']->query($sql1);
if($result)
{
    echo"scores updated<br>";
}
else{
    echo"scores not updated";
    $num1=$num1-$x1;
    $num2=$num2-$x2;
}

        }

        update_scores($score_1,$score_2);
        ?>
        <form action="end_live_car.php" method="post">
        <button>END LIVE</button>
        </form>

<?php



        
?>