<?php

add_action('cmb2_init', 'cmb2_sample_metaboxes');
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes()
{

// Start with an underscore to hide fields from custom fields list
   $prefix = '_codelab_';

   // Generate options key/value pair
   $options = array_map(function ($page) {
      return [
         'id'    => $page->ID,
         'title' => $page->post_title
      ];
   }, get_pages());
   $pageOptions = array_column($options, 'title', 'id');

   /**
    * Initiate the metabox
    */
   $cmb = new_cmb2_box([
      'id'           => 'service_metabox',
      'title'        => __('Service Info', 'cmb2'),
      'object_types' => ['service'],
      'context'      => 'normal',
      'priority'     => 'high',
      'show_names'   => true,
   ]);

   $cmb->add_field([
      'name' => __('Service Description', 'cmb2'),
      'id'   => $prefix . 'description',
      'type' => 'textarea',
   ]);

   $cmb->add_field([
      'name' => __('Card Title', 'cmb2'),
      'id'   => $prefix . 'card_title',
      'type' => 'text',
   ]);

   $cmb->add_field([
      'name'    => __('Card URL', 'cmb2'),
      'id'      => $prefix . 'card_url',
      'type'    => 'select',
      'options' => $pageOptions,
   ]);


}