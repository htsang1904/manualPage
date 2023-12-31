<?php get_header(); ?>

<!-- #primary -->
<div id="primary" class="sidebar-right clearfix"> 
  <!-- .ht-container -->
  <div class="ht-container">
    
    <!-- #content -->
    <section id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
/* Include the Post-Format-specific template for the content.
* If you want to overload this in a child theme then include a file
* called content-___.php (where ___ is the Post Format name) and that will be used instead.
*/
get_template_part( 'content', get_post_format() );
?>

<?php endwhile; ?>

<?php st_content_nav( 'nav-below' ); ?>

<?php else : ?>

  <?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

</section>
<!-- #content -->


<?php get_sidebar(); ?>

</div>
<!-- .ht-container --> 
</div>
<!-- #primary -->

<?php get_footer(); ?>