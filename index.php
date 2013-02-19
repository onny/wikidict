<?php
  include('language_codes.php');
  include('settings.php');

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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Free and open online dictionary, based on Wiktionary" />
	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />
	<title>WikiDict.cc - The free and open online dictionary</title>

	<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
	<script type='text/javascript' src='js/base.js'></script>
	<script type='text/javascript' src="js/jquery-ui-1.9.2.custom.js"></script>
	<script type="text/javascript" src="js/jquery.ui.position.js"></script>
	<script type="text/javascript" src="js/jquery.contextMenu.js"></script>

	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.9.2.custom.css">
	<link rel="stylesheet" media="handheld" href="css/style-mobile.css">
	<link rel="stylesheet" media="screen and (max-width: 800px)" href="css/style-mobile.css">
	<link rel="stylesheet" media="screen and (min-width: 801px)" href="css/styles.css">
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/styles.css"><![endif]--> 
	<link rel="stylesheet" type="text/css" href="css/jquery.contextMenu.css"/>

	<link id="opensearch" title="WikiDict.cc <?=$from?>-<?=$to?>" type="application/opensearchdescription+xml" rel="search" href="opensearch.php?from=<?=$from?>&amp;to=<?=$to?>">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="copyright" href="//creativecommons.org/licenses/by-sa/3.0/">
	<link rel="copyright" href="//www.gnu.org/copyleft/fdl.html">
	<link rel="license" href="//creativecommons.org/licenses/by-sa/3.0/">
	<link rel="license" href="//www.gnu.org/copyleft/fdl.html">

    <script type="text/javascript">
    $(function(){
	$.contextMenu({
	    selector: '.contextmenu>tr>td', 
	    callback: function(key, options) {
	      if (key == "new"){
		voclist_add()
	      } else {	  
		var trans = new Array();
		trans[0] = $(this).text();
		trans[1] = $(this).next('td').text();
		trans[2] = $('#from').val();
		trans[3] = $('#to').val();
		trans = JSON.stringify(trans);
		$.post("process.php", { action: "voclist_item_add", id: key, items: trans } )
		.success(function(data) {
		  // wir färben das aktuelle row ein (vllt. auch permanent)?
		  alert('success');
		})
		.error(function(data) {
		  alert('error');
		});
	      }
	    },
	    items: {
		"fold1a": {
		    "name": "Add to voc list", 
		    "items": items,
		    icon: "add"
		}
	    }
	});
	
	$('.contextmenu').on('click', function(e){
	    console.log('clicked', this);
	})
    });
    </script>


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
    <a href="javascript:addOpensearch();">OpenSearch</a>


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
      <tbody class="contextmenu">
      </tbody>
    </table>
  </section>

  <footer>
    <div style="float:left;">
      <a href="http://flattr.com/thing/1096017/WikiDict-cc-The-free-and-open-online-dictionary" target="_blank">
      <img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a>
    </div>
    <a href="javascript:article('dictionaries');">Dictionaries</a>
    <a href="javascript:article('vocabulary.php');">Vocabulary</a>
    <a href="javascript:article('about');">About</a>
  </footer>

</div>
</body>
</html>
