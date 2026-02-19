<div
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-auth bg-[--dark-color]"
    style="background-image: url({{ asset('images/fondo-azul.png') }});"
>

    <div class="w-full sm:max-w-xl mt-28 md:mt-6 px-6 py-4 h-auto bg-[--complementary-primary-color] bg-opacity-80 shadow-md sm:rounded-lg overflow-y-auto">
        <div>
            <img
                src="/images/logos/logo-white.png"
                class="max-w-md"
                alt=""
            >
        </div>
        {{ $slot }}
    </div>
</div>
