<?php
/**
 * Template part for displaying Podcast posts
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
 $onxrp_podcast_video_url = get_post_meta( get_the_ID(), 'onxrp_podcast_video_url', true );

 $featuredImageUrl = get_the_post_thumbnail_url(get_the_ID());
 $intro = get_field('intro', get_the_ID());
 $faqs = get_field('faq', get_the_ID());
 $conclusion = get_field('conclusion', get_the_ID());

 $tout_img  = get_theme_mod('blog_detail_tout_img');
 $tout_text = get_theme_mod('blog_detail_tout_text');
 $tout_link = get_theme_mod('blog_detail_tout_link');

 $categoryArray = wp_get_post_categories(get_the_ID());
 $id = get_the_ID();
 $related = get_posts(
    array(
        'category' => $categoryArray[0],
        'numberposts' => 4,
        'post__not_in' => array($id),
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
						<?php if(!empty($onxrp_podcast_video_url)){?>
						<div class="image--wrapper">
							<?php echo html_entity_decode($onxrp_podcast_video_url);?>
						</div>
						<?php } ?>
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
							<!-- social share strip -->
							<ul class="social-network-strip">
								<li>
									<a id="tooltip-wrapper"  href="https://twitter.com/intent/tweet?text=<?php echo wp_kses_post(get_the_title()) ?>&url=<?php echo esc_url(get_permalink()) ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="twitter" width="24" height="24">
										<span class="tooltip-content">Twitter</span>
									</a>
								</li>
								<li>
									<a id="tooltip-wrapper"  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()) ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-facebook.svg" alt="facebook" width="24" height="24">
										<span class="tooltip-content">Facebook</span>
									</a>
								</li>
								<li>
									<a id="tooltip-wrapper"  href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink()) ?>&title=<?php echo wp_kses_post(get_the_title()) ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-linkedin.svg" alt="linkedin" width="24" height="24">
										<span class="tooltip-content">linkedin</span>
									</a>
								</li>
								<li>
									<a id="tooltip-wrapper"  href="https://plus.google.com/share?url=" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-google.svg" alt="google" width="24" height="24">
										<span class="tooltip-content">Google Plus</span>
									</a>
								</li>
								<li class="share-icon">
									<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-share.svg" alt="share" width="40" height="40">
								</li>
							</ul>
						</div>
						<!-- article: Stablecoins and CBDCs Could Co-Exist – Says Fed Chairman Jerome Powell -->
						<article class="article article--hero">
							<h2 class="heading-two">
								<?php echo wp_kses_post( get_the_title() ); ?>
							</h2>
							<div class="article__body">
								<p class="content-para">
									<?php echo wp_kses_post(get_the_excerpt()); ?>
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
						<?php  if ( is_active_sidebar( 'sidebar-4' ) ) {
                            dynamic_sidebar( 'sidebar-4' );
                        }?>
					</div>
				</div>
			</div>
		</section>
		<?php
			// the_content();
		?>
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
				<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" width="24" height="16" />Related Articles
			</div>
			<div class="article-block-wrapper">
				<!-- single blog -->
				<?php OnXRP_Get_Related_Posts(get_the_ID()); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<!-- become a contributor -->
<?php if(!empty($tout_img) && !empty($tout_text && !empty($tout_link))) { ?>
	<section class="graphic-section-wrapper">
		<div class="featured-article">
			<div class="container">
				<div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
					<div class="image">
						<div class="image--oval-shape"></div>
						<div class="image--wrapper" style="background-image: url(<?php echo esc_url($tout_img); ?>)">
						</div>
						<a href="<?php echo esc_url($tout_link); ?>" class="btn btn--gradient">
							<?php echo wp_kses_post($tout_text); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>