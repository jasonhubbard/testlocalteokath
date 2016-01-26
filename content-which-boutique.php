<?php 
// used to grab the current boutique
 $terms=get_the_terms( $post->ID, "boutiques" );
					
					if ( $terms && ! is_wp_error( $terms ) ) : 

						$which_boutique = array();

	foreach ( $terms as $term ) {
		$which_boutique[] = $term->slug;
	}
						
	$the_boutique = join( ", ", $which_boutique );
 endif; ?>