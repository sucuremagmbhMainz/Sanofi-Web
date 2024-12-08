var collapsableBaseOnLoad = window.onload;

window.onload = function () {
    if (collapsableBaseOnLoad !== undefined && collapsableBaseOnLoad !== null) {
        collapsableBaseOnLoad();
    }

    // Hide every non-active collapsable
    $('.ac_wrap ').each(function () {
        var tabid = $(this).attr('id');
        $("#" + tabid + " .ac_content.auto-collapse:not('.active')").hide();
    });

    // Add Interaction with the collapsable titles
    $(".ac_wrap .collapsable.ac_title").click(function () {
        $(this).next(".ac_content").slideToggle(400, 'swing').siblings(".ac_content.collapsable.auto-collapse:visible").slideUp(400, 'swing');
        $(this).toggleClass("active");
        $(this).siblings(".collapsable.ac_title.auto-collapse").removeClass("active");
    });
}