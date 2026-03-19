<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Quiniela') }} - Registro</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-light antialiased bg-complementary-primary">
        {{-- Full screen background --}}
        <div class="relative min-h-screen w-full">
            {{-- Background: main-bg hasta lg, bg-main-web desde lg --}}
            <div class="absolute inset-0 bg-cover bg-center lg:hidden"
                 style="background-image: url({{ asset('images/decoracion/main-bg.png') }});"></div>
            <div class="absolute inset-0 bg-cover bg-center hidden lg:block"
                 style="background-image: url({{ asset('images/decoracion/bg-main-web.png') }});"></div>
            {{-- Overlay oscuro --}}
            <div class="absolute inset-0 bg-black/50"></div>

            {{-- Mobile: bottom drawer / lg+: centered modal --}}
            <div
                class="
                    relative z-10 min-h-screen flex flex-col justify-end items-center
                    lg:justify-center lg:items-center lg:p-6
                "
            >
                {{-- Drawer / Modal panel --}}
                <div
                    class="
                        w-full rounded-t-3xl bg-complementary-primary/90 p-8
                        lg:max-w-2xl lg:rounded-3xl lg:shadow-2xl lg:w-full
                    "
                >
                    {{-- Logo --}}
                    <div class="mb-6">
                        <img
                            src="/images/logos/logo-white.png"
                            class="w-full max-w-92 mx-auto"
                            alt="{{ config('app.name', 'Quiniela') }}"
                        >
                    </div>

                    {{-- Title --}}
                    <h1 class="text-3xl text-center font-bold text-light mb-3">Crear cuenta</h1>

                    {{-- Subtitle --}}
                    <p class="text-center text-complementary-light text-sm lg:text-base mb-6 max-w-sm lg:max-w-lg mx-auto">
                        Uso exclusivo para profesionales de la salud y dependientes de farmacia. Se reserva el derecho de uso de la aplicación.
                    </p>

                    {{-- Validation Errors --}}
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    @if (isset($message_error))
                        <div class="bg-red-300 px-4 py-2 text-red-900 rounded-xl text-center mb-4" id="message-view">
                            <h3 class="text-2xl font-bold">Error al registrarse</h3>
                            <p>{{ $message_error }}</p>
                        </div>
                    @endif

                    {{-- Tabs pills --}}
                    <div class="mb-6">
                        <ul
                            class="flex text-base font-semibold text-center bg-red-900/60 rounded-full"
                            id="register-tab"
                            data-tabs-toggle="#register-tab-content"
                            data-tabs-type="pills"
                            data-tabs-active-classes="bg-red-600/60 text-light"
                            data-tabs-inactive-classes="text-complementary-light"
                            role="tablist"
                        >
                            <li class="flex-1" role="presentation">
                                <button
                                    class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full"
                                    id="doctor-tab"
                                    data-tabs-target="#doctor-panel"
                                    type="button"
                                    role="tab"
                                    aria-controls="doctor-panel"
                                    aria-selected="true"
                                >
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Doctor
                                </button>
                            </li>
                            <li class="flex-1" role="presentation">
                                <button
                                    class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full"
                                    id="dependiente-tab"
                                    data-tabs-target="#dependiente-panel"
                                    type="button"
                                    role="tab"
                                    aria-controls="dependiente-panel"
                                    aria-selected="false"
                                >
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    Dependiente
                                </button>
                            </li>
                        </ul>
                    </div>

                    {{-- Tab Content --}}
                    <div id="register-tab-content">
                        <div class="hidden" id="dependiente-panel" role="tabpanel" aria-labelledby="dependiente-tab">
                            <x-register-form />
                        </div>
                        <div class="hidden" id="doctor-panel" role="tabpanel" aria-labelledby="doctor-tab">
                            <x-register-doctor-form />
                        </div>
                    </div>

                    {{-- Login link --}}
                    <div class="text-center mt-6">
                        <p class="text-complementary-light text-sm mb-2">¿Ya tienes cuenta?</p>
                        <a href="{{ route('ingresa') }}" class="text-light font-bold text-base hover:text-secondary">
                            Iniciar Sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Terms & Conditions Modal --}}
        <div
            id="terms-conditions"
            class="hidden overflow-hidden fixed top-0 right-0 left-0 z-50 w-screen inset-0 min-h-screen bg-[gray-800] bg-opacity-50 backdrop-blur-sm"
        >
            <div class="relative w-full min-h-screen flex justify-center items-center">
                <div class="relative rounded-sm shadow p-6 h-full bg-complementary-primary border border-white flex flex-col items-center justify-center w-full max-w-2xl text-center">
                    <p class="text-lg mb-6">
                        Antes de continuar lee cuidadosamente el siguiente documento de Términos y Condiciones para participar en el sistema de Quiniela
                    </p>

                    <div class="flex justify-between rounded-md overflow-hidden mb-6">
                        <a
                            class="w-full flex items-center gap-3 text-sm text-light py-3 px-3 bg-primary hover:brightness-[1.20]"
                            href="/docs/terminos-y-condiciones-donovan.pdf"
                            target="_blank"
                        >
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="#909090" d="m24.1 2.072l5.564 5.8v22.056H8.879V30h20.856V7.945z"/><path fill="#f4f4f4" d="M24.031 2H8.808v27.928h20.856V7.873z"/><path fill="#7a7b7c" d="M8.655 3.5h-6.39v6.827h20.1V3.5z"/><path fill="#dd2025" d="M22.472 10.211H2.395V3.379h20.077z"/><path fill="#464648" d="M9.052 4.534H7.745v4.8h1.028V7.715L9 7.728a2 2 0 0 0 .647-.117a1.4 1.4 0 0 0 .493-.291a1.2 1.2 0 0 0 .335-.454a2.1 2.1 0 0 0 .105-.908a2.2 2.2 0 0 0-.114-.644a1.17 1.17 0 0 0-.687-.65a2 2 0 0 0-.409-.104a2 2 0 0 0-.319-.026m-.189 2.294h-.089v-1.48h.193a.57.57 0 0 1 .459.181a.92.92 0 0 1 .183.558c0 .246 0 .469-.222.626a.94.94 0 0 1-.524.114m3.671-2.306c-.111 0-.219.008-.295.011L12 4.538h-.78v4.8h.918a2.7 2.7 0 0 0 1.028-.175a1.7 1.7 0 0 0 .68-.491a1.9 1.9 0 0 0 .373-.749a3.7 3.7 0 0 0 .114-.949a4.4 4.4 0 0 0-.087-1.127a1.8 1.8 0 0 0-.4-.733a1.6 1.6 0 0 0-.535-.4a2.4 2.4 0 0 0-.549-.178a1.3 1.3 0 0 0-.228-.017m-.182 3.937h-.1V5.392h.013a1.06 1.06 0 0 1 .6.107a1.2 1.2 0 0 1 .324.4a1.3 1.3 0 0 1 .142.526c.009.22 0 .4 0 .549a3 3 0 0 1-.033.513a1.8 1.8 0 0 1-.169.5a1.1 1.1 0 0 1-.363.36a.67.67 0 0 1-.416.106m5.08-3.915H15v4.8h1.028V7.434h1.3v-.892h-1.3V5.43h1.4v-.892"/><path fill="#dd2025" d="M21.781 20.255s3.188-.578 3.188.511s-1.975.646-3.188-.511m-2.357.083a7.5 7.5 0 0 0-1.473.489l.4-.9c.4-.9.815-2.127.815-2.127a14 14 0 0 0 1.658 2.252a13 13 0 0 0-1.4.288Zm-1.262-6.5c0-.949.307-1.208.546-1.208s.508.115.517.939a10.8 10.8 0 0 1-.517 2.434a4.4 4.4 0 0 1-.547-2.162Zm-4.649 10.516c-.978-.585 2.051-2.386 2.6-2.444c-.003.001-1.576 3.056-2.6 2.444M25.9 20.895c-.01-.1-.1-1.207-2.07-1.16a14 14 0 0 0-2.453.173a12.5 12.5 0 0 1-2.012-2.655a11.8 11.8 0 0 0 .623-3.1c-.029-1.2-.316-1.888-1.236-1.878s-1.054.815-.933 2.013a9.3 9.3 0 0 0 .665 2.338s-.425 1.323-.987 2.639s-.946 2.006-.946 2.006a9.6 9.6 0 0 0-2.725 1.4c-.824.767-1.159 1.356-.725 1.945c.374.508 1.683.623 2.853-.91a23 23 0 0 0 1.7-2.492s1.784-.489 2.339-.623s1.226-.24 1.226-.24s1.629 1.639 3.2 1.581s1.495-.939 1.485-1.035"/><path fill="#909090" d="M23.954 2.077V7.95h5.633z"/><path fill="#f4f4f4" d="M24.031 2v5.873h5.633z"/><path fill="#fff" d="M8.975 4.457H7.668v4.8H8.7V7.639l.228.013a2 2 0 0 0 .647-.117a1.4 1.4 0 0 0 .493-.291a1.2 1.2 0 0 0 .332-.454a2.1 2.1 0 0 0 .105-.908a2.2 2.2 0 0 0-.114-.644a1.17 1.17 0 0 0-.687-.65a2 2 0 0 0-.411-.105a2 2 0 0 0-.319-.026m-.189 2.294h-.089v-1.48h.194a.57.57 0 0 1 .459.181a.92.92 0 0 1 .183.558c0 .246 0 .469-.222.626a.94.94 0 0 1-.524.114m3.67-2.306c-.111 0-.219.008-.295.011l-.235.006h-.78v4.8h.918a2.7 2.7 0 0 0 1.028-.175a1.7 1.7 0 0 0 .68-.491a1.9 1.9 0 0 0 .373-.749a3.7 3.7 0 0 0 .114-.949a4.4 4.4 0 0 0-.087-1.127a1.8 1.8 0 0 0-.4-.733a1.6 1.6 0 0 0-.535-.4a2.4 2.4 0 0 0-.549-.178a1.3 1.3 0 0 0-.228-.017m-.182 3.937h-.1V5.315h.013a1.06 1.06 0 0 1 .6.107a1.2 1.2 0 0 1 .324.4a1.3 1.3 0 0 1 .142.526c.009.22 0 .4 0 .549a3 3 0 0 1-.033.513a1.8 1.8 0 0 1-.169.5a1.1 1.1 0 0 1-.363.36a.67.67 0 0 1-.416.106m5.077-3.915h-2.43v4.8h1.028V7.357h1.3v-.892h-1.3V5.353h1.4v-.892"/></svg></span>
                            Términos y Condiciones
                        </a>

                        <a
                            class="flex items-center gap-2 py-3 px-3 bg-primary hover:brightness-[1.20]"
                            href="/docs/terminos-y-condiciones-donovan.pdf"
                            download
                        >
                            <span>
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M3.5 13h9a.75.75 0 0 1 .102 1.493l-.102.007h-9a.75.75 0 0 1-.102-1.493zh9zM7.898 1.007L8 1a.75.75 0 0 1 .743.648l.007.102v7.688l2.255-2.254a.75.75 0 0 1 .977-.072l.084.072a.75.75 0 0 1 .072.977l-.072.084L8.53 11.78a.75.75 0 0 1-.976.073l-.084-.073l-3.536-3.535a.75.75 0 0 1 .977-1.133l.084.072L7.25 9.44V1.75a.75.75 0 0 1 .648-.743L8 1z"/></svg></span>
                            </span>
                        </a>
                    </div>

                    <p class="max-w-96 mb-4">
                        Al hacer click en el siguiente botón, aceptas plenamente los términos anteriormente expuestos
                    </p>

                    <button
                        id="btnAceptar"
                        onclick="hideElement(this.parentElement.parentElement.parentElement)"
                        class="hidden mx-auto bg-secondary text-dark font-semibold rounded-sm text-sm px-4 py-2 text-center hover:brightness-[1.10] focus:ring-4 focus:ring-light"
                    >
                        Acepto los Términos y Condiciones
                    </button>

                    <div class="terminos" style="width: 95%; max-height: 95%; overflow: auto;">
                        <img src="https://medpharma.quinielacatar.com/terminos-1.jpg" style="width: 100%;" alt="">
                        <img src="https://medpharma.quinielacatar.com/terminos-2.jpg" style="width: 100%;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
