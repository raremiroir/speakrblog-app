<x-app-layout>
    <x-slot name="header">
        <x-header>
            All Speaks
            <x-slot name="append">
                <x-btn color="primary" href="{{ route('posts.add') }}">
                    <x-application-logo class="block h-6 w-auto dark:fill-white dark:group-hover:fill-black fill-gray-800 group-hover:fill-gray-200 transition-all duration-200 ease-out" />
                    Speak Something!
                </x-btn>
            </x-slot>
        </x-header>
    </x-slot>

    @include('posts.grid', ['posts' => $posts])
</x-app-layout>
