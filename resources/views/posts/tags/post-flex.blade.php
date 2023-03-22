@if ($post->tags->count() > 0)
   <div class="flex flex-wrap gap-2">
      <span class="font-semibold text-gray-500">Tags:</span> 
      @foreach ($post->tags as $tag)
            <x-tag :tag="$tag" />
      @endforeach
   </div>
@endif