<?php
/*
 * Plugin Name:       WPCenter Test Project
 * Description:       A test plugin for adding the custom page.
 * Version:           1.0.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            Ali Soleymani
 */

define("WPC_TEST_DIR", plugin_dir_path(__FILE__));
define("WPC_TEST_URL", plugin_dir_url(__FILE__));
define("WPC_TEST_VERSION", "1.0.0");

require_once WPC_TEST_DIR . "/vendor/autoload.php";
require_once WPC_TEST_DIR . "/includes/bootstrap.php";