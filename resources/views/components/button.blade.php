@props([
   'type' => 'button',
   'size' => 'md',
   'color' => 'default',
   'outlined' => false,
   'block' => false,
   'square' => false,
   'circle' => false,
   'flat' => false,
   'uppercase' => false,
   'class' => '',
   'disabled' => false,
   'href' => null,
   'target' => null,
   'title' => '',
   'id' => null,
])

@php
   $colors = [
      'default'   => 'text-gray-800 dark:text-gray-200 border-gray-200 dark:border-gray-700 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 hover:border-gray-300 dark:hover:bg-gray-600 dark:hover:border-gray-600 focus:bg-gray-200 dark:focus:bg-gray-700 active:bg-gray-400 dark:active:bg-gray-500 focus:border-gray-400 dark:focus:border-gray-500',
      'primary'   => 'text-gray-800 dark:text-gray-200 border-gray-200 dark:border-gray-700 bg-gray-200 dark:bg-gray-700 hover:bg-success hover:border-success hover:text-gray-200 dark:hover:border-success-l1 dark:hover:bg-success-l1 dark:hover:text-gray-800 focus:bg-success/20 dark:focus:bg-success-l1/20 active:bg-success-d1 active:text-gray-100 dark:active:bg-success-l3 dark:active:text-gray-800 dark:active:border-success-l3 focus:text-gray-800 dark:focus:text-gray-200 focus:border-success dark:focus:border-success-l2',
      'transp'    => '!shadow-none bg-transparent text-success-d1 dark:text-success-l1 hover:bg-success/20 dark:hover:bg-success-l1/20 focus:bg-success/20 dark:focus:bg-success-l1/20 active:bg-success-d1/20 dark:active:bg-success/20 focus:border-success-d1/40 dark:focus:border-success/40',
      'success'   => 'border-success bg-success text-gray-200 hover:border-success-d1 hover:bg-success-d1 focus:bg-success-d1 focus:border-success-l1/60 active:border-success-d2 active:bg-success-d2',
      'error'     => 'border-error bg-error text-gray-200 hover:border-error-d1 hover:bg-error-d1 focus:bg-error-d1 focus:border-error-l1/60 active:border-error-d2 active:bg-error-d2',
      'warning'   => 'border-warning bg-warning text-gray-800 hover:border-warning-d1 hover:bg-warning-d1 focus:bg-warning-d1 focus:border-warning-l1/60 active:border-warning-d2 active:bg-warning-d2',
      'info'      => 'border-info bg-info text-gray-200 hover:border-info-d1 hover:bg-info-d1 focus:bg-info-d1 focus:border-info-l1/60 active:border-info-d2 active:bg-info-d2',
   ];
   $sizes = [
      'xs'  => 'px-2 py-1 text-xs   leading-none tracking-wide',
      'sm'  => 'px-3 py-2 text-sm   leading-4 tracking-wide',
      'md'  => 'px-4 py-2 text-sm   leading-5 tracking-wide',
      'lg'  => 'px-4 py-2 text-base leading-6 tracking-wider',
      'xl'  => 'px-6 py-3 text-base leading-6 tracking-wider',
      'xxl' => 'px-8 py-4 text-lg   leading-6 tracking-wider'
   ];

   $colorClass = $colors[$color];
   $sizeClass = $sizes[$size];
   $outlinedClass = $outlined ? '!bg-transparent !shadow-none !text-gray-800 dark:!text-gray-200' : 'border-transparent';
   $blockClass = $block ? 'w-full' : '';
   $squareClass = $square ? 'aspect-square' : '';
   $circleClass = $circle ? 'aspect-square rounded-full' : 'rounded-md';
   $flatClass = $flat ? 'shadow-none' : 'shadow-md';
   $uppercaseClass = $uppercase ? 'uppercase' : '';

   $active = 'active:translate-y-0.5';
   $transition = 'transition-all duration-300 ease-in-out';
   $flex = 'flex gap-2 items-center justify-center';

   $default = 'group cursor-pointer font-semibold border-2';

   $classes = "$transition $flex $default $active $outlinedClass $colorClass $sizeClass $blockClass $squareClass $circleClass $flatClass $uppercaseClass";
   $type = $type ?? 'button';
   $classes .= ' ' . $class;

@endphp

@if ($href)
   <a href="{{$href}}" class="{{$classes}}" type="{{$type}}" disabled="{{$disabled}}" id={{ $id?? '' }} target={{ $target?? '_blank' }} title={{ $title }} aria-label={{ $title }} >
      {{ $slot }}
   </a>
@else 
   <button class="{{$classes}}" type="{{$type}}" id={{ $id?? '' }} target={{ $target?? '_blank' }} title={{ $title }} aria-label={{ $title }}>
         {{ $slot }}
   </button>
@endif