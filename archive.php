<?php get_header(); ?>
    
    <!-- Main Content -->
    <div class="col-md-9">

     <?php if ( have_posts() ) : ?>
      <header class="archive-header">
        <h3 class="archive-title"><?php
          if ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'fabel_bootstrap' ), get_the_date() );
          elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'fabel_bootstrap' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'fabel_bootstrap' ) ) );
          elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'fabel_bootstrap' ), get_the_date( _x( 'Y', 'yearly archives date format', 'fabel_bootstrap' ) ) );
          else :
            _e( 'Archives', 'fabel_bootstrap' );
          endif;
        ?></h3>
      </header><!-- .archive-header -->
      <div class="description">
        <?php echo term_description(); ?>
      </div>
      <?php /* The loop */ ?>
      <div class="stream">

        <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-12 columns">
          <div class="article-wrap">

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <?php 
            if ( has_post_thumbnail() ) {
               the_post_thumbnail('thumbnail');
            }
            else {
              echo 'No thumbnail found';
            }
            ?> 
            </a>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          </div>
        </div>
        <?php endwhile; ?>

      </div>
    <?php else : ?>

      
    <?php endif; ?>
      
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>