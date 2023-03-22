<div class="flex flex-wrap gap-2">
   @foreach ($post->tags as $tag)
      <div class="opacity-60 hover:opacity-100 transition-all duration-200 ease-in-out">
         <x-tag :tag="$tag" size="md" />
      </div>
   @endforeach
</div>