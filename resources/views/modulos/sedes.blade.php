<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('México | Estados Unidos | Canadá 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pb-6 bg-white border-b border-gray-200 ">
                <h5 class="text-3xl text-center font-bold my-8">Estadios de la Copa Mundial</h5>
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4 transition-all">

                    @foreach($estadios as $estadio)
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset($estadio->imagen) }}" alt="" id="{{ $estadio->id }}"
                                onclick="slideToggle({{ $estadio->id }})" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">
                                {{ $estadio->nombre }}
                            </h5>
                            <div class="container-{{ $estadio->id }} hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">
                                    {{ $estadio->descripcion }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/aljanoub.jpg') }}" alt="" id="aljanoub"
                                onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Al
                                Janoub</h5>
                            <div class="container-aljanoub hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Dispone de un
                                    techo operable y un innovador sistema de refrigeración alimentado por energía solar.
                                    Tiene capacidad para 40.000 asientos, de los cuales 20.000 son desmontables,
                                    pensados para transportar a otro país que necesite tal infraestructura o como legado
                                    del torneo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/ciudaddelaeducacion.jpg') }}" alt=""
                                id="ciudaddelaeducacion" onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Ciudad de la Educación</h5>
                            <div class="container-ciudaddelaeducacion hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Conocido
                                    también como el "Diamante del Desierto", fue la primera sede del Mundial calificada
                                    con cinco estrellas por su diseño y construcción por parte del Sistema Global de
                                    Evaluación de la Sostenibilidad. Está concebido como punto de encuentro social del
                                    Campus, cuenta con áreas de reunión y zonas verdes. Su capacidad es de 40.000
                                    espectadores, que después del mundial se reducirá a 20.000.</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/ahmadbinali.jpg') }}" alt="" id="ahmadbinali"
                                onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Ahmad
                                Bin Ali</h5>
                            <div class="container-ahmadbinali hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Diseñado por el
                                    estudio de ingeniería y arquitectura Ramboll, destaca por su fachada brillante,
                                    compuesta por motivos característicos del país: la importancia de la familia, la
                                    belleza del desierto, la flora y la fauna autóctonas y el comercio local e
                                    internacional.</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/althumama.jpg') }}" alt="" id="althumama"
                                onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Al
                                Thumama</h5>
                            <div class="container-althumama hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Inspirado en la
                                    "gahfiya", un gorro tejido tradicional que llevan los hombres y niños de Oriente
                                    Medio y que simboliza dignidad e independencia, es obra del arquitecto qatarí
                                    Ibrahim M. Jaidah en colaboración con el estudio Fenwick Iribarren.</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/internacionalkhalifa.jpg') }}" alt=""
                                id="internacionalkhalifa" onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Internacional Khalifa</h5>
                            <div class="container-internacionalkhalifa hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Cuenta con una
                                    larga trayectoria como sede de grandes eventos deportivos desde 1976. Como estadio
                                    nacional de Qatar, pasó por una amplia remodelación para el Mundial de fútbol. Se
                                    añadió una grada y una nueva fachada, así como un innovador sistema de iluminación
                                    LED.</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/AlBayt.jpg') }}" alt=""
                                id="AlBayt" onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Al Bayt</h5>
                            <div class="container-AlBayt hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Este espectacular estadio se inspira en las "bayt al sha'ar", tiendas de campaña utilizadas históricamente por los pueblos nómadas de Qatar y la región del Golfo. Ubicado en Al Khor, es obra de la firma Dar Al-Handasah. Su objetivo es honrar el pasado y presente de Qatar con una mirada hacia el futuro.
                                    Con una capacidad para 60.000 personas, en él se disputará el partido inaugural del Mundial, además de otros ocho encuentros de la competición.</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/974.jpg') }}" alt=""
                                id="974" onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">974</h5>
                            <div class="container-974 hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Cuenta con una
                                    larga trayectoria como sede de grandes eventos deportivos desde 1976. Como estadio
                                    nacional de Qatar, pasó por una amplia remodelación para el Mundial de fútbol. Se
                                    añadió una grada y una nueva fachada, así como un innovador sistema de iluminación
                                    LED.</p>
                            </div>
                        </div>
                    </div>
                    <div class="max-w-sm bg-white rounded-lg transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100"
                                src="{{ asset('images/estadios/Lusail.jpg') }}" alt=""
                                id="Lusail" onclick="slideToggle(this.id)" />
                        </div>
                        <div class="p-5 border border-gray-200 shadow-md rounded-lg">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Lusail</h5>
                            <div class="container-Lusail hidden">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">Es la joya de la corona. Es la sede de torneos más grande de Qatar y está situado en la ciudad de la que toma su nombre. El estudio Foster+ Partners firma el diseño de esta maravilla inspirada en las luces y sombras de la linterna "fanar". Su forma y fachada emulan los intrincados motivos decorativos de los cuencos y otros recipientes característicos de la edad de oro del arte y la artesanía en el mundo árabe e islámico.</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>