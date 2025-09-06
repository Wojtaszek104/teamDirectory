<?php
namespace TeamDirectory\Front\Shortcodes;
class TeamGridShortcode {
  public function render($atts): string {
    $atts = shortcode_atts([
      'department' => '', 'location' => '', 'columns' => '3',
      'per_page' => '0', 'orderby' => 'title', 'order' => 'ASC',
    ], $atts, 'team');
    $args = [
      'post_type' => 'employee',
      'posts_per_page' => (int)$atts['per_page'] ?: -1,
      'orderby' => sanitize_text_field($atts['orderby']),
      'order' => sanitize_text_field($atts['order']),
      'tax_query' => [],
    ];
    if ($atts['department']) {
      $args['tax_query'][] = ['taxonomy'=>'department','field'=>'slug','terms'=>array_map('sanitize_title', explode(',', $atts['department']))];
    }
    if ($atts['location']) {
      $args['tax_query'][] = ['taxonomy'=>'location','field'=>'slug','terms'=>array_map('sanitize_title', explode(',', $atts['location']))];
    }
    if (count($args['tax_query']) > 1) $args['tax_query']['relation'] = 'AND';
    $q = new \WP_Query($args);
    wp_enqueue_style('td-frontend'); wp_enqueue_script('td-frontend');
    ob_start();
    echo '<div class="td-grid" style="grid-template-columns:repeat(' . (int)$atts['columns'] . ', minmax(0,1fr))">';
    if ($q->have_posts()) {
      while ($q->have_posts()) { $q->the_post();
        $name = get_the_title();
        $content = get_the_content();
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: plugins_url('assets/img/placeholder.svg', TD_PLUGIN_FILE);
        echo '<article class="td-card">';
        echo '<img src="'.esc_url($thumb).'" alt="'.esc_attr($name).'">';
        echo '<div class="td-card__name">'.esc_html($name).'</div>';
        echo '<div class="td-card__meta">'.wp_kses_post(wp_trim_words($content, 20)).'</div>';
        echo '</article>';
      } wp_reset_postdata();
    } else { echo '<p>'.esc_html__('Brak pracowników do wyświetlenia.', 'team-directory').'</p>'; }
    echo '</div>'; return ob_get_clean();
  }
}
