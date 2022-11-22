<x-guest-layout>
    <x-auth-card>
        <div class="text-center">
            <a href="" class="text-3xl font-bold mx-auto text-white">Sari Roti</a><br>
            <span class="text-center text-white">Aceh Utara</span>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 items-center justify-between mt-4">
                <button class="w-full bg-primary py-2.5 rounded-md text-white">Masuk</button>
                <span class="text-center text-white py-3">Atau</span>
                <div class="w-full pb-5">
                    <a href="{{ route('redirecttogoogle') }}" class="flex justify-center items-center text-primary">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2048px-Google_%22G%22_Logo.svg.png"
                            alt="" class="w-4 mr-2"> Masuk dengan Google
                    </a>
                </div>
            </div>
        </form>
        <hr class="pb-5">
        <div class="card">
            <a class="text-xs text-dark hover:text-slate-900 text-center" href="{{ route('register') }}">
                Belum Registrasi? <span class="font-semibold text-primary"> Silahkan Registrasi!</span>
            </a>
        </div>
        </form>
    </x-auth-card>
</x-guest-layout>
