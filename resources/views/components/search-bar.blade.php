<x-button id="search-toggle" square size="sm" title="Press CTRL+K to Search">
   <i class="fas fa-search"></i>
</x-button>

<div 
   id="search-container"
   class="
      hidden
      absolute top-full right-0 z-[100]
      bg-white dark:bg-gray-700 border-none
      w-full sm:w-[98%] md:w-4/5 lg:w-3/4 xl:w-1/2 py-4 px-8 rounded-2xl
      left-1/2 -translate-x-1/2
      shadow-xl shadow-black/40 backdrop-brightness-50
      ">

   <form class="flex flex-col gap-2">
      <div class="flex flex-row justify-between items-center">
         <span class="text-xl font-title text-gray-700 dark:text-gray-300">Search</span>
         <x-button size="xs" color="error" square id="close-search-btn" class="opacity-60 hover:opacity-100">
            <i class="fas fa-times"></i>
         </x-button>
      </div>
      <x-text-input 
         id="search-input"
         name="search"
         placeholder="Search..."
         class="w-full h-12 px-4 py-2 rounded-xl"
      />
   </form>

   <div id="search-results" class="mt-2"></div>

</div>