<?php get_header(); ?>

<div class="wrap main">
    <section class="posts">
    <?php
	/* Run the loop to output the posts.
	* If you want to overload this in a child theme then include a file
	* called loop-index.php and that will be used instead.
	*/
	get_template_part( 'loop', 'index' );
	?>
	</section>


	<section class="sidebar">
        <article class="posts-widget">
            <h2>Posts</h2>
            <ul>
                <?php 
					$args = array(
						'posts_per_page' => -1
					);

					$the_query = new WP_Query( $args );

					// The Loop
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li data-id="<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile;
				?>
            </ul>
        </article>
    </section>
</div>

<?php get_footer(); ?>