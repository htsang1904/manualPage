<?php if ( $wp_query->max_num_pages > 1) { ?>
  <!-- .page-navigation -->
  <div class="page-navigation clearfix">

    <div class="nav-previous">
      <?php previous_posts_link(__('&larr; Newer Entries', 'knowhow')) ?>
    </div>

    <?php st_pagination(); ?>

    <div class="nav-next">
      <?php next_posts_link(__('Older Entries &rarr;', 'knowhow')); ?>
    </div>
    
    <!-- /.page-navigation --> 
    
  </div>
  <?php } ?>