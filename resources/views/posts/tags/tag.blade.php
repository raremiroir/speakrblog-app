@props([
   'tag' => null,
   'size' => 'sm',
   'class' => null,
   'hslColor' => null,
])

@php
   if (! function_exists('hex2hsl')) {
      function hex2hsl($hex) {
         $hex = str_replace('#', '', $hex);
         $hex_val = array($hex[0] . $hex[1], $hex[2] . $hex[3], $hex[4] . $hex[5]);
         $rgb_val = array_map(function ($part) {
            return hexdec($part) / 255;
         }, $hex_val);
         $max_val = max($rgb_val);
         $min_val = min($rgb_val);
         $l = ($max_val + $min_val) / 2;
         if ($max_val == $min_val) {
            $h = $s = 0;
         } else {
            $diff = $max_val - $min_val;
            $s = $l > 0.5 ? $diff / (2 - $max_val - $min_val) : $diff / ($max_val + $min_val);
            switch ($max_val) {
               case $rgb_val[0]:
                  $h = ($rgb_val[1] - $rgb_val[2]) / $diff + ($rgb_val[1] < $rgb_val[2] ? 6 : 0);
                  break;
               case $rgb_val[1]:
                  $h = ($rgb_val[2] - $rgb_val[0]) / $diff + 2;
                  break;
               case $rgb_val[2]:
                  $h = ($rgb_val[0] - $rgb_val[1]) / $diff + 4;
                  break;
            }
            $h /= 6;
         }
         return array($h, $s, $l);
      }
   }

   $sizes = [
      'sm' => 'text-xs px-1 py-0.5',
      'md' => 'text-sm px-2 py-1',
      'lg' => 'text-md px-3 py-[6px]',
   ];
   $size = $sizes[$size];
   $class = $class ?? '';
   $class = $size . ' ' . $class;

   $color = $tag->color ?? 'Gray';
   $hsl = hex2hsl($color);
   $textColor = 'text-black';
   
   /* Convert hex color to hsl */
   // Get lightness value from hsl
   $lightness = $hsl[2];
   // Set text color based on lightness value
   if ($lightness > 0.4) {
      $textColor = 'text-gray-900 font-bold';
   } else {
      $textColor = 'text-gray-50 font-semibold';
   }
@endphp

<a href="{{ route('posts.tags.show', $tag) }}" 
   class="
      tag transition-all duration-200 ease-in-out
      {{ $textColor }}
      tracking-wide rounded-lg {{ $class }}"
   style="background: {{ $tag->color }} !important;"
   title="View posts related to '{{ $tag->name }}'"
   >
   {{ $tag->name }}
</a>