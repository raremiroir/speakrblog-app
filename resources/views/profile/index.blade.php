<x-app-layout>
   <x-slot name="header">
       <x-header>
           {{ __('All Speakrs') }}
           <x-slot name="append">
               <x-button color="primary" href="{{ route('posts.add') }}">
                   <x-application-logo class="block h-6 w-auto dark:fill-white dark:group-hover:fill-black fill-gray-800 group-hover:fill-gray-200 transition-all duration-200 ease-out" />
                   Speak Something!
               </x-button>
           </x-slot>
       </x-header>
   </x-slot>

   <div class="w-4/5 mx-auto">
      <div class="mt-12 flex flex-row flex-wrap gap-4">
         @foreach($users as $currUser)
            @if ($currUser->id == Auth::user()->id) 
                <x-user-card :user="$currUser" active />
            @else
                <x-user-card :user="$currUser" />
            @endif
         @endforeach
      </div>
   </div>
</x-app-layout>
