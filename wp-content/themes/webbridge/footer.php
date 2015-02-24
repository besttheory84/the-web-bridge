<div class="prefooter">
<?php get_sidebar(); ?>
</div>

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