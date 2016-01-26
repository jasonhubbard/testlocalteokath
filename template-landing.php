<?php /* Template Name: Boutique Landing Page */ get_header(); ?>

	<div class="row">
		<!-- section -->
		<article class="eight columns boutique-landing-gowns">

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php 
					$bridal_gown_image = get_field('bridal_gown_image'); ?>
	<a href="<?php the_field('bridal_gown_link'); ?>">
	<img src="<?php echo $bridal_gown_image['url']; ?>" alt="<?php echo $bridal_gown_image['alt']; ?>">
    <div class="button">View our collection of designer Bridal Gowns</div>
	</a>

		<?php endwhile; ?>

		<?php endif; ?>

		</article>
        
        <article class="four columns u-pull-right">
        	<h2>News and Events</h2>
            <?php the_field('news_and_events'); ?>
            <p><a href="<?php the_field('news_and_events_link'); ?>" class="button">View our News and Events</a></p>
            
            <?php 
					$news_feature_image = get_field('news_feature_image'); ?>
	<a href="<?php the_field('news_and_events_link'); ?>" class="news-events-feature-link">
	<img src="<?php echo $news_feature_image['url']; ?>" alt="<?php echo $news_feature_image['alt']; ?>">
    <div class="button"><?php the_field('news_feature_button_text'); ?></div>
	</a>
        </article>
     </div>
     
     <?php

// check if the repeater field has rows of data
if( have_rows('full_width_intros') ):

 	// loop through the rows of data
    while ( have_rows('full_width_intros') ) : the_row(); ?>
    
    <div class="row boutique-full-row">
     	<div class="twelve columns">
     		<h2><?php the_sub_field('title'); ?></h2>
            <?php the_sub_field('intro'); ?>
            <a href="<?php the_sub_field('link'); ?>">
            	<?php
				$large_image = get_sub_field('large_image');
				
				if( !empty($large_image) ): ?>

	<img src="<?php echo $large_image['url']; ?>" alt="<?php echo $large_image['alt']; ?>">

<?php endif; ?>
                <div class="button"><?php the_sub_field('button_text'); ?></div>
            </a>   
        </div>
     </div>
      
           <?php

    endwhile;

else :

    // no rows found

endif;

?>

	</div>

<?php get_footer(); ?>
