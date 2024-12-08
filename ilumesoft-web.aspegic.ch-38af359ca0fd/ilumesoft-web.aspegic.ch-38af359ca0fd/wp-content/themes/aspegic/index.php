<?php
/**
 * The main template file.
 * This file lists the blog posts by default.
 *
 * @author Ashiqur Rahman
 * @url http://choobs.com
 * @author_url http://ghumkumar.com
 **/

get_header();
?>
<section id="home" class="home-slider">
    <div class="section-content">
        <div class="slide-radial-background"></div>
        <div class="slider-wrapper">
            <?php echo do_shortcode( '[rev_slider alias="topslider"]' ); ?>
        </div> <!-- END .slider-wrapper -->
    </div> <!-- END .section-content -->
</section> <!-- END .home-slider -->

<section id="excuse" class="generate-excuse">
    <div class="section-content">
        <h1 class="text-center">
            <?php _e( 'Generate excuses', 'aspegic' ); ?>
        </h1>
        <p class="text-center intro">
            <?php _e( 'Aspégic relieves pains of everyday life. You no longer have any reason to cancel an appointment, miss a meeting with former classmates, not to go to Zumba class...', 'aspegic' ); ?>
        </p>
        <p class="text-center intro">
            <?php _e( 'Fortunately, the generator is there to give you all the excuses you need at any time of day or night. If one day you do not need an excuse but a pain, there is Aspégic ibu 400 L TAB!', 'aspegic' ); ?>
        </p>
        <div id="excuse_holder" class="excuse-holder text-center">
            <a class="button big-button with-shadow" href="javascript:" id="generate_excuse" data-post-id="0">
                <span id="excuse_button_text"><?php _e( 'I need an excuse', 'aspegic' ); ?></span>
<!--                <i class="fa fa-fw fa-spin fa-circle-o-notch hidden" id="excuse_loading"></i>-->
            </a>

            <div class="loader-block">
                <i class="fa fa-fw fa-spin fa-circle-o-notch hidden" id="excuse_loading"></i>
            </div>

            <div id="excuse_response" class="excuse-response text-center hidden" data-image-url="">
                <span id="excuse_response_close">&times;</span>
                <div id="excuse_response_body">

                </div>
                <div id="excuse_content" class="hidden">

                </div>

                <div id="excuse_share">
                    <?php
                        // Info is the string for the email subject text.
                    ?>
                    <a href="mailto:?subject=<?php echo rawurlencode( __( 'Info', 'wpml-string-translation' ) ); ?>" class="email-share">
                        <?php _e( 'Share the excuse', 'aspegic' ); ?>
                    </a>

<!--                    <a href="javascript:" class="facebook-share">-->
<!--                        --><?php //_e( 'Share the excuse', 'aspegic' ); ?>
<!--                    </a>-->
                </div>
            </div>
        </div>
    </div> <!-- END .section-content -->
</section> <!-- END #excuse -->

<section id="products" class="products">
    <div class="section-content white-bg">
        <h1><?php _e( 'Our Painkillers', 'aspegic' ); ?></h1>
        <div class="slider-wrapper">
            <?php echo do_shortcode( '[rev_slider alias="product-slider"]' ); ?>
        </div>
    </div> <!-- END .section-content -->
</section> <!-- END #products -->

<section id="benefits" class="benefits">
    <div class="section-content">
        <div class="slider-wrapper">
            <?php echo do_shortcode( '[rev_slider alias="benefits-slider"]' ); ?>
        </div>
    </div> <!-- END .section-content -->
</section> <!-- END #benefits -->

<section id="pain" class="pain">
    <div class="section-content white-bg text-center">
        <h1>
            <?php _e( 'Drug against pain', 'aspegic' ); ?>
        </h1>
        <p class="intro">
            <?php _e( 'Aspégic ibu L 400 target pain, blocks the transmission of pain signals and thus provides relief where it hurts. Its active ingredient, lysinate ibuprofen properties analgesics and anti-inflammatory, provides effective protection against pains below.', 'aspegic' ); ?>
        </p>
        <p class="intro">
            <?php _e( 'Headache - Back pain - Menstrual pain - Joint pain - Toothache', 'aspegic' ); ?>
        </p>
        <?php echo get_template_part( 'pain_tabs' ); ?>
    </div> <!-- END .section-content -->
</section> <!-- END #benefits -->

<?php get_footer(); ?>
