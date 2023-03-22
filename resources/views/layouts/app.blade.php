@props([
    'hasAside' => false,
    'asideTitle' => '',
])

@php
    $widthClass = 'w-11/12 md:w-5/6 lg:w-4/5 xl:w-3/4';
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
            {{-- Vite --}}
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            {{-- Wire UI --}}
            @wireUiScripts
            <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="{{ $widthClass }} px-16 xl:px-16 flex mx-auto justify-between items-center pt-24 pb-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Page wrapper --}}
            <div class="{{ $widthClass }} mx-auto grid grid-cols-3 grid-rows-none">

                {{-- Main --}}
                <main class="{{ $hasAside ? 'col-span-2' : 'col-span-3' }} w-full p-8">
                    {{ $slot }}
                </main>
                
                {{-- Aside --}}
                @if ($hasAside)
                    <aside class="col-span-1 p-8 bg-gray-100 dark:bg-gray-900 border-l-4 border-gray-200 dark:border-gray-800 h-screen">
                        <h2 class="font-title text-2xl text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-700/60 dark:border-gray-300/60 w-fit">{{ $asideTitle }}</h2>
                        {{ $aside }}
                    </aside>
                @endif

            </div>
        </div>
        <script>
            const searchToggle = document.getElementById('search-toggle');
            const searchContainer = document.getElementById('search-container');
            const searchInput = document.getElementById('search-input');
            const searchResults = document.getElementById('search-results');
            const closeSearchBtn = document.getElementById('close-search-btn');

            document.addEventListener('keydown', event => {
                if (event.ctrlKey && event.key === 'k') {
                    event.preventDefault();
                    const searchToggle = document.getElementById('search-toggle');
                    searchToggle.click();
                }
                if (event.key === 'Escape') {
                    event.preventDefault();
                    const searchToggle = document.getElementById('search-toggle');
                    const searchContainer = document.getElementById('search-container');
                    searchContainer.classList.add('hidden');
                    searchInput.value = '';
                    searchResults.innerHTML = '';
                }
            })

            searchToggle.addEventListener('click', () => {
                searchContainer.classList.toggle('hidden');
                searchInput.focus();
            });
            closeSearchBtn.addEventListener('click', () => {
                searchContainer.classList.add('hidden');
                searchInput.value = '';
                searchResults.innerHTML = '';
            });

            searchInput.addEventListener('input', () => {
                const searchValue = searchInput.value.trim();

                if (searchValue.length >= 2) {
                    fetch(`{{ route('search') }}?search=${searchValue}`)
                        .then(response => response.text())
                        .then(html => {
                        searchResults.innerHTML = html;
                        });
                } else {
                    searchResults.innerHTML = '';
                }
            });
        </script>
        @stack('scripts')
        @livewireScripts
    </body>
</html>
