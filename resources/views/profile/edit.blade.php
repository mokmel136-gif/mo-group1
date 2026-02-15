<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-gray-900 leading-tight">
            إعدادات <span class="text-blue-600">الحساب</span>
        </h2>
        <p class="text-gray-400 font-bold mt-2 text-sm">تحكم في هويتك الرقمية وأمان حسابك.</p>
    </x-slot>

    <div class="space-y-12 pb-24">
        <!-- Profile Information Section -->
        <div class="bg-white p-12 rounded-[3.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-gray-50 overflow-hidden relative group">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50/50 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-blue-100 transition duration-500"></div>
            <div class="max-w-2xl text-right relative z-10">
                <h3 class="text-2xl font-black text-gray-900 mb-2">معلومات الملف الشخصي</h3>
                <p class="text-gray-400 font-bold mb-10 text-sm">قم بتحديث اسمك وعنوان بريدك الإلكتروني.</p>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password Section -->
        <div class="bg-white p-12 rounded-[3.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] border border-gray-50 overflow-hidden relative group">
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50/50 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-indigo-100 transition duration-500"></div>
            <div class="max-w-2xl text-right relative z-10">
                <h3 class="text-2xl font-black text-gray-900 mb-2">تأمين الحساب</h3>
                <p class="text-gray-400 font-bold mb-10 text-sm">تأكد من استخدام كلمة مرور طويلة وعشوائية للبقاء آمناً.</p>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete Account Section -->
        <div class="bg-white p-12 rounded-[3.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.02)] border border-pink-50 overflow-hidden relative group">
            <div class="absolute top-0 right-0 w-32 h-32 bg-pink-50/50 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-pink-100 transition duration-500"></div>
            <div class="max-w-2xl text-right relative z-10">
                <h3 class="text-2xl font-black text-pink-600 mb-2">حذف الحساب</h3>
                <p class="text-gray-400 font-bold mb-10 text-sm">بمجرد حذف حسابك، سيتم مسح جميع موارده وبياناته بشكل نهائي.</p>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
