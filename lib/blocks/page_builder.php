<?php
        
	/* Page Builder */
	
	if( have_rows('page_builder') ):
		
		while ( have_rows('page_builder') ) : the_row();
	
			if( get_row_layout() == 'hero' ): 
				echo get_template_part('lib/blocks/hero');

			elseif( get_row_layout() == 'intro' ): 
				echo get_template_part('lib/blocks/intro');

			elseif( get_row_layout() == 'technologies' ): 
				echo get_template_part('lib/blocks/technologies');

			elseif( get_row_layout() == 'work' ): 
				echo get_template_part('lib/blocks/work');

			elseif( get_row_layout() == 'contact' ): 
				echo get_template_part('lib/blocks/contact');

			endif;
			
		endwhile;
		
	else : 
	
		echo get_template_part('lib/blocks/no-content');
	
	endif; 
		
?>