<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package couchcurb
 */
if (!is_singular() && !has_post_thumbnail()) return; // don't show posts without a featured image

$thumb[id] = get_post_thumbnail_id();
$thumb[img] = wp_get_attachment_image($thumb[id], 'post-image-mobile');
$rating = get_field('rating');
$location = get_field('location');
$post_date = get_the_date( ' F j, Y' ); 

?>

<?php  if ( is_singular() ) : ?>
    <div id="modal-ready">
        
 <?php else : ?>      
        <!--<div class="dw-pnl dw-pnl--pls">
          <div class="dw-pnl__cntnt">-->
           <div class="grid-item">
    <div class="grid-item-ctnr">
       

 <?php endif; //if ( is_singular() ) ?>


        <?php  if ( is_singular() ) : ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
            <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                if ( 'post' === get_post_type() ) :
                    ?>
                    <div class="entry-meta">
                        <?php
                         if ($rating) {
                             //echo '<h2 class="meta-rating">Rating: <span>'.$rating.'</span></h2>';
                             $r = '<h2 class="meta-rating">Rating: ';
                             $r .= sprintf(
                                    /* translators: Only visible to screen readers */
                                    __( '<span class="screen-reader-text">%s</span>', 'couchcurb' )
                                ,
                                $rating   );
                             
                             for ($i; $i < $rating ; $i++) {
                                $r .= '<span class="rating rating-on"></span>';
                             }
                             for ($i = $i; $i < 5 ; $i++) {
                                $r .= '<span class="rating rating-off"></span>';
                             }
                             $r .= '</h2>';
                             echo $r;
                         }
                        if ($post_date) echo '<h2 class="posted-on">Date kicked to the curb: <span>'.$post_date.'</span></h2>';
                          if ($location) echo '<h2 class="meta-location">Location: <span>'.$location.'</span></h2>';

                        //couchcurb_posted_on();
                        //couchcurb_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; 
            ?>
        </header><!-- .entry-header -->
             <?php endif; //if ( is_singular() ) ?>


           <?php 

           if ( is_singular() ) :
                //couchcurb_post_thumbnail(); 
                echo '<div class="post-thumb-container">';    
                the_post_thumbnail('post-image-full'); 
                echo '</div>';
                the_content();
                //echo '<h3 class="share-h">Share or Subscribe:</h3>'.do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]');
            else :

                echo '<a href="'.get_permalink().'" class="modal-link" >';
                echo $thumb[img]; //'<img src="'.$thumb[url].'" alt="">';
                //the_post_thumbnail();
                echo '</a>';    
            endif; 





        ?>
        <?php  if ( is_singular() ) : ?>
    </article><!-- #post-<?php the_ID(); ?> -->
     <?php endif; //if ( is_singular() ) ?>
    <?php  if ( !is_singular() ) : ?>


              <!--<div class="dw-pnl__table"><div><div>Test</div></div></div>-->
            <!--</div>-->
          </div>
        </div>  

     <?php endif; //if ( !is_singular() ) ?>
<?php  if ( is_singular() ) : ?>
</div> <!--<div id="modal-ready"> -->
 <?php endif; //if ( is_singular() ) ?>


