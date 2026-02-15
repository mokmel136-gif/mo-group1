<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-8">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-3">
                <x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" class="font-black text-gray-700 text-sm" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="w-full bg-gray-50 border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-300 transition-all duration-300 font-bold p-4" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-xs font-bold" />
            </div>

            <div class="space-y-3">
                <x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" class="font-black text-gray-700 text-sm" />
                <x-text-input id="update_password_password" name="password" type="password" class="w-full bg-gray-50 border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-300 transition-all duration-300 font-bold p-4" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="text-xs font-bold" />
            </div>

            <div class="space-y-3">
                <x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور')" class="font-black text-gray-700 text-sm" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-gray-50 border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-300 transition-all duration-300 font-bold p-4" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-xs font-bold" />
            </div>
        </div>

        <div class="flex items-center gap-6 pt-6">
            <button type="submit" class="px-10 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2.5xl font-black shadow-lg shadow-indigo-100 hover:shadow-xl hover:shadow-indigo-200 hover:-translate-y-1 transition duration-300">
                تحديث كلمة المرور
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-black flex items-center"
                >
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                    تم التحديث بنجاح
                </p>
            @endif
        </div>
    </form>
</section>
