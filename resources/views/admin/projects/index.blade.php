<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50">
            <div>
                <h2 class="font-black text-3xl text-gray-900 leading-tight">
                    معرض <span class="text-blue-600">المشاريع</span>
                </h2>
                <p class="text-gray-400 font-bold mt-1 text-sm">إدارة وتحليل جميع مشاريعك الرقمية من هنا.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-8 py-4 bg-blue-600 border border-transparent rounded-2xl font-black text-sm text-white hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-100 transition ease-in-out duration-150 shadow-2xl shadow-blue-200 group">
                <svg class="w-5 h-5 ml-2 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round"></path></svg>
                إضافة مشروع جديد
            </a>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-[0_30px_80px_-20px_rgba(0,0,0,0.05)] sm:rounded-[3rem] border border-gray-50">
        <div class="p-0"> {{-- Removed padding for edge-to-edge table --}}
            <div class="overflow-x-auto text-right">
                <table class="min-w-full divide-y divide-gray-50">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-10 py-6 text-right text-xs font-black text-gray-400 uppercase tracking-widest">المشروع</th>
                            <th class="px-10 py-6 text-right text-xs font-black text-gray-400 uppercase tracking-widest">التصنيف</th>
                            <th class="px-10 py-6 text-right text-xs font-black text-gray-400 uppercase tracking-widest">الحالة</th>
                            <th class="px-10 py-6 text-left text-xs font-black text-gray-400 uppercase tracking-widest">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($projects as $project)
                            <tr class="hover:bg-blue-50/30 transition duration-300 group">
                                <td class="px-10 py-8 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="relative ml-6 shrink-0">
                                            @if($project->thumbnail)
                                                <img src="{{ Storage::url($project->thumbnail) }}" class="h-20 w-20 object-cover rounded-[1.5rem] shadow-xl border-4 border-white">
                                            @else
                                                <div class="h-20 w-20 bg-blue-50 rounded-[1.5rem] flex items-center justify-center text-blue-300 border-4 border-white shadow-xl">
                                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2"></path></svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="text-lg font-black text-gray-900 group-hover:text-blue-600 transition">{{ $project->title }}</div>
                                            <div class="text-xs text-gray-400 font-bold mt-1">أضيف في {{ $project->created_at->format('Y/m/d') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-10 py-8 whitespace-nowrap">
                                    <span class="px-5 py-2 inline-flex text-xs leading-5 font-black rounded-xl bg-gray-100 text-gray-500 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                                        {{ $project->category->name }}
                                    </span>
                                </td>
                                <td class="px-10 py-8 whitespace-nowrap">
                                    @if($project->status === 'published')
                                        <span class="flex items-center text-green-600 font-black text-sm">
                                            <span class="w-2 h-2 bg-green-500 rounded-full ml-2 animate-ping"></span>
                                            منشور
                                        </span>
                                    @else
                                        <span class="flex items-center text-gray-400 font-black text-sm">
                                            <span class="w-2 h-2 bg-gray-400 rounded-full ml-2"></span>
                                            مسودة
                                        </span>
                                    @endif
                                </td>
                                <td class="px-10 py-8 whitespace-nowrap text-left text-sm font-black">
                                    <div class="flex items-center justify-end space-x-4 space-x-reverse opacity-0 group-hover:opacity-100 transition duration-300">
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="p-3 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition">تعديل</a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-3 bg-pink-50 text-pink-600 rounded-xl hover:bg-pink-600 hover:text-white transition" onclick="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-10 py-32 text-center text-gray-400">
                                    <svg class="w-24 h-24 mx-auto text-gray-100 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <p class="text-xl font-black">لا توجد مشاريع مضافة بعد.</p>
                                    <a href="{{ route('admin.projects.create') }}" class="text-blue-600 font-black mt-4 inline-block hover:underline italic tracking-widest">أنشئ أول مشروع لك الآن!</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
