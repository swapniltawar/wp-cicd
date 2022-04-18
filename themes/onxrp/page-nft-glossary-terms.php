<?php
/**
 * Php version 7.4
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */
get_header();
$letters = $_GET['letter'];
?>

<main>
   <div class="page-body-content nft-glossary nft-glossary--terms">
      <div class="container">
          <h1>Terms Beginning With '<?php echo $letters;?>'</h1>
         <!-- sorting -->
         <div class="sorting">
            <div class="result">
            <?php
                $result = array();
                  $query_args = array(
                      'post_type'      => 'glossary',
                      'post_status' => 'publish',
                      'posts_per_page' => -1,
                      'orderby' => 'title',
                      'order' => 'ASC',
                  );
                  $query = new WP_Query( $query_args );
                  if ( $query->posts ) {
                    foreach ( $query->posts as $key => $post ) {
                        $first_letter = strtoupper(substr($post->post_title,0,1));
                        if( ! empty( $first_letter ) ) {
                            $result[$first_letter][] = array(
                                'ID' => $post->ID,
                                'title' => $post->post_title,
                            );
                        }
                    }
                  }
                  if( $result ) {
                    if(($letters == '#')) {?>
                   <div class="sorting__result">
                         <ul class="sorting__result__list">
                            <?php foreach( $result as $letter => $posts ) { ?>
                                <?php if( is_numeric($letter) ){ ?>
                                    <?php foreach( $posts as $key => $post ) { ?>
                                        <li><a href="<?php echo esc_url(get_permalink($post['ID']));?>"><?php echo $post['title']; ?></a></li>
                                    <?php }?>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    }
                    foreach( $result as $letter => $posts ) {
                        if(!is_numeric($letter) &&  ($letters == $letter) ){ ?>
                            <div class="sorting__result">
                                <ul class="sorting__result__list">
                                    <?php foreach( $posts as $key => $post ) { ?>

                                        <li><a href="<?php echo esc_url(get_permalink($post['ID']));?>"><?php echo $post['title']; ?></a></li>
                                    <?php } ?>
                                </ul>

                            </div>
                        <?php  } ?>
                    <?php } ?>
                <?php }?>
            </div>
         </div>
      </div>
   </div>
</main>

<?php
get_footer();
?>
