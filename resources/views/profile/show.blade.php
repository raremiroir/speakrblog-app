@php
   use Carbon\Carbon;
   $joined_on = Carbon::parse($user->created_at)->format('d/m/Y');
@endphp

<x-app-layout>
   <x-slot name="header">
      <div class="flex items-center justify-between w-4/5 mx-auto">
         <x-header>
            {{ $user->username }}
         </x-header>
         <div class="flex w-fit whitespace-nowrap">
            <small>Member since {{ $joined_on }}</small>
         </div>
      </div>
   </x-slot>

   <x-posts-grid :posts="$posts"/>

</x-app-layout>