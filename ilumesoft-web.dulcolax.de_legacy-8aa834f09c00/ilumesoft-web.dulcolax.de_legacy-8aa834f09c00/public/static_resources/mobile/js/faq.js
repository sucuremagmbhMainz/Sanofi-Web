$(document).ready( function() {
	var hash = window.location.hash;
	var anchor_name = hash.substr(1,hash.length - 1);
	if(anchor_name=='prevention_tips'){
		try{
		if($('div#anchored_hidden').css('display')=='none'){
			$('div#anchored_hidden').css('display','block');
			
			$('div#auto-open').find('div.closed-state').css('display','none');
			$('div#auto-open').find('div.open-state').css('display','block');
        }
		setTimeout(function() {
			$(document).scrollTop( $("#prevention_tips").offset().top ); 
			}, 300);
		}
		catch(err){}
		
	}
	$('.faq_question h4').each(function() {
	try{
    var tis = $(this), state = false, answer = tis.next('div').css("display","none");
	}
	catch(err){}
    tis.click(function() {
	
      state = !state;
	  answer.slideToggle(state);
      tis.toggleClass('active',state);
	  
	  var faq_icon = $(this).parent().siblings(".faq_icon");
	  switch_icon( faq_icon );
	  switchReadMoreText($(this));
   });	
 });

$('.open_anchor').click( function() {
	try{
	if($('div#anchored_hidden').css('display')=='none'){
		$('div#anchored_hidden').css('display','block');
		
		$('div#auto-open').find('div.closed-state').css('display','none');
		$('div#auto-open').find('div.open-state').css('display','block');
	}
	}
	catch(err){}
  });
  $('.expand-meds').click( function() {

	if($('ul#sub-meds').hasClass('hideItem'))
		$('ul#sub-meds').removeClass('hideItem');
	else
		$('ul#sub-meds').addClass('hideItem');
	
  });
  
  $('.faq_icon').click( function() {
	
	$(this).next('div').find('div').slideToggle(true);
	switch_icon( $(this) );
	switchReadMoreText($(this).next('h4.anchored_label')); //h4.anchored_label
	
	

  });
  
  var currentReadMoreCopy='';
  function switchReadMoreText(item){
	//;
	try{
	if(item.css('color').indexOf('8, 95')!=-1)
		return;
	}
	catch(err){}
	if(item.hasClass('anchored_label'))
		return;
	if(item.text()!='Read less')
		currentReadMoreCopy=item.text();
	
	if(item.text()==currentReadMoreCopy){
		item.text();
	}
	else if(item.text()=='Read less'){
		item.text(currentReadMoreCopy);
	}
	
  }
  function switch_icon ( faq_icon ) {

	if($(faq_icon).find("img").attr("src") == "static_resources/images/faq_minus.png")
		$(faq_icon).find("img").attr("src","static_resources/images/faq_plus.png");
	else	
	$(faq_icon).find("img").attr("src","static_resources/images/faq_minus.png");  
	
  }
  
  $('.content_accordian').click( function() {
	
	$(this).next('div.hidden_content_expander').slideToggle(true);
	try{
	if($(this).find('div.closed-state').css('display')=='block'){
		$(this).find('div.closed-state').css('display','none');
		$(this).find('div.open-state').css('display','block');
	}
	else{
		$(this).find('div.closed-state').css('display','block');
		$(this).find('div.open-state').css('display','none');
	}
	}
	catch(err){}

  });
  
  
 
});