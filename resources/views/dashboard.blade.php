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
                    You're logged in {{$user}}!
                </div>
                <div id="chat">
                    <x-chat-message message="test" idUser="1" type="1"></x-chat-message>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        const pusher = new Pusher('a7cdbbc381c291ed0746', {
            cluster: 'eu'
        });

        const channel = pusher.subscribe('my-channel');
        channel.bind('playerJoined', function (data) {
            console.log(JSON.stringify(data));
            let newMessage = document.createElement("x-chat-message");
            newMessage.setAttribute('message', JSON.stringify(data.pseudo))
            newMessage.setAttribute('idUser', 1)
            newMessage.setAttribute('type', 1)
            console.log(newMessage);
            //TODO DEMANDER EN AJAX LE RENDER DU MESSAGE POUR LAPPEND
            document.getElementById('chat').appendChild(newMessage);
        });
    </script>
</x-app-layout>
