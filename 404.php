<?php get_header(); ?>

	
		<!-- section -->
		<section>
        
        <div class="row">

			<h1 class="u-center">Sorry, this page no longer exists :(</h1>

			<!-- article -->
			<article>

				<p>Sorry, this page no longer exists because either the dress that was originally on this page has been sold or moved to another boutique, or you may have mistyped, or there was a technical glitch.</p>
                
                <p>Please navigate back to our boutiques using the navigation above or below.</p>
                
                <p>Updating test.ffff</p>
                
             </article>
             
             <div class="row">
             	<div class="four columns">
                <a href="<?php the_permalink(7); ?>">
	<img src="<?php echo get_template_directory_uri(); ?>/img/Wimbledon_boutique.jpg" alt="Wimbledon Boutique">
    <div class="button">Wimbledon Boutique</div>
	</a>
    </div>
    <div class="four columns">
                <a href="<?php the_permalink(56); ?>">
	<img src="<?php echo get_template_directory_uri(); ?>/img/Canterbury_boutique.jpg" alt="Canterbury Boutique">
    <div class="button">Canterbury Boutique</div>
	</a>
    </div>
    
    <div class="four columns">
                <a href="<?php the_permalink(902); ?>">
	<img src="<?php echo get_template_directory_uri(); ?>/img/Elys_boutique.jpg" alt="Elys of Wimbledon Boutique">
    <div class="button">Elys of Wimbledon Boutique</div>
	</a>
    </div>
             </div>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->

	</div>

<?php get_footer(); ?>
