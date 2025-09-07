<?php
/**
 * Plugin Name: Team Directory – Employees & Departments
 * Description: Prosta baza pracowników z CSV importem, działami, lokalizacjami i ładnymi wizytówkami.
 * Version: 0.1.1
 * Requires at least: 6.2
 * Requires PHP: 8.0
 * Author: You
 * License: GPLv2 or later
 * Text Domain: team-directory
 */
if (!defined('ABSPATH')) exit;
define('TD_PLUGIN_FILE', __FILE__);
define('TD_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('TD_PLUGIN_URL', plugin_dir_url(__FILE__));
define('TD_VERSION', '0.1.0');
require __DIR__ . '/vendor/autoload.php';
add_action('plugins_loaded', function () {(new \TeamDirectory\Plugin())->init();});
