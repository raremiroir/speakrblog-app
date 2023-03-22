{{-- Like / Unlike --}}
<div class="col-md-6">
   @auth
      @if ($post->isLikedByUser(auth()->user()))
         <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <x-button type="submit" primary sm title="Unlike speak">
                  <i class="fas fa-heart"></i>
                  {{ $post->likes->count() }}
                  {{ Str::plural('like', $post->likes->count()) }}
               </x-button>
         </form>
      @else
         <form action="{{ route('posts.like', $post->id) }}" method="POST" class="opacity-80 hover:opacity-100 transition-all duration-200 ease-in-out">
               @csrf
               <x-button type="submit" primary sm title="Like speak">
                  <i class="far fa-heart"></i>
                  {{ $post->likes->count() }}
                  {{ Str::plural('like', $post->likes->count()) }}
               </x-button>
         </form>
      @endif
   @else
      <x-button href="{{ route('login') }}" secondary sm title="You must be logged in to like a speak">
         <i class="far fa-heart"></i>
         {{ $post->likes->count() }}
         {{ Str::plural('like', $post->likes->count()) }}
      </x-button>
   @endauth
</div>