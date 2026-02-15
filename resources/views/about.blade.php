@extends('layouts.frontend')

@section('content')
    <!-- About Hero -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="text-right">
                    <h1 class="text-5xl md:text-6xl font-black mb-8 leading-tight text-gray-900 border-r-8 border-blue-600 pr-6 italic">نحن نبني أدوات <br> <span class="text-blue-600 uppercase">تمكّن الفرق</span></h1>
                    <p class="text-lg text-gray-600 mb-10 leading-relaxed font-medium">
                        بدأ "مو لتطوير الويب" كمجموعة بحثية تركز على هندسة الويب عالية الأداء. اليوم، نحن وكالة خدمات متكاملة تساعد الشركات الناشئة والعلامات التجارية القائمة على بناء حضور رقمي احترافي يتسم بالابتكار والكفاءة.
                    </p>
                    <div class="grid grid-cols-2 gap-10 py-10 border-t border-gray-100">
                        <div>
                            <div class="text-4xl font-black text-blue-600 mb-2 font-heading tracking-tighter">100%</div>
                            <div class="text-sm text-gray-500 uppercase tracking-widest font-black">معدل النجاح</div>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-indigo-600 mb-2 font-heading tracking-tighter">24/7</div>
                            <div class="text-sm text-gray-500 uppercase tracking-widest font-black">دعم متواصل</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-6 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-[4rem] opacity-20 blur-3xl animate-pulse"></div>
                    <div class="relative bg-gray-50 rounded-[4rem] aspect-square overflow-hidden border border-gray-100 shadow-2xl flex items-center justify-center p-16 text-center transform hover:scale-[1.02] transition duration-700">
                        <div class="text-5xl font-black text-gray-200 uppercase tracking-tighter -rotate-12 translate-y-4 select-none">الابتكار <br> البحث <br> التصميم</div>
                        <div class="absolute inset-0 bg-blue-600/5 backdrop-blur-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Full Team -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-24 px-4">
                <h2 class="text-4xl md:text-5xl font-black mb-6">فريق النخبة</h2>
                <p class="text-gray-500 font-medium max-w-2xl mx-auto">العبقرية الجماعية التي تقف وراء كل إطلاق ناجح وتجربة رقمية استثنائية.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($team as $member)
                    <div class="bg-white rounded-[3rem] p-10 shadow-sm hover:shadow-2xl transition duration-500 border border-transparent hover:border-blue-100 text-right group">
                        <div class="relative mb-8">
                            <div class="absolute inset-0 bg-blue-600 rounded-3xl rotate-12 group-hover:rotate-[15deg] transition duration-500 opacity-10"></div>
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" alt="{{ $member->name }}" class="w-24 h-24 object-cover rounded-3xl mb-6 shadow-xl border-4 border-white group-hover:-translate-y-2 transition duration-500">
                            @else
                                <div class="w-24 h-24 bg-blue-50 rounded-3xl mb-6 flex items-center justify-center text-blue-600 text-4xl font-black border-4 border-white shadow-xl group-hover:-translate-y-2 transition duration-500">
                                    {{ mb_substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <h3 class="text-2xl font-black mb-2">{{ $member->name }}</h3>
                        <p class="text-blue-600 font-bold text-sm mb-6 uppercase tracking-widest bg-blue-50 inline-block px-4 py-1 rounded-full">{{ $member->role }}</p>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 font-medium">{{ $member->bio }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
