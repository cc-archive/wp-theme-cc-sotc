<?php
class front {
    public static function get_post_type($post_type,$size, $year = null, $return = 'ENTRIES') {
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => $size,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        if (!empty($year)) {
            $args['tax_query'] = array(
                'taxonomy' => 'sotc_year',
                'field' => 'term_id',
                'terms' => $year
            );
        }
        $query = new WP_Query($args);
        if ($query->have_posts() && ($return == 'ENTRIES')) {
            return $query->posts;
        } else if ( $query->have_posts() && ($return == 'OBJECT') ) {
            return $query;
        } else {
            return false;
        }
    }
    public static function get_highlights($size = 5, $year) {
        $entries = self::get_post_type('sotc_highlight', $size, $year);
        return $entries;
    }
    public static function get_impact_numbers($size = 5, $year) {
        $entries = self::get_post_type('sotc_impact', $size, $year);
        return $entries;
    }
    public static function get_license_data($size = 1, $year) {
        $entries = self::get_post_type('sotc_license', $size, $year);
        return $entries;
    }
    public static function get_platforms($size = 6, $year) {
        $entries = self::get_post_type('sotc_platform', $size, $year);
        return $entries;
    }
    public static function get_financial_data($size = 2, $year) {
        $entries = self::get_post_type('sotc_financial', $size, $year);
        return $entries;
    }
    public static function get_reports($size = -1) {
        $entries = self::get_post_type('sotc_report', $size);
        return $entries;
    }
    public static function get_ajax_platforms() {
        $size = esc_attr($_POST['size']);
        $offset = esc_attr($_POST['offset']);
        $year = esc_attr($_POST['year']);
        $entries = new WP_Query(
            array(
                'post_type' => 'sotc_platform',
                'posts_per_page' => $size,
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'offset' => $offset,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'sotc_year',
                        'field' => 'term_id',
                        'terms' => $year
                    )
                )
            )
        );
        $out = '';
        if ($entries->have_posts()) {
            foreach ($entries->posts as $item) {
                $out .= '<div class="cell">';
                    $out .= render::platform($item);
                $out .= '</div>';
            }
            echo $out;
        } else {
            echo 0;
        }
        exit(0);
    }
}

add_action('wp_ajax_get_current_platform', array('front','get_ajax_platforms'));
add_action('wp_ajax_nopriv_get_current_platform', array('front','get_ajax_platforms'));
