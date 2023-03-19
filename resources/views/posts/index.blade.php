<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('All Speaks') }}
            <x-slot name="append">
                <a href={{ route('posts.add') }}>
                    <x-button>
                        Speak Something!
                    </x-button>
                </a>
            </x-slot>
        </x-header>
    </x-slot>

    <div class="my-16 flex flex-col gap-8 items-center justify-start">
        @foreach ($posts as $post)
            <div class="
                    bg-gray-200 dark:bg-gray-600/20 
                    hover:bg-gray-300 dark:hover:bg-gray-600/40
                    transition-all duration-200 ease-in-out
                    mb-4 py-4 px-6 
                    text-gray-900 dark:text-gray-300
                    w-2/3 rounded-2xl
                    ">
                <div class="card-header">
                    {{-- <a href="{{ /route('users.show', $post->user->id) }}">{{ $post->user->name }}</a>  --}}
                    <div class="float-right text-xs text-gray-400 dark:text-gray-500">
                        Speaked by 
                        <a href="{{--{{ /route('users.show', $post->user->id) }}--}}"
                            class="text-success-d2/50 dark:text-success-l2/50 hover:text-success-d2 dark:hover:text-success-l2 transition-all duration-200 ease-in-out">
                            {{ $post->user->username }}
                        </a> 
                        on {{ $post->created_at->format('d/m/Y') }}
                    </div>
                    @if ($post->trashed())
                        <span class="float-right badge badge-danger">Deleted</span>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title text-2xl font-title text-success-l1">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-3" alt="Post image">
                    @endif
                    {{-- <p class="card-text">
                        <small class="text-muted">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.index', ['tag' => $tag->name]) }}">#{{ $tag->name }}</a>
                            @endforeach
                        </small>
                    </p> --}}
                </div>
                <div class="card-footer">
                    <div class="row">
                        {{-- <div class="col-md-6">
                            @auth
                                @if ($post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Unlike</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Like</button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Like</a>
                            @endauth
                            <span class="badge badge-pill badge-secondary">{{ $post->likes->count() }}
                                {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div> --}}
                        <div class="col-md-6 text-right">
                            <a href="{{ route('posts.show', $post->id) }}">
                                <button class="transition-all duration-200 ease-in-out dark:bg-gray-700 py-2 px-4 rounded-lg dark:hover:bg-success-d2/60">
                                    Read more
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
