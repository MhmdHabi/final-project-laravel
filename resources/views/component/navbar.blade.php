<nav
    class="navbar bg-gray-100 shadow-lg text-gray-600 px-4 py-3 fixed w-full md:w-[calc(100%-256px)] z-10 flex justify-between overflow-x-visible ">
    <div class="navbar-top flex">
        <button class="btn-menu block md:hidden px-1 py-0 open-btn"><i class="fa-solid fa-bars"></i></button>
        <h1 class="ml-4 font-bold lg:txet-2xl md:text-lg">@yield('judul')</h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="toggle-icon flex">
            <h3 class="font-bold text-lg cursor-pointer">Habi</h3>
            <a href="#" class="user-tie"><i class="fa-solid fa-user-tie fa-lg mx-3 text-gray-600"></i></a>
        </div>
        <div
            class="logout absolute flex flex-col bg-white py-2 px-2 w-[150px] mr-[100px] h-[90px] justify-center shadow rounded-lg mt-[120px] hidden">
            <a href=""
                class="text-[#2e4765] mb-2 hover:text-white hover:bg-[#2e4765] hover:rounded hover:py-1"><i
                    class="fa-regular fa-user mr-3 ml-2"></i>Edit
                Profile</a>
            <a href="" class="text-[#2e4765] hover:text-white hover:bg-[#2e4765] hover:rounded hover:py-1""><i
                    class="fa-solid fa-right-from-bracket mr-3 ml-2"></i>Logout</a>
        </div>
    </div>

</nav>
