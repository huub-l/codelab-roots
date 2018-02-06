<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{

   /**
    * App constructor.
    */
   public function __construct()
   {
   }


   public function siteName()
   {
      return get_bloginfo('name');
   }

   public static function title()
   {
      if (is_home()) {
         if ($home = get_option('page_for_posts', true)) {
            return get_the_title($home);
         }
         return __('Latest Posts', 'sage');
      }
      if (is_archive()) {
         return get_the_archive_title();
      }
      if (is_search()) {
         return sprintf(__('Search Results for %s', 'sage'), get_search_query());
      }
      if (is_404()) {
         return __('Not Found', 'sage');
      }
      return get_the_title();
   }

   public function primaryNavigation()
   {
      $menu = self::getMenuitemsFromLocation('primary_navigation');
      return $menu;
   }

   private function getMenuitemsFromLocation($menu_location)
   {
      $locations = get_nav_menu_locations();
      $menu_id = $locations[$menu_location];
//      $menu = wp_get_nav_menu_object($menu_id);
      return wp_get_nav_menu_items($menu_id);
   }

}
