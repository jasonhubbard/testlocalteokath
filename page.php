<?php get_header(); ?>

		<!-- section -->
		<section class="twelve columns">

			<h1 class="u-center"><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

		</section>
		<!-- /section -->

	</div>

<?php get_footer(); ?>
