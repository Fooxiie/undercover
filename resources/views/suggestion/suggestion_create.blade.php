<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-50 leading-tight">
            {{ __('Suggestion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg text-gray-800
                    mb-4">Nouvelle
                        proposition</h3>
                    <form action="#" method="POST">
                        <div class="w-full mb-2">
                            <label for="group_name"
                                   class="block text-sm font-medium
                                   text-gray-700">Titre du groupe</label>
                            <input type="text"
                                   name="group_name"
                                   id="group_name"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="w-full b">
                            <label for="theme_name"
                                   class="block text-sm font-medium
                                   text-gray-700">Thème</label>
                            <input type="text"
                                   name="theme_name"
                                   id="theme_name"
                                   placeholder="press enter to add ..."
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div id="hint" class="bg-gray-500 min-h-8 p-4 mt-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let specialInput = document.getElementById('theme_name');
        specialInput.addEventListener("keyup", (event) => {
            if (event.key === "Enter") {
                addElement();
            }
        });

        function addElement() {
            let value = document.getElementById('theme_name');

            if (value.value !== "") {
                var input = document.createElement('input');
                input.value = value.value;
                input.setAttribute('disabled', 'disabled');
                input.setAttribute('type', 'text');
                input.setAttribute('value', input.value);
                document.getElementById('hint').append(input);
            }

            value.value = "";
        }
    </script>
</x-app-layout>
