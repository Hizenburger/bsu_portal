 {{-- <aside id="sidebar"
     class="z-10 bg-bsu-green text-white w-64 px-2 py-4 absolute inset-y-0 left-0 md:relative transform -translate-x-full md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
     <!--logo-->
     <div class="flex items-center justify-between px-2">
         <div class="flex items-center gap-2">
             <a href="">
                 <img src="{{ asset('img/BSU_BOKOD_LOGO.png') }}" class="block h-10 w-auto fill-current" alt="BSU Logo" />
             </a>
             <span class="2xl font-extrabold">Admin</span>
         </div>
         <button id="closeSidebar" type="button"
             class="inline-flex p-2 justify-center items-center rounded-md bg-white text-red-500 hover:text-white hover:bg-red-500 focus:outline-none cursor-pointer">
             <i class="fa-solid fa-xmark"></i>
         </button>
     </div>

     <!--navigation links-->
     <nav class="pt-5 pl-3">
         <ul>
             <li class="hover:bg-amber-50 hover rounded-md p-2">
                 Dashboard
             </li>

             <li>
                 test
             </li>
         </ul>
     </nav>
 </aside> --}}

 <aside class="custom-sidebar h-screen">

     <a class="nav-image" href="#">
         <img src="{{ asset(auth()->user()->profile_picture) }}" class="square-image" alt="Profile Picture" />
     </a>

     <nav class="dropdown-sidebar collapsed">
         <ul class="flex flex-col h-full items-center py-4 gap-5">

             <li>
                 <span
                     class="user-name">{{ Str::ucfirst(auth()->user()->first_name) . ' ' . Str::ucfirst(auth()->user()->last_name) }}</span>
                 <span class="user-role">{{ Str::upper(auth()->user()->role) }}</span>
             </li>

             <li class="tooltip">
                 <a class="icon-container {{ request()->is(auth()->user()->role . '/dashboard') ? 'active' : '' }}"
                     href="{{ route(auth()->user()->role . '.dashboard') }}">
                     <i class="fa-solid fa-house-user nav-icon"></i>
                     <span class="tooltiptext">Dashboard</span>
                 </a>
             </li>

             <li class="tooltip">
                 <a class="icon-container {{ request()->is('profile') }}" href="">
                     <i class="fa-solid fa-user nav-icon"></i>
                     <span class="tooltiptext">Profile</span>
                 </a>
             </li>
             <li class="tooltip">
                 <a class="icon-container" href="">
                     <i class="fa-solid fa-gear nav-icon"></i>
                     <span class="tooltiptext">Settings</span>
                 </a>
             </li>
             <li class="mt-auto mb-5 tooltip">
                 <a href="{{ route('logout') }}" class="icon-container"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                     <span class="tooltiptext">Sign out</span>
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                     @csrf
                 </form>
             </li>

         </ul>
     </nav>


 </aside>
