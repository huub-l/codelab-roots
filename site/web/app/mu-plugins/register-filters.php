<?php

// Move Yoast SEO meta box to the bottom
add_filter('wpseo_metabox_prio', function () {
   return 'low';
});


// Replace CSS class for custom logo
add_filter('get_custom_logo', 'change_logo_class');
function change_logo_class($html)
{
   return str_replace('custom-logo-link', 'navbar-brand', $html);
}