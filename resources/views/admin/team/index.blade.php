<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-50 text-right">
            <div>
                <h2 class="font-black text-3xl text-gray-900 leading-tight">
                    نادي <span class="text-blue-600">المبدعين</span>
                </h2>
                <p class="text-gray-400 font-bold mt-1 text-sm">أعضاء فريقك الذين يصنعون الفارق كل يوم.</p>
            </div>
            <a href="{{ route('admin.team.create') }}" class="inline-flex items-center px-8 py-4 bg-blue-600 border border-transparent rounded-2xl font-black text-sm text-white hover:bg-blue-700 transition ease-in-out duration-150 shadow-2xl shadow-blue-200 group">
                <svg class="w-5 h-5 ml-2 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round"></path></svg>
                إضافة عضو جديد
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($members as $member)
            <div class="bg-white overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] sm:rounded-[3rem] border border-gray-50 flex flex-col group hover:shadow-2xl transition duration-500 relative">
                <div class="p-10 text-right">
                    <div class="flex items-center mb-8">
                        <div class="relative ml-6 shrink-0">
                            <div class="absolute -inset-3 bg-blue-600 rounded-[2rem] rotate-6 opacity-0 group-hover:opacity-10 transition duration-500"></div>
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" class="relative h-24 w-24 object-cover rounded-[1.8rem] shadow-xl border-4 border-white">
                            @else
                                <div class="relative h-24 w-24 bg-blue-50 rounded-[1.8rem] flex items-center justify-center text-blue-600 border-4 border-white shadow-xl">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-black text-2xl text-gray-900 group-hover:text-blue-600 transition">{{ $member->name }}</h3>
                            <p class="text-blue-600 font-black text-xs bg-blue-50 px-4 py-1.5 rounded-full inline-block mt-2 tracking-wide">{{ $member->role }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm flex-grow line-clamp-3 leading-relaxed font-bold">{{ $member->bio }}</p>
                </div>
                
                <div class="bg-gray-50/50 px-10 py-6 flex justify-start space-x-4 space-x-reverse mt-auto border-t border-gray-50 opacity-0 group-hover:opacity-100 transition duration-300">
                    <a href="{{ route('admin.team.edit', $member) }}" class="text-blue-600 hover:text-blue-900 text-sm font-black">تعديل الملف</a>
                    <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-pink-600 hover:text-pink-900 text-sm font-black" onclick="return confirm('هل أنت متأكد من إزالة هذا العضو؟')">إزالة العضو</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white p-32 text-center text-gray-400 rounded-[4rem] shadow-sm border border-gray-50">
                <svg class="w-32 h-32 mx-auto text-gray-100 mb-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2m12-9a4 4 0 11-8 0 4 4 0 018 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2"></path></svg>
                <p class="text-2xl font-black">لم يتم إضافة أعضاء فريق بعد.</p>
                <a href="{{ route('admin.team.create') }}" class="text-blue-600 font-black mt-4 inline-block hover:underline italic tracking-widest">كوّن فريق أحلامك الآن &rarr;</a>
            </div>
        @endforelse
    </div>
</x-app-layout>
