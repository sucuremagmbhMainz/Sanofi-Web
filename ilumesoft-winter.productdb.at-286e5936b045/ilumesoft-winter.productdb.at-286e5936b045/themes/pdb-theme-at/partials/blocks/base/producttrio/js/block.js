window.addEventListener('load', function () {
    $(window).resize(function () {
        refreshTrioSlickResponsive();
    })

    refreshTrioSlickResponsive();
})

function refreshTrioSlickResponsive()
{
    const $trioSlickElements = $('.trio-slick');
    if (window.innerWidth > 768) {
        // console.log($trioSlickElements);
        $trioSlickElements.each(function () {
            if ($(this).hasClass('trio-slick-active')) {
                $(this).removeClass('trio-slick-active');
                $(this).slick('unslick');
            }
            // const $currentElement = $(this);
            // if ($currentElement.hasClass('trio-slick-active')) {
            //     return; }
            // $currentElement.addClass('trio-slick-active');
        });
    } else {
        $trioSlickElements.each(function () {
            if (!$(this).hasClass('trio-slick-active')) {
                $(this).addClass('trio-slick-active');

                const prevBtn = '<a href="#{{ sliderId }}" role="button" data-slide="prev" class="trio-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Ebene_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;font-size: 20px;color: var(--microsite-color-base);width: 50px;height: 50px;border-radius: 50%;border: 3px solid var(--microsite-color-base);" xml:space="preserve" class="chevron svg replaced-svg"> <style type="text/css">.st0{fill:none;stroke:#0B1E61;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;} </style><polyline class="st0" points="9,18 15,12 9,6 " style="stroke: var(--microsite-color-base);"></polyline> </svg></a>';
                const nextBtn = '<a href="#{{ sliderId }}" role="button" data-slide="next" class="trio-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Ebene_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;font-size: 20px;color: var(--microsite-color-base);width: 50px;height: 50px;border-radius: 50%;border: 3px solid var(--microsite-color-base);" xml:space="preserve" class="chevron svg replaced-svg"> <style type="text/css">.st0{fill:none;stroke:#0B1E61;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;} </style><polyline class="st0" points="9,18 15,12 9,6 " style="stroke: var(--microsite-color-base);"></polyline> </svg></a>';

                $(this).slick(
                    {
                        // asNavFor: groupDataKey,
                        arrows: true,
                        prevArrow: prevBtn,
                        nextArrow: nextBtn,
                    }
                );
            }
        });
    }
}
