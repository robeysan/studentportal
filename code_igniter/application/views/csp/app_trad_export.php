<?php
/* 
 * Concordia Saint Paul Library export for Traditional Applications
 *
 */
        /* Setup ethnicities */
        $ddlValueHispanic = '';
        $ddlValueIndian = '';
        $ddlValueAsian = '';
        $ddlValueBlack = '';
        $ddlValueHawaiian = '';
        $ddlValueWhite = '';
        $ddlValueNotRespond = '';

        if(isset($ddlEthnicity)) {
            /* For each value received from multiple dropdown, map
             * to place in export */
            foreach($ddlEthnicity as $eth) {
                switch($eth) {
                case '1':
                    $ddlValueIndian = 'yes';
                    break;
                case '2':
                    $ddlValueAsian = 'yes';
                    break;
                case '3':
                    $ddlValueBlack = 'yes';
                    break;
                case '4':
                    $ddlValueHawaiian = 'yes';
                    break;
                case '5':
                    $ddlValueWhite = 'yes';
                    break;
                case '6':
                    $ddlValueNotRespond = 'yes';
                    break;
                case '7':
                    $ddlValueHispanic = 'yes';
                    break;
                }
            }
        }

        /* Setup extracurricular stuff */
        $ddlValueExtracurricular1 = '';
        $ddlValueExtracurricular2 = '';

        if(isset($ddlExtracurricular[0])) {
            $ddlValueExtracurricular1 = $ddlExtracurricular[0];
        }
        if(isset($ddlExtracurricular[1])) {
            $ddlValueExtracurricular2 = $ddlExtracurricular[1];
        }

        echo $ddlPrefix .','. 
            $txtLName .','.
            $txtFName .','.
            $txtMiddleName .','.
            $txtSuffix .','.
            $txtPreferred .','.
            $txtMaiden .','.
            $radGender .','.
            $txtSSN .','.
            $txtDOB .','.
            $txtPermAdd .','.
            $txtPermAdd2 .','.
            $txtPermCity .','.
            $ddlpermstate .','.
            $txtPermZip .','.
            $ddlCountry .','.
            $txtPhone .','.
            $txtPhoneCell .','.
            ''/* fax */.','.
            ''/* txtEmailWork */.','.
            $txtEmailPer .','.
            ''/*$txtEmp .*/.','.
            ''/*$txtEmpAdd */.','.
            ''/*$txtEmpCity */.','.
            ''/*$ddlempstate */.','.
            ''/*$txtEmpZip */.','.
            ''/*$txtWorkPhone */.','.
            $ddlParent1Relation .','.
            $txtParent1LastName .','.
            $txtParent1FirstName .','.
            $txtParent1Add .','.
            ''/* parent1 street2 */.','.
            $txtParent1City .','.
            $ddlParent1State .','.
            $txtParent1Zip .','.
            $txtParent1Phone .','.
            $txtParent1Email .','.
            $ddlParent2Relation .','.
            $txtParent2LastName .','.
            $txtParent2FirstName .','.
            ''/* temp address 1 */.','.
            ''/* temp address2 */.','.
            ''/* temp city */.','.
            ''/* temp state */.','.
            ''/* temp zip */.','.
            ''/* temp phone? */.','.
            $ddlCitizen .','.
            ''/*$txtImmigration */.','.
            ''/*$ddlCOB */.','.
            $txtHighSchoolName .','.
            $txtHighSchoolCity .','.
            $ddlHighSchoolState .','.
            $radGED .','.
            $txtHighSchoolGradYear .','.
            ''/* rank */.','.
            ''/* high school gpa */.','.
            ''/* ACT1 */.','.
            ''/* ACT2 */.','.
            ''/* ACT3 */.','.
            ''/* ACT4 */.','.
            ''/* ACT Comp */.','.
            ''/* SAT Math */.','.
            ''/* SAT Verbal */.','.
            $txtPriorCollege1 .','.
            $txtCollegeCity1 .','.
            $ddlCollegeState1 .','.
            $txtPriorCollege2 .','.
            $txtCollegeCity2 .','.
            $ddlCollegeState2 .','.
            $txtPriorCollege3 .','.
            $txtCollegeCity3 .','.
            $ddlCollegeState3 .','.
            $txtPriorCollege4 .','.
            $txtCollegeCity4 .','.
            $ddlCollegeState4 .','.
            $txtPriorCollege5 .','.
            $txtCollegeCity5 .','.
            $ddlCollegeState5 .','.
            $radmilitary .','.
            ''/* Previously Attended Concordia */.','.
            ''/* Siblings */.','.
            $ddlRelativesAttended .','. /* AKA as 'Legacy' */
            $txtCong .','.
            $txtCongStreet .','.
            $txtCongCity .','.
            $ddlCongState .','.
            $ddlAffiliation .','.
            ''/* local news*/.','.
            $ddlTerm .','.
            $ddlProgram .','.
            ''/* major 2*/.','.
            $ddlMinor .','.
            $Concentration .','.
            $StuType .','.
            $RecruitType .','.
            $College .','.
            $Degree .','.
            $Level .','.
            $Interest1 .','.
            $ddlValueExtracurricular1 . ',' . /* Interest 2 */
            $ddlValueExtracurricular2 . ',' . /* Interest 3 */
            ''/* cohort */.','.
            $Recruiter .','.
            ''/*commplan*/.','.
            ''/* waiverCode */.','.
            ''/* ethnicity */.','.
            $JobTitle .','.
            ''/* username */.','.
            $FinAid .','.
            ''/* contact code */.','.
            ''/* GMATDate */.','.
            ''/* GMATScore */.','.
            ''/* GMATSent */.','.
            ''/* FA Release */.','.
            $radFinancialAidResidency .','.
            $radHighSchoolGraduate .','.
            $Reimburse .','.
            ''/* employer reimbursement-term */.','.
            ''/* employer reimbursement-annual */.','.
            $ddlHear .','.
            ''/* promo code */.','.
            $radFelony .','.
            $txtFelony_Explain .','.
            $radCanSendText .','.
            $txtCollegeReadiness .','.
            $txtParent2Add .','.
            ''/* parent2 street2 */.','.
            $txtParent2City .','.
            $ddlParent2State .','.
            $txtParent2Zip .','.
            $txtParent2Phone .','.
            ''/* location Burnsville */.','.
            $ddlAtts .','.
            ''/* SATW1 */.','.
            $Interest4 .','.
            $radLiveOnCampus .','.
            ''/* parent1 employer */.','.
            ''/* parent1 title */.','.
            ''/* parent 1 contact */.','.
            ''/* parent2 employer */.','.
            ''/* parent2 title */.','.
            ''/* parent2 contact */.','.
            $txtParent2Email .','.
            $ddlValueHispanic .','.
            $ddlValueIndian .','.
            $ddlValueAsian .','.
            $ddlValueBlack .','.
            $ddlValueHawaiian .','.
            $ddlValueWhite .','.
            $ddlValueNotRespond .','.
            $radFirstGeneration .','.
            $radGi .','.
            ''/*$corp_partner */.','.
            $txtPhiThetaKappa .','.
            $txtFormer .','.
            ''/* teaching cert */.','.
            ''/* military active */.','.
            $radHomeSchooled .','.
            $radDivisionIIAthletics .','.
            $ddlSport .','.
            $ddlShirt. "\n";

            // Reset any variables cached during render
            $this->load->_ci_cached_vars = array();
?>
