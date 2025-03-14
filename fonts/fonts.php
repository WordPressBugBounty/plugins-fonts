<?php 
/*
Plugin Name: Fonts
Plugin URI: https://wpsites.net/best-plugins/plugin-fonts-styles-sizes-wordpress/
Description: Premium Upgrades: <a href="http://wpsites.net/wordpress-themes/add-custom-fonts-to-the-wordpress-editor/">Add Google & Custom Fonts</a> | <a href="https://wordpress.org/support/plugin/fonts/reviews/?filter=5">Click here to leave a review</a>
Version: 2.6
Author: Brad Dalton - WP Sites
Author URI: https://wpsites.net/bradley-james-dalton-wordpress-developer/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Sorry, you are not allowed to access this page directly.' );
}

// Hook to add the admin menu
add_action('admin_menu', 'premium_custom_fonts_menu');
function premium_custom_fonts_menu() {
    add_menu_page(
        'Fonts', // Page title
        'Fonts', // Menu title
        'manage_options', // Capability
        'custom-fonts', // Menu slug
        'custom_fonts_page_content', // Callback function
        'dashicons-editor-textcolor', // Icon
        25 // Position
    );
}

function custom_fonts_page_content() {
    ?>
    <div class="wrap">
        <h1>How To Install Custom & Google Fonts</h1>
        
        <!-- Button -->

		<p><a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/">
		Add Custom & Google Fonts
		</a></p>
		
		 <!-- Paragraph -->
        <p style="margin-top: 15px; font-size: 16px;">Works the same way for uploading Custom Font files or Google Font files.</p>
          

        <!-- Video -->
        <video width="100%" height="auto" controls>
            <source src="https://videos.files.wordpress.com/eJMPv6CQ/install-custom-fonts-wordpress-editor.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
        
        <p><a href="https://wordpress.org/support/plugin/fonts/reviews/?filter=5">Click here to leave a review</a></p>
        
    </div>
    <?php
}




function add_more_buttons($buttons) {
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
return $buttons;
}

add_filter("mce_buttons_3", "add_more_buttons");

add_action('admin_notices', 'wpsites_fonts_plugin_notice');
function wpsites_fonts_plugin_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'example_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf(__('Please support fonts by leaving a review : <a href="https://wordpress.org/support/plugin/fonts/reviews/?filter=5">Click here to leave a quick review</a>  | <a href="%1$s">Hide Notice</a>'), '?example_nag_ignore=0');
        echo "</p></div>";
    }
}

add_action('admin_init', 'example_nag_ignore');
function example_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['example_nag_ignore']) && '0' == $_GET['example_nag_ignore'] ) {
             add_user_meta($user_id, 'example_ignore_notice', 'true', true);
    }
}
