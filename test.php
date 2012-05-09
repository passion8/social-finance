
<script src="http://yui.yahooapis.com/3.5.0/build/yui/yui-min.js"></script>
<div id="demo" class="yui3-skin-sam">
  <label for="ac-input">Enter company name:</label><br>
  <input id="ac-input" type="text">
</div>

<script>
YUI().use('autocomplete', 'autocomplete-highlighters','autocomplete-filters', function (Y) {
  Y.one('#ac-input').plug(Y.Plugin.AutoComplete, {
    resultHighlighter: 'phraseMatch',
    resultListLocator: 'ResultSet.Result',
    resultTextLocator: 'name',
    source: 'test2.php?symbol={query}&callback={callback}'
  });
});
</script>

