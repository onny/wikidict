#wiktionarytodict.py enwiktionary-latest-pages-articles.xml Norwegian nob tmpdir/ 
#wiktionarytodict.py enwiktionary-latest-pages-articles.xml Dutch nld tmpdir/ 
#wiktionarytodict.py enwiktionary-latest-pages-articles.xml Spanish spa tmpdir/ 
#wiktionarytodict.py enwiktionary-latest-pages-articles.xml German deu tmpdir/ 

wiktionarytodict.py enwiktionary-latest-pages-articles.xml French fra tmpdir/ 
dictfmt --utf8 --allchars -s "Wiktionary English to French" -j "tmpdir/wikt-eng-fra < "tmpdir/eng-fra.txt
dictfmt --utf8 --allchars -s "Wiktionary French to English" -j "tmpdir/wikt-fra-eng < "tmpdir/fra-eng.txt

dictzip tmpdir/*.dict
#sudo cp tmpdir/wikt-* /usr/share/dictd/
#sudo /usr/sbin/dictdconfig --write

