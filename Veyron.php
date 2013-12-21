<?php
	$title = "Bugatti Veyron";
	include "Header.php";
?>
	<script src='js/jquery.min.js'></script>
	<script src='js/jquery.elevatezoom.js'></script>
	
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Bugatti Veyron 16.4</h2>
		</div>
	</div>

	

	<div id="wrapper" class="container">
	<img src="images/bugatti_veyron_hires.jpg" id="zoom911" data-zoom-image="images/bugatti_veyron_hires.jpg" width="50%" height="50%" style="float:left; margin-right:20px">
	<p> Der Bugatti Veyron 16.4 ist ein Supersportwagen von Bugatti Automobiles, der unter dem Markennamen Bugatti vom Fahrzeugkonzern Volkswagen entwickelt wurde. Als Bugatti Veyron 16.4 Super Sport ist er der schnellste straßenzugelassene Seriensportwagen der Welt.

Das Kraftfahrzeug vereint etliche Superlative und Besonderheiten. Dazu zählen unter anderem die namensgebenden 16 Zylinder des 640 kg schweren Motors (530 kg ohne Getriebe), die Anordnung der Zylinder in Doppel-V-Form (kein echter W-Motor), das 110 kg schwere Siebenganggetriebe mit Doppelkupplung, die maximale Leistung von 736 kW (1001 PS), die Höchstgeschwindigkeit von 407 km/h (damit war der Veyron von 2005 bis 2007 das schnellste Serienfahrzeug der Welt), die vier Turbolader, der Maximalverbrauch von bis zu 100 Litern auf 100 km, das maximale Drehmoment von 1250 Nm und die Beschleunigung von 0 auf 100 km/h in 2,5 Sekunden. Um das schwere Fahrzeug sicher abbremsen zu können, werden Carbon-Keramik-Bremsscheiben eingebaut, die den Wagen aus 100 km/h in 2,3 Sekunden auf einer Strecke von 31,4 m zum Stehen bringen. Bei Geschwindigkeiten über 240 km/h wird ab einer Bremspedalzeit von 0,4 s automatisch, wie beim Mercedes-Benz SLR McLaren, der Heckspoiler steiler gestellt, wodurch er als Luftbremse wirkt.</p>
	
	</div>
</div>

<!-- /* Script für Zoom in -->

<script>
    $('#zoom911').elevateZoom({
    zoomType: "inner",
cursor: "crosshair",
zoomWindowFadeIn: 500,
zoomWindowFadeOut: 750
   }); 

</script>

<?php
	include "Footer.php";
?>