<x-dropdown>
   <x-slot name="trigger">
       <x-btn color="primary" size="sm">
           <div class="flex items-center gap-2 sm:gap-0 md:gap-2">
               <x-profile-avatar :user="Auth::user()" size="22" />
               <div class="sm:hidden md:flex">{{ Auth::user()->username }}</div>

               <div class="ml-1">
                   <svg class="fill-current h-4 w-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                       <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                   </svg>
               </div>
           </div>
       </x-btn>
   </x-slot>

   <x-dropdown.header label="{{ Auth::user()->username }}'s Account">
       <div class="h-fit">
           <x-button flat sm full href="{{ route('users.show', Auth::user()->username) }}">
               <div class="w-full flex justify-start px-4 gap-2">
                   <i class="fas fa-user-circle"></i> My Profile
               </div>
           </x-button>
       </div>
       <div class="h-fit">
           <x-button info flat sm full href="{{ route('profile.edit') }}">
               <div class="w-full flex justify-start px-4 gap-2">
                   <i class="fas fa-user-cog"></i> Account Settings
               </div>
           </x-button>
       </div>
       <hr class="border-gray-400 dark:border-gray-600 my-1" />
       <!-- Authentication -->
       <div class="h-fit">
           <form method="POST" action="{{ route('logout') }}" class="w-full h-fit">
               @csrf

               <x-button type="submit" negative sm flat full onclick="event.preventDefault(); this.closest('form').submit();">
                   <div class="w-full flex justify-start px-4 gap-2 text-error dark:text-error-l1 font-regular opacity-80">
                       <i class="fas fa-sign-out-alt"></i> Log Out
                    </div>
               </x-button>
           </form>
       </div>
   </x-dropdown.header>
</x-dropdown>