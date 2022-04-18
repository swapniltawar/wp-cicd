<?php
/**
 * The template part for the grid block.
 *
 * @param array $attributes The post attributes.
 * @param string $content The inner posts.
 *
 * @package Clabs
 */

namespace Clabs;

$sectionText       = $attributes['sectionText'];
$titlePosition     = $attributes['titlePosition'];
$terms      = $attributes['terms'];
$order_by_hold    = $attributes['orderBy'];
$order_by_hold_split = (explode("/",$order_by_hold));
$order = $order_by_hold_split[1];
$orderBy = $order_by_hold_split[0];


global $post;

	$args = array(
		'posts_per_page'   => 4,
		'post_status'      => 'publish',
        'orderby'          => $orderBy,
        'order'            => $order,
        'cat'         => $terms
	);

    $recent_posts = get_posts( $args );
?>

<section class=" sub-articles sub-articles-full <?php echo $titlePosition; ?>" data-rellax-speed="2">
        <div class="container sub-articles--container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo $sectionText;?>
            </div>
            <div class="sub-articles--content d-flex">
                <div class="sub-articles--column d-flex">

                <?php
            foreach ( $recent_posts as $post ){

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
             ?>


                    <div class="article-block">
                    <a href="<?php echo $post_link; ?>">
                        <div class="article-block--image">
                            <img src="<?php echo  $featured_image; ?>" alt="<?php $post_title; ?>" />
                        </div>
                        </a>
                        <div class="article-block--devider"></div>
                        <a href="<?php echo $currentcatslug; ?>">
                        <div class="tags">
                            <?php echo $currentcatname; ?>
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
                        <?php echo $post_date; ?>
                        </div>
                    </div>

                   <?php } ?>
                </div>
            </div>
        </div>
    </section>
