<?php
/**
 * The template part for the Faq Block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$hideButton = $attributes['hideButton'];
$showButton = $attributes['showButton'];
$mainTitle = $attributes['mainTitle'];
$FaqData = $attributes['FaqData'];
?>

<?php if(! empty($FaqData) ) { ?>
<section class="faq-section">
            <div class="container faq-section--container">
                <div class="faq-section--left js-faq-section">
                    <h1 class="lined-title faq-title"><?php echo $mainTitle; ?></h1>

                    <div class="accordion js-accordion">

                       <?php foreach ($FaqData as $FaqItem) { ?>
                        <!-- accordion item -->
                        <div class="accordion__items">
                            <div class="accordion__header">
                                <button aria-expanded="false" aria-controls="collapseOne">
                                    <h3><?php echo $FaqItem['headingText']; ?></h3>
                                    <div class="expand-controls">
                                        <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-plus.svg" alt="icon">
                                        <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-minus.svg" alt="icon">
                                    </div>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse">
                                <div class="accordion-body">
                                    <p class="content-para"><?php echo $FaqItem['contentText']; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- accordion item -->
                     <?php } ?>
                    </div>
                </div>

                <div class="faq-section--right">
                    <div class="btn-wrapper js-faq-btn ">
                        <div class="faq-btn rellax"  data-rellax-speed="0" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="1" data-rellax-desktop-speed="2">
                            <span><?php echo $showButton; ?></span>
                        </div>

                        <div class="faq-btn faq-active">
                            <span><?php echo $hideButton; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>