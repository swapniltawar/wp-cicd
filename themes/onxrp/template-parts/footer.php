<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package  ONXRP
 */

?>

<footer class="footer rellax" data-rellax-percentage=".1" data-rellax-speed="0">
    <div class="container footer--container">
        <div class="footer--top">
            <div class="footer--links">
            <?php dynamic_sidebar( 'footer-menu-first' ); ?>
            <?php dynamic_sidebar( 'footer-menu-second' ); ?>
            <?php dynamic_sidebar( 'footer-menu-third' ); ?>
            <?php dynamic_sidebar( 'footer-menu-fourth' ); ?>


            </div>

            <div class="footer--social">
                <?php
                 $social_media_youtube = get_theme_mod( 'social_media_youtube' ) ;
                 if(!empty($social_media_youtube)) { ?>
                <a target="_blank" href="<?php echo $social_media_youtube ?>">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/youtube-icon.svg" alt="onXRP" />
                </a>
                <?php } ?>
                <?php
                 $social_media_twitter = get_theme_mod( 'social_media_twitter' ) ;
                 if(!empty($social_media_twitter)) { ?>
                <a target="_blank" href="<?php echo $social_media_twitter ?>">
                    <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/twitter-icon.svg" alt="onXRP" />
                </a>
                <?php } ?>
            </div>
        </div>

        <div class="footer--subscribe">
            <div class="footer--logo">
            <?php
          $footer_logo = esc_url( get_theme_mod( 'footer_logo' ) );
          if(!empty($footer_logo)) { ?>
          <a href="<?php home_url() ?>">
          <img src="<?php echo $footer_logo ?>" alt="fotter logo">
          </a>
          <?php } ?>
            </div>

            <div class="sub-form">
                <div class="signup">
                    <form action="" id="ajax-mail-chimp-form">
                        <div class="form-field">
                            <input type="text"  name="email" class="email" placeholder="Enter your mail to join our mailing list" />
                            <div class="sub-button">
                                <button type="submit" name="subscribe" class="btn btn--gradient">
                                <span>YES, PLEASE</span> &gt;</button>
                            </div>
                            <div id="mailchimp-result">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="footer--copyright">
            <?php
            $footer_copyright_content = get_theme_mod( 'footer_copyright_content' ) ;
            if(!empty($footer_copyright_content)) { ?>
            <div class="column"><?php  _e($footer_copyright_content) ?></div>
            <?php } ?>
            <div class="column">
            <?php
            $footer_bottom_center = get_theme_mod( 'footer_bottom_center' ) ;
            if(!empty($footer_bottom_center)) { ?>
            <?php echo $footer_bottom_center ?>
            <?php } ?>
            </div>
            <div>
            <?php
            $footer_powered_text =  get_theme_mod( 'footer_powered_text' ) ;
            if(!empty($footer_powered_text)) { ?>
            <p><?php _e($footer_powered_text) ?></p>
            <?php } ?>
            </div>
        </div>
    </div>
</footer>
