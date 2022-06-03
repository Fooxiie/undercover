<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Suggestion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-600 border border-plot">
                    <h3 class="font-semibold text-lg text-gray-50
                    mb-4">Nouvelle
                        proposition</h3>
                    <form action="{{route('suggestion.submit')}}" method="post"
                          id="form">
                        @csrf
                        <div class="w-full mb-2">
                            <label for="group_name"
                                   class="block text-sm font-medium
                                   text-gray-50">Titre du groupe</label>
                            <input type="text"
                                   name="group_name"
                                   id="group_name" required
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div id="hint" class="bg-gray-500 min-h-8 p-4 mt-4
                        rounded-lg">
                            <span class="text-gray-50">Thèmes ajoutés :</span>
                            <button type="button" class="text-plot h-full"
                                    onclick="addElement()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <br/>
                            <input type="text" class="rounded-lg" id="themes[]"
                                   name="themes[]" required="required">
                            <input type="text" class="rounded-lg" id="themes[]"
                                   name="themes[]" required="required">
                            <input type="text" class="rounded-lg" id="themes[]"
                                   name="themes[]" required="required">
                            <input type="text" class="rounded-lg" id="themes[]"
                                   name="themes[]" required="required">
                            <input type="text" class="rounded-lg" id="themes[]"
                                   name="themes[]" required="required">
                        </div>
                        <span class="text-red-300 animate-pulse" id="rules">Il
                            doit y
                            avoir au
                            minimum 5
                            thèmes
                            disponibles</span>
                        <div class="w-full text-right">
                            <input type="submit" class="bg-plot p-2 text-black
                            rounded-lg
                            m-2 hover:bg-gray-800 hover:text-white
                            cursor-pointer"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let form = document.getElementById('form');
        form.onsubmit = function (event) {
            if (document.getElementById('hint').children.length < 8) {
                event.preventDefault();
                var rule = document.getElementById('rules');
                rule.classList.add("animate-pulse");
                rule.classList.remove('text-gray-200');
                rule.classList.add('text-red-300');
            }
        }

        function addElement() {
            var input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'rounded-lg');
            input.setAttribute('id', 'themes[]');
            input.setAttribute('name', 'themes[]');
            input.setAttribute('required', 'required');
            document.getElementById('hint').append(input);
        }
    </script>
</x-app-layout>
