<?php
	if (isset($_GET['from'])) {
		$from = $_GET['from'];
	} else {
		$from = "en";
	}
	if (isset($_GET['to'])) {
		$to = $_GET['to'];
	} else {
		$to = "de";
	}

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
	<ShortName>WikiDict.cc <?=$from?>-<?=$to?></ShortName>
	<Description>WikiDict.cc - Free and open online dictionary</Description>
	<InputEncoding>UTF-8</InputEncoding>
	<Image height="16" width="16" type="image/x-icon">http://www.wikidict.cc/images/favicon.ico</Image>
	<Url type="text/html" template="http://wikidict.cc/?from=<?=$from?>&amp;to=<?=$to?>&amp;q={searchTerms}"/>
</OpenSearchDescription>
