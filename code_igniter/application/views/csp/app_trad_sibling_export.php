<?php
/* 
 * Concordia Saint Paul Library export for Traditional Applications Siblings
 *
 */

// Set sibling term
// Format is
// If grad year is 2013, term is 201410
// If grad year is 2014, term is 201410
// and so on...
$Sibling1Term = '';
$Sibling2Term = '';

if(isset($txtSibling1GradYear)) {
    if(is_numeric($txtSibling1GradYear)) {
        $Sibling1Term = intval($txtSibling1GradYear) + 1;
        $Sibling1Term = strval($Sibling1Term) . '10';
    }
}
if(isset($txtSibling2GradYear)) {
    if(is_numeric($txtSibling2GradYear)) {
        $Sibling2Term = intval($txtSibling2GradYear) + 1;
        $Sibling2Term = strval($Sibling2Term) . '10';
    }
}

if($txtSibling1FirstName != '') {
    echo ''.','.
        $txtSibling1LastName .','.
        $txtSibling1FirstName .','. 
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        $txtPermAdd .','.
        $txtPermAdd2 .','.
        $txtPermCity .','.
        $ddlpermstate .','.
        $txtPermZip .','.
        $ddlCountry .','.
        $txtPhone .','.       
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        $Sibling1Term .','.       
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        'F'.','.
        'NF'.','.
        $txtSibling1School .','.
        $txtPermCity .','.
        $ddlpermstate .','.
        ''.','.
        $txtSibling1GradYear .','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        'REB'.','.
        'UG'.','.
        '00'.','.
        ''.','.
        '000000'.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        $txtSibling1Age.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''."\n";
}

if($txtSibling2FirstName != '') {
    echo ''.','.
        $txtSibling2LastName .','.
        $txtSibling2FirstName .','. 
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        $txtPermAdd .','.
        $txtPermAdd2 .','.
        $txtPermCity .','.
        $ddlpermstate .','.
        $txtPermZip .','.
        $ddlCountry .','.
        $txtPhone .','.       
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        $Sibling2Term .','.       
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        'F'.','.
        'NF'.','.
        $txtSibling2School .','.
        $txtPermCity .','.
        $ddlpermstate .','.
        ''.','.
        $txtSibling2GradYear .','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        'REB'.','.
        'UG'.','.
        '00'.','.
        ''.','.
        '000000'.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        $txtSibling2Age.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''.','.
        ''."\n";

        // Reset any variables cached during render
        $this->load->_ci_cached_vars = array();
}
