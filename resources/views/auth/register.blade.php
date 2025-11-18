<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!--cpf-->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('Cpf')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" maxlength="14" OnKeyPress="formatarCpf('###.###.###-##',this)" placeholder="000.000.000-00" required />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>
        <!--Nascimento-->
        <div class="mt-4">
            <x-input-label for="dtnascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="dtnascimento" class="block mt-1 w-full" type="date" name="dtnascimento" :value="old('dtnascimento')" required />
        </div>
        <!--Telefone-->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone com DDD')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" maxlength="15" OnKeyPress="formatarTel('(##)-#####-####',this)" placeholder="(XX) XXXXX-XXXX" required />
        </div>
        <!--endereco-->
        <div class="mt-4">
            <x-input-label for="endereco" :value="__('Endereco')" />
            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" required />
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
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                <p>Já tem cadastrado?</p>
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>