<a 
   {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:text-gray-200 dark:text-gray-300 hover:bg-success dark:hover:bg-success-d2 focus:outline-none focus:bg-gray-100 dark:focus:bg-success-d3 transition duration-150 ease-in-out']) }}
   >
   {{ $slot }}
</a>
