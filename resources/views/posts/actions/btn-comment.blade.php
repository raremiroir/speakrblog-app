<div class="">
   <x-button secondary sm outline href="{{ route('posts.show', $post->slug) }}">
      <i class="fas fa-comment-alt"></i>
      {{ $post->comments->count() }}
      {{ Str::plural('comment', $post->comments->count()) }}
   </x-button>
</div>