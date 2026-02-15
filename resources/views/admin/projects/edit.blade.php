<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-gray-900 leading-tight">
            {{ isset($project) ? 'تعديل' : 'إضافة' }} <span class="text-blue-600">مشروع</span>
        </h2>
        <p class="text-gray-400 font-bold mt-2">قم بتعبئة البيانات أدناه لإدارة مشاريعك باحترافية.</p>
    </x-slot>

    <div class="space-y-12 pb-24">
        <div class="bg-white overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] sm:rounded-[3.5rem] border border-gray-50 relative group">
            <div class="absolute top-0 left-0 w-64 h-64 bg-blue-50/50 rounded-full blur-3xl -ml-32 -mt-32 group-hover:bg-blue-100 transition duration-1000"></div>
            
            <div class="p-12 relative z-10 text-right">
                <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @if(isset($project)) @method('PUT') @endif
                    
                    <div class="space-y-4">
                        <label class="block text-sm font-black text-gray-700">عنوان المشروع</label>
                        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold @error('title') border-red-300 @enderror" placeholder="مثلاً: منصة تجارة إلكترونية متكاملة" required>
                        @error('title') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label class="block text-sm font-black text-gray-700">التصنيف</label>
                            <select name="category_id" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold appearance-none cursor-pointer @error('category_id') border-red-300 @enderror" required>
                                <option value="">اختر التصنيف الرئيسي</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $project->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                        </div>
                        <div class="space-y-4">
                            <label class="block text-sm font-black text-gray-700">الحالة</label>
                            <select name="status" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold appearance-none cursor-pointer">
                                <option value="published" {{ old('status', $project->status ?? 'published') == 'published' ? 'selected' : '' }}>منشور للعامة</option>
                                <option value="draft" {{ old('status', $project->status ?? '') == 'draft' ? 'selected' : '' }}>مسودة خاصة</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-black text-gray-700">وصف المشروع</label>
                        <textarea name="description" rows="6" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold @error('description') border-red-300 @enderror" placeholder="اكتب تفاصيل وإنجازات هذا المشروع هنا...">{{ old('description', $project->description ?? '') }}</textarea>
                        @error('description') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label class="block text-sm font-black text-gray-700">الصورة الرئيسية (Thumbnail)</label>
                            <div class="relative group/file">
                                @if(isset($project) && $project->thumbnail)
                                    <div class="mb-4">
                                        <img src="{{ Storage::url($project->thumbnail) }}" class="h-32 w-full object-cover rounded-2xl shadow-lg border-2 border-white">
                                    </div>
                                @endif
                                <input type="file" name="thumbnail" accept="image/*" class="w-full text-sm text-gray-400 font-bold file:ml-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">
                            </div>
                            @error('thumbnail') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                        </div>
                        <div class="space-y-4">
                            <label class="block text-sm font-black text-gray-700">رابط العرض المباشر (اختياري)</label>
                            <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}" placeholder="https://yourproject.com" class="w-full rounded-2.5xl border-gray-100 bg-gray-50/50 shadow-sm focus:border-blue-300 focus:ring-4 focus:ring-blue-100 p-6 transition font-bold @error('demo_url') border-red-300 @enderror">
                            @error('demo_url') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-black text-gray-700">ملف المشروع (للتحميل)</label>
                        <input type="file" name="file_path" class="w-full text-sm text-gray-400 font-bold file:ml-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:bg-gray-100 file:text-gray-600 hover:file:bg-gray-200 transition cursor-pointer">
                        @if(isset($project) && $project->file_path)
                            <p class="text-[10px] font-black text-blue-600 mt-2">يوجد ملف مرفق مسبقاً</p>
                        @endif
                        @error('file_path') <p class="text-xs font-black text-red-500 mt-2">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-start space-x-6 space-x-reverse pt-8">
                        <x-primary-button class="px-12 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-2.5xl font-black shadow-xl shadow-blue-100 hover:shadow-2xl hover:shadow-blue-200 hover:-translate-y-1 transition duration-300 text-lg">
                            {{ isset($project) ? 'تحديث المشروع' : 'إنشاء المشروع الآن' }}
                        </x-primary-button>
                        <a href="{{ route('admin.projects.index') }}" class="text-gray-400 font-black hover:text-gray-600 transition flex items-center">
                            <span>إلغاء والعودة</span>
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-width="2"></path></svg>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
