<x-app-layout>
   <x-slot name="header">
      <x-header>
         {{ $tag->name }}
      </x-header>
   </x-slot>

   <div class="flex flex-wrap gap-2 mx-auto w-4/5">
      @foreach($posts as $post)
         <x-post-card :post="$post" />
      @endforeach
   </div>
</x-app-layout>