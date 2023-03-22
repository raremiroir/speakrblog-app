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
   <div class="flex flex-col w-full md:flex-row justify-between gap-2 items-start lg:items-start">
      <div class="order-last md:order-first flex flex-col gap-1">
         {{-- Tags --}}
         <div class="flex flex-wrap gap-2">
            @foreach ($post->tags as $tag)
               <div class="opacity-60 hover:opacity-100 transition-all duration-200 ease-in-out">
                  <x-tag :tag="$tag" />
               </div>
            @endforeach
         </div>
         {{-- Title --}}
         <h5 class="text-2xl font-title text-success border-b-2 border-success/40">{{ $post->title }}</h5>
      </div>
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
            {{-- Like / Unlike --}}
            <div class="col-md-6">
               @auth
                  @if ($post->isLikedByUser(auth()->user()))
                     <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <x-button type="submit" green>
                              <i class="fas fa-heart"></i>
                              {{ $post->likes->count() }}
                              {{ Str::plural('like', $post->likes->count()) }}
                           </x-button>
                     </form>
                  @else
                     <form action="{{ route('posts.like', $post->id) }}" method="POST">
                           @csrf
                           <x-button type="submit" green outline>
                              <i class="far fa-heart"></i>
                              {{ $post->likes->count() }}
                              {{ Str::plural('like', $post->likes->count()) }}
                           </x-button>
                     </form>
                  @endif
               @else
                  <x-button href="{{ route('login') }}">
                     <i class="far fa-heart"></i>
                     {{ $post->likes->count() }}
                     {{ Str::plural('like', $post->likes->count()) }}
                  </x-button>
               @endauth
            </div>
            {{-- Comments --}}
            <div class="">
               <x-button secondary outline href="{{ route('posts.show', $post->id) }}">
                  <i class="fas fa-comment-alt"></i>
                  {{ $post->comments->count() }}
                  {{ Str::plural('comment', $post->comments->count()) }}
               </x-button>
            </div>
            {{-- Options --}}
            @if ($post->author->is(auth()->user()) || auth()->user()->is_admin)
               <x-dropdown>
                  <x-slot name="trigger">
                     <x-button flat>
                        <i class="fas fa-cog"></i> Options
                     </x-button>
                 </x-slot>
                  <x-dropdown.header label="Post Options">
                     <div class="h-fit">
                        <x-button info flat sm full href="{{ route('posts.edit', $post) }}">
                           <div class="flex gap-2 text-info dark:text-info-l1 font-semibold">
                              <i class="fas fa-edit"></i> Edit Post
                           </div>
                        </x-button>
                     </div>
                     <hr class="border-gray-400 dark:border-gray-600 my-1" />
                     <div class="h-fit">
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="w-full h-fit">
                           @csrf
                           @method('DELETE')
                           <x-button type="submit" negative sm flat full>
                              <div class="flex gap-2 text-error dark:text-error-l1 font-regular opacity-80">
                                 <i class="fas fa-trash"></i> Remove Post
                              </div>
                           </x-button>
                        </form>
                     </div>
                  </x-dropdown.header>
               </x-dropdown>
            @endif
         </div>
         {{-- Read more --}}
         <div class="flex justify-end">
            <x-button flat green href="{{ route('posts.show', $post->id) }}">
               Read more <i class="fas fa-angle-double-right"></i>
            </x-button>
         </div>
    </div>
</div>
