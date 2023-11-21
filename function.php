<?php
/*
 *@package aidephpinfo
 */
/*
Plugin Name: Aide - PHP Info
Plugin URI: https://aidecorp.com/
Description: This plugin is develop for show php info of your server. This will add a menu in admin panel called "PHP Info".
Author: Aide Corporation
Version: 1.0.0
Last Updated : "February 15, 2022",
Author URI: https://aidecorp.com/
Text Domain: aidephpinfo
Domain Path: /languages
*/

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

defined("ABSPATH") or die("Hey, you can not access this file, you silly human!");

define('AIDE_PHPINFO_PLUGIN_PATH', dirname(__FILE__) );


include_once('include/helper.php');


class AidePHPInfo
{
    public $pluginPath;
    public $pluginUrl;
    public $zoho_crm_vendors;

    function __construct()
    {
        ob_start();

        // Activation hook
        register_activation_hook(__FILE__, [$this, "plugin_activation_action"]);
        register_deactivation_hook(__FILE__, [ $this, "plugin_deactivation_action"]);

        // Upgrade callback
        add_filter(
            "upgrader_pre_install",
            [$this, "before_upgrade_callback"],
            10,
            2
        );
        add_action(
            "upgrader_process_complete",
            [$this, "after_upgrade_callback"],
            10,
            2
        );
        
        // Add admin menu
        add_action("admin_menu", [$this, "aide_phpinfo_admin_menu"]);
    }
    
    /// Active Plugin Callback
    function plugin_activation_action()
    {
        delete_transient("plugin_" . AIDE_PHPINFO_SLUG);

        flush_rewrite_rules();

        return true;
    }

    /// Deactive Plugin Callback
    function plugin_deactivation_action()
    {
        flush_rewrite_rules();

        return true;
    }

    /// Before Update Plugin Callback
    function before_upgrade_callback($return, $plugin)
    {
        // action

        return $return;
    }

    // After Update Plugin Callback
    function after_upgrade_callback($upgrader_object, $options)
    {
        $current_plugin_path_name = plugin_basename(__FILE__);

        if (isset($options["plugins"]) && is_array($options["plugins"])) {
            foreach ($options["plugins"] as $each_plugin) {
                if ($each_plugin == $current_plugin_path_name) {
                    // action
                    $this->updateActions();
                }
            }
        } elseif (isset($options["plugins"]) && $options["plugins"] != "") {
            if ($options["plugins"] == $current_plugin_path_name) {
                // action
                $this->updateActions();
            }
        } elseif (isset($options["plugin"]) && $options["plugin"] != "") {
            if ($options["plugin"] == $current_plugin_path_name) {
                // action
                $this->updateActions();
            }
        }

        delete_transient("plugin_" . AIDE_PHPINFO_SLUG);
    }
    function updateActions()
    {
        // Action
    }


    public function load_admin_style_script($data)
    {
        foreach ($data as $slug) {
            // make sure the style callback is used on our page only
        }
    }
    /*
    Name : aide_phpinfo_admin_menu
    Description : Add menu in wp admin panel called "PHP Info"
    */
    public function aide_phpinfo_admin_menu()
    {
        $icon_url = AIDE_PHPINFO_PLUGIN_URL . "assets/images/z-portal-icon.png";
        $mainmenu = add_menu_page(
            __("Aide - PHP Info", "aidephpinfo"), // Page Title
            __("PHP Info", "aidephpinfo"), // Menu Title
            "manage_options",
            "aide-phpinfo-dashboard", // Slug
            [$this, "submenu_aidephpinfo_info"],
            "",
            6
        );

        $this->load_admin_style_script([$mainmenu]);
    }
    public function add_submenu_pageLicense()
    {
        $submenu = add_submenu_page(
            "aide-phpinfo-dashboard", // Parent Slug
            __("Info", "aidephpinfo"), // Page Title
            __("Info", "aidephpinfo"), // Menu Title
            "manage_options",
            "aide-phpinfo-dashboard", // Slug
            [$this, "submenu_aidephpinfo_info"]
        );

        $this->load_admin_style_script([$submenu]);
    }
    function submenu_aidephpinfo_info()
    {
        global $wpdb;
        global $wp;
        include AIDE_PHPINFO_PLUGIN_PATH . "/pages/admin/info.php";
    }



}
new AidePHPInfo();

?>