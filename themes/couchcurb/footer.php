<?php
/**
 * The template for displaying the footer 
 * NOTE: The page 'footer' on mobile is displayed here but is hidden on desktop. header.php contains the 'footer' that appears in the sidebar on desktop
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package couchcurb
 */

?>

	</div><!-- #content -->

	 <footer id="mobile-footer" class="site-footer mobile-footer only-mobile">
        <div class="site-info">
            <?php /*<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'couchcurb' ) ); ?>">
                <?php

                printf( esc_html__( 'Proudly powered by %s', 'couchcurb' ), 'WordPress' );
                ?>
            </a>
            <span class="sep"> | </span>
                <?php
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'couchcurb' ), 'couchcurb', '<a href="http://www.extracreditprojects.com">Extra Credit Projects</a>' );
                ?> */ ?>
            <a href="<?php echo site_url(); ?>" class="couches-logo-container"><img class="couches-logo" src="<?php echo get_template_directory_uri(); ?>/images/Couches-Logo.png" alt="Couches on the Curb Logo"></a>
              <div class="the-blog-info only-mobile"><?php bloginfo( 'description' ); ?></div>

        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
