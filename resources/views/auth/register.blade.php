<x-app-layout>

<div class="py-12 flex justify-center justify-self-center">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 w-min">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-max">
                <div class="p-6 text-[#5A8457] flex flex-row flex-wrap">

        <div>
            <ul>
                @foreach ($errors as $erro)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nome:" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>      

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Email:" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="Senha:" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirme a Senha:" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> <br>


        <div>
            <label for="nivel">Nível de Acesso: </label>
            <select id="nivel" name="nivel" required>
                    <option value="admin">Administrador</option>
                    <option value="moderador">Moderador</option>
                    <option value="estudante" selected>Estudante</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            
            <x-back-link href="{{ route('usuarios.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                Voltar
            </x-back-link>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>
</div>
</div>
</x-app-layout>
