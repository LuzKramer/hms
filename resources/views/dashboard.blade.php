<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<<<<<<< HEAD
                    {{ __("You're logged in!") }}
=======
                    {{ __("Você está logado") }}
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
                </div>
            </div>
        </div>

        <div>
            @if (Auth::user()->level == 3 || 1)
            <h2><a href="{{ route('medic.board') }}">painel do médico</a></h2>

            @elseif (Auth::user()->level == 4 || 3 || 1)
            <h2><a href="{{ route('') }}">painel do emfermeiro</a></h2>


            @endif








        </div>


    </div>
</x-app-layout>
