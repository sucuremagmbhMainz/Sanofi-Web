/* --------------------------------------------------------------------- 
 Main Menu util clear item selected
 ------------------------------------------------------------------------ */

function mainMenuClearSelected() {
  /*$('.mainNav li').removeClass('selected')
					.removeClass('selectArrow');*/
  $('.mainNav li#allProductsBtn, .mainNav li#buyNow-tablet').removeClass('selected')
    .removeClass('selectArrow');
}

function openDir(form) {
  window.location = (form.dir.options[form.dir.selectedIndex].value);
}
$(window).load(function() {
  var htmlContent = {};

  htmlContent.saveValue = function(key, value) {
    localStorage.setItem(key, value);
  }

  htmlContent.getValue = function(key) {
    return localStorage.getItem(key);
  }

  $('.signUp').click(function() {
    htmlContent.saveValue('isSignUp', 1);

  });

  $('.print-button').click(function() {
    htmlContent.saveValue('isSignUp', 0);
  });

  var isSignUp = htmlContent.getValue('isSignUp');
  if (typeof isSignUp == 'string' && isSignUp == '1') {
    $('.noText').hide();
  }
  var isSignUp = htmlContent.getValue('isSignUp');
  if (typeof isSignUp == 'string' && isSignUp == '0') {
    $('.noText').css('display', 'block');
  }
});
// JavaScript Document
$(document).ready(function() {
  normalizeLinksConstipation();
  if (window.location.hash == '') {
    $(".grid_row .grid_product a[href='" + $(location).attr('href') + "']").parent().remove();
  } else {
    $(".grid_row .grid_product a[href='" + $(location).attr('href').substr(0, $(location).attr('href').indexOf('#')) + "']").parent().remove();
  }
  /* ----- Main Nav Selected -----*/
  currentSelectedMenu();

  function currentSelectedMenu() {
    var current = window.location.href;
    var page = current.substr(current.lastIndexOf('/') + 1);

    var menu2 = $('.mainNav ul li:nth-child(2) a');
    var menu3 = $('.mainNav ul li:nth-child(3) a');
    var menu4 = $('.mainNav ul li:nth-child(4) a');
    var menu6 = $('.mainNav ul li:nth-child(6) a');

    switch (page) {
      case 'what-is-constipation.html':
        SelectedMenu(menu2);
        break;
      case 'constipation-symptoms.html':
        SelectedMenu(menu2);
        break;
      case 'prevent-constipation.html':
        SelectedMenu(menu2);
        break;
      case 'treatment-options.html':
        SelectedMenu(menu2);
        break;
      case 'talk-to-your-doctor.html':
        SelectedMenu(menu2);
        break;
      case 'constipation-and-pregnancy-breastfeeding.html':
        SelectedMenu(menu2);
        break;
      case 'travel-constipation.html':
        SelectedMenu(menu2);
        break;
      case 'what-is-gas.html':
        SelectedMenu(menu3);
        break;
      case 'Dulcolax-coupon.html':
        SelectedMenu(menu4);
        break;
      case 'colonoscopy-prep.html':
        SelectedMenu(menu6);
        break;
    }

    function SelectedMenu(menuItem) {
      menuItem.parent().addClass('selected');
    }
  }
  /* ----- End Main Nav Selected -----*/


  //$('object param[name="bgcolor"]').val('#FFFFFF');
  $('object').append('<param name="bgcolor" value="#FFFFFF">');
  /* ----- Buy Now -----*/
  var open = false;
  $('.menuBtn').on('click', function() {
    if (open) {
      $('#main-menu').slideUp('medium');
      open = false;
    } else {
      $('#main-menu').slideDown('medium');
      open = true;
    }
    //$('#main-menu').slideToggle('medium');
    $('#buyNow-menu').css('display', 'none');
    $(".menu_content").hide();
    $('.retailer-logos').hide();
    $('.retailer_buy_now a.destination').hide();
    $('.menu_content .retailer_logo').css('border', '1px solid transparent');

  });
  $('.mod_buyNow').on('click', function() {
    $('.retailer_buy_now a.destination').hide();
  });
  $('#buyNow-item').on('click', function() {
    $('#main-menu').slideToggle('medium');
    setTimeout(function() {
      $('#buyNow-menu').slideToggle('medium');
    }, 800);
  });
  $('.select').on('change', function() {
    var optionValue = $('.select option').val();
    //$(this).parent().parent().find('.retailer-logos').fadeIn(this.value == optionValue);
    $(this).parent().parent().find('.retailer-logos').fadeIn(this.value == optionValue);

    if (this.value == "") {
      $(".retailer-logos").hide();
    } else {

    }


  });
  $(".buy_content").hide();
  $(".buy_content:first").show();

  $("ul.tabs li").click(function() {

    $("ul.tabs li").removeClass("active");
    $(this).addClass("active");
    $(".buy_content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();
  });


  $("#buyNow-tablet").click(function() {
    if ($('.headerAllProducts').is(':visible')) {
      $('.headerAllProducts').slideToggle('medium', contentResize);
    }
    $("#tabs-container").slideToggle('medium', function() {
      if ($("#tabs-container").is(':visible')) {
        $('#buyNow-tablet').addClass('selected').addClass('selectArrow');
      } else {
        mainMenuClearSelected();
      }
    });

  });
  /*$("#wrapper").on("click",function() {
		$(".smartphone, #tabs-container").slideUp();
	  });*/
  /*$('#wrapper').click(function(e) {
			if (
				(
					$(e.target).closest(".mod_buyNow").attr("class") != "mod_buyNow") &&
					$(e.target).closest(".buy").attr("class") != "buy" 
					$(e.target).closest(".mod_buyNow").attr("class") != "mod_buyNow") {
					$(".smartphone, #tabs-container").slideUp();
					
			}
		});*/
  var notH = 1,
    $pop = $('.smartphone, #tabs-container, .headerAllProducts').on("touchstart", function(e) {
      notH ^= 1;
    });
  $(".buy, #buyNow-tablet, #allProductsBtn").on("touchstart", function(e) {
    notH ^= 1;
  });
  $(document).on("touchend", function(e) {
    if (notH || e.which == 27) $pop.slideUp("medium", mainMenuClearSelected);
    notH = 1;
  });


  $("#buyNow-menu li").click(function() {
    $("#buyNow-menu li").removeClass("active");
    $(this).addClass("active");
    $(".menu_content").hide();
    $("#buyNow-menu").hide();
    var activeContent = $(this).attr("rel");
    $("#" + activeContent).slideToggle('medium');
  });
  $('.menu_content .retailer_logo').on('click', function() {
    $('.menu_content .retailer_logo').css('border', '1px solid transparent');
    $(this).css('border', '1px solid #55a636');
    $('.btn-buy').fadeIn('slow');
  });

  var wrapperHeight;

  $(window).load(function() {
    wrapperHeight = $('#wrapper').height();
  });

  $('#allProductsBtn').on('click', function() {
    $('.headerAllProducts').slideToggle('medium', contentResize);
    if ($("#tabs-container").is(':visible')) {
      $("#tabs-container").slideToggle('medium');
      mainMenuClearSelected();
    }
  });

  function contentResize() {
    if ($('.headerAllProducts').is(':visible')) {
      $('#allProductsBtn').addClass('selected').addClass('selectArrow');
      if (wrapperHeight < $('.headerAllProducts').height()) {
        $('#wrapper').height($('.headerAllProducts').height() - 30);
        $('#wrapper').css("margin-bottom", "30px");
      }
      if (wrapperHeight > $('.headerAllProducts').height()) {
        $('#wrapper').height($('.headerAllProducts').height() - 30);
        $('#wrapper').css("margin-bottom", "30px");
        $('#wrapper').css("overflow", "hidden");
        $(".product_grid").hide();
      }
    } else {
      $('#wrapper').css('height', 'auto');
      $('#wrapper').css("margin-bottom", "0");
      mainMenuClearSelected();
      $(".product_grid").show();
    }
  }

  /*Product detail*/

  var tabsContainer = $("#tabs-detail").html();

  function restart() {
    var video = document.getElementById("Video1");
    video.currentTime = 0;
  }
  var slider = $('.product_grid').html();

  function tabsHead() {
    $('body').css('overflow', 'hidden');
    var bodyWidth = $("body").width();
    $('body').css('overflow', 'auto');
    if (bodyWidth < 969) {
      $('.tabs_menu').css('background-position', $(this).parent().position().left - 30 + 'px 0');
    } else {
      $('.tabs_menu').css('background-position', $(this).parent().position().left - 12 + 'px 0');
    }

    $('.tab_item a').removeClass('tab_active');
    $(this).addClass('tab_active');
    //restart();
    if($(this).attr('href')=="#video"){
      var videoWrapper = $($(this).attr('href') ).find('.videoFrameWrapper');
      if(videoWrapper){        
        var videoSrc = videoWrapper.data('src');
        if(videoSrc){
            videoWrapper.find('iframe').attr('src', videoSrc);
        }              
      }
    }    
  }

  $('.tabs_menu .tab_item a').click(tabsHead);
  $('.ui-tabs-anchor').attr('onclick', 'restart();');

  function reload() {
    var tab_open = $(this).attr("href");

    if (tab_open.indexOf('#') != -1) {
      tab_open = '#' + tab_open.split('#')[1];
    }
    var menu_name = tab_open.substr(1, tab_open.length - 1);
    var bodyWidth = $("body").width();
    if (bodyWidth <= 709) {
      if (!$(".ui-accordion-header[aria-controls='" + menu_name + "']").hasClass('ui-state-active')) {
        $(".ui-accordion-header[aria-controls='" + menu_name + "']").trigger('click');
      }

    } else {
      $(".tab_item[name='" + menu_name + "']").find("a").trigger('click');
    }

    //override scrolling for internal links
    $(".hash_reload").bind('click.smoothscroll', function(e) {
        var to = this.href;
        var from = location.href;
        to = to.substring(0, to.indexOf('#'));
        
        if (to === from) {
          e.preventDefault();

          var target = this.hash;
          $target = $(target);

          $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 175
          }, 10 /*500*/ , 'swing', function() {});
        }
    });
  }

  //$(".hash_reload").click(reload);



  var isMobile, isDesktop, last, lastD;
  setBreakpoint();

  $(window).resize(function() {
    $('body').css('overflow', 'hidden');
    var bodyWidth = $("body").width();
    $('body').css('overflow', 'auto');
    if (bodyWidth <= 709) {
      isDesktop = false;
      isMobile = true;
    } else if (bodyWidth >= 969) {
      isMobile = false;
      isDesktop = true;
    } else {
      isMobile = false;
      isDesktop = false;
    }

    if (isMobile != last || isDesktop != lastD) {

      setBreakpoint();
    }
    last = isMobile;
    lastD = isDesktop;
    //      if ((bodyWidth >= 782)&&(bodyWidth <= 1065)){
    //          $("#constipationAnchor").find("li").find("a").attr("name","");
    //          //alert("quita");
    //      }
    //      else{//reasigna name
    // $("#constipationAnchor > li").each(function( index ) {				
    // 	var itemNumber = "item"+(index+1);
    // 	$(this).find("a").attr("name",itemNumber);
    // 	//alert("quita");

    // });
    //      }
  });

  function normalizeLinksConstipation() {
    var pageWidth = $("body").width();
    if ((pageWidth >= 782) && (pageWidth <= 1065)) {
      $("#constipationAnchor").find("li").find("a").attr("name", "");
      //alert("quita");
    }
    if ((pageWidth <= 782) && (pageWidth >= 1065)) { //reasigna name
      $("#constipationAnchor > li").each(function(index) {
        var itemNumber = "item" + (index + 1);
        $(this).find("a").attr("name", itemNumber);
        //console.log(itemNumber);
      });
    }

  }

  function setBreakpoint() {
    $('body').css('overflow', 'hidden');
    var bodyWidth = $("body").width();
    $('body').css('overflow', 'auto');
    if (last == undefined) {
      if (bodyWidth <= 709) {
        setMobile();
      } else if (bodyWidth >= 969) {
        setDesktop();
      } else {
        $('.buy[href="#buy-now"]').unbind('click');
        setTablet();
      }

    } else {
      if (bodyWidth <= 709) {
        if ($("#tabs-detail").hasClass('ui-tabs')) {
          $("#tabs-detail").tabs("destroy");
        }
        setMobile();
      } else if (bodyWidth >= 969) {
        //setTablet();
        /*if ($('.grid_row .bx-wrapper').length != 0) {
          $('.grid_row').bxSlider().destroySlider();
        }
        $('.product_grid').empty();
        $('.product_grid').html(slider);
*/
        setDesktop();
      } else {
        $('.buy[href="#buy-now"]').unbind('click');
        setTablet();
        if ($(".tabs_content").hasClass('ui-accordion')) {
          $(".tabs_content").accordion("destroy");
        }
        // $('.grid_row').bxSlider().destroySlider();
        // $('.product_grid').empty();
        // $('.product_grid').html(slider);
      }

    }
  }

  var sliderVar;
  var activeTab;

  function setMobile() {


    if (activeTab == undefined || activeTab == 1) {
      activeTab = 0;
    }

    $('.buy[href="#buy-now"]').removeClass('hash_reload');

    $('#tabs-detail').css('margin-top', '')

    //$(".hash_reload").click(reload);
    $(".tabs_content#buy-now").css('display', 'none');

    $('.faq_question h4').unbind('click');
    $('.faq_answer').css("display", "block");
    $('.faq_question h4').unbind('each');

    if (("#constipationAnchor").length != 0) {
      $("#constipationAnchor > li").each(function(index) {
        var itemNumber = "item" + (index + 1);
        $(this).find("a").attr("name", itemNumber);
      });
    }


    $(".buy").unbind('click');

    $(".buy").click(function() {
      $("#buyNow-menu li").removeClass("active");
      var activeTab = $(this).attr("rel");
      activeTab = activeTab.replace('tab', 'content');
      $('#buyNow-menu li[rel=' + activeTab + ']').addClass("active");
      $(".menu_content").hide();
      $("#buyNow-menu").hide();
      $("#" + activeTab).slideToggle('medium');
      $('body').animate({
        scrollTop: 0
      }, '100');

    });

    //Accordion
    var activeTab = 0;
    var internal = window.location.hash;

    if (last == undefined) {
      if (internal != '' && internal != '#' && internal != '#buy-now') {
        activeTab = $("#tabs-detail").find(internal).index('.tab_content');
      }
    }
    
    $(".tabs_content").accordion({
      active: activeTab,
      heightStyle: "content",
      collapsible: true,
      beforeActivate: function(event, ui) {
        $('body').animate({
          scrollTop: $(this).offset().top
        }, '100');
      },
      activate: function(event, ui) {
        var videoWrapper = ui.newPanel.find('.videoFrameWrapper');
        if(videoWrapper.length > 0){
          var videoSrc = videoWrapper.data('src');
          if(videoSrc){
            videoWrapper.find('iframe').attr('src', videoSrc);
          }
        } else {
          if(ui.oldPanel.find('.videoFrameWrapper').length){
            stopVideo();
          }
        }
        activeTab = $(".tabs_content").accordion("option", "active");
      }
    });

    if (internal == '#buy-now') {
      $('.buy').trigger('click');
    }

    $(".hash_reload").click(reload);
    //    	$('.reload_df').click(function() { 
    // 	$( ".tabs_content" ).accordion({ active: 1,heightStyle: "content" });
    // });
    if ($('.product_grid .bx-wrapper').length == 0) {
      sliderVar = $('.grid_row').bxSlider({
        minSlides: 2,
        maxSlides: 2,
        slideWidth: 115,
        pager: false,
        nextText: '',
        prevText: '',
        infiniteLoop: false,
        hideControlOnEnd: true
      });

    } else {
      sliderVar.reloadSlider({
        minSlides: 2,
        maxSlides: 2,
        slideWidth: 115,
        pager: false,
        nextText: '',
        prevText: '',
        infiniteLoop: false,
        hideControlOnEnd: true
      });
    }
    if ($('#related_5 .grid-title').hasClass('bottomAlign')) {
      $('#related_5 .grid-title').removeClass('bottomAlign');
    }

    last = true;
    lastD = false;
  }

  function setTablet() {

    $(".smartphone.menu_content").css('display', 'none');
    $('.buy[href="#buy-now"]').removeClass('hash_reload');

    $('.faq_question h4').unbind('click');
    $('.faq_answer').css("display", "block");
    $('.faq_question h4').unbind('each');

    $('#tabs-detail').css('margin-top', '');

    $(".buy").unbind('click');
    $(".buy").click(function() {
      if (!($("#tabs-container").is(':visible'))) {
        $("#tabs-container").slideToggle('medium', function() {
          if ($("#tabs-container").is(':visible')) {
            $('#buyNow-tablet').addClass('selected').addClass('selectArrow');
          }
        });
      }
      $("ul.tabs li").removeClass("active");
      var activeTab = $(this).attr("rel");
      $(".buy_content").hide();
      $("#" + activeTab).fadeIn();
      $('ul.tabs li[rel=' + activeTab + ']').addClass("active");
      $('body').animate({
        scrollTop: 0
      }, '100');

    });

    if (("#constipationAnchor").length != 0) {
      $("#constipationAnchor > li").each(function(index) {
        var itemNumber = "item" + (index + 1);
        $(this).find("a").removeAttr("name");
      });
    }
    var internal = window.location.hash;

    var divsSmartphone = $(".smartphone.menu_content[style='display: block;']");
    if (divsSmartphone.length > 0) {
      activeTab = 1;
    }

    if (last == undefined) {

      if (internal != '' && internal != '#' && internal != '#buy-now') {

        var options = $("#tabs-detail");
        var num_tab = options.find(internal).index('.tab_content');
        var tab_title = (options.find("#tab-" + internal.replace('#', '')));

        $("#tabs-detail").tabs({
          active: num_tab,
          create: function(event, ui) {
            $('.tabs_menu').css('background-position', tab_title.position().left - 30 + 'px 0');
            tab_title.children().trigger("click");
          },
          activate: function(event, ui) {
            activeTab = $("#tabs-detail").tabs("option", "active");

            if (ui.oldTab.attr('aria-controls') == 'video') {
              stopVideo();
            }
            //console.log(ui.oldTab.attr('aria-controls'));
            //ui.newTab.children().trigger( "click" );
          }
        });
        $('html, body').animate({
          scrollTop: $("#tabs-detail").offset().top
        }, 1)

      } else if (internal == '#buy-now') {
        $('.buy').trigger('click');
        $("#tabs-detail").tabs({
          active: 0,
          activate: function(event, ui) {
            activeTab = $("#tabs-detail").tabs("option", "active");
          }
        });
        $("#tabs-detail").tabs("option", "active", 0);
      } else {
        $("#tabs-detail").tabs({
          active: 0,
          activate: function(event, ui) {
            activeTab = $("#tabs-detail").tabs("option", "active");

            //  		if(activeTab!=4){
            // 	stopVideo();
            // }  	 
            if (ui.oldTab.attr('aria-controls') == 'video') {
              stopVideo();
            }
            //console.log(ui.oldTab.attr('aria-controls'));	

          }
        });
      }
    } else {
      if (internal == '#buy-now' && activeTab == 1) {
        $('.buy').trigger('click');
        var linkTab;
        if ($("#tabs-detail").hasClass('ui-tabs')) {
          $("#tabs-detail").tabs("destroy");
        }
        $("#tabs-detail").empty();
        $("#tabs-detail").html(tabsContainer);
        $('.tabs_menu .tab_item a').click(tabsHead);
        $("#tabs-detail").tabs({
          active: 0,
          create: function(event, ui) {
            linkTab = ui.tab;
          }
        });
        $("#tabs-detail").on("tabsactivate", function(event, ui) {
          activeTab = $("#tabs-detail").tabs("option", "active");
          // 	if(activeTab!=4){
          // 	stopVideo();
          // }    
          if (ui.oldTab.attr('aria-controls') == 'video') {
            stopVideo();
          }
          //	console.log(ui.oldTab.attr('aria-controls'));

          //	ui.newTab.children().trigger( "click" );	     	 	
        });

        $("#tabs-detail").tabs("option", "active", activeTab);
        linkTab.children().trigger('click');
      } else {


        if (activeTab == undefined || activeTab == 1) {
          activeTab = 0;
        }

        $('#buyNow-tablet').removeClass('selected').removeClass('selectArrow');
        $('#tabs-container').css('display', 'none');
        if ($('#tabs-detail').length != 0) {
          var linkTab;
          if ($("#tabs-detail").hasClass('ui-tabs')) {
            $("#tabs-detail").tabs("destroy");
          }
          $("#tabs-detail").empty();
          $("#tabs-detail").html(tabsContainer);
          $('.tabs_menu .tab_item a').click(tabsHead);
          $("#tabs-detail").tabs({
            active: activeTab,
            create: function(event, ui) {
              linkTab = ui.tab;
            }
          });
          $("#tabs-detail").on("tabsactivate", function(event, ui) {
            activeTab = $("#tabs-detail").tabs("option", "active");
            //	ui.newTab.children().trigger( "click" );
            if (ui.oldTab.attr('aria-controls') == 'video') {
              stopVideo();
            }
            //console.log(ui.oldTab.attr('aria-controls'));	     	 	
          });

          //$( "#tabs-detail" ).tabs( "option", "active",activeTab );   
          linkTab.children().trigger('click');
        }
      }
    }

    $(".hash_reload").click(reload);
    //   	 $('.reload_df').click(function() { 
    // 	$( "#tabs-detail" ).tabs({ active: 1 });
    // 	$('.tabs_menu').css('background-position','23% 0');
    // 	$('.tab_item a').removeClass('tab_active');
    // 	$('#tab-drug-facts a').addClass('tab_active');
    // 	$('html, body').animate({scrollTop: $("#tabs-detail").offset().top}, 1)
    // });

    if ($('.product_grid .bx-wrapper').length == 0) {
      sliderVar = $('.grid_row').bxSlider({
        minSlides: 4,
        maxSlides: 4,
        slideWidth: 135,
        pager: false,
        nextText: '',
        prevText: '',
        infiniteLoop: false,
        hideControlOnEnd: true
      });

    } else {
      sliderVar.reloadSlider({
        minSlides: 4,
        maxSlides: 4,
        slideWidth: 135,
        pager: false,
        nextText: '',
        prevText: '',
        infiniteLoop: false,
        hideControlOnEnd: true
      });
    }

    if ($('#related_5 .grid-title').hasClass('bottomAlign')) {
      $('#related_5 .grid-title').removeClass('bottomAlign');
    }

    last = false;
    lastD = false;
  }

  var distance;

  function setDesktop() {
    /*-------faqs products section-----*/

    $(".smartphone.menu_content").css('display', 'none');
    $('#tabs-detail').css('margin-top', $('.product_grid').height() - $('.product_desc').height() + 20);
    $(window).load(function() {
      $('#tabs-detail').css('margin-top', $('.product_grid').height() - $('.product_desc').height() + 20);
    });

    //distance =$('.product_grid').height()-$('.product_desc').height()+20;
    //   	 
    //	console.log($('#buyNow-tablet').hasClass('selected'));
    if ($('#buyNow-tablet').hasClass('selected')) {
      activeTab = 1;
    } else {}
    $('.buy[href="#buy-now"]').addClass('hash_reload');
    //$('.buy[href="#buy-now"]').bind('click');
    $(".hash_reload").click(reload);


    var internal = window.location.hash;

    if (internal == '#ratings') {
      $('html, body').animate({
        scrollTop: $("#tabs-detail").offset().top
      }, 1);
      console.log('ratings');
    }
    if (last == undefined) {

      if (internal != '' && internal != '#') {

        var options = $("#tabs-detail");
        var num_tab = options.find(internal).index('.tab_content');
        var tab_title = (options.find("#tab-" + internal.replace('#', '')));

        $("#tabs-detail").tabs({
          active: num_tab,
          create: function(event, ui) {
            $('.tabs_menu').css('background-position', tab_title.position().left - 30 + 'px 0');
            tab_title.children().trigger("click");
            activeTab = $("#tabs-detail").tabs("option", "active");
          },
          activate: function(event, ui) {
            activeTab = $("#tabs-detail").tabs("option", "active");
            if (ui.oldTab.attr('aria-controls') == 'video') {
              stopVideo();
            }
            //if (ui.newTab.attr('aria-controls') == 'ratings') {
            //  $('.tabs_content').css('padding', '0');
            //} else {
              $('.tabs_content').css('padding', '15px 45px 30px');
              //}
          }
        });
        var tabs_detail = $("#tabs-detail");
        if (tabs_detail.length > 0) {
            $('html, body').animate({
              scrollTop: tabs_detail.offset().top
            }, 1);
        }

      } else {
        $("#tabs-detail").tabs({
          active: 0,
          activate: function(event, ui) {
            activeTab = $("#tabs-detail").tabs("option", "active");

            if (ui.oldTab.attr('aria-controls') == 'video') {
              stopVideo();
            }
            //if (ui.newTab.attr('aria-controls') == 'ratings') {
            //  $('.tabs_content').css('padding', '0');
            //} else {
              $('.tabs_content').css('padding', '15px 45px 30px');
              //}


            //ui.newTab.children().trigger( "click" );
          }
        });
      }
    } else {
      if ($('#tabs-detail').length != 0) {
        var linkTab;
        if ($("#tabs-detail").hasClass('ui-tabs')) {
          $("#tabs-detail").tabs("destroy");
        }
        $("#tabs-detail").empty();
        $("#tabs-detail").html(tabsContainer);
        $('.tabs_menu .tab_item a').click(tabsHead);
        $("#tabs-detail").tabs({
          active: activeTab,
          create: function(event, ui) {
            linkTab = ui.tab;
          }
        });
        $("#tabs-detail").on("tabsactivate", function(event, ui) {
          activeTab = $("#tabs-detail").tabs("option", "active");
          if (ui.oldTab.attr('aria-controls') == 'video') {
            stopVideo();
          }
          if (ui.newTab.attr('aria-controls') == 'ratings') {
            $('.tabs_content').css('padding', '0');
          } else {
            $('.tabs_content').css('padding', '15px 45px 30px');
          }
        });

        $("#tabs-detail").tabs("option", "active", activeTab);
        linkTab.children().trigger('click');
      }
    }

    $('.tab_content .faq_question h4').each(function() {
      try {
        var tis = $(this),
          state = false,
          answer = tis.next('div').css("display", "none");
      } catch (err) {}
      tis.click(function() {

        state = !state;
        answer.slideToggle(state);
        tis.toggleClass('active', state);

        var faq_icon = $(this).parent().siblings(".faq_icon");
        switch_icon(faq_icon);
      });
    });

    if ($('.related_6').length == 0 || $('.related_7').length == 0) {
      $('#related_5 .grid-title').addClass('bottomAlign');
      if (msieversion()) {
        $('.bottomAlign').css('margin-bottom', '45px');
      }
    }

    $('.tab_content .faq_icon').click(function() {
      $(this).next('div').find('div').slideToggle(true);
      switch_icon($(this));
    });

    function switch_icon(faq_icon) {
      if ($(faq_icon).find("img").attr("src") == "static_resources/images/faq_minus.png")
        $(faq_icon).find("img").attr("src", "static_resources/images/faq_plus.png");
      else
        $(faq_icon).find("img").attr("src", "static_resources/images/faq_minus.png");
    }
    lastD = true;
    last = false;

    if (/Android|iPad|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

      $('#buyNow-item-tablet').css('display', 'block');
      $('#buyNow-item.show-submenu').css('display', 'none');

      $('#buyNow-item-tablet').click(function() {
        //$('#sm_buy_now').slideToggle('medium',function(){

        if ($('#sm_all_products').css('display') == 'block' || $('#allProducts-item').hasClass('active')) {
          $('#allProducts-item').removeClass('active');
          $('#sm_all_products').css('display', 'none');
        }
        if ($('#sm_buy_now').css('display') == 'block') {
          $('#buyNow-item-tablet').removeClass('active');
          $('#sm_buy_now').css('display', 'none');
        } else {
          $('#sm_buy_now').css('display', 'block');
          $('#buyNow-item-tablet').addClass('active');

          var dd_show = 0;
          $("#sm_buy_now .mbn_right .panel").each(function() {
            if ($(this).css("display") == "block")
              dd_show = 1;
          });

          if (dd_show == 0) {
            if ($("#panel1").css("display") != "block")
              $("#panel1").css("display", "block");
            $("#sm_buy_now .bnm_product[name='panel1']").addClass('product_active');
          }
        }
      });


      $('#sm_buy_now .bnm_product').each(function() {
        $(this).find('a').attr('href', 'javascript:void(0)');
      });



    }

      sliderVar = $('.grid_row').bxSlider({
          minSlides: 2,
          maxSlides: 2,
          slideWidth: 115,
          pager: false,
          nextText: '',
          prevText: '',
          infiniteLoop: false,
          hideControlOnEnd: true
      });

  }

  /* ---------------------------------------------------------------------
 	Product Detail Video, Video Tag and Vimeo
 	Author: Edgar Florez
 	Using Vimeo API and Froogloop 
 	Froogloop REPO //https://github.com/vimeo/player-api/tree/master/javascript
 	JS Hosted copy //http://a.vimeocdn.com/js/froogaloop2.min.js
 	------------------------------------------------------------------------ */

  if ($('.videoFrameWrapper').length != 0) {
    var iframe = $('#dulcolaxVideo')[0],
      player = $f(iframe);

    player.addEvent('ready', function() {

    });
  }

  function stopVideo() {
    if ($('.videoFrameWrapper').length != 0) {
      player.api("pause");
    } else {
      var v = document.getElementById("dulcolaxVideo"),
        p = $("#dulcolaxVideo").attr("poster");
      try {
        v.pause();
      } catch (e) {};
      v.currentTime = 0;
      v.removeAttribute("poster");

      setTimeout(function() {
        v.poster = p;


      }, 500)
    }
  }

  /* ---------------------------------------------------------------------
    END ******* Product Detail Video, Video Tag and Vimeo 
 	------------------------------------------------------------------------ */

  /*Hide/Show Info*/
  $('.hideShow').on('click', function(e) {
    e.preventDefault();
    var relData = $(this).attr('rel');
    $('.' + relData).slideToggle('medium');
  });

  /* ---------------------------------------------------------------------
 	HOME Slider
 	Author: Edgar Florez
 	Home Slider using BXSlider http://bxslider.com/
 	------------------------------------------------------------------------ */

  if ($('.slider').length != 0) {
    $('.slider').css('visibility', 'hidden');
    $('.slider').bxSlider({
      auto: true,
      pause: 10000,
      // startSlide:4,
      onSliderLoad: function() {
        $('.slider').css('visibility', 'visible');
        $('.slider').hide();
        $('.slider').fadeIn();
      }
    });
  }
  /* ---------------------------------------------------------------------
 	Colonoscopy Prep Slider
 	Author: Guillermo Aguilar
 	Home Slider using BXSlider http://bxslider.com/
 	------------------------------------------------------------------------ */

  $('#sliderUndy').bxSlider({
    auto: true,
    pause: 2000,
    controls: false,
    pager: false
  });
  /* ---------------------------------------------------------------------
 	Colonoscopy Prep hide/show + -
 	Author: Guillermo Aguilar
 	------------------------------------------------------------------------ */
  $(".hideShow").on("click", function() {
    if ($(this).hasClass("plus")) {
      $(this).removeClass("plus").addClass("minus");
      $(this).find(".more").hide();
      $(this).find(".less").css("display", "inline-block");
    } else {
      $(this).removeClass("minus").addClass("plus");
      $(this).find(".more").css("display", "inline-block");
      $(this).find(".less").hide();
    }
  });
  //// select buy now Tablet

  $(".bnm_product").click(function(e) {

    e.preventDefault();
    var alink = $(this).find("a").attr("href");

    setTimeout(function() {
      window.location.href = alink;
    }, 500);
  });

  $(".retailer_desc").each(function() {

    var option_value = $(this).find("select option:eq(1)").val();

    var rbn = $(this).siblings(".retailer_buy_now");

    rbn.find("a").attr("href", option_value);
    rbn.find("a").attr("target", "_blank");

  });

  $(".retailer_desc").find("select").change(function() {

    var option_value = $(this).val();

    if (option_value && option_value != "") {
      var rbn = $(this).parent().siblings(".retailer_buy_now");
      rbn.find("a").attr("href", option_value);
      rbn.find("a").attr("target", "_blank");
    }
  });
  if (IsIE8Browser()) {
    $(".box_content").append("<div class='top-bg'></div><div class='bottom-bg'></div>");
  }
  if (!IsIE8Browser()) {
    //// select buy now Smarthphone
    $(".select")
      .change(function() {
        $('.retailer_buy_now a.destination').hide();
        $('.menu_content .retailer_logo').css('border', '1px solid transparent');
        $(".select option:selected:nth-child(1)").each(function() {
          $(".logo-content a:nth-child(1),.logo-content a:nth-child(2),.logo-content a:nth-child(3),.logo-content a:nth-child(4),.logo-content a:nth-child(5),.logo-content a:nth-child(6)").attr("href", '#').fadeOut('fast');
        });
        $("#select-laxative-tablets option:selected:nth-child(2)").each(function() {
          $("#box1 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=395780').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box1 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod5015-product').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(4)").attr("href", '#').fadeOut('fast');
          $("#box1 .logo-content a:nth-child(5)").attr("href", '#').fadeOut('fast');
          $("#box1 .logo-content a:nth-child(6)").attr("href", '#').fadeOut('fast');
        });
        $("#select-laxative-tablets option:selected:nth-child(3)").each(function() {
          $("#box1 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=108597').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box1 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod5017-product').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(4)").attr("href", 'http://www.walmart.com/ip/Dulcolax-Tablets-Laxative-25-ct/10309827').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-overnight-relief-laxative-tablets/qxp74158?catid=184260').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(6)").attr("href", '#').fadeOut('fast');
        });
        $("#select-laxative-tablets option:selected:nth-child(4)").each(function() {
          $("#box1 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=222885').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box1 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod5782-product').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(4)").attr("href", '#').fadeOut('fast');
          $("#box1 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-laxative-tablets/qxp412594?catid=184260').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(6)").attr("href", 'http://www.target.com/p/dulcolax-laxative-tablets-50-count/-/A-11862909#prodSlot=medium_1_1&term=Dulcolax').fadeIn('slow');
        });
        $("#select-laxative-tablets option:selected:nth-child(5)").each(function() {
          $("#box1 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Tablets?skuId=314153').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/Dulcolax-Laxative-Comfort-Tablets-tablets/dp/B000063XTO/ref=sr_1_1?m=ATVPDKIKX0DER&s=hpc&ie=UTF8&qid=1365437226&sr=1-1&keywords=Dulcolax').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-tablets/ID=prod1418613-product').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(4)").attr("href", 'http://www.walmart.com/ip/Dulcolax-Tablets-Laxative-100-ct/10309828').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-overnight-relief-laxative-tablets/qxp74157?catid=184260').fadeIn('slow');
          $("#box1 .logo-content a:nth-child(6)").attr("href", '#').fadeOut('fast');
        });

        $("#select-laxative-pink option:selected:nth-child(2)").each(function() {
          $("#box2 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Laxative-Tablets-for-Women?skuId=883974').fadeIn('slow');
          $("#box2 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/Dulcolax-Laxative-Tablets-Women-Bisacodyl/dp/B007RWX6HS/ref=sr_1_1?ie=UTF8&qid=1359563033&sr=8-1&keywords=dulcolax+women').fadeIn('slow');
          $("#box2 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-comfort-coated-tablets-for-women/ID=prod6091211-product').fadeIn('slow');
          $("#box2 .logo-content a:nth-child(4)").attr("href", 'http://www.drugstore.com/dulcolax-laxative-comfort-coated-tablets-for-women/qxp393008?catid=184260');
        });
        $("#select-laxative-pink option:selected:nth-child(3)").each(function() {
          $("#box2 .logo-content a:nth-child(1)").attr("href", '#').fadeOut('fast');
          $("#box2 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/Dulcolax-Laxative-Tablets-Women-Bisacodyl/dp/B007RWX6HS/ref=sr_1_1?ie=UTF8&qid=1359563033&sr=8-1&keywords=dulcolax+women').fadeIn('slow');
          $("#box2 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-comfort-coated-tablets-for-women/ID=prod6162943-product').fadeIn('slow');
          $("#box2 .logo-content a:nth-child(4)").attr("href", 'http://www.drugstore.com/dulcolax-laxative-comfort-coated-tablets-for-women/qxp467851?catid=184260').fadeIn('slow');
        });
        $("#select-stool option:selected:nth-child(2)").each(function() {
          $("#box3 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Liquid-Gels?skuId=252475').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box3 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-stool-softener-liquid-gels/ID=prod387577-product').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(4)").attr("href", 'http://www.walmart.com/ip/Dulcolax-Liquid-Gels-Stool-Softener-25-ct/10309830').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-stool-softener-liquid-gels/qxp79001?catid=184260').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(6)").attr("href", '#').fadeOut('fast');
        });
        $("#select-stool option:selected:nth-child(3)").each(function() {
          $("#box3 .logo-content a:nth-child(1)").attr("href", '#').fadeOut('fast');
          $("#box3 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box3 .logo-content a:nth-child(3)").attr("href", '#').fadeOut('fast');
          $("#box3 .logo-content a:nth-child(4)").attr("href", '#').fadeOut('fast');
          $("#box3 .logo-content a:nth-child(5)").attr("href", '#').fadeOut('fast');
          $("#box3 .logo-content a:nth-child(6)").attr("href", 'http://www.target.com/p/dulcolax-stool-softener-50-count/-/A-14236091#prodSlot=medium_1_2&term=Dulcolax').fadeIn('slow');
        });
        $("#select-stool option:selected:nth-child(4)").each(function() {
          $("#box3 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Liquid-Gels?skuId=447154').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/Dulcolax-Stool-Softener-Liquid-liquid/dp/B00007MII1/ref=sr_1_1?ie=UTF8&qid=1359563312&sr=8-1&keywords=dulcolax+stool+softener').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-stool-softener-liquid-gels/ID=prod1418612-product').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(4)").attr("href", 'http://www.walmart.com/ip/Dulcolax-Liquid-Gels-Stool-Softener-100ct/10309831').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-stool-softener-liquid-gels/qxp79002?catid=184260').fadeIn('slow');
          $("#box3 .logo-content a:nth-child(6)").attr("href", '#').fadeOut('fast');
        });

        $("#select-dulcoease option:selected:nth-child(2)").each(function() {
          $("#box4 .logo-content a:nth-child(1)").attr("href", 'http://www.cvs.com/shop/product-detail/DulcoEase-Pink-Stool-Softener-Softgels?skuId=927369').fadeIn('slow');
          $("#box4 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/DulcoEase-Stool-Softener-Softgel-Women/dp/B00BN5LJUG/ref=sr_1_1?ie=UTF8&qid=1367524283&sr=8-1&keywords=B00BN5LJUG').fadeIn('slow');
          $("#box4 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcoease-pink-stool-softener-softgels/ID=prod6162050-produc').fadeIn('slow');
          $("#box4 .logo-content a:nth-child(4)").attr("href", 'http://www.drugstore.com/dulcoease-pink-stool-softener-softgels/qxp480182?catid=184260').fadeIn('slow');
        });
        $("#select-dulcoease option:selected:nth-child(3)").each(function() {
          $("#box4 .logo-content a:nth-child(1)").attr("href", '#').fadeOut('fast');
          $("#box4 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/DulcoEase-Stool-Softener-Softgel-Women/dp/B00BN5LKK0/ref=sr_1_2?ie=UTF8&qid=1363879881&sr=8-2&keywords=dulcoease').fadeIn('slow');
          $("#box4 .logo-content a:nth-child(3)").attr("href", '#').fadeOut('fast');
          $("#box4 .logo-content a:nth-child(4)").attr("href", 'http://www.drugstore.com/dulcoease-pink-stool-softener-softgels/qxp480181?catid=184260').fadeIn('slow');
        });
        $("#select-suppositories option:selected:nth-child(2)").each(function() {
          $("#box5 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Suppositories?skuId=184325').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(3)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(4)").attr("href", 'http://www.walmart.com/ip/Dulcolax-Suppositories-Laxative-4-ct/10309829').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(5)").attr("href", '#').fadeOut('fast');
        });
        $("#select-suppositories option:selected:nth-child(3)").each(function() {
          $("#box5 .logo-content a:nth-child(1)").attr("href", 'http://www.cvs.com/shop/product-detail/Dulcolax-Suppositories?skuId=184325').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(2)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-suppositories/ID=prod5016-product').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(4)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-laxative-suppositories/qxp412593?catid=184260').fadeIn('slow');
        });
        $("#select-suppositories option:selected:nth-child(4)").each(function() {
          $("#box5 .logo-content a:nth-child(1)").attr("href", 'http://cvs.com/shop/product-detail/Dulcolax-Suppositories?skuId=163386').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/Dulcolax-Laxative-Comfort-Suppositories-suppositories/dp/B00007MII0/ref=sr_1_1?ie=UTF8&qid=1359563108&sr=8-1&keywords=dulcolax+suppositories').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(3)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(4)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-laxative-comfort-shaped-suppositories/qxp78801?catid=184260').fadeIn('slow');
        });
        $("#select-suppositories option:selected:nth-child(5)").each(function() {
          $("#box5 .logo-content a:nth-child(1)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(2)").attr("href", 'http://www.amazon.com/Dulcolax-Laxative-Comfort-Suppositories-suppositories/dp/B00007MII0/ref=sr_1_1?ie=UTF8&qid=1359563108&sr=8-1&keywords=dulcolax+suppositories').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(3)").attr("href", 'http://www.walgreens.com/store/c/dulcolax-laxative-suppositories/ID=prod1418548-product').fadeIn('slow');
          $("#box5 .logo-content a:nth-child(4)").attr("href", '#').fadeOut('fast');
          $("#box5 .logo-content a:nth-child(5)").attr("href", 'http://www.drugstore.com/dulcolax-laxative-comfort-shaped-suppositories/qxp79000?catid=184260').fadeIn('slow');
        });
      })
      .change();

  }


});

function IsIE8Browser() {
  var rv = -1;
  var ua = navigator.userAgent;
  var re = new RegExp("Trident\/([0-9]{1,}[\.0-9]{0,})");
  if (re.exec(ua) != null) {
    rv = parseFloat(RegExp.$1);
  }
  return (rv == 4);

}


function msieversion() {

  var ua = window.navigator.userAgent;
  var msie = ua.indexOf("MSIE ");

  if (msie > 0 || !! navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer, return version number
    return true;
  else // If another browser, return 0
    return false;


}
$(function() {

  $('.external_link').click(function(e) {
    e.preventDefault();

    var destination_url = $(this).attr("href");
    var uri_enc = encodeURIComponent(destination_url);
    var myOtherUrl = "interstitial-exit?url=" + uri_enc;

    $(".destination").attr("href", destination_url);
  });

  function jsGetQueryString(variable) {
    var queryString = window.location.search.substring(1);
    var vars = queryString.split("&");
    for (var i = 0; i < vars.length; i++) {
      var getValue = vars[i].split("=");
      if (getValue[0] == variable) return getValue[1];
    }
  }

  var theurl = jsGetQueryString("url");
  var uri_dec = decodeURIComponent(theurl);
});

function openRatings() {
  $(".tab_content").each(function() {
    $(this).css("display", "none");
  });
  var tab_open = '#ratings';
  var menu_name = tab_open.substr(1, tab_open.length - 1);

  //$('#tab-'+menu_name).addClass('ui-tabs-active');
  //$('#tab-'+menu_name).addClass('ui-state-active');
  //alert($(".tab_item").length);
  if ($(".tab_item").length == 6) {
    var bg_bx = '744.75';
  } else {
    var bg_bx = '593.4';
  }
  $(".tabs_menu").css("background-position", bg_bx + "px 0px");
  $('.tabs_menu .tab_active').removeClass('tab_active');
  $(".tabs_menu li[name='" + menu_name + "'] a").addClass('tab_active');
  $(this).css("cursor", "pointer");
  $(tab_open).css("display", "block");
  var body = $("html, body");
  body.animate({
    scrollTop: 1300
  }, '500', 'swing', function() {
    //alert("Finished animating");
  });
  //animating hash jump to be smooth - INTERNAL LINKS
  //window.location.hash = 'ratings';
  e.preventDefault();
}
