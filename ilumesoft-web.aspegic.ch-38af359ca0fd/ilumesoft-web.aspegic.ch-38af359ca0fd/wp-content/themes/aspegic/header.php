<?php
/**
 * Displaying header of the website
 *
 * @author Ashiqur Rahman
 * @url http://choobs.com
 **/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?php echo wp_title(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo( 'name' ); ?>"/>
    <meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>"/>

    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/library/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/img/favicon.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/img/favicon.ico">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/library/html5shiv/html5shiv.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/library/html5shiv/html5shiv-printshiv.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="content-wrapper" id="aspegic_wrapper">
    <div id="aspegic_top"></div>
    <header id="aspegic_top_header" class="top-header floating clearfix">

        <div class="header-bg">
<!--            <img src="http://www.magicpencil.ch/client/aspegic/menu/img/MenuBkg-FullBrowserWidth.png" alt="">-->
            <img src="<?php echo get_template_directory_uri(); ?>/library/img/MenuBkg-FullBrowserWidth.png" alt="">
        </div>
        <div class="white-angle"></div>

        <div class="header-content">

            <div class="sanofi-logo">
                <a href="http://www.sanofi.ch/" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/sanofi-logo.png" alt="Sanofi" />
                </a>
            </div>

            <div class="language-switcher wide-only">
                <?php aspegic_languages_list(); ?>
            </div>

            <div class="logo">
                <a href="<?php if(is_home()): ?>#aspegic_top<?php else: ?><?php echo home_url(); ?><?php endif; ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/logo.png" class="logo-img" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                </a>
            </div> <!-- END .logo -->

            <div class="top-menu">
                <span class="top-menu-toggle mobile-only">
                    <i class="fa fa-fw fa-2x fa-bars"></i>
                </span>
                <div class="top-menu-wrap toggle-hidden animated">
                    <div class="language-switcher mobile-only">
                        <?php aspegic_languages_list(); ?>
                    </div>

                    <?php
                    if( is_home() ){
                        wp_nav_menu( array( 'theme_location' => 'primary' ) );
                    } else {
                        wp_nav_menu( array( 'container_class' => 'page', 'theme_location' => 'page' ) );
                    }
                    ?>


                    <div class="footer-menu mobile-only">
                        <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '' ) ); ?>
<!--                        <a href="https://facebook.com" target="_blank"><i class="fa fa-fw fa-2x fa-facebook-official"></i></a>-->
                    </div>

                    <div class="warning-banner text-center mobile-only">
                        <?php _e( 'This is a medicine. Ask your specialist and read the package inside. Fitness Category: D', 'aspegic' ); ?>
                    </div>

                    <div class="footer-content footer-bottom mobile-only">
                        <div class="copyright text-center">
                            <p>
                                <?php _e( 'All content &copy; 2019 sanofi-aventis (suisse) sa. All rights reserved. Site update:', 'aspegic' ); ?> <span class="highlight"><?php echo '11.02.2019';//get_last_update(); ?></span>
                            </p>
                            <p>
                                <?php _e( 'This site is intended for residents of Switzerland.', 'aspegic' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- END .top-menu -->

        </div> <!-- END .header-content -->

    </header> <!-- END #aspegic_top_header -->