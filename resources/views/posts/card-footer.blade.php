<div class="flex flex-row justify-between items-center">
   {{-- Actions --}}
   <div class="flex items-center justify-start gap-2">
      {{-- Like / Unlike --}}
      @include('posts.actions.btn-like', ['post' => $post])
      {{-- Comments --}}
      @include('posts.actions.btn-comment', ['post' => $post])
      {{-- Options --}}
      @include('posts.actions.options', ['post' => $post])
   </div>
   {{-- Read more --}}
   @include('posts.actions.btn-read-more', ['post' => $post])
</div>