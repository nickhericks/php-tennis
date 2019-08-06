<?php
  // Clear browser cache to avoid old database data being displayed
  header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
  header("Pragma: no-cache"); // HTTP 1.0.
  header("Expires: 0");
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit event</title>
    <meta name="author" content="Nick Hericks">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
    <link rel="shortcut icon" href="images/tennis-favicon.png">
    <link rel="icon" type="image/png" href="images/tennis-favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="images/tennis-favicon.png">

    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Audiowide|Charmonman|Courgette|Kaushan+Script|Monoton|Permanent+Marker|Righteous|Roboto|Satisfy|Varela+Round" rel="stylesheet">
  </head>
  <body>
    <h2>Edit event</h2>

    <?php

        $proposed_id = $_POST['proposed_id'];
        $show_back_button = false;

        $proposed_player_1 = $_POST['proposed_player_1'];
        $proposed_player_2 = $_POST['proposed_player_2'];
        $proposed_player_3 = $_POST['proposed_player_3'];
        $proposed_player_4 = $_POST['proposed_player_4'];
        $proposed_player_5 = $_POST['proposed_player_5'];
        $proposed_player_6 = $_POST['proposed_player_6'];
        $proposed_player_7 = $_POST['proposed_player_7'];
        $proposed_player_8 = $_POST['proposed_player_8'];

        // connect to and send data to MySQL server
        $dbc_two = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL server.');

        $query_two = "UPDATE events SET player_1='$proposed_player_1', player_2='$proposed_player_2', player_3='$proposed_player_3', player_4='$proposed_player_4', player_5='$proposed_player_5', player_6='$proposed_player_6', player_7='$proposed_player_7', player_8='$proposed_player_8' WHERE id=$proposed_id";

        $result_two = mysqli_query($dbc_two, $query_two) or die('Error querying database.');

        mysqli_close($dbc_two);

        ?>
        <br><br>
        <div class="success"><?php echo "Success!<br>Change(s) saved.";?></div>
        <br><br><br><br>
        <a class="back-button" href="index.php">Return to events page</a>
    <br><br>
  </body>
</html>
