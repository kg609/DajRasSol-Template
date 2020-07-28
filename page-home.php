<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="row">
        <div class="col-12">
        <?php
				if ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );
				}
				?>
        </div>

        <div class="col-12">
            <h1 class="text-center"> - Welcome - </h1>
            <p class="text-center">Quote of the day</p>
        </div>

        <div class="col-10 weekly-workouts-holder">
            <h2 class="h2"> Weekly Workouts </h2>
            <iframe class="weekly-workout-vid"  width="100%" height="500" src="https://www.youtube.com/embed/p5LvaNuwhBg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <p>Short description of video. (this may be generated dynamically from youtube)</p>
        </div>

        <div class="col-10 monthly-veggie-holder">
            <h2 class="h2"> Veggie of da month </h2>
            <?php
                // Define our WP Query Parameters 
                $query_options = array(
                    'category_name' => 'monthly-veggie',
                    'posts_per_page' => 1,
                );
                $the_query = new WP_Query( $query_options ); 

                while ($the_query -> have_posts()) : $the_query -> the_post(); 
            ?>

            <!-- // Display the Post Title with Hyperlink -->
            <div class="text-left"">
                <h4 class="h4"> <?php the_title(); ?> </h3>
            
            <!-- // Display the Post Excerpt -->
                <?php the_excerpt(__('(more…)'));  ?>
            </div>

            <!-- // Repeat the process and reset once it hits the limit -->
            <?php
                endwhile;
                wp_reset_postdata();
            ?>

            <!-- <p> Veggie of the month blog post. (this may be generated dynamically from the posts saved in the wp database)</p> -->
        </div>
        
        <div class="col-10 shop-holder">
            <h2 class="h2"> Shop</h2>
            <diV class="row">
                <div class="col-4">
                    <img src="https://www.dhresource.com/0x0/f2/albu/g8/M00/15/49/rBVaV1w2oUOANcvOAAWKczQdrHs899.jpg" alt="" />
                    <p> Men's Tank Top </p>
                    <p> $15.00 </p>
                </div>
                <div class="col-4">
                    <img src="https://www.dhresource.com/0x0/f2/albu/g8/M00/15/49/rBVaV1w2oUOANcvOAAWKczQdrHs899.jpg" alt="" />
                    <p> Men's Tank Top </p>
                    <p> $15.00 </p>
                </div>
                <div class="col-4">
                    <img src="https://www.dhresource.com/0x0/f2/albu/g8/M00/15/49/rBVaV1w2oUOANcvOAAWKczQdrHs899.jpg" alt="" />
                    <p> Men's Tank Top </p>
                    <p> $15.00 </p>
                </div>
            </div>
        </div>
    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();