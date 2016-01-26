<?php /* Template Name: Sample Sale Landing Page */ get_header(); ?>
<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>
            
            <h1 class="u-center"><?php the_title(); ?></h1>
            
            <?php the_content(); ?>

			</article>
			<!-- /article -->
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
			'value'     => '0',
			'compare'   => '=',
		),
	),
		
    ) );
    ?>
<?php
	#Uppercase the boutique name
    if ( $itemtype_query->have_posts() ) : ?>


  <?php #<h1 class="u-center"><?php echo $itemtype->name; </h1>
  while ( $itemtype_query->have_posts() ) : $itemtype_query->the_post(); ?>
  
  <?php get_template_part( 'content-designer-list' ); ?> 
  
  <?php endwhile; ?>

<?php endif; ?>
<?php
    // Reset things, for good measure
    $itemtype_query = null;
    wp_reset_postdata();
}
?>
<?php get_template_part( 'content-backtotop' ); ?>

<?php endwhile; ?>

		<?php endif; ?>

		</section>
		<!-- /section -->
<?php get_footer(); ?>
gfgf