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
   class="tag text-clip font-semibold tracking-wide rounded-lg {{ $class }}"
   style="background: #{{ $tag->color }} !important;"
   >
   {{ $tag->name }}
</a>