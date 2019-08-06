<?php
  // Clear browser cache to avoid old database data being displayed
  header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
  header("Pragma: no-cache"); // HTTP 1.0.
  header("Expires: 0");
?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tennis</title>
    <meta name="description" content="Claim your spot on the tennis court in Maputo.">
    <meta name="author" content="Nick Hericks">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <link rel="shortcut icon" href="images/tennis-favicon.png">
    <link rel="icon" type="image/png" href="images/tennis-favicon.png" sizes="192x192">
    <link rel="apple-touch-icon" href="images/tennis-favicon.png">

    <link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Audiowide|Charmonman|Courgette|Kaushan+Script|Monoton|Permanent+Marker|Righteous|Roboto|Satisfy|Varela+Round" rel="stylesheet">
  </head>
  <body>

<!--
******************************************


TODO:
- Add mobile homescreen shortcut instructions for Android and iOS
- Order events display by date/time
- Edit/override multiple players with browser alert modal for each


******************************************
 -->






    <div class="nav shadow">
      <div class="nav-div">
        <a class="nav-link" href="add-event.php">Add Event</a>
      </div>

      <div class="nav-div">
        <a class="nav-link" href="remove-event.php">Remove Event</a>
      </div>
    </div>

    <h1>Tennis Signup</h1>

    <div class="match-flex">
    <?php

    $match_id = '';
    $display = '';
    $match_date = '';
    $match_time = '';
    $number_of_courts = '';
    $number_of_players = '';
    $player_1 = '';
    $player_2 = '';
    $player_3 = '';
    $player_4 = '';
    $player_5 = '';
    $player_6 = '';
    $player_7 = '';
    $player_8 = '';

    $dbc = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ("error connecting to MySQL server.");

    $query = "SELECT * FROM events WHERE display='Y' ORDER BY id";
    $result = mysqli_query($dbc, $query) or die ('Error querying database.');

    mysqli_close($dbc);

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

      ?>
      <div class="match-item">
        <div class="match-box-top shadow">

            <h3><?php echo $match_date; ?> </h3>
            <h3><?php echo $match_time; ?> </h3>
            <br>

            <div class="">Courts available:&nbsp;&nbsp;&nbsp;<b> <?php echo $number_of_courts; ?> </b></div>
            <div class="">Players allowed:&nbsp;&nbsp;&nbsp;<b> <?php echo $number_of_players; ?> </b></div>
            <br>
        </div>
        <div class="match-box-bottom shadow">

            <div class="white-box-container">

            <?php
            // Loop through players and list names
            for ($n = 0; $n < $number_of_players; $n++) {
              $player_slot = $n + 1;

              switch ($player_slot) {
                case 1:
                  ?>
                  <span class="white-box">1.
                    <?php echo $player_1; ?>
                  </span><br>
                  <?php
                  break;
                case 2:
                ?>
                <span class="white-box">2.
                  <?php echo $player_2; ?>
                </span><br>
                <?php
                break;
                case 3:
                ?>
                <span class="white-box">3.
                  <?php echo $player_3; ?>
                </span><br>
                <?php
                break;
                case 4:
                ?>
                <span class="white-box">4.
                  <?php echo $player_4; ?>
                </span><br>
                <?php
                break;
                case 5:
                ?>
                <span class="white-box">5.
                  <?php echo $player_5; ?>
                </span><br>
                <?php
                break;
                case 6:
                ?>
                <span class="white-box">6.
                  <?php echo $player_6; ?>
                </span><br>
                <?php
                break;
                case 7:
                ?>
                <span class="white-box">7.
                  <?php echo $player_7; ?>
                </span><br>
                <?php
                break;
                case 8:
                ?>
                <span class="white-box">8.
                  <?php echo $player_8; ?>
                </span><br>
                <?php
                break;
              }
            }

            ?>
          </div>
          <!-- <br> -->

          <!-- grab match_id and navigate to edit-event.php -->
          <form method="post" action="edit-event.php">
            <input
              type="checkbox"
              class="hidden-checkbox"
              value=" <?php echo $match_id ?> "
              name="match_id"
              checked
            />
            <input type="submit" value="Edit players" name="edit" />
          </form>

          <?php
          // echo 'match_id = ' . $match_id . '<br><br>';
          ?>

        </div>
      </div>
      <?php
    }
    ?>

    </div>
		<br>
		
      <footer>
        <p>
          // built by <a class="bold" target="_blank" href="http://nickhericks.com/">Nick Hericks</a>
        </p>
      </footer>


  </body>
</html>
