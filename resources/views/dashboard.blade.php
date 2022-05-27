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
            </div>
        </div>
    </div>

    <div id="chat" class="absolute inset-y-0 right-0
                bg-gray-500 shadow-lg w-1/5 mb-12 border-l-4 border-gray-700">
    </div>
    <div id="chat-input" class="absolute bottom-0 right-0 w-1/5
                h-12 bg-gray-700 flex border-l-4 border-gray-700">
        <input id="input-chat" placeholder="message ..."
               class="w-full p-2"/>
        <button class="text-gray-200 justify-center w-10"
                onclick="sendChat()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6
                        w-full"
                 fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
            </svg>
        </button>
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

        channel.bind('newChatMessage', function (data) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('chat').innerHTML += this.responseText;
                }
            }
            xhttp.open("GET", '{{route('render.message')}}?idUser=' + data.id +
                '&message=' + data.message + '&type=1',
                true);
            xhttp.send();
        });

        let chatInput = document.getElementById('input-chat');
        chatInput.addEventListener("keyup", (event) => {
            if (event.key === "Enter") {
                sendChat();
            }
        });

        function sendChat() {
            var chat = document.getElementById('input-chat');
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", '{{route('send.message')}}?message=' + chat.value,
                true);
            xhttp.send();
            chat.value = "";
        }
    </script>
</x-app-layout>
