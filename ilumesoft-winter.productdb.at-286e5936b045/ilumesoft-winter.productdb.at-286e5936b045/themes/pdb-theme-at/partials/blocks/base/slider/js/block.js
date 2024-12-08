var previousOnLoad = window.onload;

function rescaleslider() {
    // Prepare Slider Items
    $('.carousel-inner').each(function(outerIndex) {
        var height = 0;

        $(this).find('.carousel-item').each(function () {
            $(this).height('auto');
        });

        // Search for the max height (highest img)
        $(this).find('.carousel-item').each(function () {
            if($(this).outerHeight(true) > height){
                height = $(this).outerHeight(true);
            }

        });

        // Sets max height for all container
        $(this).find('.carousel-item').each(function () {
            if(height != undefined && height > 0){
                $(this).height(height);

            }
        });

    });
}

window.onload = function() {
    if (previousOnLoad !== undefined && previousOnLoad !== null) {
        previousOnLoad();
    }

    rescaleslider();

    $(window).resize(function() {
        rescaleslider();
    })

    // Initialize any Late Bootstrap Carousels
    $('.late-carousel-initializer ').each(function() {
        $(this).removeClass('late-carousel-initializer');
        $(this).addClass('carousel');

        $(this).find('.carousel-item').each(function(index) {
            if (index != 0) {
                $(this).removeClass('active');
            }
        });

        $(this).carousel();
    });
}
