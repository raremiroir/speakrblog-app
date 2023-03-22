<x-app-layout hasAside asideTitle="Add a Tag">

   <x-slot name="header">
      <x-header>
         All Tags
      </x-header>
   </x-slot>

   {{-- Aside - Add tag --}}
   <x-slot name="aside">
      @include('posts.tags.add')
      <x-section title="All Tags">
          <div class="flex flex-row flex-wrap gap-2">
              @foreach($tags as $tag)
               @include('posts.tags.tag', [
                  'tag' => $tag, 
                  'size' => 'md'
                  ])
              @endforeach
          </div>
          </x-section>
  </x-slot>

   <x-section>
      <div class="flex flex-row flex-wrap gap-2">
         @foreach($tags as $tag)
            @include('posts.tags.tag', [
               'tag' => $tag, 
               'size' => 'lg'
               ])
         @endforeach
      </div>
   </x-section>
   
</x-app-layout>