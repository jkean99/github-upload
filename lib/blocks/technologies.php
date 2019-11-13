<section class="technologies">
    
    <div class="container">

        <?php if ( have_rows('technologies') ) : $i = 0; ?>
        
            <div class="tech-block" data-aos="fade-up">

            <?php while( have_rows('technologies') ) : the_row(); $icon = get_sub_field('icon'); $i+=100; ?>
        
                <div class="tech-block__item" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>">

                    <div class="tech-block__wrapper">

                        <?php if ($icon) : ?>

                        <figure>

                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['ALT']; ?>">                    

                        </figure>

                        <?php else : ?>

                        <figure>

                            <img src="https://via.placeholder.com/50" alt="icon">                    

                        </figure>

                        <?php endif; ?>

                        <div class="tech-block__content">

                            <?php the_sub_field('content'); ?>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>
            
            </div>
        
        <?php endif; ?>
        

    </div>

</section>