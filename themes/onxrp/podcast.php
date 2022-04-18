<?php
/**
 * Php version 7.4
 * Template Name: PodcastPage
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */
get_header();
global $wp_query;
$count_posts = wp_count_posts('podcast');
$total_posts = $count_posts->publish;
?>

<main>
    <section class="featured-article">
        <div class="container">
            <div class="page-title">
                <h1 class="lined-title"><?php  the_title();?> </h1>
                <div class="page-title--sub content-para">
                    <?php the_content();?>
                </div>
            </div>
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /> <?php echo esc_attr("RECENT EPISODES");?>
            </div>

            <div class="featured-article--content d-flex">
                <?php
                  $the_query = new WP_Query( array(
                     'post_type'      => 'podcast',
                     'post_status' => 'publish',
                     'posts_per_page' => 1,
                  ));
                  if ( $the_query->have_posts() ) :
                  while ( $the_query->have_posts() ) : $the_query->the_post();
                    $postid = get_the_ID();
                    $post_link = get_permalink( $postid );
                    $cat = get_the_terms( $postid, 'onxrp-podcast-category' );
                    $onxrp_podcast_video_url       = get_post_meta( $postid, 'onxrp_podcast_video_url', true );
                    $onxrp_podcast_latest_episode_caption       = get_post_meta( $postid, 'onxrp_podcast_latest_episode_caption', true );
                    $url1 = wp_get_attachment_url( get_post_thumbnail_id( $postid ), 'full' );?>
                <div class="content">
                    <div class="content-inner">
                        <?php if($onxrp_podcast_latest_episode_caption) {?>
                        <div class="tags">
                            <?php echo $onxrp_podcast_latest_episode_caption; ?>
                        </div>
                        <?php } ?>
                        <a href="<?php echo esc_url($post_link);?>">
                            <h1 class="heading-one">
                                <?php the_title();?>
                            </h1>
                        </a>
                        <div class="content-para">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="author-date">
                            <div class="author-name">
                                <?php the_author(); ?>
                            </div>
                            <div class="article-date">
                                <?php echo  get_the_date(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape d-flex rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="1"></div>
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php echo esc_url($post_link);?>" class="image--wrapper" style="background-image: url(<?php echo $url1 ?>)">

                        <span class="icon-play"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-play.svg" alt="icon-play" ></span>
                    <?php } else { ?>
                     <a href="<?php echo esc_url($post_link);?>"  class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-article-img.png)">
                        <span class="icon-play"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-play.svg" alt="icon-play" ></span>
                        </a>
                        <?php } ?>
                     </a>
                <?php  endwhile;
                endif;
                ?>
            </div>

        </div>
    </section>

    <section class="sub-articles sub-articles-full even-row">
        <div class="container sub-articles--container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /> <?php echo esc_attr("ALL EPISODES");?>
            </div>
            <div class="sub-articles--content ">
                <div class="sub-articles--column d-flex" id="ajax-posts">
                <?php
                  $i= 1;
                  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                  $the_query1 = new WP_Query( array(
                    'post_type'      => 'podcast',
                    'post_status' => 'publish',
                    'posts_per_page' => 8,
                    'offset'        => 1,
                    'paged'         => $paged
                  ));
                  if ( $the_query1->have_posts() ) :
                  while ( $the_query1->have_posts() ) : $the_query1->the_post();
                    $i++;
                    $postid = get_the_ID();
                    $post_link = get_permalink( $postid );
                    $onxrp_podcast_video_url1      = get_post_meta( $postid, 'onxrp_podcast_video_url', true );
                    $url = wp_get_attachment_url( get_post_thumbnail_id( $postid ), 'full' );?>
                    <div class="article-block">
                        <div class="article-block--image">
                        <a href="<?php echo esc_url($post_link);?>">
                            <?php if (has_post_thumbnail()) { ?>
                                <img src="<?php echo $url ?>" />
                            <?php } else { ?>
                            <div class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-article-img.png)">
                            </div>
                            <?php } ?>
                        </a>
                        <a href="<?php echo esc_url($post_link);?>" class="icon-play"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-play.svg" alt="icon-play" ></a>
                        </div>
                        <div class="article-block--devider"></div>
                        <a href="<?php echo esc_url($post_link);?>">
                            <h2 class="heading-three">
                                <?php the_title();?>
                            </h2>
                        </a>
                        <div class="author-name">
                            <?php the_author(); ?>
                        </div>
                        <div class="article-date">
                            <?php echo  get_the_date(); ?>
                        </div>
                    </div>
                    <?php  endwhile;
                    endif;
                ?>

                    <div class="category-block article-block extra-block"></div>
                     <div class="category-block article-block"></div>
                     <div class="category-block article-block"></div>
                </div>
                <?php
                    if ( $i < $total_posts ){
                    echo '
                    <div class="section-load-more d-flex rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2">
                        <div class="big-cta d-flex">
                            <div class="cta-shape">
                                <svg width="162px" height="242px" viewBox="0 0 162 242" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>Rectangle</title>
                                    <defs>
                                    <linearGradient x1="0%" y1="50%" x2="100%" y2="50%" id="linearGradient-1">
                                        <stop stop-color="#0C01F4" offset="0%"></stop>
                                        <stop stop-color="#9F00B9" offset="100%"></stop>
                                    </linearGradient>
                                    </defs>
                                    <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="01_Home" transform="translate(-1069.000000, -1706.000000)" fill-rule="nonzero" stroke="url(#linearGradient-1)">
                                        <g id="Group-8" transform="translate(1070.000000, 1707.000000)">
                                            <rect id="Rectangle" x="0" y="0" width="160" height="240" rx="80"></rect>
                                        </g>
                                    </g>
                                    </g>
                                </svg>
                            </div>
                            <a href="javascript:void(0);" class="btn round-primary onxrp_loadmore" data-maxpage="'.$the_query1->max_num_pages.'" data-posttype="podcast">
                                <span>Load More</span>
                                <div class="btn-shape"></div>
                            </a>
                        </div>
                    </div>';
                    }
                ?>
            </div>
        </div>

    </section>

</main>

<?php
get_footer();
?>