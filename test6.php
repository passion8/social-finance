<?php
$data =
'Symbol,Series,Security Name,Band,Remarks
ADVANIHOTR,EQ,Advani Hotels & Resorts (India) Limited,5,-
ADVANIHOTR,EQ,Advani Hotels & Resorts (India) Limited,5,-
';
$format = nl2br($data);
echo $format;
var_dump( strstr($format, '<br>') );

