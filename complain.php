<!DOCTYPE html>
<html >
<head>
    
    <title>Message Section</title>
    <link href="style3.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <!-- <link href="style.css" rel="stylesheet"/> -->
</head>
<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "support");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

    $conn1 = mysqli_connect("localhost", "root", "", "administrator");

    if ($conn1->connect_error) {
        die("Connection failed due to error in code : " . $conn1->connect_error);
        }

session_start();


$sql = "SELECT * FROM support_msg";
$result = $conn->query($sql);
?>
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">FEEBACKS AND COMPLAINS</h1>
      
    </div>
    <table class="content-table"  align="center" border="1px">
        <thead>
           <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MESSAGE</th>
           
          </tr>
        </thead>
    
    <?php
if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
 ?>         
            <tr>
                <td><?php echo $row['Name'];?></td>
                <td><?php echo $row['Email'];?></td>
                <td><?php echo $row['msg'];?></td>
                
            </tr> 
       <?php     
        }
        
    }
    else{
        echo "no events available";
    }
    ?>
    </table>
    <?php
    
$conn->close();
$conn1->close();
?>
    <!-- <form action="tour_reg_m.php" method="post">
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">REGISTER FOR ANY EVENT
    </form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button> -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
  
</body>
</html>