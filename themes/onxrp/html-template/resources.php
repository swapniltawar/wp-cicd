<?php
/**
 * Php version 7.4
 * Template Name: ResourcesPage
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */
get_header();
?>

<main>

     <!-- become a contributor -->
     <section class="graphic-section-wrapper">
        <div class="featured-article">
            <div class="container">
                <div class="article-title d-flex align-items-center">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />Brand Guide
                </div>
                <div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
                    <div class="image">
                        <div class="image--oval-shape"></div>
                        <div class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/contributor-img.png)">
                        </div>
                        <a href="#open-modal" class="btn btn--gradientr" id="download-brand">DOWNLOAD Brand guide</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- privacy policy -->
    <section class=" sub-articles odd-row graphic-sub-section-wrapper">
        <div class="container sub-articles--container">
           <div class="article-title d-flex align-items-center">
                <img src="http://localhost:4000/wp-content/themes/onxrp/assets/images/title-icon.svg" alt="onXRP">Additional Links
            </div>
            <div class="sub-articles--content d-flex">
                <div class="big-cta even-odd-big-cta d-flex">
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
                    <a href="#" class="btn round-primary">
                        <span>Privacy Policy</span>
                        <div class="btn-shape"></div>
                    </a>
                </div>
                <div class="sub-articles--column">
                  <h2 class="lined-title">PRIVACY POLICY/TERMS & CONDITIONS</h2>
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
                    <a href="#" class="btn round-primary">
                        <span>Terms & <br>Condition</span>
                        <div class="btn-shape"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Dialog model -->
    <div id="open-modal" class="modal-window">
        <div class="download-brand">
            <div class="d-flex justify-content-between align-item-baseline">
                <h1>Download Brand Guide</h1>
                <a href="#" title="Close" class="modal-close">
                <img src="/wp-content/themes/onxrp/assets/images/close.svg" width="20" height="20" alt="close" >
                </a>
            </div>
            <form>
                <div class="download-form">
                    <p>Enter your Email Address</p>
                    <input type="text">
                </div>
                <div class="d-flex justify-content-between model-action ">
                    <a href="#" title="Close" class="modal-cancel">Cancel</a>
                    <a href="#" title="enter" class="modal-enter">Enter</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
get_footer();
?>