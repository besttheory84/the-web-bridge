
	<? if(is_front_page()) { ?>
        <div class="col-md-4">
        	<div class="blog-post">
    <? } else { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 the-only">               
    <? } ?>            
                <header>
                
                <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
                <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> <?php edit_post_link(); ?>
                <?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
                </header>
                
                <? if(!is_front_page()) { ?>
                <div class="col-md-10 col-md-offset-1 the-only">  
                    <div class="the-only-post">
                <? } ?>
            
                <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
                <?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
            
			</div>
    	</div>
    <? if(!is_front_page()) { ?>
            </div>
        </div>
    </div>
   <? } ?>


