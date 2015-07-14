$(document).ready(function() {
    window.send_abandon_email = 'TRUE';

    $('#ceebFinderSubmit').click(function(){
        $('#ceebResultsDiv').html('');
        var state = $('#ceebState').val();
        $.ajax({
            url:'/app/get_schools_state',
            type: 'GET',
            data: 'state='+state,
            success:function(data){
                $('#ceebResultsDiv').show();
                $('#ceebResultsDiv').append(data);
            }
        });
    });
    //auto save
	getdata();
	$('input').blur(senddata);
	$(':checkbox').click(senddata);
	$(':radio').click(senddata);
	$('select').change(senddata);
	$('textarea').blur(senddata);

	//masking
	$('#dob').mask("99-99-9999");
	$('#social_tax_id').mask("999-99-9999");
    $('#emergency_contact_main_phone').mask("999-999-9999");
	$('#emergency_contact_main_cell').mask("999-999-9999");			

    //tab control
    $('.tabs a:last').tab('show');

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

	var cache = {}, lastXhr;

    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy'
    });
	
	$('#country').addClass('validate v-required');
	$('label[for="country"]').addClass('bold');
	
    //Check country
    if ($('#country option:selected').val()=='US') {
		$('#state').closest('.control-group').show();
        $('#state').addClass('validate v-required');
        $('label[for="state"]').addClass('bold');
        $('#city').addClass('validate v-required');
        $('label[for="city"]').addClass('bold');
        $('#address1').addClass('validate v-required');
        $('label[for="address1"]').addClass('bold');
		maskphone(true);
    }else{
		$('#state').closest('.control-group').hide();
		$('#state, label[for="state"]').removeClass('validate v-required bold');
		$('#city, label[for="city"]').removeClass('validate v-required bold');
		$('#address1, label[for="address1"]').removeClass('validate v-required bold');
		$('.label-important').hide();
		if($(this).val() != '') {
			maskphone(false);
		} else {
			maskphone(true);
		}
	}
    $('#country').change(function(){
        if ($('#country option:selected, label#country').val()!='US') {
            $('#state').closest('.control-group').hide();
			$('#state, label[for="state"]').removeClass('validate v-required bold');
			$('#city, label[for="city"]').removeClass('validate v-required bold');
			$('#address1, label[for="address1"]').removeClass('validate v-required bold');
			$('.label-important').hide();
			if($(this).val() != '') {
				maskphone(false);
			} else {
				maskphone(true);
			}
        }else{
            $('#state').closest('.control-group').show();
			$('#state').addClass('validate v-required');
			$('label[for="state"]').addClass('bold');
			$('#city').addClass('validate v-required');
			$('label[for="city"]').addClass('bold');
			$('#address1').addClass('validate v-required');
			$('label[for="address1"]').addClass('bold');
            maskphone(true);
        }
    });


    //Racial Identity control

    if ( $('#hispanic_latino').val()=='HIS') {
        $('#racial_identity').val='HIS';
        $('#racial_identity_control').hide();
    }else if ($('#hispanic_latino').val()=='') {
        $('#racial_identity_control').hide();
    }else{
        $('#racial_identity_control').show();
    }
    
    $('#hispanic_latino').change(function(){
        if ( $('#hispanic_latino').val()=='HIS') {
            $('#racial_identity').val='HIS';
            $('#racial_identity_control').hide();
        }else if ($('#hispanic_latino').val()=='') {
            $('#racial_identity_control').hide();
        }else{
            $('#racial_identity_control').show();
        }
    });


    //prior college
    if ($('#college_credit').val()=='Y') {
        $('#list_prior_colleges').show();
    }else{
        $('#list_prior_colleges').hide();
    }

    $('#college_credit').change(function(){
        if ($('#college_credit').val()=='Y') {
            $('#list_prior_colleges').show();
        }else{
            $('#list_prior_colleges').hide();
        }
    });
});

function senddata() {
    validate_field($(this));
    if($(this).attr('id') == 'completeButton') return true;
    if(! window.app_completed) { 
        $.post('app/appwrite',$('#appform').serialize(), function(data) {
            for(key in data){
                $('#'+key).val(data[key]);
            }
        },'json');
    }
}

function getdata() {
    $.get('app/appread/' + (new Date()).getTime(),'', function(data) {

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
                else if($('#'+key).is(':radio')){
                    // $('#'+key+"[value="+"yes"+"]").click();
                    $(this).attr('checked', ($(this).attr('value')==data[key]) ? true : false);
                }
                else if($('#'+key).is('select')){
                    $('#'+key).val(data[key]);
                    //$('#'+key).change();
                }
                else {
                    $('#'+key).val(data[key]);
                }
            }	
        }

        //prior college
        if ($('#college_credit').val()=='Y') {
            $('#list_prior_colleges').show();
        }else{
            $('#list_prior_colleges').hide();
        };
        
        if ($('#txtPriorCollege1').val()!='') {
            $('#txtPriorCollege1ceeb').addClass('validate v-required');
        }else{
            $('#txtPriorCollege1ceeb').removeClass('validate v-required');
        };

        if ($('#txtPriorCollege2').val()!='') {
            $('#txtPriorCollege2ceeb').addClass('validate v-required');
        }else{
            $('#txtPriorCollege2ceeb').removeClass('validate v-required');
        };

        if ($('#txtPriorCollege3').val()!='') {
            $('#txtPriorCollege3ceeb').addClass('validate v-required');
        }else{
            $('#txtPriorCollege3ceeb').removeClass('validate v-required');
        };

        if ($('#txtPriorCollege4').val()!='') {
            $('#txtPriorCollege4ceeb').addClass('validate v-required');
        }else{
            $('#txtPriorCollege4ceeb').removeClass('validate v-required');
        };

        if ($('#txtPriorCollege5').val()!='') {
            $('#txtPriorCollege5ceeb').addClass('validate v-required');
        }else{
            $('#txtPriorCollege5ceeb').removeClass('validate v-required');
        };

        //Racial Identity control
        if ($('#hispanic_latino').val()=='HIS') {
            $('#racial_identity').val='HIS';
            $('#racial_identity_control').hide();
        }else if ($('#hispanic_latino').val()=='') {
            $('#racial_identity_control').hide();
        }else{
            $('#racial_identity_control').show();
        }


        //Check country
		if ($('#country option:selected').val()=='US') {
			$('#state').closest('.control-group').show();
			$('#state').addClass('validate v-required');
			$('label[for="state"]').addClass('bold');
			$('#city').addClass('validate v-required');
			$('label[for="city"]').addClass('bold');
			$('#address1').addClass('validate v-required');
			$('label[for="address1"]').addClass('bold');
			maskphone(true);
		}else{
			$('#state').closest('.control-group').hide();
			$('#state, label[for="state"]').removeClass('validate v-required bold');
			$('#city, label[for="city"]').removeClass('validate v-required bold');
			$('#address1, label[for="address1"]').removeClass('validate v-required bold');
			$('.label-important').hide();
			if($('#country option:selected').val() != '') {
				maskphone(false);
			} else {
				maskphone(true);
			}
		}
		

        if($('#country').val() == 'US' || $('#country').val() == ''){
            maskphone(true);
        } else {
            maskphone(false);
        }


    },'json');

    var $ids = [];
    $('form#appform input, form#appform select, form#appform textarea').each(function(){
        var $input = $(this).attr('id');
        if (typeof $input !== 'undefined') {
            $ids.push($input);
        }else{
            $ids.push($(this).attr('name'));
        }
    });
    //console.log($ids);

}


function app_complete() {
    $('#completeButton').attr('disabled', 'disabled');
    window.app_completed = true;
    var validated = [];
    var validate_alert = '';
    for (var i=0;i<5;i++){
        if (i == 0) {
            validated[i] = validate_tab('personal');
        } else if (i == 1) {
            validated[i] = validate_tab('employer');
        } else if (i == 2) {
            validated[i] = validate_tab('education');
        } else if (i == 3) {
            validated[i] = validate_tab('religious');
        } else if (i == 4) {
            validated[i] = validate_tab('additional');
        } else if (i == 5) {
            validated[i] = validate_tab('other');
        }
        if (validated[i].length && !validate_alert.length) {
            var validate_alert = '';
        }
        if (validated[i].length) {			
            for (key in validated[i]) {
                validate_alert += validated[i][key] + '<br/>';
            }
        }

    }

    if(!$("#chkAgree").attr("checked")) {
        validate_alert += "You must click 'I agree to the above terms', ";
    }

    if (validate_alert.length) {
        $('#completeButton').removeAttr('disabled');
        show_validation_modal(validate_alert.substring(0,validate_alert.length - 2));
        return false;
    }

    window.app_completed = true;
    $.ajax({
        type: 'POST',
        url: 'app/appcomplete',
        data: $('#appform').serialize(),
        success: function(data) {
			location.href = '/'; 
        },
        error: function(data) {
            window.app_completed = false;
            show_error_modal();
        },
        async: false
    });
}

function show_validation_modal(error_fields) {
    console.log('test');
    $("#validateModalBody").html(error_fields);
    $("#validateModal").modal('show');
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

function maskphone(mask){
    if(mask){
        $('#cell_phone').mask("999-999-9999");
        $('#home_phone').mask("999-999-9999");
        $('#home_phone').addClass('v-phone');
        $('.phone-desc').show();
    } else {
        $('#cell_phone').unmask();
        $('#home_phone').unmask();
        $('#home_phone').removeClass('v-phone');
        $('.phone-desc').hide();
    }
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
                        error_msg[i++] = $("label[for='"+$(this).attr('id')+"']").text();
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
    $('#employer').hide();
    $('#education').hide();
    $('#religious').hide();
    $('#additional').hide();
    $('#other').hide();
}

function toEmployer(check_valid) {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#employerTab').addClass('active');	
    $('#employer').show();	
    $('#personal').hide();	
    $('#education').hide();
    $('#religious').hide();
    $('#additional').hide();
    $('#other').hide();	
}

function toEducation(check_valid) {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#educationTab').addClass('active');
    $('#education').show();
    $('#personal').hide();
    $('#employer').hide();
    $('#religious').hide();
    $('#additional').hide();
    $('#other').hide();


}
function toAdditional(check_valid) {
    $('.active').removeClass('active');
    $('#additionalTab').addClass('active');
    $('#additional').show();
    $('#personal').hide();
    $('#employer').hide();
    $('#education').hide();
    $('#religious').hide();
    $('#other').hide();
}

function toOther(check_valid) {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#otherTab').addClass('active');
    $('#other').show();
    $('#additional').hide();
    $('#education').hide();
    $('#personal').hide();
    $('#program').hide();	
    $('#religious').hide();
    $('#employer').hide();

}

function toReligious(check_valid) {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#religiousTab').addClass('active');
    $('#religious').show();
    $('#other').hide();
    $('#additional').hide();
    $('#personal').hide();
    $('#employer').hide();
    $('#education').hide();
    $('#additional').hide();
}

$(window).unload(function() {
    if (window.send_abandon_email == 'TRUE') {
        if(! window.app_completed) {
            $.ajax({
                url: "app/progress_email",
                async: false,
                success: function(msg) {
                    // Reset global just in case
                    window.app_completed = false;
                }
            });
        }
    }
});
