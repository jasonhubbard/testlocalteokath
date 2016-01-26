<?php get_header(); ?>

<div class="row">
	<!-- section -->
	<section class="twelve columns">

	<?php if (have_posts()): while (have_posts()) : the_post();
	if(get_field('sale_item')=="yes"){
		$order_new=get_field('order_new');
		$was_price=get_field('was_price');
		$sale_price=get_field('sale_price');
	} else {
		$order_new="";
		$was_price="";
		$sale_price="";
	}
	?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
        	 <a href="javascript:javascript:history.go(-1)" class="button close desktop">Close</a>

			<!-- post title -->
			<h1>
				<?php the_title(); if($order_new=="yes" && $was_price<>""){ echo " *"; } ?>
			</h1>
            
             <?php
			
			if($was_price && $sale_price){ ?>
             <p class="item-feature">
             	Was: &pound;<?php echo $was_price; ?>&nbsp; &nbsp; Sale Price: &pound;<?php echo $sale_price; ?>
            </p>
            <?php }
			
			if($order_new=="yes" && $was_price<>""){ echo '<p>* This dress can still be ordered new at the original "Was" price.</p>'; }
			
			 if( have_rows('colour_chart') ): ?>
             	<span id="show-colours" class="button">View Available Colours</span>
			<?php endif;
			
			 $sub_title = get_field('sub_title');
			 
			 if($sub_title): ?>
             	<p class="item-feature"><?php echo $sub_title; ?></p>
             <?php endif;
			
			 the_content(); ?>
            
            <?php if( have_rows('colour_chart') ): $countcolour=0; $countcolourmobile=0;?>
           
            <div id="colour-chart">
		<div class="row colour-chart-row">
	<?php while( have_rows('colour_chart') ): the_row(); $countcolour++; $countcolourmobile++; ?>
        
        <div class="span_1_of_7<?php if($countcolour==1){ echo " first-child-desktop"; } if($countcolourmobile==1){ echo " first-child-mobile"; } ?>">
        	<?php $colourcode = get_sub_field('colour_code'); ?>
        	<div class="colour-block" style="background-color:<?php echo $colourcode; ?>;<?php if($colourcode=="#ffffff"){ echo 'border: 1px solid #ddd;'; } ?>"></div>
            <?php the_sub_field('colour_name'); ?>
        </div>
	<?php 
	if($countcolour==7){ echo '<span class="desktop-break"></span>'; $countcolour=0; }
	if($countcolourmobile==3){ echo '<span class="mobile-break"></span>'; $countcolourmobile=0; }
	endwhile; ?>
</div>
</div>
<?php endif; ?>
           

    <div class="large-item-view">
    <?php if( have_rows('images') ): ?>

	 <!-- Flickity HTML init -->
<div class="gallery gallery--full-width js-flickity" data-flickity-options='{ "contain": true, "resize": false, "autoPlay": true, "imagesLoaded": true, "selectedAttraction": 0.01, "friction": 0.15, "pageDots": false }'>
	<?php while( have_rows('images') ): the_row(); 
		// vars
		$image = get_sub_field('image'); ?>
				 <div class="gallery-cell"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>"></div>
	<?php endwhile; ?>
	</div>
    
    <?php else : ?>
    
    <!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<?php the_post_thumbnail('full'); // Fullsize image for the single post ?>
			<?php endif; ?>

<?php endif; ?>
   </div>
            

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1>Item not found</h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->

</div>

<div class="row item-social-row">
        <div class="twelve columns">
        	<a href="javascript:javascript:history.go(-1)" class="button close">Close</a>
            <a href="http://www.facebook.com/pages/Teokath-of-London/118876901490294?sk=wall" target="_blank" class="button social" onClick="javascript: _gaq.push(['_trackPageview', 'Facebook']);">Facebook</a>
            <a href="http://pinterest.com/teokath/" target="_blank" onclick="javascript: _gaq.push(['_trackPageview', 'Pinterest']);" class="button social">Pinterest</a>
            <a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" class="button social" target="_blank" onclick="javascript: _gaq.push(['_trackPageview', 'Twitter']);">Tweet</a>
            
        </div>
    </div>
<?php get_footer(); ?>
