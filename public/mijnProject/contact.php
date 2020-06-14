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
    
        <div Class="Contact">
<p>Wij helpen u graag per mail of telefonisch</p>
<p>Wij zijn bereikbaar en helpen u graag. U kunt contact met ons opnemen door: </p>
<p>•	Te mailen naar BoekReview@hotmail.com. U ontvangt zo spoedig mogelijk een reactie op uw vraag;</p>
<p>•	Telefonisch contact met ons op te nemen op werkdagen tussen 9.00 en 17.00 uur via (0314) 37 20 00. Als uw vraag niet dringend is, stuur dan een e-mail naar BoekReview@hotmail.com </p>
<p>Bezoekadres: Hofstraat 47</p>
<p>7001 JD Doetinchem (tegenover de Gruitpoort)</p>
<p>Telefoonnummer: (0314) 37 20 00</p>
<b>Postadres</b>
<p>Postbus 172</p>
<p>7000 AD Doetinchem</p>
<p>Telefoon: (0314) 37 20 00</p>
<p>E-mailadres: BoekReview@hotmail.com.</p>
<b>Overige gegevens</b>
<p>Bankrekening Rabobank: 11.05.10.321</p>
<p>IBAN nummer: NL48RABO0110510321</p>
<p>Kamer van Koophandel: 09055542</p>
<p>BTW-nummer: NL 00.26.23.390.B.01</p>
</p>
        </div>
        <div class="footer">
            <p>Copyright © 2020 Boekreview.nl All rights reserved.</p>
        </div>
    </body>
</html>