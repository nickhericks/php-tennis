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
    <title>Add Event</title>
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
    <?php
      if ($submit_success == true) {
        header('Location: index.php');
      }
    ?>

    <h2>Add an event</h2>

  <?php

    $show_add_form = true;


    if (isset($_POST['submit'])) {

      $submit_success = false;
      $match_date = $_POST['date'];
      $match_time = $_POST['time'];
      $number_of_courts = $_POST['courts'];
      $number_of_players = $_POST['max-players'];
      $show_back_button = false;

      if ($match_date !='' && $match_time !='' && $number_of_courts !='' && $number_of_players !='') {

        // connect to and send data to MySQL server
        $dbc = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL server.');

        // Create new event
        $create_query = "INSERT INTO events (match_date, match_time, number_of_courts, number_of_players) VALUES ('$match_date', '$match_time', '$number_of_courts', '$number_of_players')";

        // $create_result = mysqli_query($dbc, $create_query) or die('Error querying database.');

        // Identify new event primary key
        if ($dbc->query($create_query) === TRUE) {
          // header('Location:index.php');
          $last_id = $dbc->insert_id;
          $submit_success = true;
          // echo "New event created successfully. Last inserted ID is: " . $last_id;
        } else {
            echo "Error: " . $create_query . "<br>" . $dbc->error;
        }

        mysqli_close($dbc);

        ?>
          <br><br>
          <div class="success"><?php echo "Success!<br>Event created.";?></div>
          <br><br><br><br>
          <a class="back-button" href="index.php">Return to events page</a>
        <?php
        $show_add_form = false;
      }
      else {
        ?><div class="warning"><?php echo "Please fill all fields!<br>Event not created.";?></div> <?php
        $show_add_form = true;
      }
    }

    if ($show_add_form == true) {

      $show_back_button = true;
      ?>
      <!-- <p class="add-description">Add a new tennis event including the date, time, number of courts available and the maximum number of players allowed.</p> -->
      <form class="add-form" method="post" action=" <?php echo $SERVER['PHP_SELF']; ?> ">

        <!-- <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?= date('Y-m-d'); ?>" /><br> -->
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" /><br>

        <!-- <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="12:00" /><br> -->
        <label for="time">Time:</label>
        <input type="text" id="time" name="time" /><br>

        <label for="courts"># of courts available:</label>
        <select style="position:relative" id="courts" name="courts">
          <option value="1">1</option>
          <option value="2">2</option>
          <option disabled selected value></option>
        </select><br />
        <label for="max-players"># of players allowed:</label>
        <select style="position:relative" id="max-players" name="max-players">
          <option disabled selected value></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select><br />

        <input class="add-button bold" type="submit" value="Create new event" name="submit" />
      </form>

      <?php
    }

  ?>

  <br><br><br><br><br>
  <?php
    if ($show_back_button == true) {
      ?><a class="bold grey" href="index.php">Return to events page</a><?php
    }
  ?>
  </body>
</html>
