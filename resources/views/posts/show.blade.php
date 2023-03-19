<x-app-layout>
    <x-slot name="header">
        <div class="w-4/5 mx-auto">
            @if (Auth::check() && ($post->user_id === Auth::user()->id))
                <a href="{{ route('posts.edit', $post->id) }}"
                    class="text-blue-500 hover:text-blue-700 mr-4">
                    Edit
                </a>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                    class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        Delete
                    </button>
                </form>
            @endif
        </div>
        <x-header>
            {{ $post->title }}

            <x-slot name="append">
                <div class="flex flex-col gap-0">
                    <div class="text-gray-500">{{ $post->created_at }}</div>
                    <div class="text-gray-500">by {{ $post->user->username }}</div>
                </div>
            </x-slot>
        </x-header>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800/20 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 ">
                    <div class="mb-4 dark:text-gray-100">{!! nl2br(e($post->body)) !!}</div>
                    <div class="flex justify-between">
                        {{-- <div>
                            <form method="POST" action="{{ route('posts.like', $post->id) }}">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700">
                                    {{ $post->likes()->count() }} {{ Str::plural('Like', $post->likes()->count()) }}
                                </button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
