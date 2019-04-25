    <footer class="main-footer background-dark-gray">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-justify">
                <div class="large-3 cell">
                    <img src="<?php bloginfo('template_directory') ?>/assets/img/cc.logo.white.svg" alt="">
                </div>
                <div class="large-5 cell">
                    <div class="footer-info">
                        <?php 
                            global $_set;
                            $settings = $_set->settings;
                            echo apply_filters('the_content', $settings['footer-content']);
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>