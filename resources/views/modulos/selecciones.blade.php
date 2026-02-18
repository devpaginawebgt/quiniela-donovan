<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('México | Estados Unidos | Canadá 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6 pb-6 bg-white border-b border-gray-200 ">
                <h5 class="text-3xl text-center font-bold my-8">Selecciones clasificadas</h5>
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-x-2 gap-y-6 transition-all">
                    @foreach ($equipos as $equipo)
                    <div class="max-w-sm bg-white transform ease-in duration-150 hover:scale-105">
                        <div class="flex">
                            <img class="rounded-lg mx-auto hover:cursor-pointer btn-bandera border-2 border-gray-100 w-56 h-32"
                                src="{{ asset( $equipo->imagen ) }}" alt="{{$equipo->nombre}}" id="{{str_replace(' ', '', $equipo->id)}}" onclick="slideToggle(this.id)"/>
                        </div>
                        <div class="p-2">
                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">{{$equipo->nombre}}</h5>
                            <div class="container-{{str_replace(' ', '', $equipo->id)}} hidden rounded-lg shadow-lg p-3">
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-center">{{$equipo->descripcion}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
