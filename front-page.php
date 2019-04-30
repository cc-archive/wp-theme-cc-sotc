<?php 
    get_header();
    global $_set;
    $settings = $_set->settings;
    $current_report_id = (!empty($settings['current-report'])) ? $settings['current-report'] : '';
    $current_report = (!empty($current_report_id)) ? get_post($current_report_id) : null;
    $highlight_entries = (!empty($settings['highlight_entries'])) ? $settings['highlight_entries'] : -1;
    $impact_entries = (!empty($settings['impact_entries'])) ? $settings['impact_entries'] : -1;
    $platform_entries = (!empty($settings['platform_entries'])) ? $settings['platform_entries'] : 4;
    if (!empty($current_report)):
?>
<section class="main-content">
    <section class="main-feature">
        <?php 
            if (!empty($current_report->report_background) && (empty($current_report->report_background))) {
                echo '<div class="feature-image">';
                    echo wp_get_attachment_image($current_report->report_background, 'feature-full');
                echo '</div>';
            } else if (!empty($current_report->report_background_video)) {
                $video_url = wp_get_attachment_url( $current_report->report_background_video );
                echo '<div class="feature-video">';
                    echo '<video class="featured-video-element" id="main-video" loop muted autoplay>';
                        echo '<source src="'.$video_url.'" type="video/webm; codecs=vp8,vorbis">';
                    echo '</video>';
                echo '</div>';
            }
        ?>
        
        <div class="content-wrap">
            <div class="feature-content">
                <div class="year-container">
                    <span class="year"><?php echo $current_report->report_year; ?></span>
                    <span class="title">State <br> of the <br> commons</span>
                </div>
                <span class="subtitle"><?php echo $current_report->report_subtitle; ?></span>
            </div>
        </div>
    </section>
    <?php 
        if (!empty($current_report->report_welcome_page)) :
            $page = get_post($current_report->report_welcome_page);
            $content = get_extended($page->post_content);
        ?>
            <a name="welcome"></a>
            <section class="front-welcome" id="welcome">
                <div class="grid-container white-background">
                    <div class="grid-x grid-padding-x page-container">
                        <div class="cell large-2 small-12">
                            <?php if (has_post_thumbnail($page->ID)):
                                    echo '<div class="page-image">';
                                        echo get_the_post_thumbnail($page->ID, 'squared');
                                    echo '</div>';
                                endif;
                            ?>
                        </div>
                        <div class="cell large-10 small-12">
                            <div class="page-content">
                                <span class="comma">&rdquo;</span>
                                <?php 
                                    echo apply_filters('the_content', $content['main']);
                                    if (!empty($content['extended'])) {
                                        echo '<a href="#more" data-replace-text="'.pll__('View less').'" class="entry-more">'.pll__('View more').' <span class="dashicons dashicons-arrow-right-alt"></span></a>';
                                        echo '<div class="more-content">'.apply_filters('the_content',$content['extended']).'</div>';
                                    }
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php 
        if (!empty($current_report->report_highlights_tag)):
            $highlights = front::get_highlights($highlight_entries,$current_report->report_highlights_tag);
            if (!empty($highlights)):
        ?>
            <a name="highlight"></a>
            <section class="front-highlights section-container background-gray-light" id="highlight" data-magellan-target="highlight" data-offset="45">
                <div class="grid-container">
                    <div class="grid-x">
                        <div class="cell large-12">
                            <h2 class="section-label"><?php echo pll__('Highlights') ?></h2>
                            <div class="entries-list higlight-list cssgrid-container total-cols-2">
                                <?php 
                                    $x = 0;
                                    foreach ($highlights as $highlight) {
                                        $container_class = ($x == 0) ? ' use-2-cols' : '';
                                        echo render::highlight($highlight, $container_class);
                                        $x++;
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
    <?php 
    if (!empty($current_report->report_impact_tag)):
        $impact_items = front::get_impact_numbers($impact_entries,$current_report->report_impact_tag);
        if (!empty($impact_items)):
     ?>
            <a name="impact"></a>
            <section class="front-imapct section-container" id="impact" data-magellan-target="impact">
                <div class="grid-container">
                    <div class="grid-x">
                        <div class="cell large-12">
                            <h2 class="section-label"><?php echo pll__('Our impact by the numbers'); ?></h2>
                            <div class="entries-list impact-list cssgrid-container total-cols-3">
                            <?php 
                                $x = 0;
                                foreach ( $impact_items as $impact ) {
                                    $container_class = '';
                                    $align = 'vertical';
                                    switch ($x) {
                                        case 0:
                                            $container_class = ' use-2-rows';
                                            break;
                                        case 1:
                                            $container_class = ' use-2-cols';
                                            $align = 'horizontal';
                                        break;                                        
                                    }
                                    echo render::impact($impact, $container_class, $align);
                                    $x++;
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
     <?php
     if (!empty($current_report->report_data_tag)):
        $licenses_items = front::get_license_data(1,$current_report->report_data_tag);
        if (!empty($licenses_items)):
     ?>
            <a name="license"></a>
            <section class="front-licenses section-container background-gray-light" id="license" data-magellan-target="license">
                <div class="grid-container">
                    <div class="grid-x">
                        <div class="cell large-12">
                            <h2 class="section-label"><?php echo pll__('The data'); ?></h2>
                            <div class="entries-list data-list">
                                <?php
                                    foreach ($licenses_items as $item) {
                                        echo render::license_data($item);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
    <?php 
    if (!empty($current_report->report_platform_tag)):
        $platform_items = front::get_platforms($platform_entries,$current_report->report_platform_tag);
        if (!empty($platform_items)):
     ?>
        <a name="platform"></a>
        <section class="front-platform section-container" id="platform" data-magellan-target="platform">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-12">
                        <h2 class="section-label"><?php echo pll__('Major platforms sharing CC work'); ?></h2>
                        <div class="entries-list platform-list grid-x grid-padding-x large-up-4 small-up-2" data-equalizer>
                            <?php 
                                foreach ($platform_items as $item) {
                                    echo '<div class="cell">';
                                        echo render::platform($item);
                                    echo '</div>';
                                }
                            ?>
                        </div>
                        <div class="more-button text-center inner-space" data-size="<?php echo $platform_entries ?>" data-loading-text="<?php echo pll__('Loading...') ?>" data-year="<?php echo $current_report->report_platform_tag ?>" data-offset="<?php echo $platform_entries ?>">
                            <a href="#more" class="button hollow primary more-platforms"><?php echo pll__('View more'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>
     <?php 
     if (!empty($current_report->report_financial_tag)):
        $financial_items = front::get_financial_data(-1,$current_report->report_financial_tag);
        if (!empty($financial_items)):
     ?>
            <a name="financial"></a>
            <section class="front-financial section-container background-gray-light" id="financial" data-magellan-target="financial">
                <div class="grid-container">
                    <div class="grid-x">
                        <div class="cell large-12">
                            <h2 class="section-label"><?php echo pll__('Financials'); ?></h2>
                            <div class="entries-list financial-list">
                                <ul class="tabs" data-tabs id="financial-tabs">
                                <?php
                                    $x = 0;
                                    foreach ($financial_items as $item) {
                                        $active = ($x == 0) ? true : false;
                                        echo render::financial_tab($item, $active);
                                        $x++;
                                    }
                                ?>
                                </ul>
                                <div class="tabs-content" data-tabs-content="financial-tabs">
                                <?php
                                        $x = 0;
                                        foreach ($financial_items as $item) {
                                            $active = ($x == 0) ? true : false;
                                            echo render::financial_tab_content($item, $active);
                                            $x++;
                                        }
                                    ?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
    <?php 
    if (!empty($current_report->report_thanks_page)) :
        $page_thankyou = get_post($current_report->report_thanks_page);
    ?>
        <a name="thanks"></a>
        <section class="front-thankyou section-container" id="thanks" data-magellan-target="thanks">
            <div class="grid-container">
                <div class="grid-x grid-padding-x page-container">
                    <div class="large-12 cell">
                        <h2 class="section-label"><?php echo get_the_title($page_thankyou->ID); ?></h2>
                        <?php 
                        echo apply_filters('the_content', $page_thankyou->post_content);
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</section>
<?php else: ?>
<div class="grid-container">
    <div class="grid-x">
        <div class="large-12 cell">
            <div class="callout warning">
                <h5>No report selected</h5>
                <p>You must select the current year report in the admin ( Dashboard > Custom settings )</p>
            </div>
        </div>
    </div>  
</div>
<?php endif; ?>
<?php get_footer(); ?>