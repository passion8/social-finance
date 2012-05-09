<?php
$symbol = mysql_real_escape_string($_GET["symbol"]);

$query = "select * from yahoo.finance.quotes where symbol in (\"$symbol\")";

// insert the query into the full URL
    $url = 'http://query.yahooapis.com/v1/public/yql?format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&q=' . urlencode($query);

// set up the cURL
$c = curl_init();
curl_setopt($c, CURLOPT_URL, $url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);

// execute the cURL
$rawdata = curl_exec($c);
curl_close($c);

// Convert the returned JSON to a PHP object
$data = json_decode($rawdata,true);

$main_block  =  $data["query"]["results"]["quote"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HomeShop Finance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paritosh Piplewar">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
  </head>
  <body>
   <div class="navbar">
    <div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </a>

        <a class="brand" href="/finance">JEC Project</a>


    </div>
    </div>
    </div>
    <div class="row">
        <div class="span8 offset2">
           <h2> Finance Analysis of <?php echo $data["query"]["results"]["quote"]['Name']; ?> </h2>
        </div>
    </row>
    <div class="container">
      <div class="row">

<div class="span8">
<table class="table table-striped">
<tbody>

<?php foreach($main_block as $abbrivation => $value)
    {
        echo "<tr><td>";
        echo '<span class="label label-info">'.$abbrivation . "</span>  :  " . $value ;
        echo '<td></tr>';
    }
?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>

