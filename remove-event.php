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
  <title>Remove Event</title>
  <meta name="author" content="Nick Hericks">

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <link rel="shortcut icon" href="images/tennis-favicon.png">
  <link rel="icon" type="image/png" href="images/tennis-favicon.png" sizes="192x192">
  <link rel="apple-touch-icon" href="images/tennis-favicon.png">

  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

  <h2>Remove an event</h2>



<?php

  // connect to and send data to MySQL server
  $dbc = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL server.');

  // if form is submitted, loop through array and delete checked checkbox ids
  if (isset($_POST['submit'])) {

    $show_back_button = false;

    foreach ($_POST['tohide'] as $hide_id) {
      // remove events from display
      $query = "UPDATE events SET display = 'N' WHERE id=$hide_id";
      $result = mysqli_query($dbc, $query) or die('Error querying database.');
    }

    ?>
      <div class="success"><?php echo "Event(s) Removed";?></div>
      <br><br><br><br>
      <a class="back-button" href="index.php">Return to events page</a>
    <?php

  }

  else {

  $show_back_button = true;

  $query = "SELECT * FROM events WHERE display='Y' ORDER BY id";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');

?>

<p class="bold">Select the tennis events that you would like to delete:</p>
<div class="contain-700">
  <form class="bold" method="post" action="<?php echo $SERVER['PHP_SELF']; ?>">


    <?php
      while ($row = mysqli_fetch_array($result)) {
        $match_id = $row['id'];
        $display = $row['display'];
        $match_date = $row['match_date'];
        $match_time = $row['match_time'];
        $number_of_courts = $row['number_of_courts'];
        $number_of_players = $row['number_of_players'];
        $player_1 = $row['player_1'];
        $player_2 = $row['player_2'];
        $player_3 = $row['player_3'];
        $player_4 = $row['player_4'];
        $player_5 = $row['player_5'];
        $player_6 = $row['player_6'];
        $player_7 = $row['player_7'];
        $player_8 = $row['player_8'];

        echo '<span class="remove-input"><input class="remove-input" type="checkbox" value="' . $match_id . '" name="tohide[]" /></span>&nbsp;&nbsp;';
        echo $match_date;
        echo ' at ' . $match_time;
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Number of courts: ' . $number_of_courts;
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
        echo '<br>';
      }

      mysqli_close($dbc);


    ?>


    <br>
    <input type="submit" value="Remove" name="submit" />
  </form>
</div>

<?php
}
?>












</form>
<br><br><br>
<?php
  if ($show_back_button == true) {
    ?><a class="bold grey" href="index.php">Return to events page</a><?php
  }
?>
</body>
</html>
