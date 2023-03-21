@props(['disabled' => false])

<input 
   {{ $disabled ? 'disabled' : '' }} 
   {{ $attributes }}
   class="
      transition-all duration-200 ease-in-out
      w-full h-full
      border-transparent 
      bg-gray-300/40
      px-2 py-1
      tracking-wider 
      font-semibold dark:font-medium
      dark:bg-gray-800
      placeholder:italic
      focus:text-black dark:focus:text-white
      text-success-d3 dark:text-success-l3 
      focus:border-success dark:focus:border-success-l1 focus:ring-success dark:focus:ring-success-l1 
      rounded-md shadow-sm"
/>
