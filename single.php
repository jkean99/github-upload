<?php
/**
 * Single Template
 *
 * @author    Media Maze
 * @copyright 2018 Media Maze
 * @version   1.0
 */

get_header(); ?>
	
	<div id="main" role="main" class="clearfix">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_title('<h1>', '</h1>'); ?>
		
		<?php the_content(); ?>
		
		<?php endwhile; ?>
		
		<?php endif; wp_reset_query();?>

	</div>
	
<?php get_footer(); ?>