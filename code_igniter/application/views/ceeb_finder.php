<?php
$i=0;
$tmp = array();
echo "<table id='ceebResults' class='table table-condensed'><tbody>";
foreach ($state_ceebs as $state) {
	$tmp[$i]['name'] = $state['name'];
	$tmp[$i]['ceeb'] = $state['ceeb_code'];
	echo "<tr class='ceebList'><td>".$tmp[$i]['name']."</td><td>".$tmp[$i]['ceeb']."</td></tr>";
	$i++;
}
echo "</tbody></table>";
?>
