<?php

namespace App;

use Sober\Controller\Controller;

class Services extends Controller
{
   public function services()
   {
      //
      // Attach meta data
      //
      $services = get_post_meta(get_the_ID(), '_codelab_items', true);

//      $services = array_map(function ($service) {
//         $service->_codelab_card_title = get_post_meta($service->ID, '_codelab_description', true);
//         $service->_codelab_card_title = get_post_meta($service->ID, '_codelab_card_title', true);
//         $pageId = get_post_meta($service->ID, '_codelab_card_url', true);
//         $cardUrl = get_page_link($pageId);
//         $service->_codelab_card_url = $cardUrl;
//         return $service;
//      }, $services);

      return $services;
   }

}
