<?php
// $real_ball_num=0;
// $real_over_num=0;
// $real_striker_runs=0;
// $real_striker_four=0;
// $real_striker_six=0;
// $GLOBALS['real_ball_num'];
// $GLOBALS['real_over_num'];
// $GLOBALS['real_striker_runs'];
// $GLOBALS['real_striker_four'];
// $GLOBALS['real_striker_six'];
?>

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
    <form action="ball_by_ball.php" method="post">
    <p>Runs</p>
    <input type="text" name="runs">
    <p>Type of run</p>
    <input type="text" name="run_type">
    <p>Out or Not-Out</p>
    <input type="text" name="out_not">
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
        $conn1 = mysqli_connect("localhost", "root", "", "toss");

        if ($conn1->connect_error) {
            die("Connection failed due to error in code : " . $conn1->connect_error);
            }
            $run = filter_input(INPUT_POST, 'runs');
            $run_type = filter_input(INPUT_POST, 'run_type');
            $o_no = filter_input(INPUT_POST, 'out_not');

            session_start();
            // $baller=$_SESSION['bow_name'];
            // $batsmanA=$_SESSION['striker_name'];
            // $batsmanB=$_SESSION['nonstriker_name'];
            
        $X1=0;
        
        $flag=true;
        $array_type=array('Batted','Six','Four');
        $count=count($array_type);
        for($i=0;$i<$count;$i++)
        {
            if($array_type[$i]==$run_type)
            {
               $flag=true;
               break;
            }
            else{
                $flag=false;
            }
        }
        $sql="SELECT * FROM bowling";
        $result=$conn->query($sql);
        $flag2=true;
        
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['ball_num']=$row['ball_num'];
             
               }
       
           }
   
        }
        
        $sql="SELECT * FROM bowling";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['over_num']=$row['over_num'];
                  
               }
       
           }
   
        }


        $sql="SELECT * FROM bowling";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['ball_id']=$row['ball_id'];
                   
               }
       
           }
   
        }
        $sql="SELECT * FROM batting";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['bat_id']=$row['bat_id'];
                   
               }
       
           }
   
        }


        $sql="SELECT * FROM batting";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['striker_runs']=$row['striker_runs'];
                   $X1=$_SESSION['striker_runs'];
               }
       
           }
   
        }
   
        $sql="SELECT * FROM batting";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['non_striker_runs']=$row['non_striker_runs'];
                   $X2= $_SESSION['non_striker_runs'];
               }
       
           }
   
        }
   
        $sql="SELECT * FROM batting";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['striker_fours']=$row['striker_fours'];
               }
       
           }
   
        }
        $sql="SELECT * FROM batting";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['striker_sixes']=$row['striker_sixes'];
               }
       
           }
   
        }
        $sql="SELECT * FROM batting";
        $result=$conn->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['bat_id']=$row['bat_id'];
               }
       
           }
   
        }

        $sql="SELECT * FROM batting";
        $result=$GLOBALS['conn']->query($sql);
        if($result)
        {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['striker_name']=$row['striker_name'];
               }
       
           }
        }
   
        $sql="SELECT * FROM batting";
        $result=$GLOBALS['conn']->query($sql);
        if($result)
       {
           if ($result->num_rows > 0) 
           {
               while($row = $result->fetch_assoc())
               {
                   $_SESSION['nonstriker_name']=$row['nonstriker_name'];
               }
       
           }
   
       }
   
       $sql="SELECT * FROM batting";
       $result=$GLOBALS['conn']->query($sql);
       if($result)
      {
          if ($result->num_rows > 0) 
          {
              while($row = $result->fetch_assoc())
              {
                  $_SESSION['striker_fours']=$row['striker_fours'];
              }
      
          }
   
      }
   
      $sql="SELECT * FROM batting";
      $result=$GLOBALS['conn']->query($sql);
      if($result)
     {
         if ($result->num_rows > 0) 
         {
             while($row = $result->fetch_assoc())
             {
                 $_SESSION['nonstriker_fours']=$row['nonstriker_fours'];
             }
     
         }
   
     }
   
     $sql="SELECT * FROM batting";
     $result=$GLOBALS['conn']->query($sql);
     if($result)
    {
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION['striker_sixes']=$row['striker_sixes'];
            }
    
        }
   
    }
   
    $sql="SELECT * FROM batting";
    $result=$GLOBALS['conn']->query($sql);
    if($result)
   {
       if ($result->num_rows > 0) 
       {
           while($row = $result->fetch_assoc())
           {
               $_SESSION['nonstriker_sixes']=$row['nonstriker_sixes'];
           }
   
       }
   
   }

   $sql="SELECT * FROM batting";
    $result=$GLOBALS['conn']->query($sql);
    if($result)
   {
       if ($result->num_rows > 0) 
       {
           while($row = $result->fetch_assoc())
           {
               $_SESSION['total_runs']=$row['total_runs'];
           }
   
       }
   
   }
   $sql="SELECT * FROM batting";
   $result=$GLOBALS['conn']->query($sql);
   if($result)
  {
      if ($result->num_rows > 0) 
      {
          while($row = $result->fetch_assoc())
          {
              $_SESSION['wickets']=$row['wickets'];
          }
  
      }
  
  }
$total_runs_prev=0;
 $sql="SELECT total_runs FROM batting WHERE inning_num_bat=1";
 $result=$GLOBALS['conn']->query($sql);
    if($result)
   {
       if ($result->num_rows > 0) 
       {
           while($row = $result->fetch_assoc())
           {
               $total_runs_prev=$row['total_runs'];
           }
   
       }
   
   }

$over_incr=0;
$ball_incr=0;
function update_bowl(){
         $num1=$_SESSION['over_num'];
         $num2=$_SESSION['ball_num'];
         $ball_id=$_SESSION['ball_id'];
         if($num2==6)
         {
             $num2=1;
             $num1=$num1+1;
             $over_incr=1;
            
         }
         else{
             $num2=$num2+1;
             $ball_incr=1;
         }
         $team_name_ball=$_SESSION['team_name_ball'];
         $sql="UPDATE bowling 
          SET over_num=$num1,
              ball_num=$num2
         WHERE ball_id=$ball_id AND team_name_ball='$team_name_ball' ";          
        
        

          $result=$GLOBALS['conn']->query($sql);
         if($result)
         {
             echo"bowl has been updated<br>";
         }
         else{
             echo"could not update";
             $num2=$num2-1;
         }

        
     
}
     
     
function update_run($run,$run_type,$ball_no){
            $team_name_bat=$_SESSION['team_name_bat'];
            if($run==1 && $run_type=='Batted')
            {
               $num3=$_SESSION['striker_runs'];
               $num3=$num3+1;
               $bat_id=$_SESSION['bat_id'];
               $num_ns=$_SESSION['non_striker_runs'];

                $sql1="UPDATE batting 
                SET striker_runs=$num3
                WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";

                $GLOBALS['X1']=1;
                // $GLOBALS['X2']=$num_ns;

             $result=$GLOBALS['conn']->query($sql1);
             if($result)
             {
                 echo"runs updated<br>";
             }
             else{
                 echo"runs not updated";
                 $num3=$num3-1;
             }

          
        $temp_striker=$_SESSION['striker_name'];
        $temp_nstriker= $_SESSION['nonstriker_name'];
        $temp_fours=$_SESSION['striker_fours'];
        $temp_nfours= $_SESSION['nonstriker_fours'];
        $temp_sixes=$_SESSION['striker_sixes'];
        $temp_nsixes=$_SESSION['nonstriker_sixes'];

         $sql2="UPDATE batting
               SET striker_name='$temp_nstriker',
                    nonstriker_name='$temp_striker',
                    non_striker_runs=$num3,
                   striker_runs=$num_ns,
                   striker_fours=$temp_nfours,
                   nonstriker_fours=$temp_fours,
                   striker_sixes=$temp_nsixes,
                   nonstriker_sixes=$temp_sixes
                WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";

             $result1=$GLOBALS['conn']->query($sql2);
             if($result1)
             {
                 echo"positions changed<br>";
             }
             else{
                 echo"positions could not be changed";
             }
             
            

                
             
            
     }


            if($run==2 && $run_type=='Batted')
            {
             $num4=$_SESSION['striker_runs'];
             $num4=$num4+2;
             $num_ns=$_SESSION['non_striker_runs'];
             $bat_id=$_SESSION['bat_id'];

                $sql1="UPDATE batting 
                SET striker_runs=$num4
                WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";

               $GLOBALS['X1']=2;
                // $GLOBALS['X2']=$num_ns;

               $result=$GLOBALS['conn']->query($sql1);
               if($result)
               {
                   echo"2 runs scored";
               }
               else{
                   echo"2 runs cannot be updated";
                   $num=$num-2;
               }
               

               if($ball_no==6)
               {
                
                $temp_striker=$_SESSION['striker_name'];
                $temp_nstriker= $_SESSION['nonstriker_name'];
                $temp_fours=$_SESSION['striker_fours'];
                $temp_nfours= $_SESSION['nonstriker_fours'];
                $temp_sixes=$_SESSION['striker_sixes'];
                $temp_nsixes=$_SESSION['nonstriker_sixes'];
                
               
        
                 $sql2="UPDATE batting
                       SET striker_name='$temp_nstriker',
                            nonstriker_name='$temp_striker',
                            non_striker_runs=$num4,
                           striker_runs=$num_ns,
                           striker_fours=$temp_nfours,
                           nonstriker_fours=$temp_fours,
                           striker_sixes=$temp_nsixes,
                           nonstriker_sixes=$temp_sixes
                        WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";
        
                     $result1=$GLOBALS['conn']->query($sql2);
                     if($result1)
                     {
                         echo"positions changed<br>";
                     }
                     else{
                         echo"positions could not be changed";
                     }
               }
                 
            }
            if($run==4 && $run_type=='Four')
            {   
                $num5=$_SESSION['striker_runs'];
                $num6=$_SESSION['striker_fours'];
                $num_ns=$_SESSION['non_striker_runs'];
                $num5=$num5+4;
                $num6=$num6+1;

                $bat_id=$_SESSION['bat_id'];

                $sql1="UPDATE batting 
                SET striker_runs=$num5,
                    striker_fours=$num6
                WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";

                $GLOBALS['X1']=4;
                // $GLOBALS['X2']=$num_ns;

             $result=$GLOBALS['conn']->query($sql1);
             if($result)
             {
                 echo"Player has scored 4";
             }
             else{
                 echo"Could not update by 4";
                 $num6=$num6-1;
                 $num5=$num5-4;
             }
                

                if($ball_no==6)
                {
                    
                 $temp_striker=$_SESSION['striker_name'];
                 $temp_nstriker= $_SESSION['nonstriker_name'];
                //  $temp_fours=$_SESSION['striker_fours'];
                 $temp_nfours= $_SESSION['nonstriker_fours'];
                 $temp_sixes=$_SESSION['striker_sixes'];
                 $temp_nsixes=$_SESSION['nonstriker_sixes'];
         
                  $sql2="UPDATE batting
                        SET striker_name='$temp_nstriker',
                             nonstriker_name='$temp_striker',
                             non_striker_runs=$num5,
                            striker_runs=$num_ns,
                            striker_fours=$temp_nfours,
                            nonstriker_fours=$num6,
                            striker_sixes=$temp_nsixes,
                            nonstriker_sixes=$temp_sixes
                         WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";
         
                      $result1=$GLOBALS['conn']->query($sql2);
                      if($result1)
                      {
                          echo"positions changed<br>";
                      }
                      else{
                          echo"positions could not be changed";
                      }
                }
                
            }
            if($run==6 && $run_type=='Six')
            {
              $num7=$_SESSION['striker_runs'];
              $num8=$_SESSION['striker_sixes'];
              $num_ns=$_SESSION['non_striker_runs'];
              $num7=$num7+6;
              $num8=$num8+1;
              $bat_id=$_SESSION['bat_id'];

                $sql1="UPDATE batting 
                SET striker_runs=$num7,
                    striker_sixes=$num8
                WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";

                  $GLOBALS['X1']=6;
                //   $GLOBALS['X2']=$num_ns;

              $result=$GLOBALS['conn']->query($sql1);
              if($result)
              {
                  echo"Player has scored a six<br>";
              }
              else{
                  echo"could not update by six";
                  $num7=$num7-6;
                  $num8=$num8-1;
              }
                

                if($ball_no==6)
                {
                    
                 $temp_striker=$_SESSION['striker_name'];
                 $temp_nstriker= $_SESSION['nonstriker_name'];
                 $temp_fours=$_SESSION['striker_fours'];
                 $temp_nfours= $_SESSION['nonstriker_fours'];
                //  $temp_sixes=$_SESSION['striker_sixes'];
                 $temp_nsixes=$_SESSION['nonstriker_sixes'];
         
                  $sql2="UPDATE batting
                        SET striker_name='$temp_nstriker',
                             nonstriker_name='$temp_striker',
                             non_striker_runs=$num7,
                            striker_runs=$num_ns,
                            striker_fours=$temp_nfours,
                            nonstriker_fours=$temp_fours,
                            striker_sixes=$temp_nsixes,
                            nonstriker_sixes=$num8
                         WHERE bat_id=$bat_id AND team_name_bat='$team_name_bat'";
         
                      $result1=$GLOBALS['conn']->query($sql2);
                      if($result1)
                      {
                          echo"positions changed<br>";
                      }
                      else{
                          echo"positions could not be changed";
                      }
                }
                
            }


         
        }

        
function change_bowler($ball_num){
if($ball_num==6)
{
    if($_SESSION['toss_a']=='heads' && $_SESSION['toss_b']=='tails' && $_SESSION['inning_num_bat']==1)
    {
    echo "<a href='change_bowler_b.php'>Add new player<a>"; 
    }
    if($_SESSION['toss_a']=='heads' && $_SESSION['toss_b']=='tails' && $_SESSION['inning_num_bat']==2)
    {
    echo "<a href='change_bowler_a.php'>Add new player<a>"; 
    }
    if($_SESSION['toss_a']=='tails' && $_SESSION['toss_b']=='heads' && $_SESSION['inning_num_bat']==1)
    {
    echo "<a href='change_bowler_a.php'>Add new player<a>"; 
    }
    if($_SESSION['toss_a']=='tails' && $_SESSION['toss_b']=='heads' && $_SESSION['inning_num_bat']==2)
    {
    echo "<a href='change_bowler_b.php'>Add new player<a>"; 
    }
}
}

echo"<br> this is prev$total_runs_prev<br>";
                if($flag==true)
                {
                    
                update_bowl();
                $over_count=$_SESSION['over_num'];
                $over_count=$over_count+$over_incr;
                $real_ball_num=$_SESSION['ball_num'];
                $real_ball_num=$real_ball_num+ $ball_incr;
                echo $over_count;
                echo"<br>";
                echo $_SESSION['overs'];
                if($_SESSION['inning_num_bat']==1)
                {
                if($over_count==$_SESSION['overs'] && $real_ball_num==1)
                {
                    echo"1st inning is over";
                    if($_SESSION['toss_a']=='heads' && $_SESSION['toss_b']=='tails')
                    {
                        echo"<a href='batter_details_b.php'>Click here for innings 2 settings<a>";
                    }
                    if($_SESSION['toss_a']=='tails' && $_SESSION['toss_b']=='heads')
                    {
                        echo"<a href='batter_details_a.php'>Click here for innings 2 settings<a>";
                    }
                    goto end;
                }
            }
            
                  if($o_no=='Not-Out' )
                  {
                    update_run($run,$run_type,$_SESSION['ball_num']+1);
                   
        
                  }
                  else if($o_no=='Out')
                  {
                    
                    echo"A player is out";
                    $X1=0;
                    $wicket=$_SESSION['wickets'];
                    $bat_id=$_SESSION['bat_id'];
                    $wicket=$wicket+1;

                    $sql="UPDATE batting
                        SET wickets=$wicket
                        where bat_id=$bat_id";

                $result=$conn->query($sql);
                if($result)
                {
                    echo"Wicket has been updated";
                    if($_SESSION['toss_a']=='heads' && $_SESSION['toss_b']=='tails' && $_SESSION['inning_num_bat']==1)
                    {
                    echo "<a href='new_player_a.php'>Add new player<a>"; 
                    }
                    if($_SESSION['toss_a']=='heads' && $_SESSION['toss_b']=='tails' && $_SESSION['inning_num_bat']==2)
                    {
                    echo "<a href='new_player_b.php'>Add new player<a>"; 
                    }
                    if($_SESSION['toss_a']=='tails' && $_SESSION['toss_b']=='heads' && $_SESSION['inning_num_bat']==1)
                    {
                    echo "<a href='new_player_b.php'>Add new player<a>"; 
                    }
                    if($_SESSION['toss_a']=='tails' && $_SESSION['toss_b']=='heads' && $_SESSION['inning_num_bat']==2)
                    {
                    echo "<a href='new_player_a.php'>Add new player<a>"; 
                    }

                }
                else{
                    echo"Wickets not updated";
                }
                

                  }

                  change_bowler($_SESSION['ball_num']+1);
                  $Y=$_SESSION['total_runs'];
                  echo $Y;
                  echo"<br>";
                  $Y=$Y+$X1;
                  echo"<br>";
                  echo $Y;
                  $bat_id=$_SESSION['bat_id'];
                  $sql="UPDATE batting
                        SET total_runs=$Y
                        where bat_id=$bat_id";

                $result=$conn->query($sql);
                if($result)
                {
                    echo"Total runs updated";
                    if($_SESSION['inning_num_bat']==2)
                    {
                       if($Y>=$total_runs_prev+1  && $over_count!=$_SESSION['overs']) 
                       {

                            $winner=$_SESSION['team_name_bat'];
                           echo"Team  '$winner' have won the match";
                           $sql="UPDATE batting
                                 SET flag_win=1
                                 WHERE inning_num_bat=2";
                            $result=$conn->query($sql);
                            if($result)
                            {
                                echo"Winner has been declared";
?>
                         <form action="end_live_crick.php" method="post">
                         <button>END LIVE</button>
                         </form>

<?php
                                // echo"<a href='tournament_c.php'>Go back to tournaments page<a>";
                            }
                            else{
                                echo"Winner declaration error";
                            }
                       }

                       if($Y<$total_runs_prev+1  && $over_count==$_SESSION['overs'])
                       {
                        $winner=$_SESSION['team_name_ball'];
                        echo"Team  '$winner' have won the match";
                        $sql="UPDATE batting
                                 SET flag_win=1
                                 WHERE inning_num_bat=1";
                         $result=$conn->query($sql);
                        if($result)
                       {
                          echo"Winner has been declared";
?>
                         <form action="end_live_crick.php" method="post">
                         <button>END LIVE</button>
                         </form>

<?php
                        //   echo"<a href='tournament_c.php'>Go back to tournaments page<a>";
                        }
                    else{
                    echo"Winner declaration error";
                      }
                       }
                    }

                }
                else{
                    echo"total runs not updated";
                }

                  
                }
                

                else{
                    echo"wrong run type";
                }
                
                
            
end:
$conn->close();
$conn1->close();

?>
