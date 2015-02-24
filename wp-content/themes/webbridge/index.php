<?php get_header(); ?>

<?php if(is_front_page()) { ?>

	<section class="group" id="featured">
    	<div class="container">
        	<div class="row">
				<div class="col-sm-4">
				
					<?php if ( is_active_sidebar( 'left_column' ) && dynamic_sidebar('left_column') ) : else : ?>
						
                        <div class="widget">

							<?php echo '<h4>' . __('Widget Ready', 'blankslate') . '</h4>'; ?>
							<?php echo '<p>' . __('This left column is widget ready! Add one in the admin panel.', 'blankslate') . '</p>'; ?>

						</div>     

					<?php endif; ?>  

				</div>
				<div class="col-sm-4">

					<?php if ( is_active_sidebar( 'center_column' ) && dynamic_sidebar('center_column') ) : else : ?>

						<div class="widget">

							<?php echo '<h4>' . __('Widget Ready', 'adamos') . '</h4>'; ?>
							<?php echo '<p>' . __('This center column is widget ready! Add one in the admin panel.', 'adamos') . '</p>'; ?>

						</div> 

					<?php endif; ?> 

				</div>
				<div class="col-sm-4">

					<?php if ( is_active_sidebar( 'right_column' ) && dynamic_sidebar('right_column') ) : else : ?>

						<div class="widget">

							<?php echo '<h4>' . __('Widget Ready', 'adamos') . '</h4>'; ?>
							<?php echo '<p>' . __('This right column is widget ready! Add one in the admin panel.', 'adamos') . '</p>'; ?>

						</div>     

					<?php endif; ?> 

				</div>
           	</div>
        </div>
   	</section>
    <!-- end group -->

<?php } ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="content">
            <div class="container">
            	<div class="row">
                	<div class="col-md-12">
                    	<h2 class="welcome-title">Check out our blog posts:</h2>
                        <h4 class="welcome-tagline">We hope you will find them informative & entertaining!</h4>
                    </div>
                </div>
                <div class="row">
        
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'entry' ); ?>
                    <?php comments_template(); ?>
                    <?php endwhile; endif; ?>
                    <?php get_template_part( 'nav', 'below' ); ?>
                    
                </div>
            </div>
        </section>
        <!-- end content -->
	</article>
    
<?php get_footer(); ?>