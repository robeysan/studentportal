$(document).ready(function() {

    // Load initial minors
    // This field only exists in app_trad view
    $.ajax({
        async: false,
        type: "POST",
        data: "resource=minors&data=" + $(this).val(),
        url: "app/get_resource",
        success: function(msg){
            $('#ddlMinor').html(msg);
            $('#ddlMinor').change();
        }
    });

    getdata();
    $('input').blur(senddata);
    $(':checkbox').click(senddata);
    $(':radio').click(senddata);
    $('select').change(senddata);
    $('textarea').blur(senddata);

    //
    $('#txtDOB').mask("99-99-9999");
    $('#txtSSN').mask("999-99-9999");
    // $('#zip_CA').mask("99999?-9999");
    // $('#zip').mask("99999?-9999");
    $('#phone').mask("999-999-9999");
    $('#txtParent1Phone').mask("999-999-9999");
    $('#txtParent2Phone').mask("999-999-9999");
    $('#phone').mask("999-999-9999");
    $('#fax').mask("999-999-9999");
    $('#empphone').mask("999-999-9999");
    $('#empfax').mask("999-999-9999");
    $('#txtFax').mask("999-999-9999");
    $('#txtWorkPhone').mask("999-999-9999");
    $('#txtWorkFax').mask("999-999-9999");

    $('.FinAid').bind('change', function(){
        if($('input[name="FinAid"]:checked').val()=='no'){
            $('div#reimburse').show('slow');
        }else if ($('input[name="FinAid"]:checked').val()=='yes'){
            $('div#reimburse').hide();
        }
    });

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

    // Used in trad app
    $('#ddlStatus').bind('change', function() {
        if($('#ddlStatus').val() == 'freshman') {
            $.ajax({
                async: false,
                type: "POST",
                data: "resource=majors&data=" + $(this).val(),
                url: "app/get_resource",
                success: function(msg){
                    $('#ddlProgram').html(msg);
                    $('#ddlProgram').change();
                }
            });
            $.ajax({
                async: false,
                type: "POST",
                data: "resource=minors&data=" + $(this).val(),
                url: "app/get_resource",
                success: function(msg){
                    $('#ddlMinor').html(msg);
                    $('#ddlMinor').change();
                }
            });
            if($('.minor-group').is(':hidden')) {
                $('.minor-group').show('slow');
            }
        } else if($('#ddlStatus').val() == 'transfer' ) {
            $.ajax({
                async: false,
                type: "POST",
                data: "resource=majors&data=" + $(this).val(),
                url: "app/get_resource",
                success: function(msg){
                    $('#ddlProgram').html(msg);
                    $('#ddlProgram').change();
                }
            });
            $.ajax({
                async: false,
                type: "POST",
                data: "resource=minors&data=" + $(this).val(),
                url: "app/get_resource",
                success: function(msg){
                    $('#ddlMinor').html(msg);
                    $('#ddlMinor').change();
                }
            });
            if($('.minor-group').is(':hidden')) {
                $('.minor-group').show('slow');
            }
        } else if($('#ddlStatus').val() == 'postbacc') {
            $.ajax({
                async: false,
                type: "POST",
                data: "resource=postbacc&data=" + $(this).val(),
                url: "app/get_resource",
                success: function(msg){
                    $('#ddlProgram').html(msg);
                    $('#ddlProgram').change();
                }
            });
            $('.minor-group').hide('slow');
        } else if($('#ddlStatus').val() == 'pseo') {
            $.ajax({
                async: false,
                type: "POST",
                data: "resource=pseos&data=" + $(this).val(),
                url: "app/get_resource",
                success: function(msg){
                    $('#ddlProgram').html(msg);
                    $('#ddlProgram').change();
                }
            });
            $('.minor-group').hide('slow');
        } else {
            /* Nothing */
        }

    });

    $('#ddlProgram,#ddlMinor').bind('change', function() {
        if(studying_religiousy_stuff()) {
            if($('#church-work-group').is(':hidden')) {
                $('#church-work-group').show('slow');
                $('#ddlAtts').val('');
            }
        }
        else {
            if($('#church-work-group').is(':visible')) {
                $('#church-work-group').hide('slow');
            }
        }
    });

    $('#ddlCountry').bind('change', function() {
        if($(this).val() == 'US') {
            $('#state-zip-group').show('slow');

            $('#ddlpermstate').addClass('validate v-required');
            $('#ddlpermstate').attr('title', 'required');

            $('#txtPermZip').addClass('validate v-required v-zip');
            $('#txtPermZip').attr('title', 'required');

            maskphone(true);
        } else {
            $('#state-zip-group').hide('slow');

            $('#ddlpermstate').removeClass('validate v-required');
            $('#ddlpermstate').removeAttr('title');

            $('#txtPermZip').removeClass('validate v-zip');
            $('#txtPermZip').removeAttr('title');

            if($(this).val() != '') {
                maskphone(false);
            } else {
                maskphone(true);
            }

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

    //$('#appform').submit(function() {
    //    app_complete();
    //});

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

    $('#txtPriorCollege1').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });

    $("#txtPriorCollege1").blur(function() {
        $.get("app/get_city", { name: $(this).val() }, function(data) {
            $("#txtCollegeCity1").val(data);
        });
    });

    // School 2 autocomplete
    $('#txtPriorCollege2').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });

    $("#college_name2").blur(function() {
        $.get("app/get_city", { name: $(this).val() }, function(data) {
            $("#txtCollegeCity2").val(data);
        });
    });

    // School 3 autocomplete
    $('#txtPriorCollege3').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });

    $("#college_name3").blur(function() {
        $.get("app/get_city", { name: $(this).val() }, function(data) {
            $("#txtCollegeCity3").val(data);
        });
    });

    // School 4 autocomplete
    $('#txtPriorCollege4').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });

    $("#college_name4").blur(function() {
        $.get("app/get_city", { name: $(this).val() }, function(data) {
            $("#txtCollegeCity4").val(data);
        });
    });

    // School 5 autocomplete
    $('#txtPriorCollege5').typeahead({
        source: function (typeahead, query) {
            return $.getJSON('app/get_school_names', { query: query }, function (data) {
                return typeahead.process(data);
            });
        }
    });

    $("#college_name5").blur(function() {
        $.get("app/get_city", { name: $(this).val() }, function(data) {
            $("#txtCollegeCity5").val(data);
        });
    });

    $('#ddlAffiliation').bind('change', function() {
        if($(this).val() == 'LM') {
            $('#congregation_info').show('slow');
        }
        else {
            $('#congregation_info').hide('slow');
        }
    });

    if($('#user_type').val() == 'NG') {
        $('#undergrad_colleges').hide();
    }
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

function maskphone(mask){
    if(mask){
        $('#txtPhoneCell').mask("999-999-9999");
        $('#txtPhone').mask("999-999-9999");
        $('#txtPhone').addClass('v-phone');
    } else {
        $('#txtPhoneCell').unmask();
        $('#txtPhone').unmask();
        $('#txtPhone').removeClass('v-phone');
    }
}
function getdata() {
	
    $.get('app/appread/' + (new Date()).getTime(),'', function(data) {
		
		resetLocations(data['ddlProgram']);
		
        for(key in data){
            if($("input[name='"+key+"']").length>1){
                $("input[name='"+key+"']").each(function(){
                    $(this).prop('checked', false);
                    if($(this).attr('value')==data[key]){
                        $(this).prop('checked', true);
                    }
                    //$(this).attr('checked',($(this).attr('value')==data[key]) ? 'true ': false);
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
					$('option[value="'+data[key]+'"]',$('#'+key)).attr('selected',true);
                    $('#'+key).change();
                }
                else {
                    $('#'+key).val(data[key]);
                }
            }	
        }

        if($('#ddlCountry').val() == 'US') {
            $('#state-zip-group').show();

            $('#ddlpermstate').addClass('validate v-required');
            $('#ddlpermstate').attr('title', 'required');

            $('#txtPermZip').addClass('validate v-required v-zip');
            $('#txtPermZip').attr('title', 'required');

        }else{

            $('#ddlpermstate').removeClass('validate v-required');
            $('#ddlpermstate').attr('title', '');

            $('#txtPermZip').removeClass('validate v-required v-zip');
            $('#txtPermZip').attr('title', '');
            $('#state-zip-group').hide();
        }

        if($('#ddlCountry').val() == 'US' || $('#ddlCountry').val() == ''){
            maskphone(true);
        } else {
            maskphone(false);
        }


        if($('#ddlAffiliation').val() != 'LM') {
            $('#congregation_info').hide();
        } 

        if(!studying_religiousy_stuff()) {
            $('#church-work-group').hide();
        }

        $('.datepicker').datepicker({
            format:	'mm-dd-yyyy'	
        });
    },'json');

}

function studying_religiousy_stuff() {
    result = false;

    // Religious programs
    if($("#ddlProgram").val() == "CSPTRAD_39" || $("#ddlProgram").val() == "CSPTRAD_55" || $("#ddlProgram").val() == "CSPTRAD_56" ||
            $("#ddlProgram").val() == "CSPTRAD_10" || $("#ddlProgram").val() == "CSPTRAD_11" || $("#ddlProgram").val() == "CSPTRAD_12") {
                result = true;
            }

    return result;
}

function validate_trad() {
    var validated = [];
    var validate_alert = '';
    for (var i=0;i<4;i++){
        if (i == 0) {
            validated[i] = validate_tab('personal');
        } else if (i == 1) {
            validated[i] = validate_tab('education');
        } else if (i == 2) {
            validated[i] = validate_tab('additional');
        } else if (i == 3) {
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

    return validate_alert;

}

function app_complete(thank_you_page_only, is_trad_app) {
    $('#completeButton').attr('disabled', 'disabled');
    window.app_completed = true;
    var validated = [];
    var validate_alert = '';

    if(is_trad_app) {
        validate_alert = validate_trad();
    } else {
        for (var i=0;i<6;i++){
            if (i == 0) {
                validated[i] = validate_tab('personal');
            } else if (i == 1) {
                validated[i] = validate_tab('parent');
            } else if (i == 2) {
                validated[i] = validate_tab('employer');
            } else if (i == 3) {
                validated[i] = validate_tab('education');
            } else if (i == 4) {
                validated[i] = validate_tab('religious');
            } else if (i == 5) {
                validated[i] = validate_tab('additional');
            } else if (i == 6) {
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
    }

    if(!$("#chkAgree").attr("checked")) {
        validate_alert += "I agree to the above terms checkbox<br/>";
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
            if(thank_you_page_only) {
                redirect_url = '/app/show_complete';
            } else {
                redirect_url = '/';
            }

            location.href = redirect_url;
        },
        error: function(data) {
            window.app_completed = false;
            show_error_modal();
        },
        async: false
    });
}

function show_validation_modal(error_fields) {
    $("#validateModalBody").html(error_fields);
    $("#validateModal").modal('show');
}

function show_error_modal() {
    $("#errorModalBody").html();
    $("#errorModal").modal('show');
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
    var radio_array = new Array();
    var j=0;
    var found_checked_radio = false;

    $('#'+tab_id+' :input').each( function() {
        if ($(this).hasClass('validate')) {
            var classes=$(this).attr('class').split(' ');
            /* For everything with validate class... */
            for(key in classes){
                /* Grab the thing after v-, like v-phone, etc. */
                if (classes[key].indexOf('v-')==0){
                    /* We have to treat radio buttons special */
                    if($(this).attr('type') == 'radio') {
                        /* Lazy initialize array */
                        if(typeof radio_array[$(this).attr('id')] === 'undefined') {
                            radio_array[$(this).attr('id')] = new Array();
                        }
                        /* We want to push each set of radio buttons */
                        radio_array[$(this).attr('id')].push($(this));
                    } else if (!validate_field($(this))) {
                        error_msg[j++] = $("label[for='"+$(this).attr('id')+"']").text();
                    }
                }
            }
        }
    });

    if(radio_array) {
        /* For every set of required radio buttons */
        for(key in radio_array) {
            /* For every radio button in the set */
            for(var i=0; i < radio_array[key].length; i++) {
                /* Mark that we found one checked */
                if(radio_array[key][i].is(':checked')) {
                    found_checked_radio = true;
                }
            }
            /* If we didn't find any radio checked in the set */
            if(! found_checked_radio) {
                /* Write out error and show error label */
                error_msg[j++] = $("label[for='"+key+"']").text();
                obj_to_append_after = radio_array[key][0].parent();
                obj_to_append_after.parent().find('.label-important').remove();
                obj_to_append_after.parent().find('.label-success').remove();
                obj_to_append_after.after('<span class="label label-important">' 
                        + radio_array[key][0].attr('title') +'</span>');
            }

            /* Reinit boolean flag */
            found_checked_radio = false;

        }
    }

    return error_msg;
}

function toPersonal() {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#personalTab').addClass('active');
    $('#personal').show();
    $('#parent').hide();
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
    $('#parent').hide();	
    $('#education').hide();
    $('#religious').hide();
    $('#additional').hide();
    $('#other').hide();	
}

function toParent(check_valid) {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#parentTab').addClass('active');
    $('#parent').show();
    $('#personal').hide();
    $('#education').hide();
    $('#employer').hide();
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
    $('#parent').hide();	
    $('#employer').hide();
    $('#religious').hide();
    $('#additional').hide();
    $('#other').hide();


}

function toAdditional(check_valid) {
    window.scrollTo(0,0);
    $('.active').removeClass('active');
    $('#additionalTab').addClass('active');
    $('#additional').show();
    $('#personal').hide();
    $('#parent').hide();	
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
    $('#parent').hide();	
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
    $('#parent').hide();	
    $('#employer').hide();
    $('#education').hide();
    $('#additional').hide();
}

$(window).unload(function() {
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
});


