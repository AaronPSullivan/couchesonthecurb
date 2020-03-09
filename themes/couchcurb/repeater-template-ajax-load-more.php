<?php
/*
 *  This file is not used by the template. It is a backup of the code for Ajax Load More
 *  to use for the Repeater Template
 */



/*
 *  Flex box
 */

?>
<div class="dw-pnl dw-pnl--pls">
    <div class="dw-pnl__cntnt">
        <?php 
        $thumb[id] = get_post_thumbnail_id();
        $thumb[img] = wp_get_attachment_image($thumb[id], 'post-image-mobile');

        echo '<a href="'.get_permalink().'" class="modal-link" >';
        echo $thumb[img]; 
        echo '</a>';  ?>  
    </div>
</div>



<?php
/*
 * Masonry
 */




<div class="grid-item">
    <div class="grid-item-ctnr">
        <?php 
        $thumb[id] = get_post_thumbnail_id();
        $thumb[img] = wp_get_attachment_image($thumb[id], 'post-image-mobile');

        echo '<a href="'.get_permalink().'" class="modal-link" >';
        echo $thumb[img]; 
        echo '</a>';  ?>  
    </div>
</div>