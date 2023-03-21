@props([
   'user' => null,
   'size' => 24,
])
@php
   $user = $user ?? auth()->user();
   $size = $size ?? 24;
@endphp
<img 
   src="{{ $user->avatar }}" alt="{{ $user->name }}" 
   class="m-0 rounded-full border-2 border-success dark:border-success-l1 p-[1px]" 
   width="{{ $size }}" height="{{ $size }}"
   >