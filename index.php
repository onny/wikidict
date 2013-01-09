<!-- # TODO:
#	- Firefox/Chrome Such-Plugin
#	- In der Ergebnistabelle, Vokabeln ergänzen mit Angaben (f/m, plural/singular)
#	- Tippfehler erkennen und Korrektur vorschlagen
#	- Dict.cc fallback
#	- Vokabeln speichern / Liste anlegen
#	- Eintrag nicht gefunden -> Link zum Anlegen der Seite
#	- About-Seite: Warum wurde das Projekt gestartet 
#	- Pronunciations http://en.wiktionary.org/wiki/sunshine
#	- offer daily dict snapshots as torrent in various open dict formats (there are some dumping projects on github)
#	- livesearch
#	- ergebnisse verlinken mit wiktionary
#	- error: word not found
#	- ignore case per default
#	- fade effect
#	- siehe beispiel, wie form inputs validiert werden können http://api.jquery.com/submit/

# ABOUT:
#	- http://www.apertium.org/ Ist frei, hat dics, lässt sich aber nicht benutzerfreundlich im Wiki-sinne erweitern

# Reference:
	- http://en.wiktionary.org/w/api.php
-->

<html>
<head>
	<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
	<script type='text/javascript' src='base.js'></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>WikiDict.cc - Free and open online dictionary</title>
</head>
<body>

  <div id=container>

  <header>
  <div id="left">
    <h1>WikiDict.cc</h1>
    <h2>Free and open online dictionary based on <a target=new href=http://wiktionary.org>Wiktionary.org</a></h2>
      </div>
      <div id="right">
      <form class="form-inline">
	  <input type="text" id="from" class="lang" value="en">
	  <input type="text" id="to" class="lang" value="de">
	  <input type="text" id="word" class="search-query" value="<?php echo $_GET['q'] ?>">
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
    <a href="#about">About</a>
    <a href="#tools">Tools</a>
    <a href="#imprint">Imprint</a>
  </footer>

</div>
</body>
</html>

<?php
if(isset($_GET['from']) & isset($_GET['to']) & isset($_GET['q'])){
    echo "test";
    echo "<script language=javascript>translate('daylight');</script>";
}
?>
