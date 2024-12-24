
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>
<body>
<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex shrink-0 items-center">
          <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="../" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
          
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
       

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <button type="button" class="user-menu-button relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">Open user menu</span>
            <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </button>

          <!-- Dropdown menu -->
          <div id="user-menu" class="absolute right-0 z-10 mt-2 w-48 origin-top-right hidden rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
            
            <?php if(isset($_SESSION['user'])){
                echo '<a href="auth/logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Sign out</a>';
            }
               else{
                echo '<a href="../auth/signup.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Sign Up</a>';
                echo '<a href="../auth/login.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Login</a>';
               }
            ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
  document.getElementById('user-menu-button').addEventListener('click', () => {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
  });
</script>
</body>
</html>