<footer class="entry-footer">
<!-- <span class="cat-links"><?php _e( 'Categories: ', 'blankslate' ); ?><?php the_category( ', ' ); ?></span><br />
<span class="tag-links"><?php the_tags(); ?></span><br />
<?php if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'blankslate' ) ) . '</a></span>';
} ?> -->
<span class="author vcard">Written by: <?php the_author_posts_link(); ?></span>
</footer> 