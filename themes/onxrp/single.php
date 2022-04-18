<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package  ONXRP
 */

get_header();
?>

<main id="primary" class="details-page">

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', get_post_type() );

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
