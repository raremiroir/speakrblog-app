<x-app-layout>
   <x-slot name="header">
      <x-header>
         {{ $tag->name }}
      </x-header>
   </x-slot>


   @include('posts.grid', ['posts' => $posts])
</x-app-layout>