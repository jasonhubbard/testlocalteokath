<?php
			$shortname=get_field('short_name');
			
			if(get_field('sale_item')=="yes"){
		$order_new=get_field('order_new');
		$was_price=get_field('was_price');
		$sale_price=get_field('sale_price');
	} else {
		$order_new="";
		$was_price="";
		$sale_price="";
	} ?>
            <div class="four columns">
			<a href="<?php the_permalink(); ?>" class="item-thumbnail"><?php the_post_thumbnail($thumbnailsize); ?>
             <?php if($was_price && $sale_price){ ?>
             <span class="sale-label">
             	<span class="was-price">Was: &pound;<?php echo $was_price; ?></span>&nbsp; &nbsp;
                <span class="sale-price">Sale Price: &pound;<?php echo $sale_price; ?></span>
            </span>
              <?php } ?>
            <?php if($shortname){ ?>
            <span class="button"><?php echo $shortname; if($order_new=="yes" && $was_price<>""){ echo " *"; } ?></span>
            <?php } ?>
            </a>
            <?php edit_post_link(); ?>
            </div>