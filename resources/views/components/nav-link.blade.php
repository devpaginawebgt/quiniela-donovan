@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex h-max items-center px-4 py-2 rounded-lg text-sm font-semibold leading-5 text-[--dark-color] bg-[--secondary-color] transition duration-150 ease-in-out'
            : 'inline-flex h-max items-center px-4 py-2 rounded-lg text-sm font-medium leading-5 text-[--complementary-light-color] hover:text-[--light-color] hover:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
