<section class="contact" id="contact">

    <div class="container">

        <?php if ( get_sub_field('title') ) : ?>
            <h2 data-aos="fade-up"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        
        <div class="contact-block" data-aos="fade-up">

            <?php $shortcode = get_sub_field('form_shortcode'); echo do_shortcode($shortcode, 1) ?>

        </div>

    </div>

</section>