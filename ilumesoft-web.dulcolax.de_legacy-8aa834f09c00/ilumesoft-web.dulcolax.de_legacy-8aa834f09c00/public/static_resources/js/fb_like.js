function fb_like(link) {
	url=location.href;
	title=document.title;
	var fb_url;
	switch(link){
		case 'cca1':
			fb_url="https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D=https%3A%2F%2Fwww.dulcolax.com%2Fcolonoscopy-prep.html&p%5Bimages%5D%5B0%5D=https://www.dulcolax.com/static_resources/images/logo_header.jpg&p%5Btitle%5D=Dulcolax(R) - Proud%20Sponsor%20of%20the%20Colon%20Cancer%20Alliance&p%5Bsummary%5D=The%20makers%20of%20Dulcolax(R)%20are%20a%20proud%20sponsor%20of%20the%20Colon%20Cancer%20Alliance";
			
			break;
		case 'cca2':
			fb_url="https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D=https%3A%2F%2Fwww.dulcolax.com%2Fcolonoscopy-prep.html&p%5Bimages%5D%5B0%5D=https://www.dulcolax.com/static_resources/images/logo_header.jpg&p%5Btitle%5D=Dulcolax(R) - Run/Walk against Colon Cancer&p%5Bsummary%5D=Dulcolax(R) is proud to sponsor the Undy 5000, a series of family-friendly 5K \"run in your undies\" races presented by the Colon Cancer Alliance to help bring awareness to colon cancer. ";
			
			break;
		case 'sweep':
			fb_url="https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D=https%3A%2F%2Fwww.dulcolax.com%2Fswform.html&p%5Bimages%5D%5B0%5D=https://www.dulcolax.com/static_resources/images/logo_header.jpg&p%5Btitle%5D=Enter%20for%20your%20chance%20to%20win%20the%20Dulcolax(R)%20Summer%20Travel%20Sweepstakes&p%5Bsummary%5D=Enter%20for%20your%20chance%20to%20win%20the%20Dulcolax(R)%20Summer%20Travel%20Sweepstakes";
			
			break;	
		case 'coupon':
			fb_url="https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D=https%3A%2F%2Fwww.dulcolax.com%2FDulcolax-coupon.html&p%5Bimages%5D%5B0%5D=https://www.dulcolax.com/static_resources/images/logo_header.jpg&p%5Btitle%5D=Dulcolax(R) - Special Offers&p%5Bsummary%5D=Save on Dulcolax(R) and DulcoEase(R) Pink(TM)";
			
			break;
		
	
	}
	//fb_url="https://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=titlehere&p%5Burl%5D=http%3A%2F%2Fwww.yoururlhere.com&p%5Bsummary%5D=yoursummaryhere&p%5Bimages%5D%5B0%5D=https%3A%2F%2Fwww.google.com%2Fimages%2Fsrpr%2Flogo3w.png";
	window.open(fb_url,'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
}
var win=null;

function ShowTwitterWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}

