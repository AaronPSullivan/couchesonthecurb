/**
 * File main.js.
 *
 *
 */

(function($) {

/**
 * Masonry
 * Ajax load more complete
 */    
var initWelcome = false;
$.fn.almComplete = function(alm){
    console.log("Ajax Load More Complete!");
      
   
    var p = $('#ajax-load-more .alm-listing'); p = p[0];
    var g = $('.grid');
   
    
    
     if (!initWelcome) { // only on the first load
        console.log('First load');
        
       // append images before init masonry
        $(p).children().each(function() {
            $(this).detach().appendTo(g);
        });
         
        // Duplicate the welcome message for non-mobile and move into correct position
        $('.dw-pnl-welcome').each(function() {
            var l = $(this).data('welcome-pos'); //location
        
            var t = $(g).children().eq(l+2); //target. +2 to move past the mobile and grid size containers for masonry
            
            $(this).toggleClass('no-fade');
            $(this).clone().toggleClass('not-mobile').insertBefore(t); 
            $(this).toggleClass('only-mobile'); // mobile is always first, so no need to move it. 
        });
        
        initWelcome = true;
        
        $grid =  $('.grid').masonry({
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer',
            itemSelector: '.grid-item',
            percentPosition: true,
            horizontalOrder: true
        });
    } else {
        var $n =  $(p).children();
        $n.each(function() {
            $(this).detach();
        });
        $grid.append( $n ).masonry( 'appended', $n );
    }
    
    
       $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        }); 

    
  };


    
/**
 * Menu click functions
 */
$('#main-sidebar .widget-title, #main-sidebar .widget_subscriber_widget h5').click(function() {
    $(this).parent().toggleClass('active');

});


/**
 * JavaScript Get URL Parameter
 * 
 * @param String prop The specific URL parameter you want to retreive the value for
 * @return String|Object If prop is provided a string value is returned, otherwise an object of all properties is returned
 */
function getUrlParams( prop ) {
    var params = {};
    var search = decodeURIComponent( window.location.href.slice( window.location.href.indexOf( '?' ) + 1 ) );
    var definitions = search.split( '&' );

    definitions.forEach( function( val, key ) {
        var parts = val.split( '=', 2 );
        params[ parts[ 0 ] ] = parts[ 1 ];
    } );

    return ( prop && prop in params ) ? params[ prop ] : '';//params;
}

 /**
 * rating highlight current (only works if just one rating is provided in the URL Params)
 */

$sort_rating = getUrlParams('rating');
console.log($sort_rating)
if ($sort_rating) {
        $('.widget_ratings li:nth-child('+$sort_rating+')').each(function(){
    
        $(this).addClass('current-cat');



    });
}


/**
 * Sets or removes .focus class on an element.
 */
function toggleFocus() {
    var self = this;

    // Move up through the ancestors of the current link until we hit .nav-menu.
    while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

        // On li elements toggle the class .focus.
        if ( 'li' === self.tagName.toLowerCase() ) {
            if ( -1 !== self.className.indexOf( 'focus' ) ) {
                self.className = self.className.replace( ' focus', '' );
            } else {
                self.className += ' focus';
            }
        }

        self = self.parentElement;
    }
}

 /**
 * Scrolling animation
 */

// Scrolling animation
 htmlbody = $('html,body');
function goToByScroll(theId) {
    //var offsetTop = $('nav').outerHeight()*2; // *2 to allow for stickynav
   //console.log($(theId));
    htmlbody.animate({
        scrollTop: $(theId).offset().top
    }, 1000, 'easeInOutQuint');
}

  /**
 * Scale menu to fit screen
 */
function updateHeader() {
   if (window.innerWidth > 767) { //  grid-breakpoint3
       $('#main-sidebar').height(window.innerHeight);
   } else {
       $('#main-sidebar').height('auto');
   }

}
updateHeader();
window.addEventListener("resize", updateHeader);
    
    
    
})(jQuery);