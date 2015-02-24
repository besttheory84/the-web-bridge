<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( ' | ', true, 'right' ); ?></title>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/animate.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>

</head>



<body <?php body_class(); ?> id="page-top">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

        <div class="container">

            <div class="navbar-header page-scroll">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <!-- <a class="navbar-brand" href="<? echo home_url(); ?>"><? bloginfo('name'); ?></a> -->

            </div>

        

        <?	wp_nav_menu( array(

                'menu'	=> 'primary',

                'theme_location'    => 'primary',

                'depth'             => 2,

                'container'         => 'div',

                'container_class'   => 'collapse navbar-collapse',

                'container_id'      => 'bs-example-navbar-collapse-1',

                'menu_class'        => 'nav navbar-nav navbar-right',

                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',

                'walker'            => new wp_bootstrap_navwalker())); ?>

        </div>

    </nav>

    

	<header class="header" role="banner">

	<div class="mask">

		<section class="branding">

        	<div class="container">

            	<div class="row">

                	<div class="col-md-12">

                        <div class="circle animated zoomInDown">

                            <img src="<?php echo get_template_directory_uri(); ?>/images/bridge.svg" />

                        </div>

                        <div class="site-title">

                            <?php if ( ! is_singular() ) { echo '<h1>'; } ?>

                            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>

                            <?php if ( ! is_singular() ) { echo '</h1>'; } ?>

                        </div>

                        <div class="site-description">

                            <?php bloginfo( 'description' ); ?>

                        </div>

                        <a class="button hover" href="#featured">Check everything out <i class="fa fa-angle-down"></i></a>

                  	</div>

               	</div>

           	</div>

		</section>

	</div>

	</header>