var runningTimeout = false;

window.addEventListener('load', function () {
    $('#product-slider').slick({
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        dots: true,
        slide: '.item-wrapper',
    });

    const $previewOverlay = $('#preview-overlay');
    const itemMagnifier = document.querySelectorAll('.item-magnifier');

    for (var i = 0; i < itemMagnifier.length; i++) {
        itemMagnifier[i].addEventListener('click', function () {
            const $previewOverlay = $('#preview-overlay');

            if ($previewOverlay.hasClass('active')) {
                return;
            }

            const $previewImgWrapper = $('#preview-overlay .image-wrapper')
            const $parent = $(this).parent();

            if ($parent != null) {
                var $activeImage = $parent.find('.slick-active img').first();

                if ($activeImage.length == 0) {
                    $activeImage = $parent.find('img').first();
                }

                if ($activeImage != null) {
                    $previewOverlay.addClass('active');

                    $imgCopy = $activeImage.clone();
                    $imgCopy.addClass('preview-copy');

                    $imgCopy.attr('src', $activeImage.attr('src'));
                    $imgCopy.addClass('highlight');

                    $previewImgWrapper.append($imgCopy);

                    if (runningTimeout !== false) {
                        clearTimeout(runningTimeout)
                    }
                    runningTimeout = setTimeout(function () {
                        $previewOverlay.addClass('interactable');
                    }, 200);
                }
            }
        });
    };

    $previewOverlay.on('click', function () {
        clearPreview();
    });

    $previewOverlay.on('scroll touchmove mousewheel', function (e) {
        e.preventDefault();
        e.stopPropagation();
        return false;
    })
})

function clearPreview()
{
    let $previewOverlay = $('#preview-overlay');

    if ($previewOverlay.length) {

        if (!$('#preview-overlay').hasClass('interactable')) {
            return;
        }

        $('#preview-overlay').removeClass('interactable');

        $previewOverlay.removeClass('active');

        $('.preview-copy').removeClass('highlight');

        setTimeout(function() {
            $('.preview-copy').remove();
        }, 200);
    }
}
