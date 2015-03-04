<?php if(is_front_page()) { ?>
<!-- <div class="group prefooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="welcome-title">And just who are we?</h2>
                <h4 class="welcome-tagline text-center">Again, glad you asked!</h4>
            </div>
            <div class="col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/images/me.jpg" />
                <div class="text-center">
                    <a href="http://www.twitter.com/@RanTopClub" target="_blank" title="Follow me on Twitter"><i class="hover fa fa-twitter"></i></a>
                    <a href="http://www.github.io/besttheory84" target="_blank" title="See my work on GitHub"><i class="hover fa fa-github"></i></a>
                    <a href="http://randomtopicsclub.com/portfolio" target="_blank" title="See my portfolio site"><i class="hover fa fa-laptop"></i></a>
                </div>
                <h3>Robert Davis</h3>
                <h4 class="welcome-tagline">I love everything about front end development, and enjoy learning exciting new ways of doing things. When I'm not coding, I enjoy video games, movies, Netflix with my wife, building with Legos with my kids. Oh, and I like food too.</h4>
            </div>
            <div class="col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/images/brennan.jpg" />
                <div class="text-center">
                    <a href="https://github.com/davis1410" target="_blank" title="See my work on GitHub"><i class="hover fa fa-github"></i></a>
                    <a href="http://brennanscottdavis.com" target="_blank" title="See my portfolio site"><i class="hover fa fa-laptop"></i></a>
                </div>
                <h3>Brennan Davis</h3>
                <h4 class="welcome-tagline">I learned my first lines of HTML code when I was 12 years old during a special class my elementary school offered before regular class hours. Since then, I've developed a love for many forms of digital media, including web development, video production, and digital publishing. </h4>
            </div>
        </div>
    </div>
</div> -->
<?php } else { ?>
<div class="prefooter">
<?php get_sidebar(); ?>
</div>
<? } ?>

<footer id="footer" role="contentinfo">
	<div id="copyright">

	<?php 	echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); 
			echo sprintf( __( ' Theme By: %1$s.', 'blankslate' ), 'Robert Davis' ); ?>
	
    </div>
</footer>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/wow.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script>
	new WOW().init();
</script>
</body>
</html>