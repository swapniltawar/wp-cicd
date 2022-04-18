<?php
/**
 * Template part for displaying glossary posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  ONXRP
 */


 $authorName = get_the_author();
 $postDate = get_the_date();
 $authorId = get_the_author_meta('ID');
 $authorDescription = get_the_author_meta('description');
 $authorAvatarUrl = get_avatar_url($authorId);
 $authorSocialLink = get_field('social_media_links', 'user_'.$authorId);

 $featuredImageUrl = get_the_post_thumbnail_url(get_the_ID());
 $intro = get_field('intro', get_the_ID());
 $faqs = get_field('faq', get_the_ID());
 $conclusion = get_field('conclusion', get_the_ID());
 $id = get_the_ID();
 $related = get_posts(
	array(
		'post_type'      => 'glossary',
		'category__in' => wp_get_post_categories($id),
		'numberposts' => 4,
		'post__not_in' => array($id)
		)
	);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- hero section -->
		<section class="featured-article">
			<div class="container">
				<div class="article-title d-flex align-items-center">
					<?php OnXRP_Post_Breadcrumb(); ?>
				</div>
				<div class="featured-article--content featured-article--content--full d-flex">
					<div class="image">
						<div class="image--oval-shape"></div>
						<div class="image--wrapper"  id="tooltip-wrapper" style="background-image: url(<?php echo esc_url($featuredImageUrl); ?>)">
					     	<span id="tooltip">This picture will be mintable soon</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- details body -->
		<section class="details-wrapper">
			<div class="container">
				<div class="details-body">
					<div class="lhs">
						<div class="lhs__header">
							<div class="avatar">
								<div class="avatar__img">
									<img src="<?php echo esc_url($authorAvatarUrl); ?>" alt="<?php echo wp_kses_post($authorName) ?>" width="64" height="64">
								</div>
								<div class="avatar__desc">
									<span><?php echo wp_kses_post($authorName) ?></span>
									<time><?php echo wp_kses_post($postDate) ?></time>
								</div>
							</div>

						</div>
						<!-- article: Stablecoins and CBDCs Could Co-Exist – Says Fed Chairman Jerome Powell -->
						<article class="article article--hero">
							<h2 class="heading-two">
								<?php echo wp_kses_post( get_the_title() ); ?>
							</h2>
							<div class="article__body">
								<p class="content-para">
									<?php get_the_excerpt(); ?>
								</p>
							</div>
						</article>
						<!-- article: What is a stablecoin? -->
						<article class="article" id="what_is_a_stablecoin">
							<?php the_content(); ?>
						</article>
					</div>
					<!-- RHS section with small articles -->
					<div class="rhs rhs--articles">
						<?php  if ( is_active_sidebar( 'sidebar-3' ) ) {
                            dynamic_sidebar( 'sidebar-3' );
                        }?>
					</div>
				</div>
			</div>
		</section>

</article>

<!-- testimonials -->
<section class="details-wrapper">
	<div class="container">
		<div class="details-body details-body--testimonials">
			<div class="lhs">
				<article class="article">
					<div class="avatar">
						<div class="avatar__img">
							<img src="<?php echo esc_url($authorAvatarUrl); ?>" alt="<?php echo wp_kses_post($authorName); ?>" width="64" height="64">
						</div>
						<div class="avatar__desc">
							<span><?php echo wp_kses_post($authorName); ?></span>
							<time><?php echo wp_kses_post($postDate); ?></time>
						</div>
					</div>
					<div class="article__body">
						<p class="content-para">
							<?php echo wp_kses_post($authorDescription); ?>
						</p>
						<ul class="social-accounts">
							<?php if(!empty($authorSocialLink['twitter'])) { ?>
								<li>
									<a href="<?php echo esc_url($authorSocialLink['twitter']) ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="twitter" width="24" height="24">
									</a>
								</li>
							<?php } ?>

							<?php if(!empty($authorSocialLink['linkedin'])) { ?>
								<li>
									<a href="<?php echo esc_url($authorSocialLink['linkedin']) ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-linkedin.svg" alt="linkedin" width="24" height="24">
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
<!-- related articles -->
<?php if(!empty($related)) { ?>
<section class="related-articles-wrapper">
	<div class="container">
		<div class="related-articles">
			<div class="article-title d-flex align-items-center">
				<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" width="24" height="16" />Related NFT Glossary
			</div>
			<div class="article-block-wrapper">
				<!-- single blog -->
				<?php OnXRP_Get_Related_Glossary(get_the_ID()); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>