<?php
/**
 * 404 Template
 *
 * @author    Jasper Kean Portfolio
 * @copyright 2018 Jasper Kean Portfolio
 * @version   1.0
 */

get_header(); ?>
	
	
	<div id="error404page">
		
		<div class="container">
				
			<div class="content">
				
				<h1>The page requested does not exist.</h1>

				<h2><a href="<?php bloginfo('url'); ?>">Please click here to return to the homepage</a></h2>

			</div>

		</div>

	</div>
	
	
<?php get_footer(); ?>