<?php

/**
 * Disable network activated functions
 */
function deactivate_network_plugins() {

  // Network plugins we want to keep, just the folder name
  $ignored_plugins = array();

  // Get all network activated plugins and deactivate
  $sitewide_plugins = get_site_option('active_sitewide_plugins');
  foreach($sitewide_plugins as $key => $value) {

    // Get folder(0) and file(1)
    $plugin_pieces = explode('/', $key);

    // Check if we are ignoring or deactivate
    if(!in_array($plugin_pieces[0], $ignored_plugins)){
      if(is_plugin_active($key))
        deactivate_plugins($key);
    }
  }

}
add_action( 'muplugins_loaded', 'deactivate_network_plugins' );
