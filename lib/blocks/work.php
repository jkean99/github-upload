<section class="work">

    <div class="container">

        <?php if ( get_sub_field('title') ) : ?>

        <h2 data-aos="fade-up"><?php echo get_sub_field('title'); ?></h2>

        <?php endif; ?>
        
        <?php if ( get_sub_field('subtext') ) : ?>

        <p data-aos="fade-up"><?php echo get_sub_field('subtext'); ?></p>

        <?php endif; ?>
        
        <?php if ( have_rows('work_block') ) : ?>
        
        <div class="work-block">

        <?php while( have_rows('work_block') ) : the_row(); ?>
        
            <div class="work-block__item" data-aos="fade-up">

                <div class="work-block__wrapper">

                    <figure>

                        <?php if ( get_sub_field('image') ) : $image = get_sub_field('image'); ?>
                        
                        <div class="bg" style="background-image: url(<?php echo $image['url']; ?>)"></div>
                        
                        <?php else : ?>
                        
                        <div class="bg" style="background-image: url('https://via.placeholder.com/300')"></div>

                        <?php endif; ?>
                        

                        <figcaption>
    
                            <?php if ( get_sub_field('overlay_content') ) : ?>
                                <?php echo get_sub_field('overlay_content'); ?>
                            <?php endif; ?>
    
                        </figcaption>
                        
                    </figure>

                </div>

            </div>

        <?php endwhile; ?>

        </div>
        
        <?php endif; ?>
        

    </div>

</section>