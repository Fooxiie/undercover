@extends('layouts.game')

@section('content')
    <div class="bg-gray-700 w-full p-5 flex border-t-2 border-plot">
        <input type="text"
               class="text-center text-gray-600 bg-gray-200 rounded-full hidden"
               readonly id="hint-word"
               value="-"/>
        <button type="button" class="bg-plot rounded p-1 ml-2"
                onclick="join_game()" id="btn_join_game"
        >Rejoindre
        </button>
    </div>
    <div class="w-full h-full text-white" id="container">
    </div>
    <div class="modal fixed w-full h-full top-0 left-0 flex items-center
    justify-center" id="intro-modal">
        <div
            class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-gray-600 w-11/12 md:max-w-md mx-auto
        rounded shadow-lg z-50 overflow-y-hidden text-white">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white"
                     xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                     viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Bienvenue dans la partie !</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black"
                             xmlns="http://www.w3.org/2000/svg" width="18"
                             height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <p class="text-xl">Règles du jeux :</p>
                <p>- Chaque joueur reçois un thème !</p>
                <p>- Tous les joueurs recoivent le même mot, sauf 1 !</p>
                <p>- Chaqu'un leur tours les joueurs donne mot en rapport avec
                    celui reçu.
                </p>
                <p>- Une fois tous les mots donnés, il faudra alors voter pour
                    le traitre !
                </p>
                <span id="link"
                      class="font-bold h-full align-middle hidden">{{env
                          ('APP_URL')}}/play/{{ collect(request()->segments())->last() }}</span>

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <div class="tooltip">
                        <button class="px-4 bg-transparent p-3 rounded-lg
                    text-plot hover:bg-plot hover:text-black
                    mr-2" id="copyBtn" onclick="myFunction()"
                                onmouseout="outFunc()">
                            <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path
                                    d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                            </svg>
                        </button>
                    </div>
                    <button class="modal-close px-4 bg-plot p-3
                    rounded-lg text-black hover:text-white
                    hover:bg-gray-800"
                            onclick="intro_modal_close()">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
