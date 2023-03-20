@props([
   'posts' => null,
])

@php 
   $posts = $posts ?? $slot;
@endphp

<x-main-grid>
   @foreach ($posts as $post)
      <x-post-card :post="$post" />
   @endforeach
   {{ $slot }}
</x-main-grid>