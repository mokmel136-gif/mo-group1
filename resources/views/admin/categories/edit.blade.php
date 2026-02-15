<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-gray-900 leading-tight">
            {{ isset($category) ? 'تعديل' : 'إضافة' }} <span class="text-pink-600">تصنيف</span>
        </h2>
        <p class="text-gray-400 font-bold mt-2">إدارة تصنيفات المشاريع لتنظيم أعمالك بشكل أفضل.</p>
    </x-slot>

    <div class="space-y-12 pb-24">
        <div class="bg-white overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] sm:rounded-[3.5rem] border border-gray-50 relative group max-w-2xl mx-auto">
            <div class="absolute top-0 left-0 w-64 h-64 bg-pink-50/50 rounded-full blur-3xl -ml-32 -mt-32 group-hover:bg-pink-100 transition duration-1000"></div>
            
            <div class="p-12 relative z-10 text-right">
                <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST" class="space-y-10">
                    @csrf
                    @if(isset($category)) @method('PUT') @endif
                    
                    <div class="space-y-4">
                        <label class="block text-sm font-black text-gray-700">اسم التصنيف</label>
                        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-pink-300 focus:ring-4 focus:ring-pink-100 p-6 transition font-bold @error('name') border-red-300 @enderror" placeholder="مثلاً: تطوير واجهات، تطبيقات موبايل..." required autoFocus>
                        @error('name') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-start space-x-6 space-x-reverse pt-8">
                        <x-primary-button class="px-12 py-5 bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 text-white rounded-2.5xl font-black shadow-xl shadow-pink-100 hover:shadow-2xl hover:shadow-pink-200 hover:-translate-y-1 transition duration-300 text-lg">
                            {{ isset($category) ? 'تحديث التصنيف' : 'إضافة التصنيف الآن' }}
                        </x-primary-button>
                        <a href="{{ route('admin.categories.index') }}" class="text-gray-400 font-black hover:text-gray-600 transition flex items-center">
                            <span>إلغاء والعودة</span>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2"></path></svg>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
