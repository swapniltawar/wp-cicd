<?php
/**
 * The template part for the Project Block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$buttonText = $attributes['buttonText'];
$buttonUrl       = $attributes['buttonUrl'];
$link_target  = $attributes['newTab'];
$extraid      = $attributes['extraid'];

$args = array(
    'posts_per_page'   => 3,
    'post_type'   => 'project',
    'post_status'      => 'publish',
    'orderby'          =>  'DATE',
    'order'            => 'DESC'
);

$recent_posts = get_posts( $args );
?>

<section class="featured-projects" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
        <div class="container featured-projects--container d-flex">
            <div class="featured-projects--left d-flex">

                <?php
    foreach ( $recent_posts as $post ){
        $post_title = get_the_title( $post );
        $post_id = get_the_id( $post );
        $post_excerpt = get_the_excerpt( $post );
        $featured_image = get_the_post_thumbnail_url($post, 'full');
        $redirect_link = get_post_meta( $post->ID, 'onxrp_project_redirect', true );

        if(empty($redirect_link))
        {
            $redirect_link = 'javascript:;';
        }

    ?>

                <div  class="featured-projects--tile">
                   <a target="_blank" href="<?php echo $redirect_link ?>"><h5 class="heading-five"><?php echo $post_title ?></h5></a>
                    <div class="tile-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".1"></div>
                    <a class="tile-link rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".1" target="_blank" href="<?php echo $redirect_link ?>">
                      <div class="tile-image" style="background-image: url(<?php echo $featured_image ?>"> </div>
                    </a>
                 </div>

             <?php } ?>
            </div>

            <div class="big-cta d-flex rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2">
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
                <a target="<?php echo esc_attr( $link_target ); ?>"  href="<?php echo esc_attr($buttonUrl); ?>" class="btn round-primary">
                    <span><?php echo $buttonText; ?></span>
                    <div class="btn-shape"></div>
                </a>
            </div>
        </div>
    </section>
