Hallo,

vor dem Öffnen der index.html gibt es einige Schritte zu beachten:

1. der Ordner "lisa" muss so wie er ist (also ohne Umbenennungen usw) in das Rootverzeichnis (!) des Webservers geschoben werden. 
	Das Bedeutet, dass wenn der Client aufgerufen wird, sowas wie http://localhost/lisa/ in der Adresszeile steht und nicht sowas wie http://locahlost/username/blabla/lisa
2. Das Backend läuft auf Port 8080. Das kann wenn nötig in der Server.java Zeile 32 geändert werden
3. Es sollte in der app.js Zeile 33 und in der Controllers.js Zeile 15 und 138 die korrekte Url+Port eingetragen sein, auf der das Backend läuft
	Beide Dateien sind im Client im Ordner js zu finden
4. Der Server sollte vor dem Client laufen, es sollte eine Internetverbindung vorhanden sein ;)
5. In der Server.java muss - um CORS-Fehler zu vermeiden - in Zeile 89 die korrekte URI des Webservers stehen. Bitte den Kommentarblock in der selbigen Klasse beachten ;) Für Mac-User die den MAMP in der Standart-Config benutzen, muss die URL http://localhost:8888 lauten. 
6. Als Abkürzung zum Testen, kann im Lade-Screen auf das LISA-Logo geklickt werden. Das Skript populiert die Felder mit dem Namen Airbus, 12 Runden, einem Gewinntyp und einem Logo. Bei mehreren Simulierten Nutzern darf das nicht gemacht werden, da der Name des Spielers eindeutig sein muss.
7. Um 3 weitere Statische Clients zu faken (die nichts weiter machen als sich einzuloggen), kann im Package Spielwiese, die hobbyclient.java ausgeführt werden. Diese kann wenn nötig auch durch die URLs erweitert werden, die zum Senden der nötigen werde nötig sind. Ob man damit aber dann mehr als eine Runde spielen kann ist fraglich, denn die UI steuert den Rundenablauf.
8. Bitte beachten: wenn der Server aus irgendeinem Grund neugestartet wird, bitte die Clients auch vollständig zurücksetzen. Das geht, in dem man im Browser wieder /lisa/ aufruft und danach den Client ohne Cache(!!!!)(je nach Browser: strg+r, strg+umsch+r, cmd+umsch+r, bitte googlen... drückt)
Hintergrund ist folgender: das Spiel sendet im Hintergrund durch XHR-Polls und ruft alle 10s oder so die aktuellsten Werte für die jeweilige View ab. Das macht es auch, wenn der Server nicht mehr läuft oder neugestartet wurde. Um das zu unterbinden, muss das Javascript unterbrochen werden, in dem man die Seite neulädt (oder auf dem Startscreen auf das LISA-Logo klickt)


9. Bei Fragen: 0173/ 24 22 451 (Telefon, WhatsApp, iMessage), emil.abramov@hp.com (Email oder Lync) oder a3rosol@gmail.com (alles was google so anbietet)

Viele Grüße,
Emil