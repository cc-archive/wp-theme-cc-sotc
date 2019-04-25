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
}