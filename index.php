<!-- # TODO:
#	- Firefox/Chrome Such-Plugin
#	- In der Ergebnistabelle, Vokabeln ergänzen mit Angaben (f/m, plural/singular)
#	- Tippfehler erkennen und Korrektur vorschlagen
#	- Dict.cc fallback
#	- Vokabeln speichern / Liste anlegen
#	- Eintrag nicht gefunden -> Link zum Anlegen der Seite
		- oder: seite wurde gefunden, aber es gibt noch keine übersetzungsangaben
#	- Pronunciations http://en.wiktionary.org/wiki/sunshine
#	- offer daily dict snapshots as torrent in various open dict formats (there are some dumping projects on github)
#	- livesearch
#	- ignore case per default
#	- fade effect
#	- siehe beispiel, wie form inputs validiert werden können http://api.jquery.com/submit/
#	- mutmaßlicher bug: wort 'double sharp' linkt nicht mehr richtig wegen leerzeichen
#	- mobile ui
#	- dropdown menu für sprachen (siehe wikidict.de)
#	- suchen in beide richtungen
#	- escape wrong input (security)
#	- making a new search, rewriting url to set get params
#	- jusing css instead of js for highlighting rows

# ABOUT:
#	- http://www.apertium.org/ Ist frei, hat dics, lässt sich aber nicht benutzerfreundlich im Wiki-sinne erweitern

# Reference:
	- http://en.wiktionary.org/w/api.php
-->

<?php
$languageCodes = array(
 "aa" => "Afar",
 "ab" => "Abkhazian",
 "ae" => "Avestan",
 "af" => "Afrikaans",
 "ak" => "Akan",
 "am" => "Amharic",
 "an" => "Aragonese",
 "ar" => "Arabic",
 "as" => "Assamese",
 "av" => "Avaric",
 "ay" => "Aymara",
 "az" => "Azerbaijani",
 "ba" => "Bashkir",
 "be" => "Belarusian",
 "bg" => "Bulgarian",
 "bh" => "Bihari",
 "bi" => "Bislama",
 "bm" => "Bambara",
 "bn" => "Bengali",
 "bo" => "Tibetan",
 "br" => "Breton",
 "bs" => "Bosnian",
 "ca" => "Catalan",
 "ce" => "Chechen",
 "ch" => "Chamorro",
 "co" => "Corsican",
 "cr" => "Cree",
 "cs" => "Czech",
 "cu" => "Church Slavic",
 "cv" => "Chuvash",
 "cy" => "Welsh",
 "da" => "Danish",
 "de" => "German",
 "dv" => "Divehi",
 "dz" => "Dzongkha",
 "ee" => "Ewe",
 "el" => "Greek",
 "en" => "English",
 "eo" => "Esperanto",
 "es" => "Spanish",
 "et" => "Estonian",
 "eu" => "Basque",
 "fa" => "Persian",
 "ff" => "Fulah",
 "fi" => "Finnish",
 "fj" => "Fijian",
 "fo" => "Faroese",
 "fr" => "French",
 "fy" => "Western Frisian",
 "ga" => "Irish",
 "gd" => "Scottish Gaelic",
 "gl" => "Galician",
 "gn" => "Guarani",
 "gu" => "Gujarati",
 "gv" => "Manx",
 "ha" => "Hausa",
 "he" => "Hebrew",
 "hi" => "Hindi",
 "ho" => "Hiri Motu",
 "hr" => "Croatian",
 "ht" => "Haitian",
 "hu" => "Hungarian",
 "hy" => "Armenian",
 "hz" => "Herero",
 "ia" => "Interlingua (International Auxiliary Language Association)",
 "id" => "Indonesian",
 "ie" => "Interlingue",
 "ig" => "Igbo",
 "ii" => "Sichuan Yi",
 "ik" => "Inupiaq",
 "io" => "Ido",
 "is" => "Icelandic",
 "it" => "Italian",
 "iu" => "Inuktitut",
 "ja" => "Japanese",
 "jv" => "Javanese",
 "ka" => "Georgian",
 "kg" => "Kongo",
 "ki" => "Kikuyu",
 "kj" => "Kwanyama",
 "kk" => "Kazakh",
 "kl" => "Kalaallisut",
 "km" => "Khmer",
 "kn" => "Kannada",
 "ko" => "Korean",
 "kr" => "Kanuri",
 "ks" => "Kashmiri",
 "ku" => "Kurdish",
 "kv" => "Komi",
 "kw" => "Cornish",
 "ky" => "Kirghiz",
 "la" => "Latin",
 "lb" => "Luxembourgish",
 "lg" => "Ganda",
 "li" => "Limburgish",
 "ln" => "Lingala",
 "lo" => "Lao",
 "lt" => "Lithuanian",
 "lu" => "Luba-Katanga",
 "lv" => "Latvian",
 "mg" => "Malagasy",
 "mh" => "Marshallese",
 "mi" => "Maori",
 "mk" => "Macedonian",
 "ml" => "Malayalam",
 "mn" => "Mongolian",
 "mr" => "Marathi",
 "ms" => "Malay",
 "mt" => "Maltese",
 "my" => "Burmese",
 "na" => "Nauru",
 "nb" => "Norwegian Bokmal",
 "nd" => "North Ndebele",
 "ne" => "Nepali",
 "ng" => "Ndonga",
 "nl" => "Dutch",
 "nn" => "Norwegian Nynorsk",
 "no" => "Norwegian",
 "nr" => "South Ndebele",
 "nv" => "Navajo",
 "ny" => "Chichewa",
 "oc" => "Occitan",
 "oj" => "Ojibwa",
 "om" => "Oromo",
 "or" => "Oriya",
 "os" => "Ossetian",
 "pa" => "Panjabi",
 "pi" => "Pali",
 "pl" => "Polish",
 "ps" => "Pashto",
 "pt" => "Portuguese",
 "qu" => "Quechua",
 "rm" => "Raeto-Romance",
 "rn" => "Kirundi",
 "ro" => "Romanian",
 "ru" => "Russian",
 "rw" => "Kinyarwanda",
 "sa" => "Sanskrit",
 "sc" => "Sardinian",
 "sd" => "Sindhi",
 "se" => "Northern Sami",
 "sg" => "Sango",
 "si" => "Sinhala",
 "sk" => "Slovak",
 "sl" => "Slovenian",
 "sm" => "Samoan",
 "sn" => "Shona",
 "so" => "Somali",
 "sq" => "Albanian",
 "sr" => "Serbian",
 "ss" => "Swati",
 "st" => "Southern Sotho",
 "su" => "Sundanese",
 "sv" => "Swedish",
 "sw" => "Swahili",
 "ta" => "Tamil",
 "te" => "Telugu",
 "tg" => "Tajik",
 "th" => "Thai",
 "ti" => "Tigrinya",
 "tk" => "Turkmen",
 "tl" => "Tagalog",
 "tn" => "Tswana",
 "to" => "Tonga",
 "tr" => "Turkish",
 "ts" => "Tsonga",
 "tt" => "Tatar",
 "tw" => "Twi",
 "ty" => "Tahitian",
 "ug" => "Uighur",
 "uk" => "Ukrainian",
 "ur" => "Urdu",
 "uz" => "Uzbek",
 "ve" => "Venda",
 "vi" => "Vietnamese",
 "vo" => "Volapuk",
 "wa" => "Walloon",
 "wo" => "Wolof",
 "xh" => "Xhosa",
 "yi" => "Yiddish",
 "yo" => "Yoruba",
 "za" => "Zhuang",
 "zh" => "Chinese",
 "zu" => "Zulu"
);
if(isset($_GET['from']) & isset($_GET['to']) & isset($_GET['q'])){
	if(isset($languageCodes[$_GET['from']])){
		$from = $_GET['from'];
	} else {
		// passed language code is not correct, lets fallback
		// to the default 
		$from = "en";
	}
	if(isset($languageCodes[$_GET['to']])){
		$to = $_GET['to'];
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
}	else {
	  $from = "en";
	  $to = "de";
	  $q = "";
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
	<script type='text/javascript' src='base.js'></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>WikiDict.cc - Free and open online dictionary</title>
</head>
<body>

  <div id=container>

  <header>
  <div id="left">
    <h1><a href=/wikidict>WikiDict.cc</a></h1>
    <h2>Free and open online dictionary based on <a target=new href=http://wiktionary.org>Wiktionary.org</a></h2>
      </div>
      <div id="right">
      <form class="form-inline">
	  <input type="text" id="from" class="lang" value="<?=$from?>">
	  <input type="text" id="to" class="lang" value="<?=$to?>">
	  <input type="text" id="word" class="search-query" value="<?=$q?>">
	  <button class="btn btn-primary">translate</button>
      </form>
    </div>
  </header> 

  <section>
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
<a href="http://flattr.com/thing/1095199/WikiDict-Free-and-open-online-dictionary" target="_blank">
  <img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a>
</div>
    <a href="#about" onClick="$('section').load('about.html')">About</a>
    <a href="#tools" onClick="$('section').load('tools.html')">Tools</a>
    <a href="#imprint" onClick="$('section').load('imprint.html')">Imprint</a>
  </footer>

</div>
</body>
</html>

<?php
if(isset($_GET['from']) & isset($_GET['to']) & isset($_GET['q'])){
    echo "<script language=javascript>translate('". $_GET['q'] ."');</script>";
}
?>
