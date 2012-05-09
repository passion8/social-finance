<script src="http://yui.yahooapis.com/3.5.0/build/yui/yui-min.js"></script>
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
    <div class="container">
      <div class="row">
         <div class="span8 offset2">
            <form class="well form-search yui3-skin-sam" method="GET" action="stock.php">
            <input name="symbol" id="ac-input" type="text" placeholder="Search Stocks" style="height: 50px;" class="input-xxlarge search-query">
            <button class="btn" type="submit">Search</button>
            </form>
         </div>
      </div>
    </div>
  </body>
  <script>
/*jslint sloppy:true, unparam:true */
/*global YUI, YAHOO:true, alert */

YUI({
    filter: 'raw'
}).use("datasource-get", "datasource-jsonschema", "autocomplete", function (Y) {

    var oDS, acNode = Y.one('#ac-input');

    oDS = new Y.DataSource.Get({
        source: "http://d.yimg.com/aq/autoc?query=",
        generateRequestCallback: function (id) {
            YAHOO = {};
            YAHOO.util = {};
            YAHOO.util.ScriptNodeDataSource = {};
            YAHOO.util.ScriptNodeDataSource.callbacks =
                YUI.Env.DataSource.callbacks[id];
            return "&callback=YAHOO.util.ScriptNodeDataSource.callbacks";
        }
    });
    oDS.plug(Y.Plugin.DataSourceJSONSchema, {
        schema: {
            resultListLocator: "ResultSet.Result",
            resultFields: ["symbol", "name", "exch", "type", "exchDisp"]
        }
    });

    acNode.plug(Y.Plugin.AutoComplete, {
        maxResults: 10,
        resultTextLocator: 'symbol',
        resultFormatter: function (query, results) {
            return Y.Array.map(results, function (result) {
                var asset = result.raw;

                return asset.symbol +
                    " " + asset.name +
                    " (" + asset.type +
                    " - " + asset.exchDisp + ")";
            });
        },
        requestTemplate: "{query}&region=US&lang=en-US",
        source: oDS
    });

    acNode.ac.on('select', function (e) {
        (e.result.raw.name);
    });
});
</script>

</html>

