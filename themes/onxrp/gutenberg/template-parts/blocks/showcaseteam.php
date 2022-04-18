<?php
/**
 * The template part for the Showcase Team.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$sectionText = $attributes['sectionText'];
$title       = $attributes['title'];
$titlePosition      = $attributes['titlePosition'];
$image       = $attributes['image'];
$imageUrl = is_array($image) ? $image['url'] : $image;
$extraid      = $attributes['extraid'];

$args = array(
    'posts_per_page'   => -1,
    'post_type'   => 'team',
    'post_status'      => 'publish',
    'orderby'          =>  'DATE',
    'order'            => 'DESC'
);

$recent_posts = get_posts( $args );
?>

<section class="featured-article <?php echo $titlePosition; ?> " <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo esc_attr($sectionText); ?>
            </div>

            <?php if($title || $imageUrl ) { ?>
                <div class="featured-article--content d-flex">
                    <div class="content">
                        <div class="content-inner">
                            <h1 class="heading-one">
                            <?php echo esc_attr($title); ?>
                            </h1>
                        </div>
                    </div>
                    <div class="image">
                        <div class="image--oval-shape rellax" data-rellax-speed="2" data-rellax-xs-speed="1" data-rellax-mobile-speed="2" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                        <div class="image--wrapper" style="background-image: url(<?php echo esc_url($imageUrl); ?>)">

                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
</section>
<section class="team">
    <div class="container team--container">
    <?php
    foreach ( $recent_posts as $post ){
        $post_title = get_the_title( $post );
        $post_id = get_the_id( $post );
        $post_excerpt = get_the_excerpt( $post );
        $featured_image = get_the_post_thumbnail_url($post, 'full');
        $designation = get_post_meta( $post->ID, 'onxrp_team_designation', true );
        $linkedin = get_post_meta( $post->ID, 'onxrp_team_linkedin', true );
        $twitter = get_post_meta( $post->ID, 'onxrp_team_twitter', true );
    ?>

            <div class="team--tile">
                <div class="team--shape rellax" data-rellax-speed="2" data-rellax-xs-speed="2" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-shape.svg" alt="onXRP" />
                </div>
                <h5 class="team--heading heading-five">
                    <?php echo $designation ?>
                </h5>
                <div class="team--pic-social">
                    <div class="pic">
                        <img src="<?php echo $featured_image; ?>" />
                    </div>
                    <div class="social">
                        <?php if(!empty($twitter)) { ?>
                        <a href="<?php echo $twitter;?>"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="onXRP" /></a>
                        <?php } ?>
                        <?php if(!empty($linkedin)) { ?>
                        <a href="<?php echo $linkedin ?>"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-linkedin.svg" alt="onXRP" /></a>
                        <?php } ?>
                    </div>
                </div>
                <h3 class="team--name heading-three">
                    <?php echo $post_title; ?>
                </h3>
                <div class="team--description">
                   <?php echo $post_excerpt; ?>
                </div>
            </div>

    <?php } ?>
        </div>
    </section>