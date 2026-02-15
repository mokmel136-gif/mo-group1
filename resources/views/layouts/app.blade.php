<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'لوحة التحكم') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Cairo', 'sans-serif'],
                        },
                    }
                }
            }
        </script>

        <style>
            body { 
                font-family: 'Cairo', sans-serif !important;
                background-color: #f8fafc;
                background-image: radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.05) 0, transparent 50%), 
                                  radial-gradient(at 50% 0%, rgba(99, 102, 241, 0.05) 0, transparent 50%);
            }
            .glass-sidebar {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(12px);
                border-left: 1px solid rgba(226, 232, 240, 0.8);
            }
            .nav-link-active {
                background: linear-gradient(to left, rgba(59, 130, 246, 0.1), transparent);
                border-right: 4px solid #2563eb;
                color: #1e40af;
            }
            .font-black { font-weight: 900; }
        </style>
    </head>
    <body class="font-sans antialiased text-right" x-data="{ sidebarOpen: true }">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <aside 
                class="fixed inset-y-0 right-0 z-50 w-72 glass-sidebar transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0"
                :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'"
            >
                @include('layouts.navigation')
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Header for Mobile & Actions -->
                <header class="bg-white/50 backdrop-blur-md border-b border-gray-100 lg:hidden">
                    <div class="flex items-center justify-between px-6 py-4">
                        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none focus:text-gray-700">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h2 class="text-xl font-black text-gray-800">مو لتطوير الويب</h2>
                    </div>
                </header>

                <main class="flex-1 overflow-y-auto p-6 md:p-12">
                    <!-- Global Notifications -->
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="fixed top-8 left-1/2 -translate-x-1/2 z-[100] w-full max-w-md px-6">
                        @if(session('success'))
                            <div class="bg-white/90 backdrop-blur-xl border border-green-100 shadow-[0_20px_50px_rgba(0,0,0,0.1)] rounded-3xl p-6 flex items-center space-x-4 space-x-reverse animate-in slide-in-from-top duration-500">
                                <div class="w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-green-100">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-black text-gray-900 leading-none mb-1">تم العملية بنجاح!</h4>
                                    <p class="text-xs font-bold text-gray-500">{{ session('success') }}</p>
                                </div>
                                <button @click="show = false" class="text-gray-300 hover:text-gray-500 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>
                        @endif

                        @if(session('error') || $errors->any())
                            <div class="bg-white/90 backdrop-blur-xl border border-red-100 shadow-[0_20px_50px_rgba(0,0,0,0.1)] rounded-3xl p-6 flex items-center space-x-4 space-x-reverse animate-in slide-in-from-top duration-500">
                                <div class="w-12 h-12 bg-red-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-red-100">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-black text-gray-900 leading-none mb-1">عذراً، حدث خطأ!</h4>
                                    <p class="text-xs font-bold text-gray-500">{{ session('error') ?? 'يرجى مراجعة البيانات المدخلة.' }}</p>
                                </div>
                                <button @click="show = false" class="text-gray-300 hover:text-gray-500 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Page Heading (Optional) -->
                    @isset($header)
                        <div class="mb-12">
                            {{ $header }}
                        </div>
                    @endisset

                    <!-- Content Slot -->
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
