<div class="flex flex-col h-full py-8">
    <!-- Brand Logo -->
    <div class="px-8 mb-12 flex items-center justify-between">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 ml-4">
                <span class="text-white font-black text-xl">M</span>
            </div>
            <h1 class="text-xl font-black text-gray-800 tracking-tight">مو-ويب</h1>
        </div>
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-400">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"></path></svg>
        </button>
    </div>

    <!-- Main Navigation -->
    <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-6 py-4 rounded-2xl transition duration-300 {{ request()->routeIs('admin.dashboard') ? 'nav-link-active' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-width="2" stroke-linecap="round"></path></svg>
            <span class="font-black text-sm uppercase tracking-wider">الرئيسية</span>
        </a>

        <a href="{{ route('admin.projects.index') }}" 
           class="flex items-center px-6 py-4 rounded-2xl transition duration-300 {{ request()->routeIs('admin.projects.*') ? 'nav-link-active' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-width="2" stroke-linecap="round"></path></svg>
            <span class="font-black text-sm uppercase tracking-wider">المشاريع</span>
        </a>

        <a href="{{ route('admin.categories.index') }}" 
           class="flex items-center px-6 py-4 rounded-2xl transition duration-300 {{ request()->routeIs('admin.categories.*') ? 'nav-link-active' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 7h.01M7 11h.01M7 15h.01M10 7h10M10 11h10M10 15h10" stroke-width="2" stroke-linecap="round"></path></svg>
            <span class="font-black text-sm uppercase tracking-wider">التصنيفات</span>
        </a>

        <a href="{{ route('admin.team.index') }}" 
           class="flex items-center px-6 py-4 rounded-2xl transition duration-300 {{ request()->routeIs('admin.team.*') ? 'nav-link-active' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2" stroke-linecap="round"></path></svg>
            <span class="font-black text-sm uppercase tracking-wider">الفريق</span>
        </a>

        <a href="{{ route('admin.messages.index') }}" 
           class="flex items-center px-6 py-4 rounded-2xl transition duration-300 {{ request()->routeIs('admin.messages.*') ? 'nav-link-active' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-900' }}">
            <svg class="w-5 h-5 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" stroke-width="2" stroke-linecap="round"></path></svg>
            <span class="font-black text-sm uppercase tracking-wider">الرسائل</span>
        </a>
    </nav>

    <!-- Sidebar Footer / User Section -->
    <div class="px-4 mt-8 pt-8 border-t border-gray-100">
        <div class="relative" x-data="{ userOpen: false }">
            <button @click="userOpen = !userOpen" class="w-full flex items-center p-4 bg-gray-50 rounded-[2rem] hover:bg-gray-100 transition duration-300 border border-transparent hover:border-blue-100 group">
                <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-black shadow-lg shadow-blue-100 ml-4">
                    {{ mb_substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="flex-1 text-right overflow-hidden">
                    <p class="text-sm font-black text-gray-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-gray-400 font-bold truncate">المدير العام</p>
                </div>
                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2"></path></svg>
            </button>

            <!-- User Menu Dropup -->
            <div x-show="userOpen" @click.away="userOpen = false" class="absolute bottom-full right-0 mb-4 w-full bg-white rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden py-4 z-[100]">
                <a href="{{ route('profile.edit') }}" class="block px-8 py-3 text-sm font-black text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition">تعديل الملف</a>
                <a href="{{ route('home') }}" target="_blank" class="block px-8 py-3 text-sm font-black text-gray-600 hover:bg-blue-50 hover:text-blue-600 transition">زيارة الموقع</a>
                <div class="border-t border-gray-50 my-2"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-right px-8 py-3 text-sm font-black text-pink-600 hover:bg-pink-50 transition">تسجيل الخروج</button>
                </form>
            </div>
        </div>
    </div>
</div>
