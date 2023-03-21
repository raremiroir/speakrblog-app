<x-app-layout>
   <x-slot name="header">
      <x-header>
         All Tags
      </x-header>
   </x-slot>
   <div class="">
      @include('posts.tags.add')
   </div>

   <div class="flex flex-wrap gap-2 mx-auto w-4/5">
      @foreach($tags as $tag)
         <x-tag :tag="$tag" size="lg" />
      @endforeach
   </div>
</x-app-layout>