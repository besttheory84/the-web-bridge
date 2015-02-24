<section class="content">
	<div class="container">
    	<div class="row">
            <aside id="sidebar" role="complementary">
            <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
            <div id="primary" class="widget-area">
            <ul class="xoxo">
            <?php dynamic_sidebar( 'primary-widget-area' ); ?>
            </ul>
            </div>
            <?php endif; ?>        
    		</aside>
       	</div>
   	</div>
</section>