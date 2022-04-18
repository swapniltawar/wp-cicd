<?php
/**
 * The template part for the Podcast Block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$sectionText        = $attributes['sectionText'];
$tagText  = $attributes['tagText'];
$playButton    = $attributes['playButton'];
$subscribeButton      = $attributes['subscribeButton'];
$buttonUrl  = $attributes['buttonUrl'];
$newTab  = $attributes['newTab'];

$args = array(
    'posts_per_page'   => 1,
    'post_type'   => 'podcast',
    'post_status'      => 'publish',
    'orderby'          =>  'DATE',
    'order'            => 'DESC'
);

$recent_posts = get_posts( $args );
?>


<section class="featured-article title-right second-option feature-podcast">
        <div class="container">
            <div class="article-title d-flex align-items-center" >
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo $sectionText;?>
            </div>
            <?php
        foreach ( $recent_posts as $post ){
        $post_title = get_the_title( $post );
        $post_id = get_the_id( $post );
        $post_excerpt = get_the_excerpt($post);
        $author_name = get_the_author();
        $featured_image = get_the_post_thumbnail_url($post, 'full');
        $redirect_link = get_permalink( $post );
        $post_date = get_the_date();
         ?>
            <div class="featured-article--content d-flex">
                <div class="content">
                <div class="content-inner">
                        <div class="tags">
                        <?php echo $tagText;?>
                        </div>
                        <a href="<?php echo $redirect_link; ?>">
                        <h1 class="heading-one" >
                            <?php echo wp_kses_post($post_title); ?>
                        </h1>
                        </a>
                        <div class="content-para">
                        <?php echo wp_kses_post($post_excerpt);?>
                        </div>
                        <div class="d-flex justify-content-between podcast-action-wrapper" >
                             <div class="author-info">
                               <div class="author-name">
                               <?php echo $author_name; ?>
                                </div>
                                <div class="article-date">
                                <?php echo $post_date; ?>
                                </div>
                             </div>
                             <div class="d-flex podcast-action">
                                <a href="<?php echo $redirect_link; ?>" class="btn btn--gradient"><?php echo $playButton; ?></a>
                                <a href="<?php echo $buttonUrl; ?>" target="<?php echo esc_attr( $newTab ); ?>" class="btn btn--gradient"><?php echo $subscribeButton;?></a>
                             </div>
                        </div>

                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape shape-right rellax" data-rellax-speed="2"></div>
                    <a href="<?php echo $redirect_link; ?>" class="image--wrapper image--shape-wrapper" style="background-image: url(<?php echo  esc_url($featured_image); ?>)">
                       <span class="icon-play"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-play.svg" alt="icon-play" ></span>
                    </a>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>