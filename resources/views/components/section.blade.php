@props([
   'title' => '',
])

<section class="w-full">
   <h2 class="font-title text-2xl text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-700/60 dark:border-gray-300/60 w-fit">{{ $title }}</h2>

   {{ $slot }}
   
</section>