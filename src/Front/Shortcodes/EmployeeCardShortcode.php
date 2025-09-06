<?php
namespace TeamDirectory\Front\Shortcodes;
class EmployeeCardShortcode {
  public function render($atts): string {
    $atts = shortcode_atts(['id' => ''], $atts, 'employee_card');
    $id = (int)$atts['id']; if (!$id) return '';
    $post = get_post($id); if (!$post || $post->post_type !== 'employee') return '';
    $name = get_the_title($id);
    $content = apply_filters('the_content', $post->post_content);
    $thumb = get_the_post_thumbnail_url($id, 'large') ?: plugins_url('assets/img/placeholder.svg', TD_PLUGIN_FILE);
    wp_enqueue_style('td-frontend');
    ob_start();
    echo '<article class="td-card">';
    echo '<img src="'.esc_url($thumb).'" alt="'.esc_attr($name).'">';
    echo '<div class="td-card__name">'.esc_html($name).'</div>';
    echo '<div class="td-card__meta">'.$content.'</div>';
    echo '</article>'; return ob_get_clean();
  }
}
