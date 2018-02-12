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
    * Service meta
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

   // Add to Services page

   $cmb = new_cmb2_box(array(
      'id'           => $prefix . 'services',
      'title'        => 'Services',
      'object_types' => array('page'), // post type
      'context'      => 'normal', //  'normal', 'advanced', or 'side'
      'show_on'      => ['key' => 'page-template', 'value' => 'views/services.blade.php'],
      'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
      'show_names'   => true, // Show field names on the left
   ));

   $group_field_id = $cmb->add_field(array(
      'id'   => $prefix . 'items',
      'type' => 'group',
//      'description' => __('Generates reusable form entries', 'cmb2'),
      // 'repeatable'  => false, // use false if you want non-repeatable group
//      'options' => array(
//         'group_title'   => __('Entry {#}', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
//         'add_button'    => __('Add Another Entry', 'cmb2'),
//         'remove_button' => __('Remove Entry', 'cmb2'),
//         'sortable'      => true, // beta
//         // 'closed'     => true, // true to have the groups closed by default
//      ),
   ));

// Id's for group's fields only need to be unique for the group. Prefix is not needed.
   $cmb->add_group_field($group_field_id, array(
      'name' => 'Title',
      'id'   => 'title',
      'type' => 'text',
      // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
   ));

   $cmb->add_group_field($group_field_id, array(
      'name' => 'Description',
//      'description' => 'Write a short description for this entry',
      'id'   => 'description',
      'type' => 'textarea',
   ));

//   $cmb->add_group_field($group_field_id, array(
//      'name' => 'Entry Image',
//      'id'   => 'image',
//      'type' => 'file',
//   ));
//
//   $cmb->add_group_field($group_field_id, array(
//      'name' => 'Image Caption',
//      'id'   => 'image_caption',
//      'type' => 'text',
//   ));

}

