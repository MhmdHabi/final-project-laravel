<nav
    class="navbar bg-gray-100 shadow-lg text-gray-600 px-4 py-3 fixed w-full md:w-[calc(100%-256px)] z-10 flex justify-between overflow-x-visible ">
    <div class="navbar-top flex">
        <button class="btn-menu block md:hidden px-1 py-0 open-btn"><i class="fa-solid fa-bars"></i></button>
        <h1 class="ml-4 font-bold lg:text-2xl md:text-lg my-auto">@yield('judul')</h1>
    </div>
    <div class="flex items-center justify-center">
        <div class="toggle-icon flex">
            <h3 class="font-bold lg:text-xl md:text-lg cursor-pointer">
                {{ Auth::check() ? explode(' ', Auth::user()->name)[0] : 'Guest' }}
            </h3>
            </h3>
            <a href="#" class="user-tie my-auto"><i class="fa-solid fa-user-tie fa-lg mx-3 text-gray-600"></i></a>
        </div>
        <div
            class="logout absolute flex flex-col bg-white py-2 px-2 w-[150px] mr-[100px] h-[90px] justify-center shadow rounded-lg mt-[120px] hidden">
            <a href="{{ route('mahasiswa.profil') }}"
                class="text-[#2e4765] mb-2 hover:text-white hover:bg-[#2e4765] hover:rounded hover:py-1"><i
                    class="fa-regular fa-user mr-3 ml-2"></i>Edit
                Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="text-[#2e4765] hover:text-white hover:bg-[#2e4765] hover:rounded hover:py-1 w-full text-left"><i
                        class="fa-solid fa-right-from-bracket mr-3 ml-2"></i>Logout</button>
            </form>
        </div>
    </div>

</nav>
