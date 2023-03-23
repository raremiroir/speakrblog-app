<x-button flat info md title="{{ $user->posts->count() }} {{ Str::plural('speak', $user->posts->count()) }}">
   <div class="flex flex-row items-center gap-2 font-semibold">
      <i class="fas fa-mail-bulk"></i>
      {{ $user->posts->count() }} @if (isset($extend) && $extend){{ Str::plural('speak', $user->posts->count()) }}@endif
   </div>
</x-button>