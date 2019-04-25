<?php 
    get_header();
    global $_set, $post;
    $current_report = $post;
    if (!empty($current_report)):
?>
<section class="main-content">
    <section class="main-feature">
        <?php 
            if (!empty($current_report->report_background)) {
                echo wp_get_attachment_image($current_report->report_background, 'feature-full');
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
            <section class="front-welcome">
                <div class="grid-container white-background">
                    <div class="grid-x grid-padding-x page-container">
                        <div class="cell large-2">
                            <?php if (has_post_thumbnail($page->ID)):
                                    echo '<div class="page-image">';
                                        echo get_the_post_thumbnail($page->ID, 'squared');
                                    echo '</div>';
                                endif;
                            ?>
                        </div>
                        <div class="cell large-10">
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
            
            $highlights = front::get_highlights(-1,$current_report->report_highlights_tag);
            if (!empty($highlights)):
        ?>
            <section class="front-highlights section-container background-gray-light">
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
        $impact_items = front::get_impact_numbers(-1,$current_report->report_impact_tag);
        if (!empty($impact_items)):
     ?>
            <section class="front-imapct section-container">
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
            <section class="front-licenses section-container background-gray-light">
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
        $platform_items = front::get_platforms(8,$current_report->report_platform_tag);
        if (!empty($platform_items)):
     ?>
        <section class="front-platform section-container">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-12">
                        <h2 class="section-label"><?php echo pll__('Major platforms sharing CC work'); ?></h2>
                        <div class="entries-list platform-list grid-x grid-padding-x large-up-4 small-up-2" data-equalizer data-equalize-on="medium">
                            <?php 
                                foreach ($platform_items as $item) {
                                    echo '<div class="cell">';
                                        echo render::platform($item);
                                    echo '</div>';
                                }
                            ?>
                        </div>
                        <div class="more-button text-center inner-space">
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
            <section class="front-financial section-container background-gray-light">
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
        <section class="front-thankyou section-container">
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