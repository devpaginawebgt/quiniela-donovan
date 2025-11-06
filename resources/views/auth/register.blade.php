
<x-guest-layout>
    <x-auth-card>
        @php
            // $ip = urlencode($_SERVER['REMOTE_ADDR']);
            // $apiKey = env('GEOLOCATION_API_KEY');
            // $url = "http://api.ipinfo.io/lite/{$ip}?token={$apiKey}";

            // $dataArray = json_decode(file_get_contents($url));
            $paisCliente = 'GT';
        @endphp

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (isset($message_error))
            <div class="bg-red-300 px-4 py-2 text-red-900 rounded-xl text-center" id="message-view">
                <h3 class="text-2xl font-bold">Error al registrarse</h3>
                <p>{{ $message_error }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-label for="nombres" :value="__('Nombres')" />

                <x-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')"
                    required />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="apellidos" :value="__('Apellidos')" />

                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')"
                    required />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="numero_documento" :value="__('Numero de Documento de Identidad')" />

                <x-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" :maxlength=14
                    :value="old('numero_documento')" required />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="telefono" :value="__('Numero de Telefono')" />

                <x-input id="telefono" class="block mt-1 w-full" type="text" :maxlength=10 name="telefono" :value="old('telefono')"
                    required />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Register Code -->
            <div class="mt-4">
                <x-label for="codigo" :value="__('Codigo de registro')" />

                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :maxlength=9
                    :value="old('codigo')" required />
            </div>

            <div class="mt-4">
                <x-label for="pais_id" :value="__('Pais')" />
                <select name="pais_id" id="pais_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full h-10 px-4" required>
                    <option selected>Seleccione</option>
                    <option value="1" {{$op = $paisCliente == 'GT' ? 'selected' : '' }}>Guatemala</option>
                    <option value="2" {{$op = $paisCliente == 'SV' ? 'selected' : '' }}>El Salvador</option>
                    <option value="3" {{$op = $paisCliente == 'HN' ? 'selected' : '' }}>Honduras</option>
                    <option value="4" {{$op = $paisCliente == 'NI' ? 'selected' : '' }}>Nicaragua</option>
                    <option value="5" {{$op = $paisCliente == 'CR' ? 'selected' : '' }}>Costa Rica</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-50 hover:text-gray-200" href="{{ route('login') }}">
                    {{ __('Ya estoy registrado') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrarme') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <div id="terms-conditions"
        class="overflow-hidden fixed top-0 right-0 left-0 z-50 w-screen inset-0 min-h-screen bg-gray-800 bg-opacity-50 backdrop-blur-sm">
        <div class="relative w-full min-h-screen flex justify-center items-center">
            <div
                class="relative rounded-lg shadow px-4 py-6 h-full bg-zinc-900 border border-white flex flex-col items-center justify-center w-full max-w-2xl text-white">
                <h1 class="text-xl mb-4 text-center">Antes de continuar por favor acepta los terminos y condiciones descritos a
                    continuacion.</h1>

                <button
                    id="btnAceptar"
                    onclick="hideElement(this.parentElement.parentElement.parentElement)"
                    class="hidden my-2 mx-auto text-white bg-green-800 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-green-700 dark:hover:bg-green-600 dark:focus:ring-green-500"
                >
                    Acepto Terminos y Condiciones
                </button>
                    <!--  
                <iframe
                    src="https://docs.google.com/viewer?srcid=1nys1ci4rHUr1bQSN1E9b3qXq4Wl2L-oA&pid=explorer&efh=false&a=v&chrome=false&embedded=true"
                    height="90%" width="100%" class="rounded-lg"></iframe>-->
                <div class="terminos" style="width: 95%; max-height: 95%; overflow: auto;">
                    <img src="https://medpharma.quinielacatar.com/terminos-1.jpg" style="    width: 100%;" alt="">
                    <img src="https://medpharma.quinielacatar.com/terminos-2.jpg" style="    width: 100%;" alt="">
                </div>
                
            </div>
        </div>
    </div>
</x-guest-layout>
