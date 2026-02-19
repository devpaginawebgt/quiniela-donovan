<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">

            {{ __('Mundial 2026 México | Estados Unidos | Canadá') }}

        </h2>

    </x-slot>



    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">

        <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <div class="lg:px-6 pb-6 border-b border-gray-200 ">
                <h5 class="text-2xl text-center font-bold mt-4">Pronostica los próximos partidos</h5>
                <div class="w-44 mx-auto mb-4">

                    <form action="{{ route('web.ver-quiniela') }}" method="GET" id="verPartidosQuinielaSelect">

                        <label for="grupos" class="block mb-2 text-xl font-bold text-center text-[--complementary-light-color] mt-4">Jornada:

                        </label>

                        <select
                            id="quiniela"
                            class="bg-[--complementary-primary-color] border border-[--light-color] text-[--light-color] text-lg text-center font-bold hover:border-[--secondary-color] hover:cursor-pointer rounded-lg focus:ring-[--secondary-color] focus:border-[--secondary-color] block w-full p-2.5"
                            onchange="verPartidosJornadaQuiniela(this)"
                        >

                            @foreach($jornadas as $jornada)

                                <option value="{{ $jornada->id }}" {{ $jornada->id === $jornada_activa ? 'selected' : ''; }}>
                                    {{ $jornada->name }}
                                </option>

                            @endforeach

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

                <form action="{{ route('web.guardar-predicciones-form') }}" method="POST">

                    <div class="flex flex-col">

                        <div class="mx-auto w-full">

                            <div class="flex items-center justify-center p-4">

                                <p class="text-xl font-bold mb-4">Partidos Programados</p>

                                <svg class="animate-spin spinner-load" viewBox="0 0 24 24"></svg>

                                <input
                                    type="number"
                                    name="jornada"
                                    value="{{ $jornada_activa ?? 1 }}"
                                    hidden
                                    class="hidden"
                                >

                                @csrf

                                <button
                                    type="submit"
                                    class="border-2 border-[--dark-color] focus:outline-none hover:brightness-[1.2] focus:ring-4 focus:ring-[--primary-color] rounded-full py-2 px-4 fixed bottom-5 right-5 shadow-xl bg-[--secondary-color] text-[--dark-color] text-sm font-semibold gap-1 flex justify-center items-center"
                                >
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7v12q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h12zm-2 .85L16.15 5H5v14h14zm-4.875 9.275Q15 16.25 15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18t2.125-.875M6 10h9V6H6zM5 7.85V19V5z"/></svg>
                                    </span>
                                    Pronosticar
                                </button>

                            </div>

                            <ul id="partidos-jornada-quiniela" class="grid grid-cols-1 md:grid-cols-2 2xl:gap-12 max-w-[72rem] mx-auto gap-4 lg:gap-8">

                                @foreach ($partidosJornada as $partido)
                                <div class="bg-[--complementary-primary-color] px-4 pt-8 pb-12 rounded-3xl flex flex-col">

                                    <div class="w-full flex flex-col justify-center items-center pb-8 mb-8 border-b border-[--complementary-light-color]">

                                            <p class="resultadoPartido flex justify-between items-center text-xl font-bold mb-2">
                                                @if ($partido->estado === 0)
                                                    Por jugar
                                                @elseif ($partido->estado === 2)
                                                    ¡En juego!
                                                @else
                                                    Partido Finalizado
                                                @endif
                                            </p>

                                            <p class="text-center flex gap-2 text-[--complementary-light-color]">

                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m-4.712-.288Q7 13.426 7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14t-.712-.288M16 14q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14m-4 4q-.425 0-.712-.288T11 17t.288-.712T12 16t.713.288T13 17t-.288.713T12 18m-4.712-.288Q7 17.426 7 17t.288-.712T8 16t.713.288T9 17t-.288.713T8 18t-.712-.288M16 18q-.425 0-.712-.288T15 17t.288-.712T16 16t.713.288T17 17t-.288.713T16 18M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z"/></svg>
                                                </span>

                                                {{ $partido->fecha_partido }}

                                            </p>
                                        @if ($partido->estado == 1)

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

                                    </div>

                                    <li
                                        class="flex justify-between items-center {{ $partido->estado == 0 ? 'partido-modulo-pronosticos' : '' }}} partido-{{ $partido->partido_id }}"
                                    >

                                        <div class="flex flex-col items-center w-full max-w-60 gap-4">

                                            <div class="flex flex-col justify-center items-center gap-4">

                                                <img
                                                    src="{{ asset($partido->imagen_equipo_1) }}"
                                                    alt="SELECCION"
                                                    class="w-20 h-14 object-cover rounded-xl shadow-md"
                                                >

                                                <p class="font-semibold text-xs xs:text-md lg:text-base">

                                                    {{ $partido->nombre_equipo_1 }}</p>

                                            </div>

                                            @if ($partido->estado == 0)

                                                <input type="number" name="partidos[]"
                                                    value="{{ $partido->partido_id }}" hidden
                                                    class="hidden partido-jornada-quiniela">

                                                <div class="flex justify-center items-center w-auto gap-4">

                                                    <button type="button" onclick="decreaseBookmar(this)" class="">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="currentColor" d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16s5.373 12 12 12s12-5.373 12-12m2 0c0 7.732-6.268 14-14 14S2 23.732 2 16S8.268 2 16 2s14 6.268 14 14m-20-1a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2z"/></svg>
                                                        </span>
                                                    </button>

                                                    <div>

                                                        <input
                                                            type="number"
                                                            name="prediccion_equipo1_{{ $partido->partido_id }}"
                                                            min="0"
                                                            max="25"
                                                            value="{{ $partido->pdg_equipo_1 }}"
                                                            class="marcador-equipo-1 marcador-equipo border border-[--light-color] text-[--light-color] bg-transparent text-center rounded-md hide-input-arrows px-0 py-1"
                                                        >

                                                    </div>

                                                    <button type="button" onclick="increaseBookmar(this)">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="currentColor" d="M15 10a1 1 0 1 1 2 0v5h5a1 1 0 1 1 0 2h-5v5a1 1 0 1 1-2 0v-5h-5a1 1 0 1 1 0-2h5zm15 6c0 7.732-6.268 14-14 14S2 23.732 2 16S8.268 2 16 2s14 6.268 14 14m-2 0c0-6.627-5.373-12-12-12S4 9.373 4 16s5.373 12 12 12s12-5.373 12-12"/></svg>
                                                        </span>
                                                    </button>

                                                </div>
                                            @endif

                                        </div>

                                        <div class="px-18">

                                            <span class="font-semibold text-2xl">VS</span>

                                        </div>

                                        <div class="flex flex-col items-center w-full max-w-60 gap-4">

                                            <div class="flex flex-col justify-center items-center gap-4">

                                                <img
                                                    src="{{ asset($partido->imagen_equipo_2) }}"
                                                    alt="SELECCION"
                                                    class="w-20 h-14 object-cover rounded-xl shadow-md"
                                                >

                                                <p class="font-semibold text-xs xs:text-md lg:text-base">{{ $partido->nombre_equipo_2 }}</p>

                                            </div>

                                            @if ($partido->estado == 0)
                                                <div class="flex justify-center items-center w-auto gap-4">

                                                    <button type="button" onclick="decreaseBookmar(this)" class="">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="currentColor" d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16s5.373 12 12 12s12-5.373 12-12m2 0c0 7.732-6.268 14-14 14S2 23.732 2 16S8.268 2 16 2s14 6.268 14 14m-20-1a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2z"/></svg>
                                                        </span>
                                                    </button>

                                                    <div>

                                                        <input type="number"
                                                            name="prediccion_equipo2_{{ $partido->partido_id }}"
                                                            min="0" max="10"
                                                            value="{{ $partido->pdg_equipo_2 }}"
                                                            class="marcador-equipo-1 marcador-equipo border border-[--light-color] text-[--light-color] bg-transparent text-center rounded-md hide-input-arrows px-0 py-1">

                                                    </div>

                                                    <button type="button" onclick="increaseBookmar(this)">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="currentColor" d="M15 10a1 1 0 1 1 2 0v5h5a1 1 0 1 1 0 2h-5v5a1 1 0 1 1-2 0v-5h-5a1 1 0 1 1 0-2h5zm15 6c0 7.732-6.268 14-14 14S2 23.732 2 16S8.268 2 16 2s14 6.268 14 14m-2 0c0-6.627-5.373-12-12-12S4 9.373 4 16s5.373 12 12 12s12-5.373 12-12"/></svg>
                                                        </span>
                                                    </button>

                                                </div>
                                            @endif

                                        </div>

                                    </li>
                                </div>
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

