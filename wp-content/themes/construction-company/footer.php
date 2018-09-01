<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Construction_Company
 */

$ed_section = construction_landing_page_home_section();
if( is_home() || ! $ed_section || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ) echo '</div></div></div>';
?>
	<footer id="colophon" class="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<?php if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) { ?>      

		<div class="footer-t">
			<div class="container">
				<div class="row">
					
					<?php if( is_active_sidebar( 'footer-one' ) ){ ?>
    					<div class="column">
    					   <?php dynamic_sidebar( 'footer-one' ); ?>	
    					</div>
                    <?php } ?>

                    <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                        <div class="column">
    					   <?php dynamic_sidebar( 'footer-two' ); ?>	
    					</div>
                    <?php } ?>

                    <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                        <div class="column">
    					   <?php dynamic_sidebar( 'footer-three' ); ?>	
    					</div>
                    <?php } ?>

				</div>
			</div>
		</div>

	<?php } 
	$copyright_text = get_theme_mod( 'construction_landing_page_footer_copyright_text' ); ?>

		<div class="site-info">

			<div class="container">
				<div class="copyright">
				<?php 
					if( $copyright_text ){ 
						echo wp_kses_post( $copyright_text );  
					}else{
						echo esc_html__( '&copy; Copyright ', 'construction-company' ) . date_i18n( esc_html__( 'Y', 'construction-company' ) ); ?> 
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
					<?php } ?> 
				</div>
				<div class="by">

                     <a href="<?php echo esc_url( 'https://raratheme.com/wordpress-themes/construction-company/' ); ?>" rel="author" target="_blank"><?php esc_html_e( 'Construction Company Theme by: Rara Theme', 'construction-company' ); ?></a>                     

				     <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'construction-company' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Powered by %s.', 'construction-company' ), esc_html__( 'WordPress', 'construction-company' ) ); ?></a>
                    <?php
	                    if ( function_exists( 'the_privacy_policy_link' ) ) {
	                        the_privacy_policy_link();
	                    }
                    ?>
				 </div>

			</div>

		</div>

	</footer>

</div><!-- #page -->



<?php wp_footer(); ?>



</body>

</html>

