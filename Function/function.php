<?php

function oceanwp_child_enqueue_parent_style() {
     wp_enqueue_style( 'child-animate', get_stylesheet_directory_uri() . '/inc/animate.min.css' );
     wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), rand(111,999) );

     wp_enqueue_script( 'child-wow', get_stylesheet_directory_uri() . '/inc/wow.min.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


function custom_add_scripts_in_footer(){
    ?>
    <script>
     new WOW({
         animateClass: 'animate__animated',
          offset: 0 
     }).init();

    jQuery(document).ready(function(){  
            // Project Filter SlideToggle
            jQuery('.cll-project-filter-trigger-text').click(function() {
            jQuery('.cll-project-filter-trigger-box').slideToggle('fast');
            jQuery('.cll-project-filter-wrapper').toggleClass('filter_expand');
            jQuery(this).find('.text').text( jQuery(this).find('.text').text() == 'Search Our Projects' ? "Close Filters" : "Search Our Projects");
        });

    });

     (function($) {
        document.addEventListener('facetwp-loaded', function() {
             if(!$(".cll-project-filter-item.r0").length){
                   $( '<div class="cll-project-filter-item r0"></div>' ).prependTo( ".cll-project-filter-section" );
              }
             $('.cll-project-filter-section').vcwaypoint(function(){
                 $(".cll-project-filter-section .cll-project-filter-item:not([style*=opacity])").each(function(i) {
                     if (window.matchMedia('(max-width: 767px)').matches) {
                         $(this).delay((i++) * 500).fadeTo(700, 1); 
                     } else {
                         $(this).delay((i++) * 500).fadeTo(1000, 1); 
                     }
                 })
             }, {
            offset: "85%"
        });
     });
    })(jQuery);


  </script>
    <?php
    }
add_action('wp_footer', 'custom_add_scripts_in_footer', 100);


