<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>

	<?php do_action('ocean_before_content_wrap'); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action('ocean_before_primary'); ?>

		<div id="primary" class="content-area clr">

			<?php do_action('ocean_before_content'); ?>

			<div id="content" class="site-content clr">

				<?php do_action('ocean_before_content_inner'); ?>

				    <div class="cll-single-project-main-wrapper">
                        <?php 
                            if ( have_posts() ) :?>
                                <div class="cll-single-project-wrapper">
                                    <?php
                                    while ( have_posts() ) : the_post();
                                    $project_date = get_field('project_date');
                                    $project_location = get_field('project_location');
                                    $project_plant_equipment = get_field('project_plant_equipment');
                                    $project_services = get_field('project_services');

                                    $project_details_right_side_big_text = get_field('project_details_right_side_big_text');
                                    $project_details_right_side_content = get_field('project_details_right_side_content');

                                    ?>
                                        <div class="cll-single-project-breadcrumb-wrapper">
                                            <div class="cll-single-project-breadcrumb-inner">
                                                <?php echo do_shortcode('[oceanwp_breadcrumb]'); ?>
                                                <div class="cll-single-project-name">
                                                    <h1><?php the_title(); ?></h1>
                                                </div>  
                                            </div>
                                       </div> 
                                       <div class="cll-single-project-content-col">
                                            <div class="cll-single-project-content-inner">
                                                <div class="single_project_left_meta">
                                                    <ul>
                                                        <li><span>PROJECT</span> <?php the_title(); ?></li>

                                                        <?php if (!empty($project_date)): ?>
                                                            <li><span>DATE</span> <?php echo $project_date; ?></li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($project_location)): ?>
                                                            <li><span>LOCATION</span> <?php echo $project_location; ?></li>
                                                        <?php endif; ?>

                                                        <?php if (!empty($project_plant_equipment)): ?>
                                                            <li class="hawkins-project-size"><span>Equipment</span> <?php echo $project_plant_equipment; ?></li>
                                                        <?php endif; ?>

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
                                                        
                                                        <?php if (!empty($project_services)): ?>
                                                            <li><span>Services</span> <?php echo $project_services; ?></li>
                                                        <?php endif; ?>

                                                    </ul>
                                                </div>

                                                <div class="cll-single-project-btn">
                                                    <a href="/#enquiry-form" class="button">Enquire Now</a>
                                                </div>

                                            </div>
                                       </div> 

                                       <div class="cll-single-project-image-gallery-col">
                                            <?php if (!empty($project_details_right_side_big_text)): ?>
                                                <div class="cll-single-project-right-side-big-text">
                                                    <?php echo $project_details_right_side_big_text; ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="cll-single-project-image-gallery-wrapper">
                                                <?php 
                                                $project_details_gallery = get_field('project_details_gallery');
                                                $size = 'full'; 
                                                if( $project_details_gallery ): ?>
                                                    <div class="cll-single-project-image-gallery-slider cll-image-gallery-slider">
                                                        <?php foreach( $project_details_gallery as $project_details_gallery_id ): ?>
                                                            <div class="cll-single-project-image-gallery-item cll-image-gallery-item">
                                                                    <?php echo wp_get_attachment_image( $project_details_gallery_id, $size ); ?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($project_details_right_side_content)): ?>
                                                <div class="cll-single-project-right-side-content">
                                                    <?php echo $project_details_right_side_content; ?>
                                                </div>
                                            <?php endif; ?>
                                       </div> 
                        
                                    <?php
                                    endwhile;?>
                                </div>
                            <?php
                            endif;

                        // Reset Post Data
                        wp_reset_postdata();
                        ?>
                        <div class="cll_service_hexagon_group">

                            <div class="cll_service_hexagon_group_01 wow animate__zoomIn" data-wow-delay="300ms">
                                <svg width="192" height="176" viewBox="0 0 192 176" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M37.7173 15.8058C42.9745 6.86489 52.5408 1.34177 62.9125 1.25932L96.0757 0.995635L96.0837 0.995637L129.247 1.25932C139.619 1.34176 149.185 6.8649 154.442 15.8058L171.252 44.3941L171.256 44.401L187.609 73.2531C192.724 82.2764 192.724 93.3227 187.609 102.346L171.256 131.198L171.252 131.205L154.442 159.793C149.185 168.734 139.619 174.257 129.247 174.34L96.0837 174.603L96.0757 174.603L62.9125 174.34C52.5408 174.257 42.9745 168.734 37.7173 159.793L20.9073 131.205L20.9033 131.198L4.55005 102.346C-0.564366 93.3227 -0.564361 82.2764 4.55005 73.2531L20.9053 44.3977L20.9073 44.3941L37.7173 15.8058Z" stroke="#6BA43A"/>
                                </svg>
                            </div>

                            <div class="cll_service_hexagon_group_02 wow animate__zoomIn" data-wow-delay="600ms">
                                <svg width="192" height="176" viewBox="0 0 192 176" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M37.7173 15.8058C42.9745 6.86489 52.5408 1.34177 62.9125 1.25932L96.0757 0.995635L96.0837 0.995637L129.247 1.25932C139.619 1.34176 149.185 6.8649 154.442 15.8058L171.252 44.3941L171.256 44.401L187.609 73.2531C192.724 82.2764 192.724 93.3227 187.609 102.346L171.256 131.198L171.252 131.205L154.442 159.793C149.185 168.734 139.619 174.257 129.247 174.34L96.0837 174.603L96.0757 174.603L62.9125 174.34C52.5408 174.257 42.9745 168.734 37.7173 159.793L20.9073 131.205L20.9033 131.198L4.55005 102.346C-0.564366 93.3227 -0.564361 82.2764 4.55005 73.2531L20.9053 44.3977L20.9073 44.3941L37.7173 15.8058Z" stroke="#6BA43A"/>
                                </svg>
                            </div>
                            <div class="cll_service_hexagon_group_03 wow animate__zoomIn" data-wow-delay="600ms">
                                <svg width="192" height="176" viewBox="0 0 192 176" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M37.7173 15.8058C42.9745 6.86489 52.5408 1.34177 62.9125 1.25932L96.0757 0.995635L96.0837 0.995637L129.247 1.25932C139.619 1.34176 149.185 6.8649 154.442 15.8058L171.252 44.3941L171.256 44.401L187.609 73.2531C192.724 82.2764 192.724 93.3227 187.609 102.346L171.256 131.198L171.252 131.205L154.442 159.793C149.185 168.734 139.619 174.257 129.247 174.34L96.0837 174.603L96.0757 174.603L62.9125 174.34C52.5408 174.257 42.9745 168.734 37.7173 159.793L20.9073 131.205L20.9033 131.198L4.55005 102.346C-0.564366 93.3227 -0.564361 82.2764 4.55005 73.2531L20.9053 44.3977L20.9073 44.3941L37.7173 15.8058Z" stroke="#6BA43A"/>
                                </svg>
                            </div>
                            <div class="cll_service_hexagon_group_04 wow animate__zoomIn" data-wow-delay="600ms">
                                <svg width="192" height="176" viewBox="0 0 192 176" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M37.7173 15.8058C42.9745 6.86489 52.5408 1.34177 62.9125 1.25932L96.0757 0.995635L96.0837 0.995637L129.247 1.25932C139.619 1.34176 149.185 6.8649 154.442 15.8058L171.252 44.3941L171.256 44.401L187.609 73.2531C192.724 82.2764 192.724 93.3227 187.609 102.346L171.256 131.198L171.252 131.205L154.442 159.793C149.185 168.734 139.619 174.257 129.247 174.34L96.0837 174.603L96.0757 174.603L62.9125 174.34C52.5408 174.257 42.9745 168.734 37.7173 159.793L20.9073 131.205L20.9033 131.198L4.55005 102.346C-0.564366 93.3227 -0.564361 82.2764 4.55005 73.2531L20.9053 44.3977L20.9073 44.3941L37.7173 15.8058Z" stroke="#6BA43A"/>
                                </svg>
                            </div>

                        </div>
                    </div>
		

				<?php do_action('ocean_after_content_inner'); ?>

			</div><!-- #content -->

			<?php do_action('ocean_after_content'); ?>

		</div><!-- #primary -->

		<?php do_action('ocean_after_primary'); ?>

	</div><!-- #content-wrap -->

	<?php do_action('ocean_after_content_wrap'); ?>

<?php get_footer(); ?>
