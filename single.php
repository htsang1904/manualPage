<?php get_header(); ?>

<?php
// Get sidebar position
$ht_post_sidebar = null;
$ht_post_sidebar = get_post_meta( get_the_ID(), 'st_post_sidebar', true );
if ($ht_post_sidebar == '') {
	$ht_post_sidebar = 'sidebar-right';
}
?>

<!-- #primary -->
<div id="primary" class="<?php echo esc_attr($ht_post_sidebar) ?> clearfix"> 
  <!-- .ht-container -->
  <div class="ht-container">

    <!-- #content -->
    <section id="content" role="main">
      
      <!-- #page-header -->
      <header id="page-header" class="clearfix">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php st_breadcrumb(); ?>
      </header>
      <!-- /#page-header --> 

      
      <?php while ( have_posts() ) : the_post(); ?>

        <?php st_set_post_views(get_the_ID()); ?>
        
        <?php get_template_part( 'content', 'meta' ); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
          
         <!-- .entry-header -->
         <header class="entry-header">
          
          <?php if ( has_post_format( 'video' )) { ?>
           <?php ht_post_format_video() ?>
         <?php } else { ?>
           <?php ht_post_format_standard() ?>
         <?php } ?>

       </header>
       <!-- /.entry-header -->
       
       
       <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links"><strong>' . __( 'Pages:', 'knowhow' ) .'</strong>', 'after' => '</div>' ) ); ?>
      </div>
      
      <?php if (is_single() && has_tag()) { ?>

        <div class="tags">
          <?php the_tags( '<strong> '.  __( 'Tagged:', 'knowhow' )  .' </strong>', '', ''); ?>
        </div>
      <?php } ?>
      
    </article>

    <?php if (apply_filters( 'knowhow_get_theme_option', 'st_single_authorbox', null )) { ?>
     <?php get_template_part('author-bio'); ?>
   <?php } ?>
   
   <?php if (apply_filters( 'knowhow_get_theme_option', 'st_single_related', null )) { ?>
     <?php get_template_part('single', 'related'); ?>
   <?php } ?>
   
<?php // If comments are open or we have at least one comment, load up the comment template
if ( comments_open() || '0' != get_comments_number() )
	comments_template( '', true ); ?>

<?php endwhile;  // end of the loop. ?>

</section>
<!-- #content -->

<?php if ($ht_post_sidebar != 'sidebar-off') {   ?>
  <?php get_sidebar(); ?>
<?php } ?>

</div>
<!-- .ht-container -->
</div>
<!-- /#primary -->

<?php get_footer(); ?>