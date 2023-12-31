<?php
/**
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Ht Theme
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/framework/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'knowhow_register_required_plugins' );

/**
* Register the required plugins for this theme.
*
*
* This function is hooked into tgmpa_init, which is fired within the
* TGM_Plugin_Activation class constructor.
*/
function knowhow_register_required_plugins() {

    /**
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    array(
            'name' => 'KnowHow Tools', // The plugin name.
            'slug' => 'knowhow-tools', // The plugin slug (typically the folder name).
            'source' => get_template_directory() . '/framework/tgm/plugins/knowhow-tools-v1.0.1.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
        ),
    array(
      'name'      => 'Heroic Table of Contents',
      'slug'      => 'heroic-table-of-contents',
      'required'  => false,
    ),
    array(
      'name'      => 'Heroic Glossary',
      'slug'      => 'heroic-glossary',
      'required'  => false,
    ),
    
  );
    

    /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'knowhow',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

  
  );

    tgmpa( $plugins, $config );

}