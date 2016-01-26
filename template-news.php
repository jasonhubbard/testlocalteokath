<?php /* Template Name: News & Events Page */ get_header(); ?>

<section>
	<div class="row">
    	<h1 class="u-center"><?php the_title(); ?></h1>
	<?php

// check if the flexible content field has rows of data
if( have_rows('content') ): 

 	// loop through the rows of data
    while ( have_rows('content') ) : the_row(); 

		// check if it's a free text layout
        if( get_row_layout() == 'free_text' ): 

			 	echo '<article class="row">';

			 	echo '<h2 class="sub-title">' . get_sub_field('title') . '</h2>';
				
				the_sub_field('content');

				echo '</article>';
		
		// check if it's a multiple items layout
		elseif( get_row_layout() == 'multiple_featured_items' ):
		
			echo '<article class="row news-section">';
		
			echo '<h2 class="sub-title">' . get_sub_field('title') . '</h2>';
				
			$introduction = get_sub_field('introduction');
			if($introduction){
				echo "<p>" . $introduction . "</p>";
			}
			
			// check if the nested repeater field has rows of data
        	if( have_rows('featured_items') ): $count=0;

			 	echo '<div class="row row-browse">';

			 	// loop through the rows of data
			    while ( have_rows('featured_items') ) : the_row(); $count++;
				

					$item = get_sub_field('item');
					
					if( $item ): 

					// override $post
					$post = $item;
					setup_postdata( $post ); 
				
					if ( has_post_thumbnail() ) { 
						//item display markup
						$thumbnailsize="browse";
						include( 'content-item-browse-view.php' );
					} else {
						#reduce count by one
						$count--;
					}
		 		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
				endif;

	
					
					//insert new row for layout
					if($count==3) { echo '</div><div class="row row-browse">'; $count=0; }

				endwhile;

				echo '</div>';

			endif;
			
			the_sub_field('footer_text');
			
			echo '</article>';

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>
	<article class="row">
    	<h2 class="sub-title">More news about Teokath of London...</h2>
        <p>To read more news and articles about what’s happening in our boutiques and testimonials from our brides head over to our <strong><a href="<?php the_field('facebook','option'); ?>" target="_blank">Facebook</a></strong> page.</p>
        </article>

</section>

<?php get_footer(); ?>
