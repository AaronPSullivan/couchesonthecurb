<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package couchcurb
 */


get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
                //echo post_type_archive_title( '', false );
                echo '<h1 class="page-title">Category: '.str_replace("Category: ", "", get_the_archive_title()).'<a class="archive-close" href="'.site_url().'"><i class="fa fa-times" aria-hidden="true"></i></a></h1>';

				//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
            
            ?> <div class="dw"> <?php
			while ( have_posts() ) :
				the_post();

			
                
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
            ?> </div> <!-- class="dw" --> <?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
         <?php if ( have_posts() ) :
            the_posts_navigation();
        endif; ?>
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
