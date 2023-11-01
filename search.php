<?php
/**
* The template for displaying Search Results pages.
*
*/
?>

<?php
// Get HP sidebar position
$st_hp_sidebar = apply_filters( 'knowhow_get_theme_option', 'st_hp_sidebar', null );
if ($st_hp_sidebar == 'fullwidth') {
	$st_hp_sidebar = 'sidebar-off';
} elseif ($st_hp_sidebar == 'sidebar-l') {
	$st_hp_sidebar = 'sidebar-left';
} elseif ($st_hp_sidebar == 'sidebar-r') {
	$st_hp_sidebar = 'sidebar-right';	
} else {
	$st_hp_sidebar = 'sidebar-right';
}
?>

<?php if(!empty($_GET['ajax']) ? $_GET['ajax'] : null) { // Is Live Search ?>

  <?php
// Get FAQ slug from options
  $st_faq_slug = 'faq';
  $st_faq_slug = apply_filters( 'knowhow_get_theme_option', 'st_faq_slug', null );
  ?>

  <?php if (have_posts()) { ?>

    <ul id="search-result">
      <?php while (have_posts()) : the_post(); ?>
        
        <?php
	// Set search result class	
        if ( has_post_format( 'video' )) { 
         $st_search_class = 'video';
       } elseif ( 'st_faq' == get_post_type() ) {
         $st_search_class = 'faq';
       } else {
         $st_search_class = 'standard';
       }
       ?>
       <li class="<?php echo esc_attr($st_search_class); ?>">
        <?php if ( 'st_faq' == get_post_type() ) { ?>
          <a href="<?php echo home_url(); ?>/<?php echo esc_attr($st_faq_slug); ?>/#faq-<?php the_ID(); ?>"><?php the_title(); ?></a>
        <?php } else { ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php } ?>
      </li>
    <?php endwhile; ?>
    
  </ul>

<?php } else { ?>

  <ul id="search-result">
    <li class="nothing-here"><?php _e( "Sorry, no posts were found.", "knowhow" ); ?></li>
  </ul>

<?php } ?>

<?php } else { // Is Normal Search ?>

  <?php get_header(); ?>


  <!-- #primary -->
  <div id="primary" class="<?php echo esc_attr($st_hp_sidebar); ?> clearfix"> 
    <!-- .ht-container -->
    <div class="ht-container">
      
      <!-- #content -->
      <section id="content" role="main">
        
        <!-- #page-header -->
        <header id="page-header" class="clearfix">
          <h1 class="page-title"><?php printf( __( 'Kết quả cho: %s', 'knowhow' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
          <p><?php _e( "Đây là những gì chúng tôi đã tìm thấy cho bạn", "knowhow" ); ?></p>
        </header>
        <!-- /#page-header -->
        
        <?php if ( have_posts() ) { ?>

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>

           <?php get_template_part( 'content', get_post_format() ); ?>

         <?php endwhile; ?>

         <?php get_template_part( 'page', 'navigation' ); ?>

       <?php } else { ?>

        <?php get_template_part( 'content-none' ); ?>

      <?php } ?>

    </section>
    <!-- #content -->

    <?php if (apply_filters( 'knowhow_get_theme_option', 'st_hp_sidebar', null ) != 'fullwidth') {   ?>
      <?php get_sidebar(); ?>
    <?php } ?>

  </div>
  <!-- /.ht-container -->
</div>
<!-- #primary -->

<?php get_footer(); ?>

<?php } ?>