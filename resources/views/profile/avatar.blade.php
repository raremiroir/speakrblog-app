@php
   // Check if image path starts with 'images/users/' and if not, it's a URL
   $user->avatar = Str::startsWith($user->avatar, 'images/users/')
      ? asset($user->avatar)
      : $user->avatar;
@endphp

<img 
   src="{{ $user->avatar }}" alt="{{ $user->name }}" 
   width="{{ $size }}" height="{{ $size }}"
   style="border-width: {{ $size / 12 }}px; padding: {{ $size / 24 }}px;"
   class="
      transition-all duration-200 ease-in-out
      m-0 rounded-full
      border-success dark:border-success-l1 
      group-hover:border-success-l1 dark:group-hover:border-success-l2
   ">