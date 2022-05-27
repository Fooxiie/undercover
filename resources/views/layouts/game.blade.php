<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-500">
    <main>
        @yield('content')
    </main>
</div>
<div id="chat" class="absolute inset-y-0 right-0
                bg-gray-500 shadow-lg w-1/5 mb-12 border-l-4 border-gray-700 overflow-auto scrollbar">
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
<x-game-brain></x-game-brain>
</body>
</html>
