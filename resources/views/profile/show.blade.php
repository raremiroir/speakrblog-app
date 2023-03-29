@php
   use Carbon\Carbon;
   $joined_on = Carbon::parse($user->created_at)->format('d/m/Y');
@endphp

{{-- Page --}}
<x-app-layout>
   {{-- Header --}}
   <x-slot name="header">
      <div class="flex items-center justify-between w-full mx-auto">

         {{-- Member info --}}
         <div class="flex flex-row gap-4 items-center">
            {{-- Avatar --}}
            <x-profile-avatar :user="$user" size="64" />
            <div class="flex flex-col gap-2">
               {{-- Title - username --}}
               <x-header>
                  <span class="whitespace-nowrap">{{ $user->username }}'s Profile</span>
               </x-header>
               {{-- Info --}}
               <div class="flex flex-col gap-1 items-start justify-between">
                  <div class="flex flex-row gap-2 items-center justify-start">
                     @if (Auth::check() && Auth::user()->id === $user->id)
                        <a href="{{ route('profile.edit', $user->username) }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Edit profile</a>
                     @else
                        @include('profile.actions.btn-follow', ['user' => $user, 'extend' => true])
                     @endif
                     @include('profile.info.amt-followers', ['user' => $user, 'extend' => true])
                     @include('profile.info.amt-following', ['user' => $user, 'extend' => true])
                  </div>
                  <div class="flex flex-row gap-2 items-center justify-start">
                     @include('profile.info.amt-posts', ['user' => $user, 'extend' => true])
                     @include('profile.info.amt-comments', ['user' => $user, 'extend' => true])
                  </div>
               </div>
            </div>
         </div>

         {{-- Member since --}}
         <div class="flex w-fit whitespace-nowrap">
            <small class="font-medium text-gray-600 dark:text-gray-400">Member since {{ $joined_on }}</small>
         </div>

      </div>
   </x-slot>

   {{-- Show posts --}}
   <x-section>
      @include('posts.grid', ['posts' => $posts])
   </x-section>

</x-app-layout>