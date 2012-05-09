<?php
$handle = fopen("stock.csv", "w+");
$data_new_line = nl2br($data);

$first = strstr( $data_new_line, '<br />' , true);
echo $first;

