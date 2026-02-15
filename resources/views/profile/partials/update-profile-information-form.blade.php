<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-8">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-3">
                <x-input-label for="name" :value="__('الاسم الكامل')" class="font-black text-gray-700 text-sm" />
                <x-text-input id="name" name="name" type="text" class="w-full bg-gray-50 border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-300 transition-all duration-300 font-bold p-4" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="text-xs font-bold" :messages="$errors->get('name')" />
            </div>

            <div class="space-y-3">
                <x-input-label for="email" :value="__('البريد الإلكتروني')" class="font-black text-gray-700 text-sm" />
                <x-text-input id="email" name="email" type="email" class="w-full bg-gray-50 border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-300 transition-all duration-300 font-bold p-4" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="text-xs font-bold" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-amber-50 rounded-2xl border border-amber-100">
                        <p class="text-sm font-bold text-amber-800">
                            {{ __('عنوان بريدك الإلكتروني غير مفعّل.') }}

                            <button form="send-verification" class="mr-2 underline text-amber-600 hover:text-amber-900 transition font-black">
                                {{ __('اضغط هنا لإعادة إرسال رابط التفعيل.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-black text-sm text-green-600">
                                {{ __('تم إرسال رابط تفعيل جديد إلى بريدك الإلكتروني.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-6 pt-6">
            <button type="submit" class="px-10 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2.5xl font-black shadow-lg shadow-blue-100 hover:shadow-xl hover:shadow-blue-200 hover:-translate-y-1 transition duration-300">
                حفظ التغييرات
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-black flex items-center"
                >
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path></svg>
                    تم الحفظ بنجاح
                </p>
            @endif
        </div>
    </form>
</section>
