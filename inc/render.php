<?php
class render {
    /*
		Get featured image url from post
	*/
	static function get_post_thumbnail_url($post,$size = 'squared') {
		$attachment_id = get_post_thumbnail_id( $post->ID );
		return current(wp_get_attachment_image_src( $attachment_id, $size));
	}

    static function highlight($post, $container_class) {
        $content = get_extended($post->highlights_content);
        $class_extra_content = (!empty($content['extended'])) ? ' has-extended-content' : '';
        $url_text = (!empty($post->highlights_url_text)) ? $post->highlights_url_text : 'Visit';
        $out = '';
        $out .= '<article class="hentry entry-highlight cssgrid-cell'.$class_extra_content.$container_class.'">';
            $out .= '<h5 class="entry-title">'.get_the_title($post->ID).'</h5>';
            $out .= apply_filters('the_content',$content['main']);
            if ( !empty( $content['extended'] ) ) {
                $out .= '<div class="content-extended" id="extended-'.$post->ID.'">'.apply_filters('the_content',$content['extended']).'</div>';
            }
            if (!empty($post->highlights_url)) {
                $out .= '<div class="entry-button">';
                    $out .= '<a href="'.esc_url_raw($post->highlights_url).'" class="button primary">'.$url_text.' &nbsp;&nbsp; <span class="dashicons dashicons-arrow-right-alt"></span></a>';
                $out .= '</div>';
            }
            if (!empty($content['extended'])) {
                $out .= '<div class="view-more-container">';
                    $out .='<a href="#" class="entry-more" data-replace-text="'.pll__('View less').' <span class=\'dashicons dashicons-arrow-up-alt2\'></span>" data-target="#extended-'.$post->ID.'">'. pll__('View more').' <span class="dashicons dashicons-arrow-down-alt2"></i></a>';
                $out .= '</div>';
            }
        $out .= '</article>';
        return $out;
    }
    static function impact($post, $container_class, $align='vertical') {
        $background_image_url = self::get_post_thumbnail_url($post,'landscape-medium');
        $background_style = (!empty($background_image_url)) ? ' style="background-image: url('.$background_image_url.')"' : '';
        $align_class = ($align == 'horizontal') ? ' horizontal' : ' vertical'; 
        $out = '';
        $out .= '<article class="hentry entry-impact cssgrid-cell'.$container_class.$align_class.'"'.$background_style.'>';
            $out .= '<h5 class="entry-title">'.get_the_title($post->ID).'</h5>';
            $out .= ($align == 'horizontal') ? '<div class="horizontal-container">' : '';
            $out .= '<div class="number-container">';
                $out .= '<span class="number">'.$post->impact_number.'</span>';
                $out .= '<span class="legend">'.$post->impact_number_description.'</span>';
            $out .= '</div>';
            $out .= '<div class="entry-description">'.apply_filters('the_content',$post->impact_content).'</div>';
            $out .= ($align == 'horizontal') ? '</div>' : '';
        $out .= '</article>';
        return $out;
    }
    static function license_data($post) {
        $out = '';
        $out .= '<article class="hentry entry-data">';
            $out .= '<header class="entry-content">';
                if (!empty($post->license_number)) {
                    $out .= '<div class="number-container">';
                        $out .= '<span class="number">'.$post->license_number.'</span>';
                        $out .= '<span class="legend">'.$post->license_number_description.'</span>';
                    $out .= '</div>';
                }
                if (!empty($post->license_content)) {
                    $out .= '<div class="entry-summary">';
                        $out .= apply_filters('the_content',$post->license_content);
                    $out .= '</div>';
                }
            $out .= '</header>';
            if (!empty($post->license_embed_code)) {
                $out .= '<div class="chart-embed">';
                    $out .= $post->license_embed_code;
                $out .= '</div>';
            }
        $out .= '</article>';
        return $out;
    }
    static function platform($post) {
        $out = '';
        $out .= '<article class="hentry entry-platform" data-equalizer-watch>';
            $out .= '<figure class="entry-logo">'.wp_get_attachment_image($post->platform_logo, 'platform-logo').'</figure>';
            $out .= '<div class="entry-summary">'.$post->platform_number.'</div>';
        $out .= '</article>';
        return $out;
    }
    static function financial_tab($post, $active=false) {
        $active_class = ($active) ? ' is-active' : '';
        $out = '';
        $out .= '<li class="tabs-title'.$active_class.'"><a href="#'.$post->post_name.'" aria-selected="true">'.get_the_title($post->ID).'</a></li>';
        return $out;
    }
    static function financial_tab_content($post, $active=false) {
        $active_class = ($active) ? ' is-active' : '';
        $out = '';
        $out .= '<div class="tabs-panel'.$active_class.'" id="'.$post->post_name.'">';
            $out .= $post->financial_embed_code;
        $out .= '</div>';
        return $out;
    }
}