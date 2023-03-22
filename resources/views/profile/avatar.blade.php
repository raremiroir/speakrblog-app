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