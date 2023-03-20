<x-app-layout>
    <x-slot name="header">
        <div class="w-4/5 mx-auto flex items-center justify-between"> 
            <x-header>
                {{ $post->title }}
            </x-header>
            <div class="flex flex-col gap-2 items-end">
                @if (Auth::check() && ($post->user_id === Auth::user()->id))
                    <div class="flex gap-2 justify-end">
                        <x-button color="info" size="xs" class="opacity-60 hover:opacity-80" href="{{ route('posts.edit', $post->id) }}">
                            <i class="fas fa-edit"></i> Edit
                        </x-button>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" color="error" size="xs" class="opacity-40 hover:opacity-80">
                                <i class="fas fa-trash"></i> Delete
                            </x-button>
                        </form>
                    </div>
                    <hr class="w-full border-gray-400 dark:border-gray-600 "/>
                @endif
                <div class="flex flex-col gap-0 items-end">
                    <div class="text-gray-500">{{ $post->created_at }}</div>
                    <div class="text-gray-500">by <a href="{{ route('users.show', $post->user->username) }}" class="text-success/80 font-semibold hover:text-success">{{ $post->user->username }}</a></div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-500/20 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 ">
                <div class="mb-4 text-black dark:text-white">{!! nl2br(e($post->body)) !!}</div>
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
</x-app-layout>
