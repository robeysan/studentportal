<?php /* Header */ ?>
CarsID|RoyallID|HobsonsID|LastName|FirstName|MiddleName|suffix|previous_name|sex|birth_date|SF_NO|Addr_Line1|Addr_Line2|City|st|zip|res_cty|ctry|addr_line1_CA|addr_line2_CA|city_CA|st_ca|zip_CA|res_cty_CA|ctry_CA|phone|intl_access|ndcellphone|line1|marital_status|us_citizen|res_ctry|Status|Country_of_Birth|ethnicity|hispanic|religion|religion_other|religion_protestant|prog|subprog|major|major2|subject1|subject2|plan_enr_sess|plan_enr_yr|intend_enr_hrs|high_school_name|ceeb|high_school_street1|High_school_street2|high_school_city|high_school_state|high_school_zip|high_school_date_attended|high_school_grad_date|ged|high_school_gpa|gpa_scale|college_name1|college_Ceeb1|degree1|degreedate1|college_name2|college_ceeb2|degree2|degreedate2|college_name3|college_ceeb3|degree3|degreedate3|college_name4|college_ceeb4|degree4|degreedate4|college_name5|college_ceeb5|degree5|degreedate5|Student_type|enrstat|visit_status|fa|vet_ben|sat_math|stat_write|sat_read|act_comp|sat1|sat1_date|sat2|sat2_date|act1|act1_date|act2 |act2_date|toefl_date1|toefl_Score1|toefl_date2|toefl_score2|gre_1|gre1_date|gre_2|gre2_date|gmat_1|gmat1_date|gmat_2|gmat2_date|mat_date1|mat_score1|mat_date2|mat_score2|hsg_type|handicap_code|athletics|chosen_sport|interest|milit_code|app_complete_date|activ_name_1|activ_hs_1|activ_college_1|activ_desc_1|activ_name_2|activ_hs_2|activ_college_2|activ_desc_2|activ_name_3|activ_hs_3|activ_college_3|activ_desc_3|activ_name_4|activ_hs_4|activ_college_4|activ_desc_4|activ_name_5|activ_hs_5|activ_college_5|activ_desc_5|activ_add_explain|awards_honors_explain|parent_relationship_1|parent_prefix_1|parent_fname_1|parent_lname_1|parent_deceased_1|parent_email|parent_addr1_1|parent_addr2_1|parent_city_1|parent_state_1|parent_zip5_dash_zip4_1|parent_country_cd_1|parent_job_1|parent_employer_1|parent_educ_1|parent_relationship_2|parent_prefix_2|parent_fname_2|parent_lname_2|parent_deceased_2|parent_email_2|parent_addr1_2|parent_addr2_2|parent_city_2|parent_state_2|parent_zip5_dash_zip4_2|parent_country_cd_2|parent_job_2|parent_employer_2|parent_educ_2|guardian_prefix_1|guardian_fname_1|guardian_lname_1|guardian_email|guardian_addr1_1|guardian_addr2_1|guardian_city_1|guardian_state_1|guardian_zip5_dash_zip4_1|guardian_country_cd_1|legacy_fname_1|legacy_lname_1|legacy_relationship_1|legacy_grad_year_1|legacy_fname_2|legacy_lname_2|legacy_relationship_2|legacy_grad_year_2|legacy_fname_3|legacy_lname_3|legacy_relationship_3|legacy_grad_year_3|legacy_fname_4|legacy_lname_4|legacy_relationship_4|legacy_grad_year_4|suspended|suspended_explain|form_to_counselor|counselor_fname|counselor_lname|counselor_email|legal_agree|conviction|conviction_explain
<?php /* Export Data */ 
	foreach($applications as $app) {
        echo $app['CarsID'].'|'.
            $app['RoyallID'].'|'.
            $app['HobsonsID'].'|'.
            $app['LastName'].'|'.
            $app['FirstName'].'|'.
            $app['MiddleName'].'|'.
            $app['suffix'].'|'.
            $app['previous_name'].'|'.
            $app['sex'].'|'.
            $app['birth_date'].'|'.
            $app['SF_NO'].'|'.
            $app['Addr_Line1'].'|'.
            $app['Addr_Line2'].'|'.
            $app['City'].'|'.
            $app['st'].'|'.
            $app['zip'].'|'.
            $app['res_cty'].'|'.
            $app['ctry'].'|'.
            $app['addr_line1_CA'].'|'.
            $app['addr_line2_CA'].'|'.
            $app['city_CA'].'|'.
            $app['st_ca'].'|'.
            $app['zip_CA'].'|'.
            $app['res_cty_CA'].'|'.
            $app['ctry_CA'].'|'.
            $app['phone'].'|'.
            $app['intl_access'].'|'.
            $app['ndcellphone'].'|'.
            $app['line1'].'|'.
            $app['marital_status'].'|'.
            $app['us_citizen'].'|'.
            $app['res_ctry'].'|'.
            $app['Status'].'|'.
            $app['Country_of_Birth'].'|'.
            $app['ethnicity'].'|'.
            $app['hispanic'].'|'.
            $app['religion'].'|'.
            /* relgion_other */'|'.
            /* religion_protestant */'|'.
            $app['prog'].'|'.
            /* subprog */'|'.
            $app['major'].'|'.
            /* major2 */'|'.
            $app['subject1'].'|'.
            $app['subject2'].'|'.
            $app['plan_enr_sess'].'|'.
            $app['plan_enr_yr'].'|'.
            $app['intend_enr_hrs'].'|'.
            /* high_school_name */'|'.
            /* ceeb_code */'|'.
            /* high_school_street1 */'|'.
            /* high_school_street2 */'|'.
            /* high_school_city  */'|'.
            /* high_school_state  */'|'.
            /* high_school_zip */'|'.
            /* high_school_date_attended */'|'.
            /* high_school_grad_date */'|'.
            /* ged */'|'.
            /* high_school_gpa */'|'.
            /* gpa_scale */'|'.
            $app['college_name1'].'|'.
            $app['college_Ceeb1'].'|'.
            $app['degree1'].'|'.
            $app['degreedate1'].'|'.
            $app['college_name2'].'|'.
            $app['college_ceeb2'].'|'.
            $app['degree2'].'|'.
            $app['degreedate2'].'|'.
            $app['college_name3'].'|'.
            $app['college_ceeb3'].'|'.
            $app['degree3'].'|'.
            $app['degreedate3'].'|'.
            $app['college_name4'].'|'.
            $app['college_ceeb4'].'|'.
            $app['degree4'].'|'.
            $app['degreedate4'].'|'.
            $app['college_name5'].'|'.
            $app['college_ceeb5'].'|'.
            $app['degree5'].'|'.
            $app['degreedate5'].'|'.
            $app['Student_type'].'|'.
            /* enrstat */'|'.
            /* visit_status */'|'.
            $app['fa'].'|'.
            $app['vet_ben'].'|'.
            /* sat_math */'|'.
            /* stat_write */'|'.
            /* sat_read */'|'.
            /* act_comp */'|'.
            /* sat1 */'|'.
            /* sat1_date */'|'.
            /* sat2 */'|'.
            /* sat2_date */'|'.
            /* act1 */'|'.
            /* act1_date */'|'.
            /* act2 */'|'.
            /* act2_date */'|'.
            /* toefl_date1 */'|'.
            /* toefl_Score1 */'|'.
            /* toefl_date2 */'|'.
            /* toefl_score2 */'|'.
            /* gre_1 */'|'.
            /* gre1_date */'|'.
            /* gre_2 */'|'.
            /* gre2_date */'|'.
            /* gmat_1 */'|'.
            /* gmat1_date */'|'.
            /* gmat_2 */'|'.
            /* gmat2_date */'|'.
            /* mat_date1 */'|'.
            /* mat_score1 */'|'.
            /* mat_date2 */'|'.
            /* mat_score2 */'|'.
            /* hsg_type */'|'.
            /* handicap_code */'|'.
            /* athletics */'|'.
            /* chosen_sport */'|'.
            /* interest */'|'.
            $app['milit_code'].'|'.
            $app['app_complete_date'].'|'.
            /* activ_name_1 */'|'.
            /* activ_hs_1 */'|'.
            /* activ_college_1 */'|'.
            /* activ_desc_1 */'|'.
            /* activ_name_2 */'|'.
            /* activ_hs_2 */'|'.
            /* activ_college_2 */'|'.
            /* activ_desc_2 */'|'.
            /* activ_name_3 */'|'.
            /* activ_hs_3 */'|'.
            /* activ_college_3 */'|'.
            /* activ_desc_3 */'|'.
            /* activ_name_4 */'|'.
            /* activ_hs_4 */'|'.
            /* activ_college_4 */'|'.
            /* activ_desc_4 */'|'.
            /* activ_name_5 */'|'.
            /* activ_hs_5 */'|'.
            /* activ_college_5 */'|'.
            /* activ_desc_5 */'|'.
            /* activ_add_explain */'|'.
            /* awards_honors_explain */'|'.
            /* parent_relationship_1 */'|'.
            /* parent_prefix_1 */'|'.
            /* parent_fname_1 */'|'.
            /* parent_lname_1 */'|'.
            /* parent_deceased_1 */'|'.
            /* parent_email */'|'.
            /* parent_addr1_1 */'|'.
            /* parent_addr2_1 */'|'.
            /* parent_city_1 */'|'.
            /* parent_state_1 */'|'.
            /* parent_zip5_dash_zip4_1 */'|'.
            /* parent_country_cd_1 */'|'.
            /* parent_job_1 */'|'.
            /* parent_employer_1 */'|'.
            /* parent_educ_1 */'|'.
            /* parent_relationship_2 */'|'.
            /* parent_prefix_2 */'|'.
            /* parent_fname_2 */'|'.
            /* parent_lname_2 */'|'.
            /* parent_deceased_2 */'|'.
            /* parent_email_2 */'|'.
            /* parent_addr1_2 */'|'.
            /* parent_addr2_2 */'|'.
            /* parent_city_2 */'|'.
            /* parent_state_2 */'|'.
            /* parent_zip5_dash_zip4_2 */'|'.
            /* parent_country_cd_2 */'|'.
            /* parent_job_2 */'|'.
            /* parent_employer_2 */'|'.
            /* parent_educ_2 */'|'.
            /* guardian_prefix_1 */'|'.
            /* guardian_fname_1 */'|'.
            /* guardian_lname_1 */'|'.
            /* guardian_email */'|'.
            /* guardian_addr1_1 */'|'.
            /* guardian_addr2_1 */'|'.
            /* guardian_city_1 */'|'.
            /* guardian_state_1 */'|'.
            /* guardian_zip5_dash_zip4_1 */'|'.
            /* guardian_country_cd_1 */'|'.
            /* legacy_fname_1 */'|'.
            /* legacy_lname_1 */'|'.
            /* legacy_relationship_1 */'|'.
            /* legacy_grad_year_1 */'|'.
            /* legacy_fname_2 */'|'.
            /* legacy_lname_2 */'|'.
            /* legacy_relationship_2 */'|'.
            /* legacy_grad_year_2 */'|'.
            /* legacy_fname_3 */'|'.
            /* legacy_lname_3 */'|'.
            /* legacy_relationship_3 */'|'.
            /* legacy_grad_year_3 */'|'.
            /* legacy_fname_4 */'|'.
            /* legacy_lname_4 */'|'.
            /* legacy_relationship_4 */'|'.
            /* legacy_grad_year_4 */'|'.
            $app['suspended'].'|'.
            $app['suspended_explain'].'|'.
            /* form_to_counselor */'|'.
            /* counselor_fname */'|'.
            /* counselor_lname */'|'.
            /* counselor_email */'|'.
            /* legal_agree */'|'.
            /* conviction */'|'.
            $app['conviction'].'|'.
            $app['conviction_explain'].'|'.

            // Additional fields requested by NDC
            $app['prog_interest'];
	}
?>
