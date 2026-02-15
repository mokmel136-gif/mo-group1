<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50 text-right">
            <div>
                <h2 class="font-black text-3xl text-gray-900 leading-tight">
                    إدارة <span class="text-indigo-600">التصنيفات</span>
                </h2>
                <p class="text-gray-400 font-bold mt-1 text-sm">نظم مشاريعك من خلال تصنيفات ذكية وواضحة.</p>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-8 py-4 bg-indigo-600 border border-transparent rounded-2xl font-black text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-100 transition ease-in-out duration-150 shadow-2xl shadow-indigo-200 group">
                <svg class="w-5 h-5 ml-2 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round"></path></svg>
                إضافة تصنيف جديد
            </a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-[0_30px_80px_-20px_rgba(0,0,0,0.05)] sm:rounded-[3rem] border border-gray-50">
        <div class="p-0">
            <div class="overflow-x-auto text-right">
                <table class="min-w-full divide-y divide-gray-50">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-10 py-6 text-right text-xs font-black text-gray-400 uppercase tracking-widest">اسم التصنيف</th>
                            <th class="px-10 py-6 text-right text-xs font-black text-gray-400 uppercase tracking-widest">الرابط القصير (Slug)</th>
                            <th class="px-10 py-6 text-left text-xs font-black text-gray-400 uppercase tracking-widest">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($categories as $category)
                            <tr class="hover:bg-indigo-50/30 transition duration-300 group">
                                <td class="px-10 py-8 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 ml-4 font-black text-xl shadow-sm border border-white">
                                            {{ mb_substr($category->name, 0, 1) }}
                                        </div>
                                        <span class="text-lg font-black text-gray-900 group-hover:text-indigo-600 transition">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td class="px-10 py-8 whitespace-nowrap">
                                    <span class="text-sm font-bold text-gray-400 bg-gray-50 px-4 py-1.5 rounded-xl border border-gray-100">
                                        {{ $category->slug }}
                                    </span>
                                </td>
                                <td class="px-10 py-8 whitespace-nowrap text-left text-sm font-black">
                                    <div class="flex items-center justify-end space-x-4 space-x-reverse opacity-0 group-hover:opacity-100 transition duration-300">
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="p-3 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">تعديل</a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-3 bg-pink-50 text-pink-600 rounded-xl hover:bg-pink-600 hover:text-white transition" onclick="return confirm('هل أنت متأكد؟ سيؤثر هذا على المشاريع المرتبطة بهذا التصنيف.')">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-10 py-32 text-center text-gray-400">
                                    <p class="text-xl font-black">لم يتم العثور على تصنيفات.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
