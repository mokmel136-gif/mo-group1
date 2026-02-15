@extends('layouts.frontend')

@section('content')
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-50 rounded-full blur-3xl -mr-48 -mt-48 opacity-50"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                <div class="text-right">
                    <h1 class="text-5xl md:text-6xl font-black mb-8 tracking-tight text-gray-900 leading-tight">تواصل <span class="text-blue-600">معنا</span></h1>
                    <p class="text-xl text-gray-500 mb-16 leading-relaxed font-medium">هل أنت مستعد لنقل عملك إلى المستوى التالي؟ املأ النموذج وسيقوم فريقنا بالرد عليك خلال أقل من 24 ساعة.</p>
                    
                    <div class="space-y-12">
                        <div class="flex items-start">
                            <div class="bg-blue-600 p-5 rounded-[2rem] text-white shadow-xl shadow-blue-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <div class="mr-8">
                                <h4 class="font-black text-gray-900 text-xl mb-2">راسلنا عبر البريد</h4>
                                <p class="text-gray-500 font-bold">info@mo-web-site.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-600 p-5 rounded-[2rem] text-white shadow-xl shadow-indigo-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <div class="mr-8">
                                <h4 class="font-black text-gray-900 text-xl mb-2">تفضل بزيارتنا</h4>
                                <p class="text-gray-500 font-bold">شارع الابتكار، مدينة التقنية، 90210</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -inset-8 bg-gray-50 rounded-[4rem] -z-10 rotate-3 transition duration-700"></div>
                    <div class="bg-white rounded-[3.5rem] p-10 md:p-16 shadow-[0_50px_100px_-20px_rgba(0,0,0,0.1)] border border-gray-100 relative">
                        @if(session('success'))
                            <div class="text-center py-20">
                                <div class="bg-green-100 text-green-600 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-8 animate-bounce">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <h2 class="text-3xl font-black text-gray-900 mb-4">{{ session('success') }}</h2>
                                <p class="text-gray-500 font-medium">سنتصل بك قريباً جداً.</p>
                            </div>
                        @else
                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="space-y-8 text-right">
                                    <div>
                                        <label class="block text-sm font-black text-gray-700 mb-3 px-2">الاسم الكامل</label>
                                        <input type="text" name="name" class="w-full px-6 py-5 rounded-[1.5rem] bg-gray-50 border-2 border-transparent focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition outline-none font-bold placeholder-gray-400" placeholder="مثال: أحمد محمد" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-black text-gray-700 mb-3 px-2">البريد الإلكتروني</label>
                                        <input type="email" name="email" class="w-full px-6 py-5 rounded-[1.5rem] bg-gray-50 border-2 border-transparent focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition outline-none font-bold placeholder-gray-400 text-left dir-ltr" placeholder="ahmed@example.com" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-black text-gray-700 mb-3 px-2">موضوع الرسالة</label>
                                        <input type="text" name="subject" class="w-full px-6 py-5 rounded-[1.5rem] bg-gray-50 border-2 border-transparent focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition outline-none font-bold placeholder-gray-400" placeholder="عن ماذا تود الاستفسار؟">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-black text-gray-700 mb-3 px-2">رسالتك</label>
                                        <textarea name="message" rows="5" class="w-full px-6 py-5 rounded-[1.5rem] bg-gray-50 border-2 border-transparent focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition outline-none font-bold placeholder-gray-400" placeholder="أخبرنا بالمزيد عن مشروعك..." required></textarea>
                                    </div>
                                    <button type="submit" class="w-full py-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-[1.5rem] font-black shadow-2xl hover:shadow-blue-300 hover:-translate-y-1 transition text-xl mt-6 tracking-wide">
                                        إرسال الرسالة
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
