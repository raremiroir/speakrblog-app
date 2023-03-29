@props(['post', 'size' =>  'sm'])

@php
   $textSize = 'text-xs';
   if ($size == 'sm') {
      $textSize = 'text-xs';
   } elseif ($size == 'lg') {
      $textSize = 'text-base';
   }
@endphp

<div class="order-first md:order-last {{ $textSize }} text-gray-400 dark:text-gray-500 whitespace-nowrap flex flex-row items-center {{ $size == 'lg' ? 'gap-2' : 'gap-1' }}">
   <div class="{{ $size == 'sm' ? 'hidden' : '' }}">
      <x-profile-avatar :user="$post->user" size="40"/>
   </div>
   <div class="{{ $size == 'sm' ? 'flex-row items-center' : 'flex-col items-start justify-center' }}">
      <a 
         href="{{ route('users.show', $post->user->username) }}" 
         class="text-success-d2/50 dark:text-success-l2/50 hover:text-success-d2 dark:hover:text-success-l2 font-bold hover:underline transition-all duration-200 ease-in-out flex gap-2 items-center"
         >
         <div class="{{ $size == 'lg' ? 'hidden' : '' }}">
            <x-profile-avatar :user="$post->user" />
         </div>
         Spoken by {{ $post->user->username }}
         @if ($post->user->is_admin)
            <span class="text-success-d1 dark:text-success-l1 font-light"> 👑 (Admin) </span>
         @endif
      </a>
      <div class="flex flex-row">
         <span>on&nbsp;</span>
         <span class="font-semibold">{{ $post->created_at->format('d/m/Y') }}</span>
      </div>
   </div>
</div>