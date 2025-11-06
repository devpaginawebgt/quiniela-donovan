<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">

            {{ __('México | Estados Unidos | Canadá 2026') }}

        </h2>

    </x-slot>



    <div class="max-w-screen-2xl my-6 mx-auto sm:px-6 lg:px-8" id="selecciones-container">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg xl:px-10 px-2 pb-11">

            <div class="px-6 pb-6 bg-white border-b border-gray-200 flex items-center justify-center">

                <h5 class="text-3xl text-center font-bold my-8">Tabla general de participantes.</h5>

                <svg class="animate-spin spinner-load" viewBox="0 0 24 24"></svg>

            </div>

            

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg mx-auto">

                <table class="w-full text-sm text-left text-gray-500">

                    <thead class="text-xs text-gray-100 uppercase " style="background-color: #000">

                        <tr>

                            <th scope="col" class="py-3 px-6">

                                Posicion

                            </th>

                            <th scope="col" class="py-3 px-6">

                                Fecha de registro

                            </th>

                            <th scope="col" class="py-3 px-6">

                                Nombre

                            </th>

                            <th scope="col" class="py-3 px-6">

                                Apellido

                            </th>
                            <th scope="col" class="py-3 px-6">

                                Número de documento

                            </th>
                            <th scope="col" class="py-3 px-6">

                                Correo

                            </th>
                            <th scope="col" class="py-3 px-6">

                                Teléfono

                            </th>
                            <th scope="col" class="py-3 px-6">

                                Puntos

                            </th>

                        </tr>

                    </thead>

                    <tbody id="body-participantes-quiniela">

                        

                    </tbody>

                </table>

            </div>

        </div>

        {{-- <img src="{{asset('images/panda_argentina.png')}}" alt="PORTADA-2022" class="img_ani"> --}}

    </div>

</x-app-layout>

