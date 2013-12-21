<?php
	$title = "911er";
	include "Header.php";
?>
	<script src='js/jquery.min.js'></script>
	<script src='js/jquery.elevatezoom.js'></script>
	
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>911 Turbo</h2>
			<h3>Die Referenz</h3>
		</div>
	</div>

	

	<div id="wrapper" class="container">
	<img src="images/porsche-911-turbo.jpg" id="zoom911" data-zoom-image="images/porsche-911-turbo.jpg" width="50%" height="50%" style="float:left; margin-right:20px">
	<p> Der Porsche 911, kurz auch „Neunelfer“, oder nur „Elfer“ genannt, ist der bekannteste Sportwagen von Porsche und gilt als Inbegriff dieser Marke.

Er wurde am 12. September 1963 auf der IAA in Frankfurt am Main als Nachfolger des Porsche 356 mit der Bezeichnung Porsche 901 vorgestellt. Dreistellige Zahlen mit einer Null in der Mitte waren jedoch für Peugeot als Typbezeichnung geschützt, sodass der Wagen im Jahr 1964 als Porsche 911 auf den Markt kam.[1][2]

Der Wagen ist ein typischer 2+2-Sitzer mit zwei Sitzen und zwei Notsitzen.[3] Angetrieben wird er von einem Sechs-Zylinder-Boxermotor im Heck des Wagens. Diese Art des Heckmotors hatten auch klassische Fahrzeuge wie der VW Käfer oder der Porsche 356. Der Porsche 911 hat in der Regel einen Heckantrieb (Carrera); seit 1989 werden auch Fahrzeuge mit Allradantrieb (Carrera 4) angeboten. Spitzenmodell ist seit 1974 der mit einem Turbomotor ausgestattete 911 Turbo. Seit 1995 wurde darüber hinaus der 911 GT2, eine gewichtsoptimierte und leistungsgesteigerte Version des 911 Turbo, in einer Kleinserie produziert.</p>

<h3>Technik</h3>


<p>
Das Herzstück der neuen 911 Turbo Modelle ist der 3,8-Liter-Boxer-Biturbo- Motor mit variabler Turbinengeometrie (VTG). Er sitzt im Heck und bringt mehr Leistung als je zuvor. Dass Kraftstoffverbrauch und CO2-Emissionen dennoch um bis zu 16 % gesunken sind, ist unter anderem neuen serienmäßigen Effizienztechnologien zu verdanken. Dazu zählen das Thermomanagement, die Bordnetzrekuperation oder Funktionen wie Auto Start-Stop und „Segeln“. Auch das nochmals verbesserte Porsche Doppelkupplungsgetriebe (PDK) trägt seinen Teil dazu bei.

Ebenfalls neu ist die serienmäßige Hinterachslenkung. Sie stellt sich auf unterschiedliche Fahrsituationen ein und verbessert Agilität und Fahrstabilität. Für Geradlinigkeit auch in Kurven: die Porsche Dynamic Chassis Control (PDCC) – serienmäßig in den 911 Turbo S Modellen. PDCC sorgt dafür, dass das Fahrzeug noch satter, noch besser auf der Straße liegt. Alltagstauglichkeit und Performance zugleich erhöht das neue System Porsche Active Aerodynamics (PAA). Ein Widerspruch, den die flexiblen Einstellungen von Bugspoiler und Spaltflügel am Heck auflösen. Ergebnis: mehr Bodenfreiheit vorne, höhere Fahrstabilität, niedrigerer Verbrauch auf der Straße, beeindruckende Zeiten auf der Rundstrecke. </p>

	
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