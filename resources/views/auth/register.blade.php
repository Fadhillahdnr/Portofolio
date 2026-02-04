<x-guest-layout>

    <section class="min-h-screen flex items-center justify-center
                    bg-gradient-to-br from-indigo-50 via-white to-purple-50">

        <div class="w-full max-w-md px-6">

            {{-- CARD --}}
            <div class="bg-white/80 backdrop-blur-xl
                        rounded-3xl shadow-xl border border-indigo-100
                        p-8">

                {{-- HEADER --}}
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo2.png') }}"
                         class="h-14 mx-auto mb-4"
                         alt="Logo">

                    <h1 class="text-2xl font-bold text-gray-800">
                        Buat Akun Baru
                    </h1>

                    <p class="text-sm text-gray-500 mt-2">
                        Daftar untuk mengakses dashboard dan fitur admin
                    </p>
                </div>

                {{-- FORM --}}
                <form method="POST"
                      action="{{ route('register') }}"
                      class="space-y-5">
                    @csrf

                    {{-- NAME --}}
                    <div>
                        <x-input-label for="name" value="Nama Lengkap" />
                        <x-text-input
                            id="name"
                            type="text"
                            name="name"
                            class="mt-1 block w-full rounded-xl"
                            :value="old('name')"
                            required
                            autofocus />
                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2" />
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            class="mt-1 block w-full rounded-xl"
                            :value="old('email')"
                            required />
                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            class="mt-1 block w-full rounded-xl"
                            required />
                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" />
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                        <x-text-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            class="mt-1 block w-full rounded-xl"
                            required />
                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2" />
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                            class="w-full py-3 rounded-xl text-white font-semibold
                                   bg-gradient-to-r from-indigo-600 to-purple-600
                                   hover:opacity-90 transition shadow-lg">
                        Register
                    </button>
                </form>

                {{-- FOOTER --}}
                <div class="text-center mt-6 text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                       class="text-indigo-600 font-medium hover:text-indigo-700">
                        Login
                    </a>
                </div>

            </div>
        </div>
    </section>

</x-guest-layout>
