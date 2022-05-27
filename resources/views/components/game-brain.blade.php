<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    const pusher = new Pusher('a7cdbbc381c291ed0746', {
        cluster: 'eu'
    });

    const channel = pusher.subscribe('{{ collect(request()->segments())->last() }}');
    channel.bind('playerJoined', function (data) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('chat').innerHTML += this.responseText;
                let scroll_to_bottom = document.getElementById('chat');
                scroll_to_bottom.scrollTop = scroll_to_bottom.scrollHeight;
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
                let scroll_to_bottom = document.getElementById('chat');
                scroll_to_bottom.scrollTop = scroll_to_bottom.scrollHeight;
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
        xhttp.open("GET", '{{route('send.message')}}?message=' + chat.value + "&channel=" + '{{ collect(request()->segments())->last() }}',
            true);
        xhttp.send();
        chat.value = "";
    }
</script>
