
<script src="http://yui.yahooapis.com/3.5.0/build/yui/yui-min.js"></script>
<div id="demo" class="yui3-skin-sam">
  <label for="ac-input">Enter the name of a US state:</label><br>
  <input id="ac-input" type="text">
</div>

<script>
YUI().use('autocomplete', 'autocomplete-filters', 'autocomplete-highlighters', function (Y) {
  var states = [
    'Alabama',
    'Alaska',
    'Arizona',
    'Arkansas',
    'California',
    'Colorado',
    'Connecticut',
    'Delaware',
    'Florida',
    'Georgia',
    'Hawaii',
    'Idaho',
    'Illinois',
    'Indiana',
    'Iowa',
    'Kansas',
    'Kentucky',
    'Louisiana',
    'Maine',
    'Maryland',
    'Massachusetts',
    'Michigan',
    'Minnesota',
    'Mississippi',
    'Missouri',
    'Montana',
    'Nebraska',
    'Nevada',
    'New Hampshire',
    'New Jersey',
    'New Mexico',
    'New York',
    'North Dakota',
    'North Carolina',
    'Ohio',
    'Oklahoma',
    'Oregon',
    'Pennsylvania',
    'Rhode Island',
    'South Carolina',
    'South Dakota',
    'Tennessee',
    'Texas',
    'Utah',
    'Vermont',
    'Virginia',
    'Washington',
    'West Virginia',
    'Wisconsin',
    'Wyoming'
  ];

  Y.one('#ac-input').plug(Y.Plugin.AutoComplete, {
    resultFilters    : 'phraseMatch',
    resultHighlighter: 'phraseMatch',
    source           : states
  });
});
</script>

