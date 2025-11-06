<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('México | Estados Unidos | Canadá 2026') }}
        </h2>
    </x-slot>

    <div class="">
        <div>
            <img src="{{asset('images/portadas/inicio.webp')}}" alt="PORTADA-2022" class="">
        </div>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <p class="text-center text-2xl">
                        Bienvenido {{ Auth::user()->nombres . " " . Auth::user()->apellidos}}
                    </p>
                    <p class="text-center text-4xl">
                        Juega con tus selecciones favoritas!
                    </p>
                </div>
                <div class="flex w-full py-8" style="justify-content: center;align-items: center;">
                    <img src="{{asset('images/preliminar.jpeg')}}" alt="PORTADA-2022" style="width: 70%;height: auto;" class="">
                    <img src="{{asset('images/opcion-1.jpeg')}}" alt="PORTADA-2022" style="width: 20%;height: 1%;margin-left: 15px;" class="">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

