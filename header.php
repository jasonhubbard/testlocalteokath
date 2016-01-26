<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	</head>
	<body <?php body_class(); ?>>

			<!-- header -->
			<header id="header" class="header clear" role="banner">

			<div class="row">
					<!-- logo -->
					<div class="logo twelve columns">
						<a href="<?php echo home_url(); ?>">
							
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.gif" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->
                    
                    
                    
                    </div>
					<!-- /row -->
                    
					<!-- nav -->
                    
                  
                   		<nav class="nav" id="navigation">
                        <div class="container">
                         <div class="row">
                    
                    <div class="twelve columns">
                    <?php // get the_boutique variable
					include 'content-which-boutique.php'; ?>
                        <?php if( (is_page('wimbledon')) || ($post->post_parent == '7') || ($the_boutique=="wimbledon") ) {
							// Wimbledon                        	
							 wimbledon_nav();
                         } else if( (is_page('canterbury')) || ($post->post_parent == '56') || ($the_boutique=="canterbury") ) {
                        	// Canterbury                        	
							 canterbury_nav();
                        } else if( (is_page('elys-of-wimbledon')) || ($post->post_parent == '902') || ($the_boutique=="elys") ) {
                        	// Canterbury                        	
							 elys_nav();
                        } else { 
                        	// Boutique                        	
							 boutique_nav();
                        } ?>
                        
                        <span id="pull">Show Navigation</span> 
                        </div>
                        </div>
                        </div>
					</nav>
					
					<!-- /nav -->

			</header>
			<!-- /header -->

<!-- wrapper -->
		<div class="container">