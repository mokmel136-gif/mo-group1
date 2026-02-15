<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-gray-900 leading-tight">
            لوحة الاستطلاع <span class="text-blue-600">العامة</span>
        </h2>
        <p class="text-gray-400 font-bold mt-2">نظرة سريعة على أداء منصتك اليوم.</p>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <!-- Projects Stat -->
        <div class="bg-white p-10 rounded-[3rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-gray-50 flex items-center group hover:scale-[1.02] transition duration-500">
            <div class="w-20 h-20 bg-blue-50 rounded-[2rem] flex items-center justify-center text-blue-600 ml-8 group-hover:bg-blue-600 group-hover:text-white transition duration-500 shadow-xl shadow-blue-50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-width="2" stroke-linecap="round"></path></svg>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">المشاريع النشطة</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $stats['projects_count'] }}</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-blue-600 text-xs font-black hover:underline mt-2 inline-block">عرض الكل &larr;</a>
            </div>
        </div>

        <!-- Team Stat -->
        <div class="bg-white p-10 rounded-[3rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-gray-50 flex items-center group hover:scale-[1.02] transition duration-500">
            <div class="w-20 h-20 bg-indigo-50 rounded-[2rem] flex items-center justify-center text-indigo-600 ml-8 group-hover:bg-indigo-600 group-hover:text-white transition duration-500 shadow-xl shadow-indigo-50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2" stroke-linecap="round"></path></svg>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">فريق العمل</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $stats['team_count'] }}</h3>
                <a href="{{ route('admin.team.index') }}" class="text-indigo-600 text-xs font-black hover:underline mt-2 inline-block">إدارة الفريق &larr;</a>
            </div>
        </div>

        <!-- Messages Stat -->
        <div class="bg-white p-10 rounded-[3rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-gray-50 flex items-center group hover:scale-[1.02] transition duration-500">
            <div class="w-20 h-20 bg-pink-50 rounded-[2rem] flex items-center justify-center text-pink-600 ml-8 group-hover:bg-pink-600 group-hover:text-white transition duration-500 shadow-xl shadow-pink-50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" stroke-width="2" stroke-linecap="round"></path></svg>
            </div>
            <div class="text-right">
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">رسائل معلقة</p>
                <h3 class="text-4xl font-black text-gray-900">{{ $stats['unread_messages_count'] }}</h3>
                <a href="{{ route('admin.messages.index') }}" class="text-pink-600 text-xs font-black hover:underline mt-2 inline-block">افتح البريد &larr;</a>
            </div>
        </div>
    </div>

    <!-- Quick Feedback / Welcome Section -->
    <div class="bg-gradient-to-br from-gray-900 to-blue-900 rounded-[4rem] p-16 text-white relative overflow-hidden shadow-2xl">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-600 rounded-full blur-[100px] -ml-48 -mt-48 opacity-20"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
            <div class="text-right">
                <h3 class="text-4xl font-black mb-4">مرحباً بك مجدداً، {{ Auth::user()->name }} 👋</h3>
                <p class="text-blue-100 text-lg font-medium max-w-xl">لقد زاد معدل التفاعل في موقعك بنسبة 24% هذا الأسبوع. واصل العمل الرائع وتابع مشاريعك الجديدة من هنا.</p>
                <div class="mt-8 flex items-center space-x-6 space-x-reverse">
                    <a href="{{ route('admin.projects.create') }}" class="px-8 py-4 bg-white text-blue-900 rounded-2xl font-black shadow-xl hover:bg-blue-50 transition transform hover:-translate-y-1">إضافة مشروع جديد</a>
                    <a href="{{ route('home') }}" target="_blank" class="text-blue-200 font-black hover:text-white transition">زيارة الموقع الأمامي &larr;</a>
                </div>
            </div>
            <div class="hidden md:block mt-12 md:mt-0">
                <div class="w-48 h-48 bg-white/10 backdrop-blur-xl rounded-[3rem] border border-white/20 flex items-center justify-center animate-pulse">
                    <svg class="w-24 h-24 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2" stroke-linecap="round"></path></svg>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
