<!DOCTYPE html>

<html>
<head>
    
    <title>Admin Login</title>
    <link rel="stylesheet" href="style3.css"/>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body background="images\batminton.jpg">
<section class="text-gray-400 bg-gray-900 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-white">ADMINISTRATOR LOGIN PORTAL</h1>
      <p class="leading-relaxed mt-4">Only the administrator can login here.</p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-800 bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-white text-lg font-medium title-font mb-5">Admin Login</h2>
      <form action="admin_login.php" method="post">
      <div class="relative mb-4">
        <label for="full-name" class="leading-7 text-sm text-gray-400">Username</label>
        <input type="text" id="full-name" name="username" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Password</label>
        <input type="password" id="email" name="password" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-400">Admin-Key</label>
        <input type="password" id="email" name="admin_key" class="w-full bg-gray-600 bg-opacity-20 focus:bg-transparent focus:ring-2 focus:ring-red-900 rounded border border-gray-600 focus:border-red-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button  class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Login</button>
      <p class="text-xs mt-3">*Sports club All rights Reserved*</p>
    </div>
    </form>
  </div>
</section>

<header class="text-gray-400 bg-gray-900 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">IIITG SPORTS CLUB</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <!-- <a class="mr-5 hover:text-white">First Link</a>
      <a class="mr-5 hover:text-white">Second Link</a>
      <a class="mr-5 hover:text-white">Third Link</a>
      <a class="mr-5 hover:text-white">Fourth Link</a> -->
    </nav>
    <form action="index.php" method="post">
    <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">HOME
    <form>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </div>
</header>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>

<?php 

$host="localhost";
$user="root";
$password="";


$conn=mysqli_connect($host,$user,$password,"administrator");

if ($conn->connect_error) {
    die("Connection failed due to error in code : " . $conn->connect_error);
    }

 session_start();

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $admin_key=$_POST['admin_key'];
    
    
    $sql="SELECT * FROM admin_details WHERE username='".$uname."' AND password='".$password."' AND key_admin ='".$admin_key."' limit 1";
   
    $result=$conn->query($sql);
     if($result)
     {
    if(mysqli_num_rows($result)==1){
        $_SESSION['username']=$uname;
        
       echo "<script> window.location.assign('welcome_a.php'); </script>";
        exit();
    }
    else{
        echo "<p class='login_wrong'>You Have Entered Incorrect Password or Username or KEY<p>";
        exit();
    }
      

}
else{
    echo"login_error";
}
    $conn->close();
        
}
?>