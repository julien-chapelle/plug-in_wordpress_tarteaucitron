<?php
/*
Plugin Name: LAMANU-cookie-law
Version: 1.3
Plugin URI: http://www.jchapelle.net/TpEcommerceWp/
Description: WordPress Plugin for european cookie law.
Author: Julien Chapelle
Author URI: https://opt-out.ferank.eu/fr/
*/

add_action( 'admin_menu', 'LAMANU_admin_menu' );
add_action('admin_init', 'register_settings');
add_action('wp_head', 'LAMANU_scripts');

function LAMANU_scripts() {
    echo '<script type="text/javascript" src="' . plugin_dir_url(__FILE__) . '/JS/tarteaucitron/tarteaucitron.js"></script>

    <script type="text/javascript">
    tarteaucitron.init({

      "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
      "cookieName": "tarteaucitron", /* Cookie name */

      "orientation": "bottom", /* Banner position (top - bottom) */
      "showAlertSmall": true, /* Show the small banner on bottom right */
      "cookieslist": true, /* Show the cookie list */

      "adblocker": false, /* Show a Warning if an adblocker is detected */
      "highPrivacy": false, /* Disable auto consent */

      "removeCredit": false, /* Remove credit link */
                      
      "readmoreLink": "/cookiespolicy" /* Change the default readmore link */

    });
    tarteaucitron.user.analyticsUa = \''. get_option('google_analytics', 'UA-00000000-0') . '\';
        tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
        (tarteaucitron.job = tarteaucitron.job || []).push("analytics");
    </script>';
}
function LAMANU_admin_menu(){
    add_menu_page('Page de configuration de la gestion de cookies', 'Gestion des cookies', 'manage_options', 'configuration', 'LAMANU_admin_menu_page');
}

function LAMANU_admin_menu_page(){
    require_once(plugin_dir_path(__FILE__) . 'view/option.php');
}
function register_settings(){
    register_setting('LAMANU_GoogleAnalytics', 'google_analytics');
}