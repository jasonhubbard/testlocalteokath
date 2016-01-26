<?php /* Template Name: Appointment Page */ get_header(); ?>

	
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<div class="row">
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h1 class="u-center"><?php the_title(); ?></h1>
            
            		<?php the_content(); ?>

			</article>
			<!-- /article -->
         </div>
         
         <div class="row">
         
         	<div class="six columns">
            
            	<?php the_field('appointment_form'); ?>
            
            </div>
            
            <div class="six columns desktop">
            
            	<?php if( have_rows('images') ): ?>

	<?php while( have_rows('images') ): the_row(); 
		// vars
		$image = get_sub_field('image'); ?>
				 <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="appointment-img">
	<?php endwhile; ?>
	</div>

<?php endif; ?>
            </div>
         
         </div>
            

		<?php endwhile; ?>
        
        <?php get_template_part( 'content-backtotop' ); ?>

		<?php endif; ?>

		</section>
		<!-- /section -->

	</div>

<?php get_footer(); ?>
