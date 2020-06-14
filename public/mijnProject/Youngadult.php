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
error_reporting(E_ALL & ~E_NOTICE);
    
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);
$sql = "SELECT * FROM boeken";
$records = mysqli_query($DBverbinding, $sql);
$aantalFotos = mysqli_num_rows($records);
if (isset($_GET["nr"]) && $_GET["nr"] <= $aantalFotos && $_GET["nr"] > 0) {
    $id = $_GET["nr"];
}
else {
    $id = 6;
}
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
        <div Class="Thriller">
        <div class="comments">
        <?php
        require('comment.php');
        ?>
        </div>
        <div class="boekafbeelding">
        <img src="images/<?php
        echo $id
        ?>.jpg" style="width:400px;height:600px;">
        </div>
        <div class="button">
            <?php
                $vorige = $id - 1;
                $volgende = $id + 1;
                if ($vorige == 0) {
                   $vorige = $aantalFotos;
                }
                if ($volgende > $aantalFotos) {
                   $volgende = 1;
                }
                if ($vorige == 5) {
                   $vorige = 10;
                }
                if ($volgende > 10) {
                   $volgende = 6;
                }
                echo '<a href="?nr='.$vorige.'"><button type="submit" class="btn btn-secondary mb-2">&#8592;</button></a>';
                echo " <strong>$id</strong> ";
                echo '<a href="?nr='.$volgende.'"><button type="submit" class="btn btn-secondary mb-2">&#8594;</button></a>';
            ?>
        </div>
        <div class="text">
        <div class="naam">
        <h1>Naam:</h1>
        <p><?php
            $sql = "SELECT * FROM boeken WHERE id='$id';";
            $result = mysqli_query($DBverbinding,$sql);

               while ($row = mysqli_fetch_assoc($result)) {
                   echo $row['naam'] . "<br>";
               }
        ?></p>
        </div>
        <div>
        <h1>auteur:</h1>
        <p><?php
            $sql = "SELECT * FROM boeken WHERE id='$id';";
            $result = mysqli_query($DBverbinding,$sql);

               while ($row = mysqli_fetch_assoc($result)) {
                   echo $row['auteur'] . "<br>";
               }
        ?></P>
        </div>
        <div class="beschrijving">
        <h1>beschrijving:</h1>
        <p><?php
        
            $sql = "SELECT * FROM boeken WHERE id='$id';";
            $result = mysqli_query($DBverbinding,$sql);

               while ($row = mysqli_fetch_assoc($result)) {
                   echo $row['beschrijving'] . "<br>";
               }
        ?></P>
        </div>
        </div>
        </div>
        <div class="footer">
            <p>Copyright © 2020 Boekreview.nl All rights reserved.</p>
        </div>
    </body>
</html>