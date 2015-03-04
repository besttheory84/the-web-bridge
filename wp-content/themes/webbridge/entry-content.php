<section class="entry-content">
	<div class="blog-image-thumbnail clear">
    
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
        
   	
    <? if(!is_front_page()) { ?>
    <a target="_blank" class="hover" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin linkedin hover"></i></a>
    <a target="_blank" class="hover" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus google hover"></i></a>
    <a target="_blank" class="hover" href="http://twitter.com/home?status=Currently reading <?php the_permalink(); ?>"><i class="fa fa-twitter twitter hover"></i></a>
    <a target="_blank" class="hover" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook facebook hover"></i></a>
    <? } ?>
        
    </div>

	<?php the_content(); ?>

    <a target="_blank" class="hover" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin linkedin hover"></i></a>
    <a target="_blank" class="hover" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus google hover"></i></a>
    <a target="_blank" class="hover" href="http://twitter.com/home?status=Currently reading <?php the_permalink(); ?>"><i class="fa fa-twitter twitter hover"></i></a>
    <a target="_blank" class="hover" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook facebook hover"></i></a>
    <div class="clear"></div>

</section>