@props([
   'post' => null,
])

@php 
   $post = $post ?? $slot;


   $transition = 'transition-all duration-200 ease-in-out';
   $bg = 'bg-gray-200 dark:bg-gray-600/20 hover:bg-gray-300 dark:hover:bg-gray-600/40';
   $text = 'text-gray-900 dark:text-gray-300';

   $defaultClasses = "$transition $bg $text";
@endphp

<div
    class="
      {{ $defaultClasses }}
      mb-4 py-4 px-6 
      w-11/12 md:w-5/6 xl:w-3/5 rounded-2xl
      ">

      {{-- Card Header --}}
   <div class="flex flex-col lg:flex-row justify-between gap-2 items-start lg:items-center">
      {{-- Title --}}
      <h5 class="order-last lg:order-first text-2xl font-title text-success border-b-2 border-success/40">{{ $post->title }}</h5>
      {{-- Authored by --}}
      <div class="order-first lg:order-last text-xs text-gray-400 dark:text-gray-500">
         Spoken by
         <a 
            href="{{ route('users.show', $post->user->username) }}" 
            class="text-success-d2/50 dark:text-success-l2/50 hover:text-success-d2 dark:hover:text-success-l2 font-bold hover:underline {{ $transition }}"
            >{{ $post->user->username }}</a> on <span class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
      </div>
      {{-- Deleted --}}
      @if ($post->trashed())
         <span class="float-right badge badge-danger">Deleted</span>
      @endif
   </div>

   {{-- Card Body --}}
   <div class="pt-2">
      {{-- Text --}}
      <p class="card-text line-clamp-3">{{ $post->body }}</p>
      {{-- Image --}}
      {{-- @if ($post->image)
         <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-3" alt="Post image">
      @endif --}}
      {{-- Tags --}}
      {{-- <p class="card-text">
         <small class="text-muted">
            @foreach ($post->tags as $tag)
               <a href="{{ route('posts.index', ['tag' => $tag->name]) }}">#{{ $tag->name }}</a>
            @endforeach
         </small>
      </p> --}}
   </div>

   {{-- Card Footer --}}
   <div class="card-footer">
      <div class="row">
         {{-- Like --}}
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
            <span class="badge badge-pill badge-secondary">
               {{ $post->likes->count() }}
               {{ Str::plural('like', $post->likes->count()) }}
            </span>
         </div> --}}
         {{-- Read more --}}
         <div class="flex justify-end">
            <x-button color="transp" size="sm" href="{{ route('posts.show', $post->id) }}">
               Read more
            </x-button>
         </div>
        </div>
    </div>
</div>
