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

<section class="post-list-card media-text-photo-cards <?php if (!empty($bg_color)){ echo $bg_color; } ?>"  <?php if (!empty($extraid)){ echo 'id="' . $extraid . '"'; } ?>>
    <div class="post-list-card--container post-list-card--three-column">
    <?php
    $i = 1;
    while ($the_query->have_posts()):
        $the_query->the_post();
        $page_header_read = get_post_meta($post->ID, 'page_header_read', true) ? get_post_meta($post->ID, 'page_header_read', true) : ($post);
        $page_title = get_post_meta($post->ID, 'page_header_title', true);
        $post_type = get_post_type($post->ID);
        $event_location = get_post_meta($post->ID, 'event_location_content', true);
        ?>
        <div class="event-card <?php echo $card_bg_color.' '.$text_color;?>">
            <div class="event-card--subtitle">
                <a href="<?php echo get_permalink();?>">
                    <?php echo $page_title; ?>
                </a>
            </div>
            <div class="event-card--date <?php if (!empty($text_color)) { echo $text_color; } ?>">
                <div class="date-devider <?php if (!empty($border_color)) {  echo $border_color;  } ?>"></div>
                <?php echo get_the_date(); ?>
                <div class="date-devider <?php if (!empty($border_color)) {echo $border_color; } ?>"></div>
            </div>
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
