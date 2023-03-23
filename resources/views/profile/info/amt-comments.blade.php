<x-button flat orange md title="{{ $user->comments->count() }} {{ Str::plural('comment', $user->comments->count()) }}">
   <div class="flex flex-row items-center gap-1 font-semibold">
      <i class="fas fa-comment-alt"></i>
      {{ $user->comments->count() }} @if (isset($extend) && $extend){{ Str::plural('comment', $user->comments->count()) }}@endif
   </div>
</x-button>