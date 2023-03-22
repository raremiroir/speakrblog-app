<div class="flex flex-col w-full md:flex-row justify-between gap-2 items-start lg:items-start">
   <div class="order-last md:order-first flex flex-col gap-1">
      {{-- Tags --}}
      @include('posts.tags.card-flex', ['tags' => $post->tags])
      {{-- Title --}}
      <h5 class="text-2xl font-title text-gray-900 dark:text-gray-100 border-b-2 border-success/40">{{ $post->title }}</h5>
   </div>
   
   {{-- Authored by --}}
   @include('posts.author-text', ['post' => $post])

   {{-- Deleted --}}
   @if ($post->trashed())
      <span class="float-right badge badge-danger">Deleted</span>
   @endif
</div>