<?php get_header(); ?>
    
    <!-- Main Content -->
    <div class="col-md-9">

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

          <?php if ( has_post_thumbnail()) : ?>
             <a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('thumbnail'); ?></a>
           <?php endif; ?>

          <?php the_content(); ?>

        <?php endwhile; ?>

      <?php else : ?>

        <h2><?php _e('No posts.', 'fabel_bootstrap' ); ?></h2>
        <p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'fabel_bootstrap' ); ?></p>
        
      <?php endif; ?>
      
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>