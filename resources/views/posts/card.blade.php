@php 
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
   @include('posts.card-header', ['post' => $post])
   
   {{-- Card Body --}}
   <div class="pt-2">
      {{-- Image --}}
      {{-- @if ($post->image)
         <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-3" alt="Post image">
      @endif --}}
      {{-- Text --}}
      <p class="card-text line-clamp-3 text-gray-600 dark:text-gray-400">{{ $post->body }}</p>
   </div>

   {{-- Card Footer --}}
   @include('posts.card-footer', ['post' => $post])
</div>
