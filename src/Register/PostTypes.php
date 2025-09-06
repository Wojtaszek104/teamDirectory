<?php
namespace TeamDirectory\Register;
class PostTypes {
  public function register(): void {
    add_action('init', function () {
      register_post_type('employee', [
        'label' => __('Pracownicy', 'team-directory'),
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-groups'
      ]);
    });
  }
}
