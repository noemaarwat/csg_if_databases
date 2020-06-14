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
    error_reporting(E_ALL & ~E_NOTICE);
    require('php/database.php');
    
    $id = $_GET["nr"];

    $sql = "SELECT naam FROM comments WHERE plaats_id = $id";
    $records = mysqli_query($DBverbinding, $sql);
    $namen = [];
    if (mysqli_num_rows($records) > 0) {
        while($record = mysqli_fetch_assoc($records)) {
            array_push($namen,$record);
        }
    }

    $sql = "SELECT comment FROM comments WHERE plaats_id = $id";
    $records = mysqli_query($DBverbinding, $sql);
    $comments = [];
    if (mysqli_num_rows($records) > 0) {
        while($record = mysqli_fetch_assoc($records)) {
            array_push($comments,$record);
        }
    }

    $sql = "SELECT naam FROM accounts";
    $record = mysqli_query($DBverbinding, $sql);
    $gebruiker = mysqli_fetch_array($record);
    
?>

<!doctype html>
<html lang="nl">
    <head>
        <link rel="stylesheet" type="text/css" href="css/design.css?>">
    </head>

    <body>
        <div class="reacties">
            <h1>Reacties:</h1>
            <?php
                if ($comments == []) {
                    echo '<h4>Er zijn nog geen reacties, wees de eerste die iets achterlaat!</h4>';
                }

                else { 
                    for ($i=0; $i < mysqli_num_rows($records); $i++) { 
            ?>

            <p>
                <?php echo $namen[$i]['naam']; ?>:
            </p>   
            
            <?php echo $comments[$i]['comment'];
                    }
                }  
            ?>
            
            <br>
            <br>

            <form method="POST">
                <h1>Typ hier uw reactie:</h1>
                <textarea name="comment" cols="40" rows="3"></textarea> <br>
	            <input type="submit" name="reageer" value="post">
            </form> 

            <?php
                if (isset($_POST['reageer'])) {
                    $reactie = $_POST["comment"];
                    mysqli_query($DBverbinding, "INSERT INTO `comments` (`id`, `naam`, `comment`, `plaats_id`) VALUES (NULL, '$_SESSION[username]', '$reactie', '$id');");
                    echo("<meta http-equiv='refresh' content='1'>");
                }

                else {
                }
            ?>
        </div>
    </body>
</html>