<?php
/**
 * Php version 7.4
 * Template Name: Category
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */
get_header();
$cat_ID        = get_post_meta( $post->ID, 'onxrp_category', true );
$category      = get_category($cat_ID );
$category_name = get_cat_name($cat_ID);
$total_posts = $category ->category_count;
global $wp_query;
?>

<main>
    <section class="featured-article">
        <div class="container">
            <div class="page-title">
                <h1 class="lined-title"> <?php echo $category_name; ?> / <?php  the_title();?> </h1>
                <div class="page-title--sub content-para">
                    <?php the_content();?>
                </div>
            </div>
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />RECENT ARTICLES
            </div>

            <div class="featured-article--content d-flex">
                <?php
                  $the_query = new WP_Query( array(
                    'cat' => $cat_ID,
                     'posts_per_page' => 1,
                  ));
                  if ( $the_query->have_posts() ) :
                  while ( $the_query->have_posts() ) : $the_query->the_post();
                    $postid = get_the_ID();
                    $post_link = get_permalink( $postid );
                    $cat = get_the_category();
                    $currentcatslug = get_category_link( $cat_ID );
                    $url = wp_get_attachment_url( get_post_thumbnail_id( $postid ), 'full' );?>
                <div class="content">
                    <div class="content-inner">
                    <a href="<?php echo esc_url($currentcatslug); ?>">
                            <div class="tags">
                                <?php echo $cat[0]->cat_name; ?>
                            </div>
                        </a>
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
                    <div class="image--oval-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                    <a href="<?php echo esc_url($post_link);?>">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="image--wrapper" style="background-image: url(<?php echo $url ?>)">

                        </div>
                    <?php } else { ?>
                    <div class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-article-img.png)">

                    </div>
                    <?php } ?>
                    </a>
                </div>
                <?php  endwhile;
                endif;
                ?>
            </div>

        </div>
    </section>

    <section class="sub-articles sub-articles-full odd-row">
        <div class="container sub-articles--container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo $category_name; ?> <?php echo"Articles";?>
            </div>
            <div class="sub-articles--content ">
                <div class="sub-articles--column d-flex" id="ajax-posts">
                <?php
                   $i= 1;
                   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                   $the_query1 = new WP_Query( array(
                    'cat' => $cat_ID,
                    'posts_per_page' => 8,
                    'offset'        => 1,
                    'paged'         => $paged,
                    'post_type' => 'post',
                  ));
                  if ( $the_query1->have_posts() ) :
                  while ( $the_query1->have_posts() ) : $the_query1->the_post();
                    $i++;
                    $postid = get_the_ID();
                    $post_link = get_permalink( $postid );
                    $cat1 = get_the_category();
                    $currentcatslug1 = get_category_link( $cat_ID );
                    $url = wp_get_attachment_url( get_post_thumbnail_id( $postid ), 'full' );?>
                    <div class="article-block">
                        <div class="article-block--image">
                            <a href="<?php echo esc_url( $post_link );?>">
                            <?php
                            if (has_post_thumbnail()) { ?>
                                <img src="<?php echo $url ?>" />
                           <?php } else { ?>
                                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/article-img.png" alt="onXRP" />
                            <?php } ?>
                           </a>
                        </div>
                        <div class="article-block--devider"></div>
                        <a href="<?php echo esc_url($currentcatslug1); ?>">
                            <div class="tags">
                                <?php echo $cat1[0]->cat_name; ?>
                            </div>
                        </a>
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
                 if (   $i < $total_posts ) {
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
                            <a href="javascript:void(0);" class="btn round-primary onxrp_loadmore" data-catid="'.$cat_ID.'" data-maxpage="'.$the_query1->max_num_pages.'" data-posttype="post">
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
    <?php $faq = get_field('faq',$category);
    if( $faq ) {?>
    <section class="faq-section">
        <div class="container faq-section--container">
            <div class="faq-section--left js-faq-section">

                <h1 class="lined-title faq-title">faq</h1>

                 <div class="accordion js-accordion">
                    <!-- accordion item -->
                    <?php

                    foreach ($faq as $qna ) {  ?>
                    <div class="accordion__items">
                        <div class="accordion__header">
                            <button aria-expanded="flase" aria-controls="collapseOne">
                                <h3><?php echo $qna['question']; ?></h3>
                                <div class="expand-controls">
                                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-plus.svg" alt="icon">
                                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-minus.svg" alt="icon">
                                </div>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse">
                            <div class="accordion-body">
                                <p class="content-para"><?php    echo $qna['answer']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- accordion item -->

                </div>
            </div>


            <div class="faq-section--right">
                <div class="btn-wrapper js-faq-btn ">
                    <div class="faq-btn rellax" data-rellax-speed="0" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="0" data-rellax-desktop-speed="2">
                        <span>read faq</span>
                    </div>

                    <div class="faq-btn faq-active">
                        <span>Hide faq</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</main>

<?php
get_footer();
?>