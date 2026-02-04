<x-guest-layout>

    <section class="min-h-screen flex items-center justify-center
                    bg-gradient-to-br from-indigo-50 via-white to-purple-50">

        <div class="w-full max-w-md px-6">

            {{-- CARD --}}
            <div class="bg-white/80 backdrop-blur-xl
                        rounded-3xl shadow-xl border border-indigo-100
                        p-8">

                {{-- LOGO / TITLE --}}
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo2.png') }}"
                         class="h-14 mx-auto mb-4"
                         alt="Logo">

                    <h1 class="text-2xl font-bold text-gray-800">
                        Welcome Back 👋
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Login untuk melanjutkan ke dashboard
                    </p>
                </div>

                {{-- SESSION STATUS --}}
                <x-auth-session-status class="mb-4 text-center"
                                       :status="session('status')" />

                {{-- FORM --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- EMAIL --}}
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            class="mt-1 block w-full rounded-xl"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            class="mt-1 block w-full rounded-xl"
                            required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- REMEMBER --}}
                    <div class="flex items-center justify-between text-sm">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ms-2 text-gray-600">
                                Remember me
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-indigo-600 hover:text-indigo-700 font-medium">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                            class="w-full py-3 rounded-xl text-white font-semibold
                                   bg-gradient-to-r from-indigo-600 to-purple-600
                                   hover:opacity-90 transition shadow-lg">
                        Log in
                    </button>
                </form>

                {{-- FOOTER --}}
                <div class="text-center mt-6 text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                       class="font-semibold text-indigo-600 hover:text-indigo-700">
                        Register
                    </a>
                </div>

            </div>
        </div>
    </section>

</x-guest-layout>
