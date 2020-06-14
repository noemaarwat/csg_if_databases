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
        <ul class="Thema">
            <li><a href="Thriller.php?nr=1">Thriller</a></li>
            <li><a href="Youngadult.php?nr=6">Young Adult</a></li>
            <li><a href="Roman.php?nr=11">Roman</a></li>
            <li><a href="Junior.php?nr=16">Junior</a></li>
            <li><a href="Nonfictie.php?nr=21">Non-Fictie</a></li>
        </ul>
        <div Class="Home">
        
            <p>Welkom op BoekReview.nl,</p>

            <p>Het concept voor BoekReview.nl is in 2020 bedacht door Nathan Porsoufi en Gijs van der Velde.</p>

            <p>BoekReview.nl is een interactieve website. Bezoekers die aangemeld zijn kunnen een reactie achterlaten.</p>
        </div>
        <div class="footer">
            <p>Copyright © 2020 Boekreview.nl All rights reserved.</p>
        </div>
    </body>
</html>