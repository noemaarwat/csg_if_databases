<?php
session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
require('php/database.php');
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Startpagina</title>
        <link rel="stylesheet" type="text/css" href="css/design.css">
    </head>
    <body>
        <div class="header">
            <img src="images/logo.png" style="width:300px;height:60px;">
        </div>
        <div class="navigatie">
            <a href="Home.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <div class="logout">
                <form method="POST" class="form-inline" action="logout.php">
                    <button type="submit" class="btn btn-secondary mb-2">Logout</button>
                </form>
            </div>
        </div>
        
        <div Class="About">
            <p>
            <p>BoekReview.nl bevat boekrecensies van de boeken uit diverse genres. 
            <p>BoekReview.nl streeft ernaar een divers aanbod van zowel recent verschenen als oudere titels weer te geven door 
            <p>middel van het plaatsen van een recensie. De website is breed opgezet en voor ieder zijn er boeken te vinden. 
            <p>BoekReview.nl richt zich op diverse genres die aantrekkelijk zijn voor zowel man als vrouw uit diverse leeftijdscategorieën.
            <p>Uiteraard is BoekReview.nl onafhankelijk. Er wordt samengewerkt met enkele uitgeverijen, geheel op vrijwillige basis. 
            <p>De samenwerking kan door beide partijen op ieder gewenst moment beëindigd worden. Iedere uitgeverij is vrij om 
            <p>BoekReview.nl te benaderen voor het aangaan van een samenwerking. Het is uiteindelijk de recensent die de waardering 
            <p>voor een boek bepaalt en tevens kunnen de bezoekers hun waardering laten blijken, ongeacht een positief of negatief oordeel.

            <p>Om de actualiteit van BoekReview.nl te waarborgen vindt de bezoeker regelmatig nieuw toegevoegde recensies, 
            <p>alsmede interviews met en columns van auteurs. Ook is er voor bezoekers de mogelijkheid om lid te worden van 
            <p>de maandelijkse nieuwsbrief.

            <p>BoekReview.nl werkt met een vast team van recensenten om zo de kwaliteit van de website te waarborgen. 
            <p>Tevens worden de interviews met auteurs uitgewerkt door een vaste medewerker van BoekReview.nl. Reacties 
            <p>van bezoekers worden altijd eerst gekeurd door het team van Boekreviews. Dit alles om de kwaliteit 
            <p>van de website te waarborgen.  


        </div>
        <div class="footer">
            <p>Copyright © 2020 Boekreview.nl All rights reserved.</p>
        </div>
    </body>
</html>