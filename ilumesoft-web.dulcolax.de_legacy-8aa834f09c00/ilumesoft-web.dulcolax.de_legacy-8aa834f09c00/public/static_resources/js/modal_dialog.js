$(document).ready(function() {
    jQuery.noConflict();
    $('a[data-rel="external"]').click(function(t) {
        t.preventDefault(), t.stopPropagation();
        var e = $(this).attr("href");
        $("#anker_external").attr("href", e).text(e), $("#button_external").attr("href", e), $("#disclaim_external").modal()
    })
})
