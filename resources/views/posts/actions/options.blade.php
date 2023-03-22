@if ($post->author->is(auth()->user()) || (Auth::check() && auth()->user()->is_admin))
   <x-dropdown>
      <x-slot name="trigger">
         <x-button flat gray sm>
            <i class="fas fa-cog"></i> Options
         </x-button>
      </x-slot>
      <x-dropdown.header label="Post Options">
         <div class="h-fit">
            <x-button info flat sm full href="{{ route('posts.edit', $post) }}">
               <div class="w-full flex justify-start px-1 gap-2">
                   <i class="fas fa-edit"></i> Edit Post
               </div>
           </x-button>
         </div>
         <hr class="border-gray-400 dark:border-gray-600 my-1" />
         <div class="h-fit">
            <form method="POST" action="{{ route('posts.destroy', $post) }}" class="w-full h-fit">
               @csrf
               @method('DELETE')
               <x-button type="submit" negative flat sm full>
                  <div class="w-full flex justify-start px-1 gap-2">
                      <i class="fas fa-trash"></i> Remove Post
                  </div>
              </x-button>
            </form>
         </div>
      </x-dropdown.header>
   </x-dropdown>
@endif