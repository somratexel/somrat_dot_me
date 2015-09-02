<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Starter
 * @since Starter 1.0
 */
?>
		
	</div>	<!-- #main container -->
	<div class="container copyright-container">
		<div class="row">
			<div class="col-md-12 copyright">
				<?php 
					if ( function_exists( 'ot_get_option' ) ) {
					  $copyright_text = ot_get_option( 'copyright_text', '' );
					  echo '<p class="pull-left">'. $copyright_text. '</p>';
					}
				?>
				<p class="pull-right">Design & Development by <a href="<?php echo site_url(); ?>">somrateXel</a></p>
			</div>
		</div>
	</div>
</div>
<!-- .overlay -->
	<?php wp_footer(); ?>
</body>
</html>