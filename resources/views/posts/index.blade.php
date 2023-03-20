<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('All Speaks') }}
            <x-slot name="append">
                <a href={{ route('posts.add') }}>
                    <x-button color="primary">
                        Speak Something!
                    </x-button>
                </a>
            </x-slot>
        </x-header>
    </x-slot>

    <x-posts-grid :posts="$posts"/>
</x-app-layout>
