<?php /* Template Name: Designers Landing Page */ get_header(); ?>
		<?php 
		
		$boutique_name = get_field('boutique_name');
		
	$itemtypes = get_terms( 'item-type', 'orderby=ID&order=ASC' );
	
	foreach ( $itemtypes as $itemtype ) {
		
    $itemtype_query = new WP_Query( array(
        'post_type' => 'designer',
		'order'     => 'DESC',
		'orderby'       => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'item-type',
                'field' => 'slug',
                'terms' => array( $itemtype->slug ),
                'operator' => 'IN',
            ),
			array(
        'taxonomy' => 'boutiques',
        'terms' => array($boutique_name),
        'field' => 'slug',
    	),

        ),
		
   'meta_query'             => array(
		array(
			'key'       => 'sample_sale_designer',
			'value'     => '1',
			'compare'   => '=',
		),
	),
		
    ) );
    ?>
 
    <?php
	#Uppercase the boutique name
	$foo = get_field('boutique_name');
	$foo = ucfirst($foo);
    if ( $itemtype_query->have_posts() ) : ?>
    <section class="designer-section">
    <h1 class="u-center"><?php echo $foo . " " . $itemtype->name; ?></h1>
    <?php while ( $itemtype_query->have_posts() ) : $itemtype_query->the_post(); ?>
         <?php get_template_part( 'content-designer-list' ); ?> 
    <?php endwhile; ?>
    </section>
    <?php endif; ?>
    
    <?php
    // Reset things, for good measure
    $itemtype_query = null;
    wp_reset_postdata();
}
 ?>
 
<?php get_template_part( 'content-backtotop' ); ?> 

<?php get_footer(); ?>