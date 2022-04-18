<?php
/**
 * The template part for the Brand guide.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$sectionText = $attributes['sectionText'];
$buttonText = $attributes['buttonText'];
$image       = $attributes['image'];
$imageUrl = is_array($image) ? $image['url'] : $image;
$downloadfile = $attributes['downloadfile'];
$btn_url      = $downloadfile['url'];
$listId = onxrp_encrypt_decrypt($attributes['listId'],'e');
$Uniqueid = $attributes['blockId'];
?>

<section class="graphic-section-wrapper">
        <div class="featured-article">
            <div class="container">
            <div class="article-title d-flex align-items-center">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo $sectionText; ?>
                </div>
                <div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
                    <div class="image">
                        <div class="image--oval-shape rellax" data-rellax-speed=".9" data-rellax-xs-speed=".9" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2"></div>
                        <div class="image--wrapper" style="background-image: url(<?php echo esc_url($imageUrl); ?>)"></div>
                        <button id="brand-model-open-<?php echo $Uniqueid; ?>" class="brand-model-open btn btn--gradient" onclick="brand_model_open(event, '<?php echo $Uniqueid ?>');" id="download-brand"><?php echo esc_attr($buttonText); ?></button>

                    </div>
                </div>
            </div>
        </div>

          <!-- Download Dialog model -->
    <div id="brand-modal-<?php echo $Uniqueid; ?>" class="modal-window">
        <div class="download-brand">
            <div class="d-flex justify-content-between align-item-baseline">
                <h1>Download Brand Guide</h1>
                <button  onclick="brand_model_close(event,'<?php echo $Uniqueid ?>');"  class="modal-close model-button close-brand-model">
                <img src="/wp-content/themes/onxrp/assets/images/close.svg" width="20" height="20" alt="close" >
                </button>
            </div>
            <form action="" id="brand-form-<?php echo $Uniqueid; ?>">
                <div class="download-form form-field">
                    <p>Enter your Email Address</p>
                    <input type="text" name="email">
                    <div id="brand-result-<?php echo $Uniqueid ?>"></div>
                </div>
                <a download href="<?php echo esc_attr($btn_url); ?>" id="brand-download-<?php echo $Uniqueid ?>"></a>
                <input type="hidden" name="link_id" value="<?php echo esc_attr($listId); ?>"/>
                <div class="d-flex justify-content-between model-action ">
                    <button onclick="brand_model_close(event,'<?php echo $Uniqueid ?>');"  title="Close" class="modal-cancel model-button close-brand-model">Cancel</button>

                    <button onclick="brand_submit_function(event,'<?php echo $Uniqueid ?>');" type="submit" name="submit" class="model-button modal-enter">Enter
                     </button>
                </div>
            </form>

            </div>
        </div>
    </div>
    </section>