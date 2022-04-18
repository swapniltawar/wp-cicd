<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package  ONXRP
 */

get_header();


$title        = get_theme_mod('onxrp_404_title') ? get_theme_mod('onxrp_404_title') : '404';
$sub_title    = get_theme_mod('onxrp_404_subtitle');
?>

<div class="common-page">
    <div class="body-content">

    <section class="page-404">
    <div class="container">
        <div class="page-404__header">
            <div class="lhs">
                <h1 class="lined-title"><?php echo wp_kses_post($title); ?></h1>
                <?php if($sub_title && !empty($sub_title)) {?>
                    <h1 class="lined-title">
                            <?php echo wp_kses_post($sub_title);?>
                            </h1>
                    <?php }?>
            </div>
            <div class="rhs">
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
                    <a href="<?php echo esc_url(home_url());?>" class="btn round-primary">
                        <span>home</span>
                        <div class="btn-shape"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    </div>
</div>

<?php
get_footer();
