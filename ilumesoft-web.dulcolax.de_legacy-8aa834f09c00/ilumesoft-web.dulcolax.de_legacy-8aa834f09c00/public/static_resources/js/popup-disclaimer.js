var popup;
$(document).ready(function(){
    popup = {
        init: function(){
            this.$el = $('#popup-disclaimer');
            this.$background = $('#popup-background');
        },
        open: function(){

            this.$el.addClass('open');
            this.$background.addClass('open');
        },
        close: function(){
            /*localStorage.setItem("popupShown", "true");*/

            $("popupShown").fadeOut();
            $.cookie("popupShown", "true", { expires : 360 });
            this.$el.removeClass('open');
            this.$background.removeClass('open');
        }
    };

    if(!$.cookie('popupShown')){
        popup.init();
        popup.open();
    }

});

