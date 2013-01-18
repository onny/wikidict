<!doctype html>
<?php
include('language_codes.php');

if(isset($_GET['from'])) {
	if(isset($languageCodes[$_GET['from']])){
		$from = $_GET['from'];
	}
} else {
	// passed language code is not correct, lets fallback
	// to the default 
	$from = "en";
}

if(isset($_GET['to'])) {
	if(isset($languageCodes[$_GET['to']])){
		$to = $_GET['to'];
	}
} else {
	// passed language code is not correct, lets fallback
	// to the default 
	$to = "de";
}

if(isset($_GET['q'])){
	$q = $_GET['q'];
} else {
	$q = "";
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
	<script type='text/javascript' src='js/base.js'></script>
	<script type='text/javascript' src="js/jquery-ui-1.9.2.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.9.2.custom.css">

	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />
	<link rel="stylesheet" media="handheld" href="css/style-mobile.css">
	<link rel="stylesheet" media="screen and (max-width: 800px)" href="css/style-mobile.css">
	<link rel="stylesheet" media="screen and (min-width: 801px)" href="css/styles.css">
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/styles.css"><![endif]--> 

	<link id="opensearch" title="WikiDict.cc <?=$from?>-<?=$to?>" type="application/opensearchdescription+xml" rel="search" href="opensearch.php?from=<?=$from?>&amp;to=<?=$to?>">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="copyright" href="//creativecommons.org/licenses/by-sa/3.0/">
	<link rel="copyright" href="//www.gnu.org/copyleft/fdl.html">
	<link rel="license" href="//creativecommons.org/licenses/by-sa/3.0/">
	<link rel="license" href="//www.gnu.org/copyleft/fdl.html">
	<title>WikiDict.cc - The free and open online dictionary</title>
</head>
<?php 
	echo'<body onload="';
	if (isset($_GET['p'])) {
		echo 'showArticle(\''.$_GET['p'].'\');';
	} else {
		if(isset($_GET['from']) & isset($_GET['to']) & isset($_GET['q'])){
    			echo 'translate(\''.$from.'\',\''.$to.'\',\''.$q.'\');';
		}
	}
	echo '">';
?>

  <div id=container>

  <header>
  <div id="left">
    <h1><a href="javascript:void(0);">WikiDict.cc</a></h1>
    <h2>Free and open online dictionary based on <a target=new href=http://wiktionary.org>Wiktionary.org</a></h2>
      </div>
      <div id="right">
      <form id="form" class="form-inline">
<span id="mobilfoo">
<label for="from">From:</label>
<select onchange="$('form').submit()" name="from" id="from" tabindex="2">
<?php
foreach ($languageCodes as $key => $value)
  if($key == $from) { 
    echo "<option selected='selected' value='".$key."'>".$value." (".$key.")</option>";
  } else {
    echo "<option value='".$key."'>".$value." (".$key.")</option>";
  }
?>
</select>
</span>
<span id="mobilfoo">
<label for="to">to:</label>
<select onchange="$('form').submit()" name="to" id="to" tabindex="2">
<?php
foreach ($languageCodes as $key => $value)
  if($key == $to) { 
    echo "<option selected='selected' value='".$key."'>".$value." (".$key.")</option>";
  } else {
    echo "<option value='".$key."'>".$value." (".$key.")</option>";
  }
?>
</select>
</span>
<br>
	  <input type="text" id="word" value="<?=$q?>">
	  <button>Translate</button>


      </form>
    </div>
  </header> 

  <section>
    <article>
    </article>
    <table id="result">
      <thead>
	<tr class="title"><th width=50%>Sprache 1</th><th>Sprache 2</th></tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </section>

  <footer>
<div style="float:left;">
<a href="http://flattr.com/thing/1096017/WikiDict-cc-The-free-and-open-online-dictionary" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a>
</div>
    <a href="javascript:article('about');">About</a>
    <a href="javascript:article('tools');">Tools</a>
    <a href="javascript:article('imprint');">Imprint</a>
    <a href="javascript:addOpensearch();">OpenSearch</a>
  </footer>

</div>
</body>
</html>
