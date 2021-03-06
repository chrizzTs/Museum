<!--	In dieser Datei befindet sich der Header des Webauftritts, der von jeder einzelnen Seite eingebunden werden sollte. Hier werden meta-Daten geladen, die default.css eingebunden. Außerdem wird die Überschrift erstellt und die Menüleiste generiert.

-->


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF8">  
<meta http-equiv="Content-language" content="DE" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>


<!--Der Gesamte Header: -->

<div id="header-wrapper">

<!-- Überschrift der Seite -->
		<div id="logo">
			<h1><a href="Index.php">Automuseum Mannheim</a></h1>
		</div>
		
<!-- Menüleiste -->
		<nav id="menu">
			<ul id="navigation">			
				<li id= "home"><a href="index.php" title="Home">Home</a></li>			
				<li id= "exponate"><a href="#" title="Ausgewählte Exponate">Ausgewählte Exponate</a>
					<ul id="submenue">
						<li><a href="AudiR8.php" title="">Audi R8</a></li>
						<li><a href="911.php" title="">Porsche 911</a></li>
						<li><a href="Veyron.php" title="">Bugatti Veyron</a></li>
					</ul>
				</li>
				<li id= "visiors"><a href="#" title="Besucherinformationen">Besucherinformationen</a>
					<ul id="submenue">
						<li id= "open"><a href="Information.php" title="Öffnungszeiten">Öffnungszeiten und Preise</a></li>
						<li id="recruting"><a href="Recruiting.php" title="Recruting">Jobs</a></li>
					</ul>	
				</li>
				<li id= "shop"><a href="webshop.php" title="Shop">Shop</a></li>
				<li id= "kontakt"><a href="Kontakt.php" title=Kontakt"">Kontakt</a></li>
				<li id= "spiel"><a href="Quiz.php" title="Spiel">Spiel</a></li>
				<li id= "guestbook"><a href="guestbook.php"	title="Gästebuch">Gästebuch</a></li>
			</ul>
		</nav>
</div>
