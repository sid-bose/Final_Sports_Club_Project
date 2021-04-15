<?php
$conn = mysqli_connect("localhost", "root", "", "co-ordinator");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }
    session_start();

    $sql="SELECT Name ,username from coordinator_reg";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            if($row['username']==$_SESSION['username'])
            {
                $wel_name= $row["Name"];
                $_SESSION['Name']=$row['Name'];
                break;
            }

        }
    }
    echo"<br/>";

?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Welcome Coordinator</title>
    <!-- <link rel="stylesheet" href="style2.css"/> -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body>
<section class="text-gray-400 body-font bg-gray-900">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h2 class="text-xs text-indigo-400 tracking-widest font-medium title-font mb-1">You have Logged in Successfully</h2>
      <?php
     echo"<h1 class='sm:text-3xl text-2xl font-medium title-font mb-4 text-white'>Welcome $wel_name to Sports Club </h1>";
      ?>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
    </div>
    <div class="flex flex-wrap">
      <!-- <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Dashboard</h2>
        <p class="leading-relaxed text-base mb-4"></p>
        <a href="dashboard_m.php" class="text-indigo-400 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div> -->
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Tournament</h2>
        <p class="leading-relaxed text-base mb-4"></p>
        <a href="tournament_c.php" class="text-indigo-400 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <!-- <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Profile</h2>
        <p class="leading-relaxed text-base mb-4"></p>
        <a href="profile_
        " class="text-indigo-400 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div> -->
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Support</h2>
        <p class="leading-relaxed text-base mb-4"></p>
        <a href="support_c.php" class="text-indigo-400 inline-flex items-center">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
    <form action="logout_c.php" method="post">
    <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Logout</button>
    <form>
  </div>
</section>

<footer class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">IIITG SPORTS CLUB</span>
    </a>
    <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">© 2021 — All Rights Reserved
      <a href="https://twitter.com/knyttneve" class="text-gray-500 ml-1" target="_blank" rel="noopener noreferrer">@bosesid</a>
    </p>
    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <a class="text-gray-400">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-400">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-400">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-400">
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
      </a>
    </span>
  </div>
</footer>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php
$conn->close();

?>