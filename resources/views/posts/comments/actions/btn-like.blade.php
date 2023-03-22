{{-- Like / Unlike --}}
<div class="col-md-6">
   @auth
      @if ($comment->isLikedByUser(auth()->user()))
         <form action="{{ route('posts.comments.unlike', [$post, $comment]) }}" method="POST">
               @csrf
               @method('DELETE')
               <x-button type="submit" primary sm title="Unlike comment">
                  <i class="fas fa-heart"></i>
                  {{ $comment->likes->count() }}
                  {{ Str::plural('like', $comment->likes->count()) }}
               </x-button>
         </form>
      @else
         <form 
            action="{{ route('posts.comments.like', [$post, $comment]) }}" method="POST" 
            class="opacity-80 hover:opacity-100 transition-all duration-200 ease-in-out">
               @csrf
               <x-button type="submit" primary sm title="Like comment">
                  <i class="far fa-heart"></i>
                  {{ $comment->likes->count() }}
                  {{ Str::plural('like', $comment->likes->count()) }}
               </x-button>
         </form>
      @endif
   @else
      <x-button href="{{ route('login') }}" secondary sm title="You must be logged in to like a comment.">
         <i class="far fa-heart"></i>
         {{ $comment->likes->count() }}
         {{ Str::plural('like', $comment->likes->count()) }}
      </x-button>
   @endauth
</div>