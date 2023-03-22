@props([
   'tag' => null,
   'size' => 'sm',
   'class' => null,
])

@php
   $tag = $tag ?? null;

   $sizes = [
      'sm' => 'text-xs px-1 py-0.5',
      'md' => 'text-sm px-2 py-1',
      'lg' => 'text-md px-3 py-[6px]',
   ];

   $size = $size ?? 'sm';
   $size = $sizes[$size];
   $class = $class ?? '';
   $class = $size . ' ' . $class;
@endphp

<a href="{{ route('posts.tags.show', $tag) }}" 
   class="
      tag transition-all duration-200 ease-in-out
      text-gray-100 dark:text-gray-900 
      font-semibold dark:font-bold 
      tracking-wide rounded-lg {{ $class }}"
   style="background: {{ $tag->color }} !important;"
   title="View posts related to '{{ $tag->name }}'"
   >
   {{ $tag->name }}
</a>