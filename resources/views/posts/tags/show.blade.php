<x-app-layout>
   <x-slot name="header">
      <x-header>
         {{ $tag->name }}
      </x-header>
   </x-slot>


   <x-posts-grid :posts="$posts"/>
</x-app-layout>