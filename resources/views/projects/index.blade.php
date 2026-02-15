@extends('layouts.frontend')

@section('content')
    <!-- Page Header -->
    <section class="py-24 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-right">
            <h1 class="text-4xl md:text-6xl font-black mb-6 tracking-tight text-gray-900 border-r-8 border-blue-600 pr-6">مشاريعنا</h1>
            <p class="text-lg text-gray-500 max-w-2xl leading-relaxed font-medium">استكشف محفظتنا المتنوعة من تطبيقات الويب المبتكرة والمشاريع البحثية الإبداعية.</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filters -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-16">
                <div class="flex flex-wrap gap-4 order-2 md:order-1">
                    <a href="{{ route('projects.index') }}" class="px-8 py-3 rounded-2xl text-sm font-black transition {{ !request('category') ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' : 'bg-white border border-gray-200 text-gray-600 hover:bg-white hover:border-blue-300' }}">
                        الكل
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('projects.index', ['category' => $cat->slug]) }}" class="px-8 py-3 rounded-2xl text-sm font-black transition {{ request('category') == $cat->slug ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' : 'bg-white border border-gray-200 text-gray-600 hover:bg-white hover:border-blue-300' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>

                <form action="{{ route('projects.index') }}" method="GET" class="relative order-1 md:order-2 w-full md:w-auto">
                    @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن مشروع..." class="w-full md:w-80 pr-12 pl-4 py-4 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-400 outline-none transition shadow-sm font-bold">
                    <svg class="w-6 h-6 text-gray-400 absolute right-4 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round"></path></svg>
                </form>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($projects as $project)
                    <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition duration-500">
                        <div class="aspect-[4/3] relative overflow-hidden">
                            @if($project->thumbnail)
                                <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-blue-50 flex items-center justify-center text-blue-200">
                                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                </div>
                            @endif
                            
                            <div class="absolute inset-0 bg-blue-900/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                <a href="{{ route('projects.show', $project) }}" class="px-8 py-4 bg-white text-blue-600 rounded-2xl text-sm font-black hover:bg-gray-100 transition shadow-2xl translate-y-4 group-hover:translate-y-0 duration-500">عرض التفاصيل</a>
                            </div>
                        </div>
                        <div class="p-8 text-right">
                            <span class="text-xs font-black text-blue-600 uppercase tracking-widest px-3 py-1 bg-blue-50 rounded-full">{{ $project->category->name }}</span>
                            <h3 class="text-2xl font-black mt-4 mb-3">{{ $project->title }}</h3>
                            <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed mb-8 font-medium">{{ $project->description }}</p>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-50 italic text-xs text-gray-400">
                                <span>تم النشر في {{ $project->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="text-blue-100 mb-6 flex justify-center">
                            <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-gray-600">لا توجد مشاريع تطابق بحثك</h3>
                        <p class="text-gray-400 mt-2 font-medium">حاول تغيير كلمات البحث أو اختيار تصنيف آخر.</p>
                        <a href="{{ route('projects.index') }}" class="mt-8 inline-block px-10 py-3 bg-blue-600 text-white rounded-2xl font-black shadow-xl">إعادة ضبط البحث</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-20">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection
