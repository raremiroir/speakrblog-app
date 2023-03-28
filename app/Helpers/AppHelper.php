<?php

namespace App\Helpers;

class AppHelper
{
      public function bladeHelper($someValue)
      {
             return "increment $someValue";
      }

      public function str_to_slug($str, $prepend) {
         
        // Remove emoji characters
        $str = preg_replace('/[\x{1F300}-\x{1F64F}]/u', '', $str);
        
        // Replace whitespace with -
        $str = preg_replace('/\s+/', "-", $str);
        
        // Remove special charactes, replaces spaces and underscores with -
        $str = preg_replace('/[\p{P}\p{Z}_]+/u', '-', $str);

        // To lowercase
        $str = strtolower(trim($str));
        // Remove duplicate -
        $str = preg_replace('/-+/', "-", $str);
        // Prepend something to slug
        $str = $prepend . '_' . $str;
        // Remove trailing -
        $str = rtrim($str, "-");
         
         return $str;
      }

     public static function instance()
     {
         return new AppHelper();
     }
}