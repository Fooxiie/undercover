<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white bg-gray-600 border border-plot">
                    You're logged in {{$user}}!<br/>
                    <div class="mt-4 text-right">
                        <a href="{{route('game.create')}}" class="mt-2 bg-plot
                        text-black p-1
                    rounded-lg">
                            Lancez une game !
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
