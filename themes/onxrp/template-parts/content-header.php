<?php
/**
 * Template part for displaying header content
 * php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

// Logo, Header Menu & App Button Settings
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
?>
<div class="nav-bar-wrapper">
<div class="container nav-bar">
    <div class="nav-bar--logo">
        <?php if ( has_custom_logo() && $show_title ) : ?>
            <div alt="onXRP" class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>
    </div>

    <nav class="nav-bar--nav" id="slide-top-modal">


    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            'menu_class'      => 'nav-bar--ul',
            'container_class' => 'header-menu-container',
            'items_wrap'      => '<ul id="header-menu-list" class="%2$s">%3$s</ul>'
        )
        );
    ?>

    <div class="mobile-nav-devider"></div>
    </nav>
    <div class="mobile-nav-overlay"></div>

    <div class="nav-bar--cta">
            <?php
            $button_text =  get_theme_mod( 'header_button_text' ) ;
            $button_target =  get_theme_mod( 'onxrp_header_button_target' ) ;
            $button_link =  get_theme_mod('header_button_link') ? get_theme_mod('header_button_link') : '#';
            if(!empty($button_text)) { ?>

            <a <?php if($button_target) { echo 'target="_blank"';} ?> href="<?php echo $button_link ?>" class="button-header">
                <svg  preserveAspectRatio="xMidYMid meet" style="transform: translate3d(0px, 0px, 0px)">
                    <defs>
                        <linearGradient id="grad1">
                        <stop offset="0%" stop-color="#0c01f4" />
                        <stop offset="100%" stop-color="#9f00b9" />
                        </linearGradient>
                    </defs>
                    <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="220" height="50"></rect>
                </svg>
                <span> <?php _e($button_text) ?></span>
            </a>

            <?php } ?>
    </div>

    <!-- Res-Menu -->
    <div class="mobile-nav" id="js-mobile-nav" data-id="slide-top-modal">
       <img src="/wp-content/themes/onxrp/assets/images/menu.svg" alt="menu" />
    </div>
</div>
</div>