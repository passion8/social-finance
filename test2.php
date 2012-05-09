<?php

$query = $_GET['symbol'];
//$query = 'GO';

$url = "http://d.yimg.com/autoc.finance.yahoo.com/autoc?query={$query}&callback=YAHOO.Finance.SymbolSuggest.ssCallback";
$yss = file_get_contents($url,"r");
echo (($yss));
function jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
    if($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
       $jsonp = substr($jsonp, strpos($jsonp, '('));
    }
    return json_decode(trim($jsonp,'();'), $assoc);
}
//echo "<pre>";
//echo print_r(jsonp_decode($yss, true));
//$data = jsonp_decode($yss);
//echo $data;
//echo "<pre>";

