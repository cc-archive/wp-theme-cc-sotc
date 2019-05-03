<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title('|') ?></title>
	<?php wp_head(); ?>
</head>
<?php 
	//get main settings 
	global $_set;
	$settings = $_set->settings;
 ?>
<body <?php body_class(); ?>>
<!-- MENU MOBILE -->
<div class="show-for-small-only mobile-nav primary gradient-blue">
    <div class="grid-container">
        <div class="grid-x align-justify">
            <div class="cell small-8">
            <a href="<?php bloginfo('url') ?>">
                <div class="mobile-logo"></div>
            </a>
            </div>
            <div class="cell small-1">
                <a href="#" class="mobile-nav-open"><span class="dashicons dashicons-menu"></span></a>
            </div>
        </div>
    </div>
</div>
<div class="menu-mobile-container closed">
    <a class="close" href="#"><span class="dashicons dashicons-no"></span></span></a>
    <?php 
          $args = array(
              'theme_location' => 'main-menu-mobile',
              'container' => '',
              'depth' => 2,
              'fallback_cb' => false,
              'items_wrap' => '<ul id = "%1$s" class = "menu vertical %2$s" data-magellan>%3$s</ul>'
              );

          wp_nav_menu( $args );
     ?>
</div>
<header class="main-header-sticky hide-for-small-only">
	<div class="grid-container gradient-blue">
		<div class="grid-x grid-padding-x navigation hide-for-small-only">
			<div class="cell large-3 medium-2 columns mini-logo">
				<a href="<?php bloginfo('url') ?>"><h1 class="site-title"><?php bloginfo('name') ?></h1><span class="tagline">State of the commons</span></a>
			</div>
			<div class="cell large-9 medium-10 columns nav">
				<nav class="main-navigation">
						<?php 
						$args = array(
							'theme_location' => 'main-menu',
							'container' => '',
							'fallback_cb' => false,
							'items_wrap' => '<ul id = "%1$s" class = "menu %2$s" data-magellan>%3$s</ul>'
							);

						wp_nav_menu( $args );
						?>
				</nav>
			</div>
		</div>
	</div>
</header>
<header class="main-header hide-for-small-only">
	<div class="grid-container gradient-blue">
		<div class="grid-x grid-padding-x navigation hide-for-small-only">
			<div class="cell large-3 columns logo">
				<a href="<?php bloginfo('url') ?>"><h1 class="site-title"><?php bloginfo('name') ?></h1><span class="tagline">State of the commons</span></a>
			</div>
			<div class="cell large-9 columns nav">
				
				<nav class="main-navigation">
						<?php 
						$args = array(
							'theme_location' => 'main-menu',
							'container' => '',
							'fallback_cb' => false,
							'items_wrap' => '<ul id = "%1$s" class = "menu %2$s" data-magellan>%3$s</ul>'
							);

						wp_nav_menu( $args );
						?>
				</nav>
			</div>
		</div>
	</div>
</header>