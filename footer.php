			<!--
            <div class="row top-button">
            
            	<a href="#header" class="button">Top</a>
            
            </div>
            -->
            
            </div>
		<!-- /wrapper -->
            
            <!-- footer -->
			<footer class="footer">
            
            <div class="container">
            
            	<div class="row">
				
                <div class="four columns">
                	
                    <span class="follow-text">Follow us on</span>
                    
                    <ul class="social-footer">
                    	<li class="facebook-icon"><a href="<?php the_field('facebook','option'); ?>" onclick="javascript: _gaq.push(['_trackPageview', 'Facebook']);" target="_blank"></a></li>
                        <?php $pinterest = get_field('pinterest','option'); if($pinterest){ ?>
                        <li class="pinterest-icon"><a href="<?php echo $pinterest; ?>" onclick="javascript: _gaq.push(['_trackPageview', 'Pinterest']);" target="_blank"></a></li>
                        <?php }
						 $twitter = get_field('twitter','option'); if($twitter){ ?>
                        <li class="twitter-icon"><a href="<?php echo $twitter; ?>" onclick="javascript: _gaq.push(['_trackPageview', 'Twitter']);" target="_blank"></a></li>
                        <?php } ?>
                     </ul>
                </div>
                
                <div class="privacy eight columns">
                	<?php // get the_boutique variable
					include 'content-which-boutique.php'; ?>
                        <?php if( (is_page('wimbledon')) || ($post->post_parent == '7') || ($the_boutique=="wimbledon") ) {
							// Wimbledon                        	
							 echo '<a href="' . get_permalink(14) . '">Contact Us</a>';
                         } else if( (is_page('canterbury')) || ($post->post_parent == '56') || ($the_boutique=="canterbury") ) {
                        	// Canterbury                        	
							  echo '<a href="' . get_permalink(81) . '">Contact Us</a>';
                        } ?>
                        
                	&nbsp; &nbsp; <a href="#">Privacy Statement &amp; Cookie Policy</a> &nbsp; &nbsp;  &copy; Teokath of London <?php echo date('Y'); ?>
                </div>
                
                </div>
                
            </div>

			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>

	</body>
</html>
