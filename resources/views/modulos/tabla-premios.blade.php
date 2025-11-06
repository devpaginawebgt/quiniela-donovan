<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('México | Estados Unidos | Canadá 2026') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-2xl my-6 mx-auto px-0 sm:px-6 lg:px-8" id="selecciones-container">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pb-11 md:px-10">
            <div class="px-6 pb-6 bg-white my-8">
                <h5 class="text-3xl text-center font-bold">Premios ganadores</h5>
                <p class="text-xl text-center font-semibold">(Disponible proximamente)</p>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-auto max-w-screen-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-100 uppercase " style="background-color: #000">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Posicion
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Premio
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Descripcion
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Imagen ilustrativa
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($premios as $premio)
                        <tr class="bg-white border-b">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{$premio->posicion}}
                            </th>
                            <td class="py-4 px-6">
                                {{$premio->nombre}}
                            </td>
                            <td class="py-4 px-6">
                                {{$premio->descripcion}}
                            </td>
                            <td class="py-4 px-6">
                                <img src="{{asset('images/premios')}}/{{$premio->imagen}}" class="w-20 h-16 rounded">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <img src="{{asset('images/perrito_espana.png')}}" alt="PORTADA-2022" style="width: 20%; position: absolute; z-index: 10000; right: 0px; bottom: 0;" class=""> --}}
    </div>
</x-app-layout>
