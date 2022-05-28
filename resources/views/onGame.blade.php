@extends('layouts.game')

@section('content')
    <div class="bg-gray-700 w-full p-5 text-white flex">
        <span id="link"
              class="font-bold h-full align-middle">{{env('APP_URL')}}/play/{{ collect(request()->segments())->last() }}</span>
        <div class="tooltip-reverse">
            <button class="h-full align-middle" id="copyBtn" onclick="myFunction()"
                    onmouseout="outFunc()">
                <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-8" viewBox="0 0 20 20"
                     fill="currentColor">
                    <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"/>
                    <path
                        d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"/>
                </svg>
            </button>
        </div>
    </div>
@endsection
