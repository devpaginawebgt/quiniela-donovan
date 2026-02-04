<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('México | Estados Unidos | Canadá 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pb-6 bg-white border-b border-gray-200 ">
                <h5 class="text-3xl text-center font-bold my-8">Calendario de partidos</h5>
                <div class="flex flex-col">
                    <div class="w-36 mx-auto mb-4">
                        <label for="grupos"
                            class="block mb-2 text-sm font-medium text-gray-900">Jornada: </label>
                        <select id="grupos"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="verPartidosJornada(this)">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">Dieciseisavos de final</option>
                            <option value="5">Octavos de final</option>
                            <option value="6">Cuartos de final</option>
                            <option value="7">Semifinales</option>
                            <option value="8">Tercer lugar</option>
                            <option value="9">Final</option>
                        </select>
                    </div>

                    <div class="shadow-md rounded-md mx-auto w-full lg:w-3/4 my-4">
                        <div class="flex items-center justify-center border-b" style="border-color: #177245;">
                            <p class="p-4 text-xl">Partidos Programados</p>
                            <svg class="animate-spin spinner-load" viewBox="0 0 24 24"></svg>
                        </div>
                        <ul id="partidos-jornada-general">
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>