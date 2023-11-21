<?php
global $wpdb;
define('AIDE_PHPINFO_SLUG', "aide-phpinfo" );

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$parsed = parse_url(WP_PLUGIN_URL);
$urlStr = WP_PLUGIN_URL;
if (isset($parsed['host'], $parsed['path']) ) {
    $urlStr = $protocol . $parsed['host'].$parsed['path'];
}   
define('AIDE_PHPINFO_PLUGIN_URL', $urlStr . '/aide-phpinfo/');

define('AIDE_PHPINFO_TEMPFILE', ABSPATH.'/_temp_out.txt' );

add_action("activated_plugin", "activation_handler_AIDE_PHPINFO");

function activation_handler_AIDE_PHPINFO()
{
    $cont = ob_get_contents();
    if (!empty($cont)) {
        file_put_contents(AIDE_PHPINFO_TEMPFILE, $cont);
    }
}

add_action("pre_current_active_plugins", "pre_output_AIDE_PHPINFO");

function pre_output_AIDE_PHPINFO($action)
{
    if (is_admin() && file_exists(AIDE_PHPINFO_TEMPFILE)) {
        $cont = file_get_contents(AIDE_PHPINFO_TEMPFILE);
        if (!empty($cont)) {
            echo '<div class="error">Error Message:' . $cont . "</div>";
            @unlink(AIDE_PHPINFO_TEMPFILE);
        }
    }
}


/*
Name : dbg
Parameter : $data
Description : Print parameter if administrator logged in
*/
if (!function_exists('dbg'))   {
    function aidedbg($data="")
    {
        $current_user = wp_get_current_user();
        if (user_can($current_user, "administrator")) {
            echo '<div class="clr"></div><pre style="background: #1d2327 !important; padding: 20px; border-radius: 5px; width: 100%; color: white !important; font-size: 15px; white-space: pre-wrap; word-break: break-all; max-width: 100%;">';
            var_dump($data);
            echo '</pre><div class="clr"></div>';
        }
    }
}