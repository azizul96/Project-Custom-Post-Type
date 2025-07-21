<?php
//Register a custom post type called "Project"
function project_post_type_init() {
    $labels = array(
        'name'                  => __( 'Projects', 'oceanwp' ),
        'singular_name'         => __( 'Project', 'oceanwp' ),
        'menu_name'             => __( 'Projects', 'oceanwp' ),
        'name_admin_bar'        => __( 'Project', 'oceanwp' ),
        'add_new'               => __( 'Add New', 'oceanwp' ),
        'add_new_item'          => __( 'Add New Project', 'oceanwp' ),
        'new_item'              => __( 'New Project', 'oceanwp' ),
        'edit_item'             => __( 'Edit Project', 'oceanwp' ),
        'view_item'             => __( 'View Project', 'oceanwp' ),
        'all_items'             => __( 'All Projects', 'oceanwp' ),
        'search_items'          => __( 'Search Projects', 'oceanwp' ),
        'parent_item_colon'     => __( 'Parent Projects:', 'oceanwp' ),
        'not_found'             => __( 'No Projects found.', 'oceanwp' ),
        'not_found_in_trash'    => __( 'No Projects found in Trash.', 'oceanwp' ),
        'featured_image'        => __( 'Project Featured Image', 'oceanwp' ),
        'set_featured_image'    => __( 'Set Featured image', 'oceanwp' ),
        'remove_featured_image' => __( 'Remove Featured image', 'oceanwp' ),
        'use_featured_image'    => __( 'Use as Featured image', 'oceanwp' ),
        'archives'              => __( 'Project archives', 'oceanwp' ),
        'insert_into_item'      => __( 'Insert into Project', 'oceanwp' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Project', 'oceanwp' ),
        'filter_items_list'     => __( 'Filter Projects list', 'oceanwp' ),
        'items_list_navigation' => __( 'Projects list navigation', 'oceanwp' ),
        'items_list'            => __( 'Projects list', 'oceanwp' ),
    );
 
     $rewrite = array(
          'slug'                  => 'projects',
          'with_front'            => true,
          'pages'                 => true,
          'feeds'                 => true,
     );
     $args = array(
          'label'                 => __( 'Projects', 'oceanwp' ),
          'labels'                => $labels,
          'hierarchical'          => false,
          'public'                => true,
          'show_ui'               => true,
          'show_in_menu'          => true,
          'menu_position'      => 25,
        'menu_icon'          => 'dashicons-portfolio',
          'show_in_admin_bar'     => true,
          'show_in_nav_menus'     => true,
          'can_export'            => true,
          'has_archive'           => true,
          'exclude_from_search'   => false,
          'publicly_queryable'    => true,
          'rewrite'               => $rewrite,
          'capability_type'       => 'page',
          'supports'           => array( 'title', 'thumbnail' ),
        'taxonomies'         => array( 'project_date', 'project_location', 'project_size', 'project_sector' ),
     );
 
    register_post_type( 'cll_project', $args );
}
add_action( 'init', 'project_post_type_init' );


//[cll_project]
function cll_project_custom_shortcode( $atts ){
     extract( shortcode_atts(
        array(
            'item' => '11',
        ), $atts )
    );
    ob_start();
    $args = array(
        'post_type' => 'cll_project',
        'orderby' => 'date',
        'posts_per_page' => $item,
    );
    $query = new WP_Query( $args );?>
          <div class="cll-project-filter-wrapper">
               <div class="cll-project-filter-inner">
                    <div class="cll-project-filter-trigger-text"><span class="text">Search Our Projects</span> <span class="icon"></span></div>
                    <div class="cll-project-filter-trigger-box">
                         <?php echo do_shortcode('[facetwp facet="projects_date_filter"][facetwp facet="project_plant_equipment"][facetwp facet="projects_services_filter"]'); ?>
                         <div class="cll-project-filter-buttons">
                              <button onclick="FWP.reset()">RESET</button>
                              <a href="<?php esc_url(home_url()); ?>/project">SHOW ALL</a>
                         </div>
                    </div>
               </div>
          </div>    

               <?php
    // The Loop
    if ( $query->have_posts() ) { ?>

          <div class="cll-project-filter-section">
          <?php 
          while ( $query->have_posts() ) {
            $query->the_post();?>
                              <div class="cll-project-filter-item">
                                   <div class="cll-project-filter-item-inner">
                                        <div class="cll-project-filter-item-thumb" >
                                                  <div class="cll-project-filter-item-img">
                                                       <a href="<?php the_permalink( ); ?>"><?php the_post_thumbnail('full'); ?></a>
                                                  </div>
                                        </div>
                                        <div class="cll-project-filter-item-content" >
                                             <?php 
                                             $project_location = get_field('project_location');
                                             if (!empty($project_location)): ?>
                                                  <div class="cll-project-filter-item-location">
                                                       <?php the_field('project_location'); ?>
                                                  </div>
                                             <?php endif; ?>

                                             <div class="cll-project-filter-item-title" >
                                                  <h3><a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a></h3>
                                             </div>

                                             <div class="cll-project-filter-item-meta-info">
                                                  <ul>
                                                       <?php if( have_rows('project_details_meta_option') ): ?>
                                                            <?php while( have_rows('project_details_meta_option') ): the_row(); 
                                                                 $project_details_meta_option_label = get_sub_field('project_details_meta_option_label');
                                                                 $project_details_meta_option_value = get_sub_field('project_details_meta_option_value');
                                                                 ?>
                                                                 <li><span><?php echo $project_details_meta_option_label; ?></span>
                                                                      <?php 
                                                                           $project_details_services_split = explode('|', $project_details_meta_option_value);
                                                                      ?>
                                                                      <?php foreach ($project_details_services_split as $project_details_services_split_item): ?>
                                                                           <?php echo $project_details_services_split_item . '<br/>'; ?>
                                                                      <?php endforeach ?>
                                                                 </li>
                                                            <?php endwhile; ?>
                                                       <?php endif; ?>

                                                       <?php 
                                                       $project_services = get_field('project_services');
                                                       if (!empty($project_services)): ?>
                                                            <li><span>Service</span> <?php echo $project_services; ?></li>
                                            <?php endif; ?>

                                                  </ul>
                                             </div>

                                        </div>
                                   </div>
                              </div>
                                   
        <?php
        } ?>
        </div>
          <?php echo do_shortcode('[facetwp facet="projects_filter_pagination"]'); ?>
        <?php
    } 
     
     else {
        // no posts found
    }

    /* Restore original Post Data */

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'cll_project', 'cll_project_custom_shortcode' );


