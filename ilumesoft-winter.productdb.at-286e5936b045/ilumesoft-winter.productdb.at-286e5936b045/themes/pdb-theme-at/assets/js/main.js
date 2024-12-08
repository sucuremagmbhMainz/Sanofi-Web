(function($) {

  "use strict";

  /* Add general page JS here */

    /** Fixed Page Menu Header*/

    var $aSelected = $('#fixedheader');

    if( $aSelected.is('#fixedheader') ){

        var stickyHeaderTop = $aSelected.offset().top;

        $(document).scroll(function(){
            updateFixedHeader();
        });
    }

    function updateFixedHeader() {
        // Shrink

        let $fixedHeader = $('#fixedheader');
        let $dummyHeader = $('#dummyheader');

        if( $(document).scrollTop() > stickyHeaderTop ) {
            $fixedHeader.addClass("fixed-header");
            $dummyHeader.addClass("fixed-header");

            $fixedHeader.css('top','0');

            // Grow
        } else {
            $fixedHeader.removeClass("fixed-header");
            $dummyHeader.removeClass("fixed-header");
        }
    }

    /*
       Magnific Video Popup
       ========================================================================== */
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });


    /*
       Next - Prev Posts
       ========================================================================== */
    var offset = 160;
    var duration = 500;
    $(document).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.next-prev').fadeIn(600);
        } else {
            $('.next-prev').fadeOut(600);
        }
    });


    /*
       Back Top Link
       ========================================================================== */
    var offset = 200;
    $(document).scroll(function() {
        if ($(this).scrollTop() > offset) {
            if (!$('.scroll-to-top').hasClass('visible-scroller') && !$('.scroll-to-top').hasClass('is-fading')) {
                $('.scroll-to-top').addClass('visible-scroller');
            }
        } else {
            if ($('.scroll-to-top').hasClass('visible-scroller') && !$('.scroll-to-top').hasClass('is-fading')) {
                $('.scroll-to-top').removeClass('visible-scroller');
            }
        }
    });

    function scrollToTop(timeToScroll) {
        $('html, body').animate({
            scrollTop: 0
        }, timeToScroll);
    }

    $('.scroll-to-top').on('click',function(event) {
        event.preventDefault();
        scrollToTop(600);
        return false;
    });

    /* Page Loader
       ========================================================================== */
    $(window).on('load',function() {
        "use strict";
        $('#loader').fadeOut();
    });

    $(document).ready(function() {

        if ($('.use-captcha').length > 0) {
            $('.scroll-to-top').addClass('captcha-correction');
        }

        $('p').each(function() {
            if ($(this).html().trim() == '<br/>') {
                $(this).html('');
            }
        })

        /** Toggle Mobile Menu*/
        $('#iva-mobile-nav-icon').click(function(){
            $(this).toggleClass('open');
            $('.iva-mobile-menu').slideToggle(500);
            return false;
        });

        /** Toggles the Sub-Menu of Mobile Menu*/
        jQuery('.iva-children-indenter').click(function(){
            $(this).parent().parent().toggleClass('iva-menu-open');
            $(this).parent().parent().find('> ul').slideToggle(200);

            return false;
        });

        jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });

        updateFixedHeader();
        rescaleContentFooterPadding();

        $(window).resize(function() {
            rescaleContentFooterPadding();
        })
    });

    function rescaleContentFooterPadding() {
        $('#content-wrap').css('padding-bottom', $('footer').height());
    }

}(jQuery));
