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

if ($the_query->have_posts()){ ?>
 <section class="post-list-card <?php echo $bg_color;?>"  <?php if (!empty($extraid)){ echo 'id="' . $extraid . '"'; } ?>>
    <div class="post-list-card--container post-list-card--two-column">
    <?php
    $i = 1;
    while ($the_query->have_posts()) : $the_query->the_post();
    $postid           = $post->ID;
    $page_header_read = get_post_meta($post->ID, 'page_header_read', true) ? get_post_meta($post->ID, 'page_header_read', true) : ($post);
    $page_title       = get_post_meta($post->ID, 'page_header_title', true);
    $post_type        = get_post_type($post->ID);
    $event_location   = get_post_meta($post->ID, 'event_location_content', true); ?>
        <div class="event-card <?php echo $text_color.' '.$card_bg_color;?> <?php if ($i % 2 == 0) { echo "event-card-with-image"; } else { echo "event-card-big"; } ?>">
            <?php if ($i % 2 !== 0) { ?>
                <div class="event-card-big-image">
            <?php } ?>
            <?php if ($i % 2 == 0) {
            if (has_post_thumbnail()) { ?>
                <div class="event-card--image">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php }
            } else {
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                } else { ?>
                <div class="corner-art wl-bg-orange"></div>
            <?php
                }
            } ?>
            <?php if ($i % 2 !== 0) { ?>
            </div>
            <?php } ?>
            <?php if ($i % 2 !== 0) { ?>
            <div class="event-card-big-content">
            <?php } ?>
            <div class="event-card--read-type">
                <div class="event-card--read">
                    <?php if (!empty($event_location)) {
                        echo $event_location;
                    } else {
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
            <div class="event-card--date <?php echo $text_color;?>">
                <div class="date-devider <?php echo $border_color;?>"></div>
                <?php echo get_the_date(); ?>
                <div class="date-devider <?php echo $border_color;?>"></div>
            </div>
            <div class="event-card--para">
                <?php the_excerpt(); ?>
            </div>
            <div class="read-more">
                <a href="<?php echo get_permalink(); ?>" class="read-more-btn <?php echo $text_color;?>"><?php echo esc_attr('Read More'); ?></a>
                <div class="border-bottom <?php echo $border_color;?>"></div>
            </div>

            <?php if ($i % 2 !== 0) { ?>
                </div>
            <?php } ?>
        </div>
        <?php
        $i++;
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php
}
