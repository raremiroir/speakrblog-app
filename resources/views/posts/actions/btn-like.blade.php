{{-- Like / Unlike --}}
<div class="col-md-6">
   @auth
      @if ($post->isLikedByUser(auth()->user()))
         <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <x-button type="submit" primary sm>
                  <i class="fas fa-heart"></i>
                  {{ $post->likes->count() }}
                  {{ Str::plural('like', $post->likes->count()) }}
               </x-button>
         </form>
      @else
         <form action="{{ route('posts.like', $post->id) }}" method="POST" class="opacity-80 hover:opacity-100 {{ $transition }}">
               @csrf
               <x-button type="submit" primary sm>
                  <i class="far fa-heart"></i>
                  {{ $post->likes->count() }}
                  {{ Str::plural('like', $post->likes->count()) }}
               </x-button>
         </form>
      @endif
   @else
      <x-button href="{{ route('login') }}" secondary sm>
         <i class="far fa-heart"></i>
         {{ $post->likes->count() }}
         {{ Str::plural('like', $post->likes->count()) }}
      </x-button>
   @endauth
</div>