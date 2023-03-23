{{-- Like / Unlike --}}
<div class="col-md-6">
   @auth
      @if (! ($user == auth()->user()))
         @if ($user->isFollowedBy(auth()->user()))
            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <x-button type="submit" positive md title="Unfollow {{ $user->username }}">
                     <div class="flex flex-row items-center gap-1 font-semibold py-2">
                        <i class="fas fa-user-check group-hover:fa-user-minus"></i>
                     </div>
                  </x-button>
            </form>
         @else
            <form action="{{ route('users.follow', $user) }}" method="POST">
                  @csrf
                  <x-button type="submit" positive outline orange md title="Follow {{ $user->username }}">
                     <div class="flex flex-row items-center gap-1 font-semibold py-2">
                        <i class="fas fa-user-plus"></i>
                     </div>
                  </x-button>
            </form>
         @endif
      @endif
   @else
      <x-button href="{{ route('login') }}" secondary sm title="You must be logged in to follow another user.">
         <i class="fas fa-user-lock"></i>
         Log-in to Follow
      </x-button>
   @endauth
</div>