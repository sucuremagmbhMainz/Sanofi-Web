<?php
/**
 * Displaying footer of the website
 *
 * @author Ashiqur Rahman
 * @7url http://choobs.com
 **/
?>
    <footer id="aspegic_footer" class="footer clearfix">
        <div class="footer-content footer-top">
            <div class="footer-logo text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/library/img/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" />
            </div>
            <div class="footer-menu wide-only text-right">
                <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '' ) ); ?>
<!--                <a href="https://facebook.com" target="_blank"><i class="fa fa-fw fa-2x fa-facebook-official"></i></a>-->
            </div>
        </div> <!-- END .footer-content .footer-top -->

        <div class="warning-banner text-center wide-only">
            <?php _e( 'This is a medicine. Ask your specialist and read the package inside. Fitness Category: D', 'aspegic' ); ?>
        </div>

        <div class="footer-content footer-bottom wide-only">
            <div class="copyright text-center">
                <p>
                    <?php _e( 'All content &copy; 2019 sanofi-aventis (suisse) sa. All rights reserved. Site update:', 'aspegic' ); ?> <span class="highlight"><?php echo '11.02.2019';//get_last_update(); ?> | <?php _e( 'SACH.ASPC.16.10.0493(2)', 'aspegic' ); ?></span>
                </p>
                <p>
                    <?php _e( 'This site is intended for residents of Switzerland.', 'aspegic' ); ?>
                </p>
            </div>
        </div>

        <div class="scroll-top hidden">
            <a href="#aspegic_top_header">
                <i class="fa fa-fw fa-angle-up"></i>
            </a>
        </div> <!-- END .scroll-top -->

    </footer>
</div> <!-- END #aspegic_wrapper -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PKQJXH');</script>
<!-- End Google Tag Manager -->

<?php wp_footer(); ?>

</body>
</html>