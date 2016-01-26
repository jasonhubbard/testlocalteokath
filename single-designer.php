<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    
    <div class="row">
        
        <div class="eight columns">

			<h1>
				<?php the_field('designer_name'); ?>
			</h1>
    	</div>
        
        <div class="four columns desktop">
		<?php // get the_boutique variable
			include 'content-which-boutique.php';
			 if( $the_boutique=="wimbledon" ) {
			//wimbledon designers
        	 $designerlink = get_permalink(11);
            } else if( ($the_boutique=="canterbury") && (get_field('sample_sale_designer')==1) ) {
			// canterbury designers
           	$designerlink = get_permalink(64);
             } else if( ($the_boutique=="canterbury") && (get_field('sample_sale_designer')==0) )  {
			// canterbury sample sale
           	$designerlink = get_permalink(247);
             } else if( $the_boutique=="elys" )  {
			// elys sample sale
           	$designerlink = get_permalink(941);
             } 
			 
			 // show button 
			 if($designerlink){ ?>
             <a href="<?php echo $designerlink; ?>" class="button change-designer">Change Designer</a>
             <?php } ?>
        </div>
    </div>    
    
    <div class="row">    
            <?php the_field('on-page_intro'); ?>
	</div>
    
    <?php $designerid = get_the_ID();
	
	if(get_field('item_thumbnail_size')=="portrait"){
		#landscape
		$thumbnailsize = "browse";
	} else {
		#portrait
		$thumbnailsize = "browsesmall";
	}
	
	// Paged
	$currentpage = get_permalink();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	// WP_Query arguments
$args = array (
	'post_type'              => array( 'designer-items' ),
	'posts_per_page'		 => '15',
	'paged'					 => $paged,
	'meta_query'             => array(
		array(
			'key'       => 'designer',
			'value'     => '"' . $designerid . '"', // quote marks used to match to ID exactly. Must keep to work!
			'compare' => 'LIKE'
		),
	),
);

// The Query
$designer_query = new WP_Query( $args );
$footer_note = get_field('footer_note');


	// pager
if($designer_query->max_num_pages>1){ ?>
    <div class="pager row">
    <span>Page</span>
    <?php
    for($i=1;$i<=$designer_query->max_num_pages;$i++){ ?>
        <a href="<?php echo $currentpage.'page/'.$i;?>" class="button<?php echo ($paged==$i)? ' active':'';?>"><?php echo $i;?></a>
        <?php
    }
    /*if($paged!=$designer_query->max_num_pages){?>
        <a href="<?php echo $currentpage.'page/'.$i;?>">Next</a>
    <?php } */ ?>
    </div>
<?php }

// The Loop
if ( $designer_query->have_posts() ) { $count=0; $showtoplink=1; ?>

<div class="row row-browse">
	<?php while ( $designer_query->have_posts() ) { $count++;
		$designer_query->the_post();
		
		if ( has_post_thumbnail() ) { 
			//item display markup - use include so variables are kept
			include('content-item-browse-view.php');
		} else {
			#reduce count by one
			$count--;
		}
		
		if($count==3) { echo '</div><div class="row row-browse">'; $count=0; }
	} ?>
	</div> <!-- //row -->
    <?php
	// pager
if($designer_query->max_num_pages>1){ ?>
    <div class="pager row">
    <span>Page</span>
    <?php
    for($i=1;$i<=$designer_query->max_num_pages;$i++){ ?>
        <a href="<?php echo $currentpage.'page/'.$i;?>" class="button<?php echo ($paged==$i)? ' active':'';?>"><?php echo $i;?></a>
        <?php
    }
    /*if($paged!=$designer_query->max_num_pages){?>
        <a href="<?php echo $currentpage.'page/'.$i;?>">Next</a>
    <?php } */ ?>
    </div>
<?php }
	} else {
	// no posts found but only show if footer note is empty
	if($footer_note==""){ ?>
    <div class="row">
     <div class="twelve columns">
     	<div class="footer-note">
     	<p>We are currently updating our <?php the_field('designer_name'); ?> items in stock. Please check back soon.</p>
     </div>
     </div>
    </div>
    <?php
	}
}

// Restore original Post Data
wp_reset_postdata();

	if($footer_note){ ?>
    <div class="row">
     <div class="twelve columns">
     	<div class="footer-note">
     	<?php echo $footer_note; ?>
     </div>
     </div>
    </div>
    <?php } ?>

<?php 
#Only show these if we actually have items being displayed
if($showtoplink){ ?>
      <div class="row">
        <div class="twelve columns">
        	<?php // show button 
			 if($designerlink){ ?>
        	  <a href="<?php echo $designerlink; ?>" class="button change-designer">Change Designer</a>
              <?php } ?>
			<a href="#header" class="button top-button">Top</a>
        </div>
    </div>    
    <?php } ?>

      
	<?php endwhile; ?>

	<?php endif; ?>
    
 

<?php get_footer(); ?>
