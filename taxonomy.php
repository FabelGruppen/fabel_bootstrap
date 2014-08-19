<?php get_header(); ?>
    
    <!-- Main Content -->
    <div class="col-md-9">

     <?php if ( have_posts() ) : ?>
      <header class="taxonomy-header">
        <h2 class="taxonomy-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
      </header><!-- .taxonomy-header -->
      <div class="description">
        <?php echo term_description(); ?>
      </div>
      <?php /* The loop */ ?>
      <div class="row stream">

        <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-12 columns">
          <div class="article-wrap">

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
            <?php 
            if ( has_post_thumbnail() ) {
               the_post_thumbnail();
            }
            else {
             
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