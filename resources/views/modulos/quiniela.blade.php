<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">

            {{ __('México | Estados Unidos | Canadá 2026') }}

        </h2>

    </x-slot>



    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="lg:px-6 pb-6 bg-white border-b border-gray-200 ">
                <h5 class="text-3xl text-center font-bold my-8">Ingresa tus pronosticos!</h5>
                <div class="w-44 mx-auto mb-4">

                    <form action="{{ route('ver-quiniela') }}" method="GET" id="verPartidosQuinielaSelect">

                        <label for="grupos" class="block mb-2 text-xl font-bold text-center text-gray-800">Jornada:

                        </label>

                        <select id="grupos"

                            class="bg-gray-50 border border-gray-300 text-gray-900 text-lg text-center font-bold hover:border-red-300 hover:cursor-pointer rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"

                            onchange="verPartidosJornadaQuiniela(this)">

                            <option value="1" {{$jornada==1 ? 'selected':''}}>1</option>

                            <option value="2" {{$jornada==2 ? 'selected':''}}>2</option>

                            <option value="3" {{$jornada==3 ? 'selected':''}}>3</option>
                            
                            <option value="4" {{ $jornada == 4 ? 'selected' : '' }}>Octavos de final</option>
                            <option value="5" {{ $jornada == 5 ? 'selected' : '' }}>Cuartos de final</option>
                            <option value="6" {{ $jornada == 6 ? 'selected' : '' }}>SemiFinal</option>
                            <option value="7" {{ $jornada == 7 ? 'selected' : '' }}>Partido por tercer lugar</option>
                            <option value="8" {{ $jornada == 8 ? 'selected' : '' }}>Final</option>

                        </select>

                    </form>

                </div>

                <div class="status-message flex w-full">

                    @if ($message == '1OK')

                        <div
                            class="w-2/3 mx-auto p-4 text-center text-xl text-gray-800 rounded-md shadow-sm bg-green-200 animate-pulse">

                            Listo, tus marcadores fueron guardados!

                        </div>
                    @else
                        @if ($message == '2OK')

                            <div
                                class="w-2/3 mx-auto p-4 text-center text-xl text-gray-800 rounded-md shadow-sm bg-yellow-200 animate-pulse">

                                Oh, algunos marcadores no fueron guardados, solo puedes guardar marcadores 5 minutos antes de
                                iniciar el partido.

                            </div>
                        @else
                            @if ($message != '0OK')
                                <div
                                    class="w-2/3 mx-auto p-4 text-center text-xl text-gray-800 rounded-md shadow-sm bg-red-200 animate-pulse">

                                    Umm, ocurrio un problema al guardar tus marcadores, por favor intentalo mas tarde.

                                </div>
                            @endif

                        @endif

                    @endif

                </div>

                <form action="{{ route('guardar-predicciones-form') }}" method="POST">

                    <div class="flex flex-col">

                        <div class="shadow-md rounded-md mx-auto w-full xl:w-3/4 my-4">

                            <div class="flex items-center justify-center p-4 border-b " style="border-color: #177245;">

                                <p class="text-xl font-bold text-gray-800">Partidos Programados</p>

                                <svg class="animate-spin spinner-load" viewBox="0 0 24 24"></svg>

                                <input
                                    type="number"
                                    name="jornada"
                                    value="{{ $jornada ?? 1 }}"
                                    hidden
                                    class="hidden"
                                >

                                @csrf

                                <button
                                    type="button"
                                    class="text-white border focus:outline-none hover:bg-red-50 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-4 my-2 fixed bottom-5 right-5 shadow-xl"
                                    style="background-color: #177245"
                                >
                                    Guardar Marcadores
                                </button>

                            </div>

                            <ul id="partidos-jornada-quiniela">

                                @foreach ($partidosJornada as $partido)
                                    <li
                                        class="flex justify-around lg:py-2 pb-28 my-4 xl:my-2 border-b border-gray-400 items-center {{ $partido->estado == 0 ? 'partido-modulo-pronosticos' : '' }}} partido-{{ $partido->partido_id }}">

                                        <div class="w-1/2 xl:w-1/3 flex items-center justify-between px-1">

                                            <div
                                                class="flex flex-col justify-center items-center xl:flex-row w-1/3 md:w-auto ml-2">

                                                <img src="{{ asset($partido->imagen_equipo_1) }}"
                                                    alt="SELECCION" class="h-10 w-14 mx-4 border rounded-md shadow-md">

                                                <p class="font-semibold text-xs xs:text-md lg:text-xl m-4">

                                                    {{ $partido->nombre_equipo_1 }}</p>

                                            </div>

                                            @if ($partido->estado == 0)
                                                <input type="number" name="partidos[]"
                                                    value="{{ $partido->partido_id }}" hidden
                                                    class="hidden partido-jornada-quiniela">

                                                <div class="flex flex-col justify-center items-center w-auto">

                                                    <div>

                                                        <a class="" onclick="increaseBookmar(this)">
                                                            <i><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" fill="currentColor"
                                                                class="bi bi-arrow-up-circle-fill text-rose-600 hover:text-rose-900 cursor-pointer"
                                                                viewBox="0 0 16 16">

                                                                <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                                                            </svg></i>
                                                        </a>

                                                    </div>

                                                    <div class="my-2">

                                                        <input type="number"
                                                            name="prediccion_equipo1_{{ $partido->partido_id }}"
                                                            min="0" max="10"
                                                            value="{{ $partido->pdg_equipo_1 }}"
                                                            class="marcador-equipo-1 marcador-equipo bg-gray-50 border border-gray-100 text-gray-900 text-center lg:text-right text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-8 md:w-14 p-2">

                                                    </div>

                                                    <div>

                                                        <a class="" onclick="decreaseBookmar(this)"><i>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" fill="currentColor"
                                                                    class="bi bi-arrow-down-circle-fill text-rose-600 hover:text-rose-900 cursor-pointer"
                                                                    viewBox="0 0 16 16">

                                                                    <path
                                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />

                                                                </svg></i>

                                                        </a>

                                                    </div>

                                                </div>
                                            @endif

                                        </div>

                                        <div
                                            class="w-full xl:w-1/3 flex flex-col justify-center items-center mt-56 lg:my-0 absolute lg:relative">

                                            @if ($partido->estado == 0)
                                                <p class="text-lg text-center">Fecha de encuentro</p>

                                                <p class="text-lg text-center font-semibold">

                                                    {{ $partido->fecha_partido }}

                                                </p>
                                            @else
                                                @if ($partido->estado == 2)
                                                    <div
                                                        class="resultadoPartido flex justify-between items-center text-3xl font-bold">
                                                        En juego!
                                                    </div>
                                                @else
                                                    <p class="text-center">Resultado del partido:</p>
                                                    <div
                                                        class="resultadoPartido flex justify-between items-center text-3xl font-bold">
                                                        
                                                        <p> {{ $partido->goles_equipo_1 }} </p> - <p>

                                                            {{ $partido->goles_equipo_2 }} </p>

                                                    </div>
                                                    <p class="text-center">Prediccion:</p>
                                                    <div
                                                        class="flex justify-between items-centerd">
                                                        <p> {{ $partido->pdg_equipo_1 }} </p> - <p>

                                                            {{ $partido->pdg_equipo_2 }} </p>

                                                    </div>
                                                    

                                                    <div class="puntosGenerados font-semibold text-center">Ganaste:

                                                        {{ $partido->puntos ?? '0' }} puntos.</div>
                                                @endif
                                            @endif

                                        </div>

                                        <div class="w-1/2 xl:w-1/3 flex items-center justify-between px-1">

                                            @if ($partido->estado == 0)
                                                <div class="flex flex-col justify-center items-center w-auto">

                                                    <div>

                                                        <a class="" onclick="increaseBookmar(this)"><i><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" fill="currentColor"
                                                                    class="bi bi-arrow-up-circle-fill text-rose-600 hover:text-rose-900 cursor-pointer"
                                                                    viewBox="0 0 16 16">

                                                                    <path
                                                                        d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />

                                                                </svg></i>

                                                        </a>

                                                    </div>

                                                    <div class="my-2">

                                                        <input type="number"
                                                            name="prediccion_equipo2_{{ $partido->partido_id }}"
                                                            min="0" max="10"
                                                            value="{{ $partido->pdg_equipo_2 }}"
                                                            class="marcador-equipo-2 marcador-equipo bg-gray-50 border border-gray-100 text-gray-900 text-center lg:text-right text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-8 md:w-14 p-2">

                                                    </div>

                                                    <div>

                                                        <a class="" onclick="decreaseBookmar(this)"><i>

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" fill="currentColor"
                                                                    class="bi bi-arrow-down-circle-fill text-rose-600 hover:text-rose-900 cursor-pointer"
                                                                    viewBox="0 0 16 16">

                                                                    <path
                                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />

                                                                </svg></i>

                                                        </a>

                                                    </div>

                                                </div>
                                            @endif

                                            <div
                                                class="flex flex-col-reverse justify-center items-center xl:flex-row w-1/3 md:w-auto mr-2">

                                                <p class="font-semibold text-xs xs:text-md lg:text-xl m-4">

                                                    {{ $partido->nombre_equipo_2 }}</p>

                                                <img src="{{ asset($partido->imagen_equipo_2) }}"
                                                    alt="SELECCION"
                                                    class="h-10 w-14 mx-4 border rounded-md shadow-md">

                                            </div>

                                        </div>

                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>

        setTimeout(() => {

            document.querySelector(".status-message").classList.toggle('hidden');

        }, 6500);

    </script>

</x-app-layout>

