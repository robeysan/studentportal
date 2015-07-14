$(document).ready(function() {
    window.send_abandon_email = 'TRUE';
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

	var cache = {}, lastXhr;

    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy'
    });

    //Check country
    $('#country').change(function(){
        if ($('#country').val()!='US') {
            $('#label_country').removeClass('b');
            $('#label_state').removeClass('b');
            $('#label_city').removeClass('b');
            $('#label_address1').removeClass('b');
            $('#label_zip').removeClass('b');

            $('#country').removeClass('validate v-required');
            $('#state').removeClass('validate v-required');
            $('#city').removeClass('validate v-required');
            $('#address1').removeClass('validate v-required');
            $('#zip_code').removeClass('validate v-required');
            if($(this).val() != '') {
                maskphone(false);
            } else {
                maskphone(true);
            }

        }else{
            $('#label_country').addClass('b');
            $('#label_state').addClass('b');
            $('#label_city').addClass('b');
            $('#label_address1').addClass('b');
            $('#label_zip').addClass('b');

            $('#country').addClass('validate v-required');
            $('#state').addClass('validate v-required');
            $('#city').addClass('validate v-required');
            $('#address1').addClass('validate v-required');
            $('#zip_code').addClass('validate v-required');
            maskphone(true);
        };
    });

    $('#txtPriorCollege1').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names_append_state', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });
    $('#txtPriorCollege2').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names_append_state', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });
    $('#txtPriorCollege3').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names_append_state', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });
    $('#txtPriorCollege4').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names_append_state', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });
    $('#txtPriorCollege5').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names_append_state', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });

    //Veteran control
    $('#veteran').change(function(){
        if ($('#veteran').val()=='Y') {
            $('#military_opt').show();
        }else{
            $('#military_opt').hide();
        };
    });

    $('#hispanic_latino').change(function(){
        if ($('#hispanic_latino').val()=='Y') {
            $('.racial_identity_control').hide();
        }else if ($('#hispanic_latino').val()=='N') {
            $('.racial_identity_control').show();
        }else{
            $('.racial_identity_control').hide();
        };
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

        //Racial Identity control
        if ($('#hispanic_latino').val()=='Y') {
            $('.racial_identity_control').hide();
        }else if ($('#hispanic_latino').val()=='N') {
            $('.racial_identity_control').show();
        }else{
            $('.racial_identity_control').hide();
        };


        //Check country
        if ($('#country').val()=='US') {
            $('#label_country').addClass('b');
            $('#label_state').addClass('b');
            $('#label_city').addClass('b');
            $('#label_address1').addClass('b');
            $('#label_zip').addClass('b');

            $('#country').addClass('validate v-required');
            $('#state').addClass('validate v-required');
            $('#city').addClass('validate v-required');
            $('#address1').addClass('validate v-required');
            $('#zip_code').addClass('validate v-required');
        };

        if($('#country').val() == 'US' || $('#country').val() == ''){
            maskphone(true);
        } else {
            maskphone(false);
        }

        //Veteran control
        if ($('#veteran').val()=='Y') {
            $('#military_opt').show();
        }else{
            $('#military_opt').hide();
        };        
    },'json');

    var $ids = [];
    $('form#appform input, form#appform select, form#appform textarea').each(function(){
        var $input = $(this).attr('id');
        if (typeof $input !== 'undefined') {
            $ids.push($input);
        }else{
            $ids.push($(this).attr('name'));
        };
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
