<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Starter
 * @since Starter 1.0
 */

get_header(); ?>

	
		<div class="row">
			<div class="col-md-12 header">
				<div class="row">
					<div class="col-md-2 logo-container no-padding-right wow fadeInDown">
						<a href="<?php echo site_url(); ?>">
						<?php 
							if ( function_exists( 'ot_get_option' ) ) {

							  $logo = ot_get_option( 'logo', '');
							  
							  if ( ! empty( $logo ) ) {
							  	echo '<img width="100%" height="auto" class="logo img-responsive" src="'.$logo.'" alt="Logo">';
							  }
							  
							}
						?>
						</a>
					</div>
					<div class="col-md-4 wow fadeInRight">
						<h1 class="site-title"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						<p><?php bloginfo('description'); ?></p>
					</div>
					<div class="col-md-6 wow fadeInDown">
						<div class="top-search-container">
							<input placeholder="Search in site" class="top-search" type="text" name="s">
							<button class="search-btn" type="submit"><i class="fa fa-search">&nbsp;</i></button>
						</div>
						<div class="top-navigation-container">
							<ul class="top-manu-list">
								<li class="top-menu-item" ng-repeat="item in topMenu">
									<a ng-class="{active: currentLocation.url==item.url}" class="top-menu-link" title="{{item.title}}" ng-href="{{item.url}}">
										<i ng-class="item.classes">&nbsp;</i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div ng-view></div>
	

<?php
get_footer();
