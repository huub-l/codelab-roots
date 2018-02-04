<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
   public function services()
   {
      $services = get_posts([
         'post_type' => 'service',
      ]);

      //
      // Attach meta data
      //
      $services = array_map(function ($service) {
         $service->_codelab_card_title = get_post_meta($service->ID, '_codelab_description', true);
         $service->_codelab_card_title = get_post_meta($service->ID, '_codelab_card_title', true);
         $pageId = get_post_meta($service->ID, '_codelab_card_url', true);
         $cardUrl = get_page_link($pageId);
         $service->_codelab_card_url = $cardUrl;
         return $service;
      }, $services);

      return $services;
   }

   public function portfolios()
   {
      $portfolios = get_posts([
         'post_type' => 'portfolio',
      ]);

      //
      // Attach meta data
      //
      $portfolios = array_map(function ($portfolio) {
         $portfolio->_codelab_card_title = get_post_meta($portfolio->ID, '_codelab_description', true);
         return $portfolio;
      }, $portfolios);

      return $portfolios;
   }

   public function blogs()
   {
      $blogs = get_posts([
         'post_type' => 'post',
      ]);

      //
      // Attach meta data
      //
      $blogs = array_map(function ($blog) {
         $category = get_the_category($blog->ID)[0];
         $blog->categoryName = $category->name;
         $blog->categoryUrl = get_term_link($category->term_id);
         $blog->publishedDate = date('F j, Y', strtotime($blog->post_date));
         return $blog;
      }, $blogs);

      return $blogs;
   }

}
