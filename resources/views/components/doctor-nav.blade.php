<nav class="sidebar">
    <div class="flex flex-wrap items-center cursor-pointer">
        <div class="relative">
            <img src="{{ asset('profil/7O2A0186.JPG') }}" class="w-12 h-12 rounded-full border-white" />
            <span class="h-3 w-3 rounded-full bg-green-600 border-2 border-white block absolute bottom-0 right-0"></span>
        </div>
        <div class="ml-3">
            <p class="text-sm text-[#3949ab] font-semibold">{{ Auth::user()->name }}</p>
            <p class="text-sm text-[#3949ab] font-semibold">{{ Auth::user()->email }}</p>

        </div>
    </div>
    <ul class="space-y-8  flex-1 mt-10">
        <li>
            <a href="/doctor.dashboard"
                class="text-[#3949ab] font-semibold text-sm flex items-center rounded-md left-0 hover:left-2 relative transition-all duration-300">
                <i class="fa-solid fa-gauge px-3 "></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/doctor.medicament"
                class="text-[#3949ab] font-semibold text-sm flex items-center rounded-md left-0 hover:left-2 relative transition-all duration-300">
                <i class="fa-solid fa-notes-medical  px-3 "></i>
                <span>Médicament</span>
            </a>
        </li>
        <li>
            <a href="/doctor.rendezvous"
                class="text-[#3949ab] font-semibold text-sm flex items-center rounded-md left-0 hover:left-2 relative transition-all duration-300">
                <i class="fa-solid fa-calendar-days px-3 "></i>
                <span>rendez-vous</span>
            </a>
        </li>
        <form method="get" action="/profile">
            @csrf
            <button>
                <span
                    class="text-[#3949ab] font-semibold text-sm flex items-center rounded-md left-0 hover:left-2 relative transition-all duration-300">
                    <i class="fa-solid fa-user  px-3 "></i>
                    Profile
                </span>
            </button>
        </form>

    <form method="post" action="/logout">
        @csrf
        <button>
            <span
                class="text-[#3949ab] font-semibold text-sm flex items-center rounded-md left-0 hover:left-2 relative transition-all duration-300">
                <i class="fa-solid fa-right-from-bracket  px-3 "></i>
                Logout
            </span>
        </button>
    </form>
 </ul>
</nav>