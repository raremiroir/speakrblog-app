<form method="GET" action="{{ route('users.friends', ['user' => $user])}}">
   <x-button 
      type="submit"
      flat purple md 
      title="{{ $user->followers->count() }} {{ Str::plural('follower', $user->followers->count()) }}"
   >
      <div class="flex flex-row items-center gap-2 font-semibold">
         <i class="fas fa-people-carry"></i>
         {{ $user->followers->count() }} 
         @if(isset($extend) && $extend) {{ Str::plural('follower', $user->followers->count()) }} @endif
      </div>
   </x-button>
</form>