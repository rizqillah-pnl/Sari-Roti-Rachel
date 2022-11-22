<x-guest-layout>
    <x-auth-card>
        <div class="text-center">
            <a href="" class="text-3xl font-bold mx-auto text-white">Sari Roti</a><br>
            <span class="text-center text-white">Aceh Utara</span>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button class="w-full bg-primary py-2.5 rounded-md text-white">Masuk</button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <a class="text-xs text-dark hover:text-primary" href="{{ route('login') }}">
                Sudah daftar? <span class="font-semibold text-primary text-center"> Silahkan Login!</span>
            </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
