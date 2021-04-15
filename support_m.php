<!DOCTYPE html>
<html >
<head>
    <title>SUPPORT</title>
    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body>
<section class="text-gray-400 bg-gray-900 body-font relative">
  <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
    <div class="lg:w-2/3 md:w-1/2 bg-gray-900 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
      <iframe width="100%" height="100%" title="map" class="absolute inset-0" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.16);"></iframe>
      <div class="bg-gray-900 relative flex flex-wrap py-6 rounded shadow-md">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-white tracking-widest text-xs">ADDRESS</h2>
          <p class="mt-1">IIITG SPORTS CLUB , Near IT park , Bongara , Guwahati - 781015</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-white tracking-widest text-xs">EMAIL</h2>
          <a class="text-indigo-400 leading-relaxed">example@email.com</a>
          <h2 class="title-font font-semibold text-white tracking-widest text-xs mt-4">PHONE</h2>
          <p class="leading-relaxed">123-456-7890</p>
        </div>
      </div>
    </div>
    <div class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
      <h2 class="text-white text-lg mb-1 font-medium title-font">Feedback</h2>
      <p class="leading-relaxed mb-5">Submit your feedback , complains over here. </p>
      <form action="support_m.php" method="post">
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-400">Name</label>
        <input type="text" id="name" name="name" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Email</label>
        <input type="email" id="email" name="email" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-400">Message</label>
        <textarea id="message" name="message" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      </div>
      <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">SUBMIT QUERY</button>
      <form>
      <p class="text-xs text-gray-400 text-opacity-90 mt-3"></p>
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
<?php

$con = mysqli_connect("localhost", "root", "", "support");

if ($con->connect_error) {
    die("Connection failed due to error in code : " . $con->connect_error);
    }


$sql1 = "SELECT * FROM support_msg";
$result = $con->query($sql1);


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$msg = filter_input(INPUT_POST, 'message');





if (!empty($name))
   {    
    if (!empty($email) && !empty($msg))
    {
             $sql1 = "INSERT INTO support_msg (`Name`, `Email`, `msg`) VALUES ('$name','$email','$msg')";
             if ($con->query($sql1))
                {
           
         
                    echo "Message sent successfully";

               }
               else
                {
                   echo 'Message sending error' ;
               
                 }
    } 
    else{
    echo'<script>alert("fill all the fields")</script>';
    }
  }
  //echo"something is very wrong";

$con->close();
?>
