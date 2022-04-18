<?php
/**
 * The template part for the Hero block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$sectionText = $attributes['sectionText'];
$sectionTag  = $attributes['sectionTag'];
$title       = $attributes['title'];
$subTitle    = $attributes['subTitle'];
$image       = $attributes['image'];
$blockType = $attributes['blockType'];
$buttonPosition = $attributes['buttonPosition'];
$buttonText = $attributes['buttonText'];
$terms= $attributes['terms'];
$buttonUrl= $attributes['buttonUrl'];
$newTab= $attributes['newTab'];

$imageUrl = is_array($image) ? $image['url'] : $image;
global $post, $block_core_latest_posts_excerpt_length;

	$args = array(
		'posts_per_page'   => 3,
		'post_status'      => 'publish',
        'orderby'          => $orderBy,
        'order'            => $order,
        'cat' => $terms
	);

    $recent_posts = get_posts( $args );
?>

<section class=" sub-articles <?php
if($buttonPosition == 'even-row' ) { ?>
even-row
<?php }else{ ?>
odd-row
<?php } ?>
" >
    <div class="container sub-articles--container">
        <div class="article-title d-flex align-items-center">
            <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo esc_attr($sectionText); ?>
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
                $cat = get_the_category();
                $currentcat = $cat[0]->cat_ID;
                $currentcatslug = get_category_link($currentcat);
                ?>
                <div class="article-block">
                    <div class="article-block--image">
                        <a href="<?php echo $post_link; ?>">
                        <img src="<?php echo  $featured_image ?>" alt="onXRP" />
                        </a>
                    </div>
                    <div class="article-block--devider"></div>
                    <a href="<?php echo $currentcatslug; ?>">
                    <div class="tags">
                        <?php echo $cat[0]->cat_name; ?>
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
                <?php  } ?>
            </div>
            <div class="big-cta d-flex rellax" data-rellax-speed="2">
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
                <a href="<?php echo $buttonUrl; ?>" class="btn round-primary" target=<?php echo $newTab === true ? '_blank' : '_self' ?>>
                    <span><?php echo $buttonText; ?></span>
                    <div class="btn-shape"></div>
                </a>
            </div>
        </div>
    </div>
</section>
