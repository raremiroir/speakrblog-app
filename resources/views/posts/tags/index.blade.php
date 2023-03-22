<x-app-layout>
   <x-slot name="header">
      <x-header>
         All Tags
      </x-header>
   </x-slot>
   <x-section>
      @include('posts.tags.add')
   </x-section>

   <x-section>
      <div class="flex flex-row flex-wrap gap-2">
         @foreach($tags as $tag)
            <x-tag :tag="$tag" size="lg" />
         @endforeach
      </div>
   </x-section>
</x-app-layout>