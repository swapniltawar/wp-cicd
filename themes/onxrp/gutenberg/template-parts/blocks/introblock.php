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
$titlePosition      = $attributes['titlePosition'];
$imagePosition      = $attributes['imagePosition'];
$subTitle    = $attributes['subTitle'];
$image       = $attributes['image'];
$buttonText  = $attributes['buttonText'];
$btn_url      = $attributes['buttonUrl'];
$link_target  = $attributes['newTab'];
$extraid      = $attributes['extraid'];
$imageUrl = is_array($image) ? $image['url'] : $image;
?>

<section class="featured-article <?php echo $titlePosition; ?> <?php echo $imagePosition; ?>" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
    <div class="container">
        <div class="article-title d-flex align-items-center">
            <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />
            <?php echo esc_attr($sectionText); ?>
        </div>

        <div class="featured-article--content d-flex">
            <div class="content">
                <div class="content-inner">
                    <div class="tags">
                        <?php echo esc_attr($sectionTag); ?>
                    </div>
                    <h1 class="heading-one">
                        <?php echo esc_attr($title); ?>
                    </h1>
                    <div class="content-para">
                        <?php echo esc_attr($subTitle); ?>
                    </div>
                    <?php if($buttonText) { ?>
                        <div class="d-flex action-button">
                            <a href="<?php echo esc_attr($btn_url); ?>" class="btn btn--gradient w-auto" target="<?php echo esc_attr( $link_target );?>"> <?php echo esc_attr($buttonText); ?> </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="image">
                <div class="image--oval-shape rellax" data-rellax-speed="2" data-rellax-xs-speed=".3" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                <div class="image--wrapper" style="background-image: url(<?php echo esc_url($imageUrl); ?>)"></div>
            </div>
        </div>

    </div>
</section>
