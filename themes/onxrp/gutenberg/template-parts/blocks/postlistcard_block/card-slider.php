<?php
/**
 * The template part for the card basic block.
 *
 * @param array $attributes The block attributes.
 * @param string $content The inner blocks.
 *
 * @package Clabs
 */

namespace Clabs;
?>
<section class="post-list-card <?php echo $bg_color.' '.$text_color;?>" <?php if( !empty($extraid) ){ echo 'id="'.$extraid.'"'; }?>>
    <div class="post-list-card--container post-list-card--slider">
        <div class="static-data">
            <div>
                <?php if(!empty($lead)) {?>
                <div class="sub-title">
                <?php echo wp_kses_post($lead); ?>
                </div>
                <?php } ?>

                <?php if(!empty($title)) {?>
                <div class="title">
                <?php echo wp_kses_post($title); ?>
                </div>
                <?php } ?>

                <?php if(!empty($content)){?>
                <div class="content">
                <?php echo wp_kses_post($content); ?>
                </div>
                <?php } ?>

                <?php if(!empty($ctaText)){?>
                <div class="link">
                    <a href="<?php  echo $ctaLink; ?>" class=" <?php echo $text_color;?> "><?php echo wp_kses_post($ctaText); ?></a>
                </div>
                <?php } ?>

            </div>
            <div class="swiper-button">
                <div class="swiper-button-prev postListPrev custom-prev-btn <?php echo $arrow_color;?>"></div>
                <div class="swiper-button-next postListNext custom-next-btn <?php echo $arrow_color;?>"></div>
            </div>
        </div>
        <div class="slider-data">
            <div class="swiper jsEventCardSwiper">
                <div class="swiper-wrapper">
                <?php
                $i = 1;
                if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) { $the_query->the_post();
                $postid           = $post->ID;
                $page_header_read = get_post_meta( $post->ID, 'page_header_read', true ) ? get_post_meta( $post->ID, 'page_header_read', true ) : ($post);
                $page_title       = get_post_meta( $post->ID, 'page_header_title', true );
                $post_type        = get_post_type($post->ID);
                $event_location   = get_post_meta( $post->ID, 'event_location_content', true );
                ?>
                    <div class="swiper-slide">
                        <div class="event-card event-card-with-image <?php echo $card_bg_color.' '.$text_color;?>">
                            <?php
                                if ( has_post_thumbnail() ) {?>
                                <div class="event-card--image">
                                    <?php
                                        the_post_thumbnail();
                                    ?>
                                </div>
                                <?php
                            } ?>
                            <div class="event-card--read-type">
                                <div class="event-card--read">
                                <?php if(!empty($event_location)){
                                        echo $event_location;
                                    }else {
                                        echo $page_header_read;
                                    } ?>
                                </div>
                                <div class="event-card--verticle-devider <?php echo $border_color;?>"></div>
                                <div class="event-card--type">
                                    <?php echo Get_Welocalize_Post_term($postid); ?>
                                </div>
                            </div>
                            <div class="event-card--subtitle">
                                <?php echo $page_title; ?>
                            </div>
                            <div class="event-card--date">
                                <div class="date-devider <?php echo $border_color;?>"></div>
                                <?php echo get_the_date();?>
                                <div class="date-devider <?php echo $border_color;?>"></div>
                            </div>
                            <div class="event-card--para">
                            <?php the_excerpt();?>
                            </div>
                            <div class="read-more">
                                <a href="<?php echo get_permalink();?>" class="read-more-btn <?php echo $text_color;?>"><?php echo esc_attr('Read More');?></a>
                                <div class="border-bottom <?php echo $border_color;?>"></div>
                            </div>
                        </div>
                    </div>
                        <?php
                            $i++;
                            }
                            wp_reset_postdata();
                            endif;
                        ?>
                </div>
                <div class="swiper-pagination custom-pagination"></div>
            </div>
        </div>
    </div>
</section>
