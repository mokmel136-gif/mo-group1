<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-gray-900 leading-tight">
            {{ isset($team) ? 'تعديل' : 'إضافة' }} <span class="text-blue-600">عضو فريق</span>
        </h2>
        <p class="text-gray-400 font-bold mt-2">قم بإضافة النجوم الذين يقفون خلف نجاح مشاريعك.</p>
    </x-slot>

    <div class="space-y-12 pb-24">
        <div class="bg-white overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] sm:rounded-[3.5rem] border border-gray-50 relative group max-w-3xl mx-auto">
            <div class="absolute top-0 left-0 w-64 h-64 bg-blue-50/50 rounded-full blur-3xl -ml-32 -mt-32 group-hover:bg-blue-100 transition duration-1000"></div>
            
            <div class="p-12 relative z-10 text-right">
                <form action="{{ isset($team) ? route('admin.team.update', $team) : route('admin.team.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @if(isset($team)) @method('PUT') @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label class="block text-sm font-black text-gray-700">الاسم الكامل</label>
                            <input type="text" name="name" value="{{ old('name', $team->name ?? '') }}" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold @error('name') border-red-300 @enderror" placeholder="مثلاً: محمد أحمد" required>
                            @error('name') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                        </div>
                        <div class="space-y-4">
                            <label class="block text-sm font-black text-gray-700">المسمى الوظيفي</label>
                            <input type="text" name="role" value="{{ old('role', $team->role ?? '') }}" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold @error('role') border-red-300 @enderror" placeholder="مثلاً: كبير المطورين" required>
                            @error('role') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-black text-gray-700">الصورة الشخصية</label>
                        <div class="relative group/file">
                            @if(isset($team) && $team->image)
                                <div class="mb-4">
                                    <img src="{{ Storage::url($team->image) }}" class="w-32 h-32 object-cover rounded-3xl shadow-lg border-4 border-white">
                                </div>
                            @endif
                            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-400 font-bold file:ml-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">
                        </div>
                        @error('image') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-start space-x-6 space-x-reverse pt-8">
                        <x-primary-button class="px-12 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-2.5xl font-black shadow-xl shadow-blue-100 hover:shadow-2xl hover:shadow-blue-200 hover:-translate-y-1 transition duration-300 text-lg">
                            {{ isset($team) ? 'تحديث البيانات' : 'إضافة العضو الآن' }}
                        </x-primary-button>
                        <a href="{{ route('admin.team.index') }}" class="text-gray-400 font-black hover:text-gray-600 transition flex items-center">
                            <span>إلغاء والعودة</span>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2"></path></svg>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
