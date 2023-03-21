<x-app-layout>
    <x-slot name="header">
        <div class="w-4/5 mx-auto flex items-center justify-between"> 
            <x-header>
                {{ $post->title }}
            </x-header>
            <div class="flex flex-col gap-2 items-end">
                @if (Auth::check() && ($post->user_id === Auth::user()->id))
                    <div class="flex gap-2 justify-end">
                        <x-btn color="info" size="xs" class="opacity-60 hover:opacity-80" href="{{ route('posts.edit', $post->id) }}">
                            <i class="fas fa-edit"></i> Edit
                        </x-btn>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <x-btn type="submit" color="error" size="xs" class="opacity-40 hover:opacity-80">
                                <i class="fas fa-trash"></i> Delete
                            </x-btn>
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

    <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8 flex flex-col gap-6">
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

        {{-- Form for adding comments --}}
        <div class="w-full bg-white shadow-lg dark:bg-black/20 rounded-lg py-2 px-4">
            <h5 class="text-xl font-title text-success/40 dark:text-success-l1/40 mb-2">Leave a comment</h5>
            <form action="{{ route('posts.comments.store', $post->id) }}" method="POST" class="flex flex-col gap-2">
                @csrf
                <div class="form-group">
                    <x-textarea id="body" name="body" placeholder="Type your comment here...">
                        {{ old('body') }}
                    </x-textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
                <div class="flex justify-end">
                    <x-btn type="submit" color="success">Submit</x-btn>
                </div>
            </form>
        </div>

        {{-- Comments --}}
        @if ($post->comments->count() > 0)
            <div class="w-full bg-white shadow-lg dark:bg-black/20 rounded-lg py-2 px-4 flex flex-col gap-4">
                @foreach ($post->comments as $comment)
                    @include('posts.comments.comment', compact('comment'))
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
