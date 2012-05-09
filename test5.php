<script src="http://yui.yahooapis.com/3.5.0/build/yui/yui-min.js"></script>
<div id="demo" class="yui3-skin-sam">
<label for="ac-input">Enter an asset (for instance, YAHOO):</label><br>
<input id="ac-input" type="text">
</div>



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

