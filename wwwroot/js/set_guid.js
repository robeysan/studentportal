function validate(obj){
	
	var valid=true;
	$(obj).find('.validate').each(function(index){
		var localvalid = validate_field($(this));
		valid = (localvalid == false) ? localvalid: valid;
	});
	
	if(valid==true){
		$('.elp_submit > input').attr('disabled', true);
		$('form.requestinfo').submit();
		return true;
	} else {
		return false;
	}
	
}

function validate_field(obj) {
	obj = (obj.currentTarget) ? obj.currentTarget : obj;
	var classes=$(obj).attr('class').split(' ');
		for(key in classes){
			if(classes[key].indexOf('v-')==0){
				var validator=classes[key].replace('v-','').split('-');
				var localvalid=true;
				switch(validator[0]){
					case "required":
						localvalid=validate_required($(obj).val());
					break;
					case "contains":
						localvalid=validate_contains($(obj).val(),validator.slice(1));
					break;
					case "between":
						localvalid=validate_between($(obj).val(),validator.slice(1));
					break;
					case "email":
						localvalid=validate_email($(obj).val(),validator.slice(1));
					break;
					case "phone":
						localvalid=validate_phone($(obj).val(),validator.slice(1));
					break;
					case "zip":
						localvalid=validate_zip($(obj).val(),validator.slice(1));
					break;
				}

				if(localvalid==false){
					$(obj).addClass('error');
					if($(obj).attr('title')!=''){
						$(obj).parent().find('.formError').remove();
						$(obj).parent().find('.formValid').remove();
						$(obj).after('<span class="formError">' + $(obj).attr('title') +'</span>');
						
					}
					return((localvalid==false) ? false : true);
				}
				else {
					$(obj).removeClass('error');
					$(obj).parent().find('.formError').remove();
					$(obj).parent().find('.formValid').remove();
					$(obj).after('<span class="formValid">&nbsp;</span>');
					return(true);
				}
			}
		}
}

function validate_required(val){
	var all_spaces_pattern = /^\s+$/;
	return((val!='') && (val.search(all_spaces_pattern) == -1) ? true : false);
}

function validate_contains(val,args){
	return((val.indexOf(args[0])>-1) ? true : false);
}

function validate_between(val,args){
	var start=args[0]-0;
	var end=args[1]-0;
	return((val>=start && val<=end) ? true : false);	
}

function validate_zip(val){
	var zip_pattern = /^(\d{5})(([\s-./]?)(\d{4}))?$/;
	return((val!='') && (val.search(zip_pattern) != -1) ? true : false);
}

function validate_phone(val){
	var phone_pattern = /^[2-9]\d{2}-\d{3}-\d{4}$/;
	return((val!='') && (val.search(phone_pattern) != -1) ? true : false);
}

function track(affiliate){
	send(affiliate);
}

function send(affiliate){
	
	var frame = document.createElement("iframe");
	frame.setAttribute("name","track_frame");
	frame.setAttribute('style','display:none');
	document.body.appendChild(frame);
	
	var form = document.createElement("form");
	form.setAttribute("method", "post");
	form.setAttribute("action","http://forms.elearnportal.com/analytics");
	form.setAttribute("target", "track_frame");
	
	var hiddenField = document.createElement("input");
	hiddenField.setAttribute("type", "hidden");
	hiddenField.setAttribute("name", "guid");
	hiddenField.setAttribute("value", readCookie('guid'));
	
	var hiddenField2 = document.createElement("input");
	hiddenField2.setAttribute("type", "hidden");
	hiddenField2.setAttribute("name", "path");
	hiddenField2.setAttribute("value", location.pathname);
	
	var hiddenField3 = document.createElement("input");
	hiddenField3.setAttribute("type", "hidden");
	hiddenField3.setAttribute("name", "referer");
	hiddenField3.setAttribute("value", document.referrer);
	
	var hiddenField4 = document.createElement("input");
	hiddenField4.setAttribute("type", "hidden");
	hiddenField4.setAttribute("name", "user_agent");
	hiddenField4.setAttribute("value", navigator.userAgent);
	
	var hiddenField5 = document.createElement("input");
	hiddenField5.setAttribute("type", "hidden");
	hiddenField5.setAttribute("name", "affiliate_id");
	hiddenField5.setAttribute("value", affiliate);
	
	var hiddenField6 = document.createElement("input");
	hiddenField6.setAttribute("type", "hidden");
	hiddenField6.setAttribute("name", "qry_string");
	hiddenField6.setAttribute("value", window.location.search.substring(1));
	
	form.appendChild(hiddenField);
	form.appendChild(hiddenField2);
	form.appendChild(hiddenField3);
	form.appendChild(hiddenField4);
	form.appendChild(hiddenField5);
	form.appendChild(hiddenField6);
	
	document.body.appendChild(form);
	form.submit();
	
}

function S4() {
   return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
}

function guid() {
   return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

function selectProgram(){
	if(typeof tlh_select_program == 'function') { 
		tlh_select_program();
	}	
}

$(document).ready(function(){
	if(typeof tlh_form_loaded == 'function') { 
		tlh_form_loaded();
	}
	if(readCookie('guid')==null){
		createCookie('guid',guid(),1);
		track(191);
	}
	$('.validate').blur(validate_field);
	$('.elp_guid').val(readCookie('guid'));
});

function validate_email(val){
	var email_address_pattern = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*\s+&lt;(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})&gt;$|^(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})$$/;
	return((val!='') && (val.search(email_address_pattern) != -1) ? true : false);
}

