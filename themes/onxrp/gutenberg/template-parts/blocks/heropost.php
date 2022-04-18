<?php
/**
 * The template part for the Hero post.
 *
 * @param array $attributes The post attributes.
 * @param string $content The inner posts.
 *
 * @package Clabs
 */

namespace Clabs;

$sectionText       = $attributes['sectionText'];
$order_by_hold    = $attributes['orderBy'];
$order_by_hold_split = (explode("/",$order_by_hold));
$order = $order_by_hold_split[1];
$orderBy = $order_by_hold_split[0];
$extraid      = $attributes['extraid'];

global $post, $block_core_latest_posts_excerpt_length;

	$args = array(
		'posts_per_page'   => 5,
		'post_status'      => 'publish',
        'orderby'          => $orderBy,
        'order'            => $order
	);

    $recent_posts = get_posts( $args );
?>



<section class="hero-post" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>

    <section class="featured-article">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo $sectionText;?>
            </div>

            <?php  $count = 1;
            foreach ( $recent_posts as $post ){
             $postID = get_the_ID();
             $post_title = get_the_title( $post );
             $post_excerpt = get_the_excerpt( $post );
             $post_link = get_permalink( $post );
             $featured_image = get_the_post_thumbnail_url($postID, 'full');
             $author_name = get_the_author();
             $post_date = get_the_date();
             $category = get_the_category();
	         $currentcat = $category[0]->cat_ID;
	         $currentcatname = $category[0]->cat_name;
	         $currentcatslug = get_category_link($currentcat);

             if($count == 1) {  ?>


            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
                        <a href="<?php echo $currentcatslug; ?>">
                        <div class="tags">
                            <?php echo $currentcatname; ?>
                        </div>
                       </a>
                        <a href="<?php echo $post_link; ?>">
                        <h1 class="heading-one">
                            <?php echo $post_title ?>
                        </h1>
                        </a>
                        <div class="content-para">
                           <?php echo $post_excerpt; ?>
                        </div>
                        <div class="author-date">
                            <div class="author-name">
                                <?php echo $author_name; ?>
                            </div>
                            <div class="article-date">
                               <?php echo $post_date ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image">
                    <div class="image--oval-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                    <a href="<?php echo $post_link; ?>">
                    <div class="image--wrapper" style="background-image: url(<?php echo  $featured_image ?>">
                    </div>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="article-column rellax"  data-rellax-speed="2" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".1">
        <div class="container article-column--container">
          <?php } else { ?>

            <div class="article-block">
            <a href="<?php echo $post_link; ?>">
                <div class="article-block--image">
                    <img src="<?php echo  $featured_image ?>" alt="onXRP" />
                </div>
          </a>
                <div class="article-block--devider"></div>
                <a href="<?php echo $currentcatslug; ?>">
                <div class="tags">
                    <?php echo  $currentcatname ; ?>
                </div>
                </a>
                <a href="<?php echo $post_link; ?>">
                <h2 class="heading-three">
                   <?php echo $post_title; ?>
                </h2>
                </a>
                <div class="author-name">
                <?php echo $author_name; ?>
                </div>
                <div class="article-date">
                <?php echo $post_date ?>
                </div>
            </div>

            <?php } $count++; } ?>
        </div>
    </section>

</section>
