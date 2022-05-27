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
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('chat').innerHTML += this.responseText;
                }
            }
            xhttp.open("GET", '{{route('render.message')}}?idUser=' + data.id +
                '&message=' + '{{__('custom.joined')}}' + '&type=2',
                true);
            xhttp.send();
        });
    </script>
</x-app-layout>
