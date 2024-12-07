var Dulcolax = {};

Dulcolax.menu = {};

Dulcolax.isMobile = ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));

Dulcolax.menu.showAllProducts = function(){
	$("#sm_all_products").css("display","block");						
	$(".m_all_products").addClass("active");

	//$(".m_all_products").mouseover(function() {
		if($("#sm_buy_now").css('display') =='block'){

			$("#buyNow-item-tablet").removeClass('active');
			$("#sm_buy_now").css('display','none');
		}

		$("#sm_all_products").css("display","block");	
		var dd_show = 0;
		$("#sm_all_products .mbn_right").each( function() {
			if( $(this).css("display") == "block" )
				dd_show = 1;
		});

		if( dd_show == 0 ) {
			if( $("#ap_panel1").css("display") != "block" )
				$("#ap_panel1").css("display","block");
				$("#sm_all_products .bnm_product[name='ap_panel1']").addClass('product_active');
		}
	//});
}

Dulcolax.menu.hideAllProducts = function(){
	var ie = Dulcolax.getInternetExplorerVersion();
			
	//no flickering for IE
	// if( (ie > -1 && ie <= 9) && e.target.nodeName == "A" )
	//  return true;
	// else 
	 if( !$(this).hasClass("products_landing")) {
		$(".m_all_products").removeClass("active");
	}

	$("#sm_all_products").css("display","none");
}

Dulcolax.getInternetExplorerVersion = function ()
// Returns the version of Windows Internet Explorer or a -1
// (indicating the use of another browser).
{
   var rv = -1; // Return value assumes failure.
   if (navigator.appName == 'Microsoft Internet Explorer')
   {
      var ua = navigator.userAgent;
      var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
      if (re.exec(ua) != null)
         rv = parseFloat( RegExp.$1 );
   }
   return rv;
	 
}

$(document).ready( function() {

	if(Dulcolax.isMobile) { //On Mobile

		$('.m_all_products.desktop-item > a').attr('href', '#').on('click', function(e){
			e.preventDefault();
		});

		$("#sm_all_products .bnm_product:nth-child(2), #sm_all_products .bnm_product:nth-child(3), #sm_all_products .bnm_product:nth-child(4), #sm_all_products .bnm_product:nth-child(5), #sm_all_products .bnm_product:nth-child(6), #sm_all_products .bnm_product:nth-child(7), #sm_all_products .bnm_product:nth-child(8)").each(function(){
    				$(this).find('a').attr('href','javascript:void(0)');
    	});

		$(".m_all_products").on('click', function(e) {
			if($("#sm_all_products").css('display') =='block'){
				Dulcolax.menu.hideAllProducts();
			} else {
				Dulcolax.menu.showAllProducts();
			}
		});

	} else { // On desktop

		//All Products submenu
		$("#sm_all_products, .m_all_products").mouseover(function() {
		 Dulcolax.menu.showAllProducts();
		});

		$("#sm_all_products, .m_all_products").mouseout(function(e) {
			Dulcolax.menu.hideAllProducts();
		});

		//trigger click for menu_item area
		/*$(".main-menu li").click(function() {
			window.location.href = $(this).find("a").attr("href");
		});*/
		
	 }

		//$("#sm_all_products a").removeAttr('href');
		//$("#sm_sm_buy_now a").removeAttr('href');
		
		//Buy Now submenu
		$("#sm_buy_now, .m_buy_now").mouseover(function() {
			$("#sm_buy_now").css("display","block");
			$(".m_buy_now").addClass("active");		
		});
		
		//Buy Now main nav hover
		$(".m_buy_now").mouseover(function() {
			$("#sm_all_products").css("display","none");
			$("#sm_buy_now").css("display","block");	
			
			var dd_show = 0;
			$(".menu_buy_now .mbn_right .panel").each( function() {
				if( $(this).css("display") == "block" )
					dd_show = 1;
			});

			if( dd_show == 0 ) {
			if( $("#panel1").css("display") != "block" )
				$("#panel1").css("display","block");
			}					
		});
		
		
		$("#sm_buy_now, .m_buy_now").mouseleave(function(e) {
			//no mouseleave triggering on select only IE
                        if (msieversion() && e.target.nodeName == 'SELECT') {
                            return true;
                        }
                      
			$("#sm_buy_now").css('display','none');
			if(!( /Android|iPad|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) ){
				$("#sm_buy_now").css("display","none");
				$(".m_buy_now").removeClass("active");	
			}
		});
		
		
		
		//Buy Now menu behavior
		$(".bnm_product").mouseover(function() {
			$(".bnm_product").each( function() {
				$(this).removeClass("product_active");	
			});

			$(this).addClass("product_active");
			$(this).css("cursor","pointer");
			
			var panel = $(this).attr("name");
			
			panel_id = "#" + panel;
			$("#panel1").css("display","none");
			$("#panel2").css("display","none");
			$("#panel3").css("display","none");
			$("#panel4").css("display","none");
			$("#panel5").css("display","none");
			$("#panel6").css("display","none");
			
			$("#ap_panel1").css("display","none");
			$("#ap_panel2").css("display","none");
			$("#ap_panel3").css("display","none");
			$("#ap_panel4").css("display","none");
			$("#ap_panel5").css("display","none");
			$("#ap_panel6").css("display","none");	
			$("#ap_panel7").css("display","none");
			$("#ap_panel8").css("display","none");
			
			$( panel_id ).css("display","block");
			
			
			
		});
		
		
		$(".bnm_product").mouseout(function() {
			
			var panel_visible = "#" + $(this).attr("name");

			if( $(panel_visible).css("display") == "none" ) {
				$(this).removeClass("product_active");
				$(this).css("cursor","default");
			}
			
		});
		
		var buyNowUrl;
		
		
		//assigning default links in Buy Now selects
		$(".retailer_desc").each( function() {

			var option_value = $(this).find("select option:eq(1)").val();
									
			var rbn = $(this).siblings(".retailer_buy_now");
			
			rbn.find("a").attr("href", option_value);
			//rbn.find("a").attr("target","_blank");
			
		});
		
		//handling Buy Now menu interaction
		$(".retailer_desc").find("select").change(function() {
			
			var option_value = $(this).val();
			
			if(option_value && option_value != "") {
				var rbn = $(this).parent().siblings(".retailer_buy_now");
				rbn.find("a").attr("href", option_value);
				//rbn.find("a").attr("target","_blank");
			}
		});
		
		$('.retailer_buy_now a').click(function(){
			buyNowUrl = $(this).attr('href');
			$(this).attr('href','javascript:void(0)');
			window.open(buyNowUrl , '_blank');
		});		
		
		
		$('.bnm_product a').on("click", function(e){
			e.preventDefault();				
		});		

});