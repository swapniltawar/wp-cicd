<?php
   /**
    * The template part for the Podacast post.
    *
    * @param array $attributes The post attributes.
    * @param string $content The inner posts.
    *
    * @package Clabs
    */

   namespace Clabs;

   $sectionText       = $attributes['sectionText'];
   $postNumber      = $attributes['postNumber'];
   $titleArticle      = $attributes['title'];
   $imagePosition     = $attributes['imagePosition'];
   $subTitle       = $attributes['subTitle'];
   $buttonText      = $attributes['buttonText'];
   $tagText    = $attributes['tagText'];
   $titlePosition     = $attributes['titlePosition'];
   $buttonPosition     = $attributes['buttonPosition'];
   $buttonUrl      = $attributes['buttonUrl'];
   $terms      = $attributes['terms'];
   $order_by_hold    = $attributes['orderBy'];
   $order_by_hold_split = (explode("/",$order_by_hold));
   $order = $order_by_hold_split[1];
   $orderBy = $order_by_hold_split[0];


   global $post;

   	$args = array(
   		'posts_per_page'   => $postNumber,
           'post_type'   => 'podcast',
   		'post_status'      => 'publish',
           'orderby'          => $orderBy,
           'order'            => $order,
           'tax_query' => array(
               array(
                   'taxonomy' => 'onxrp_podcast_category',
                   'field' => 'term_id',
                   'terms' => $terms,
               )
           )
   	);

       $recent_posts = get_posts( $args );
   ?>
<section class="podcast-post">
   <section class="featured-article <?php echo $titlePosition .' '.$imagePosition ?>">
      <div class="container">
         <?php if($titleArticle != '' || $subTitle != '' ){ ?>
         <div class="page-title">
            <?php if($titleArticle != ''){ ?>
            <h1 class="lined-title"><?php echo $titleArticle; ?> </h1>
            <?php } ?>
            <?php if($subTitle != ''){ ?>
            <div class="page-title--sub content-para">
               <?php echo $subTitle; ?>
            </div>
            <?php } ?>
         </div>
         <?php } ?>
         <div class="article-title d-flex align-items-center">
            <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/title-icon.svg" alt="onXRP" /><?php echo $sectionText;?>
         </div>
         <?php  $count = 1;
            foreach ( $recent_posts as $post ){

             $post_title = get_the_title( $post );
             $post_excerpt = get_the_excerpt( $post );
             $post_link = get_permalink( $post );
             $podacast_image = get_the_post_thumbnail_url($postID, 'full');
             $author_name = get_the_author();
             $post_date = get_the_date();
             $category = get_the_category();
            $currentcat = $category[0]->cat_ID;
            $currentcatname = $category[0]->cat_name;
            $currentcatslug = get_category_link($currentcat);

             if($count == 1) {  ?>
         <div class="featured-article--content d-flex">
            <div class="content">
               <div class="content-inner">
                  <div class="tags">
                     <?php echo $tagText; ?>
                  </div>
                  <a href="<?php echo $post_link; ?>">
                     <h1 class="heading-one">
                        <?php echo $post_title ?>
                     </h1>
                  </a>
                  <div class="content-para">
                     <?php echo $post_excerpt; ?>
                  </div>
                  <div>
                     <div class="author-name">
                        <?php echo $author_name; ?>
                     </div>
                     <div class="article-date">
                        <?php echo $post_date ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="image">
               <div class="image--oval-shape d-flex rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="1">
               </div>
               <a href=<?php echo $post_link; ?> class="image--wrapper" style="background-image: url(<?php echo  $podacast_image ?>">
               <span class="icon-play">
               <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-play.svg" alt="icon-play" />
               </span>
               </a>
            </div>
         </div>
      </div>
   </section>
   <section class="sub-articles sub-articles-full section-podcast-post <?php echo $buttonPosition ?>">
      <div class="container sub-articles--container">
         <div class="sub-articles--content ">
            <div class="sub-articles--column d-flex">
               <?php } else { ?>
               <div class="article-block">
                  <div class="article-block--image">
                     <img src="<?php echo  $podacast_image ?>" alt="onXRP" />
                     <a href="<?php echo $post_link; ?>" class="icon-play">
                     <img src="<?php echo  esc_url(THEMEURI); ?>/assets/images/icon-play.svg" alt="icon-play" /></a>
                  </div>
                  </a>
                  <div class="article-block--devider"></div>
                  <a href="<?php echo $post_link; ?>">
                     <h2 class="heading-three">
                        <?php echo $post_title; ?>
                     </h2>
                  </a>
                  <div class="author-name">
                     <?php echo $author_name; ?>
                  </div>
                  <div class="article-date">
                     <?php echo $post_date ?>
                  </div>
               </div>
               <?php } $count++; } ?>
               <div class="category-block article-block extra-block"></div>
               <div class="category-block article-block"></div>
               <div class="category-block article-block"></div>
            </div>
            <div class="big-cta d-flex  load-more rellax" data-rellax-speed="2" data-rellax-xs-speed=".8" data-rellax-mobile-speed=".3" data-rellax-tablet-speed=".7" data-rellax-desktop-speed="2">
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
               <a href="<?php echo $buttonUrl ?>" class="btn round-primary">
                  <span><?php echo $buttonText; ?></span>
                  <div class="btn-shape"></div>
               </a>
            </div>
         </div>
      </div>
   </section>
</section>