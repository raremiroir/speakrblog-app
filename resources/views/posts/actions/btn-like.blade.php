@props([
   'post',
   'comment' => null,
])

@php 
if ($comment != null) {
   $likeAction = route('posts.comments.like', [$post->id, $comment->id]);
   $unlikeAction = route('posts.comments.unlike', [$post->id, $comment->id]);
   $count = $comment->likes->count();
} else {
   $likeAction = route('posts.like', [$post->id]);
   $unlikeAction = route('posts.unlike', [$post->id]);
   $count = $post->likes->count();
};
@endphp

{{-- Like / Unlike --}}
<div class="col-md-6">
   @auth
      @if ($post->isLikedByUser(auth()->user()))
         <form action="{{ $unlikeAction }}" method="POST">
               @csrf
               @method('DELETE')
               <x-button type="submit" primary sm>
                  <i class="fas fa-heart"></i>
                  {{ $post->likes->count() }}
                  {{ Str::plural('like', $count) }}
               </x-button>
         </form>
      @else
         <form action="{{ $likeAction }}" method="POST" class="opacity-80 hover:opacity-100 transition-all duration-200 ease-in-out">
               @csrf
               <x-button type="submit" primary sm>
                  <i class="far fa-heart"></i>
                  {{ $post->likes->count() }}
                  {{ Str::plural('like', $count) }}
               </x-button>
         </form>
      @endif
   @else
      <x-button href="{{ route('login') }}" secondary sm>
         <i class="far fa-heart"></i>
         {{ $post->likes->count() }}
         {{ Str::plural('like', $count) }}
      </x-button>
   @endauth
</div>