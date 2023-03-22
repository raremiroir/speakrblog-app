@props([
   'hasAside' => false,
   'asideTitle' => '',
])

{{-- Page wrapper --}}
<div class="
   w-4/5 xl:w-2/3 mx-auto 
   grid grid-cols-3 grid-rows-none
">

   {{-- Aside --}}
   @if ($hasAside)
      <aside class="col-span-1 p-8 bg-gray-100 dark:bg-gray-900 border-r-4 border-gray-200 dark:border-gray-800 h-screen">
         <h2 class="font-title text-2xl text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-700/60 dark:border-gray-300/60 w-fit">{{ $asideTitle }}</h2>
         {{ $aside }}
      </aside>
   @endif

   {{-- Main --}}
   <main class="
         {{ $hasAside ? 'col-span-2' : 'col-span-3' }} 
         w-full p-8
   ">
      {{ $slot }}
   </main>

</div>