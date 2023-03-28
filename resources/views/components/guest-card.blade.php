
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="flex items-center gap-4">
        <x-application-logo class="block h-20 w-auto fill-current" />
        <div class="flex flex-col gap-0 items-start justify-center">
            <span class="text-success dark:text-success-l2 font-title text-3xl">SPEAKR</span>
            <span class="text-gray-600 dark:text-success-l2/80 text-md">Speak your Mind</span>
        </div>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>