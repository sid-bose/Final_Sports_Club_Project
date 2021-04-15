<!DOCTYPE html>

<html class="login_as_portal">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
    <title>REGISTER AS?</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body>
<section class="text-gray-400 body-font bg-gray-900">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h2 class="text-xs text-red-400 tracking-widest font-medium title-font mb-1">Welcome to Registration Page!</h2>
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Registration Mode Selector </h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base"> Note that the only first six members can register to become Co-ordinator.</p>
    </div>
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Register as Member</h2>
        <p class="leading-relaxed text-base mb-4">Members can register themselves in a event and are in the majority of the sports club .</p>
        <a href="registration.php" class="text-red-400 inline-flex items-center">Register
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Register as Coordinator</h2>
        <p class="leading-relaxed text-base mb-4">Co-ordinators are the ones who manage and create events for a particular sport.They play a very vital role in sports club .</p>
        <a href="coordinator_reg.php" class="text-red-400 inline-flex items-center">Register
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <!-- <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Login as Administrator</h2>
        <p class="leading-relaxed text-base mb-4">U cannot login here .This position is reserved for only the administrator.</p>
        <a href="admin_login.php"class="text-red-400 inline-flex items-center">Login
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div> -->
      <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-800">
        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">Go back to home page</h2>
        <p class="leading-relaxed text-base mb-4">Go back to Home Page </p>
        <a href="index.php" class="text-red-400 inline-flex items-center">Go back
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
    <!-- <button class="flex mx-auto mt-16 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Button</button> -->
  </div>
</section>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>