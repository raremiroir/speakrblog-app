@php
   $transition = 'transition-all duration-300 ease-in-out';

   $active = Auth::check() && Auth::user()->id === $user->id ? true : false;
@endphp

<a class="
      {{ $transition }}
      rounded shadow-lg
      flex flex-col gap-2
      border-2
      {{ $active ? 'order-first border-success/40 dark:border-success-l1/40 bg-gray-200 dark:bg-gray-700' : 'border-transparent bg-gray-300 dark:bg-gray-800'}}
      hover:bg-gray-300/40 dark:hover:bg-gray-800/40
      max-w-sm
      hover:shadow-xl hover:shadow-black/20 dark:hover:shadow-black/30
      group p-4
      "
   href="{{ route('users.show', $user->username) }}">

   <div class="w-fit mx-auto">
      @include('profile.avatar', ['user' => $user, 'size' => 96 ])
   </div>

   <div class="flex flex-col items-center gap-1">
      <h5 class="{{ $active ? 'font-black' : 'font-bold'}} text-xl mb-2 text-success dark:text-success-l1 group-hover:text-success-d1 dark:group-hover:text-success-l2 {{ $transition }}">
            {{ $user->username }} {{ $user->is_admin ? '👑' : '' }}  @if ($active) <span class="text-gray-500">(You)</span> @endif
      </h5>
      {{-- Info --}}
      <div class="">
         <div class="flex flex-row gap-1">
            {{-- Posts amount --}}
            @include('profile.info.amt-posts', ['user' => $user])
            {{-- Comments amount --}}
            @include('profile.info.amt-comments', ['user' => $user])
            {{-- Followers count --}}
            {{-- Following count --}}
            
            {{-- Likes received count --}}
            {{-- Likes given count --}}
         </div>
      </div>
   </div>
</a>
