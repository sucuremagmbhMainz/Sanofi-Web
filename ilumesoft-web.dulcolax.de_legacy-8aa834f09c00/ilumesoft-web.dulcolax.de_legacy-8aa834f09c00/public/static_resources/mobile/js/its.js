var its = (function () {

    var dialogs = function () {
        $('#external-dialog').dialog({
            autoOpen: false
            , draggable: false
            , modal: true
            , resizable: false
            , width: 600
            , dialogClass: 'external-disclaimer'
        });

        if (window.location.href.indexOf("tag=on") > -1) {
            $("#popup-disclaimer").addClass("open");
        }
    };


    var sliders = function () {
        var items = $('#customSlider li').length;
        var hash = window.location.hash.replace('#', '');
        if (hash == "" || isNaN(hash) || hash <= 0 || hash > items) {
            hash = 0;
        }
        $('#customSlider').bxSlider({
            startSlide: (hash > 0) ? hash - 1 : 0,
            auto: (hash == 0),
            onSlideAfter: function (e, p, i) {
                window.location.hash = (i + 1);
            }
        });
    };


    var jqPlugins = function () {
        /* EXTERNAL LINK DISCLAIMER */
        $.fn.externalDisclaimer = function () {

            var open = function open(externalURL) {
                $('#external-dialog .button-ok').attr('href', externalURL);
                $('#external-dialog').dialog("open");
            };

            var close = function close() {
                $('#external-dialog').dialog("close");
            }

            var setEvent = function () {
                $(document).on('click', 'a.disclaimer-popup,a[data-rel="external"]', function (e) {
                    e.preventDefault();
                    open($(this).attr("href"));
                });

                $('.dialog-close').on('click', function () {
                    close();
                });
            }

            this.each(function () {
                var $this = $(this);
                if (!$this.hasClass('no-disclaimer-popup') && /^(http(s*)\:\/\/|www\.)/.test($this.attr("href")) && $this.attr("href").indexOf(window.location.hostname) == -1) {
                    // it's external link
                    $this.addClass("disclaimer-popup");
                }

            });

            setEvent();

            return this;
        };

        //run the plugin
        $('a').externalDisclaimer();
    };


    return {
        init: function () {
            sticky.init();
            sliders();
            jqPlugins();
            dialogs();
            //disclaimerCookies.init();
            gaOptOut.init();
        }
    };
})();


var sticky = (function () {
    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position

    var offset = -1;
    var header = undefined;
    
    var init = function(){
        header = document.getElementById("stickyHeader");
        offset = header.offsetTop;
        return this;
    };

    var check = function () {
        if(header == undefined) return false;
        // check the offset position of the navbar
        if (window.pageYOffset >= offset) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    };

    return {
        check: check,
        init:init
    };
})();


var gaOptOut = (function () {
    var optOutLinks = function () {
        // init optout links
        $('[data-action="gaOptout"]').click(function (e) {
            e.preventDefault();
            enable();
        });
    };


    var enable = function () {
        setCookie(disableStr, 'true', {expires: 30});
        alert('Das Tracking ist jetzt deaktiviert.');
        disclaimerCookies.accepted();

    };

    return {
        init: function () {
            optOutLinks();
        },
        enable: enable
    };
})();

var disclaimerCookies = (function () {
    var cookieName = 'cookie-disclaimer';
    var selectorDiv = '[data-type="disclaimer"]';
    var selectorBtn = '[data-type="disclaimer"] [data-action="close"]';

    var isCookieSet = function () {
        return $.cookie(cookieName) != undefined;
    };

    var accepted = function () {
        setCookie(cookieName, 1);
        hide();
    };

    var setEvents = function () {
        $(selectorBtn).click(function (e) {
            e.preventDefault();
            accepted();
        });
    };

    var show = function () {
        $(selectorDiv).slideDown();
    };

    var hide = function () {
        $(selectorDiv).slideUp();
    };

    var run = function () {
        if (!isCookieSet()) {
            setEvents();
            show();
        }
    };

    return {
        init: function () {
            run();
        },
        accepted: accepted
    };

})();


function setCookie(name, value, params) {
    if (name != undefined && name != '') {
        // set some defaults
        var params = $.extend({expires: 1, path: '/'}, params);
        $.cookie(name, value, params);
    }
}

$(document).ready(function () {
    its.init();
});

// When the user scrolls the page, execute myFunction 
$(window).scroll(function () {
    sticky.check();
});