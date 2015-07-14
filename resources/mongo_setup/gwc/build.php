<?php
$file = fopen('ceebcodes.csv','r');
$ceebdata = fread($file,filesize('ceebcodes.csv'));
fclose($file);
$ceebarr = explode("\r", $ceebdata);
$i=0;
foreach ($ceebarr as $ceeb) {
	$fields=explode(',', $ceeb);

	$row[$i]['ceeb_code']=$fields[0];
	$row[$i]['name']=$fields[1];
	$row[$i]['state']=$fields[2];
	$row[$i]['city']=$fields[3];
	$row[$i]['zip']=$fields[4];
	
	$i++;
}
$ceeb_json = json_encode($row);
//echo $ceeb_json;
$file = fopen('new_ceeb_codes.json', 'w') or die("can't open file");
fwrite($file,$ceeb_json);
fclose($file);
?>
