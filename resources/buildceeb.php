<?php

$myFile = "gwc_hs_ceeb.json";
$fh = fopen($myFile, 'w');


if (($handle = fopen('hs.ceeb.csv', 'r')) === false) {
    die('Error opening file');
}

$headers = fgetcsv($handle, 1024, ',');
$complete = array();

while ($row = fgetcsv($handle, 1024, ',')) {
    $complete[] = array_combine($headers, $row);
}

fclose($handle);

$stringData =  json_encode($complete);

fwrite($fh, $stringData);
fclose($fh);
?>