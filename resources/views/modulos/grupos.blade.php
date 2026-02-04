<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('México | Estados Unidos | Canadá 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pb-6 bg-white border-b border-gray-200 ">
                <h5 class="text-3xl text-center font-bold my-8">Grupos conformados</h5>
                <div class="flex flex-col">
                    <div class="xl:w-1/6 w-1/2 mx-auto mb-4">
                        <label for="grupos" class="block mb-2 text-sm font-medium text-gray-900">Seleccione: </label>
                        <div class="flex items-center justify-center">
                            <select id="grupos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg font-semibold text-center cursor-pointer rounded-lg focus:ring-red-800 focus:border-red-800 block w-1/2 p-2.5"
                                onchange="verEquiposGrupo(this)">
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                <option value="6">F</option>
                                <option value="7">G</option>
                                <option value="8">H</option>
                                <option value="9">I</option>
                                <option value="10">J</option>
                                <option value="11">K</option>
                                <option value="12">L</option>
                            </select>
                            <svg class="animate-spin spinner-load" viewBox="0 0 24 24"></svg>
                        </div>
                    </div>
                    <div class="w-full lg:w-3/4 overflow-x-auto relative shadow-md sm:rounded-lg mx-auto">
                        <table class="xl:w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-100 uppercase" style="background-color: #000">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Equipo
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        PJ
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        PG
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        PE
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        PP
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        GF
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        GC
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Puntos
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="body-equipos-grupo">

                            </tbody>
                        </table>
                    </div>

                    <div class="shadow-md rounded-md mx-auto w-full lg:w-3/4 my-4">
                        <p
                            class="p-4 border-b text-xl"
                            style="border-color: #177245;"
                        >
                            Jornada 1
                        </p>
                        <ul id="partidos-jornada-1">

                        </ul>
                    </div>

                    <div class="shadow-md rounded-md mx-auto w-full lg:w-3/4 my-4">
                        <p
                            class="p-4 border-b text-xl"
                            style="border-color: #177245;"
                        >
                            Jornada 2
                        </p>
                        <ul id="partidos-jornada-2">

                        </ul>
                    </div>

                    <div class="shadow-md rounded-md mx-auto w-full lg:w-3/4 my-4">
                        <p
                            class="p-4 border-b text-xl"
                            style="border-color: #177245;"
                        >
                            Jornada 3
                        </p>
                        <ul id="partidos-jornada-3">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>