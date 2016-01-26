<?php /* Template Name: Elys Landing Page */ get_header(); ?>

	<div class="row">
		<!-- section -->
		<article class="twelve columns">

			<h1 class="u-center"><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</article>
       
     </div>
     <?php $message_alert = get_field('message_alert'); 
	 if($message_alert){ ?>
     <div class="row message-alert">
     	<div class="ten columns offset-by-one">
     		<?php echo $message_alert; ?>
     	</div>
     </div>   
     <?php
	 }

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
