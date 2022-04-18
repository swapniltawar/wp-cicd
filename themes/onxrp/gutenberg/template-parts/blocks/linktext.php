<?php
/**
 * The template part for the Link Text.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;

$buttonText = $attributes['buttonText'];
$buttonTextSecond = $attributes['buttonTextSecond'];
$btn_url      = $attributes['buttonUrl'];
$buttonUrlSecond  = $attributes['buttonUrlSecond'];
$link_target  = $attributes['newTab'];
$sectionText  = $attributes['sectionText'];
$mainTitle = $attributes['mainTitle'];
?>

<section class=" sub-articles odd-row graphic-sub-section-wrapper">
        <div class="container sub-articles--container">
           <div class="article-title d-flex align-items-center">
                <img src="/wp-content/themes/onxrp/assets/images/title-icon.svg" alt="onXRP"><?php echo $sectionText ?>
            </div>
            <div class="sub-articles--content d-flex">
                <div class="big-cta even-odd-big-cta d-flex rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2">
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
                    <a target="<?php echo esc_attr( $link_target ); ?>"  href="<?php  echo esc_attr($btn_url); ?>" class="btn round-primary">
                        <span><?php echo esc_attr($buttonText); ?></span>
                        <div class="btn-shape"></div>
                    </a>
                </div>
                <div class="sub-articles--column">
                  <h2 class="lined-title"><?php echo esc_attr($mainTitle); ?></h2>
                </div>
                <div class="big-cta d-flex rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2">
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
                    <a href="<?php  echo esc_attr($buttonUrlSecond); ?>"  target="<?php echo esc_attr( $link_target ); ?>"  class="btn round-primary">
                        <span><?php echo esc_attr($buttonTextSecond); ?></span>
                        <div class="btn-shape"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
