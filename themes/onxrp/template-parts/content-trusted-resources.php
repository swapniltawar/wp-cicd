<?php
/**
 * Template part for displaying Podcast posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  ONXRP
 */



 $postDate = get_the_date();
 $postTitle = get_the_title();
 $postId = get_the_ID();
 $featuredImageUrl = get_the_post_thumbnail_url($postId);
 $twitter = get_post_meta( $postId, 'onxrp_tr_twitter', true );
 $youtube = get_post_meta( $postId, 'onxrp_tr_youtube', true );
 $instagram = get_post_meta( $postId, 'onxrp_tr_instagram', true );
 $website = get_post_meta( $postId, 'onxrp_tr_website', true );
 $linktree = get_post_meta( $postId, 'onxrp_tr_linktree', true );
 $reddit = get_post_meta( $postId, 'onxrp_tr_reddit', true );
 $tout_img  = get_theme_mod('blog_detail_tout_img');
 $tout_text = get_theme_mod('blog_detail_tout_text');
 $tout_link = get_theme_mod('blog_detail_tout_link');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="featured-article community-member-article">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo wp_kses_post($postTitle)?>
            </div>

            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
					     <?php the_content(); ?>
                    <div>

					<?php if(!empty($twitter) || !empty($youtube) || !empty($instagram) || !empty($website) || !empty($linktree) || !empty($reddit)){ ?>
                            	<!-- social share strip -->
							<ul class="social-network-strip">
								<?php if($twitter) { ?>
								<li>
									<a id="tooltip-wrapper" href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="twitter" width="24" height="24">
										<span class="tooltip-content">	Twitter </span>
									</a>
								</li>
								<?php } ?>
								<?php if($reddit) { ?>
								<li>
									<a id="tooltip-wrapper" href="<?php echo esc_url($reddit); ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-reddit.svg" alt="reddit" width="24" height="24">
										<span class="tooltip-content">	Reddit</span>
									</a>
								</li>
								<?php } ?>
								<?php if($linktree) { ?>
								<li>
									<a id="tooltip-wrapper" href="<?php echo esc_url($linktree); ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-arrow.svg" alt="linktree" width="24" height="24">
										<span class="tooltip-content">	Linktree </span>
									</a>
								</li>
								<?php } ?>
								<?php if($instagram) { ?>
								<li>
									<a id="tooltip-wrapper" href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-instagram-2.svg" alt="intagram" width="24" height="24">
										<span class="tooltip-content">	Instagram </span>
									</a>
								</li>
								<?php } ?>
								<?php if($youtube) { ?>
								<li>
									<a id="tooltip-wrapper" href="<?php echo esc_url($youtube); ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/youtube-icon.svg" alt="you tube" width="24" height="24">
										<span class="tooltip-content">	YouTube </span>
									</a>
								</li>
								<?php } ?>
								<?php if($website) { ?>
								<li>
									<a id="tooltip-wrapper" href="<?php echo esc_url($website); ?>" target="_blank" rel="noopener">
										<img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-web.svg" alt="website" width="24" height="24">
										<span class="tooltip-content">	Website</span>
									</a>
								</li>
								<?php } ?>
							</ul>
					<?php } ?>
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                    <div class="image--wrapper" style="background-image: url(<?php echo  esc_url($featuredImageUrl); ?>">

                    </div>
                </div>
            </div>

        </div>
    </section>

</article>

<!-- get related resources -->
<?php OnXRP_Get_Related_TR(get_the_ID()); ?>

<!-- become a contributor -->
<?php if(!empty($tout_img) && !empty($tout_text && !empty($tout_link))) { ?>
	<section class="graphic-section-wrapper">
		<div class="featured-article">
			<div class="container">
				<div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
					<div class="image">
						<div class="image--oval-shape rellax" data-rellax-speed=".9" data-rellax-xs-speed=".9" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
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