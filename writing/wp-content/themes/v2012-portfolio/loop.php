<?php if (have_posts()) : ?>
	   
	<?php while (have_posts()) : the_post(); ?>

		<article class="entry" data-id="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
               
          	<?php if( has_post_thumbnail() ){ ?>
	            <a href="<?php the_permalink(); ?>" class="feat-img">
	                <?php the_post_thumbnail(); ?>
	            </a>
            <?php } ?>
            
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <time class="postdate"><?php the_ID(); ?>. Published  <?php the_time('F j, Y') ?></time>

            <div class="post-content">
                <?php the_content('Continue Reading &raquo;'); ?>
            </div>
            <?php edit_post_link('- Edit'); ?>
        </article>

    <?php endwhile; ?>
	
        <div class="post-navigation">
            <div class="prev-post">
                <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'shaken' ) ); ?>
            </div>
            <div class="next-post">
               <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'shaken' ) ); ?>
            </div>
            <div class="clearfix"></div>
        </div>

<?php else : ?>
	<p>Article not found</p>
<?php endif; ?>