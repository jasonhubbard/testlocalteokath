<article class="row feature-list-row designer-list">
  <div class="four columns feature-list-img"> <a href="<?php the_permalink(); ?>">
    <?php 
				if ( has_post_thumbnail() ) {
	the_post_thumbnail('browse');
} ?>
    <div class="button">View Collection</div>
    </a> </div>
  <div class="eight columns">
    <div class="feature-list-info">
      <h2>
        <?php the_field('designer_name'); ?>
      </h2>
      <?php $sale_price_range = get_field('sale_price_range');
	  	if(($sale_price_range) && (get_field('sample_sale_designer')==0)):
			echo '<p class="sample-sale-range">Sale price range: ' . $sale_price_range . '</p>';
			endif;
			
	   the_content(); ?>
    </div>
  </div>
</article>
<?php edit_post_link(); ?>
