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
global $post, $wp_query;

$lead          = $attributes['lead'];
$title         =  $attributes['title'];
$content       = $attributes['content'];
$ctaText       =  $attributes['ctaText'];
$ctaLink       = $attributes['ctaLink'];
$postListType  = $attributes['postListType'];
$blocktype     = $attributes['selectedOption'];
$bg_color      = $attributes['backgoundColor'];
$card_bg_color = $attributes['cardBackgoundColor'];
$border_color  = $attributes['borderColor'];
$btn_border    = $attributes['borderColor'];
$text_color    = $attributes['textColor'];
$color_name    = '';
$extraid       = $attributes['extraid'];

if($btn_border == 'orange-border'){
    $color_name = 'orange';
} else if($btn_border == 'navy-border'){
    $color_name = 'navy';
}
if($border_color == 'orange-border'){
    $border_color = 'wl-bg-orange';
} else if($border_color == 'navy-border'){
    $border_color = 'wl-bg-navy';
}
$arrow_color = 'btn-'.$color_name;
if($blocktype === 'type1'){
    $post_per_page = 3;
}
else if($blocktype === 'type2'){
    $post_per_page = 2;
}
else if($blocktype === 'type3'){
    $post_per_page = 10;
}
else if($blocktype === 'onlytitle'){
    $post_per_page = 3;
}
$the_query = new \WP_Query( array(
    'post_type' => $postListType,
    'posts_per_page' => $post_per_page,
));

if($blocktype == 'type1') {
    include locate_template('/gutenberg/template-parts/blocks/postlistcard_block/card-3column.php');
}elseif($blocktype == 'type2') {
    include locate_template('/gutenberg/template-parts/blocks/postlistcard_block/card-2column.php');
}elseif($blocktype == 'type3') {
    include locate_template('/gutenberg/template-parts/blocks/postlistcard_block/card-slider.php');
}elseif($blocktype == 'onlytitle') {
    include locate_template('/gutenberg/template-parts/blocks/postlistcard_block/card-3col-title.php');
}
?>
