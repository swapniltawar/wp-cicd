<?php
/**
 * Php version 7.4
 * Template Name: Page With Title
 * The template for displaying pages with page title
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */
get_header();

?>

<main id="page-<?php echo get_the_ID(); ?>" class="site-main">

<?php if(get_the_title()) { ?>
<section>
    <div class="container">
        <div class="page-title">
            <h1 class="lined-title"><?php echo get_the_title(); ?></h1>
        </div>
    </div>
</section>
<?php } ?>

<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/container', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main>
<?php
get_footer();
?>