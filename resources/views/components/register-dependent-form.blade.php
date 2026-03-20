<form
    method="POST"
    action="{{ route('register') }}"
    class="formulario-auth grid grid-cols-1 md:grid-cols-2 gap-4 2xl:gap-6 w-full max-w-xl mx-auto"
>
    @csrf

    <input type="hidden" name="user_type_id" value="1">
    <input type="hidden" name="accepted_terms_version" value="">

    <x-auth-input
        label="Nombres del Dependiente"
        id="dep_nombres"
        name="nombres"
        placeholder="Ingrese sus nombres"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </x-slot>
    </x-auth-input>

    <x-auth-input
        label="Apellidos del Dependiente"
        id="dep_apellidos"
        name="apellidos"
        placeholder="Ingrese sus apellidos"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </x-slot>
    </x-auth-input>

    <x-auth-input
        label="DPI del Dependiente"
        id="dep_numero_documento"
        name="numero_documento"
        placeholder="Ingrese su DPI"
        maxlength="13"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
            </svg>
        </x-slot>
    </x-auth-input>

    <x-auth-input
        label="Teléfono del Dependiente"
        id="dep_telefono"
        name="telefono"
        placeholder="Ingrese su teléfono"
        maxlength="8"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
        </x-slot>
    </x-auth-input>

    <x-auth-input
        label="Correo electrónico del Dependiente"
        id="dep_email"
        name="email"
        type="email"
        placeholder="correo@ejemplo.com"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
        </x-slot>
    </x-auth-input>

    @php
        $paises = [1 => 'Guatemala', 2 => 'Honduras'];
    @endphp
    <x-auth-select label="País" id="dep_pais_id" name="pais_id" :required="true">
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
            </svg>
        </x-slot>
        @foreach ($paises as $value => $nombre_pais)
            <option value="{{ $value }}" {{ old('pais_id') == $value ? 'selected' : '' }}>{{ $nombre_pais }}</option>
        @endforeach
    </x-auth-select>

    <x-auth-input
        label="Dirección del Dependiente"
        id="dep_direccion"
        name="direccion"
        placeholder="Ingrese su dirección"
        maxlength="200"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </x-slot>
    </x-auth-input>

    @php
        $cadenas = [1 => 'Cadena 1', 2 => 'Cadena 2'];
    @endphp
    <x-auth-select label="Cadena" id="dep_cadena" name="company_id" :required="true">
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.016A3.001 3.001 0 0 0 20.25 9.35m-16.5 0a3.004 3.004 0 0 1-2.25-1.016 2.993 2.993 0 0 1-1.5.266" />
            </svg>
        </x-slot>
        @foreach ($cadenas as $value => $nombre_cadena)
            <option value="{{ $value }}" {{ old('company_id') == $value ? 'selected' : '' }}>{{ $nombre_cadena }}</option>
        @endforeach
    </x-auth-select>

    <x-auth-input
        label="Sucursal"
        id="dep_sucursal"
        name="branch"
        placeholder="Sucursal donde laboraz"
        :required="true"
    >
        <x-slot name="prefix">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </x-slot>
    </x-auth-input>

    {{-- Submit --}}
    <div class="mt-2 md:col-span-2">
        <button
            type="button"
            class="btn-crear-cuenta w-full bg-red-600/80 text-light font-bold rounded-full text-lg px-6 py-3.5 hover:brightness-[1.1] focus:ring-3 focus:ring-white flex items-center justify-center gap-2"
        >
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
            Crear Cuenta
        </button>
    </div>
</form>
