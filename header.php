<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Skift navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">     
          <?php 
                    wp_nav_menu( array(
                        'menu'       => '',
                        'depth'      => 2,
                        'container'  => false,
                        'menu_class' => 'nav navbar-nav',
                        'fallback_cb' => 'wp_page_menu',
                        //Process nav menu using our custom nav walker
                        'walker' => new wp_bootstrap_navwalker())
                    );
                  ?>
    </div><!-- /.navbar-collapse -->
  </nav>
</div>
<div class="container">
  <div class="row">