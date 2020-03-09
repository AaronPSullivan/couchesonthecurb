<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package couchcurb
 */

$content_settings = get_option( 'content_settings' );
$nav_image = wp_get_attachment_image_src($content_settings[nav_image] ,'post-image-full');
$nav_image = $nav_image[0];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri (); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri (); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri (); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri (); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri (); ?>/safari-pinned-tab.svg" color="#ae8b6a">
    <meta name="msapplication-TileColor" content="#ae8b6a">
    <meta name="theme-color" content="#ffffff">
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'couchcurb' ); ?></a>

	<header id="main-sidebar" class="site-header" style="background: url(<?php echo $nav_image; ?>) no-repeat center center; background-size: cover;">
		<div class="main-sidebar-tr">
            <div class="site-branding main-sidebar-td">
                <?php
                the_custom_logo();
                ?>
                <a href="<?php echo site_url(); ?>" class="couches-logo-container"><img id="m-sb-t-logo" class="couches-logo  only-mobile" src="<?php echo get_template_directory_uri(); ?>/images/Couches-Logo.png" alt="Couches on the Curb Logo"></a>
                 <div class="the-blog-info only-mobile"><?php bloginfo( 'description' ); ?></div>
                <?php
                $couchcurb_description = get_bloginfo( 'description', 'display' );
                if ( $couchcurb_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $couchcurb_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->
        </div>
        <div class="main-sidebar-tr">
            <nav id="site-navigation" class="main-navigation main-sidebar-td<?php if ($_GET[ 'rating' ]) echo ' show-browse show-sort'; ?>">
                <!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'couchcurb' ); ?></button>-->
               
                <?php get_sidebar(); ?>
                 <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ) );
                
                //echo '<h3 class="share-h">Spread the love:</h3>'.do_shortcode('[Sassy_Social_Share style="background-color:#000;"]') ;
                ?>
            </nav><!-- #site-navigation -->
        </div>
       
         <div class="main-sidebar-tr footer-container">
            <div id="" class="main-sidebar-td ">
               
                <footer id="colophon" class="site-footer side-bar-footer">
                    <a href="<?php echo site_url(); ?>" class="couches-logo-container"><img id="m-sb-b-logo" class="couches-logo" src="<?php echo get_template_directory_uri(); ?>/images/Couches-Logo.png" alt="Couches on the Curb Logo"></a>
                    <div class="the-blog-info"><?php bloginfo( 'description' ); ?></div>
                </footer><!-- #colophon -->

            </div>
        </div>
        
	</header><!-- #masthead -->

	<div id="content" class="site-content">
