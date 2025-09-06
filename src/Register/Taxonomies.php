<?php
namespace TeamDirectory\Register;
class Taxonomies {
  public function register(): void {
    add_action('init', function () {
      register_taxonomy('department', 'employee', [
        'label' => __('Działy', 'team-directory'),
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
      ]);
      register_taxonomy('location', 'employee', [
        'label' => __('Lokalizacje', 'team-directory'),
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
      ]);
    });
  }
}
