<?php get_header(); ?>

  <div class="col-md-12">
    <!-- Slider -->
    <div id="slider" class="carousel slide hidden-xs" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
          <?php
         $the_query = new WP_Query(array( 
          'post_type' => "slider", 
          'posts_per_page' => 5, 
          'offset' => 1 
          )); 
         while ( $the_query->have_posts() ) : 
         $the_query->the_post();
        ?>
        <li data-target="#slider" data-slide-to="1"></li>
          <?php 
         endwhile; 
         wp_reset_postdata();
          ?>
      </ol>


    <!-- Wrapper for slides -->
      <div class="carousel-inner">

      <?php query_posts( 'post_type=slider');
       $the_query = new WP_Query(array( 
        'post_type' => "slider", 
        'posts_per_page' => 1 
        )); 
       while ( $the_query->have_posts() ) : 
       $the_query->the_post();
      ?>
       <div class="item active">
        <?php the_post_thumbnail();?>
        <div class="carousel-caption transbox">
         <h3><?php the_title();?></h3>
        </div>
       </div><!-- item active -->
      <?php 
       endwhile; 
       wp_reset_postdata();
      ?>
      <?php
       $the_query = new WP_Query(array( 
        'post_type' => "slider", 
        'posts_per_page' => 5, 
        'offset' => 1 
        )); 
       while ( $the_query->have_posts() ) : 
       $the_query->the_post();
      ?>
       <div class="item">
        <?php the_post_thumbnail();?>
        <div class="carousel-caption transbox">
         <h3><?php the_title();?></h3>
        </div>
       </div><!-- item -->
      <?php 
       endwhile; 
       wp_reset_postdata();
      ?>
     </div><!-- carousel-inner -->

    <!-- Controls -->
      <a class="carousel-control left" href="#slider" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="carousel-control right" href="#slider" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div> <!-- / Slider end -->
  </div>
    
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

<?php get_footer(); ?>