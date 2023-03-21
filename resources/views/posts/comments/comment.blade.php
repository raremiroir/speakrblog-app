<div class="bg-gray-800 dark:bg-gray-800 rounded-md my-1 p-2 w-full flex flex-col">
    <div class="flex gap-4 items-center w-full">
        <x-profile-avatar :user="$comment->user" size={{48}} class="h-fit mr-2" />
        <div class="flex flex-col gap-2 w-full">
            <div class="flex flex-col">
                <p class="text-gray-500">
                    <small class="text-muted">
                        Posted <b>{{ $comment->created_at->diffForHumans() }}</b> by 
                        <a 
                            class="font-semibold hover:underline text-success/40 dark:text-success-l1/40"
                            href="{{ route('users.show', $comment->user->username) }}">
                            {{ $comment->user->username == auth()->user()->username ? 'You' : $comment->user->username }}
                        </a>
                    </small>
                </p>
                <p class="text-gray-800 dark:text-gray-200">{{ $comment->body }}</p>
            </div>
            <div class="flex flex-row justify-end w-full">
                @if (auth()->check() &&
                        (auth()->user()->isAdmin() ||
                            auth()->user()->id == $comment->user_id))
                    <form action="{{ route('posts.comments.destroy', [$post->id, $comment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" color="error" size="xs" class="opacity-60 hover:opacity-100">Delete</x-button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    @if ($comment->children->count() > 0)
        <div class="ml-4">
            @foreach ($comment->children as $child)
                @include('comments.comment', ['comment' => $child])
            @endforeach
        </div>
    @endif
</div>
