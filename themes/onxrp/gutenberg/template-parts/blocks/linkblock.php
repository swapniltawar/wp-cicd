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

$buttonText = $attributes['buttonText'];
$image       = $attributes['image'];
$imageUrl = is_array($image) ? $image['url'] : $image;
$btn_url      = $attributes['buttonUrl'];
$link_target  = $attributes['newTab'];
$downloadLink  = $attributes['downloadLink'];
$extraid      = $attributes['extraid'];
?>

<section class="graphic-section-wrapper" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
        <div class="featured-article">
            <div class="container">
                <div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
                    <div class="image">
                        <div class="image--oval-shape rellax" data-rellax-speed=".9" data-rellax-xs-speed=".9" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                        <div class="image--wrapper" style="background-image: url(<?php echo esc_url($imageUrl); ?>)"></div>
                        <a href="<?php  echo esc_attr($btn_url); ?>"
                target="<?php echo esc_attr( $link_target ); ?>" <?php if($downloadLink) { echo 'download'; } ?> class="btn btn--gradient"><?php echo esc_attr($buttonText); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
