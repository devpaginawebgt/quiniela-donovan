<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form
            method="POST"
            action="{{ route('login') }}"
            class="formulario-auth mb-2"
        >
            @csrf

            <input type="hidden" name="pass" value="{{ $pass }}">

            <div class="mt-2 mb-4">
                <x-label for="documento" :value="__('Número de Documento')" />

                <x-input
                    id="documento"
                    class="block mt-1 w-full"
                    type="text"
                    name="numero_documento"
                    :value="old('numero_documento')"
                    required
                    autofocus
                    maxlength="13"
                />
            </div>

            <x-button class="w-full text-center text-lg">
                {{ __('Ingresar') }}
            </x-button>
        </form>
    </x-auth-card>
</x-guest-layout>
