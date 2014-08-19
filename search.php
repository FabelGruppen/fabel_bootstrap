<?php get_header(); ?>
    
    <!-- Main Content -->
    <div class="col-md-9">
      <?php if (have_posts()) : ?> 

        <table class="table table-hover">
          <caption><?php _e('Showing search results for ', 'fabel_bootstrap' ); ?><b><?php the_search_query(); ?></b></caption>
          <thead>
            <tr>
              <th><?php _e('Search results: ', 'fabel_bootstrap' ); ?></th>
            </tr>
          </thead>
          <tbody>

      <?php while (have_posts()) : the_post(); ?>

        <a href="<?php the_permalink(); ?>">
            <tr>
              <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
            </tr>
        </a>

      <?php endwhile; ?>

          </tbody>
        </table>  

        <?php else : ?>

          <h2>Zero results</h2>
          <h4 class="subheader"><?php _e('Sorry, your search for ', 'fabel_bootstrap' ); ?><?php the_search_query(); ?>, <?php _e('gave zero results. Please try again.', 'fabel_bootstrap' ); ?></h4>
            
          <?php endif; ?>
      
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>