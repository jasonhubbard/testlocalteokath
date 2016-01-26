<?php /* Template Name: Contact Page */ get_header(); ?>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
        
        <!-- section -->
		<section>

			<div class="row u-add-bottom">
            
            <h1 class="u-center"><?php the_title(); ?></h1>
            
            <?php the_content(); ?>

			</div>
            
            <div class="row contact-details">
            
            	<div class="six columns">
                	<h2>Address</h2>
                    <p><?php the_field('address'); ?></p>
                    
                    <h2>Telephone</h2>
                    <p><a href="tel:<?php the_field('telephone'); ?>"><?php the_field('telephone'); ?></a></p>
                    
                    <h2>Email</h2>
                    <p><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                    
                    <h2>Opening times</h2>
                    <?php the_field('opening_times'); ?>
                 </div>
                 
                <div class="six columns">
                
                <?php the_field('google_map'); ?>
                
                	<a href="<?php the_field('google_map_link'); ?>" target="_blank" class="button">View Larger Map</a>
                 </div>
           
           </section>
		<!-- /section -->
            
            <?php

// check if the repeater field has rows of data
if( have_rows('boutique_images') ): ?>

 <section>
         <?php $boutique_image_list_title = get_field('boutique_image_list_title');
		 
		 if($boutique_image_list_title): ?>
         <div class="row"><h2 class="u-center u-add-top u-remove-bottom"><?php echo $boutique_image_list_title; ?></h2></div>
         <?php
		 endif;

 	// loop through the rows of data
    while ( have_rows('boutique_images') ) : the_row(); ?>
    
    <div class="row u-add-top">
            <?php $image = get_sub_field('boutique_image'); ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                
      </div>
            
           <?php

    endwhile; ?>

</section>
<?php endif; ?>
 

		<?php endwhile; ?>


		<?php endif; ?>

		

<?php get_footer(); ?>
