<?php

namespace App;

trait Posts
{
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
         $excerpt = wp_kses_post(wp_trim_words($blog->post_content, 20));
         $blog->excerpt = substr_replace($excerpt, ' ', 0, 1);
         $blog->url = get_permalink($blog->ID);
//         dd(get_permalink($blog->ID));
//         dd($blog);
//         setup_postdata($blog);
//         $blog->excerpt = get_the_excerpt($blog->ID);
         return $blog;
      }, $blogs);

      return $blogs;
   }

   public function categories()
   {
      $categories = get_categories();
//      dd($categories);
//      dd(get_terms('category'));
      return $categories;
   }
}