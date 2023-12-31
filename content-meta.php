<?php 
$st_post_meta = (array)  apply_filters( 'knowhow_get_theme_option', 'st_article_meta', array('date'=>1, 'author'=>1, 'category'=>1, 'comments'=>1) );
$number = get_comments_number(get_the_ID()); ?>

<?php if ( ($st_post_meta['date'] == 1) || ($st_post_meta['author'] == 1) || ($st_post_meta['category'] == 1) || ($st_post_meta['comments'] == 1) ) { ?>
  <ul class="entry-meta clearfix">

    <?php if ($st_post_meta['date'] == 1) { ?>
      <li class="date"> 
        <i class="fa fa-time"></i>
        <time datetime="<?php the_time('Y-m-d')?>" itemprop="datePublished"><?php the_time( get_option('date_format') ); ?></time>
      </li>
    <?php } ?>

    <?php if ($st_post_meta['author'] == 1) { ?>
      <li class="author">
        <i class="fa fa-user"></i>
        <?php the_author(); ?>
      </li>
    <?php } ?>


    <?php if ( ($st_post_meta['category'] == 1) && (!in_category( '1' )) ) { ?>
      <li class="category">
        <i class="fa fa-folder-close"></i>
        <?php the_category(' / '); ?>
      </li>
    <?php } ?>

    <?php if( ($st_post_meta['comments'] == 1) && ($number != 0)) { ?>
      <?php if ( comments_open() ){ ?>
        <li class="comments">
          <i class="fa fa-comment"></i>
          <?php comments_popup_link( __( '0 Comments', 'knowhow' ), __( '1 Comment', 'knowhow' ), __( '% Comments', 'knowhow' ) ); ?>
        </li>
      <?php } ?>
    <?php } ?>

  </ul>
  <?php } ?>

 