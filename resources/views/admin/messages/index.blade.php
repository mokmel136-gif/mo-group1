<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-4xl text-gray-900 leading-tight">
            بريد <span class="text-pink-600">الرسائل</span>
        </h2>
        <p class="text-gray-400 font-bold mt-2">تواصل مع عملائك وتابع استفساراتهم من مكان واحد.</p>
    </x-slot>

    <div class="space-y-8">
        @forelse($messages as $message)
            <div class="bg-white overflow-hidden shadow-[0_30px_60px_-15px_rgba(0,0,0,0.05)] sm:rounded-[3rem] border-2 {{ $message->is_read ? 'border-transparent opacity-80' : 'border-blue-100' }} transition duration-500 hover:shadow-2xl group relative">
                <div class="p-10 flex flex-col md:flex-row items-start justify-between">
                    <div class="flex-grow text-right">
                        <div class="flex items-center space-x-4 space-x-reverse mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br {{ $message->is_read ? 'from-gray-100 to-gray-200 text-gray-400' : 'from-blue-600 to-indigo-600 text-white' }} rounded-2xl flex items-center justify-center font-black text-xl shadow-lg">
                                {{ mb_substr($message->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-black text-xl text-gray-900">{{ $message->name }}</h3>
                                <p class="text-xs font-bold text-gray-400">{{ $message->email }}</p>
                            </div>
                            @if(!$message->is_read)
                                <span class="bg-blue-600 text-white text-[10px] px-4 py-1.5 rounded-full font-black uppercase tracking-widest shadow-lg shadow-blue-100 mr-4">رسالة جديدة</span>
                            @endif
                        </div>
                        
                        <div class="bg-gray-50/50 p-8 rounded-[2rem] border border-gray-100">
                            <div class="text-lg font-black text-gray-800 mb-4">{{ $message->subject ?? '(بدون عنوان)' }}</div>
                            <p class="text-gray-500 leading-relaxed font-bold text-sm">{{ $message->message }}</p>
                        </div>
                        
                        <div class="mt-6 flex items-center text-xs text-gray-300 font-black">
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2"></path></svg>
                            وصلت قبل {{ $message->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 space-x-reverse mt-8 md:mt-0 opacity-0 group-hover:opacity-100 transition duration-300">
                        <form action="{{ route('admin.messages.update', $message) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="p-4 bg-blue-50 text-blue-600 rounded-2xl hover:bg-blue-600 hover:text-white transition shadow-sm" title="تحديد كـ {{ $message->is_read ? 'غير مقروء' : 'مقروء' }}">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </button>
                        </form>
                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-4 bg-pink-50 text-pink-600 rounded-2xl hover:bg-pink-600 hover:text-white transition shadow-sm" onclick="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')" title="حذف">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-40 bg-white rounded-[4rem] border border-gray-50 shadow-sm">
                <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-16 h-16 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <p class="text-2xl font-black text-gray-300">صندوق الوارد فارغ حالياً.</p>
            </div>
        @endforelse

        <div class="mt-12 px-10">
            {{ $messages->links() }}
        </div>
    </div>
</x-app-layout>
