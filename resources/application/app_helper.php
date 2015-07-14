<?php
    $fh = file("input.txt");
    foreach($fh as $line_num => $line) {
        echo preg_replace("/.*\W(\w+)/", '<option value="$1">$0</option>', $line);
    }
?>
