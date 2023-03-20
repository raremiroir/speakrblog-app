<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('All Speaks') }}
            <x-slot name="append">
                <x-button color="primary" href="{{ route('posts.add') }}">
                    Speak Something!
                </x-button>
            </x-slot>
        </x-header>
    </x-slot>

    <x-posts-grid :posts="$posts"/>
</x-app-layout>
