// JavaScript Document

$(document).ready(function(){
	$('.validate').blur(validate_field); 
});

function validate(id){
	var valid=true;
 
    // This wasn't working with the current forms application passing in 'this.form'
    // Changed this to just validate all forms on the page
	$('form').find('.validate').each(function(index){
		var localvalid = validate_field($(this));
		valid = (localvalid == false) ? localvalid: valid;
		//alert($(this).attr("id") + localvalid); 
	});
	
	if(valid==true){
		return true;
	} else {
		return false;

	}
}

function validate_field(obj) {
	obj = (obj.currentTarget) ? obj.currentTarget : obj;
	if($(obj).hasClass('validate')) {
		var classes=$(obj).attr('class').split(' ');
		var localvalid=true;
		for(key in classes){
			if(classes[key].indexOf('v-')==0 && localvalid != false){
				var validator=classes[key].replace('v-','').split('-');
				switch(validator[0]){
					case "required":		
						localvalid=validate_required($(obj).val());
						$(obj).attr('title', 'Required');
					break;
					case "contains":
						localvalid=validate_contains($(obj).val(),validator.slice(1));
					break;
					case "between":
						localvalid=validate_between($(obj).val(),validator.slice(1));
					break;
					case "email":
						localvalid=validate_email($(obj).val(),validator.slice(1));
						$(obj).attr('title', 'Invalid email');
					break;
					case "phone":
						localvalid=validate_phone($(obj).val(),validator.slice(1));
						$(obj).attr('title', 'Invalid phone');
					break;
					case "zip":
						localvalid=validate_zip($(obj).val(),validator.slice(1));
						$(obj).attr('title', 'Invalid Zip');
					break;
					case "ssn":
						localvalid=validate_ssn($(obj).val(),validator.slice(1));
						$(obj).attr('title', 'Invalid SSN');
					break;
					case "phone7":
						localvalid=validate_phone7($(obj).val(),validator.slice(1));
					break;
					case "phoneArea":
						localvalid=validate_phoneArea($(obj).val(),validator.slice(1));
					break;
					case "usDate":
						localvalid=validate_date($(obj).val(),validator.slice(1));
					break;
				}
			}
		}
		if(localvalid==false){
			$(obj).addClass('error');
			if($(obj).attr('title')!=''){
				$(obj).parent().find('.label-important').remove();
				$(obj).parent().find('.label-success').remove();
				$(obj).after('<span class="label label-important">' + $(obj).attr('title') +'</span>');
				
			}
			return((localvalid==false) ? false : true);
		} else {
			$(obj).removeClass('error');
			$(obj).parent().find('.label-important').remove();
			$(obj).parent().find('.label-success').remove();
			$(obj).after('<span class="label label-success">OK!</span>');
			return(true);
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

function validate_date(val){ //01/01/2000
	return(checkDate(val) == true ? true : false);
}

function validate_zip(val){
	var zip_pattern = /^\d{5}(-\d{4})?$/;
	return((val!='') && (val.search(zip_pattern) != -1) ? true : false);
}

function validate_phone(val){
	var phone_pattern = /^[2-9]\d{2}-\d{3}-\d{4}$/;
	return((val!='') && (val.search(phone_pattern) != -1) ? true : false);
}

function validate_phone7(val){
	val = val.replace(/\D/g, "");
	return((val.length == 7) ? true : false);
}

function validate_phoneArea(val){
	val = val.replace(/\D/g, "");
	return((val!='') && (val.length == 3) ? true : false);
}

function validate_ssn(val){
	var ssn_pattern = /^[0-9]{3}[\- ]?[0-9]{2}[\- ]?[0-9]{4}$/;
	return((val!='') && (val.search(ssn_pattern) != -1) ? true : false);
}

// Original JavaScript code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function checkDate(val) {
	var minYear = 1902;
	var maxYear = (new Date()).getFullYear();
	var errorMsg = "";
	
	// regular expression to match required date format
	re = /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
	
	if(val != '') {
		if(regs = val.match(re)) {
			if(regs[1] < 1 || regs[1] > 12) {
				errorMsg = "Invalid value for month: " + regs[1];
			} else if(regs[2] < 1 || regs[2] > 31) {
				errorMsg = "Invalid value for day: " + regs[2];
			} else if(regs[3] < minYear || regs[3] > maxYear) {
				errorMsg = "Invalid value for year: " + regs[3] + " - must be between " + minYear + " and " + maxYear;
			}
		} else {
			errorMsg = "Invalid date format: " + val;
		}
	} else {
		errorMsg = "Date Required";
	}
	
	if(errorMsg != "") {
		return false;
	}
	
	return true;
}

function validate_email(val){
	var email_address_pattern = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*\s+&lt;(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})&gt;$|^(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})$$/;
	return((val!='') && (val.search(email_address_pattern) != -1) ? true : false);
}
