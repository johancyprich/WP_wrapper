<!--
  Template: WP_wrapper
  Version: 1.5.0
  Date: January 1, 2008
  Author: Johan Cyprich
  Author_Email: jcyprich@live.com
  Author_URL: www.cyprich.com

  SUMMARY:
  Minimal WordPress template for use as a wrapper in other CMS', such as Joomla.
-->

<?php get_header (); ?>
    
<div id="container">
  <?php if (have_posts ()) :?>
    <?php while (have_posts ()) : ?>
      <?php the_post (); ?>
          
      <div class="post" id="post-<?php the_ID (); ?>">
        <h2><a href="<?php the_permalink (); ?>" title="<?php the_title (); ?>"><?php the_title (); ?></a></h2>
        <?php the_date (); _e (' by '); ?><a href="#"><?php the_author (); ?></a>
        <?php edit_post_link ('Edit', ' &#124; ', ''); ?>
          
        <div class="entry">
          <?php
          
            // If page opened is Category, Archive, or Search, display blog post as an excerpt;
            // otherwise display full content of post.
            
            if (is_category () || is_archive () || is_search ())
              the_excerpt ();
            
            else 
              the_content ();
          
          ?>
              
          <p class="postmetadata">
            <?php _e ('Posted in '); the_category (', '); _e (' &#124 '); ?>
            <?php comments_popup_link ('No Comments &#187', '1 Comment &#187', '% Comments &#187'); ?>                
  			  </p>
        </div> <!-- div class="entry" -->
            
      </div> <!-- div class="post" -->
          
    <?php endwhile; ?>
        
    <div class="navigation">
      <?php posts_nav_link ('', 'Newer Posts', 'Older Posts'); ?>
    </div>
        
  <?php else : ?>
    <div class="post">
      <h2><?php _e ('No posts found in blog.'); ?></h2>
    </div> <!-- div class="post" -->
  <?php endif; ?>
</div> <!-- div id="container" -->

<?php get_sidebar (); ?>

<div class="brclear"></div>

<?php get_footer (); ?>