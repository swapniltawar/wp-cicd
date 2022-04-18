<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  ONXRP
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'No Search Result Found', 'onxrp' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'onxrp' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

		<section class="search-results">
            <div class="search-results--container">
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'onxrp' ); ?></p>
                <div class="search-results--input">
					<form  class="searchbox" role="search" id="search-query" method="get" action="/">
                        <input type="search"  class="search-input"  placeholder="<?php echo $search_word;?>" name="s" id="s" value="<?php echo get_search_query(); ?>" class="searchbox-input" onkeyup="buttonUp();" required>
						<button class="search-button" type="submit" value="submit">
							<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/search-big-icon.svg" alt="onxrp" />
						</button>
                    </form>
                </div>
			</div>
		</section>
			<?php

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'onxrp' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
