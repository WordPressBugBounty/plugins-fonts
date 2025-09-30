<?php
/*
Plugin Name: Fonts
Plugin URI: https://wpsites.net/best-plugins/plugin-fonts-styles-sizes-wordpress/
Description: Premium Upgrades: <a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/">Add Custom Fonts</a> 
Version: 3.0
Author: WP Sites fonts@wpsites.net
Author URI: https://wpsites.net/bradley-james-dalton-wordpress-developer/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Sorry, you are not allowed to access this page directly.' );
}

// Include CSS for styling
function fonts_dummy_enqueue_styles() {
    wp_enqueue_style( 'fonts-dummy-admin', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css', array(), '3.0' );
}
add_action( 'admin_enqueue_scripts', 'fonts_dummy_enqueue_styles' );

// Fix menu spacing with inline CSS and JavaScript
function fonts_dummy_fix_menu_spacing() {
    ?>
    <style>
    /* Make Fonts menu spacing match default WordPress menu items */
    #adminmenu li#toplevel_page_fonts-pro {
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Fix the br tag in menu image - same as default */
    #adminmenu li#toplevel_page_fonts-pro .wp-menu-image br {
        display: none !important;
    }
    
    /* Make menu image match default styling */
    #adminmenu li#toplevel_page_fonts-pro .wp-menu-image {
        height: 20px !important;
        line-height: 20px !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Make menu name match default styling */
    #adminmenu li#toplevel_page_fonts-pro .wp-menu-name {
        padding: 8px 0 !important;
        line-height: 1.4 !important;
        margin: 0 !important;
    }
    
    /* Make the main menu link match default styling */
    #adminmenu li#toplevel_page_fonts-pro a.menu-top {
        padding: 8px 0 !important;
        margin: 0 !important;
        display: block !important;
    }
    
    /* Override menu-top-last class spacing */
    #adminmenu li#toplevel_page_fonts-pro.menu-top-last {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    
    /* Ensure consistent spacing with other menu items */
    #adminmenu li#toplevel_page_fonts-pro + li {
        margin-top: 0 !important;
    }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // Remove menu-top-last class and add menu-top-first to fix spacing
        $('#toplevel_page_fonts-pro').removeClass('menu-top-last').addClass('menu-top-first');
        $('#toplevel_page_fonts-pro a').removeClass('menu-top-last').addClass('menu-top-first');
    });
    </script>
    <?php
}
add_action( 'admin_head', 'fonts_dummy_fix_menu_spacing' );

// Hook to add the admin menu
add_action('admin_menu', 'fonts_dummy_menu');
function fonts_dummy_menu() {
    add_menu_page(
        'Fonts', // Page title
        'Fonts', // Menu title
        'manage_options', // Capability
        'fonts-pro', // Menu slug
        'fonts_dummy_dashboard_page', // Callback function
        'dashicons-editor-textcolor', // Icon
        20 // Position - moved up to avoid menu-top-last
    );
    
    // Add submenu pages (dummy - non-functional)
    add_submenu_page(
        'fonts-pro',
        'Dashboard',
        'Dashboard',
        'manage_options',
        'fonts-pro',
        'fonts_dummy_dashboard_page'
    );
    
    add_submenu_page(
        'fonts-pro',
        'Google Fonts <span style="color: #e74c3c; font-weight: bold;">PRO</span>',
        'Google Fonts <span style="color: #e74c3c; font-weight: bold;">PRO</span>',
        'manage_options',
        'fonts-pro-google',
        'fonts_dummy_google_fonts_page'
    );
    
    add_submenu_page(
        'fonts-pro',
        'Custom Fonts <span style="color: #27ae60; font-weight: bold;">PRO</span>',
        'Custom Fonts <span style="color: #27ae60; font-weight: bold;">PRO</span>',
        'manage_options',
        'fonts-pro-custom',
        'fonts_dummy_custom_fonts_page'
    );
    
    add_submenu_page(
        'fonts-pro',
        'Settings <span style="color: #3498db; font-weight: bold;">PRO</span>',
        'Settings <span style="color: #3498db; font-weight: bold;">PRO</span>',
        'manage_options',
        'fonts-pro-settings',
        'fonts_dummy_settings_page'
    );
}

function fonts_dummy_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Fonts Dashboard</h1>
        
        <div class="fonts-pro-dashboard">
            <div class="fonts-pro-quick-actions">
                <h2>Quick Actions</h2>
                <div class="action-buttons">
                    <a href="<?php echo admin_url( 'admin.php?page=fonts-pro-google' ); ?>" class="button button-primary">
                        Add Google Fonts
                    </a>
                    <a href="<?php echo admin_url( 'admin.php?page=fonts-pro-custom' ); ?>" class="button button-primary">
                        Upload Custom Fonts
                    </a>
                    <a href="<?php echo admin_url( 'admin.php?page=fonts-pro-settings' ); ?>" class="button button-secondary">
                        Settings
                    </a>
                </div>
            </div>
            
            <div class="fonts-pro-upgrade-notice" style="background: #fff; border: 1px solid #ddd; border-radius: 8px; padding: 20px; margin-top: 20px;">
                <h2>Upgrade to Fonts Pro</h2>
                <p>This is the free version of Fonts. To access all features, <a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/" target="_blank">upgrade to Fonts Pro</a>:</p>
                <ul style="margin-left: 20px; list-style-type: disc;">
                    <li>Google Fonts integration with 1896 fonts</li>
                    <li>Custom font uploads (WOFF, WOFF2, TTF, OTF)</li>
                    <li>Advanced typography controls</li>
                    <li>Performance optimization</li>
                    <li>Editor integration</li>
                </ul>
                <p style="margin-top: 15px;">
                    <a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/" class="button button-primary" target="_blank">
                        Get Fonts Pro Now
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php
}

function fonts_dummy_google_fonts_page() {
    ?>
    <div class="wrap">
        <h1 class="google-fonts-header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 190 35" width="190" height="35" preserveAspectRatio="xMidYMid meet">
                <!-- Google "G" Logo -->
                <g transform="translate(127.75,9.538)">
                    <g transform="translate(5.057,8.484)">
                        <path fill="rgb(95,99,104)" d="M-2.691,1.173 C-2.691,1.173 -2.691,8.234 -2.691,8.234 C-2.691,8.234 -4.807,8.234 -4.807,8.234 C-4.807,8.234 -4.807,-8.234 -4.807,-8.234 C-4.807,-8.234 4.807,-8.234 4.807,-8.234 C4.807,-8.234 4.807,-6.211 4.807,-6.211 C4.807,-6.211 -2.691,-6.211 -2.691,-6.211 C-2.691,-6.211 -2.691,-0.806 -2.691,-0.806 C-2.691,-0.806 4.072,-0.806 4.072,-0.806 C4.072,-0.806 4.072,1.173 4.072,1.173 C4.072,1.173 -2.691,1.173 -2.691,1.173z"/>
                    </g>
                    <g transform="translate(16.619,11.083)">
                        <path fill="rgb(95,99,104)" d="M-5.796,0 C-5.796,-1.732 -5.252,-3.166 -4.163,-4.301 C-3.059,-5.436 -1.671,-6.003 0,-6.003 C1.672,-6.003 3.051,-5.436 4.14,-4.301 C5.244,-3.166 5.796,-1.732 5.796,0 C5.796,1.748 5.244,3.182 4.14,4.301 C3.051,5.436 1.672,6.003 0,6.003 C-1.671,6.003 -3.059,5.436 -4.163,4.301 C-5.252,3.166 -5.796,1.732 -5.796,0z M-3.68,0 C-3.68,1.211 -3.327,2.192 -2.622,2.943 C-1.917,3.695 -1.043,4.07 0,4.07 C1.043,4.07 1.917,3.695 2.622,2.943 C3.327,2.192 3.68,1.211 3.68,0 C3.68,-1.196 3.327,-2.17 2.622,-2.921 C1.901,-3.688 1.027,-4.071 0,-4.071 C-1.028,-4.071 -1.902,-3.688 -2.622,-2.921 C-3.327,-2.17 -3.68,-1.196 -3.68,0z"/>
                    </g>
                    <g transform="translate(29.205,10.899)">
                        <path fill="rgb(95,99,104)" d="M-4.991,-5.451 C-4.991,-5.451 -2.967,-5.451 -2.967,-5.451 C-2.967,-5.451 -2.967,-3.888 -2.967,-3.888 C-2.967,-3.888 -2.875,-3.888 -2.875,-3.888 C-2.553,-4.439 -2.058,-4.899 -1.391,-5.267 C-0.724,-5.636 -0.031,-5.819 0.691,-5.819 C2.071,-5.819 3.132,-5.425 3.875,-4.635 C4.619,-3.846 4.991,-2.722 4.991,-1.265 C4.991,-1.265 4.991,5.819 4.991,5.819 C4.991,5.819 2.875,5.819 2.875,5.819 C2.875,5.819 2.875,-1.128 2.875,-1.128 C2.829,-2.968 1.902,-3.888 0.092,-3.888 C-0.752,-3.888 -1.457,-3.546 -2.024,-2.864 C-2.592,-2.181 -2.875,-1.365 -2.875,-0.415 C-2.875,-0.415 -2.875,5.819 -2.875,5.819 C-2.875,5.819 -4.991,5.819 -4.991,5.819 C-4.991,5.819 -4.991,-5.451 -4.991,-5.451z"/>
                    </g>
                    <g transform="translate(39.074,9.45)">
                        <path fill="rgb(95,99,104)" d="M1.633,7.452 C0.713,7.452 -0.051,7.168 -0.656,6.6 C-1.262,6.033 -1.572,5.244 -1.588,4.232 C-1.588,4.232 -1.588,-2.07 -1.588,-2.07 C-1.588,-2.07 -3.565,-2.07 -3.565,-2.07 C-3.565,-2.07 -3.565,-4.001 -3.565,-4.001 C-3.565,-4.001 -1.588,-4.001 -1.588,-4.001 C-1.588,-4.001 -1.588,-7.452 -1.588,-7.452 C-1.588,-7.452 0.529,-7.452 0.529,-7.452 C0.529,-7.452 0.529,-4.001 0.529,-4.001 C0.529,-4.001 3.288,-4.001 3.288,-4.001 C3.288,-4.001 3.288,-2.07 3.288,-2.07 C3.288,-2.07 0.529,-2.07 0.529,-2.07 C0.529,-2.07 0.529,3.542 0.529,3.542 C0.529,4.293 0.674,4.804 0.966,5.072 C1.257,5.341 1.587,5.473 1.954,5.473 C2.123,5.473 2.288,5.455 2.449,5.417 C2.611,5.379 2.76,5.328 2.898,5.266 C2.898,5.266 3.565,7.152 3.565,7.152 C3.013,7.351 2.368,7.452 1.633,7.452z"/>
                    </g>
                    <g transform="translate(48.071,11.083)">
                        <path fill="rgb(95,99,104)" d="M4.681,2.507 C4.681,3.488 4.251,4.317 3.393,4.991 C2.534,5.665 1.452,6.003 0.15,6.003 C-0.985,6.003 -1.983,5.707 -2.841,5.117 C-3.7,4.528 -4.313,3.749 -4.681,2.783 C-4.681,2.783 -2.796,1.978 -2.796,1.978 C-2.519,2.653 -2.117,3.178 -1.588,3.554 C-1.059,3.929 -0.479,4.117 0.15,4.117 C0.825,4.117 1.388,3.972 1.84,3.68 C2.292,3.389 2.518,3.044 2.518,2.645 C2.518,1.924 1.967,1.396 0.863,1.058 C0.863,1.058 -1.07,0.575 -1.07,0.575 C-3.263,0.023 -4.359,-1.035 -4.359,-2.599 C-4.359,-3.626 -3.942,-4.451 -3.106,-5.071 C-2.27,-5.692 -1.2,-6.003 0.104,-6.003 C1.1,-6.003 2.001,-5.765 2.806,-5.29 C3.611,-4.814 4.174,-4.179 4.495,-3.381 C4.495,-3.381 2.61,-2.599 2.61,-2.599 C2.395,-3.074 2.047,-3.446 1.564,-3.715 C1.081,-3.982 0.539,-4.117 -0.058,-4.117 C-0.61,-4.117 -1.105,-3.979 -1.542,-3.703 C-1.979,-3.427 -2.197,-3.09 -2.197,-2.691 C-2.197,-2.047 -1.591,-1.587 -0.381,-1.311 C-0.381,-1.311 1.323,-0.874 1.323,-0.874 C3.561,-0.322 4.681,0.805 4.681,2.507z"/>
                    </g>
                </g>
                
                <!-- "Fonts" Text -->
                <g transform="translate(45.75,7.75)">
                    <g transform="translate(9.361,9.559)">
                        <path fill="rgb(95,99,104)" d="M0.376,9.309 C-4.777,9.309 -9.111,5.132 -9.111,0 C-9.111,-5.131 -4.777,-9.309 0.376,-9.309 C3.228,-9.309 5.257,-8.196 6.786,-6.743 C6.786,-6.743 4.982,-4.95 4.982,-4.95 C3.888,-5.971 2.406,-6.766 0.376,-6.766 C-3.387,-6.766 -6.329,-3.746 -6.329,0 C-6.329,3.747 -3.387,6.767 0.376,6.767 C2.816,6.767 4.208,5.79 5.098,4.905 C5.827,4.178 6.307,3.134 6.488,1.703 C6.488,1.703 0.376,1.703 0.376,1.703 C0.376,1.703 0.376,-0.84 0.376,-0.84 C0.376,-0.84 8.975,-0.84 8.975,-0.84 C9.066,-0.386 9.111,0.16 9.111,0.75 C9.111,2.657 8.586,5.018 6.898,6.699 C5.256,8.401 3.159,9.309 0.376,9.309z"/>
                    </g>
                    <g transform="translate(25.838,12.874)">
                        <path fill="rgb(95,99,104)" d="M5.935,0 C5.935,3.451 3.269,5.994 0,5.994 C-3.27,5.994 -5.935,3.451 -5.935,0 C-5.935,-3.474 -3.27,-5.994 0,-5.994 C3.269,-5.994 5.935,-3.474 5.935,0z M3.337,0 C3.337,-2.157 1.79,-3.633 0,-3.633 C-1.792,-3.633 -3.338,-2.157 -3.338,0 C-3.338,2.134 -1.792,3.633 0,3.633 C1.79,3.633 3.337,2.134 3.337,0z"/>
                    </g>
                    <g transform="translate(39.141,12.874)">
                        <path fill="rgb(95,99,104)" d="M5.935,0 C5.935,3.451 3.269,5.994 0,5.994 C-3.27,5.994 -5.935,3.451 -5.935,0 C-5.935,-3.474 -3.27,-5.994 0,-5.994 C3.269,-5.994 5.935,-3.474 5.935,0z M3.337,0 C3.337,-2.157 1.791,-3.633 0,-3.633 C-1.792,-3.633 -3.337,-2.157 -3.337,0 C-3.337,2.134 -1.792,3.633 0,3.633 C1.791,3.633 3.337,2.134 3.337,0z"/>
                    </g>
                    <g transform="translate(52.275,15.565)">
                        <path fill="rgb(95,99,104)" d="M5.77,-8.322 C5.77,-8.322 5.77,2.441 5.77,2.441 C5.77,6.869 3.148,8.685 0.046,8.685 C-2.873,8.685 -4.629,6.732 -5.29,5.143 C-5.29,5.143 -2.988,4.189 -2.988,4.189 C-2.577,5.165 -1.574,6.323 0.046,6.323 C2.03,6.323 3.262,5.098 3.262,2.804 C3.262,2.804 3.262,1.941 3.262,1.941 C3.262,1.941 3.171,1.941 3.171,1.941 C2.578,2.668 1.437,3.303 0.001,3.303 C-3.01,3.303 -5.77,0.693 -5.77,-2.668 C-5.77,-6.051 -3.01,-8.685 0.001,-8.685 C1.437,-8.685 2.578,-8.049 3.171,-7.345 C3.171,-7.345 3.262,-7.345 3.262,-7.345 C3.262,-7.345 3.262,-8.322 3.262,-8.322 C3.262,-8.322 5.77,-8.322 5.77,-8.322z M3.444,-2.668 C3.444,-4.779 2.03,-6.324 0.229,-6.324 C-1.596,-6.324 -3.124,-4.779 -3.124,-2.668 C-3.124,-0.579 -1.596,0.942 0.229,0.942 C2.03,0.942 3.444,-0.579 3.444,-2.668z"/>
                    </g>
                    <g transform="translate(61.36,9.695)">
                        <path fill="rgb(95,99,104)" d="M1.323,8.809 C1.323,8.809 -1.323,8.809 -1.323,8.809 C-1.323,8.809 -1.323,-8.809 -1.323,-8.809 C-1.323,-8.809 1.323,-8.809 1.323,-8.809 C1.323,-8.809 1.323,8.809 1.323,8.809z"/>
                    </g>
                    <g transform="translate(69.738,12.874)">
                        <path fill="rgb(95,99,104)" d="M3.344,1.975 C3.344,1.975 5.397,3.337 5.397,3.337 C4.737,4.314 3.139,5.993 0.38,5.993 C-3.04,5.993 -5.511,3.361 -5.511,0.001 C-5.511,-3.564 -3.019,-5.993 0.084,-5.993 C3.209,-5.993 4.737,-3.52 5.238,-2.18 C5.238,-2.18 5.511,-1.499 5.511,-1.499 C5.511,-1.499 -2.539,1.816 -2.539,1.816 C-1.923,3.019 -0.966,3.633 0.38,3.633 C1.725,3.633 2.661,2.974 3.344,1.975z M-2.973,-0.182 C-2.973,-0.182 2.41,-2.406 2.41,-2.406 C2.113,-3.155 1.224,-3.678 0.174,-3.678 C-1.171,-3.678 -3.04,-2.498 -2.973,-0.182z"/>
                    </g>
                </g>
                
                <!-- Google Logo Colors -->
                <g transform="translate(1.25,5.75)">
                    <g transform="translate(12,11.75)">
                        <path fill="rgb(251,188,4)" d="M-11.75,11.5 C-11.75,11.5 2.75,-11.5 2.75,-11.5 C2.75,-11.5 11.75,-11.5 11.75,-11.5 C11.75,-11.5 11.75,-8.3 11.75,-8.3 C11.75,-8.3 -0.75,11.5 -0.75,11.5"/>
                    </g>
                </g>
                <g transform="translate(15.75,5.75)">
                    <g transform="translate(4.75,11.75)">
                        <path fill="rgb(26,115,232)" d="M4.5,11.5 C4.5,11.5 -4.5,11.5 -4.5,11.5 C-4.5,11.5 -4.5,-11.5 -4.5,-11.5 C-4.5,-11.5 4.5,-11.5 4.5,-11.5 C4.5,-11.5 4.5,11.5 4.5,11.5z"/>
                    </g>
                </g>
                <g transform="translate(24.75,15.75)">
                    <g transform="translate(3.5,6.75)">
                        <path fill="rgb(52,168,83)" d="M3.25,0 C3.25,3.59 0.34,6.5 -3.25,6.5 C-3.25,6.5 -3.25,-6.5 -3.25,-6.5 C0.34,-6.5 3.25,-3.59 3.25,0z"/>
                    </g>
                </g>
                <g transform="translate(18.25,15.75)">
                    <g transform="translate(3.5,6.75)">
                        <path fill="rgb(13,101,45)" d="M3.25,6.5 C-0.34,6.5 -3.25,3.59 -3.25,0 C-3.25,-3.59 -0.34,-6.5 3.25,-6.5 C3.25,-6.5 3.25,6.5 3.25,6.5z"/>
                    </g>
                </g>
                <g transform="translate(24.75,5.75)">
                    <g transform="translate(2.75,5.25)">
                        <path fill="rgb(26,115,232)" d="M2.5,0 C2.5,2.761 0.262,5 -2.5,5 C-2.5,5 -2.5,-5 -2.5,-5 C0.262,-5 2.5,-2.761 2.5,0z"/>
                    </g>
                </g>
                <g transform="translate(19.75,5.75)">
                    <g transform="translate(2.75,5.25)">
                        <path fill="rgb(23,78,166)" d="M2.5,5 C-0.262,5 -2.5,2.761 -2.5,0 C-2.5,-2.761 -0.262,-5 2.5,-5 C2.5,-5 2.5,5 2.5,5z"/>
                    </g>
                </g>
                <g transform="translate(1.75,5.75)">
                    <g transform="translate(4.75,4.75)">
                        <path fill="rgb(234,67,53)" d="M-4.5,0 C-4.5,-2.485 -2.485,-4.5 0,-4.5 C2.485,-4.5 4.5,-2.485 4.5,0 C4.5,2.485 2.485,4.5 0,4.5 C-2.485,4.5 -4.5,2.485 -4.5,0z"/>
                    </g>
                </g>
            </svg>
        </h1>
        
        <div class="notice notice-warning">
            <p>
                <strong>Google Fonts API Key Required</strong><br>
                To search and add Google Fonts, you need to configure your API key in the
                <a href="<?php echo admin_url( 'admin.php?page=fonts-pro-settings' ); ?>">Settings</a>
                page. Without an API key, you can still use the fallback fonts.
            </p>
        </div>
        
        <div class="fonts-pro-google-fonts">
            <div class="google-fonts-search">
                <input type="text" id="google-fonts-search" placeholder="Search Google Fonts..." disabled />
                <button type="button" id="search-google-fonts" class="button" disabled>Search</button>
            </div>
            
            <div class="google-fonts-preview" id="google-fonts-preview" style="display: none;">
                <h3>Font Preview</h3>
                <div id="preview-content"></div>
            </div>
            
            <div class="google-fonts-list" id="google-fonts-list">
                <div class="notice notice-info">
                    <p><strong>Upgrade Required:</strong> This feature is available in Fonts Pro. <a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/" target="_blank">Get Fonts Pro now</a> to access Google Fonts integration.</p>
                </div>
            </div>
            
            <div class="selected-google-fonts">
                <h3>Added Google Fonts</h3>
                <div id="selected-google-fonts">
                    <p>No Google Fonts added yet. Upgrade to Fonts Pro to add Google Fonts.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function fonts_dummy_custom_fonts_page() {
    ?>
    <div class="wrap">
        <h1>Custom Fonts PRO</h1>
        
        <div class="fonts-pro-custom-fonts">
            <div class="custom-font-upload">
                <h3>Upload Custom Font</h3>
                <form id="custom-font-upload-form" enctype="multipart/form-data">
                    <table class="form-table">
                        <tr>
                            <th scope="row">Font Name</th>
                            <td>
                                <input type="text" name="font_name" required disabled />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Font Family</th>
                            <td>
                                <input type="text" name="font_family" required disabled />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Font Files</th>
                            <td>
                                <input type="file" name="font_files[]" multiple accept=".woff,.woff2,.ttf,.otf" required disabled />
                                <p class="description">Upload WOFF, WOFF2, TTF, or OTF files. Multiple files for different weights/styles.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Font Weights</th>
                            <td>
                                <input type="text" name="font_weights" placeholder="400,700" disabled />
                                <p class="description">Comma-separated list of font weights (e.g., 400,700)</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Font Styles</th>
                            <td>
                                <input type="text" name="font_styles" placeholder="normal,italic" disabled />
                                <p class="description">Comma-separated list of font styles (e.g., normal,italic)</p>
                            </td>
                        </tr>
                    </table>
                    <p class="submit">
                        <button type="submit" class="button button-primary" disabled>Upload Font</button>
                    </p>
                </form>
                
                <div class="notice notice-info">
                    <p><strong>Upgrade Required:</strong> Custom font uploads are available in Fonts Pro. <a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/" target="_blank">Get Fonts Pro now</a> to upload and use custom fonts.</p>
                </div>
            </div>
            
            <div class="custom-fonts-list">
                <h3>Uploaded Custom Fonts</h3>
                <div id="custom-fonts-list">
                    <p>No custom fonts uploaded yet. Upgrade to Fonts Pro to upload custom fonts.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function fonts_dummy_settings_page() {
    ?>
    <div class="wrap">
        <h1>Fonts Settings PRO</h1>
        
        <form method="post" action="options.php">
            <table class="form-table">
                <tr>
                    <th scope="row">Google Fonts API Key</th>
                    <td>
                        <input type="text" name="fonts_pro_google_api_key" id="google-api-key" value="" class="regular-text" disabled />
                        <button type="button" id="test-google-api" class="button" disabled>Test API Connection</button>
                        <div id="api-test-result" style="margin-top: 10px;"></div>
                        <p class="description">
                            Get your API key from <a href="https://console.developers.google.com/" target="_blank">Google Cloud Console</a>
                            <br>
                            <strong style="margin-top: 20px; display: block;">Setup Instructions:</strong>
                            <ol>
                                <li>Go to <a href="https://console.developers.google.com/" target="_blank">Google Cloud Console</a></li>
                                <li>Create a new project or select an existing one</li>
                                <li>Enable the <a href="https://console.developers.google.com/apis/library/webfonts.googleapis.com" target="_blank">Web Fonts Developer API</a></li>
                                <li>Create credentials (API Key)</li>
                                <li>Copy the API key and paste it above</li>
                                <li>Click "Test API Connection" to verify it works</li>
                            </ol>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Font Preloading</th>
                    <td>
                        <label>
                            <input type="checkbox" name="fonts_pro_enable_preloading" value="1" disabled />
                            Enable font preloading for better performance
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Host Fonts Locally</th>
                    <td>
                        <label>
                            <input type="checkbox" name="fonts_pro_host_locally" value="1" disabled />
                            Download and host Google Fonts locally for better privacy and performance
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Optimize Font Loading</th>
                    <td>
                        <label>
                            <input type="checkbox" name="fonts_pro_optimize_loading" value="1" disabled />
                            Use font-display: swap for better loading performance
                        </label>
                    </td>
                </tr>
            </table>
            
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" disabled />
            </p>
        </form>
        
        <div class="notice notice-info">
            <p><strong>Upgrade Required:</strong> Advanced settings are available in Fonts Pro. <a href="https://wpsites.net/product/custom-fonts-for-your-visual-editor-in-wordpress/" target="_blank">Get Fonts Pro now</a> to access all settings and features.</p>
        </div>
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
    global $current_user;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'example_ignore_notice') ) {
        echo '<div class="updated"><p>'; 
        printf(__('Please support Fonts by leaving a review : <a href="https://wordpress.org/support/plugin/fonts/reviews/?filter=5">Click here to leave a quick review</a>  | <a href="%1$s">Hide Notice</a>'), '?example_nag_ignore=0');
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
