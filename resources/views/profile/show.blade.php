@php
   use Carbon\Carbon;
   $joined_on = Carbon::parse($user->created_at)->format('d/m/Y');
@endphp

<x-app-layout>
   <x-slot name="header">
      <div class="flex items-center justify-between w-4/5 mx-auto">
         <div class="flex flex-row gap-4 items-center">
            <x-profile-avatar :user="$user" size="64" />
            <x-header>
               <span class="whitespace-nowrap">{{ $user->username }}'s Profile</span>
            </x-header>
         </div>
         <div class="flex w-fit whitespace-nowrap">
            <small class="font-medium text-gray-600 dark:text-gray-400">Member since {{ $joined_on }}</small>
         </div>
      </div>
   </x-slot>

   @include('posts.grid', ['posts' => $posts])
</x-app-layout>