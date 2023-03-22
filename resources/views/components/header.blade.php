<div class="w-full justify-between flex items-center">
    <h1 class="
        uppercase text-4xl font-title 
        text-gray-800 dark:text-gray-200 
        tracking-wider 
        border-b-gray-800 dark:border-b-gray-200 border-b-2 
        w-fit whitespace-nowrap
    ">
        {{ $slot }}
    </h1>
    {{ $append?? '' }}
</div>