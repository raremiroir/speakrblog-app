<x-button flat purple md title="{{ $user->followers->count() }} {{ Str::plural('follower', $user->followers->count()) }}">
   <div class="flex flex-row items-center gap-1 font-semibold">
      <i class="fas fa-people-carry"></i>
      {{ $user->followers->count() }} @if (isset($extend) && $extend){{ Str::plural('follower', $user->followers->count()) }}@endif
   </div>
</x-button>