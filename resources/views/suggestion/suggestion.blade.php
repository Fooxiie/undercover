<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex w-full">
                        <div class="w-full">
                            Suggestion proposées : {{sizeof($suggestions)}}
                        </div>
                        <div>
                            <a class="bg-gray-600 text-white p-2 rounded
                            hover:bg-gray-800"
                               href="#">Créer</a>
                        </div>
                    </div>

                    <hr class="m-4"/>

                    <h2>Mes suggestions</h2>
                    <div>
                        <table class="table-fixed w-full">
                            <thead class="bg-gray-300">
                            <tr>
                                <th>Numéro</th>
                                <th>Nom soumis</th>
                                <th>Etat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suggestions as $suggestion)
                                <tr class="even:bg-gray-100 text-center">
                                    <td>{{$suggestion->id}}</td>
                                    <td>{{$suggestion->group_name}}</td>
                                    <td>{{$suggestion->state}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
