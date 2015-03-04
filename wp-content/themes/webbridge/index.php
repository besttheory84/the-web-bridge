<?php get_header(); ?>

<?php if(is_front_page()) { ?>

	<section class="group" id="featured">
    	<div class="container">
        	<div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="welcome-title">So, what exactly does that mean? What's the problem?</h2>
                    <div class="equation">
                        <i class="fa fa-code fa-5x wow animate zoomIn"></i> 
                        <span> + </span>
                        <i class="fa fa-suitcase fa-5x wow animate zoomIn"></i> 
                        <span> == "</span> 
                        <i class="fa fa-frown-o fa-5x wow animate zoomIn"></i>
                        <span>"</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>For Non-Developers</h3>
                    <h4 class="welcome-tagline">Developers are a unique breed (which is a nice way of saying weird). And let's be honest, not too many people fully understand what they do (and even less really care). But, if you are going to hire a web developer, then it may be expedient for you to at least have a basic understanding of what they are up to and what they are doing for you (and how).</h4>
                </div>
                <div class="col-md-6">
                    <h3>For Developers</h3>
                    <h4 class="welcome-tagline">When developers work with non-developers, that doesn't mean they know how to talk about web development in a non-technical way. Clearly, that can cause some problems. Mostly, these problems are due to a misunderstanding about what exactly is being done on a web project, or expectations are not entirely clear.</h4>
                </div>
            </div>
        </div>  
    </section>

    <section class="slide1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center wow animate zoomIn">We don't want you looking like this guy!</h1> 
                </div>
            </div>
        </div>
    </section>

    <section class="icons">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="welcome-title text-center">Well, how do we fix that?</h2>
                    <h4 class="welcome-tagline text-center">Glad you asked.  Here is what we hope to accomplish with this website:</h4>
                </div>
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

    <section class="slide2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center wow animate zoomIn">We just want everyone to be besties!</h1> 
                </div>
            </div>
        </div>
    </section>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="content" id="blog">
            <div class="container">
            	<div class="row">
                	<div class="col-md-12">
                    	<h2 class="welcome-title">With all that said, Check out our blog posts:</h2>
                        <h4 class="welcome-tagline text-center">We hope you will find them informative & entertaining!</h4>
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

    <section class="slide3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center wow animate zoomIn">You know we had to put one more cool bridge picture on here.</h1> 
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>