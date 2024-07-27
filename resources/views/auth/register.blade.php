<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" size="11" class="block mt-1 w-full"
                :value="old('cpf')" required />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="fone" :value="__('Fone')" />
            <x-text-input id="fone" name="fone" type="text" size="14" class="block mt-1 w-full"
                :value="old('fone')" required />
            <x-input-error :messages="$errors->get('fone')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="img" :value="__('Foto')" />
            <x-text-input id="img" name="img" type="file" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('img')" class="mt-2" />
        </div>

        <!-- Job -->
        <div class="mt-4">
            <x-input-label for="job" :value="__('Profissão')" />
            <select name="job" id="job" class="block mt-1 w-full" required>
                @foreach ($jobs as $job)
                    <option value="{{ $job->job }}">{{ $job->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('job')" class="mt-2" />
        </div>

        <!-- Specialization -->
        <div class="mt-4">
            <x-input-label for="specialization" :value="__('Especialidade')" />
            <select name="specialization" id="specialization" class="block mt-1 w-full" required>
                @foreach ($specializs as $specialty)
                    <option value="{{ $specialty->specialization }}">{{ $specialty->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Already Registered Link -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
