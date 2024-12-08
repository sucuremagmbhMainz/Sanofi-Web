window.addEventListener('load', function () {
    initSlickGrouping();
    responsiveSlickster();


    $(window).resize(function () {
        responsiveSlickster();
    })
});

// Initializes slick grouping
function initSlickGrouping()
{
    var slickGroupIndex = 0;
    $('.forSlick.slickGroup').each(function () {
        var $slickTriggerElement = $(this);
        $slickTriggerElement.closest('.column-holder').children('.forSlick.slickGroup').each(function () {
            if (!$(this).hasClass('slickGroup-processed')) {
                $(this).addClass('slickGroup-processed');
                $(this).addClass('slick-group-' + slickGroupIndex);
                $(this).attr('data-slick-group', 'slick-group-' + slickGroupIndex);
            }
        });

        slickGroupIndex += 1;
    });
}

function responsiveSlickster()
{
    // Initialize any Slickster Slider
    if ( window.innerWidth > 768 ) {
        // Initialize any Slickster Slider

        $('.forSlick').each(function () {
            if (!$(this).hasClass('slick-inactive')) {
                $(this).addClass('slick-inactive');
                $(this).slick('unslick');
            }
        })
    } else {
        $('.forSlick').each(function () {
            if ($(this).hasClass('slick-inactive')) {
                $(this).removeClass('slick-inactive');

                // Apply hide of controls, if required
                var showControls = !$(this).hasClass('noSlickControl');

                // Apply Slickster Group Navigation if required
                var groupDataKey = $(this).attr('data-slick-group');
                groupDataKey = (groupDataKey === undefined) ? '' : '.' + groupDataKey;

                const prevBtn = '<a href="#{{ sliderId }}" role="button" data-slide="prev" class="comparison-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Ebene_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;font-size: 20px;color: var(--microsite-color-base);width: 50px;height: 50px;border-radius: 50%;border: 3px solid var(--microsite-color-base);" xml:space="preserve" class="chevron svg replaced-svg"> <style type="text/css">.st0{fill:none;stroke:#0B1E61;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;} </style><polyline class="st0" points="9,18 15,12 9,6 " style="stroke: var(--microsite-color-base);"></polyline> </svg></a>';
                const nextBtn = '<a href="#{{ sliderId }}" role="button" data-slide="next" class="comparison-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Ebene_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;font-size: 20px;color: var(--microsite-color-base);width: 50px;height: 50px;border-radius: 50%;border: 3px solid var(--microsite-color-base);" xml:space="preserve" class="chevron svg replaced-svg"> <style type="text/css">.st0{fill:none;stroke:#0B1E61;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;} </style><polyline class="st0" points="9,18 15,12 9,6 " style="stroke: var(--microsite-color-base);"></polyline> </svg></a>';

                $(this).slick(
                    {
                        asNavFor: groupDataKey,
                        arrows: showControls,
                        prevArrow: prevBtn,
                        nextArrow: nextBtn,
                    }
                );
            }
        })
    }
}
