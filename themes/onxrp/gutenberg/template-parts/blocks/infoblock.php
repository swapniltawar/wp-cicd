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

$col1Text   = $attributes['col1Text'];
$col2Text   = $attributes['col2Text'];
$col3Text   = $attributes['col3Text'];
$buttonText = $attributes['buttonText'];
$buttonUrl  = $attributes['buttonUrl'];
$newTab     = $attributes['newTab'] == true ? '_blank' : '_self';

$col1Image    = $attributes['col1Image'];
$col1ImageUrl = is_array($col1Image) ? $col1Image['url'] : $col1Image;

$col2Image    = $attributes['col2Image'];
$col2ImageUrl = is_array($col2Image) ? $col2Image['url'] : $col2Image;

$col3Image    = $attributes['col3Image'];
$col3ImageUrl = is_array($col3Image) ? $col3Image['url'] : $col3Image;
?>

<section class="featured-projects">
    <div class="container featured-projects--container d-flex">
        <div class="featured-projects--left d-flex">
            <div class="featured-projects--tile">
                <h5 class="heading-five"><?php echo esc_attr($col1Text) ?></h5>
                <div class="tile-shape"></div>
                <div class="tile-image" style="background-image: url(<?php echo esc_url($col1ImageUrl); ?>)">
                </div>
            </div>

            <div class="featured-projects--tile">
                <h5 class="heading-five"><?php echo esc_attr($col2Text) ?></h5>
                <div class="tile-shape"></div>
                <div class="tile-image" style="background-image: url(<?php echo esc_url($col2ImageUrl); ?>)">

                </div>
            </div>

            <div class="featured-projects--tile">
                <h5 class="heading-five"><?php echo esc_attr($col3Text) ?></h5>
                <div class="tile-shape"></div>
                <div class="tile-image" style="background-image: url(<?php echo esc_url($col3ImageUrl); ?>)">

                </div>
            </div>
        </div>

        <div class="big-cta d-flex">
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
            <a href="<?php echo esc_url($buttonUrl); ?>"
                target="<?php echo esc_url($newTab); ?>"
                class="btn round-primary">
                <span><?php echo esc_attr($buttonText) ?></span>
                <div class="btn-shape"></div>
            </a>
        </div>
    </div>
</section>
