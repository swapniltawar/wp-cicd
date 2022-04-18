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

$title        = $attributes['titleText'];
$description  = $attributes['descriptionText'];
$btn_text     = $attributes['buttonText'];
$btn_url      = $attributes['buttonUrl'];
$link_target  = $attributes['newTab'];
$bg_color     = $attributes['backgoundColor'];
$txt_color    = $attributes['textColor'];
$img_bg_color = $attributes['imgbackgoundColor'];
$btn_border   = $attributes['btnBorder'];
$extraid      = $attributes['extraid'];

?>

<section class="hero-block" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
    <div class="hero-block--container <?php echo $bg_color;?>">
        <div class="hero-block--image-bg <?php echo $img_bg_color; ?>">
            <?php
                $image_id = $attributes['image'];
                if ( isset( $ai_image_size ) ) {
                    $size = $ai_image_size;
                } else {
                    $size = 'full';
                }
                if(!empty($image_id)){
                    $image_caption = wp_get_attachment_caption( $image_id );
                    echo wp_get_attachment_image( $image_id , $size);
                }
            ?>
        </div>

        <div class="hero-block--content">
            <?php if(!empty($title)){ ?>
            <h1 class="heading-one <?php echo $txt_color; ?>">
                <?php echo wp_kses_post($title); ?>
            </h1>
            <?php  } ?>
            <?php if(!empty($description)){ ?>
            <div class="content-para <?php echo $txt_color; ?>">
            <?php echo wp_kses_post($description); ?>
            </div>
            <?php  } ?>
            <?php if(!empty($btn_text)){ ?>
            <div class="cta">
                <a href="<?php  echo esc_attr($btn_url); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"
                class="btn get-started <?php echo $btn_border; ?>">
                <?php echo esc_attr($btn_text); ?>
                </a>
            </div>
            <?php  } ?>
        </div>
    </div>
</section>
