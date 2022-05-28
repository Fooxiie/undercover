<div class="flex bg-gray-600 p-1 w-full h-auto min-h-12 mb-0.5 relative">
    <img class="inline-block h-full w-10 rounded-full ring-2 ring-white"
         src="{{\Illuminate\Support\Facades\Auth::user()->discord_avatar}}"
         alt="avatar">
    <div class="text-white m-2 flex">
        <div class="ml-1 mr-6" style="word-wrap: normal"><span class="font-bold">{{$pseudo}}</span>{{$message}}</div>
    </div>
    <div class="text-gray-50 absolute right-0 inset-y-0">
        @if($type == 1)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-6 mr-3"
                 fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-6 mr-3"
                 fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
            </svg>
        @endif
    </div>
</div>
