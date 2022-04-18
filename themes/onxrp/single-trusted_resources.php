<?php
/**
 * The template for displaying all single Trusted Resources posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package  ONXRP
 */

get_header();
?>

<main id="primary" class="details-page single-trusted-resources">

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content-trusted-resources', get_post_type() );

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
