@props([
   'user' => null,
])
@php
   $user = $user ?? auth()->user();
@endphp
<img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="m-0 rounded-full border-2 border-success dark:border-success-l1 p-[1px]" width="24" height="24">