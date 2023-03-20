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

    <div class="my-16 flex flex-col gap-8 items-center justify-start">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-app-layout>
