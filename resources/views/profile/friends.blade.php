<x-app-layout>
   <x-slot name="header">
      <x-header>
         {{ $user->username }}
      </x-header>
   </x-slot>

   <div class="grid grid-cols-2 gap-8">
      {{-- Followers --}}
      <x-section title="Users following {{ $user->username }}">
         <div class="flex min-h-screen items-center flex-col gap-4 border-r-2 border-success/60 dark:border-success-l1/60 p-4">
            @if ($followers->count() == 0)
               <div class="text-center text-gray-500 dark:text-gray-400">
                  <i class="fas fa-ghost fa-2x"></i>
                  <p class="text-lg">{{ $user->username }} hasn't got any followers yet.</p>
               </div>
            @else
               @foreach ($followers as $follower)
                  @include('profile.card', ['user' => $follower])
               @endforeach
            @endif
         </div>
      </x-section>

      {{-- Following --}}
      <x-section title="Users followed by {{ $user->username }}">
         <div class="flex min-h-screen items-center flex-col gap-4 p-4">
            @if ($following->count() == 0)
               <div class="text-center text-gray-500 dark:text-gray-400">
                  <i class="fas fa-ghost fa-2x"></i>
                  <p class="text-lg">{{ $user->username }} isn't following anyone yet.</p>
               </div>
            @else
               @foreach ($following as $follower)
                  @include('profile.card', ['user' => $follower])
               @endforeach
            @endif
         </div>
      </x-section>
   </div>
</x-app-layout>