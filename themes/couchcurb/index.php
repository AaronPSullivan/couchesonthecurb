<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package couchcurb
 */
$content_settings = get_option( 'content_settings' );
$welcome_page['id'] = $content_settings[welcome_page];
$welcome_page['position'] = $content_settings[welcome_position]; 
if (!$welcome_page['position']) $welcome_page['position'] = 3;
$welcome_page['post'] = get_post( $welcome_page['id'] );
$welcome_page['title'] = $welcome_page['post']->post_title;
$welcome_page['content'] = get_post_field( 'post_content', $welcome_page['id'] );
$welcome_page['content_parts'] = get_extended( $welcome_page['content'] );
$welcome_page['content_main']  = $welcome_page['content_parts']['main']; //content before <!--more-->

if ($_GET[ 'rating' ]) $ratings = explode(',', $_GET[ 'rating' ]);

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
            if ($ratings) : ?>
                 <header class="page-header">
                    <?php
                  
                    echo '<h1 class="page-title">Rating'.((count($ratings) > 1) ? 's' : '').': ';
                    
                     $comma_linked = '';
                     $i = 0;
                    foreach ($ratings as $key=>$r) {
                         if ($i > 0) $comma_linked .= ', ';
                         $comma_linked .= '<a class="title-rating" href="'.site_url().'?rating='.(int)$r.'">'.(int)$r.'</a>';
                         $i++;
                    }
                     
                    echo $comma_linked;
                    
                    echo '<a class="archive-close" href="'.site_url().'"><i class="fa fa-times" aria-hidden="true"></i></a></h1>';

                
                    ?>
                </header><!-- .page-header -->

            
            <?php endif; //($ratings)
           
            
            //echo "welcome_page['position'] = ".$welcome_page['position'];
           // print_r($content_settings);
		if ( have_posts() ) :
           
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
            
			endif;

			/* Start the Loop */
            
            ?> <div class="dw grid"><div class="grid-sizer"></div><div class="gutter-sizer"></div><?php
            $i = 1;
			/*while ( have_posts() ) :
				the_post();

			
                if ($i == $welcome_page['position'] || $i == 1) { ?>
                    <div class="dw-pnl <?php echo ($i == 1) ? 'only-mobile' : 'not-mobile';?>">
                      <div class="dw-pnl__cntnt dw-welcome bg--white tx--white">
                                  
                                  <article id="page-<?php echo $welcome_page['id']; ?>">

                                    <header class="entry-header">
                                        <?php
                                            echo '<h1 class="page-title">'.$welcome_page['title'].'</h1>';
                                           
                                        ?>
                                    </header><!-- .entry-header -->
                                      
                                  <?php 
                              
                                    // Output part before <!--more--> tag
                                    echo $welcome_page['content_main'];
                              
                              ?>
                                   
                          </article>
                      </div>
                    </div>
                    <?php 
                    //$i++; 
                }
				get_template_part( 'template-parts/content', get_post_type() );
                $i++;
			endwhile;
            */ 
            /*while (have_posts()) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;*/
            
            ?>
                <div class="grid-item dw-pnl dw-pnl-welcome no-fade" data-welcome-pos="<?php echo $welcome_page['position']; ?>">
                  <div class="grid-item-ctnr dw-pnl__cntnt dw-welcome bg--white tx--white">

                              <article id="page-<?php echo $welcome_page['id']; ?>">

                                <header class="entry-header">
                                    <?php
                                        echo '<h1 class="page-title">'.$welcome_page['title'].'</h1>';

                                    ?>
                                </header><!-- .entry-header -->

                              <?php 

                                // Output part before <!--more--> tag
                                echo $welcome_page['content_main'];

                          ?>

                      </article>
                  </div>
                </div>
                
            
            
            </div> <!-- class="dw grid" --> <?php
         
        

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
            
            //if (wp_count_posts()->publish > get_option( 'posts_per_page' )) echo do_shortcode('[ajax_load_more post_type="post" posts_per_page="'.get_option( 'posts_per_page' ).'" offset="'.get_option( 'posts_per_page' ).'" scroll_container="#main" transition_container="false" button_label="View More" button_loading_label="Loading More"]'); // only show "load more" if there are more posts to load
            
            
            
            
            if (wp_count_posts()->publish > get_option( 'posts_per_page' )) {
                $s = '[ajax_load_more post_type="post" posts_per_page="'.get_option( 'posts_per_page' ).'" scroll_container="#main" transition_container="false" button_label="View More" button_loading_label="Fetching Couches"';
                
                if ($ratings) {
                    $rs;
                    foreach ($ratings as $key=>$r) {
                         if ($i > 0) $comma_linked .= ', ';
                         $rs .= (int)$r;
                         $i++;
                    }
                    $s .= ' meta_key="rating" meta_value="'.$rs.'" meta_compare="IN" meta_type="NUMERIC"';
                    
                }
                
                $s .= ']';
                //echo $s;
                
                
               echo do_shortcode($s); // only show "load more" if there are more posts to load
            
            }
            
            
            
            echo '<h3 class="share-h">Spread the love:</h3>'.do_shortcode('[Sassy_Social_Share style="background-color:#000;"]') ;
		?>
            
		</main><!-- #main -->
        <?php if ( have_posts() ) :
            //the_posts_navigation();
        endif; ?>
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
