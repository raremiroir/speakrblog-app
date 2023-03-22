@props([
   'post' => null,
])

@php 
   $post = $post ?? $slot;


   $transition = 'transition-all duration-200 ease-in-out';
   $bg = 'bg-gray-200 dark:bg-gray-800 hover:bg-gray-300 dark:hover:bg-gray-600/40';
   $text = 'text-gray-900 dark:text-gray-300';

   $defaultClasses = "$transition $bg $text";
@endphp

<div
    class="
      {{ $defaultClasses }}
      mb-4 py-4 px-6 
      flex flex-col gap-4
      w-full rounded-2xl
      ">

   {{-- Card Header --}}
   <div class="flex flex-col items-start gap-2 w-full">
      {{-- Tags --}}
      <div class="flex flex-wrap gap-2">
         @foreach ($post->tags as $tag)
             <x-tag :tag="$tag" />
         @endforeach
      </div>
      <div class="flex flex-col w-full md:flex-row justify-between gap-2 items-start lg:items-center">
         {{-- Title --}}
         <h5 class="order-last md:order-first text-2xl font-title text-success border-b-2 border-success/40">{{ $post->title }}</h5>
         {{-- Authored by --}}
         <div class="order-first md:order-last text-xs text-gray-400 dark:text-gray-500 whitespace-nowrap flex items-center">
            <a 
               href="{{ route('users.show', $post->user->username) }}" 
               class="text-success-d2/50 dark:text-success-l2/50 hover:text-success-d2 dark:hover:text-success-l2 font-bold hover:underline {{ $transition }} flex gap-2 items-center"
               >
                  <x-profile-avatar :user="$post->user" />
                  Spoken by {{ $post->user->username }}
            </a>&nbsp;on&nbsp;<span class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
         </div>
         {{-- Deleted --}}
         @if ($post->trashed())
            <span class="float-right badge badge-danger">Deleted</span>
         @endif
      </div>
   </div>

   {{-- Card Body --}}
   <div class="pt-2">
      {{-- Text --}}
      <p class="card-text line-clamp-3">{{ $post->body }}</p>
      {{-- Image --}}
      {{-- @if ($post->image)
         <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-3" alt="Post image">
      @endif --}}
   </div>

   {{-- Card Footer --}}
   <div class="flex flex-row justify-between items-center">
         {{-- Actions --}}
         <div class="flex items-center justify-start gap-2">
            {{-- Like --}}
            <div class="col-md-6">
               @auth
                  @if ($post->isLikedByUser(auth()->user()))
                     <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <x-btn type="submit" size="sm" color="success">
                              <i class="fas fa-heart"></i>
                              {{ $post->likes->count() }}
                              {{ Str::plural('like', $post->likes->count()) }}
                        </x-btn>
                     </form>
                  @else
                     <form action="{{ route('posts.like', $post->id) }}" method="POST">
                           @csrf
                           <x-btn type="submit" size="sm" color="primary">
                              <i class="far fa-heart"></i>
                              {{ $post->likes->count() }}
                              {{ Str::plural('like', $post->likes->count()) }}
                           </x-btn>
                     </form>
                  @endif
               @else
                  <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                     <x-btn color='default' size="sm">
                        <i class="far fa-heart"></i>
                        {{ $post->likes->count() }}
                        {{ Str::plural('like', $post->likes->count()) }}
                     </x-btn>
                  </a>
               @endauth
            </div>
            {{-- Comments --}}
            <div class="">
               <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">
                  <x-btn color="default" outlined size="sm">
                     <i class="fas fa-comment-alt"></i>
                     {{ $post->comments->count() }}
                     {{ Str::plural('comment', $post->comments->count()) }}
                  </x-btn>
               </a>
            </div>
         </div>
         {{-- Read more --}}
         <div class="flex justify-end">
            <x-btn color="transp" size="sm" href="{{ route('posts.show', $post->id) }}">
               Read more <i class="fas fa-angle-double-right"></i>
            </x-btn>
         </div>
    </div>
</div>
