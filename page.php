<?php get_header(); ?>
    
    <!-- Main Content -->
    <div class="col-md-9">

     <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
      <?php endwhile; ?>

    <?php else : ?>

      <h2><?php _e('No content.', 'fabel_bootstrap' ); ?></h2>
      <p class="lead"><?php _e('Sorry no content found.', 'fabel_bootstrap' ); ?></p>
      
    <?php endif; ?>
      
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>