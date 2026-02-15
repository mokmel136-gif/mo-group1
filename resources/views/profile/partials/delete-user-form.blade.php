<section class="space-y-6">
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-10 py-4 bg-pink-100 text-pink-600 hover:bg-pink-600 hover:text-white rounded-2.5xl font-black transition duration-300 border-none shadow-none"
    >حذف الحساب بشكل نهائي</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-12 text-right">
            @csrf
            @method('delete')

            <h2 class="text-3xl font-black text-gray-900 mb-4">
                هل أنت متأكد من رغبتك في حذف الحساب؟
            </h2>

            <p class="text-gray-500 font-bold mb-8 leading-relaxed">
                بمجرد حذف حسابك، سيتم مسح جميع موارده وبياناته بشكل نهائي. يرجى إدخال كلمة المرور لتأكيد رغبتك في حذف الحساب نهائياً.
            </p>

            <div class="space-y-3">
                <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full bg-gray-50 border-gray-100 rounded-2xl focus:ring-4 focus:ring-pink-100 focus:border-pink-300 transition-all duration-300 font-bold p-4"
                    placeholder="أدخل كلمة المرور للتأكيد"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-xs font-bold" />
            </div>

            <div class="mt-10 flex items-center justify-start space-x-4 space-x-reverse">
                <button type="submit" class="px-10 py-4 bg-pink-600 text-white rounded-2.5xl font-black shadow-lg shadow-pink-100 hover:shadow-xl hover:shadow-pink-200 transition duration-300">
                    تأكيد الحذف النهائي
                </button>
                
                <button type="button" x-on:click="$dispatch('close')" class="px-10 py-4 bg-gray-100 text-gray-500 rounded-2.5xl font-black hover:bg-gray-200 transition duration-300">
                    إلغاء
                </button>
            </div>
        </form>
    </x-modal>
</section>
