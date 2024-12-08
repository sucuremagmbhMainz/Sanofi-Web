var mediabannerBaseOnLoad = window.onload;

window.onload = function () {
    if (mediabannerBaseOnLoad !== undefined && mediabannerBaseOnLoad !== null) {
        mediabannerBaseOnLoad();
    }

    /** Resizing Media Banner **/
    function resize_media_banner($bannerElement){
        var mediaBannerWidth = $bannerElement.width();

        if (!$bannerElement.hasClass("media-parallax-fixed")) {
            if(!$bannerElement.hasClass("media-steady") || mediaBannerWidth > $bannerElement.attr("attr-original-width")) {
                var width = $bannerElement.width();
                var ratio = $bannerElement.attr("attr-ratio");
                var height = width * ratio;

                $bannerElement.height(height);
            } else {
                $bannerElement.height($bannerElement.attr("attr-original-height"));
            }
        }
    }

    $(".media-banner .banner-element").each(function() {
        var imgsource = $(this).css("background-image").slice(5,-2);
        var img = new Image();
        img.src = imgsource;

        var width = img.naturalWidth;
        var height = img.naturalHeight;
        var ratio = height/width;

        $(this).attr("attr-ratio", ratio);
        $(this).attr("attr-original-height", height);
        $(this).attr("attr-original-width", width);
    });


    $(".media-banner .banner-element").each(function() {
        resize_media_banner($(this));
    });

    $( window ).resize(function() {
        $(".media-banner .banner-element").each(function() {
            resize_media_banner($(this));
        });
    });
};

