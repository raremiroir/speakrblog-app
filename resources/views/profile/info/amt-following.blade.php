<form method="GET" action="{{ route('users.friends', ['user' => $user])}}">
   <x-button 
      flat indigo md 
      title="Following {{ $user->following->count() }} {{ Str::plural('user', $user->following->count()) }}"
   >
      <div class="flex flex-row items-center gap-2 font-semibold">
         <i class="fas fa-users"></i>
         @if(isset($extend) && $extend) Following @endif
         {{ $user->following->count() }} 
         @if(isset($extend) && $extend) {{ Str::plural('user', $user->following->count()) }}@endif
      </div>
   </x-button>
</form>