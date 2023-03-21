<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
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
    </body>
</html>
