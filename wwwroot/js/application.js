$(document).ready(function() {
	getdata();
	$('input').blur(senddata);
	$(':checkbox').click(senddata);
	$(':radio').click(senddata);
	$('select').change(senddata);
	$('textarea').blur(senddata);

	//
	$('#birth_date').mask("99/99/9999");
	$('#txtSSN').mask("999-99-9999");
	// $('#zip_CA').mask("99999?-9999");
	// $('#zip').mask("99999?-9999");
	$('#phone').mask("999-999-9999");
	$('#ndcellphone').mask("999-999-9999");

	//$('.v-zip').blur(validate_field);							
    $('.tabs a:last').tab('show');

    $('#major').bind('change', function() { 
    	if($('#major').val() == 'Nursing RN to BSN') { 
    		$('#license-group').show(); 
    		$('#license-st-group').show(); 
    		$('#license').addClass('validate v-required'); 
    		$('#license-st').addClass('validate v-required'); 
    	} else { 
    		$('#license-group').hide(); 
    		$('#license-st-group').hide(); 
    		$('#license').removeClass('v-required'); 
    		$('#license-st').removeClass('v-required'); 
    	} 
	});   

	$('#st_ca').bind('change', function() {
		if($(this).val() == 'OH') {
			$('#res_cty_CA-group').show('slow');
		}
		else {
			$('#res_cty_CA-group').hide('slow');
		}
	});

	$('#st').bind('change', function() {
		if($(this).val() == 'OH') {
			$('#res_cty-group').show('slow');
		}
		else {
			$('#res_cty-group').hide('slow');
		}
	});

	$('#major').bind('change', function() {
		if($('#major').val() == 'Nursing RN to BSN') {
			$('#license-group').show();
			$('#license-st-group').show();
			$('#license').addClass('validate v-required');
			$('#license-st').addClass('validate v-required');
		} else {
			$('#license-group').hide();
			$('#license-st-group').hide();
			$('#license').removeClass('v-required');
			$('#license-st').removeClass('v-required');
		}
	});	

	$("#Student_type").change(function(){
		$.ajax({
			async: false,
			type: "POST",
			data: "data=" + $(this).val(),
			url: "app/selectStudentType",
			success: function(msg){
				$('#prog').html(msg);
				$('#prog').change();
			}
		});
	});
	$("#prog").change(function(){
		$.ajax({
			async: false,
			type: "POST",
			data: "data=" + $(this).val(),
			url: "app/selectProgramDesc",
			success: function(msg){
				$('#major').html(msg);
				$('#major').change();
			}
		});
	});
	$("#major").change(function(){
		$.ajax({
			async: false,
			type: "POST",
			data: "data=" + $(this).val(),
			url: "app/selectMajor",
			success: function(msg){
				$('#subject1').html(msg);
				$('#subject1').change();
			}
		});
	});
	$("#subject1").change(function(){
		$.ajax({
			async: false,
			type: "POST",
			data: "data=" + $(this).val(),
			url: "app/selectPrimary",
			success: function(msg){
				$('#subject2').html(msg);
			}
		});
	});

	$('#appform').submit(function() {
		app_complete();
	});

	var cache = {}, lastXhr;

	// School 1 jQuery-UI example for posterity
	// 
	// $("#college_name1").autocomplete({
	// 	minLength: 2,
	// 	source: function( request, response ) {
	// 		var term = request.term;
	// 		if ( term in cache ) {
	// 			response( cache[ term ] );
	// 			return;
	// 		}

	// 		lastXhr = $.getJSON( "app/get_school_names", request, function( data, status, xhr ) {
	// 			cache[ term ] = data;
	// 			if ( xhr === lastXhr ) {
	// 				response( data );
	// 			}
	// 		});
	// 	}
	// });
	
	$('#college_name1').typeahead({
	    source: function (typeahead, query) {
	        return $.getJSON('app/get_school_names', { query: query }, function (data) {
	            return typeahead.process(data);
	        });
	    }
	});

	$("#college_name1").blur(function() {
		$.get("app/get_ceeb", { name: $(this).val() }, function(data) {
			$("#college_Ceeb1").val(data);
		});
	});

	// School 2 autocomplete
	$('#college_name2').typeahead({
	    source: function (typeahead, query) {
	        return $.getJSON('app/get_school_names', { query: query }, function (data) {
	            return typeahead.process(data);
	        });
	    }
	});
	
	$("#college_name2").blur(function() {
		$.get("app/get_ceeb", { name: $(this).val() }, function(data) {
			$("#college_ceeb2").val(data);
		});
	});

	// School 3 autocomplete
	$('#college_name3').typeahead({
	    source: function (typeahead, query) {
	        return $.getJSON('app/get_school_names', { query: query }, function (data) {
	            return typeahead.process(data);
	        });
	    }
	});
	
	$("#college_name3").blur(function() {
		$.get("app/get_ceeb", { name: $(this).val() }, function(data) {
			$("#college_ceeb3").val(data);
		});
	});

	// School 4 autocomplete
	$('#college_name4').typeahead({
	    source: function (typeahead, query) {
	        return $.getJSON('app/get_school_names', { query: query }, function (data) {
	            return typeahead.process(data);
	        });
	    }
	});
	
	$("#college_name4").blur(function() {
		$.get("app/get_ceeb", { name: $(this).val() }, function(data) {
			$("#college_ceeb4").val(data);
		});
	});

	// School 5 autocomplete
	$('#college_name5').typeahead({
	    source: function (typeahead, query) {
	        return $.getJSON('app/get_school_names', { query: query }, function (data) {
	            return typeahead.process(data);
	        });
	    }
	});
	
	$("#college_name5").blur(function() {
		$.get("app/get_ceeb", { name: $(this).val() }, function(data) {
			$("#college_ceeb5").val(data);
		});
	});
});

function senddata() {
	validate_field;
	$.post('app/appwrite',$('#appform').serialize(), function(data) {
		for(key in data){
			$('#'+key).val(data[key]);
		}
	},'json');
	
}

function getdata() {
	 $.get('app/appread','', function(data) {
	 	console.log(data);
		for(key in data){
			if($("input[name='"+key+"']").length>1){
				$("input[name='"+key+"']").each(function(){
					$(this).attr('checked',($(this).attr('value')==data[key]) ? true : false);		
				});
			}
			else {
				if($('#'+key).is(':checkbox')){
					$('#'+key).attr('checked',true);
				}
				else if($('#'+key).is('select')){
					$('#'+key).val(data[key]);
					$('#'+key).change();
				}
				else {
					$('#'+key).val(data[key]);
				}
			}	
		}

		if($('#major').val() != 'Nursing RN to BSN') { 
	    	$('#license-group').hide(); 
	    	$('#license-st-group').hide(); 
	    } else { 
	    	$('#license').addClass('validate v-required'); 
	    	$('#license-st').addClass('validate v-required'); 
	    }

		if($('#st_ca').val() != 'OH') {
			$('#res_cty_CA-group').hide();
		} else {
			$('#res_cty_CA').addClass('validate v-required');
		}

		if($('#st').val() != 'OH') {
			$('#res_cty-group').hide();
		} else {
			$('#res_cty').addClass('validate v-required');
		}

		$('.datepicker').datepicker();
	},'json');
}

function app_complete() {
	var validated = [];
	var validate_alert = '';
	for (var i=0;i<5;i++){
		if (i == 0) {
			validated[i] = validate_tab('personal');
		} else if (i == 1) {
			validated[i] = validate_tab('program');
		} else if (i == 2) {
			validated[i] = validate_tab('education');
		} else if (i == 3) {
			validated[i] = validate_tab('additional');
		} else if (i == 4) {
			validated[i] = validate_tab('otherInfo');
		}
		if (validated[i].length && !validate_alert.length) {
			var validate_alert = 'The Following Fields are incomplete: ';
		}
		if (validated[i].length) {			
			for (key in validated[i]) {
				validate_alert += validated[i][key] + ', ';
			}
		}
	}
	if (validate_alert.length) {
		alert(validate_alert.substring(0,validate_alert.length - 2));
		return false;
	}

	$.post('app/appcomplete',$('#appform').serialize(),function(data){
		for(key in data) {
			$('#'+key).val(data[key]);
		}
		
		location.href = '/';///<?php echo($seg_0); ?>/admissions';	
	});
}

function permSame() {
	$('#Addr_Line1').val($('#addr_line1_CA').val());
	$('#Addr_Line2').val($('#addr_line2_CA').val());
	$('#City').val($('#city_CA').val());
	$('#st').val($('#st_ca').val());
	$('#zip').val($('#zip_CA').val());
	$('#res_cty').val($('#res_cty_CA').val());
	$('#ctry').val($('#ctry_CA').val());

}

function validate_tab(tab_id) {
	var error_msg = new Array();
	var i=0;
	$('#'+tab_id+' :input').each( function() {
		if ($(this).hasClass('validate')) {
			var classes=$(this).attr('class').split(' ');
			for(key in classes){
				if (classes[key].indexOf('v-')==0){
					if (!validate_field($(this))) {
						error_msg[i++] = $(this).attr('id');
					}
				}
			}
		}
	});
	return error_msg;
	
}

function toPersonal() {
	window.scrollTo(0,0);
	$('.active').removeClass('active');
	$('#personalTab').addClass('active');
	$('#personal').show();
	$('#program').hide();
	$('#education').hide();
	$('#additional').hide();
	$('#otherComments').hide();
	$('#otherInfo').hide();
}

function toProgram(check_valid) {
	window.scrollTo(0,0);
	$('.active').removeClass('active');
	$('#programTab').addClass('active');	
	$('#program').show();	
	$('#personal').hide();	
	$('#education').hide();
	$('#additional').hide();
	$('#otherInfo').hide();
	$('#otherComments').hide();	
}

function toEducation(check_valid) {
	window.scrollTo(0,0);
	$('.active').removeClass('active');
	$('#educationTab').addClass('active');
	$('#education').show();
	$('#personal').hide();
	$('#program').hide();
	$('#additional').hide();	
	$('#otherInfo').hide();
	$('#otherComments').hide();


}
function toAdditional(check_valid) {
	$('.active').removeClass('active');
	$('#additionalTab').addClass('active');
	$('#additional').show();
	$('#education').hide();
	$('#personal').hide();
	$('#program').hide();	
	$('#otherInfo').hide();
	$('#otherComments').hide();
}

function toOtherInfo(check_valid) {
	window.scrollTo(0,0);
	$('.active').removeClass('active');
	$('#otherInfoTab').addClass('active');
	$('#otherInfo').show();
	$('#additional').hide();
	$('#education').hide();
	$('#personal').hide();
	$('#program').hide();	
	$('#otherComments').hide();
}

function toOtherComments(check_valid) {
	window.scrollTo(0,0);
	$('.active').removeClass('active');
	$('#otherCommentsTab').addClass('active');
	$('#otherInfo').hide();
	$('#additional').hide();
	$('#education').hide();
	$('#personal').hide();
	$('#program').hide();	
	$('#otherComments').show();	
}

window.onbeforeunload = function() {
	$.ajax({
            url: "app/progress_email",
            async: false                 
    });
}
