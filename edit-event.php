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
      $show_edit_form = true;
      $update_database = false;

      if (isset($_POST['submit'])) {

        $new_id = $_POST['match_id'];
        $show_back_button = false;

        $proposed_player_1 = $_POST['player_1'];
        $proposed_player_2 = $_POST['player_2'];
        $proposed_player_3 = $_POST['player_3'];
        $proposed_player_4 = $_POST['player_4'];
        $proposed_player_5 = $_POST['player_5'];
        $proposed_player_6 = $_POST['player_6'];
        $proposed_player_7 = $_POST['player_7'];
        $proposed_player_8 = $_POST['player_8'];

          // echo $new_id;

        // retreive current players from MySQL database
        $dbc_three = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL server.');
        $query_three = "SELECT * FROM events WHERE id='$new_id'";
        $result_three = mysqli_query($dbc_three, $query_three) or die ('Error querying database.');
        mysqli_close($dbc_three);

        while ($row = mysqli_fetch_array($result_three)) {
          $current_player_1 = $row['player_1'];
          $current_player_2 = $row['player_2'];
          $current_player_3 = $row['player_3'];
          $current_player_4 = $row['player_4'];
          $current_player_5 = $row['player_5'];
          $current_player_6 = $row['player_6'];
          $current_player_7 = $row['player_7'];
          $current_player_8 = $row['player_8'];
        }

        if (($current_player_1 != '') && ($proposed_player_1 != $current_player_1)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_1 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_1 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        if (($current_player_2 != '') && ($proposed_player_2 != $current_player_2)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_2 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_2 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        elseif (($current_player_3 != '') && ($proposed_player_3 != $current_player_3)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_3 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_3 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        elseif (($current_player_4 != '') && ($proposed_player_4 != $current_player_4)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_4 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_4 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        elseif (($current_player_5 != '') && ($proposed_player_5 != $current_player_5)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_5 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_5 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        elseif (($current_player_6 != '') && ($proposed_player_6 != $current_player_6)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_6 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_6 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        elseif (($current_player_7 != '') && ($proposed_player_7 != $current_player_7)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_7 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_7 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        elseif (($current_player_8 != '') && ($proposed_player_8 != $current_player_8)) {
          ?>
          <div class="alert shadow">
            Warning!<br><br>This spot has already been reserved by another player: <span class="bold"><?php echo $current_player_8 ?></span><br><br>If the spot appeared to be available, it may be that in the time since you loaded this webpage, another player has confirmed this spot.<br><br>To avoid unintentionally removing the current player from this spot, click the 'REFRESH PAGE' button below to see this match's current player list.<br><br>If you do wish to override <?php echo $current_player_8 ?>'s reservation, click the 'Override' button below.<br><br>
            <div class="button-bar">
              <form method="post" action="override-event.php">
                <input type="text" class="hidden-checkbox" value="<?php echo $new_id ?>" name="proposed_id" checked />
                <input type="text" class="hidden-checkbox" value="<?php echo $proposed_player_1 ?>" name="proposed_player_1" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_2 ?>" name="proposed_player_2" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_3 ?>" name="proposed_player_3" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_4 ?>" name="proposed_player_4" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_5 ?>" name="proposed_player_5" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_6 ?>" name="proposed_player_6" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_7 ?>" name="proposed_player_7" checked />
                <input type="checkbox" class="hidden-checkbox" value="<?php echo $proposed_player_8 ?>" name="proposed_player_8" checked />
                <input class="override-button" type="submit" value="Override" name="override" />
              </form>
              <form method="post" action="edit-event.php">
                <input
                  type="checkbox"
                  class="hidden-checkbox"
                  value="<?php echo $new_id ?>"
                  name="match_id"
                  checked
                />
                <input class="refresh-button" type="submit" value="Refresh page" name="refresh" />
              </form>
            </div>
          </div>
          <?php
        }
        else {
          $update_database = true;
        }
      }


      if ($update_database == true) {

        // connect to and send data to MySQL server
        $dbc_two = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL server.');

        // $query_two = "UPDATE events SET player_2='$proposed_player_2' WHERE id=$proposed_id";

        $query_two = "UPDATE events SET player_1='$proposed_player_1', player_2='$proposed_player_2', player_3='$proposed_player_3', player_4='$proposed_player_4', player_5='$proposed_player_5', player_6='$proposed_player_6', player_7='$proposed_player_7', player_8='$proposed_player_8' WHERE id=$new_id";

        $result_two = mysqli_query($dbc_two, $query_two) or die('Error querying database.');

        mysqli_close($dbc_two);

        ?>
          <br><br>
          <div class="success"><?php echo "Success!<br>Change(s) saved.";?></div>
          <br><br><br><br>
          <a class="back-button" href="index.php">Return to events page</a>
        <?php
        $show_edit_form = false;
      }


      if ($show_edit_form == true) {
        $show_back_button = true;
        $match_id = $_POST['match_id'];

        $dbc = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die ('Error connecting to MySQL database.');

        $query = "SELECT * FROM events WHERE id='$match_id'";

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
        }
        ?>

        <form class="bold" method="post" action=" <?php echo $SERVER['PHP_SELF']; ?> ">

          <input type="checkbox" class="hidden-checkbox" value=" <?php echo $match_id ?> " name="match_id" checked />
          <input type="checkbox" class="hidden-checkbox" value=" <?php echo $number_of_players ?> " name="number_of_players" checked />

          <!-- <input type="checkbox" class="hidden-checkbox" value=" <?php echo $player_3 ?> " name="old_player_3" checked /> -->

          <!-- display match details -->
          <div><?php echo $match_date; ?> </div>
          <div><?php echo $match_time; ?> </div>
          <br>
          <div>Courts available:&nbsp;&nbsp;&nbsp;<b> <?php echo $number_of_courts; ?> </b></div>
          <div>Players allowed:&nbsp;&nbsp;&nbsp;<b> <?php echo $number_of_players; ?> </b></div>
          <br>

          <?php

          // display player fields based on number of players
          for ($n = 0; $n < $number_of_players; $n++) {
            $player_slot = $n + 1;
            $current_player = $player_1;
          ?>
            <label for="player_<?php echo $player_slot; ?>">Player:</label>
            <input
              type="text"
              id="player_<?php echo $player_slot; ?>"
              name="<?php

                switch ($player_slot) {
                    case 1:
                        echo 'player_1';
                        break;
                    case 2:
                        echo 'player_2';
                        break;
                    case 3:
                        echo 'player_3';
                        break;
                    case 4:
                        echo 'player_4';
                        break;
                    case 5:
                        echo 'player_5';
                        break;
                    case 6:
                        echo 'player_6';
                        break;
                    case 7:
                        echo 'player_7';
                        break;
                    case 8:
                        echo 'player_8';
                        break;
                }
              ?>"
              value="<?php

                switch ($player_slot) {
                    case 1:
                        echo $player_1;
                        break;
                    case 2:
                        echo $player_2;
                        break;
                    case 3:
                        echo $player_3;
                        break;
                    case 4:
                        echo $player_4;
                        break;
                    case 5:
                        echo $player_5;
                        break;
                    case 6:
                        echo $player_6;
                        break;
                    case 7:
                        echo $player_7;
                        break;
                    case 8:
                        echo $player_8;
                        break;
                }
              ?>"
            />
            <br>
          <?php
          }
          ?>


          <input class="save-button" type="submit" value="Save" name="submit" />
          <br><br>
        </form>



        <br>
      <?php
      }
      if ($show_back_button == true) {
        ?><a class="bold grey" href="index.php">Return to events page</a><?php
      }
      ?>
    <br><br>
  </body>
</html>
