
var regs_service_url =  "Special-Offers-Registration.html"; 

$(document).ready(function() {
	//btnSubmit
	 
	$("#btnSubmit").click(function(){
			  if(validate_regsform()) {
			  //var params = $('#regForm').serialize();
			  var params = getSerializedFields(); 
			  try {
				  /*
		          0 : success
		         -1 : general failed submit
		         -2 : invalid  inputs
		         -3 : system error and timeouts
		         -4 : unauthorized service access
		         -5 : invalid captcha
		     */
			        $.ajax({
			            url: regs_service_url,
			           // contentType: "application/json; charset=utf-8",
			            type: "POST",
			            data: params,
			            success: function (transport) {
			            	//alert("success");
			            	var status_obj = transport;
				        	//alert("status_packet=" +  status_obj.statusCode + " " + " msg: " + status_obj.message);
				        	if( status_obj.statusCode == 0 ) {
				        		//alert("record=" + status_obj.responseRecord);
				        		window.location = "registration-thank-you.html";
				        		
				        	}
				        	if( status_obj.statusCode == -1 ) {
				        		//error state
				        		alert('Internal Error');
				        	}
				        }
			        });
			            //return false;
			      
			        
			    } catch(error){
			          //alert('error:'+error);
			    }
			  
		  };
			return false;
	 
	 });
	
	$('#tMonth').change(function() {
		  curVal=$(this).val();
		  if(curVal.length==1)
			  $(this).val("0"+curVal);
		});
});

function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
function GetDate(){
	var d = new Date();

	var month = d.getMonth()+1;
	var day = d.getDate();

	var output = d.getFullYear()  +
	    (month<10 ? '0' : '') + month  +
	    (day<10 ? '0' : '') + day;
	return output;

}
function GetAge(dob){
	var year=Number(dob.substr(0,4));
	var month=Number(dob.substr(4,2))-1;
	var day=Number(dob.substr(6,2));
	var today=new Date();
	var age=today.getFullYear()-year;
	if(today.getMonth()<month || (today.getMonth()==month && today.getDate()<day)){age--;}
	return age;

}
function validate_regsform() {
	validForm=true;
	if($("#fname").val()==''){
		$("#fname").addClass('errBorder');
		validForm=false;
	}
	else{
		$("#fname").removeClass('errBorder');
	}
	if($("#lname").val()==''){
		$("#lname").addClass('errBorder');
		validForm=false;
	}
	else{
		$("#lname").removeClass('errBorder');
	}
	if($("#zip").val()==''){
		$("#zip").addClass('errBorder');
		validForm=false;
	}
	else{
		$("#zip").removeClass('errBorder');
	}
	var validMonth=true;
	if($("#tMonth").val()==''){
		
		$("#tMonth").addClass('errBorder');
		
		validForm=false;
		validMonth=false;
	}
	else{
		$("#tMonth").removeClass('errBorder');
	}
	var monthVal=$("#tMonth").val()*1;
	
	var validYear=true;
	if($("#tYear").val()==''){
		$("#tYear").addClass('errBorder');
		validForm=false;
		validYear=false;
	}
	else{
		$("#tYear").removeClass('errBorder');
	}
	var yearVal=$("#tYear").val()*1;
	
	if(isNaN(monthVal) && validMonth){
		$("#tMonth").addClass('errBorder');
		validForm=false;
		validMonth=false;
	}
	else{
		if(validForm)$("#tMonth").removeClass('errBorder');
	}
	
	if((monthVal<1 || monthVal>12) && validMonth){
		$("#tMonth").addClass('errBorder');
		validForm=false;
		validMonth=false;
		
		
	}
	else{
		if(validForm)$("#tMonth").removeClass('errBorder');
	}
	
	
	
	if(isNaN(yearVal) && validYear){
		$("#tYear").addClass('errBorder');
		validForm=false;
		validYear=false;
	}
	else{
		if(validForm)$("#tYear").removeClass('errBorder');
	}
	if((yearVal<1885 || yearVal>2012) && validYear){
		$("#tYear").addClass('errBorder');
		validForm=false;
		validYear=false;
		
	}
	else{
		if(validForm)$("#tYear").removeClass('errBorder');
	}
	monthVal=monthVal+'';
	if(monthVal.length==1)monthVal="0"+''+monthVal;
	
	if(GetAge(yearVal+''+monthVal+''+'01')<18 && validMonth && validYear){
		$("#tYear").addClass('errBorder');
		$("#tMonth").addClass('errBorder');
		validForm=false;
	}
	else{
		if(validForm)$("#tYear").removeClass('errBorder');
		if(validForm)$("#tMonth").removeClass('errBorder');
		
	}
	
	
	if($("#email").val()==''){
		$("#email").addClass('errBorder');
		validForm=false;
	}
	else{
		$("#email").removeClass('errBorder');
	}
	
	if(!IsEmail($("#email").val())){
		$("#email").addClass('errBorder');
		validForm=false;
	}
	else{
		$("#email").removeClass('errBorder');
	}
	
	if($("#gender_m:checked").val()!='M' && $("#gender_f:checked").val()!='F'){
		$("#gender_err").removeClass('hideItem');
		validForm=false;
	}
	else{
		$("#gender_err").addClass('hideItem');
	}
	
	/*if($("#lt_women:checked").val()!='on' 
		&& $("#ltablets:checked").val()!='on'
		&& $("#lsuppositories:checked").val()!='on'
		&& $("#ssoftener:checked").val()!='on'
		&& $("#psoftener:checked").val()!='on')
		{
		$("#product_err").removeClass('hideItem');
		validForm=false;
	}
	else{
		$("#product_err").addClass('hideItem');
	}*/
	
	/*if($("#overnight:checked").val()!='on' 
		&& $("#ssofteners:checked").val()!='on'
		&& $("#magnesia:checked").val()!='on'
		&& $("#suppositories:checked").val()!='on'
		&& $("#fiber:checked").val()!='on'
		&& $("#probiotics:checked").val()!='on'
		&& $("#enemas:checked").val()!='on'
		&& $("#salines:checked").val()!='on'
		&& $("#olaxatives:checked").val()!='on'
		&& $("#nota:checked").val()!='on')
		{
		$("#producttype_err").removeClass('hideItem');
		validForm=false;
	}
	else{
		$("#producttype_err").addClass('hideItem');
	}*/
	/*if($("#chk_last:checked").val()!='on'){
		$("#agree_err").removeClass('hideItem');
		validForm=false;
	}
	else{
		$("#agree_err").addClass('hideItem');
	}*/
	
	if(!validForm)
		window.scrollTo(0,0);
	return validForm;
}

var getSerializedFields = function() {
    var serialized_frm = "";
    var delimiter = "&";
    inputs = document.getElementsByTagName("input");
    for (var b = 0; b < inputs.length; b++) {
            if (inputs[b].type == "hidden" ){
               var repl =  inputs[b].value;
               if( repl.indexOf("&") !=-1 ) {
               repl = repl.replace(/&/g, "_ifg_"); 
               }
               serialized_frm += delimiter+ inputs[b].name + "=" + repl;
            } else  if (inputs[b].type == "text" ){
               var repl2 =  inputs[b].value;
               if( repl2.indexOf("&") !=-1 ) {
                 repl2 = repl2.replace(/&/g, "_ifg_"); 
               }
               serialized_frm += delimiter + inputs[b].name + "=" + repl2;
            } else if (inputs[b].type == "checkbox" && inputs[b].checked == true ) {
                serialized_frm +=  delimiter + inputs[b].name + "=" + inputs[b].value;
            } else if (inputs[b].type == "radio" && inputs[b].checked == true ) {
                var name = inputs[b].name;
                serialized_frm +=  delimiter + name + "=" + inputs[b].value;
            }
    }
    selects = document.getElementsByTagName("select");
    for (var b1 = 0; b1 < selects.length; b1++) {
        if( selects[b1].selectedIndex > 0) { 
                var selectitem = selects[b1].options[selects[b1].options.selectedIndex].value
                serialized_frm +=  delimiter +  selects[b1].name + "=" +selectitem;
        }
    }
    return(serialized_frm.substr(1));
}