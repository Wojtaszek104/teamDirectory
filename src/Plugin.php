<?php
namespace TeamDirectory;
use TeamDirectory\Register\PostTypes;
use TeamDirectory\Register\Taxonomies;
use TeamDirectory\Front\Shortcodes\TeamGridShortcode;
use TeamDirectory\Front\Shortcodes\EmployeeCardShortcode;
class Plugin {
  public function init(): void {
    (new PostTypes())->register();
    (new Taxonomies())->register();
    add_action('init', [$this, 'registerAssets']);
    add_shortcode('team', [new TeamGridShortcode(), 'render']);
    add_shortcode('employee_card', [new EmployeeCardShortcode(), 'render']);
  }
  public function registerAssets(): void {
    wp_register_style('td-frontend', TD_PLUGIN_URL.'public/css/frontend.css', [], TD_VERSION);
    wp_register_script('td-frontend', TD_PLUGIN_URL.'public/js/frontend.js', [], TD_VERSION, true);
  }
}
