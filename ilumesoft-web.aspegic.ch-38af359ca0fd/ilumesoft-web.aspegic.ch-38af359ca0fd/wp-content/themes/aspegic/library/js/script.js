/**
 * Main script file to handle user interaction and animations
 *
 * @author Ashiqur Rahman
 * @url http://choobs.com
 **/
(function($){
    /** Toggle top menu on mobile device **/
    $('.top-menu-toggle').on('click', function(){
        if($('i.fa', this).hasClass('fa-bars')) {
            $('i.fa', this).removeClass('fa-bars').addClass('fa-times');
        } else {
            $('i.fa', this).removeClass('fa-times').addClass('fa-bars');
        }
        $('.top-menu-wrap').toggleClass('toggle-hidden').toggleClass('slideInDown');
    });


    /** Hide the menu when link clicked **/
    $('.top-menu-wrap a').on('click', function(e){
        $('.top-menu-toggle').trigger('click');
    });

    /** Window scroll **/
    $('a[href*="#"]').on('click', function(e){

        if($(this).hasClass('tab-link')){
            return;
        }

        if($(this).attr('href').indexOf('#') == 0) {
            //This is a link to some ID on this page like ...href="#something"...
            e.preventDefault();
            $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 1000);
        } else {
            //Maybe an external link?
            var link = parse_url($(this).attr('href'));

            var current_url = window.location.href.replace(/#.*/i, '');
            var link_url = $(this).attr('href').replace(/#.*/i, '');

            if((current_url == link_url) && ($(link.hash).length > 0)) {
                //Link is for current page

                e.preventDefault();
                $('html, body').animate({scrollTop: $(link.hash).offset().top}, 1000);
            }
        }
    });

    /** Scroll top button visibility **/
    $(window).scroll(function(){
        ( $(this).scrollTop() > 300 ) ? $('.scroll-top').removeClass('hidden fadeOut').addClass('animated bounceInUp') : $('.scroll-top').removeClass('bounceInUp').addClass('animated fadeOut');
    });

    /**Generate Excuse **/
    $('#generate_excuse').on('click', function(e) {
        e.preventDefault();

        var current_post_id = $(this).attr('data-post-id');

        $('i#excuse_loading').removeClass('hidden');

        $.ajax({
            url:        ajax_data.ajax_url,
            type:       'post',
            dataType:   'json',
            data:       {
                action:             'generate_excuse',
                current_post_id:    current_post_id
            },
            success:    function(response) {
                $('#excuse_response_body', $('#excuse_response')).html(response.title);
                $('#excuse_content', $('#excuse_response')).html(response.body);
                $('#excuse_response').attr('data-image-url', response.thumb).fadeIn(300);
                $('#generate_excuse').attr('data-post-id', response.id).addClass('white');
                $('#excuse_button_text').text(ajax_data.excuse_text_clicked);
                $('i#excuse_loading').addClass('hidden');
                $('a.email-share', $('#excuse_share')).attr('href', 'mailto:?subject=' + response.email_subject + '&body=' + response.email_body)
            },
            error:      function() {
                $('i#excuse_loading').addClass('hidden');
            }
        });
    });

    /** Hide generated excuse **/
    $('#excuse_response_close').on('click', function() {

        $('#excuse_response').attr('data-image-url', '').fadeOut(300, function(){
            $('#excuse_response_body', $('#excuse_response')).html('');
            $('#excuse_content', $('#excuse_response')).html('');
            $('#excuse_button_text').text(ajax_data.excuse_text);
        });
    });

    /** Share excuse **/
    $('a.facebook-share', $('#excuse_share')).on('click', function(e) {
        e.preventDefault();

        FB.ui({
            method: 'feed',
            link: ajax_data.base_url,
            picture: $('#excuse_response').attr('data-image-url'),
            name: $('#excuse_response_body', $('#excuse_response')).html(),
            caption: ajax_data.site_name,
            description: $('#excuse_content', $('#excuse_response')).html()
        }, function(response){
            //console.log(response);
        });
    });

    /** Handle pain tabs **/

    $(document).ready(function () {


        function tabsContentsSizer(){
            var tabsContentsHeight = $('#pain .tab-content.active').height();
            $('#pain .tab-contents').animate({'height':tabsContentsHeight}, 700);
        }
        tabsContentsSizer();

        $('li.tab > a').on('mouseover', function() {
            var active_icon = $(this).attr('data-active-icon');
            $(this).css('background-image', 'url(' + active_icon + ')');
        }).on('mouseleave', function() {
            if(!$(this).parent('li').hasClass('active')) {
                var default_icon = $(this).attr('data-default-icon');
                $(this).css('background-image', 'url(' + default_icon + ')');
            }
        }).on('click', function(e) {
            e.preventDefault();

            $('.tab-content').removeClass('active');
            $($(this).attr('href')).addClass('active');
            $($(this).attr('href')).addClass('active').css({'opacity':0}).animate({'opacity':1}, 700);

            $('li.tab').removeClass('active');
            $(this).parent('li').addClass('active');

            $('li.tab > a').trigger('mouseleave');

            tabsContentsSizer();
        });

    });



}(jQuery));

/**
 * Parse URL into parts
 * @param url
 * @returns {Element}
 */
function parse_url(url) {
    var parser = document.createElement('a');
    parser.href = url;

    return parser;
}