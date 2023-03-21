@props([
   'active' => false,
   'user' => null,
])

@php
   $transition = 'transition-all duration-300 ease-in-out';
   $active = $active ?? false;
   $user = $user ?? null;
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

   <img 
      class="{{ $transition }} group-hover:contrast-125 mx-auto h-24 border-2 border-success dark:border-success-l1 group-hover:border-success-d1 dark:group-hover:border-success-l2 p-1 w-fit rounded-full" 
      src="{{ $user->avatar }}" 
      alt="Sunset in the mountains"
   >

   <div class="flex flex-col items-center gap-1">
      <h5 class="{{ $active ? 'font-black' : 'font-bold'}} text-xl mb-2 text-success dark:text-success-l1 group-hover:text-success-d1 dark:group-hover:text-success-l2 {{ $transition }}">
            {{ $user->username }} {{ $user->is_admin ? '👑' : '' }}  @if ($active) <span class="text-gray-500">(You)</span> @endif
      </h5>
      <p class="text-gray-700 dark:text-gray-400 group-hover:text-black dark:group-hover:text-white text-base {{ $transition }}">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis
         eaque, exercitationem praesentium nihil.
      </p>
   </div>
</a>
