<?php get_header(); ?>

		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>
            
            <h1 class="u-center"><?php echo get_bloginfo('name') . "<br>"; the_title(); ?></h1>
            
            <?php the_content(); ?>

			</article>
			<!-- /article -->
            
            <div class="row slideshow">
                <?php if( have_rows('slideshow') ): ?>

	 <!-- Flickity HTML init -->
<div class="gallery gallery--full-width js-flickity" data-flickity-options='{ "contain": true, "resize": false, "autoPlay": true, "wrapAround": true, "pageDots": false, "imagesLoaded": true }'>
	<?php while( have_rows('slideshow') ): the_row(); 
		// vars
		$slide = get_sub_field('slide'); ?>
				 <div class="gallery-cell">
				 <?php $link = get_sub_field('link'); ?>
                 <?php if($link) { ?>
                 <a href="<?php echo $link; ?>">
                 <?php } ?>
                 <img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>">
                  <?php if($link) { ?>
                 </a>
                 <?php } ?>
                 </div>
	<?php endwhile; ?>
	</div>
    
    <?php else : ?>
    
    <!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<?php the_post_thumbnail('full'); // Fullsize image for the single post ?>
			<?php endif; ?>

<?php endif; ?>
			</div>
            
            <?php

// check if the repeater field has rows of data
if( have_rows('boutiques') ):

 	// loop through the rows of data
    while ( have_rows('boutiques') ) : the_row(); ?>
    
    <article class="row feature-list-row">
            
            	<div class="four columns feature-list-img">
                <a href="<?php the_sub_field('link'); ?>">
                	<?php 
					$image = get_sub_field('boutique_image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

<?php endif; ?>

<div class="button">Enter <?php the_sub_field('boutique_title'); ?></div>
</a>
                </div>
                
                <div class="eight columns">
                	<div class="feature-list-info">
                	<h2><?php the_sub_field('boutique_title'); ?></h2>
                    
                    <?php the_sub_field('boutique_text'); ?>
                	</div>
            	</div>
                
            </article>
            
           <?php

    endwhile;

else :

    // no rows found

endif;

?>
 

		<?php endwhile; ?>


		<?php endif; ?>

		</section>
		<!-- /section -->

<?php get_footer(); ?>
