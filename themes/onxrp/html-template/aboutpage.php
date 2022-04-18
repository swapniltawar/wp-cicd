<?php
/**
 * Php version 7.4
 * Template Name: AboutPage
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
    <section class="featured-article">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />Introduction to project
            </div>

            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
                        <div class="tags">
                            FEATURED PROJECTS
                        </div>
                        <h1 class="heading-one">
                            Building on the XRP Ledger.
                        </h1>
                        <div class="content-para">
                        The projects listed here have gone through an initial interview and passed vetting checks. Their listing onXRP is not an endorsement or financial advice.
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape"></div>
                    <div class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/about-banner.jpg)">

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="featured-projects">
        <div class="container featured-projects--container d-flex">
            <div class="featured-projects--left d-flex">
                <div class="featured-projects--tile">
                    <h5 class="heading-five">XPUNKs</h5>
                    <div class="tile-shape"></div>
                    <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                    </div>
                </div>

                <div class="featured-projects--tile">
                    <h5 class="heading-five">The Happy Cats</h5>
                    <div class="tile-shape"></div>
                    <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                    </div>
                </div>

                <div class="featured-projects--tile">
                    <h5 class="heading-five">Lame Lions</h5>
                    <div class="tile-shape"></div>
                    <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

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
                <a href="#" class="btn round-primary">
                    <span>more education articles</span>
                    <div class="btn-shape"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="featured-article second-option">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />OUR PARTNERS
            </div>

            <div class="featured-article--content d-flex">
                <div class="content">
                <div class="content-inner">
                        <div class="tags">
                            Community Leaders
                        </div>
                        <h1 class="heading-one">
                            This is a compilation of trusted XRPL resources and educators.
                        </h1>
                        <div class="content-para">
                            We can not vouch for everything that they might say, but we have found them to be extremely helpful when we are doing research. They are not financial advisors or licensed entities but they are experienced and have amassed quite a following. If you are interested in developments on XRP outside of what onXRP.com has provided, these are people that you might want to follow when you are doing your own research. As always, we recommend everyone to do research and make their own decisions!
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape shape-right "></div>
                    <div class="image--wrapper image--shape-wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/shocase-article.png)">

                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="partner-slider">
        <div class="container partner-slider--container">
            <div class="swiper partner-slider--swiper js-partnerSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five">XPUNKs</h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five">XPUNKs</h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five">XPUNKs</h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five">XPUNKs</h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five">XPUNKs</h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="featured-projects--tile">
                            <h5 class="heading-five">XPUNKs</h5>
                            <div class="tile-shape"></div>
                            <div class="tile-image" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/featured-projects-pic.png)">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-buttons">
                <div class="next-prev">
                    <div class="swiper-button-next"><span>Next</span></div>
                    <div class="swiper-button-prev"><div class="prev-circle"></div></div>
                </div>
                <div class="pagination">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-article">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" />Showcase Team
            </div>

            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
                        <h1 class="heading-one">
                            onXRP’s mission is to provide everyone in the XRP community with value by means of accessible information and user friendly tools.
                        </h1>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape"></div>
                    <div class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/shocase-article.png)">

                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <section class="team">
        <div class="container team--container">
            <div class="team--tile">
                <div class="team--shape">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-shape.svg" alt="onXRP" />
                </div>
                <h5 class="team--heading heading-five">
                    ceo
                </h5>
                <div class="team--pic-social">
                    <div class="pic">
                        <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-pic.png" alt="onXRP" />
                    </div>
                    <div class="social">
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="onXRP" /></a>
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-linkedin.svg" alt="onXRP" /></a>
                    </div>
                </div>
                <h3 class="team--name heading-three">
                    Kaj Leroy
                </h3>
                <div class="team--description">
                    ̉Kaj Leroy, founder and Chief Executive Officer of onXRP, ensures that all external communications are kept in line with the internal workings of onXRP. Having created and nourished the largest XRPL NFT project, XPUNKs, at a record breaking pace, his feets are an attestation of his capabilities in regards to the potential of onXRP. Not only will he ensure that the long-term vision of onXRP is upheld, he will also be instrumental in the development of sustainable corporate and business strategies.
                </div>
            </div>

            <div class="team--tile">
                <div class="team--shape">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-shape.svg" alt="onXRP" />
                </div>
                <h5 class="team--heading heading-five">
                    COO
                </h5>
                <div class="team--pic-social">
                    <div class="pic">
                        <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-pic.png" alt="onXRP" />
                    </div>
                    <div class="social">
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="onXRP" /></a>
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-instagram.svg" alt="onXRP" /></a>
                    </div>
                </div>
                <h3 class="team--name heading-three">
                    Bastiaan van Roekel
                </h3>
                <div class="team--description">
                    ̉Bastiaan van Roekel, founder and Chief of Operations of onXRP, has a lot of experience with dynamic environments, having run the most exclusive hotel of The Hage in The Netherlands for nearly two years. He had and still has a pivotal role within the XPUNKs community. In combination with his experience, Bastiaan’s vast array of knowledge will only add to the successes of onXRP. Bastiaan manages the financial, legal and operational aspects of onXRP.
                </div>
            </div>

            <div class="team--tile">
                <div class="team--shape">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-shape.svg" alt="onXRP" />
                </div>
                <h5 class="team--heading heading-five">
                    cmo
                </h5>
                <div class="team--pic-social">
                    <div class="pic">
                        <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-pic.png" alt="onXRP" />
                    </div>
                    <div class="social">
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="onXRP" /></a>
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-instagram.svg" alt="onXRP" /></a>
                    </div>
                </div>
                <h3 class="team--name heading-three">
                    George Kocher
                </h3>
                <div class="team--description">
                    ̉Founder and CMO of onXRP, George Kocher, is in charge of strategic oversight, SEO and networking. Since its inception in October of 2021, he has played an integral role in the accomplishments of XPUNKs. George started his career trading on wallstreet and has advised on many successful growth startups. In Addition to onXRP george owns a nationally recognized digital marketing agency. With a set of indispensable skills and connections, George will continue to be a key player in the success of onXRP. He will be working closely with the entire management team to add value wherever possible.
                </div>
            </div>

            <div class="team--tile">
                <div class="team--shape">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-shape.svg" alt="onXRP" />
                </div>
                <h5 class="team--heading heading-five">
                    ceo
                </h5>
                <div class="team--pic-social">
                    <div class="pic">
                        <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/team-pic.png" alt="onXRP" />
                    </div>
                    <div class="social">
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-twitter.svg" alt="onXRP" /></a>
                        <a href="#"><img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-instagram.svg" alt="onXRP" /></a>
                    </div>
                </div>
                <h3 class="team--name heading-three">
                    Louis de Jong
                </h3>
                <div class="team--description">
                    ̉Founder and head of media and communications, Louis de Jong, will handle everything relating to the onXRP content. Louis studied graphic design and international business management. Louis is working on his master degree in Civil engineering. He has a background in graphic design, business and is an experienced team-manager. This dynamic background, allows Louis to be a flexible and dynamic workflow throughout the team. Louis manages the team of content writers and is responsible for vendor management and podcast hosts.
                </div>
            </div>
        </div>
    </section>

     <!-- become a contributor -->
     <section class="graphic-section-wrapper">
        <div class="featured-article">
            <div class="container">
                <div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
                    <div class="image">
                        <div class="image--oval-shape"></div>
                        <div class="image--wrapper" style="background-image: url(<?php echo  esc_url(THEMEURI); ?>/assets/images/contributor-img.png)">
                        </div>
                        <a href="" class="btn btn--gradient">BECOME A CONTRIBUTOR</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>