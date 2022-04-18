<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package  ONXRP
 */


get_template_part( 'template-parts/footer', 'footer' );
?>



</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
<script>
   var rellax = new Rellax('.rellax', {
        center:true,
        breakpoints:[576, 768, 1201]
    });
</script>
</body>
</html>
