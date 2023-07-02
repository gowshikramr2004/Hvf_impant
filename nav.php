<?php
$currentLocation = $_SERVER['PHP_SELF'];
$currentPage = basename($currentLocation);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav  class=" border-gray-900 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div id="nav" class="flex flex-wrap justify-between items-center mx-auto max-w-screen-x2">
                <a href="" class="flex items-center">
                    <img style="border-radius: 20px;" src="https://upload.wikimedia.org/wikipedia/en/9/9d/Heavy_Vehicles_Factory_logo.png" class="mr-3 h-6 sm:h-9" alt="HVF Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">HVF</span>
                </a>
                <div class="flex items-center lg:order-2">
                   
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    </div>
<div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
        <li>
            <a href="details.php" class="mb-4 text-lg font-semibold text-gray-800 hover:text-blue-500">Home</a>
        </li>
        <li>
            <a href="package.php" class="mb-4 text-lg font-semibold text-gray-800 hover:text-blue-500">Package</a>
        </li>
        <li>
            <a href="vehicle.php" class="mb-4 text-lg font-semibold text-gray-800 hover:text-blue-500">Vehicle</a>
        </li>
        <li>
            <a href="documents.php" class="mb-4 text-lg font-semibold text-gray-800 hover:text-blue-500">Document</a>
        </li>
        <li>
            <a href="escort.php" class="mb-9 text-lg font-semibold text-gray-800 hover:text-blue-500">Escort</a>
        </li>
        <li>
            <a href="logout.php" class="mb-9 text-lg font-semibold text-gray-800 hover:text-blue-500">Logout</a>
        </li>
    </ul>
</div>

        </nav>
    </header>

    
        
    <script>
    const mobileMenuButton = document.querySelector('[data-collapse-toggle="mobile-menu-2"]');
    const mobileMenu = document.getElementById('mobile-menu-2');

    mobileMenuButton.addEventListener('click', () => {
        const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
        mobileMenuButton.setAttribute('aria-expanded', !expanded);
        mobileMenu.classList.toggle('hidden');
    });
    
</script>
    <script src="https://cdn.tailwindcss.com/2.2.19/tailwind.min.js"></script>
    <script src="three.r134.min.js"></script>
<script src="vanta.net.min.js"></script>
<script>
VANTA.NET({
  el: "#your-element-selector",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  scaleMobile: 1.00
})
</script>
</body>

</html>
