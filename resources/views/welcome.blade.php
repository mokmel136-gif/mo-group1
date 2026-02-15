@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-bl from-blue-50 to-indigo-100 -z-10"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center relative z-10">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-extrabold tracking-wider text-blue-700 uppercase bg-blue-100 rounded-full shadow-sm">حلول ويب مبتكرة</span>
            <h1 class="text-5xl md:text-7xl font-black mb-8 leading-tight text-gray-900">
                نصنع <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">تحفاً رقمية</span> <br> تُبهر العالم
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                فريق من الباحثين والمطورين المبدعين الملتزمين ببناء مواقع احترافية، سريعة، وعالية الأداء تعزز وجودك الرقمي.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6 sm:space-x-reverse">
                <a href="{{ route('projects.index') }}" class="w-full sm:w-auto px-10 py-4 bg-gray-900 text-white rounded-2xl font-bold shadow-2xl hover:bg-gray-800 hover:-translate-y-1 transition text-lg">
                    تصفح أعمالنا
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto px-10 py-4 bg-white border border-gray-200 text-gray-900 rounded-2xl font-bold hover:bg-gray-50 transition shadow-lg text-lg">
                    ابدأ مشروعك
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-16 px-4">
                <div class="text-right">
                    <h2 class="text-4xl font-extrabold mb-4 border-r-8 border-blue-600 pr-5">أحدث المشاريع</h2>
                    <p class="text-gray-500 font-medium">مجموعة مختارة من أعمالنا المبتكرة والفريدة.</p>
                </div>
                <a href="{{ route('projects.index') }}" class="hidden md:flex items-center text-blue-600 font-bold hover:underline">
                    كل المشاريع <svg class="w-5 h-5 mr-2 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($featuredProjects as $project)
                    <div class="group relative bg-gray-50 rounded-[2.5rem] overflow-hidden border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition duration-500">
                        <div class="aspect-[4/3] overflow-hidden relative">
                            @if($project->thumbnail)
                                <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                </div>
                            @endif
                            <div class="absolute inset-x-0 bottom-0 p-6 translate-y-full group-hover:translate-y-0 transition duration-500 bg-gradient-to-t from-blue-900/80 to-transparent">
                                <span class="text-white font-bold text-sm bg-blue-600 px-3 py-1 rounded-full">{{ $project->category->name }}</span>
                            </div>
                        </div>
                        <div class="p-8 text-right">
                            <h3 class="text-2xl font-bold mb-4 group-hover:text-blue-600 transition">{{ $project->title }}</h3>
                            <p class="text-gray-500 text-sm mb-6 line-clamp-2">{{ $project->description }}</p>
                            <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center text-sm font-extrabold text-blue-600 hover:text-blue-700 transition">
                                <span class="ml-2">عرض التفاصيل</span>
                                <svg class="w-4 h-4 mr-1 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-gray-400 text-xl font-bold italic">نعمل حالياً على تجهيز مشاريعنا المذهلة. ترقبونا قريباً!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-black mb-16">عقول خلف الابتكار</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                @foreach($team as $member)
                    <div class="text-center group">
                        <div class="relative w-32 h-32 md:w-48 md:h-48 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-[3rem] rotate-12 group-hover:rotate-[20deg] transition duration-500 opacity-20"></div>
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="relative w-full h-full object-cover rounded-[3rem] shadow-xl border-4 border-white group-hover:-translate-y-2 transition duration-500">
                            @else
                                <div class="relative w-full h-full bg-blue-100 rounded-[3rem] flex items-center justify-center text-blue-400 font-black text-4xl border-4 border-white shadow-xl group-hover:-translate-y-2 transition duration-500">
                                    {{ mb_substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <h4 class="font-extrabold text-xl mb-2">{{ $member->name }}</h4>
                        <p class="text-blue-600 font-bold text-sm bg-blue-50 inline-block px-4 py-1 rounded-full">{{ $member->role }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-[3.5rem] p-12 md:p-24 text-center text-white shadow-[0_35px_60px_-15px_rgba(59,130,246,0.3)] relative overflow-hidden">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full -ml-32 -mt-32 blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mb-32 blur-3xl"></div>
                
                <h2 class="text-4xl md:text-5xl font-black mb-8 relative z-10 leading-tight">هل لديك رؤية؟ <br> دعنا نحولها إلى واقع ملموس.</h2>
                <p class="text-blue-100 text-lg mb-12 max-w-xl mx-auto relative z-10 font-medium">اتصل بنا اليوم للحصول على استشارة مجانية خارطة طريق لمشروعك مصممة خصيصاً لاحتياجاتك.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6 sm:space-x-reverse relative z-10">
                    <a href="{{ route('contact') }}" class="px-12 py-5 bg-white text-blue-600 rounded-2xl font-black shadow-2xl hover:-translate-y-1 transition text-xl">
                        ابدأ الآن
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
