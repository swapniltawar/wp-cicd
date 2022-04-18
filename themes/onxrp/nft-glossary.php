<?php
/**
 * Php version 7.4
 * Template Name: NFTGlossaryPage
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

get_header();
global $post;
$onxrp_glossary_tag       = get_post_meta( $post->ID, 'onxrp_glossary_tag', true );
?>

<main>
   <div class="page-body-content nft-glossary">
      <div class="container">
          <h1 class="nft-glossary__title lined-title"><?php the_title();?></h1>
         <!-- volatility -->
         <div class="volatility">
            <div class="lhs">
               <div class="tags"><?php if(!empty($onxrp_glossary_tag)){ echo $onxrp_glossary_tag;} else { echo "Terms Of The Day";}?></div>
                <?php the_content(); ?>
            </div>
            <div class="rhs">
            <?php  if ( is_active_sidebar( 'sidebar-2' ) ) {
                dynamic_sidebar( 'sidebar-2' );
            }?>
            </div>
         </div>
         <!-- sorting -->
         <div class="sorting">
            <ul class="sorting__options sticky">
               <li class="active"><a href="#goto-letter-no">#</a></li>
               <li><a href="#goto-letter-A">A</a></li>
               <li><a href="#goto-letter-B">B</a></li>
               <li><a href="#goto-letter-C">C</a></li>
               <li><a href="#goto-letter-D">D</a></li>
               <li><a href="#goto-letter-E">E</a></li>
               <li><a href="#goto-letter-F">F</a></li>
               <li><a href="#goto-letter-G">G</a></li>
               <li><a href="#goto-letter-H">H</a></li>
               <li><a href="#goto-letter-I">I</a></li>
               <li><a href="#goto-letter-J">J</a></li>
               <li><a href="#goto-letter-K">K</a></li>
               <li><a href="#goto-letter-L">L</a></li>
               <li><a href="#goto-letter-M">M</a></li>
               <li><a href="#goto-letter-N">N</a></li>
               <li><a href="#goto-letter-O">O</a></li>
               <li><a href="#goto-letter-P">P</a></li>
               <li><a href="#goto-letter-Q">Q</a></li>
               <li><a href="#goto-letter-R">R</a></li>
               <li><a href="#goto-letter-S">S</a></li>
               <li><a href="#goto-letter-T">T</a></li>
               <li><a href="#goto-letter-U">U</a></li>
               <li><a href="#goto-letter-V">V</a></li>
               <li><a href="#goto-letter-W">W</a></li>
               <li><a href="#goto-letter-X">X</a></li>
               <li><a href="#goto-letter-Y">Y</a></li>
               <li class=""><a href="#goto-letter-Z">Z</a></li>
            </ul>
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
                  if( $result ) { ?>
                    <div class="sorting__header" id="goto-letter-no" >#</div>
                    <div class="sorting__result">
                        <ul class="sorting__result__list">
                            <?php $i = 0;
                             foreach( $result as $letter => $posts ) {
                                if(is_numeric($letter)){
                                    foreach( $posts as $key => $post ) {
                                        if($i < 20 ){?>
                                        <li><a href="<?php echo esc_url(get_permalink($post['ID']));?>"><?php echo $post['title']; ?></a></li>
                                    <?php } else{
                                         break;
                                    }
                                    $i++;
                                    }
                                }
                            } ?>
                        </ul>
                        <a href="<?php echo esc_url(get_site_url().'/nft-glossary-terms?letter=%23');?>" class="read-more-link">See complete list of # terms ></a>
                    </div>
                    <?php
                    foreach( $result as $letter => $posts ) {
                        if(!is_numeric($letter)){ ?>
                            <div class="sorting__header" id="goto-letter-<?php echo $letter; ?>" ><?php echo $letter; ?></div>
                            <div class="sorting__result">
                                <ul class="sorting__result__list">
                                    <?php $j = 0;
                                    foreach( $posts as $key => $post ) {
                                        if($j < 20 ){?>
                                        <li><a href="<?php echo esc_url(get_permalink($post['ID']));?>"><?php echo $post['title']; ?></a></li>
                                    <?php } else{
                                         break;
                                    } $j++;
                                    }?>
                                </ul>
                                <?php if(!is_numeric($letter)){ ?>
                                    <a href="<?php echo esc_url(get_site_url().'/nft-glossary-terms?letter='.strtoupper($letter));?>" class="read-more-link">See complete list of <?php echo strtoupper($letter); ?> terms ></a>
                                <?php  } ?>
                            </div>
                        <?php  } ?>
                    <?php } ?>
                <?php }
                ?>
            </div>
         </div>
      </div>
   </div>
</main>

<?php
get_footer();
?>
