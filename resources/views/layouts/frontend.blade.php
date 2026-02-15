<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مو لتطوير الويب | MO-WEB</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN for reliability) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Cairo', 'sans-serif'],
                        heading: ['Cairo', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-900 selection:bg-blue-600 selection:text-white">
    <!-- Header -->
    <header class="fixed top-0 w-full z-50 transition-all duration-300" id="main-header">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="glass rounded-2xl px-6 py-3 flex justify-between items-center shadow-lg">
                <a href="{{ route('home') }}" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                    MO-Group
                </a>

                <div class="hidden md:flex items-center space-x-8 space-x-reverse">
                    <a href="{{ route('home') }}" class="font-bold hover:text-blue-600 transition">الرئيسية</a>
                    <a href="{{ route('projects.index') }}" class="font-bold hover:text-blue-600 transition">المشاريع</a>
                    <a href="{{ route('about') }}" class="font-bold hover:text-blue-600 transition">من نحن</a>
                    <a href="{{ route('contact') }}" class="font-bold hover:text-blue-600 transition">اتصل بنا</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-gray-900 text-white px-5 py-2 rounded-xl text-sm font-semibold hover:bg-gray-800 transition">لوحة التحكم</a>
                    @endauth
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 text-gray-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round"></path></svg></button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 glass rounded-2xl p-4 space-y-4">
                <a href="{{ route('home') }}" class="block font-bold hover:text-blue-600 transition">الرئيسية</a>
                <a href="{{ route('projects.index') }}" class="block font-bold hover:text-blue-600 transition">المشاريع</a>
                <a href="{{ route('about') }}" class="block font-bold hover:text-blue-600 transition">من نحن</a>
                <a href="{{ route('contact') }}" class="block font-bold hover:text-blue-600 transition">اتصل بنا</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="block bg-gray-900 text-white px-5 py-2 rounded-xl text-center text-sm font-semibold hover:bg-gray-800 transition">لوحة التحكم</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="pt-24">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-16 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-right">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-6 italic tracking-widest text-blue-400">MO-Group</h3>
                    <p class="text-gray-400 max-w-sm">نحن نبتكر تجارب رقمية استثنائية من خلال دمج البحث العلمي بأحدث تقنيات تطوير الويب.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg border-r-4 border-blue-600 pr-3">روابط سريعة</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">الرئيسية</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-white transition">معرض الأعمال</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition">فريق العمل</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6 text-lg border-r-4 border-blue-600 pr-3">تواصل معنا</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li>mogroup355@gmail.com</li>
                        <li>776613956</li>
                        <li>اليمن - صنعاء</li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition">اطلب استشارة</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-16 pt-8 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} MO-Group. جميع الحقوق محفوظة.
            </div>
        </div>
    </footer>

    <script>
        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('main-header');
            if (window.scrollY > 20) {
                header.classList.add('py-2');
            } else {
                header.classList.remove('py-2');
            }
        });

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
