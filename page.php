<?php
/**
 * Main Page Template
 *
 * @author    Jasper Kean Portfolio
 * @copyright 2018 Jasper Kean Portfolio
 * @version   1.0
 */

get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       
    	<?php the_content(); ?>
    
    <?php endwhile; ?>
    
    <?php endif; wp_reset_query();?>

    <?php echo get_template_part('lib/blocks/page_builder'); ?>
	
<?php get_footer(); ?>