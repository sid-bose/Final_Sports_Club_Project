<?php
    $conn = mysqli_connect("localhost", "root", "", "registration");

    if ($conn->connect_error) {
        die("Connection failed due to error in code : " . $conn->connect_error);
        }
        session_start();

    $sql="SELECT  * from registration_details";
    $result=$conn->query($sql);
    $conn->close();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style2.css"/>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
    <title>Tournaments</title>
</head>
<body>

<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col">
      <div class="h-1 bg-gray-800 rounded overflow-hidden">
        <div class="w-24 h-full bg-indigo-500"></div>
      </div>
      <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
        <h1 class="sm:w-2/5 text-white font-medium title-font text-2xl mb-2 sm:mb-0">Tournament Section</h1>
        <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0"></p>
      </div>
    </div>
    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="images\tour_time.png">
        </div>
        <h2 class="text-xl font-medium title-font text-white mt-5">See available Events</h2>
        <p class="text-base leading-relaxed mt-2">Events U can register in</p>
        <a href="avail_tour_m.php" class="text-indigo-400 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      </div>
        <h2 class="text-xl font-medium title-font text-white mt-5">On going Matches</h2>
        <p class="text-base leading-relaxed mt-2"></p>
        <a href="on_going.php" class="text-indigo-400 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <!-- </div>
        <h2 class="text-xl font-medium title-font text-white mt-5">Approved Events</h2>
        <p class="text-base leading-relaxed mt-2">Approved Events for the memebers</p>
        <a href="approved_events_c.php" class="text-indigo-400 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="images\reg_mem.png">
        </div>
        <h2 class="text-xl font-medium title-font text-white mt-5">View Registered Members</h2>
        <p class="text-base leading-relaxed mt-2">You can view the memebers who have registered for events</p>
        <a  href="registered_mem.php" class="text-indigo-400 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>da
      </div>
      </div>
        <h2 class="text-xl font-medium title-font text-white mt-5">Direct Matches</h2>
        <p class="text-base leading-relaxed mt-2">Direct the MAtches to show live score</p>
        <a href="direction.php" class="text-indigo-400 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6"> -->
        <!-- <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1205x505">
        </div>
        <h2 class="text-xl font-medium title-font text-white mt-5">The 400 Blows</h2>
        <p class="text-base leading-relaxed mt-2">Swag shoindegoitch literally meditation subway tile tumblr cold-pressed. Gastropub street art beard dreamcatcher neutra, ethical XOXO lumbersexual.</p>
        <a class="text-indigo-400 inline-flex items-center mt-3">Learn More
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a> -->
      </div>
    </div>
  </div>
</section>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</body>
</html>