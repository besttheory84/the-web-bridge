<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( ' | ', true, 'right' ); ?></title>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/animate.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo get_template_directory_uri(); ?>/main.css" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>

</head>



<body <?php body_class(); ?> id="page-top">

    <? if(is_front_page()) { ?>
	<header class="header" role="banner">
    <? } else { ?>
    <header class="inner-header" role="banner">
    <? } ?>

        <div class="mask">

            <section class="branding">

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <a href="/"><div class="site-title wow animate zoomIn">

                                <?php if ( ! is_singular() ) { echo '<h1>'; } ?>

                                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>

                                <?php if ( ! is_singular() ) { echo '</h1>'; } ?>

                                </div></a>
                            
                            <? if(is_front_page()) { ?>
                            <div class="site-description wow animated zoomIn">

                                <?php bloginfo( 'description' ); ?>

                            </div>

                            <a class="button hover" href="#featured">Learn more <i class="fa fa-angle-down"></i></a>
                            <? } ?>

                        </div>

                    </div>

                </div>

            </section>

        </div>
        
        <? if(is_front_page()) { ?>
            <a href="#blog"><i class="fa fa-chevron-down arrow-down animated bounceInUp"></i></a>
        <? } ?>

	</header>